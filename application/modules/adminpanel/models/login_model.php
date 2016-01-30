<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Login_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function cek_login($data)
	{
		$cek['username'] = $data['username'];
		$cek['password'] = md5($data['password'].$this->config->item("key_login"));
		$cek_login       = $this->db->get_where('usrmgr', $cek);
		
		if(count($cek_login->result())>0)
		{
			foreach($cek_login->result() as $row)
			{
				$sess_data['id_users'] 	   = $row->id_users;
				$sess_data['nama_lengkap'] = $row->nama_lengkap;
				$sess_data['username'] 	   = $row->username;
				$sess_data['level']	   	   = $row->level;
				$sess_data['login']        = TRUE;
				$this->session->set_userdata($sess_data);		
			}
			redirect('adminpanel/beranda');
		}
		else
		{
			$this->session->set_flashdata('message', $this->library->message('warning','Username dan password tidak benar!'));
			redirect('adminpanel/login');
		}
	}

}