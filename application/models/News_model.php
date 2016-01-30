<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class news_model extends CI_Model
{	
	var $table = 'news';
	
	function all_data() {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
    
    function getDataBy($limit,$offset,$ordercol = 'id_news',$orderby = 'DESC') {
        $this->db->where('publish','publish');
        $this->db->order_by($ordercol,$orderby);
        $this->db->limit($limit,$offset);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function getDatabyID($id) {
    	$this->db->where('id_news',$id);
		return  $query = $this->db->get($this->table);
    }

    function hitPages($id) {

    	$data['viewer'] = $this->getDatabyID($id)->row()->viewer+1;
		$this->db->update($this->table,$data,array('id_news'=>$id));
    }

}