<?phpif ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	BASIC AUTHENTICATION AND REGISTRATION MODEL FOR CODEIGNITER

	AUTHOR PATRICIO GABRIEL MASEDA <patricio.mase@gmail.com>

	2014

	*/

class patoauth_model extends CI_Model{

	private $_CI;

	public function __contruct(){

		$this->_CI =& get_instance();

		$this->_CI->load->library('session');

	/*
		CHECK FOR DATABASE TABLE, IF NOT EXISTS THE TABLE WILL BE CREATED */

		if(! $this->_db->table_exists('users'))
			$this->_create_database_table();
	}

	private function _create_database_table(){

		$this->load->dbforge();

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
							  ),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
							  ),
			'password' => array(
				'type' =>'VARCHAR',
				'constraint' => '60',
							  ),
			'fullname' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
							  ),
			'lastlogin' => array(
				'type' => 'TIMESTAMP',
				'default' => 'CURRENT_TIMESTAMP',
							  ),
			);

		$this->dbforge
			->add_field($fields)
			->add_key('id', TRUE)
			->create_table('users');		
	}

	public function is_logged_in(){

		if(! empty($this->_CI->session->userdata('user')))
			return TRUE;

		return FALSE;
	}

}

