<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public $layout = 'layout_width';

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('gallery_model');
		$this->load->library('pagination'); 
	}

    
    public function index() {   

    	$hal = number_format($this->uri->segment(3));
        $per_page = 10;
        
        // Set Pagination
        $pcfg = array(
            'base_url' => base_url('gallery') . '/page/',
            'per_page' => $per_page,
            'total_rows' => $this->gallery_model->all_data()->num_rows(),
            'first_link' => 'Awal',
            'last_link' => 'Akhir',
            'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'prev_link' => '&laquo;',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
        );

        $this->pagination->initialize($pcfg);

        $data = array(
            'tampil' => $this->gallery_model->getDataBy($per_page,$hal),
            'jmldata' => $pcfg['total_rows'],
        );        

		$data['title']  = 'Gallery';
		$data['output'] = $this->load->view('gallery/_index',$data,TRUE);
		$this->load->view($this->layout,$data);
    }

    public function page() {
        $this->index();
    }

    public function view($id)
	{
		$data['tampil'] = $this->db->get_where('gallery_pictures',array('id_gallery'=>$id));
		$data['title'] = $this->db->get_where('gallery',array('id'=>$id))->row()->subject;
		$data['output'] = $this->load->view('gallery/_detail',$data,TRUE);
		$this->load->view($this->layout,$data);
	}

}
