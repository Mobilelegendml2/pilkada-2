<div class="container-fluid">
    <div class="row-fluid">
        <div class="span10 offset1">
			<ul class="thumbnails">
				<li class="span7">
					<div class=""row-fluid>
						<div class="span12" style="">
							<h2>Polling Kandidat pilihan anda</h2>
                                                        <center><div id="pesaneror"></div></center>
							<form class="form-horizontal">
                                                            <div class="control-group">
                                                                <label class="control-label" for="inputNIK">NIK</label>
                                                                <div class="controls">
                                                                    <input type="text" id="inputNIK" placeholder="NIK" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="inputNama">Nama</label>
                                                                <div class="controls">
                                                                    <input type="text" id="inputNama" placeholder="Nama" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                  <label class="control-label" for="inputTgl">Tgl Lahir</label>
                                                                    <div class="controls date" id="inputTgl" data-date="12-02-2012" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                          <input type="text" placeholder="yyyy/mm/dd" id="inputTgl1" readonly="" required>
                                                                          <span class="add-on"><i class="icon-calendar"></i></span>
                                                                    </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="inputTgl">Kota/Kab</label>
                                                                <div class="controls">
                                                                    <select id="inputKota">
                                                                        <option value="">--Pilih Kota--</option>
                                                                        <?php foreach($kota as $kota):?>
                                                                        <option value="<?php echo $kota->id?>"><?php echo $kota->kota?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <div class="controls">
                                                                    <button type="submit" id="polling" class="btn btn-danger">Mulai Polling</button>
                                                                </div>
                                                            </div>
							</form>
						</div>
					</div>
				</li>
				<li class="span5">
					<div class="thumbnail" style="min-height:500px;">
						<h3><center>Hasil Polling Sementara</center></h3>
							<center><div id="divForGraph"></div></center>
					</div>
				</li>
			</ul>
		</div>
	</div><!--end of row-fluid-->
</div><!-- /.container -->

<!--modal polling kandidat-->
<div id="modal-polling" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Polling</h3>
  </div>
  <div class="modal-body">
    <h4>Siapa kandidat pilihan menurut anda? </h4>
    <form class="form-inline">
    <?php foreach ($kandidat as $calon):?>
    <table>
    <tr>
        <td>
            <label class="radio">
            <input type="radio" name="kandidatCalon" value="<?php echo $calon->id;?>" checked>
        </td>
        <td>
            <?php echo $calon->julukan?> &nbsp;<img src="<?php echo base_url().$calon->foto?>" width="100px" height="100px" />
            </label>
        </td>
    </tr>
    <?php endforeach;?>
    </table>
    </form>
  </div>
  <div class="modal-footer">
  	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary hps-msg" id="vote">Vote!</button>
  </div>
</div>

<!--modal polling sukses-->
<div id="modal-polling-sukses" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Polling</h3>
  </div>
  <div class="modal-body">
    <p>Terima kasih atas partisipasi anda dalam polling ini. :)</p>
  </div>
  <div class="modal-footer">
  	<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="window.location.reload();">Sama-sama</button>
  </div>
</div>

<!--JS Untuk date picker-->
<script src="http://localhost/pilkada/assets/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(){
                var nik,nama,tgl_lhr,kota;
		
		$("#inputTgl").datepicker(); // show date picker
                
                function voting(){
                    $.ajax({
                        url 	: "<?php echo base_url();?>home/input_pemilih",
                        type	: "post",
                        data 	: {nik : nik, name : nama, date : tgl_lhr, city : kota},
                        success : function(data){
                                $("#modal-polling").modal('show');
                        },
                        error: function (xhr, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                        }
                    });
                }
                
                function update_user(){
                    $.ajax({
                        url 	: "<?php echo base_url();?>home/update_user",
                        type	: "post",
                        data 	: {nik : nik, name : nama, date : tgl_lhr, city : kota},
                        success : function(data){
                                $("#modal-polling").modal('show');
                        },
                        error: function (xhr, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                        }
                    });
                }
                
                function cek_user(){
                    $.ajax({
                        url : '<?php echo base_url()?>home/cek_user_voted',
                        type: 'post',
                        data: {nik:nik},
                        beforeSend : function(){
                            
                        },
                        success : function(data){
                            if(data['status']==0){//if new user
                                voting();
                            }
                            else if(data['status']==1){//if user has registered but didn't vote yet
                                update_user();
                            }
                            else{//user sudah pernah vote
                                alert('anda sudah pernah vote, dilarang vote lagi!');
                            }
                                //console.log(data['status']);
                        }
                    });
                }
                
		$("#polling").click(function(e){
			e.preventDefault();
                        nik=$("#inputNIK").val();
                        nama=$("#inputNama").val();
                        tgl_lhr=$("#inputTgl1").val();
                        kota=$("#inputKota").val();
                        
                        if(nik=='' || nama=='' || tgl_lhr=='' || kota==''){
                            $('#pesaneror').html('<p style="color:red;"><i>Isi data dengan lengkap dan benar!</i></p>');
                        }
                        else{
                            cek_user();
			}
			
		});
                
                $("#vote").click(function(e){
                    e.preventDefault();
                    var pilihan = $('input[name=kandidatCalon]:checked').val();
                    $.ajax({
                        url     : '<?php echo base_url()?>home/voting',
                        type    : 'post',
                        data    : {nik:nik, calon : pilihan}
                    }).done(function(){
                            $("#modal-polling").modal("hide");
                            $("#inputNIK").val('');
                            $("#inputNama").val('');
                            $("#inputTgl1").val('');
                            $("#inputKota").val('');
                            $("#modal-polling-sukses").modal("show");
                        });
                })
	});
</script>