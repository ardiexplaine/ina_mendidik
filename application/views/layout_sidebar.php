<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header');?>

<?php $this->load->view('widget/_title');?>
<!-- Start Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <?php echo isset($output) ? $output : '' ?>
        </div>
        <!-- Start Sidebar -->
        <div class="col-md-3 sidebar">
          <div class="widget sidebar-widget">
            <?php //echo $this->load->view('widget/_login'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>