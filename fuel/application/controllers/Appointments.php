<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2016, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

use \EA\Engine\Types\Text;
use \EA\Engine\Types\Email;
use \EA\Engine\Types\Url;

/**
 * Appointments Controller
 *
 * @package Controllers
 */
class Appointments extends CI_Controller {
    /**
     * Class Constructor
     */
	public function __construct() {
		parent::__construct();        
		$this->load->library('session');
        $this->load->helper('installation');
        $this->load->helper('email');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // Set user's selected language.
		if ($this->session->userdata('language')) {
			$this->config->set_item('language', $this->session->userdata('language'));
			$this->lang->load('translations', $this->session->userdata('language'));
		} else {
			$this->lang->load('translations', $this->config->item('language')); // default
		}

		// Common helpers
		$this->load->helper('google_analytics');
	}

    /**
     * Default callback method of the application.
     *
     * This method creates the appointment book wizard. If an appointment hash
     * is provided then it means that the customer followed the appointment
     * manage link that was send with the book success email.
     *
     * @param string $appointment_hash The db appointment hash of an existing record.
     */
    public function index($appointment_hash = '') {
        if (!is_ea_installed()) {
            redirect('installation/index');
            return;
        }

        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('services_model');
        $this->load->model('customers_model');
        $this->load->model('settings_model');

        try {
            $available_services  = $this->services_model->get_available_services();
            $available_providers = $this->providers_model->get_available_providers();
            $company_name        = $this->settings_model->get_setting('company_name');
            $date_format         = $this->settings_model->get_setting('date_format');

			// Remove the data that are not needed inside the $available_providers array.
			foreach ($available_providers as $index=>$provider) {
				$stripped_data = array(
					'id' => $provider['id'],
					'first_name' => $provider['first_name'],
					'last_name' => $provider['last_name'],
					'services' => $provider['services']
				);
				$available_providers[$index] = $stripped_data;
			}

            // If an appointment hash is provided then it means that the customer
            // is trying to edit a registered appointment record.
            if ($appointment_hash !== '') {
                // Load the appointments data and enable the manage mode of the page.
                $manage_mode = TRUE;

                $results = $this->appointments_model->get_batch(array('hash' => $appointment_hash));

                if (count($results) === 0) {
                    // The requested appointment doesn't exist in the database. Display
                    // a message to the customer.
                    $view = array(
                        'message_title' => $this->lang->line('appointment_not_found'),
                        'message_text'  => $this->lang->line('appointment_does_not_exist_in_db'),
                        'message_icon'  => base_url('assets/img/error.png')
                    );
                    $this->load->view('appointments/message', $view);
                    return;
                }

                $appointment = $results[0];
                $provider = $this->providers_model->get_row($appointment['id_users_provider']);
                $customer = $this->customers_model->get_row($appointment['id_users_customer']);

            } else {
                // The customer is going to book a new appointment so there is no
                // need for the manage functionality to be initialized.
                $manage_mode = FALSE;
                $appointment = array();
                $provider = array();
                $customer = array();
            }

            // Load the book appointment view.
            $view = array (
                'available_services'    => $available_services,
                'available_providers'   => $available_providers,
                'company_name'          => $company_name,
                'manage_mode'           => $manage_mode,
				'date_format'           => $date_format,
                'appointment_data'      => $appointment,
                'provider_data'         => $provider,
                'customer_data'         => $customer
            );
        } catch(Exception $exc) {
            $view['exceptions'][] = $exc;
        }

        $this->load->view('_blocks/header', $view);
        //$this->load->view('appointments/book', $view);
        //print_r($view);
        //$this->load->view('appointments/message', $view);
        $this->load->view('_blocks/footer', $view);

        //$this->load->view('appointments/book', $view);
    }

    /**
     * Cancel an existing appointment.
     *
     * This method removes an appointment from the company's schedule.
     * In order for the appointment to be deleted, the hash string must
     * be provided. The customer can only cancel the appointment if the
     * edit time period is not over yet.
     *
     * @param string $appointment_hash This is used to distinguish the
     * appointment record.
     * @param string $_POST['cancel_reason'] The text that describes why
     * the customer cancelled the appointment.
     */
    public function cancel($appointment_hash) {
        try {
            $this->load->model('appointments_model');
            $this->load->model('providers_model');
            $this->load->model('customers_model');
            $this->load->model('services_model');
            $this->load->model('settings_model');

            // Check whether the appointment hash exists in the database.
            $records = $this->appointments_model->get_batch(array('hash' => $appointment_hash));
            if (count($records) == 0) {
                throw new Exception('No record matches the provided hash.');
            }

            $appointment = $records[0];
            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $customer = $this->customers_model->get_row($appointment['id_users_customer']);
            $service = $this->services_model->get_row($appointment['id_services']);

            $company_settings = array(
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'company_link' => $this->settings_model->get_setting('company_link')
            );

            // :: DELETE APPOINTMENT RECORD FROM THE DATABASE.
            if (!$this->appointments_model->delete($appointment['id'])) {
                throw new Exception('Appointment could not be deleted from the database.');
            }

            // :: SYNC APPOINTMENT REMOVAL WITH GOOGLE CALENDAR
        	if ($appointment['id_google_calendar'] != NULL) {
                try {
                    $google_sync = filter_var($this->providers_model
							->get_setting('google_sync',$appointment['id_users_provider']), FILTER_VALIDATE_BOOLEAN);

                    if ($google_sync == TRUE) {
                        $google_token = json_decode($this->providers_model
                                ->get_setting('google_token', $provider['id']));
                        $this->load->library('Google_sync');
                        $this->google_sync->refresh_token($google_token->refresh_token);
                        $this->google_sync->delete_appointment($provider, $appointment['id_google_calendar']);
                    }
                } catch(Exception $exc) {
                    $exceptions[] = $exc;
                }
            }

            // :: SEND NOTIFICATION EMAILS TO CUSTOMER AND PROVIDER
            try {
                $this->config->load('email');
                $email = new \EA\Engine\Notifications\Email($this, $this->config->config);

                $send_provider = filter_var($this->providers_model
                            ->get_setting('notifications', $provider['id']), FILTER_VALIDATE_BOOLEAN);

                if ($send_provider === TRUE) {
                    $email->sendDeleteAppointment($appointment, $provider,
                            $service, $customer, $company_settings, new Email($provider['email']),
                            new Text($_POST['cancel_reason']));
                }

				$send_customer = filter_var($this->settings_model->get_setting('customer_notifications'),
						FILTER_VALIDATE_BOOLEAN);

				if ($send_customer === TRUE) {
					$email->sendDeleteAppointment($appointment, $provider,
							$service, $customer, $company_settings, new Email($customer['email']),
							new Text($_POST['cancel_reason']));
				}

            } catch(Exception $exc) {
                $exceptions[] = $exc;
            }
        } catch(Exception $exc) {
            // Display the error message to the customer.
            $exceptions[] = $exc;
        }

        $view = array(
            'message_title' => $this->lang->line('appointment_cancelled_title'),
            'message_text' => $this->lang->line('appointment_cancelled'),
            'message_icon' => base_url('assets/img/success.png')
        );

        if (isset($exceptions)) {
            $view['exceptions'] = $exceptions;
        }

        $this->load->view('appointments/message', $view);
    }

	/**
     * GET an specific appointment book and redirect to the success screen.
     *
     * @param int $appointment_id Contains the id of the appointment to retrieve.
     */
    public function book_success($appointment_id) {
        //if the appointment id doesn't exist or zero redirect to index
        if(!$appointment_id){
            redirect('appointments');
        }
        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('services_model');
        $this->load->model('settings_model');
        //retrieve the data needed in the view
        $appointment =  $this->appointments_model->get_row($appointment_id);
        $provider = $this->providers_model->get_row($appointment['id_users_provider']);
        $service = $this->services_model->get_row($appointment['id_services']);
        $company_name = $this->settings_model->get_setting('company_name');
        //get the exceptions
        $exceptions = $this->session->flashdata('book_success');
         // :: LOAD THE BOOK SUCCESS VIEW
        $view = array(
            'appointment_data'  => $appointment,
            'provider_data'     => $provider,
            'service_data'      => $service,
            'company_name'      => $company_name,
        );
        if($exceptions){
            $view['exceptions'] = $exceptions;
        }
        $this->load->view('appointments/book_success', $view);
    }

    /**
     * [AJAX] Get the available appointment hours for the given date.
     *
     * This method answers to an AJAX request. It calculates the available hours
     * for the given service, provider and date.
     *
     * @param numeric $_POST['service_id'] The selected service's record id.
     * @param numeric|string $_POST['provider_id'] The selected provider's record id, can also be 'any-provider'.
     * @param string $_POST['selected_date'] The selected date of which the available hours we want to see.
     * @param numeric $_POST['service_duration'] The selected service duration in minutes.
     * @param string $_POST['manage_mode'] Contains either 'true' or 'false' and determines the if current user
     * is managing an already booked appointment or not.
     *
     * @return Returns a json object with the available hours.
     */
    private function getTheDay($date){
        
        $curr_date=strtotime(date("Y-m-d H:i:s"));
        $the_date=strtotime($date);
        $diff=floor(($curr_date-$the_date)/(60*60*24));
        switch($diff){
            case 0:
                return "Today";
            break;
            case 1:
                return "Yesterday";
            break;
            default:
                return $diff." Days ago";
        }
    }
    public function ajax_get_available_hours() {
        $this->load->model('providers_model');
        $this->load->model('appointments_model');
        $this->load->model('settings_model');
        $this->load->model('services_model');

        try {
			// Do not continue if there was no provider selected (more likely there is no provider in the system).
			if (empty($_POST['provider_id'])) {
				echo json_encode(array());
				return;
			}

            if (empty($_POST['clinic_id'])) {
                //echo json_encode(array());
                //return;
                $_POST['clinic_id'] = 8;
            }

            // If manage mode is TRUE then the following we should not consider the selected
            // appointment when calculating the available time periods of the provider.
            $exclude_appointments = ($_POST['manage_mode'] === 'true')
                    ? array($_POST['appointment_id'])
                    : array();

			// If the user has selected the "any-provider" option then we will need to search
			// for an available provider that will provide the requested service.
            /* 
			if ($_POST['provider_id'] === ANY_PROVIDER) {
				$_POST['provider_id'] = $this->_search_any_provider($_POST['service_id'], $_POST['selected_date'], $_POST['clinic_id']);
				if ($_POST['provider_id'] === NULL) {
					echo json_encode(array());
					return;
				}
			}
            */

            $availabilities_type = $this->services_model->get_value('availabilities_type', $_POST['service_id']);
            $attendants_number = $this->services_model->get_value('attendants_number', $_POST['service_id']);

			$empty_periods = $this->_get_provider_available_time_periods($_POST['provider_id'],
					$_POST['selected_date'], $exclude_appointments, $_POST['clinic_id']);
            //print_r($empty_periods);
            $available_hours = $this->_calculate_available_hours($empty_periods, $_POST['selected_date'],
					$_POST['service_duration'], filter_var($_POST['manage_mode'], FILTER_VALIDATE_BOOLEAN),
                    $availabilities_type);

            if ($attendants_number > 1) {
                $this->_get_multiple_attendants_hours($available_hours, $attendants_number, $_POST['service_id'],
                    $_POST['selected_date']);
            }

            $today_dates = array();
            if($this->getTheDay($_POST['selected_date'])=='Today'){
                foreach($available_hours as $h){

                    //$date = new DateTime($_POST['selected_date'], new DateTimeZone('Europe/London'));
                    //$timestamp = $date->format('U');

                    $date = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('Europe/London'));
                    //$date = new DateTime(date('Y-m-d H:i:s',strtotime('+11 hours')), new DateTimeZone('Europe/London'));
                    $timestamp = $date->format('U');
                    //echo $timestamp;

                    //echo $timestamp.' '.strtotime($_POST['selected_date'].' '.$h).'/n/r';
                    if($timestamp<strtotime($_POST['selected_date'].' '.$h)){
                        $today_dates[] = $h;
                    }
                }
                echo json_encode($today_dates); 
            }else{
                echo json_encode($available_hours);    
            }
            

        } catch(Exception $exc) {
            echo json_encode(array(
                'exceptions' => array(exceptionToJavaScript($exc))
            ));
        }
    }

    /**
     * [AJAX] Register the appointment to the database.
     *
     * @return string Returns a JSON string with the appointment database ID.
     */
    public function ajax_register_appointment() {
		
        require_once('fuel/application/third_party/stripe-php-master/init.php');

        $this->form_validation->set_rules('post_data[customer][first_name]', 'First Name', 'required');
        $this->form_validation->set_rules('post_data[customer][last_name]', 'Last Name', 'required');
        $this->form_validation->set_rules('post_data[customer][email]', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('post_data[customer][phone_number]', 'Phone Number', 'required');
        
        $this->form_validation->set_rules('card_number', 'Card Number', 'required|numeric');
        $this->form_validation->set_rules('cvc_number', 'CVC Number', 'required|numeric');
        $this->form_validation->set_rules('exp_month', 'Expiry Month', 'required|numeric');
        $this->form_validation->set_rules('exp_year', 'Expiry Year', 'required|numeric');

         $this->form_validation->set_rules('tandc', 'Accept Terms', 'required|numeric');

        //$this->form_validation->set_rules('user_day', 'Day of birth', 'required|numeric');
        //$this->form_validation->set_rules('user_month', 'Month of birth', 'required|numeric');
        //$this->form_validation->set_rules('user_year', 'Year of birth', 'required|numeric');


        if ($this->form_validation->run() != FALSE){
            
          $price = 3900;
          if($this->input->post('promocode')!=''){
            $this->db->select('*');
            $this->db->where('name', $this->input->post('promocode'));
            $promo = $this->db->get('promo_codes')->row_array();
            if(sizeof($promo)>0){
                //promo exists
                $price = $price-($promo['discount']*100);
            }else{
                echo json_encode(array('status'=>0, 'msg'=>'Invalid promo code'));
                exit();
            }
          }
			//this is live key	
          \Stripe\Stripe::setApiKey("sk_live_jKjKxy8kUaN6AtpW2hqJYk4K"); 
			//this is testing key     
          // \Stripe\Stripe::setApiKey("sk_test_ED48c3Jlfq3G3fsq1Z6ATyuV");  
			$user_name  = $this->input->post('post_data[customer][first_name]').' '.$this->input->post('post_data[customer][last_name]');
            try{
            $token = Stripe\Token::create(array(
              "card" => array(
              "number" => $this->input->post("card_number"),
              "exp_month" => $this->input->post("exp_month"),
              "exp_year" => $this->input->post("exp_year"),
              "cvc" => $this->input->post("cvc_number"),
				  "name" => $user_name
                )
            ));
            }catch(Exception $err){				
                echo json_encode(array('status'=>0, 'msg'=>$err->{'jsonBody'}['error']['message']));
                exit();
            }
            //var_dump($token);exit;
		
            try{
            $customer = \Stripe\Customer::create(array(
                  "source" => $token,
				"description" =>$user_name
                  //"description" =>$this->input->post('first_name').' '.$this->input->post('last_name')
            ));
			//echo '<pre>';  print_r($customer); echo '</pre>'; die('test');
		
            }catch(Exception $err){
               
                echo json_encode(array('status'=>0, 'msg'=>$err->{'jsonBody'}['error']['message']));
                exit();
            }
            //var_dump($customer);

            // Charge the Customer instead of the card
            try{
            $charge = \Stripe\Charge::create(array(
               "amount" => $price, // amount in cents, again
               "currency" => "gbp",
               "customer" => $customer->id)
            );
            }catch(Exception $err){
                echo json_encode(array('status'=>0, 'msg'=>$err->{'jsonBody'}['error']['message']));
                exit();
            }
            //echo '<pre>';
            //print_r($charge);
            //echo '</pre>';
            //echo $charge['outcome']['seller_message'];
        try {
            $post_data = $_POST['post_data']; // alias
            //print_r($post_data);
			$post_data['manage_mode'] = filter_var($post_data['manage_mode'], FILTER_VALIDATE_BOOLEAN);

			$this->load->model('appointments_model');
            $this->load->model('providers_model');
            $this->load->model('services_model');
            $this->load->model('customers_model');
            $this->load->model('settings_model');

            // Validate the CAPTCHA string.
            if ($this->settings_model->get_setting('require_captcha') === '1'
					&&  $this->session->userdata('captcha_phrase') !== $_POST['captcha']) {
				echo json_encode(array(
					'captcha_verification' => FALSE,
					'expected_phrase' => $this->session->userdata('captcha_phrase')
				));
				return;
            }

            // Check appointment availability.
            //$checkAvail = $this->_check_datetime_availability();            
            if (!$this->_check_datetime_availability()) {
                throw new Exception($this->lang->line('requested_hour_is_unavailable'));
            }
            
            
            $appointment = $_POST['post_data']['appointment'];
            $customer = $_POST['post_data']['customer'];

            if ($this->customers_model->exists($customer)) {
                $customer['id'] = $this->customers_model->find_record_id($customer);
			}
            //exit();
            $customer_id = $this->customers_model->add($customer);
            $appointment['id_users_customer'] = $customer_id;
			$appointment['is_unavailable'] = (int)$appointment['is_unavailable']; // needs to be type casted
            $appointment['id'] = $this->appointments_model->add($appointment);
            $appointment['hash'] = $this->appointments_model->get_value('hash', $appointment['id']);

            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $service = $this->services_model->get_row($appointment['id_services']);

            $company_settings = array(
                'company_name'  => $this->settings_model->get_setting('company_name'),
                'company_link'  => $this->settings_model->get_setting('company_link'),
                'company_email' => $this->settings_model->get_setting('company_email')
            );

            // :: SYNCHRONIZE APPOINTMENT WITH PROVIDER'S GOOGLE CALENDAR
            // The provider must have previously granted access to his google calendar account
            // in order to sync the appointment.
            try {
                $google_sync = filter_var($this->providers_model->get_setting('google_sync',
                        $appointment['id_users_provider']), FILTER_VALIDATE_BOOLEAN);

                if ($google_sync == TRUE) {
                    $google_token = json_decode($this->providers_model
                            ->get_setting('google_token', $appointment['id_users_provider']));

                    $this->load->library('google_sync');
                    $this->google_sync->refresh_token($google_token->refresh_token);

                    if ($post_data['manage_mode'] === FALSE) {
                        // Add appointment to Google Calendar.
                        $google_event = $this->google_sync->add_appointment($appointment, $provider,
                                $service, $customer, $company_settings);
                        $appointment['id_google_calendar'] = $google_event->id;
                        $this->appointments_model->add($appointment);
                    } else {
                        // Update appointment to Google Calendar.
                        $appointment['id_google_calendar'] = $this->appointments_model
                                ->get_value('id_google_calendar', $appointment['id']);

                        $this->google_sync->update_appointment($appointment, $provider,
                                $service, $customer, $company_settings);
                    }
                }
            } catch(Exception $exc) {
                log_message('error', $exc->getMessage());
                log_message('error', $exc->getTraceAsString());
            }

            // :: SEND NOTIFICATION EMAILS TO BOTH CUSTOMER AND PROVIDER
            try {
                $this->config->load('email');
                
                $email = new \EA\Engine\Notifications\Email($this, $this->config->config);

                if ($post_data['manage_mode'] == FALSE) {
                    $customer_title = new Text($this->lang->line('appointment_booked'));
                    $customer_message = new Text($this->lang->line('thank_you_for_appointment'));
                    $provider_title = new Text($this->lang->line('appointment_added_to_your_plan'));
                    $provider_message = new Text($this->lang->line('appointment_link_description'));

                } else {
                    $customer_title = new Text($this->lang->line('appointment_changes_saved'));
                    $customer_message = new Text('');
                    $provider_title = new Text($this->lang->line('appointment_details_changed'));
                    $provider_message = new Text('');
                }

				$customer_link = new Url(site_url('appointments/index/' . $appointment['hash']));
				$provider_link = new Url(site_url('backend/index/' . $appointment['hash']));

				$send_customer = filter_var($this->settings_model->get_setting('customer_notifications'),
						FILTER_VALIDATE_BOOLEAN);

                $this->db->select('*');
                $this->db->where('id', $this->input->post('clinic_id'));
                $clinic = $this->db->get('ea_clinics')->row_array();

                $appointment['clinic'] = $clinic;

				if ($send_customer === TRUE) {
					$email->sendAppointmentDetails($appointment, $provider,
							$service, $customer,$company_settings, $customer_title,
							$customer_message, $customer_link, new Email($customer['email']));

                    $email->sendAppointmentDetails($appointment, $provider,
                            $service, $customer,$company_settings, $customer_title,
                            $customer_message, $customer_link, new Email($clinic['cl_email_address']));

                    $email->sendAppointmentDetails($appointment, $provider,
                            $service, $customer,$company_settings, $customer_title,
                            $customer_message, $customer_link, new Email('medicspotmarketing@gmail.com'));
				}

				$send_provider = filter_var($this->providers_model ->get_setting('notifications', $provider['id']),
						FILTER_VALIDATE_BOOLEAN);

                if ($send_provider === TRUE) {
                    $email->sendAppointmentDetails($appointment, $provider,
                            $service, $customer, $company_settings, $provider_title,
                            $provider_message, $provider_link, new Email($provider['email']));
                }
            } catch(Exception $exc) {
                log_message('error', $exc->getMessage());
                log_message('error', $exc->getTraceAsString());
            }

            $this->db->select('*');
            $this->db->where('id', $this->input->post('clinic_id'));
            $clinic = $this->db->get('ea_clinics')->row_array();  
            $pharmacy_name = $clinic['pharmacy_name'];
            //echo $clinic['pharmacy_name'];exit;
            //session_start();
			

            $html = '<br>Your pre-booking code:<br><span style="text-align:center;font-size:33px;font-weight:bold;"><b>TYHG78</b></span><br><br>Please keep a note of your pre-booking  code as there may be a delay without it<br><br>Please arrive 10 mins before your appointment time and show this code to a member of the pharmacy staff to avoid a delay in seeing the doctor<br><br>You will be connected to one of our online doctors instantly to get the help you need through our Medicspot Clinical Station<br><br>                
                <section id="clinical-station-diagram" class="booking_station_image">
                    <div class="container">
                        <h1>Medicspot Clinical Station</h1>
                        <div class="clinical-station-diagram" style="margin-top:0px !important;">
                            <ul class="diagram-list">
                                <li>
                                    <div class="icon" style="background-image: url(assets/images/icons/ms-blood.png)"></div>
                                    <div class="content">
                                        <h3>Blood Pressure Cuff</h3>
                                        <p style="text-align:right;">Allows your doctor to take<br> your blood pressure</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon" style="background-image: url(assets/images/icons/ms-stethoscope.png)"></div>
                                    <div class="content">
                                        <h3>Stethoscope</h3>
                                        <p style="text-align:right;">To listen to your<br> heart and lungs</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon" style="background-image: url(assets/images/icons/ms-medicam.png)"></div>
                                    <div class="content">
                                        <h3>MedicCam</h3>
                                        <p style="text-align:right;">To look into your<br> throat or ears</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="diagram-image-wrapper">
                                <img src="assets/images/how-it-works/medical-station.jpg" alt="Patient using stethoscope while talking to a private doctor online" >
                            </div>

                            <ul class="diagram-list">
                                <li>
                                    <div class="icon" style="background-image: url(assets/images/icons/ms-pulse.png)"></div>
                                    <div class="content">
                                        <h3>Pulse Oximeter</h3>
                                        <p style="text-align:left;">Measures your oxygen<br> levels and pulse rate</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon" style="background-image: url(assets/images/icons/ms-thermometer.png)"></div>
                                    <div class="content">
                                        <h3>Thermometer</h3>
                                        <p style="text-align:left;">To take your<br> temperature</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon" style="background-image: url(assets/images/icons/ms-prescription.png)"></div>
                                    <div class="content">
                                        <h3>Prescription</h3>
                                        <p style="text-align:left;">Our doctors can prescribe<br> medication for you to<br> collect instantly</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <p class="confirm_msg_p">
                    <span style="text-align:center;color: #000;font-weight:bold;"><b>Appointment Details:</b></span>
                        <br>
                        '.$customer['first_name'] . ' ' . $customer['last_name'].
                        '<br>
                    Appointment '. date('d/m/Y', strtotime($appointment['start_datetime'])).', '.date('H:i',strtotime($appointment['start_datetime'])).' at 
                       
                    '.$clinic['cl_clinic_name'].'
                        <br>
                        <br>
                    <span style="color: #ff585b;">'.$pharmacy_name.'</span>
                        <br>
                    '.$clinic['cl_formatted_address'].'
                        <br>
                        <br>
                    Amount Billed: &pound;'.number_format($price/100, 2).'<span style="color:#000;"></span>
                </p>';
                
            $_SESSION['confirm_appointment_id'] = $appointment['id'];  
            $_SESSION['confirm_message'] = $html;
            echo json_encode(array(
                    'status' => 1,
                    'appointment_id' => $appointment['id']                                    
                ));
            // echo json_encode(array(
            //         'status' => 1,
            //         'appointment_id' => $appointment['id'],
            //         'msg' => '<br>Please keep a note of your pre-booking  code as there may be a delay without it<br> <span style="text-align:center;font-size:15px">TYHG78</span><br><br>Please arrive 5-10mins before your appointment time and show this code to a member of the pharmacy staff<br><br>You will be connected to one of our online doctors instantly to get the help you need<br><br>'.$customer['first_name'] . ' ' . $customer['last_name'].'<br><br>Appointment '. date('d/m/Y H:i', strtotime($appointment['start_datetime'])).' at <br>'.$clinic['cl_clinic_name'].',<br>  '.$clinic['cl_formatted_address'].'<br><br>Amount Billed: &pound;'.($price/100)                    
            //     ));

        } catch(Exception $exc) {
            echo json_encode(array(
                'exceptions' => array(exceptionToJavaScript($exc))
            ));
            exit();
        }
        
        }else{
            echo json_encode(array('status'=>0, 'msg'=>validation_errors()));
            exit();
        }
    }

    /**
	 * [AJAX] Get Unavailable Dates
	 *
	 * Get an array with the available dates of a specific provider, service and month
	 * of the year. Provide the "provider_id", "service_id" and "selected_date" as GET
	 * parameters to the request. The "selected_date" parameter must have the Y-m-d format.
	 *
	 * @return string Returns a JSON array with the dates that are unavailable.
	 */
	public function ajax_get_unavailable_dates() {
		try {
			$provider_id = $this->input->get('provider_id');
			$service_id = $this->input->get('service_id');
			$selected_date = new DateTime($this->input->get('selected_date'));
			$number_of_days = (int)$selected_date->format('t');
			$unavailable_dates = array();

			// Handle the "Any Provider" case.
			if ($provider_id === ANY_PROVIDER) {
				$provider_id = $this->_search_any_provider($service_id, $this->input->get('selected_date'));
				if ($provider_id === NULL) { // No provider is available in the selected date.
					for ($i=1; $i<=$number_of_days; $i++) {
						$current_date = new DateTime($selected_date->format('Y-m') . '-' . $i);
						$unavailable_dates[] = $current_date->format('Y-m-d');
					}
					echo json_encode($unavailable_dates);
					return;
				}
			}

			// Get the available time periods for every day of this month.
			$this->load->model('services_model');
            $service_duration = (int)$this->services_model->get_value('duration', $service_id);
			$availabilities_type = (int)$this->services_model->get_value('availabilities_type', $service_id);

			for ($i=1; $i<=$number_of_days; $i++) {
				$current_date = new DateTime($selected_date->format('Y-m') . '-' . $i);

				if ($current_date < new DateTime(date('Y-m-d 00:00:00'))) { // Past dates become immediately unavailable.
					$unavailable_dates[] = $current_date->format('Y-m-d');
					continue;
				}

				$empty_periods = $this->_get_provider_available_time_periods($provider_id,
						$current_date->format('Y-m-d'));

	            $available_hours = $this->_calculate_available_hours($empty_periods, $current_date->format('Y-m-d'),
						$service_duration, false, $availabilities_type);

				if (empty($available_hours)) {
					$unavailable_dates[] = $current_date->format('Y-m-d');
				}
			}

			echo json_encode($unavailable_dates);
		} catch(Exception $exc) {
            echo json_encode(array(
                'exceptions' => array(exceptionToJavaScript($exc))
            ));
        }
	}

	/**
	 * Check whether the provider is still available in the selected appointment date.
	 *
	 * It might be times where two or more customers select the same appointment date and time.
	 * This shouldn't be allowed to happen, so one of the two customers will eventually get the
	 * preferred date and the other one will have to choose for another date. Use this method
	 * just before the customer confirms the appointment details. If the selected date was taken
	 * in the mean time, the customer must be prompted to select another time for his appointment.
	 *
	 * @return bool Returns whether the selected datetime is still available.
	 */
	protected function _check_datetime_availability() {

		$this->load->model('services_model');
		$this->load->model('appointments_model');

		$appointment  = $_POST['post_data']['appointment'];

        $clinic_id = $_POST['clinic_id'];
        //echo $clinic_id.'##';

		$service_duration = $this->services_model->get_value('duration', $appointment['id_services']);

		$exclude_appointments = (isset($appointment['id'])) ? array($appointment['id']) : array();

        $attendants_number = $this->services_model->get_value('attendants_number', $appointment['id_services']);

        if ($attendants_number > 1) {
            // Exclude all the appointments that will are currently registered.
            $exclude = $this->appointments_model->get_batch([
                'id_services' => $appointment['id_services'],
                'start_datetime' => $appointment['start_datetime']
            ]);

            if (!empty($exclude) && count($exclude) < $attendants_number) {
                foreach ($exclude as $entry) {
                    $exclude_appointments[] = $entry['id'];
                }
            }
        }

		if ($appointment['id_users_provider'] === ANY_PROVIDER) {
			$appointment['id_users_provider'] = $this->_search_any_provider($appointment['id_services'],
				date('Y-m-d', strtotime($appointment['start_datetime'])), $clinic_id);
			$_POST['post_data']['appointment']['id_users_provider'] = $appointment['id_users_provider'];
			return TRUE; // The selected provider is always available.
		}

		$available_periods = $this->_get_provider_available_time_periods(
				$appointment['id_users_provider'], date('Y-m-d', strtotime($appointment['start_datetime'])),
				$exclude_appointments, $clinic_id);

		$is_still_available = FALSE;

		foreach($available_periods as $period) {
			$appt_start = new DateTime($appointment['start_datetime']);
			$appt_start = $appt_start->format('H:i');

			$appt_end = new DateTime($appointment['start_datetime']);
			$appt_end->add(new DateInterval('PT' . $service_duration . 'M'));
			$appt_end = $appt_end->format('H:i');

			$period_start = date('H:i', strtotime($period['start']));
			$period_end = date('H:i', strtotime($period['end']));

			if ($period_start <= $appt_start && $period_end >= $appt_end) {
				$is_still_available = TRUE;
				break;
			}
		}

		return $is_still_available;
	}

	/**
	 * Get an array containing the free time periods (start - end) of a selected date.
	 *
	 * This method is very important because there are many cases where the system needs to
	 * know when a provider is available for an appointment. This method will return an array
	 * that belongs to the selected date and contains values that have the start and the end
	 * time of an available time period.
	 *
	 * @param numeric $provider_id The provider's record id.
	 * @param string $selected_date The date to be checked (MySQL formatted string).
	 * @param array $exclude_appointments This array contains the ids of the appointments that
	 * will not be taken into consideration when the available time periods are calculated.
	 *
	 * @return array Returns an array with the available time periods of the provider.
	 */
	protected function _get_provider_available_time_periods($provider_id, $selected_date, $exclude_appointments = array(), $clinic_id) {
		$this->load->model('appointments_model');
	    $this->load->model('providers_model');
        
	    // Get the provider's working plan and reserved appointments.
	    //$working_plan = json_decode($this->providers_model->get_setting('working_plan', $provider_id), TRUE);
        $working_plan = json_decode($this->settings_model->get_setting('company_working_plan', $clinic_id), TRUE);

	    $where_clause = array(
	        'id_users_provider' => $provider_id
	    );

	    $reserved_appointments = $this->appointments_model->get_batch($where_clause);

	    // Sometimes it might be necessary to not take into account some appointment records
	    // in order to display what the providers' available time periods would be without them.
	    foreach ($exclude_appointments as $excluded_id) {
	        foreach ($reserved_appointments as $index => $reserved) {
	            if ($reserved['id'] == $excluded_id) {
	                unset($reserved_appointments[$index]);
	            }
	        }
	    }

	    // Find the empty spaces on the plan. The first split between the plan is due to
	    // a break (if exist). After that every reserved appointment is considered to be
	    // a taken space in the plan.
	    $selected_date_working_plan = $working_plan[strtolower(date('l', strtotime($selected_date)))];
	    $available_periods_with_breaks = array();

	    if (isset($selected_date_working_plan['breaks'])) {
	        $start = new DateTime($selected_date_working_plan['start']);
	        $end = new DateTime($selected_date_working_plan['end']);
	        $available_periods_with_breaks[] = array(
	            'start' => $selected_date_working_plan['start'],
	            'end' => $selected_date_working_plan['end']
	        );

	        // Split the working plan to available time periods that do not contain the breaks in them.
	        foreach ($selected_date_working_plan['breaks'] as $index => $break) {
	            $break_start = new DateTime($break['start']);
	            $break_end = new DateTime($break['end']);

				if ($break_start < $start) {
	                $break_start = $start;
				}

	            if ($break_end > $end) {
	                $break_end = $end;
 				}

	            if ($break_start >= $break_end) {
					continue;
				}

	            foreach ($available_periods_with_breaks as $key => $open_period) {
	                $s = new DateTime($open_period['start']);
	                $e = new DateTime($open_period['end']);

	                if ($s < $break_end && $break_start < $e) { // check for overlap
	                    $changed = FALSE;
	                    if ($s < $break_start) {
	                        $open_start = $s;
	                        $open_end = $break_start;
	                        $available_periods_with_breaks[] = array(
	                            'start' => $open_start->format("H:i"),
	                            'end' => $open_end->format("H:i")
	                        );
	                        $changed = TRUE;
	                    }

	                    if ($break_end < $e) {
	                        $open_start = $break_end;
	                        $open_end = $e;
	                        $available_periods_with_breaks[] = array(
	                            'start' => $open_start->format("H:i"),
	                            'end' => $open_end->format("H:i")
	                        );
	                        $changed = TRUE;
	                    }

						if ($changed) {
	                        unset($available_periods_with_breaks[$key]);
	                    }
	                }
	            }
	        }
	    }

	    // Break the empty periods with the reserved appointments.
	    $available_periods_with_appointments = $available_periods_with_breaks;

	    foreach($reserved_appointments as $appointment) {
	        foreach($available_periods_with_appointments as $index => &$period) {
	            $a_start = strtotime($appointment['start_datetime']);
	            $a_end =  strtotime($appointment['end_datetime']);
	            $p_start = strtotime($selected_date .  ' ' . $period['start']);
	            $p_end = strtotime($selected_date .  ' ' .$period['end']);

				if ($a_start <= $p_start && $a_end <= $p_end && $a_end <= $p_start) {
	                // The appointment does not belong in this time period, so we
	                // will not change anything.
	            } else if ($a_start <= $p_start && $a_end <= $p_end && $a_end >= $p_start) {
	                // The appointment starts before the period and finishes somewhere inside.
	                // We will need to break this period and leave the available part.
	                $period['start'] = date('H:i', $a_end);
	            } else if ($a_start >= $p_start && $a_end <= $p_end) {
	                // The appointment is inside the time period, so we will split the period
	                // into two new others.
	                unset($available_periods_with_appointments[$index]);
	                $available_periods_with_appointments[] = array(
	                    'start' => date('H:i', $p_start),
	                    'end' => date('H:i', $a_start)
	                );
	                $available_periods_with_appointments[] = array(
	                    'start' => date('H:i', $a_end),
	                    'end' => date('H:i', $p_end)
	                );
	            } else if ($a_start >= $p_start && $a_end >= $p_start && $a_start <= $p_end) {
	                // The appointment starts in the period and finishes out of it. We will
	                // need to remove the time that is taken from the appointment.
	                $period['end'] = date('H:i', $a_start);
	            } else if ($a_start >= $p_start && $a_end >= $p_end && $a_start >= $p_end) {
	                // The appointment does not belong in the period so do not change anything.
	            } else if ($a_start <= $p_start && $a_end >= $p_end && $a_start <= $p_end) {
	                // The appointment is bigger than the period, so this period needs to be removed.
	                unset($available_periods_with_appointments[$index]);
	            }
	        }
	    }

	    return array_values($available_periods_with_appointments);
	}

	/**
	 * Search for any provider that can handle the requested service.
	 *
	 * This method will return the database ID of the provider with the most available periods.
	 *
	 * @param numeric $service_id The requested service ID.
	 * @param string $selected_date The date to be searched.
	 *
	 * @return int Returns the ID of the provider that can provide the service at the selected date.
	 */
	protected function _search_any_provider($service_id, $selected_date, $clinic_id) {
		$this->load->model('providers_model');
		$this->load->model('services_model');
		$available_providers = $this->providers_model->get_available_providers();
		$service = $this->services_model->get_row($service_id);
		$provider_id = NULL;
		$max_hours_count = 0;
        //echo $clinic_id.'###';
		foreach($available_providers as $provider) {
			foreach($provider['services'] as $provider_service_id) {
				if ($provider_service_id == $service_id) { // Check if the provider is available for the requested date.
					$empty_periods = $this->_get_provider_available_time_periods($provider['id'], $selected_date, [], $clinic_id);
					$available_hours = $this->_calculate_available_hours($empty_periods, $selected_date,
                            $service['duration'], false, $service['availabilities_type'], $clinic_id);
					if (count($available_hours) > $max_hours_count) {
						$provider_id = $provider['id'];
						$max_hours_count = count($available_hours);
					}
				}
			}
		}

		return $provider_id;
	}

	/**
	 * Calculate the available appointment hours.
	 *
	 * Calculate the available appointment hours for the given date. The empty spaces
	 * are broken down to 15 min and if the service fit in each quarter then a new
	 * available hour is added to the "$available_hours" array.
	 *
	 * @param array $empty_periods Contains the empty periods as generated by the
	 * "_get_provider_available_time_periods" method.
	 * @param string $selected_date The selected date to be search (format )
	 * @param numeric $service_duration The service duration is required for the hour calculation.
	 * @param bool $manage_mode (optional) Whether we are currently on manage mode (editing an existing appointment).
     * @param string $availabilities_type Optional ('flexible'), the service availabilities type.
	 *
	 * @return array Returns an array with the available hours for the appointment.
	 */
	protected function _calculate_available_hours(array $empty_periods, $selected_date, $service_duration,
			$manage_mode = FALSE, $availabilities_type = 'flexible') {
		$this->load->model('settings_model');

		$available_hours = array();

		foreach ($empty_periods as $period) {
			$start_hour = new DateTime($selected_date . ' ' . $period['start']);
			$end_hour = new DateTime($selected_date . ' ' . $period['end']);
            $interval = $availabilities_type === AVAILABILITIES_TYPE_FIXED ? (int)$service_duration : 15;

			$current_hour = $start_hour;
			$diff = $current_hour->diff($end_hour);

			while (($diff->h * 60 + $diff->i) >= intval($service_duration)) {
				$available_hours[] = $current_hour->format('H:i');
				$current_hour->add(new DateInterval('PT' . $interval . 'M'));
				$diff = $current_hour->diff($end_hour);
			}
		}

		// If the selected date is today, remove past hours. It is important  include the timeout before
		// booking that is set in the back-office the system. Normally we might want the customer to book
		// an appointment that is at least half or one hour from now. The setting is stored in minutes.
		if (date('m/d/Y', strtotime($selected_date)) === date('m/d/Y')) {
			$book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');

			foreach($available_hours as $index => $value) {
				$available_hour = strtotime($value);
				$current_hour = strtotime('+' . $book_advance_timeout . ' minutes', strtotime('now'));
				if ($available_hour <= $current_hour) {
					unset($available_hours[$index]);
				}
			}
		}

		$available_hours = array_values($available_hours);
		sort($available_hours, SORT_STRING );
		$available_hours = array_values($available_hours);

		return $available_hours;
	}

    /**
     * Get multiple attendants hours.
     *
     * This method will add the extra appointment hours whenever a service accepts multiple attendants.
     *
     * @param array $available_hours The previously calculated appointment hours.
     * @param int $attendants_number Service attendants number.
     * @param int $service_id Selected service ID.
     * @param string $selected_date The selected appointment date.
     */
    protected function _get_multiple_attendants_hours(&$available_hours, $attendants_number, $service_id,
            $selected_date) {
        $this->load->model('appointments_model');

        $appointments = $this->appointments_model->get_batch(
            'id_services = ' . $this->db->escape($service_id) . ' AND DATE(start_datetime) = DATE('
            . $this->db->escape(date('Y-m-d', strtotime($selected_date))) . ')');

        foreach($appointments as $appointment) {
            $hour = date('H:i', strtotime($appointment['start_datetime']));
            $current_attendants_number = $this->appointments_model->appointment_count_for_hour($service_id,
                    $selected_date, $hour);
            if ($current_attendants_number < $attendants_number && !in_array($hour, $available_hours)) {
                $available_hours[] = $hour;
            }
        }

        $available_hours = array_values($available_hours);
		sort($available_hours, SORT_STRING );
		$available_hours = array_values($available_hours);
    }
	
	public function sitemap(){
        header("Content-type: text/xml");
        $xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/xml/sitemap.xml");
        echo $xml_file;
    }

    public function ajax_booking_confirm(){    	
    	$data=$this->load->view('_layouts/booking_confirm',$_POST, TRUE);
    	$this->output->set_output($data);
    	//$this->set_output($data);
    	//redirect('loadBookingPage',$_POST);
    }    
}

/* End of file appointments.php */
/* Location: ./application/controllers/appointments.php */
