<header class="single-post-header clearfix">
  <h2 class="post-title"><?php echo $row->title ?></h2>
</header>
<article class="post-content">
  <div class="event-description">
    <?php echo $row->maps ?>
    <div class="spacer-20"></div>
    <div class="row">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Event details</h3>
          </div>
          <div class="panel-body">
            <ul class="info-table">
              <li><i class="fa fa-calendar"></i> <strong><?php echo nama_hari($row->tanggal);?></strong> | <?php echo tgl_indo($row->tanggal);?></li>
              <li><i class="fa fa-clock-o"></i> <?php echo $row->jam ;?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <p><?php echo $row->detail_event ?></p>
  </div>
</article>