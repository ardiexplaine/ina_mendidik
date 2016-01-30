<div class="col-md-3 col-sm-3">
	<h4>Albums gallery</h4>
	<a href="<?php echo site_url() ?>gallery" class="btn btn-default btn-lg">More Gallery</a> 
</div>
<?php
$this->db->group_by('id_gallery');
$this->db->order_by('id','DESC');
$query = $this->db->get('gallery_pictures',3);
foreach($query->result() as $row) :
?> 
<div class="col-md-3 col-sm-3 post format-image"> <a href="<?php echo site_url(); ?>assets/uploads/gallery/<?php echo $row->images ?>" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="<?php echo site_url(); ?>assets/uploads/gallery/<?php echo $row->images ?>" alt=""> </a> </div>
<?php endforeach ?>