<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<div class="col-md-12">
    <h4>Albums</h4>                      
    <div class="block">
        <div class="head">
            <h2>Upload Pictures</h2>
        </div>
        <?php echo $output; ?>
    </div>
 
</div>
