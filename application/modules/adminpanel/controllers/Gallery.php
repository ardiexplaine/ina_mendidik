<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->getAcl();
		$this->auth->checkLogin();
		$this->load->library('grocery_CRUD');
		$this->load->helper('url');
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('gallery');
		
		$crud->columns('subject','publish','creator','last_update');

		$crud->required_fields('subject','publish');

		$crud->callback_after_insert(array($this,'log_user'));
		$crud->callback_after_update(array($this,'log_user'));

		$crud->set_subject('Gallery Album');
		$crud->fields('subject','deskripsi','publish');
		$crud->add_action('Smileys', base_url().'assets/uploads/pictures.png', 'adminpanel/gallery/uploadPicture');

		$output = $crud->render();

		$data['subject'] = 'Gallery Album';
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);

	}


	function log_user($post_array,$primary_key)
	{
	    $user_logs_update = array(
	        "creator" =>$this->session->userdata('username'),
        	"last_update" => date('Y-m-d')
	    );
	 
	    $this->db->update('gallery',$user_logs_update,array('id' => $primary_key));
	 
	    return true;
	}

	function uploadPicture($id)
	{
		$image_crud = new Image_crud();
	
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('images');
		$image_crud->set_title_field('title');
		$image_crud->set_table('gallery_pictures')
			->set_relation_field('id_gallery')
			->set_ordering_field('priority')
			->set_image_path('assets/uploads/gallery');
			
		$output = $image_crud->render();

		$data['subject'] = 'Gallery Album';
		$data['subtitle'] = $this->db->get_where('gallery',array('id' =>$id))->row()->subject;
		$data['content'] = $this->load->view('crud.php',$output,true);
		$this->load->view('base_theme',$data);
	}
}
