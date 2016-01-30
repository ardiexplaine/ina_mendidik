<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('header');?>
<?php $this->load->view('widget/_title');?>
<script type="text/javascript"> 
  $(function(){   // make all script running after all DOM doc. is is loading
      /* bind on submit event */
      $('#frm').submit(function(){
          /* AJAX Request with method "POST" */
          $.post($('#frm').attr('action'), $('#frm').serialize(), function(json){
              /* if validation succes the 'st' will be 1 and 0 if validation failed */
              if ( json.st == 0 ){
                  $('#msg-container').html(json.msg);
              } else {
                  //alert(json.msg);
                  $("#msg-container").html(json.msg); 
                  $('#frm').each(function(){
                      this.reset();
                  });; 
              }
          },'json');
          return false;
      });
  });

</script>
<!-- Start Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <!-- Start Sidebar -->
        <div class="col-md-3 sidebar">
          
          <div class="widget sidebar-widget">
            <div class="grid-item-inner"> <a href="no-profile.gif" data-rel="prettyPhoto" class="media-box"> <img src="no-profile.gif" alt=""> </a>
              <div class="grid-content">
                <h3><a href="blog-post.html">Wahyu Ardie</a></h3>
                <span class="meta-data"><span><i class="fa fa-calendar"></i> 24th Nov, 2013</span><span><a href="#"><i class="fa fa-tag"></i>Uncategoried</a></span></span>
              </div>
            </div>
          </div>

        </div>

        <!-- Tengah -->
        <div class="col-md-6">
          <div id="msg-container"></div>        
          <?php echo $output ?>
        </div>

        <!-- Kanan -->
        <!-- Start Sidebar -->
        <div class="col-md-3 sidebar">

          <?php $this->load->view('sim/_menu_sidebar');?>

        </div>
        
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>