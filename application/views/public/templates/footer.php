&nbsp; &nbsp; &nbsp; &nbsp;
  <br><br><br><br>

  <!--info-->
  <div class="row"  style="background-color:#999999; border-top:1px solid; padding-top:20px; padding-buttom:20px;">
    <div class="span12 " >
      <div class="row-fluid">
        <div class="span3 offset2">
          <address>
            <h4>Komisi Pemilihan Umum <u>Jawa Tengah</u></h4>
            Jalan Nakula 1<br>
            Semarang-Jawa Tengah<br>
          </address>
          <address>
            <b>email</b><br>
            kpu-jateng@gov.id<br>
            <b>twitter</b><br>
            <a href="#">@kpujateng</a><br>
            <b>facebook</b><br>
            <a href="#">KPU Jateng</a>
          </address>
        </div>

        <div class="span3"  style="border-left:1px solid; border-right:1px solid; padding-left:40px;">
          <h4>Link Terkaid</h4>
          <a href="http://www.kpu-jatengprov.go.id">www.kpu-jatengprov.go.id</a><br>
          <a href="http://www.kpu.go.id">www.kpu.go.id</a><br>
          <br><br><br><br><br><br><br><br>
        </div>

        <div class="span3" style="padding-left:20px;">
          <h4>Login for admin</h4>
          <a href="<?php echo base_url()?>login"><img src="http://localhost/pilkada/assets/img/admin-login.jpg" style="height:70px; margin-left:28px;"></a>
        </div>
      </div>
    </div>
  </div> <!--info -->
  
  <!--footer -->
  
      <div class="well well-small" style="background-color:black;">
        <p align="center">&copy;2013 pilkada &middot;<a href="#">Muhammad Nur Choliq - A11.2010.05208</a>&middot; TI&middot;Fasilkom-UDINUS</p>
      </div>

<script type="text/javascript">
    $(document).ready(function(){
        var a,b,c,xhr;
        
        var timeout = null;
        $(document).on('mousemove', function() {
            if (timeout !== null) {
                clearTimeout(timeout);
            }
            timeout = setTimeout(function() {
                timeout = null;
                location.reload();//refresh page
            }, 600000);//time out 15 minutes
        });
    
        function ambil_suara(){
            $.ajax({
                url : '<?php echo base_url()?>home/get_suaraa',
                type: 'GET',
                dataType: 'json',
                data: {x:a,y:b,z:c},
                success : function(data){
                    a = data['satu'];
                    b = data['dua'];
                    c = data['tiga']; 

                    arrayOfData = new Array(
                        [data['satu'],'HP-DON','#222222'],
                        [data['dua'],'BISSA','#7D252B'],
                        [data['tiga'],'Ganjar-Heru','#4A4147']
                    ); 
                    $('#divForGraph').empty();
                    $('#divForGraph').html(function(){
                        $('#divForGraph').jqBarGraph({ data: arrayOfData });
                    });

                 }
             });
        }
        var fn = function(){
                    if(xhr && xhr.readyState!=4){
                        xhr.abort();
                    }
                    xhr = $.ajax({
                        url : '<?php echo base_url()?>home/get_suara',
                        type: 'GET',
                        dataType: 'json',
                        data: {x:a,y:b,z:c},
                        success : function(data){
                            //if(data['success']) {
                                a = data['satu'];
                                b = data['dua'];
                                c = data['tiga']; 

                                arrayOfData = new Array(
                                    [data['satu'],'Jokowi','#222222'],
                                    [data['dua'],'Bibit','#7D252B'],
                                    [data['tiga'],'HP','#4A4147']
                                ); 
                                $('#divForGraph').empty();
                                $('#divForGraph').jqBarGraph({ data: arrayOfData });
                         }
                     });
                };
          
          ambil_suara(); //call graph first time when page loaded
          var interval = setInterval(fn, 28000); //call graph periodly 28 second
          
     });
    
    //API twitter
        $("#ticker").tweet({
          username: "siadinmhs",
          page: 1,
          avatar_size: 30,
          count: 20,
          loading_text: "loading ..."
        }).bind("loaded", function() {
          var ul = $(this).find(".tweet_list");
          var ticker = function() {
            setTimeout(function() {
              var top = ul.position().top;
              var h = ul.height();
              var incr = (h / ul.children().length);
              var newTop = top - incr;
              if (h + newTop <= 0) newTop = 0;
              ul.animate( {top: newTop}, 500 );
              ticker();
            }, 5000);
          };
          ticker();
        });
        
        
    //function for know when there is no activity from user for 15 minutes(with jquery)
//    var timeout = null;
//    $(document).on('mousemove', function() {
//        if (timeout !== null) {
//            clearTimeout(timeout);
//        }
//
//        timeout = setTimeout(function() {
//            timeout = null;
//            location.reload();//refresh page
//        }, 3000);//time out 15 minutes
//    });
    //function for know when there is no activity from user for 15 minutes(pure javascript)
//    (function() {
//        var idlefunction = function() {
//              // what to do when mouse is idle
//                location.reload();//refresh page
//            }, idletimer,
//            idlestart = function() {idletimer = setTimeout(idlefunction,5000);},//time out 15 minutes 900000
//            idlebreak = function() {clearTimeout(idletimer); idlestart();};
//        if(window.addEventListener){
//            document.documentElement.addEventListener("mousemove",idlebreak,true);
//        }
//        else{
//            document.documentElement.attachEvent("onmousemove",idlebreak,true);
//        }
//    })();
</script>

</body>
<script src="http://localhost/pilkada/assets/js/jqBarGraph.1.1.min.js"></script>

</html>
