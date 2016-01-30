<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends MX_Controller {

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

		$crud->set_table('modul');
		
		$crud->columns('nama_modul','class_name','level','icon');

		$crud->required_fields('nama_modul','class_name','level');

		$crud->set_subject('Modul Manager');
		$crud->fields('nama_modul','class_name','level','icon');

		// $crud->unset_add();
		// $crud->unset_delete();


		$output = $crud->render();

		$data['subject'] = 'Modul Manager';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}








