<div class="listing events-listing">
  <header class="listing-header">
    <h3>IM Events</h3>
  </header>
  <section class="listing-cont">
    <ul>
      <?php
        $replace = new Replace();
        $this->db->order_by('id_event','desc'); 
        $query = $this->db->get_where('event',array('publish' => 'publish'),5); 
        foreach ($query->result() as $row) : 
      ?>
      <li class="item event-item">
        <div class="event-date"> <span class="date"><?php echo substr($row->tanggal,8,2) ?></span> <span class="month"><?php echo substr(getBulan(substr($row->tanggal,5,2)),0,3); ?></span> </div>
        <div class="event-detail">
          <h4><a href="<?php echo base_url('event')."/".$row->id_event."/".$replace->CleanUrl($row->title); ?>"><?php echo $row->title;?></a></h4>
          <span class="event-dayntime meta-data"><?php echo $row->jam;?> </span> </div>
        <div class="to-event-url">
          <div><a href="<?php echo base_url('event')."/".$row->id_event."/".$replace->CleanUrl($row->title); ?>" class="btn btn-default btn-sm">Selengkapnya</a></div>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  </section>
</div>
<div class="spacer-30"></div>