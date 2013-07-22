
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
          <a class="brand" href="<?php echo base_url()?>home">Pilgub Jateng</a>
          <div class="nav-collapse collapse">
<!--            <p class="navbar-text pull-right">
              Supported by <a href="#" class="navbar-link">KPU RI</a>
            </p>-->
            <!--<ul class="nav" style="margin-top: 0px;">-->
                <style type="text/css">
                    #ticker {
                      height: 2em;
                      overflow-y: hidden;
                      position: relative;
                    }
                    .query{
                        color:white;
                    }
                    #ticker ul.tweet_list {
                      position: inherit;
                      -webkit-border-radius: 0;
                      -moz-border-radius: 0;
                      border-radius: 0;
                    }
                    #ticker ul.tweet_list li {
                      height: 2em;
                    }
                  </style>
                <p id="ticker" class="query" style="margin-top:8px;"></p>
            <!--</ul>-->
          </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
    
<div class="row-fluid" style="margin-top:50px;">
    	
      <div class="span2">
        <!--<img src="img/kpu.jpg" style="height:140px; margin-top:50px;">-->
      </div>

      <div class="span8">
			<div class="carousel slide" id="carousel-709287">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-709287">
					</li>
					<li data-slide-to="1" data-target="#carousel-709287">
					</li>
					<li data-slide-to="2" data-target="#carousel-709287">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<center><img alt="" src="http://localhost/pilkada/assets/img/kandidat/banner1.png" height="400px" width="800px;"></center>
						<div class="carousel-caption">
							<center><p>Kandidat 1</p></center>
						</div>
					</div>
					<div class="item">
						<center><img alt="" src="http://localhost/pilkada/assets/img/kandidat/banner2.png" height="400px" width="800px;"></center>
						<div class="carousel-caption">
							<center><p>Kandidat 2</p></center>
						</div>
					</div>
					<div class="item">
						<center><img alt="" src="http://localhost/pilkada/assets/img/kandidat/banner3.png" height="400px" width="800px;"></center>
						<div class="carousel-caption">
							<center><p>Kandidat 3</p></center>
						</div>
					</div>
				</div> <a data-slide="prev" href="#carousel-709287" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-709287" class="right carousel-control">›</a>
			</div>
          </div>

      <div class="span2">
        <!--<img src="img/LOGO kudus.jpg" style="height:135px; margin-top:50px; margin-left:25px;">-->
      </div>
   </div>  <!--banner -->
  <div class="row-fluid">
    <div class="span12" style="padding:10px">
      <div class="navbar">
      <div class="navbar-inner"> 
      <ul class="nav">
          <li class="active"> <a href="<?php echo base_url()?>">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">KPU Jateng<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Tempat</a></li>
            <li><a href="#">Wilayah Pemilihan Umum</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pilgub Jateng<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url()?>home/profile">Daftar Pasangan Calon</a></li>
<!--            <li><a href="#">Hasil Poling</a></li>-->
            <li><a href="<?php echo base_url()?>home/polling">Vote On-Line</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelaksanaan<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Mekanisme Pilkada</a></li>
            <li><a href="#">Panitia Pelaksana</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Pemilu</a></li>
            <li><a href="#">KPU</a></li>
          </ul>
        </li>
        <li><a href="#">Kritik & Saran</a></li>
        <li><a href="#">Kontak</a></li>
        <li>
          <input type="text" placeholder="search" class="input-medium search-query" style="margin-top:5px; margin-left:290px;"> 
          <button type="submit" class="btn btn-link"> <i class="icon-search"></i> </button>
        </li>
      </ul>
      </div>
      </div>
    </div>
