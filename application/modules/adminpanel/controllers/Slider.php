<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MX_Controller {

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

		$crud->set_table('slider');
		
		$crud->columns('img_slider','subject','deskripsi','publish');

		$crud->required_fields('img_slider','publish');

		$crud->set_subject('Images Slider');
		$crud->fields('subject','deskripsi','img_slider','publish');
		$crud->set_field_upload('img_slider','assets/uploads/img_slider');

		$output = $crud->render();

		$data['subject'] = 'Images SLider';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}
