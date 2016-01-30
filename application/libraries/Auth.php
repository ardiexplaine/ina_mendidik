<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| PortFolio Ardie xpLaiNe CodeIgniter Version 2.1.3                 |
| -------------------------------------------------------------------
| Development by : Wahyu Ardie                                      |
| Start in       : 19 Januari 2013							        |
| -------------------------------------------------------------------
*/

class Auth {
	
    var $CI;

    // echo $this->router->fetch_class(); // class = controller
    //     echo $this->router->fetch_method();

    function __construct() {
        $this->CI =& get_instance();
    }

    function no_cache()
    {
        $this->CI->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT+7');
        $this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->CI->output->set_header('Pragma: no-cache');
    }

    public function getModuleAccess()
    {
        // Get ID Modul
        $mdl = $this->CI->router->fetch_class();
        $get = $this->CI->db->get_where('modul', array('class_name'=>$mdl))->row();
        return $get->id_modul;
    }

    public function getAcl()
    {
        $query = $this->CI->db->get_where('usrmgr_access', array(
            'id_users'  => $this->CI->session->userdata('id_users'),
            'id_modul'=> $this->getModuleAccess()
        ));
        if(count($query->result())>0)
        {
            return TRUE;
        }
        else
        {
            show_404();
            //return FALSE;
            //redirect('/admin/errorpages');            
        }
    }

    function isLogin() {
        if ($this->CI->session->userdata('login') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	function isUser() {
        if ($this->CI->session->userdata('level') == 'user') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function isAdmin() {
        if ($this->CI->session->userdata('level') == 'admin') {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	function checkLogin() {
        $this->no_cache();
		// Jika Auth Login dan berlevel user atau admin
        if (($this->isLogin() AND $this->isUser() || $this->isAdmin()) != TRUE) {
            $this->CI->session->set_flashdata('Error', 'Maaf, Anda belum login!');
            redirect('adminpanel/login');
        }
    }

    function checkUserLogin() {
        $this->no_cache();
        if ($this->CI->session->userdata('sim_login') != TRUE) {
            redirect(site_url());
        }
    }

}