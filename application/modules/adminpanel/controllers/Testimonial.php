<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends MX_Controller {

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

		$crud->set_table('testimonial');
		
		$crud->columns('foto','nama','profesi','pendapat');

		$crud->required_fields('foto','nama','profesi','pendapat');

		$crud->set_subject('Testimonial');
		$crud->set_field_upload('foto','assets/uploads/testimoni');



		$output = $crud->render();

		$data['subject'] = 'Testimonial';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}








