<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public $layout = 'layout_width';

	function __construct()
	{
		parent::__construct();
	}

	public function view($id)
	{
		$data['row'] = $this->db->get_where('pages',array('id_pages'=>$id))->row();
		$data['title'] = $data['row']->title;
		$data['output'] = $this->load->view('widget/_pages',$data,TRUE);
		$this->load->view($this->layout,$data);
	}



}
