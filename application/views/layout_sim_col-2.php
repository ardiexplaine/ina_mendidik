<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('header');?>
<?php $this->load->view('widget/_title');?>

<script src="<?php echo $this->config->item("ftheme"); ?>js/jquery.form.js"></script>
<script type="text/javascript"> 
    jQuery(document).ready(function() {
 
        jQuery('#form-upload').on('submit', function(e) {
            e.preventDefault();
            jQuery('#submit-button').attr('disabled', ''); 
            jQuery("#loadfoto").html('<img src="<?php echo $this->config->item("ftheme"); ?>images/loader.gif" alt="Please Wait"/> <span>Mengunggah...</span>');
            jQuery(this).ajaxSubmit({
                target: '#msg-container',
                success:  sukses 
            });
        });
    }); 

    function sukses()  {
      setTimeout(function() {
       window.location.href = "<?php echo site_url();?>sim"
      }, 1000); 
      jQuery("#msg-container").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil diupload<button type="button" class="close" data-dismiss="alert">&times;</button></div>');      
    } 
</script>
<!-- Start Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <!-- Start Sidebar -->
        <div class="col-md-3">
          
          <div class="widget sidebar-widget">
          <?php $row = $this->db->get_where('volunteer',array('id'=>$this->session->userdata('user_id')))->row(); ?>
          <?php if($row->foto!='') { ?>
            <div class="grid-item-inner"> <a href="<?php echo site_url() ?>assets/uploads/volunteer/<?php echo $row->foto ?>" data-rel="prettyPhoto" class="media-box"> <img src="<?php echo site_url() ?>assets/uploads/volunteer/<?php echo $row->foto ?>" alt=""> </a>
          <?php }else{ ?>
            <div class="grid-item-inner"> <a href="<?php echo site_url() ?>assets/theme/frontend/images/no-profile.gif" data-rel="prettyPhoto" class="media-box"> <img src="<?php echo site_url() ?>assets/theme/frontend/images/no-profile.gif" alt="<?php echo $row->nama_lengkap; ?>"> </a>
          <?php } ?>
              <div class="grid-content">
                <h3><?php echo $row->nama_lengkap; ?></h3>
                <div id="loadfoto"></div>
                <form method="post" action="<?php echo site_url(); ?>sim/upload_file" enctype="multipart/form-data" id="form-upload">
                    <input type="file" name="userfile" id="userfile" size="20" />
                    <input type="hidden" name="user_id" value="<?php echo $row->id; ?>" />
                    <input type="hidden" name="photo_lama" value="<?php echo $row->foto; ?>" />
                    <hr/>
                    <input type="submit" name="submit" id="submit-button" value="Simpan Foto" />
                </form>
              </div>
            </div>
          </div>

          <?php $this->load->view('sim/_menu_sidebar');?>

        </div>

        <!-- Tengah -->
        <div class="col-md-9">
          <div id="msg-container"></div>        
          <?php echo $output ?>
        </div>
        
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>