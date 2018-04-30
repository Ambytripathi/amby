<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');

        // Set user's selected language.
        if ($this->session->userdata('language')) {
            $this->config->set_item('language', $this->session->userdata('language'));
            $this->lang->load('translations', $this->session->userdata('language'));
        } else {
            $this->lang->load('translations', $this->config->item('language')); // default
        }
    }
	
	public function pressList(){		
		$this->load->view('_layouts/press');
	}
}