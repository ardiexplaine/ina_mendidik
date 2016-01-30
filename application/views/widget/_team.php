</div>
<?php foreach ($tampil->result() as $row) : ?>
<div class="col-md-4 col-sm-4">
  <div class="grid-item staff-item">
    <div class="grid-item-inner">
      <div class="media-box"> <img src="<?php echo site_url();?>assets/uploads/team/<?php echo $row->foto ?>" alt=""> </div>
      <div class="grid-content">
        <h3><?php echo $row->nama_lengkap; ?></h3>
        <nav class="social-icons"> 
          <a href="<?php echo $row->facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a> 
          <a href="<?php echo $row->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a> 
          <a href="<?php echo $row->google; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>  
        </nav>
        <p><?php echo $row->about; ?></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>