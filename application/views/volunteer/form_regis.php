<script type='text/javascript' src='<?php echo $this->config->item("ftheme"); ?>js/jquery.autocomplete.js'></script>
<link href='<?php echo $this->config->item("ftheme"); ?>css/jquery.autocomplete.css' rel='stylesheet' />
<?php echo $script_captcha ?>

<script type="text/javascript">
  // jquery submit via json 
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

  // Auto Complate
  var site = "<?php echo site_url();?>";
  $(function(){
      $('.autocomplete').autocomplete({
          // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
          serviceUrl: site+'volunteer/search',
          // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
          onSelect: function (suggestion) {
              $('#idkota').val(''+suggestion.id); // membuat id untuk ditampilkan
          }
      });
  });
</script>

<h2>Ayoo Mendaftar menjadi sahabat indonesia mendidik.</h2>
<p><i>Melahirkan generasi emas dalam menyambut 100 tahun indonesia merdeka. Bergabunglah bersama kami</i></p>
<div id="msg-container"></div>
<form action="<?php echo base_url(); ?>volunteer/save" method="POST" id="frm">
  
  <div class="row">
    <div class="form-group">
      <div class="col-md-7">
        <label>Nama Lengkap *</label>
        <input type="text" value="" maxlength="100" class="form-control" name="nama_lengkap" id="nama_lengkap">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="form-group">
      <div class="col-md-3">
        <label>Jenis Kelamin *</label>
        <select name="sex" class="form-control">
          <option value="L">Laki-Laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="form-group">
      <div class="col-md-5">
        <label>Email *</label>
        <input type="email" value="" maxlength="100" class="form-control" name="email" id="email">
      </div>
    </div>
  </div>
          

  <div class="row">
    <div class="form-group">
      <div class="col-md-6">
        <label>Nomor Telpon/HP *</label>
        <input type="text" value="" maxlength="100" class="form-control" name="no_tlp" id="name">
      </div>
    </div>
  </div>


  <div class="row">
    <div class="form-group">
      <div class="col-md-6">
        <label>Provinsi/Kota </label>
        <input type="search" class='autocomplete form-control' id="autocomplete1"  name="kota" id="name">
        <input type="hidden" class='autocomplete form-control' id="idkota"  name="id_kota">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="form-group">
      <div class="col-md-6">
        <?php echo $captcha ?>
      </div>
    </div>
  </div>
  <br/>

  <div class="row">
    <div class="col-md-12">
      <input type="submit" name="submit" value="Daftar" class="btn btn-primary btn-lg" data-loading-text="Loading...">
    </div>
  </div>
</form>
