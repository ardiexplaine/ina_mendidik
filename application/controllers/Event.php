<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public $layout = 'layout_sidebar';

	function __construct()
	{
		parent::__construct();
	}

	public function view($id)
	{
		$data['row'] = $this->db->get_where('event',array('id_event'=>$id))->row();
		$data['title'] = 'IM Event';
		$data['output'] = $this->load->view('event/index',$data,TRUE);
		$this->load->view($this->layout,$data);
	}



}
