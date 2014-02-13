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

	public function login(){

		$this->load->view('auth/login_form', $this->_data);
	}

}