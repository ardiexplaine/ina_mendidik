<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MX_Controller {

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

		$crud->set_table('news');
		
		$crud->columns('title','date_publish','author','publish','viewer');

		$crud->required_fields('title','date_publish','content','author','publish');

		$crud->fields('title','date_publish','thumb','content','author','publish');

		$crud->set_field_upload('thumb','assets/uploads/news');


		$crud->set_subject('IM News');
		$output = $crud->render();

		$data['subject'] = 'IM News';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}
