<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('header');?>

<!-- Start Hero Slider -->
<?php $this->load->view('widget/_slider');?>
<!-- End Hero Slider --> 


<!-- Start Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row"> 
        <!-- Start Featured Blocks -->
        <div class="featured-blocks clearfix">
          <div class="col-md-3 col-sm-4 featured-block"> <a href="#" class="img-thumbnail"> <img src="<?php echo $this->config->item("ftheme"); ?>images/01.jpg" alt="staff"> </a> </div>
          <div class="col-md-3 col-sm-4 featured-block"> <a href="#" class="img-thumbnail"> <img src="<?php echo $this->config->item("ftheme"); ?>images/02.jpg" alt="staff"> </a> </div>
          <div class="col-md-3 col-sm-4 featured-block"> <a href="#" class="img-thumbnail"> <img src="<?php echo $this->config->item("ftheme"); ?>images/03.jpg" alt="staff"> </a> </div>
          <div class="col-md-3 col-sm-4 featured-block"> <a href="#" class="img-thumbnail"> <img src="<?php echo $this->config->item("ftheme"); ?>images/03.jpg" alt="staff"> </a> </div>
        </div>
        <!-- End Featured Blocks --> 
      </div>
      <div class="row">
        <div class="col-md-8 col-sm-6"> 
          <!-- Events Listing -->
          <?php $this->load->view('event/_event');?>

          <!-- Latest News -->
          <?php $this->load->view('widget/_news');?>
        </div>
        <!-- Start Sidebar -->
        <div class="col-md-4 col-sm-6">
          <?php $this->load->view('widget/_berandaSidebar');?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Start Notice Bar -->
<div class="notice-bar">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-5 notice-bar-event-title">
        <h5><a href="#">MELAHIRKAN GENERASI EMAS DALAM MENYAMBUT 100 TAHUN INDONESIA MERDEKA</a></h5>
        <span class="meta-data">Mengurangi angka putus sekolah, Memfasilitasi anak bangsa mengenyam pendidikan yang layak, Menyehatkan anak bangsa, Memberikan lifeskill kepada anak bangsa, Menanamkan leadership skill kepada anak bangsa, Menanamkan jiwa enterprenure kepada anak bangsa, Menanamkan dan menerapkan konsep Nasionalisme kepada anak bangsa.</span> 
      </div>
      <div class="col-md-4 col-sm-6 hidden-xs"> <a href="<?php echo site_url(); ?>volunteer" class="btn btn-primary btn-lg btn-block">BERGABUNGLAH BERSAMA KAMI</a> </div>
    </div>
  </div>
</div>

<?php $this->load->view('widget/_sponsorship'); ?>
<!-- End Notice Bar --> 
<!-- Start Featured Gallery -->
<div class="featured-gallery">
  <div class="container">
    <div class="row">
      <?php $this->load->view('widget/_gallery'); ?>    
    </div>
  </div>
</div>
<!-- End Featured Gallery --> 

<?php $this->load->view('footer'); ?>