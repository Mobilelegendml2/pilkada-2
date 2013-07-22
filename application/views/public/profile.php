<div class="container-fluid">
    <div class="row-fluid">
        <div class="span10 offset1">
			<ul class="thumbnails">
				<li class="span8">
					<div class="row-fluid">
						<div class="span12">
                                                    <?php foreach ($kandidat as $calon):?>
                                                    <div class="featurette">
						        <img class="featurette-image pull-left" height="300px" width="250px" src="<?php echo base_url().$calon->foto;?>" style="margin-left: 20px;">
						        <h4 class="featurette-heading"><?php echo '<a href="'.base_url()."home/profile?id=".$calon->id.'">'.$calon->id.'. '.$calon->julukan.'</a>';?></h4>
						        <?php echo $calon->sekilas;?>
                                                        <?php echo "<a href='".base_url()."home/profile_kandidat?id=".$calon->id."'>selengkapnya..</a>";?>
						    </div>
						    <hr class="featurette-divider">
						    <hr class="featurette-divider">
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