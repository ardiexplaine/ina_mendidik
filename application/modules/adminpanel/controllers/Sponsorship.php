<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsorship extends MX_Controller {

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

		$crud->set_table('sponsorship');
		
		$crud->columns('logo','sponsorship','web');

		$crud->required_fields('logo','sponsorship','web');

		$crud->set_subject('Sponsorship');
		$crud->set_field_upload('logo','assets/uploads/sponsorship');



		$output = $crud->render();

		$data['subject'] = 'Sponsorship';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}








