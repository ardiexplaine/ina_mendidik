<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MX_Controller {

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

		$crud->set_table('team');
		
		$crud->columns('foto','nama_lengkap','jabatan','about');

		$crud->required_fields('foto','nama_lengkap','jabatan','about');

		$crud->set_field_upload('foto','assets/uploads/team');

		$crud->set_subject('Meet The Team');
		$output = $crud->render();

		$data['subject'] = 'Meet The Team';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}

