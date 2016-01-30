<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usrmgr extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->getAcl();
		$this->auth->checkLogin();
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('usrmgr');
		
		$crud->change_field_type('password','password');
		$crud->callback_edit_field('password',array($this,'decrypt_password_callback'));
		
		$crud->columns('username','nama_lengkap','email','level','blokir');


		$crud->callback_before_insert(array($this,'encrypt_password_callback'));
  		$crud->callback_before_update(array($this,'encrypt_password_callback'));

		$crud->set_subject('Users');
		$crud->fields('nama_lengkap','username','password','email','level','access_control','blokir');
		$crud->required_fields('nama_lengkap','username','level','blokir');
		$crud->set_relation_n_n('access_control', 'usrmgr_access', 'modul', 'id_users', 'id_modul', 'nama_modul','priority');
		//$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$output = $crud->render();

		$data['subject'] = 'Pengaturan Pengguna';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}

	function encrypt_password_callback($post_array, $primary_key = null,$row)
	{
		if($post_array['password']=='') {
			$post_array['password'] = $row['password'];
		}else{		
			$post_array['password'] = md5($post_array['password'].$this->config->item("key_login"));
		}    
	    return $post_array;
	}

	function decrypt_password_callback($value, $primary_key)
	{
	  return "<input type='password' name='password' value='' /> <br/> *) Kosongkan Password jika tidak dirubah";
	}
}
