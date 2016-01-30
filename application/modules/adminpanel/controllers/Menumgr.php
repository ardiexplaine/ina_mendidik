<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menumgr extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->getAcl();
		$this->auth->checkLogin();
		$this->load->library('grocery_CRUD');
		$this->load->library('Replace');
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('nav_menu');
	
		
		$crud->columns('title','parent','type','link_url');
		$crud->callback_column('link_url',array($this,'link_callback'));
		$crud->callback_column('maps',array($this,'maps_callback'));


		// $crud->callback_before_insert(array($this,'encrypt_password_callback'));
  // 		$crud->callback_before_update(array($this,'encrypt_password_callback'));

		$crud->set_subject('Main Menu');
		$crud->fields('title','parent','type','link_url','static_pages');

		$crud->set_relation('parent','nav_menu','title');
		$crud->set_relation('static_pages','pages','title');


		$crud->required_fields('title','type');
		//$crud->set_relation_n_n('access_control', 'usrmgr_access', 'modul', 'id_users', 'id_modul', 'nama_modul','priority');
		//$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$output = $crud->render();

		$data['subject'] = 'Menu Navigation';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}

	// public function lihat()
	// {
	// 	$data['output'] = $this->Menu_model->getMenu('0',$h='');
	// 	$data['subject'] = 'Menu Navigation';
	// 	$data['content'] = $this->load->view('crud.php',$data,true);
	// 	$this->load->view('base_theme',$data);
	// }

	function link_callback($value, $row)
	{
		$replace = new Replace();
		if($row->type=='link_url') {
			return site_url().$row->link_url.'.html';
		}else{
			$query = $this->db->get_where('pages',array('id_pages' =>$row->static_pages))->row();
			return site_url().'pages'.'/'.$row->static_pages.'/'.$replace->CleanUrl(substr($query->title,0,70)).'.html';
		}	
	    
	}


	// public function SubMenu()
	// {
	// 	$crud = new grocery_CRUD();

	// 	$crud->set_table('nav_menu');
	
		
	// 	$crud->columns('title','type');
	// 	//$crud->callback_column('link_url',array($this,'link_callback'));


	// 	// $crud->callback_before_insert(array($this,'encrypt_password_callback'));
 //  // 		$crud->callback_before_update(array($this,'encrypt_password_callback'));

	// 	$crud->set_subject('Main Menu');
	// 	$crud->fields('title','parent','type','link_url','static_pages');

	// 	$crud->set_relation('parent','nav_menu','title');
	// 	$crud->set_relation('static_pages','pages','title');


	// 	$crud->required_fields('title','type');
	// 	//$crud->set_relation_n_n('access_control', 'usrmgr_access', 'modul', 'id_users', 'id_modul', 'nama_modul','priority');
	// 	//$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

	// 	$output = $crud->render();

	// 	$data['subject'] = 'Menu Navigation';
	// 	$data['content'] = $this->load->view('crud.php',$output,true);
	// 	$this->load->view('base_theme',$data);

	// }
}
