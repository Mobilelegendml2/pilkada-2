<div class="span10">
    <h3>Kandidat Cagub-Cawagub</h3>
</div>
<div class="row-fluid">
    <div class="span10">
        <?php   
        if(isset($kandidat['kosong'])) 
        {
            echo "<tr><td colspan=6><center><h2>Tidak ada pesan pada Inbox</h2></center></td></tr>";
        }
        else
        {
            foreach ($kandidat as $detail):?>
                <table class="table">
                    <tr><th colspan="3"><center><h3>Kandidat <?php echo $detail->id;?></center></h3></th></tr>
                    <tr>
                        <th>Nomer</h5><td>:</td><td class="id"><?php echo $detail->id;?></td>
                    </tr>
                    <tr>
                        <th>Nama Cagub</th><td>:</td><td class="cagub"><?php echo $detail->nama_cagub;?></td>
                    </tr>
                    <tr>
                        <th>Nama Cawagub</th><td>:</td><td class="cawagub"><?php echo $detail->nama_cawagub;?></td>
                    </tr>
                    <tr>
                        <th>Julukan</th><td>:</td><td class="julukan"><?php echo $detail->julukan;?></td>
                    </tr>
                    <tr>
                        <th>Sekilas</th><td>:</td><td class="sekilas"><?php echo $detail->sekilas;?></td>
                    </tr>
                    <tr>
                        <th>Visi</th><td>:</td><td class="visi"><?php echo $detail->visi;?></td>
                    </tr>
                    <tr>
                        <th>Misi</th><td>:</td><td class="misi"><?php echo $detail->misi;?></td>
                    </tr>
                    <tr>
                        <th>Foto</td><th>:</td><td foto><img src="<?php echo "http://localhost/pilkada/".$detail->foto;?>"></td>
                    </tr>
                    <tr>
                        <th>Action</th><td>:</td><td><a href="#" class="btn btn-success edit-form"><i class="icon-edit"></i>edit</a></td>
                    </tr>
                </table>
        <?php
            endforeach;
        }
        ?>
    </div>
    
</div>

 
<!-- Modal detail-->
<div id="form-detail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit data kandidat</h3>
  </div>
  <div class="modal-body">
      <div class="tab-content" id="form-respon">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="kepada">Nama Cagub</label>
                        <div class="controls">
                            <input type="hidden" id="mod-id">
                            <input type="text" id="mod-cagub">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="kepada">Nama Cawagub</label>
                        <div class="controls">
                            <input type="text" id="mod-cawagub">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="kepada">Julukan</label>
                        <div class="controls">
                            <input type="text" id="mod-julukan">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">Sekilas</label>
                        <div class="controls">
                           <textarea rows="5" id="mod-sekilas"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">Visi</label>
                        <div class="controls">
                           <textarea rows="5" id="mod-visi"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">Misi</label>
                        <div class="controls">
                           <textarea rows="5" id="mod-misi"></textarea>
                        </div>
                    </div>
<!--                    <div class="control-group">
                        <label class="control-label" for="isi">Ganti Foto</label>
                        <div class="controls">
                           <input type="file" name="userfile" size="20" />
                        </div>
                    </div>-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="act-edit">Edit</button>
                    </div>
                </form>
          </div>
      </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<!--Modal sukses do something when edit sukses-->
<div id="modal-edit-sukses" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">SMS Berhasil.</h3>
  </div>
  <div class="modal-body">
      <p>&nbsp;</p>
    <p>Data Kandidat berhasil diubah. <i class="icon-check icon-large" style="color:green;"></i></p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" onClick="window.location.reload()">Oke</button>
  </div>
</div>

<script>
    $(document).ready(function(){
        var id,cagub,cawagub,julukan,sekilas,visi,misi;
        $('.edit-form').click(function(e){
            id = $(this).parent().parent().parent().find('.id').html();
            cagub = $(this).parent().parent().parent().find('.cagub').html();
            cawagub = $(this).parent().parent().parent().find('.cawagub').html();
            julukan = $(this).parent().parent().parent().find('.julukan').html();
            sekilas = $(this).parent().parent().parent().find('.sekilas').html();
            visi = $(this).parent().parent().parent().find('.visi').html();
            misi = $(this).parent().parent().parent().find('.misi').html();
            
            e.preventDefault();
            $('#mod-id').val(id);
            $('#mod-cagub').val(cagub);
            $('#mod-cawagub').val(cawagub);
            $('#mod-julukan').val(julukan);
            $('#mod-sekilas').val(sekilas);
            $('#mod-visi').val(visi);
            $('#mod-misi').val(misi);
            $('#form-detail').modal('show');
        });
//        $('#form-detail').on('show', function () {
//            $(this).css({width:'800px'});
//            $('.modal-body',this).css({width:'800px'});
//        });
        $('#act-edit').click(function(e){
            e.preventDefault();
            //alert($('#mod-cagub').val());
            $.ajax({
                type : 'post',
                url  : '<?php echo base_url()?>admin/edit_kandidat',
                data : {
                        id : $('#mod-id').val(), cagub:$('#mod-cagub').val(), cawagub:$('#mod-cawagub').val(),
                        julukan:$('#mod-julukan').val(), sekilas:$('#mod-sekilas').val(), 
                        visi:$('#mod-visi').val(), misi:$('#mod-misi').val()
                    },
                success : function(data){
                    $('#form-detail').modal('hide');
                    $('#modal-edit-sukses').modal('show');
                }
            });
        });
        
    });
</script>