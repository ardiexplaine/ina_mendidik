<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public $layout = 'layout_width';

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$this->db->order_by('id_team','ASC');
		$data['tampil'] = $this->db->get('team');
		$data['title'] = 'Our Team';
		$data['output'] = $this->load->view('widget/_team',$data,TRUE);
		$this->load->view($this->layout,$data);
	}



}
