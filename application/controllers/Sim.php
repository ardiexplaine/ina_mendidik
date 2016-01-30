<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sim extends CI_Controller {

	public $cols2 = 'layout_sim_col-2';
	public $cols3 = 'layout_sim_col-3';

	function __construct()
	{
		parent::__construct();
		$this->auth->checkUserLogin();
		$this->load->helper('security');
		$this->load->model('sim_model');
		$this->load->library('pagination');  
	}

    
    public function index() {           
        
        $data['title'] = 'Sahabat Indonesia Mendidik';

        $data['output'] = $this->load->view('sim/form_biodata','',TRUE);
		
		$this->load->view($this->cols2,$data);
    }

    public function save_biodata() {
    	/* set the validation rule */
        $this->form_validation->set_rules('nama_lengkap', 'Nama Anda', 'trim|xss_clean|required');
        $this->form_validation->set_rules('email', 'Email Anda', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telpon Anda', 'trim|xss_clean|required|numeric');
        $this->form_validation->set_rules('kota', 'Kota Anda', 'trim|xss_clean|required');
        
         
        /* run the validation with the rule and recaptcha respons ins success */
        if ( $this->form_validation->run() == FALSE)
        {
            /* if return FALSE, it's mean the validation is fail */
            $str = '<div class="alert alert-danger"><strong>Terdapat beberapa kesalahan menginput</strong>' . validation_errors() .'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>0,'msg'=>$str ));
        }
        else
        {
        	$this->sim_model->updatebiodata();
        	$email = $this->input->post('email');
            $str = '<div class="alert alert-success"><strong>Sukses :</strong> Biodata berhasil diupdate.
            		<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>1,'msg'=>$str));
        }
    }

    public function upload_file()
    {
        //print_r($_POST); print_r($_FILES);    
        $config['upload_path'] = './assets/uploads/volunteer/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 512;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload())
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');

            $str = '<div class="alert alert-danger"><strong>Terdapat beberapa kesalahan menginput</strong>' . $msg .'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>0,'msg'=>$msg ));
        }
        else
        {
            unlink("./assets/uploads/volunteer/".$_POST['photo_lama']);
            $data = $this->upload->data();
            $this->sim_model->uploadprofilpicture($data['file_name'], $_POST['user_id']);

            $str = '<div class="alert alert-success"><strong>Sukses :</strong> Biodata berhasil diupdate.
                    <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>1,'msg'=>$str));
        }
    }

   	public function index2() {           

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
        
        $data['title'] = 'Sahabat Indonesia Mendidik';

        $data['output'] = $this->load->view('sim/form_edit_biodata',$data,TRUE);
		
		$this->load->view($this->cols2,$data);
    }

    function logout()
	{	
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}
