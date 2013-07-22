<div class="container-fluid">
    <div class="row-fluid">
        <div class="span10 offset1">
			<ul class="thumbnails">
				<li class="span8">
					<div class="row-fluid">
						<div class="span12">
                                                    <?php foreach($info as $info):?>
                                                        <h2><?php echo $info->id.'. '.$info->julukan;?></h2><br/>
                                                        <?php echo $info->sekilas;?><br/>
                                                        <center><h2>Visi</h2></center>
                                                        <?php echo $info->visi;?><br/>
                                                        <center><h2>Misi</h2></center>
                                                        <?php echo $info->misi;?><br/>
                                                    <?php endforeach;?>
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail" style="min-height:500px;">
						<h3><center>Berita lain</center></h3>
						<ul>
							<?php
								foreach($judul_berita as $judul){
									echo "<li><a href='".base_url()."home/berita?id=$judul->id'>$judul->judul</a></li>";
								}
							?>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div><!--end of row-fluid-->
</div><!-- /.container -->