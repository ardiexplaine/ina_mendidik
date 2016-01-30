<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MX_Controller {

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

		$crud->set_table('event');
		
		$crud->columns('title','jam','tanggal','detail_event','publish');

		$crud->required_fields('title','jam','tanggal','publish');

		$crud->fields('title','jam','tanggal','detail_event','maps','publish');


		$crud->set_subject('Events');
		$output = $crud->render();

		$data['subject'] = 'Events';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}


