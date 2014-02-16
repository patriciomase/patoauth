<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	AUTHOR:		PATRICIO GABRIEL MASEDA - <PATRICIO.MASE@GMAIL.COM> */
	

class Auth extends MY_Controller {

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		self::login();
	}

/*
	SHOW THE LOGIN FORM */

	public function login(){

		$this->_data['scripts'][] = base_url('assets/js/auth.js');

		$this->load->view('auth/login_form', $this->_data);
	}

/*
	LOGIN FUNCTION TO CALL VIA AJAX */

	public function process(){

		header('Content-Type: application/json');

		$this->load->library('form_validation');
		$this->load->model('patoauth/patoauth_model', 'patoauth');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())
			if($user = $this->patoauth->authenticate(set_value('username'), set_value('password'))){

				if(! $this->input->post('remember'))
					$this->patoauth->set_autologin($user);

				die(json_encode(array('result' => TRUE)));				
			}


		die(json_encode(array('result' => FALSE)));
	}

}