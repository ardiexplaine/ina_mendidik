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
                  setTimeout(function() {
                   window.location.href = "<?php echo site_url();?>sim"
                  }, 5000);
              }
          },'json');
          return false;
      });
  });
</script>

<h3>Selamat verifikasi akun indonesia mendidik berhasil.</h3>
<p><i>Silahkan Masukan Password baru yang diinginkan untuk masuk ke menu sahabat Indonesia Mendidik.</i></p>
<div id="msg-container"></div>

<!-- <div class="alert alert-info fade in"> <a class="close" data-dismiss="alert" href="#">&times;</a> <strong>Heads up!</strong> This alert needs your attention, but it's not super important. </div> -->
<hr/>
<form class="align-center" action="<?php echo base_url(); ?>volunteer/changepasswd" method="POST" id="frm">
  <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="token">
  
  <div class="row">
    <div class="form-group">
      <div class="col-md-6">
        <label>Password Baru</label>
        <input type="password" maxlength="100" class="form-control" name="password">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="form-group">
      <div class="col-md-6">
        <label>Ulangi Password Baru</label>
        <input type="password" maxlength="100" class="form-control" name="passconf">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <input type="submit" name="submit" value="Simpan" class="btn btn-primary" data-loading-text="Loading...">
    </div>
  </div>
</form>