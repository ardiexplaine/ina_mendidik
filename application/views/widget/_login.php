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
                  }, 3000);
              }
          },'json');
          return false;
      });
  });
</script>

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Sahabat Indonesia Mendidik Login</h3>
    </div>
    <div class="panel-body">

    <div id="msg-container"></div>

    <form class="align-center" action="<?php echo base_url(); ?>volunteer/simlogin" method="POST" id="frm">
      
      <div class="row">
        <div class="form-group">
          <div class="col-md-12">
            <label>Email</label>
            <input type="email" maxlength="100" class="form-control" name="email">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <div class="col-md-12">
            <label>Password</label>
            <input type="password" maxlength="100" class="form-control" name="password">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <input type="submit" name="submit" value="Login" class="btn btn-primary" data-loading-text="Loading...">
        </div>
      </div>
    </form>

</div>
</div>