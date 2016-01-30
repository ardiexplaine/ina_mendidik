<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header');?>

<?php $this->load->view('widget/_title');?>

<!-- Start Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo isset($output) ? $output : '' ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>