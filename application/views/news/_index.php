<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 
$replace = new Replace();
foreach ($tampil as $row): ?>
<article class="post">
  <div class="row">
    <div class="col-md-4 col-sm-4"> <a href="<?php echo site_url(); ?>assets/uploads/news/<?php echo $row->thumb ?>" class="media-box" data-rel="prettyPhoto[Gallery]"><img src="<?php echo site_url(); ?>assets/uploads/news/<?php echo $row->thumb ?>" alt="<?php echo $row->title; ?>" class="img-thumbnail"></a> </div>
    <div class="col-md-8 col-sm-8">
      <h3><a href="<?php echo base_url('news')."/".$row->id_news."/".$replace->CleanUrl($row->title); ?>"><?php echo $row->title; ?></a></h3>
      <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> <?php echo tgl_indo($row->date_publish);?></span><span><i class="fa fa-user"></i> <?php echo $row->author ?></span> <span><i class="fa fa-users"></i> <?php echo $row->viewer ?> dilihat</span></span>
      <p><?php echo substr(html_entity_decode(htmlentities(utf8_decode(strip_tags($row->content)))),0,200); ?> </p>
      <p><a href="<?php echo base_url('news')."/".$row->id_news."/".$replace->CleanUrl($row->title); ?>" class="btn btn-primary">Lanjutkan Membaca <i class="fa fa-long-arrow-right"></i></a></p>
    </div>
  </div>
</article>
<?php endforeach ?>

<!-- <ul class="pagination">
  <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
</ul> -->
<?php echo $this->pagination->create_links(); ?>
