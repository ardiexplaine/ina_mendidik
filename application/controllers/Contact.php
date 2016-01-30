<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public $layout = 'layout_sidebar';

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Contact us';
		$data['output'] = $this->load->view('widget/_contact','',TRUE);
		$this->load->view($this->layout,$data);
	}



}
