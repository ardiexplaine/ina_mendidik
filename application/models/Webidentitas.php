<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class webidentitas extends CI_Model
{	
	var $table = 'web_identitas';
	
	function get($id = 1) {
        $query = $this->db->get_where($this->table,array('id'=>$id))->row();
        return $query;
    }

}