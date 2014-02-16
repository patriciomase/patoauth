<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	BASIC AUTHENTICATION AND REGISTRATION MODEL FOR CODEIGNITER

	AUTHOR PATRICIO GABRIEL MASEDA <patricio.mase@gmail.com>

	2014

	*/

class patoauth_model extends CI_Model{

	private $_CI;

	public function __construct(){

		parent::__construct();

		$this->_CI =& get_instance();

		$this->_CI->load->library('session');

	/*
		CHECK FOR DATABASE TABLE, IF NOT EXISTS THE TABLE WILL BE CREATED */

		if(! $this->db->table_exists('users'))
			$this->_create_database_table();
	}

	private function _create_database_table(){

		$this->db
			->query(	
				"CREATE TABLE `users`( 
					`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
					`username` VARCHAR(40) NOT NULL, 
					`password` VARCHAR(60) NOT NULL, 
					`fullname` VARCHAR(60) NOT NULL, 
					`lastlogin` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL, 
					PRIMARY KEY `id` (`id`) ) 
				DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;"
				);	
	}

	public function is_logged_in(){

		$current_user = $this->_CI->session->userdata('user');

		if( $current_user)
			return TRUE;

		return FALSE;
	}

	public function authenticate($username, $pass){

		$user = $this->db
			->where('username', $username)
			->where('password', sha1($pass))
			->get('users')
			->row();

		if(is_object($user)){

			$this->_CI->session->set_userdata('user', $user);			
			return $user;
		}

		return FALSE;
	}

	public function set_autologin($user){

	/*
		GENERATE RANDOM AUTOLOGIN KEY */

		$user->random_key = sha1(uniqid());

	/*
		UPDATE THE NEW RANDOM KEY */

		$this->db
			->where('id', $user->id)
			->update('users', (array) $user);

	/*
		SET THE COOKIE */

		$this->CI->input->set_cookie(array(
			'name'   => 'stk_ctrl',
			'value'  => $user->username . "|" . $random_key,
			'expire' => '86500',
			'domain' => site_url(),
			'path'   => '/',
			'prefix' => 'stk_ctrl_cook_',
			'secure' => TRUE
		));


	}

}

