<html>
  <head>
<script src="http://indonesiamendidik.org/assets/theme/frontend/js/jquery-2.0.0.min.js"></script>

  </head>
  <body>
    <form method="post" id="myForm" action="#" enctype="multipart/form-data" onsubmit="return viaAjax()">
      Select File : <input type="file" id="f-file">
      <br/>
      Name : <input type="text" name="tName">
      <br/>
      <input type="submit">
    </form>
  </body>
  <script type="text/javascript">
    function viaAjax(){ 
      var formdata = new FormData();      
      var file = $('#f-file')[0].files[0];
        formdata.append('fFile', file);
        $.each($('#myForm').serializeArray(), function(a, b){
          formdata.append(b.name, b.value);
        });
        $.ajax({url: 'hasil.php',
          data: formdata,
          processData: false,
          contentType: false,
          type: 'POST',
          beforeSend: function(){
            // add event or loading animation
          },
          success: function(ret) {
            console.log(ret); // get return (if success) here
          }
        });
      return false;
    }
  </script>
</html>