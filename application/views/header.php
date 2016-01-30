<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><html>
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $this->webidentitas->get()->nama_website; ?></title>
<meta name="description" content="<?php echo $this->webidentitas->get()->meta_deskripsi; ?>">
<meta name="keywords" content="<?php echo $this->webidentitas->get()->meta_keyword; ?>">
<meta name="author" content="Wahyu Ardie, S.Kom">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="<?php echo $this->config->item("ftheme"); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->item("ftheme"); ?>plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->item("ftheme"); ?>css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->item("ftheme"); ?>plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="<?php echo $this->config->item("ftheme"); ?>css/ie8.css" media="screen" /><![endif]-->
<!-- Color Style -->
<link class="alt" href="<?php echo $this->config->item("ftheme"); ?>colors/color1.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->item("ftheme"); ?>style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="<?php echo $this->config->item("ftheme"); ?>js/modernizr.js"></script><!-- Modernizr -->
<script src="<?php echo $this->config->item("ftheme"); ?>js/jquery-2.0.0.min.js"></script>
<script src="<?php echo $this->config->item("ftheme"); ?>plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="<?php echo $this->config->item("ftheme"); ?>js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="<?php echo $this->config->item("ftheme"); ?>js/bootstrap.js"></script> <!-- UI --> 
<script src="<?php echo $this->config->item("ftheme"); ?>js/waypoints.js"></script> <!-- Waypoints --> 
<script src="<?php echo $this->config->item("ftheme"); ?>plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements --> 
<script src="<?php echo $this->config->item("ftheme"); ?>js/init.js"></script> <!-- All Scripts --> 
<script src="<?php echo $this->config->item("ftheme"); ?>plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="<?php echo $this->config->item("ftheme"); ?>plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer --> 
<script src="<?php echo $this->config->item("ftheme"); ?>style-switcher/js/jquery_cookie.js"></script> 
<script src="<?php echo $this->config->item("ftheme"); ?>style-switcher/js/script.js"></script> 
</head>
<body class="boxed">
<?php echo $this->webidentitas->get()->google_analytics; ?>
<div class="body"> 
  <!-- Start Site Header -->
  <header class="site-header">
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-8">
            <h1 class="logo"> <a href="<?php echo site_url(); ?>"><img src="<?php echo site_url() ?>assets/uploads/identitas/<?php echo $this->webidentitas->get()->logo; ?>" alt="Logo"></a> </h1>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-4">
            <ul class="top-navigation hidden-sm hidden-xs">
              <li><a href="#">Daftar</a></li>
              <li><a href="#">Login</a></li>
            </ul>
            <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> 
          </div>
        </div>
      </div>
    </div>
    <div class="main-menu-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class='navigation'>
              <?php echo $this->menu_model->menu_frontend('0',$h='','sf-menu'); ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Site Header --> 