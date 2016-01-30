<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer extends MX_Controller {

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

		$crud->set_table('volunteer');
		
		$crud->columns('foto','nama_lengkap','no_tlp','email','kota');

		$crud->required_fields('nama_lengkap','kota','no_tlp','email');

		$crud->set_relation('kota','provinsi_indo','namakab');

		$crud->set_field_upload('foto','assets/uploads/volunteer');

		$crud->set_subject('Volunter');
		$output = $crud->render();

		$data['subject'] = 'Volunter';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}
