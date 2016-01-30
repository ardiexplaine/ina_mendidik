<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public $layout = 'layout_sidebar';

	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('pagination');  
	}

    
    public function index() {           

        $hal = number_format($this->uri->segment(3));
        $per_page = 5;
        
        // Set Pagination
        $pcfg = array(
            'base_url' => base_url('news') . '/page/',
            'per_page' => $per_page,
            'total_rows' => $this->news_model->all_data(),
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
            'tampil' => $this->news_model->getDataBy($per_page,$hal),
            'jmldata' => $pcfg['total_rows'],
        );
        
        $data['title'] = 'News';
		$data['output'] = $this->load->view('news/_index',$data,TRUE);
		$this->load->view($this->layout,$data);
    }

    public function page() {
        $this->index();
    }

   	public function view($id)
	{
		$this->news_model->hitPages($id); // update hit pages
		$data['row'] = $this->db->get_where('news',array('id_news'=>$id,'publish' => 'publish'))->row();
		$data['title'] = 'News';
		$data['output'] = $this->load->view('news/_detail',$data,TRUE);
		$this->load->view($this->layout,$data);
	}
}
