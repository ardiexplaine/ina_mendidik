<ul class="isotope-grid" data-sort-id="gallery">
  <?php foreach ($tampil->result() as $row) : ?> 
  <li class="col-md-3 col-sm-3 grid-item post format-image">
    <div class="grid-item-inner"> <a href="<?php echo site_url(); ?>assets/uploads/gallery/<?php echo $row->images ?>" data-rel="prettyPhoto" class="media-box"> <img src="<?php echo site_url(); ?>assets/uploads/gallery/<?php echo $row->images ?>" alt="<?php echo $row->title;?>"> </a> </div>
  </li>
  <?php endforeach ?>
</ul>