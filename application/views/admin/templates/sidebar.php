    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Pilgub Jateng 2013</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
                <a href="http://localhost/pilkada/index.php/login/logout" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
                <li class="active"><a href="<?php echo base_url()?>admin/">Home</a></li>
              <li><a href="#" class="tentang" id="about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <!--<li id="loading" style="display:none;width:30px;padding-top: 5px;"><img src="<?php echo base_url()?>public/img/loading.gif" /></li>-->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2 navbar-fixed">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="background-color:#666666;color:white;"><h4>Administrator</h4></li>
              <li><a href="<?php echo base_url()?>admin/kandidat" class="samping" id="compose_new">Kandidat</a></li>
              <li><a href="<?php echo base_url()?>admin/daftar_pemilih" class="samping" id="inbox">Data Pemilih</a></li>
              <li><a href="<?php echo base_url()?>admin/hasil_polling" class="samping" id="outbox">Hasil Polling</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10" id="konten">
            
<script type="text/javascript">
    var ROOT = {url : '<?php echo base_url()?>admin/',link:'<?php echo base_url()?>'} 
</script>