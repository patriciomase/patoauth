<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $_data = array();

	public function __construct(){

		parent::__construct();

		//$this->output->enable_profiler(TRUE);

	/*
		CHECK LOGGED IN IN ALL CONTROLLERS BUT AUTH */

		if(get_class($this) != 'Auth')
			$this->check_logged_in();

		$this->_data['styles'] = array();
		$this->_data['scripts'] = array();

		$this->_data['styles'][] = base_url('assets/css/bootstrap.min.css');

		$this->_data['scripts'][] = base_url('assets/vendor/jquery-1.11.1.min.js');
		$this->_data['scripts'][] = base_url('assets/vendor/bootstrap.min.js');
		$this->_data['scripts'][] = base_url('assets/js/common.js');
	}

/*
	CHECK FOR LOGIN */

	protected function check_logged_in(){

		$this->load->model('patoauth/patoauth_model', 'patoauth');

	/*
		TRY TO AUTOLOGIN */

		if(! $this->patoauth->is_logged_in())
			$this->patoauth->autologin();

	/*
		IF STILLS NO LOGGED IN GET OUT OF HERE */

		if(! $this->patoauth->is_logged_in())
			redirect(site_url('auth/login'));
	}

}