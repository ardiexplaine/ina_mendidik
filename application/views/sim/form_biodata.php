<script type='text/javascript' src='<?php echo $this->config->item("ftheme"); ?>js/jquery.autocomplete.js'></script>
<link href='<?php echo $this->config->item("ftheme"); ?>css/jquery.autocomplete.css' rel='stylesheet' />

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
	                  // $('#frm').each(function(){
	                  //     this.reset();
	                  // });; 
	              }
	          },'json');
	          return false;
	      });
	  });
		
	$(function(){ 
	    $("#frm :input").prop("disabled", true);

	    $(".agree").click(function(){
	            if($(this).prop("checked") == true){
	                $("#frm :input").prop("disabled", false);
	            }
	            else if($(this).prop("checked") == false){
	                $("#frm :input").prop("disabled", true);
	            }
	      });
	  });

    // Auto Complate
	var site = "<?php echo site_url();?>";
	$(function(){
	  $('.autocomplete').autocomplete({
	      // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
	      serviceUrl: site+'/volunteer/search',
	      // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
	      onSelect: function (suggestion) {
	          $('#idkota').val(''+suggestion.id); // membuat id untuk ditampilkan
	      }
	  });
	});
</script>
<?php 
$query = $this->db->get_where('volunteer',array('id'=>$this->session->userdata('user_id')))->row();
?>
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Profil</h3>
    </div>
    <div class="panel-body">
    <p class="text-right"><input type="checkbox" class="agree">    Aktifkan Mode Edit.</p>
    
    <form action="<?php echo base_url(); ?>sim/save_biodata" method="POST" id="frm">
		<dl class="dl-horizontal">

		  <input type="hidden" name="id" value="<?php echo $query->id ?>" >
		  <dt>Nama Lengkap *</dt>
		  <dd><input type="text" value="<?php echo $query->nama_lengkap; ?>" maxlength="100" class="form-control" name="nama_lengkap" ></dd>

		  <dt>Jenis Kelamin *</dt>
		  <dd>
			<?php
			$options = array('L' => 'Laki-Laki','P' => 'Perempuan');
			echo form_dropdown('sex', $options, $query->sex,'class="form-control"');      
			?>
		  </dd>

		  <dt>No Telpon *</dt>
		  <dd><input type="no_tlp" value="<?php echo $query->no_tlp; ?>" maxlength="100" class="form-control" name="no_tlp"></dd>

		  <dt>Email *</dt>
		  <dd><input type="email" value="<?php echo $query->email; ?>" maxlength="100" class="form-control" name="email"></dd>

		  <dt>Provinsi/Kota *</dt>
		  <?php $getkota = $this->db->get_where('provinsi_indo',array('id'=>$query->kota))->row(); ?>
		  <dd>
		  	<input type="search" value="<?php echo $getkota->namakab ?>" class='autocomplete form-control' id="autocomplete1"  name="kota" id="name">
        	<input type="hidden" value="<?php echo $query->kota ?>" class='autocomplete form-control' id="idkota"  name="id_kota">
		  </dd>

		  <dt>Facebook</dt>
		  <dd><input type="text" value="<?php echo $query->facebook; ?>" maxlength="50" class="form-control" name="facebook"></dd>

		  <dt>Twitter</dt>
		  <dd><input type="text" value="<?php echo $query->twitter; ?>" maxlength="50" class="form-control" name="twitter"></dd>

		  <dt>Linkedin</dt>
		  <dd><input type="text" value="<?php echo $query->linkedin; ?>" maxlength="50" class="form-control" name="linkedin"></dd>

		  <dt>Website</dt>
		  <dd><input type="text" value="<?php echo $query->website; ?>" maxlength="50" class="form-control" name="website"></dd>

		  <dt>Tentang Saya</dt>
		  <dd><textarea name="tentang_saya" class="form-control" rows="10"><?php echo $query->tentang_saya; ?></textarea></dd>
		  <br/>
		  <dt></dt>
		  <dd><input type="submit" class="btn btn-primary btn-sm" type="button" value="Update Biodata"></dd>

		</dl>
	</form>
	</div>
</div>		