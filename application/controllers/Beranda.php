<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public $layout = 'layout_beranda';

	function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$this->load->view($this->layout);
	}



}
