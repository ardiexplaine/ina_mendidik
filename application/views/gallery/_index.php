<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="grid-holder col-3 events-grid">
  <?php $replace = new Replace();
  foreach ($tampil as $row): ?>
  <li class="grid-item format-standard">
    <div class="grid-item-inner"> <a href="<?php echo base_url('gallery')."/".$row->id."/".$replace->CleanUrl($row->subject); ?>" class="media-box"> <img src="<?php echo site_url(); ?>assets/uploads/gallery/<?php echo $row->cover ?>" alt=""> </a>
      <div class="grid-content">
        <h3><a href="<?php echo base_url('gallery')."/".$row->id."/".$replace->CleanUrl($row->subject); ?>"><?php echo $row->subject; ?></a></h3>
        <p><?php echo $row->deskripsi; ?></p>
      </div>
      <ul class="info-table">
        <li><i class="fa fa-calendar"></i>Terakhir diupdate <?php echo tgl_indo($row->last_update);?></li>
      </ul>
    </div>
  </li>
  <?php endforeach ?>
</ul>
<?php echo $this->pagination->create_links(); ?>
