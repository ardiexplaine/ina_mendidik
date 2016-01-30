
https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.js

https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/i18n/jquery-ui-i18n.min.js
    <div class="ui-widget">
    Kota: <input type="text" id="txtNamaKota" name="txtNamaKota" />
    </div>
    <script>
      var arrNamaKota = ["Jakarta", "Bandung", "Semarang", "Yogyakarta", "Surabaya"];
      $(document).ready(function() { 
        $("#txtNamaKota").autocomplete({
          source: arrNamaKota
        });
      });
    </script>

