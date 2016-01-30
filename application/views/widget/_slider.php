<div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
	<ul class="slides">
	<?php $query = $this->db->get_where('slider',array('publish' => 'publish')); 
		foreach ($query->result() as $row) : 
	?>
	  <li class="parallax" style="background-image:url(<?php echo site_url(); ?>assets/uploads/img_slider/<?php echo $row->img_slider ?>"></li>
	<?php endforeach;?>
	</ul>
</div>