<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Wahyu Ardie 

class Volunteer extends CI_Controller {

	public $layout = 'layout_width';

	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->load->model('volunteer_model');
		$this->load->library('Recaptcha');
	}

	public function index()
	{
		$data['captcha'] = $this->recaptcha->getWidget();
        $data['script_captcha'] = $this->recaptcha->getScriptTag();
		$data['title'] = 'Volunteer';
		$data['output'] = $this->load->view('volunteer/form_regis',$data,TRUE);
		$this->load->view($this->layout,$data);

	}

	function save()
    {
        /* set the validation rule */
        $this->form_validation->set_rules('nama_lengkap', 'Nama Anda', 'trim|xss_clean|required');
        $this->form_validation->set_rules('email', 'Email Anda', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telpon Anda', 'trim|xss_clean|required|numeric');
        $this->form_validation->set_rules('kota', 'Kota Anda', 'trim|xss_clean|required');

        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        
         
        /* run the validation with the rule and recaptcha respons ins success */
        if ( $this->form_validation->run() === FALSE || !isset($response['success']) || $response['success'] <> true)
        {
            /* if return FALSE, it's mean the validation is fail */
            $str = '<div class="alert alert-danger"><strong>Terdapat beberapa kesalahan menginput</strong>' . validation_errors() .'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>0,'msg'=>$str ));
        }
        else
        {
            if($this->volunteer_model->cekEmailSama() == TRUE) {
                $str = '<div class="alert alert-danger"><strong> Terjadi Kesalahan :</strong> Email sudah digunakan pengguna lain. <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
                echo json_encode(array('st'=>0,'msg'=>$str ));
            }else {
                $this->volunteer_model->savedb();
                $email = $this->input->post('email');
                $str = '<div class="alert alert-success"><strong>Sukses :</strong> Sebuah link telah dikirimkan kealamat email anda <b>'.$email.'</b> silahkan buka email anda.
                        <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
                echo json_encode(array('st'=>1,'msg'=>$str));
                //print_r($_POST);
            }   	
        }
    }

    public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('provinsi_indo')->like('namakab',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->namakab,
				'id'	=>$row->id

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

	public function verified($token)
	{
		$getdata = $this->db->get_where('user_verifikasi',array('token'=>$token));
		if($getdata->num_rows()>0) {

			$data['title'] = 'Volunteer';
			$data['output'] = $this->load->view('volunteer/form_changePassword',$data,TRUE);
			$this->load->view('layout_width',$data);

		}else {
			redirect(base_url().'volunteer');
		}
	}

	function changepasswd()
    {
        /* set the validation rule */
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required');
        
         
        /* run the validation with the rule. */
        if ( $this->form_validation->run() === FALSE )
        {
            /* if return FALSE, it's mean the validation is fail */
            $str = '<div class="alert alert-danger"><strong>Terdapat beberapa kesalahan menginput :</strong>' . validation_errors() .'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>0,'msg'=>$str ));
        }
        else
        {
        	$this->volunteer_model->savepasswd();
            $str = '<div class="alert alert-info"><strong>Sukses :</strong> Pembuatan password berhasil, halaman akan berpindah dalam waktu 5 detik
            		<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>1,'msg'=>$str));
        }
    }

    function simlogin() {
    	/* set the validation rule */
    	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
         
        /* run the validation with the rule. */
        if ( $this->form_validation->run() === FALSE)
        {
            /* if return FALSE, it's mean the validation is fail */
            $str = '<div class="alert alert-danger"><strong>Terjadi kesalahan menginput :</strong>' . validation_errors() .'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            echo json_encode(array('st'=>0,'msg'=>$str ));
        }
        else
        {
        	if($this->volunteer_model->cekLogin() == FALSE) {
        		$str = '<div class="alert alert-danger">Username atau password salah!<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            	echo json_encode(array('st'=>0,'msg'=>$str ));
        	}else {
        		$str = '<div class="alert alert-info"><strong>Sukses :</strong> Login berhasil, halaman akan berpindah dalam waktu 3 detik
            		<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            	echo json_encode(array('st'=>1,'msg'=>$str));
        	}
            
        }
    }


}
