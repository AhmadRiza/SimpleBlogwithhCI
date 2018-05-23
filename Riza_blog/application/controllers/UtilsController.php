<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilsController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subscriber');
		$this->load->helper(array('url'));

	}
    
    public function load404(){
        $this->load->helper('url');
		$this->load->view('errors/404');
	}

	public function sub()
	{
		if($this->input->post('email')){
			$this->subscriber->new_sub();
		}

		redirect(base_url());
	}


}
