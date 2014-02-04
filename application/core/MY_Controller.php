<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){

		parent::__construct();

	/*
		CHECK LOGGED IN IN ALL CONTROLLERS BUT AUTH */

		if(get_class($this) != 'Auth')
			$this->check_logged_in();
	}

/*
	CHECK FOR LOGIN */

	protected function check_logged_in(){

		$this->load->model('patoauth_model', 'patoauth');

		if(! $this->patoauth->is_logged_in())
			redirect(site_url('auth/login'));
	}
	
}