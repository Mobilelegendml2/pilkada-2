<div class="span10">
    <h3>Daftar Pemilih</h3>
</div>
<div class="row-fluid">
    <div class="span10">
        <table class="table table-striped table-hover">
            <tr><th>Nomer</th><th>NIK</th><th>Nama</th><th>Tanggal Lahir</th><th>Kota</th></tr>
            <?php   
            foreach ($pemilih as $detail):?>
                <tr><td><?php echo $detail->id;?></td><td><?php echo $detail->nik;?></td><td><?php echo $detail->nama;?></td><td><?php echo $detail->tgl_lahir;?></td><td><?php echo $detail->kota;?></td></tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>
    
</div>
