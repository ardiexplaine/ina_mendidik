<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {

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

		$crud->set_table('pages');
		
		$crud->columns('title','content','publish','view');

		$crud->required_fields('title','content','publish');

		$crud->fields('title','content','publish');


		$crud->set_subject('Static Pages');
		$output = $crud->render();

		$data['subject'] = 'Static Pages';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}
}

