<div class="container-fluid">
    <div class="row-fluid">
        <div class="span10 offset1">
			<ul class="thumbnails">
				<li class="span8">
					<div class="thumbnail">
						<div class="caption">
							<?php if($detail_berita) foreach ($detail_berita as $detail) {
							?>
                            <h3><?php if($detail->judul) echo ucwords($detail->judul);?></h3>
							<?php if($detail->isi) echo $detail->isi;?>
							<p><?php if($detail->waktu) echo "Publish pada ".$detail->waktu;?></p>
							<?php }?>
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