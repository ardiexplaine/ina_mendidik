<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends MX_Controller {

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

		$crud->set_table('web_identitas');
		
		$crud->columns('nama_website','meta_deskripsi','meta_keyword','favicon','theme','logo');

		$crud->required_fields('nama_website','meta_deskripsi','meta_keyword');

		$crud->set_subject('Identitas Website');
		$crud->fields('nama_website','meta_deskripsi','meta_keyword','copyright','favicon','theme','logo','google_analytics','profil');
		$crud->set_field_upload('favicon','assets/uploads/identitas');
		$crud->set_field_upload('logo','assets/uploads/identitas');
		$crud->unset_texteditor('google_analytics','full_text');

		$crud->unset_add();
		$crud->unset_delete();
		


		$output = $crud->render();

		$data['subject'] = 'Identitas Website';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}

	function get($id = 1) {
        $query = $this->db->get_where($this->table,array('id'=>$id))->row();
        return $query;
    }
}








