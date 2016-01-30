<div class="listing post-listing">
  <header class="listing-header">
    <h3>IM News</h3>
  </header>
  <section class="listing-cont">
    <ul>
      <?php
        $replace = new Replace();
        $this->db->order_by('id_news','desc'); 
        $query = $this->db->get_where('news',array('publish' => 'publish'),5); 
        foreach ($query->result() as $row) : 
      ?>
      <li class="item post">
        <div class="row">
          <div class="col-md-4"> <a href="<?php echo site_url(); ?>assets/uploads/news/<?php echo $row->thumb ?>" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="<?php echo site_url(); ?>assets/uploads/news/<?php echo $row->thumb ?>" alt="" class="img-thumbnail"> </a></div>
          <div class="col-md-8">
            <div class="post-title">
              <h2><a href="<?php echo base_url('news')."/".$row->id_news."/".$replace->CleanUrl($row->title); ?>"><?php echo $row->title; ?></a></h2>
              <span class="meta-data"><i class="fa fa-calendar"></i> <?php echo tgl_indo($row->date_publish);?> | <i class="fa fa-user"></i> <?php echo $row->author ?> | <i class="fa fa-users"></i> <?php echo $row->viewer ?> dilihat</span>
            </div>
            <p><?php echo substr(html_entity_decode(htmlentities(utf8_decode(strip_tags($row->content)))),0,200); ?> ...</p>
          </div>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  </section>
</div>