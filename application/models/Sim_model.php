<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class sim_model extends CI_Model
{	

	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
	
	function updatebiodata() {
		// Input data ke table master volunter
        $data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'sex' => $this->input->post('sex'),
			'email' => $this->input->post('email'),
			'no_tlp' => $this->input->post('no_tlp'),
			'kota' => $this->input->post('id_kota'),
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'linkedin' => $this->input->post('linkedin'),
			'website' => $this->input->post('website'),
			'tentang_saya' => $this->input->post('tentang_saya')
		);

		$this->db->where('id', $this->input->post('id'));
        $this->db->update('volunteer', $data);
    }

    function send_mail($token)
	{
		$getMail = $this->input->post('email');
		/*$config = Array(
		   'protocol'     => 'smtp',
		   'smtp_host'    => 'ssl://smtp.googlemail.com',
		   'smtp_port'    => 465,
		   'smtp_user'    => 'hotspot.stiami@gmail.com',
		   'smtp_pass'    => 'Stiami2013',
		   'mailtype'     => 'html',
		   'charset'      => 'iso-8859-1',
		   'newline'      => "\r\n"
		); */

		$config = Array(
		   'protocol'     => 'smtp',
		   'smtp_host'    => 'ssl://thor.iixplanet.com',
		   'smtp_port'    => 465,
		   'smtp_user'    => 'no-reply@indonesiamendidik.org',
		   'smtp_pass'    => 'P@ssw0rdmail',
		   'mailtype'     => 'html',
		   'charset'      => 'iso-8859-1',
		   'newline'      => "\r\n"
		);

		$this->load->library('email', $config);
		 
		$this->email->from('no-reply@indonesiamendidik.org', 'Indonesia Mendidik');
		$this->email->to($getMail);

		$this->email->subject('Verifikasi Akun Sahabat Indonesia Mendidik');
		$mail = $this->template_email($token);
		$this->email->message($mail);
		 
		$this->email->send();
	}

	public function template_email($token)
	{	
		$hasil = '';
		$hasil = '<p>=======================================================================================<br />
					Email ini dikirimkan dari email address yang tidak dimonitor, mohon tidak melakulan reply.<br />
					========================================================================================</p>

					<p>Haloo, '.$this->input->post('nama_lengkap').'</p>

					<p>Anda telah melakukan registrasi pada website Indonesia Mendidik pada tanggal '.tgl_indo(date('Y-m-d')).' <br />
					lakukan verifikasi dengan mengklik link berikut dibawah ini :<br />
					&nbsp;<br />
					http://indonesiamendidik.org/volunteer/verified/'.$token.'/


					<p>Terimakasih<br />
					Administrator Indonesia Mendidik</p>
					';
		
		return $hasil;
	}

	public function createRandomString()
	{
		$panjang = 30;
		$karakter= '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$string = '';
		    for ($i = 0; $i < $panjang; $i++) {
		  		$pos = rand(0, strlen($karakter)-1);
		  		$string .= $karakter{$pos};
		    }
		return $string;
	}

	public function savepasswd() {
		
		$getToken = $this->input->post('token');
		$query = $this->db->query('Select * from volunteer a join user_verifikasi b on a.id=b.user_id where b.token="'.$getToken.'" ');

		$vol = $query->row();

		$data = array(
		'password' => $this->encrypt->encode($this->input->post('password')),
		'verifikasi' => 2
		);
		
        $this->db->where('id', $vol->user_id);
        $this->db->update('volunteer', $data);


		$sess_data['user_id'] 	  = $vol->user_id;
		$sess_data['vol_nama']    = $vol->nama_lengkap;
		$sess_data['photo_pro']   = $vol->foto;
		$sess_data['sim_login']   = TRUE;
		$this->session->set_userdata($sess_data);

		// Hapus Token Verifikasi email
		$this->db->delete('user_verifikasi',array('user_id'=>$vol->user_id));

	}

	function uploadprofilpicture($filename, $user_id) {
		$data = array(
            'foto'      => $filename
        );
        $this->db->where('id',$user_id);
        $this->db->update('volunteer', $data);
        return $this->db->insert_id();
	}


}