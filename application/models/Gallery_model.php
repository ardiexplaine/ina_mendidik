<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class gallery_model extends CI_Model
{	
	var $table = 'gallery';
	
	function all_data($offset = 0) {
        $query = $this->db->query('Select *,(Select images from gallery_pictures where id_gallery=a.id ORDER BY id ASC limit 1 offset 0) cover from gallery a 
                where a.publish="publish" ORDER BY a.id ASC limit 10 offset '.$offset.' ');
        return $query;
    }
    
    function getDataBy($limit,$offset,$ordercol = 'id',$orderby = 'DESC') {
        $query = $this->db->query('Select *,(Select images from gallery_pictures where id_gallery=a.id ORDER BY id ASC limit 1 offset 0) cover from gallery a 
                where a.publish="publish" ORDER BY a.id DESC limit '.$limit.' offset '.$offset.' ');
        // return $query;

        // $this->db->where('publish','publish');
        // $this->db->order_by($ordercol,$orderby);
        // $this->db->limit($limit,$offset);
        // $query = $this->db->get($this->table);
        return $query->result();
    }

}