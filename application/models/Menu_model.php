<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class menu_model extends CI_Model
{	
	var $table = 'nav_menu';
	
	public function menu_frontend($parent=0,$hasil,$cls_css=NULL)
	{
		$replace = new Replace();
		$where['parent']=$parent;
		$w = $this->db->get_where("nav_menu",$where);
		$w_q = $this->db->get_where("nav_menu",$where)->row();
		if(($w->num_rows())>0)
		{
			$hasil .= "<ul class='".$cls_css."'>";
		}
		foreach($w->result() as $h)
		{
			$where_sub['parent']=$h->id_menu;
			$w_sub = $this->db->get_where("nav_menu",$where_sub);
			if(($w_sub->num_rows())>0)
			{
				if($h->type=='link_url') {
					$hasil .= "<li><a href='".base_url()."".$h->link_url."'>".$h->title."</a>";
				}else{
					$spages = $this->db->get_where('pages',array('id_pages'=>$h->static_pages))->row();
					$hasil .= "<li><a href='".base_url('pages')."/".$h->static_pages."/".$replace->CleanUrl($spages->title).".html'>".$h->title."</a>";
				}
				
			}
			else
			{
				if($h->parent==0)
				{
					if($h->type=='link_url') {
						$hasil .= "<li><a href='".base_url()."".$h->link_url."'>".$h->title."</a>";
					}else{
						$spages = $this->db->get_where('pages',array('id_pages'=>$h->static_pages))->row();
						$hasil .= "<li><a href='".base_url('pages')."/".$h->static_pages."/".$replace->CleanUrl($spages->title).".html'>".$h->title."</a>";
					}
					
				}
				else
				{
					if($h->type=='link_url') {
						$hasil .= "<li><a href='".base_url()."".$h->link_url."'>".$h->title."</a>";
					}else{
						$spages = $this->db->get_where('pages',array('id_pages'=>$h->static_pages))->row();
						$hasil .= "<li><a href='".base_url('pages')."/".$h->static_pages."/".$replace->CleanUrl($spages->title).".html'>".$h->title."</a>";
					}
					
				}
			}
			$hasil = $this->menu_frontend($h->id_menu,$hasil);
			$hasil .= "</li>";
		}
		if(($w->num_rows)>0)
		{
			$hasil .= "</ul>";
		}
		return $hasil;
	}

}