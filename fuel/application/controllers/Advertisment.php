<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
class Advertisment extends CI_Controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('email');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('Advertisment_model');
    }

   /* public function index()
    {
        $id = $this->uri->segment(1);
        $id_length = strlen($id);
        if($id_length == 3){
        	$id = substr($id, -1);
        } else {
            $id = substr($id, -2);
        }
        $town = $this->uri->segment(2);
        $data['town'] = $town;
        $data['clinic_detail'] = $this->Advertisment_model->getClinicDetails($id);
        $this->load->view('advertisment/home', $data);
    }*/
    public function index()
    {
        $slug = $this->uri->segment(2);
        $town = "";
        $id = 1;
         if ($slug == "bradford") {
			
            $id = 1;
            $town = "Bradford";
        } else if ($slug == "oxford") {
             $id = 2;
             $town = "Oxford";
        } else if ($slug == "willesden-london") {
             $id = 3;
             $town = "Willesden, London";
        } else if ($slug == "isleworth-london") {
             $id = 4;
             $town = "Isleworth, London";
        } else if ($slug == "nottingham") {
             $id = 5;
             $town = "Nottingham";
        } else if ($slug == "bristol") {
             $id = 6;
             $town = "Bristol";
        } else if ($slug == "leeds") {
             $id = 7;
             $town = "Leeds";
        } else if ($slug == "east-kilbride") {
             $id = 8;
             $town = "East Kilbride";
        }else if ($slug == "glasgow") {
             $id = 9;
             $town = "Glasgow";
        }else if ($slug == "edinburgh") {
             $id = 10;
             $town = "Edinburgh";
        }else if ($slug == "sheffield") {
             $id = 11;
             $town = "Sheffield";
        }else if ($slug == "cambridge") {
             $id = 12;
             $town = "Cambridge";
        }else if ($slug == "dundee") {
             $id = 13;
             $town = "Dundee";
        }else if($slug == "sheppey-hospital-clinic"){
			 $id = 14;
			 $town = "Sheppey";
		}
		//echo $id;
       /* $id_length = strlen($id);
        print_r($id);exit;
        if($id_length == 7){
        	//if($id_length == 3){
			
        	$id = substr($id, -1);
        } else {
            $id = substr($id, -2);//print_r($id);exit;
        }
        $town = $this->uri->segment(2);
        print_r($town);exit;*/
        $data['town'] = $town;
		
        $data['clinic_detail'] = $this->Advertisment_model->getClinicDetails($id);
        $this->load->view('advertisment/home', $data);
    }

}

/* End of file appointments.php */
/* Location: ./application/controllers/appointments.php */
