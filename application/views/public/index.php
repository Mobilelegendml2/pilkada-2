<div class="container">
    <div class="row-fluid">
      <div class="span2">
          <a href="<?php echo base_url();?>home/polling"><img src="http://localhost/pilkada/assets/img/vote.jpg" class="img-circle" style="width:400px; height:180px; margin-top:25px;"></a>
      </div>

      <div class="span6" style="margin-left:30px;">
          <div class="thumbnail">
            <h2>Vote On-Line</h2>
            <p>Ayo tentukan pilihanmu sekarang untuk Jawa Tengah lebih baik</p>
            <p><a href="<?php echo base_url();?>home/polling" class="btn btn-primary">vote sekarang</a></p>
          </div>
      </div>

      <div class="span4">
        <div class="thumbnail">
        <h4><center>Hasil Polling Kandidat</center></h4>
            <center><div class="caption" id="divForGraph"></div></center>
            &nbsp;&nbsp;
<!--            <p align="center"><a href="#" class="btn btn-info">klik untuk detail hasil</a></p>    -->
        </div>
      </div>
    </div>
    
    <div style="clear: both"></div>
    <div class="page-header">
    </div>
    <div class="row-fluid" style="margin-left:50px;">
      <div class="span11">
        <ul class="thumbnails">
          <li class="span4">
            <div class="thumbnail">
                <center><h4>News Update</h4></center>
              &nbsp;
              <?php foreach($berita_depan as $berita_depan){?>
		<img alt="300x200" src="http://localhost/pilkada/assets/img/<?php echo $berita_depan->foto?>" class="medium-image img-rounded">
		<div class="caption">
                <h3><?php echo ucwords($berita_depan->judul);?></h3>
		<?php echo substr($berita_depan->isi,0,200);?>&nbsp;<a href="<?php echo base_url();?>home/berita?id=<?php echo $berita_depan->id?>">Selengkapnya..</a>
              <?php }?>
<!--              <img src="img/pilkada.jpg" class="img-rounded" style="height:160px;">
              <div class="caption">
                <h4>Tentang Pilkada</h4>-->
                <ul>
                  <?php
                    foreach($judul_berita as $judul){
			echo "<li><a href='".base_url()."home/berita?id=$judul->id'>$judul->judul</a></li>";
                    }
                  ?>
                </ul>
                &nbsp;&nbsp;
              </div>
            </div>
          </li>

          <li class="span8">
            <div class="thumbnail">
                <h3>Uneg-uneg Warga Jateng :</h3>
              <ul class="inline">
                  <li><img src="http://localhost/pilkada/assets/img/pilkada3.jpg" style="height:190px; width:190px;" class="img-rounded" ></li>
                <li>
                  <ol>
                    <li class="text-info">
                      <p><b>Orang 1</b></p>
                      <p>Menuju jateng yang lebih baik :)</p>
                    </li>
                    <li  class="text-info">
                      <p><b>Orang 2</b></p>
                      <p>Menuju jawatengah</p>
                    </li>
                  </ol>
                </li>
                <a href="#" class="btn btn-info" style="margin-left:300px;">baca lebih lengkap...</a>
              </ul>
            </div>
          </li>

</div></div></div>