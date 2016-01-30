<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

  <!-- Your share button code -->
<header class="single-post-header clearfix">
  <div class="pull-right post-comments-count"></div>
  <h2 class="post-title"><?php echo $row->title; ?></h2>
</header>
<article class="post-content"> <span class="post-meta meta-data"><span><i class="fa fa-calendar"></i> <?php echo tgl_indo($row->date_publish);?></span><span><i class="fa fa-user"></i> <?php echo $row->author ?></span> <span><i class="fa fa-users"></i> <?php echo $row->viewer ?> dilihat</span></span>
  <div class="featured-image"> <img src="<?php echo site_url(); ?>assets/uploads/news/<?php echo $row->thumb ?>" alt=""> </div>
  <div class="fb-share-button" data-href="<?php echo $_SERVER["REQUEST_URI"];?>" data-layout="button_count"></div>
  <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://indonesiamendidik.org" data-via="ina_mendidik">Tweet</a>
  <p class="drop-caps secondary"><?php echo $row->content; ?></p>
</article>