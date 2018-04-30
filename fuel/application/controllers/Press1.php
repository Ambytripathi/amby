<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Press1 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('installation');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();

        // Set user's selected language.
		if ($this->session->userdata('language')) {
			$this->config->set_item('language', $this->session->userdata('language'));
			$this->lang->load('translations', $this->session->userdata('language'));
		} else {
			$this->lang->load('translations', $this->config->item('language')); // default
		}		
	}

	public function press1(){
		echo "hello";
	}
}


?>