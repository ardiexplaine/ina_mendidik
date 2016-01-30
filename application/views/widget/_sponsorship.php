<div class="notice-bar">
	<div class="container">
		<div class="row"> 
		    <!-- Start Featured Blocks -->
		    <div class="featured-blocks clearfix">
		    <?php
		    $this->db->order_by('id','ASC'); 
		    $query = $this->db->get('sponsorship');
		    foreach($query->result() as $row) :
		    ?>
		      <div class="col-md-2 col-sm-4 featured-block"> <a href="<?php echo $row->web ?>" target="_blank" class="img-thumbnail"> <img src="<?php echo site_url() ?>assets/uploads/sponsorship/<?php echo $row->logo ?>" alt="staff">  </a> </div>
		    <?php endforeach ?>
		    </div>
		    <!-- End Featured Blocks --> 
  		</div>
  	</div>
</div>