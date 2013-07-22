<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pilkada Jateng</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="portal untuk polling pemilihan gubernur jawa tengah">
  <meta name="author" content="aku">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="http://localhost/pilkada/assets/css/bootstrap-united.min.css" rel="stylesheet">
	<link href="http://localhost/pilkada/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!--<link href="<?php echo base_url();?>assets/css/jquery.tweet.css" rel="stylesheet">-->
  <link href="http://localhost/pilkada/assets/css/style.css" rel="stylesheet">
  <?php
    if(isset($css)){
      foreach ($css as $css) {
        echo "<link rel='stylesheet' href='"."http://localhost/pilkada/"."assets/css/".$css.".css'>";
      }
    }
  ?>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://localhost/pilkada/assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://localhost/pilkada/assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://localhost/pilkada/assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="http://localhost/pilkada/assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="http://localhost/pilkada/assets/img/favicon.png">
  
	<script type="text/javascript" src="http://localhost/pilkada/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/pilkada/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/pilkada/assets/js/jquery.tweet.js"></script>