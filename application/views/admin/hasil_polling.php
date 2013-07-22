<div class="span10">
    <center><h3>Hasil Polling</h3></center>
</div>
<div class="row-fluid">
    <div class="span7" id="jqxChart" style="width:680px; height:350px; position: relative; left: 0px; top: 0px;">
        <!--<div id="jqxChart"></div>-->
    </div>
    <div class="span3 offset0">
        <table class="table table-striped table-hover table-bordered">
            <tr><th>No kandidat</th><th>Jumlah pemilih</th></tr>
            <?php   
            foreach ($suara as $suara):?>
                <tr><td><?php echo $suara->id;?></td><td><?php echo $suara->jum;?></td></tr>
            <?php
            endforeach;?>
        </table>
    </div>
</div>
<br />
<br />
<br />
<div class="row-fluid">
    <div class="span7">
        <h3>Hasil Polling berdasarkan daerah pemilihan</h3>
        <div class="control-group inline">
            <label class="control-label" for="inputkota">Kota/Kab</label>
            <div class="controls">
                <select id="inputKota" name="inputkota">
                    <option value="99">--Pilih Kota--</option>
                    <?php foreach($kota as $kota):?>
                    <option value="<?php echo $kota->id?>"><?php echo $kota->kota?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="span7" id="result" style="width:680px; height:350px; position: relative; left: 0px; top: 0px;"></div>
    </div>
    <div class="span3 offset0">
        <?php if(isset($suara_kota)){?>
        <table class="table table-striped table-hover table-bordered">
            <tr><th>No kandidat</th><th>Jumlah pemilih</th></tr>
            <?php   
            foreach ($suara_kota as $suara_kot){?>
                <tr><td><?php echo $suara_kot->id;?></td><td><?php echo $suara_kot->jum;?></td></tr>
            <?php
            }?>
        </table>
        <?php }?>
    </div>
</div>

<script>
    $(document).ready(function(){
        var sampleData;
        $.ajax({
            dataType: 'json',
            url     : '<?php echo base_url()?>admin/detail_suara',
            success : function(data){
                
                var settings = {
                title: "Perolehan suara kandidat",
                description: "Jawa Tengah",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 20, top: 5, right: 20, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: data,
                categoryAxis:
                    {
                        dataField: 'id',
                        showGridLines: true,
                        flip: false
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            orientation: 'horizontal',
                            columnsGapPercent: 100,
                            toolTipFormatSettings: { thousandsSeparator: ',' },
                            valueAxis:
                            {
                                flip: true,
                                unitInterval: 10000,
                                maxValue: 150000,
                                displayValueAxis: true,
                                description: '',
                                formatFunction: function (value) {
                                    return parseInt(value / 100);
                                }
                            },
                            series: [
                                    { dataField: 'jum', displayText: 'jumlah pemilih' }
                                ]
                        }
                    ]
            };

            // setup the chart
            $('#jqxChart').jqxChart(settings);
            }
        });
        
        
        //kota ketika dipilih
        $('select[name="inputkota"]').change(function(){
            $("#result").empty();
            if($(this).val()==99) return false;
            var kab=$(this).val();
            $.ajax({
                dataType: 'json',
                url     : '<?php echo base_url()?>admin/detail_suara_kota',
                data    : {id : $(this).val()},
                type    : 'get',
                success : function(data){
                    if(data.length==0){
                        $('#result').html('<h3 style="color:red;"><i>Belum ada pemilih pada daerah ini.</i></h3>');
                    }
                    else{
                        var settings = {
                            title: "Perolehan suara kandidat",
                            description: "Kota/Kabupataen "+kab,
                            showLegend: true,
                            enableAnimations: true,
                            padding: { left: 20, top: 5, right: 20, bottom: 5 },
                            titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                            source: data,
                            categoryAxis:
                                {
                                    dataField: 'id',
                                    showGridLines: true,
                                    flip: false
                                },
                            colorScheme: 'scheme01',
                            seriesGroups:
                                [
                                    {
                                        type: 'column',
                                        orientation: 'horizontal',
                                        columnsGapPercent: 100,
                                        toolTipFormatSettings: { thousandsSeparator: ',' },
                                        valueAxis:
                                        {
                                            flip: true,
                                            unitInterval: 10000,
                                            maxValue: 150000,
                                            displayValueAxis: true,
                                            description: '',
                                            formatFunction: function (value) {
                                                return parseInt(value / 100);
                                            }
                                        },
                                        series: [
                                                { dataField: 'jum', displayText: 'jumlah pemilih' }
                                            ]
                                    }
                                ]
                        };

                        // setup the chart
                    $('#result').jqxChart(settings);
                 }
              }
            });
        });
			

        
    });
</script>
