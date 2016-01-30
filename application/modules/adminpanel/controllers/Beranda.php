<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkLogin();
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		//$data['tampil'] = $this->Kategoridata_model->getAlljpg();
		$data['content'] = 'beranda';
		$this->load->view('base_theme',$data);
	}

}
