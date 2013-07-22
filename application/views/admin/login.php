<?php
//session_start();
//if($this->session->userdata('username') != '') redirect ('admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin</title>
    <meta name="description" content="form login administrator">
    <meta name="author" content="admin">
    <link rel="stylesheet" href="http://localhost/pilkada/assets/css/bootstrap.css">
    <style>
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 80px; 
      }
      .container {
        width: 300px;
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; 
        -webkit-border-radius: 10px 10px 10px 10px;
           -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

	  .login-form {
		margin-left: 65px;
	  }
	
	  legend {
		margin-right: -50px;
		font-weight: bold;
	  	color: #404040;
	  }

    </style>

</head>
<body>
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="login-form">
          <h2>Login Admin</h2>
          <form action="<?php echo base_url()?>login/verifikasi" method="post">
            <fieldset>
              <div class="clearfix">
                <input type="text" name="username" id="username" placeholder="username">
              </div>
              <div class="clearfix">
                <input type="password" name="password" placeholder="password" id="password">
              </div>
              <div id="erore"></div>
              <button class="btn primary" id="cek" type="submit">Sign in</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- /container -->
  <script src="http://localhost/pilkada/assets/js/jquery.min.js"></script>
  <script>
      $(document).ready(function(){
          $("#username").focus();
          $('#cek').click(function(){
              if($('#username').val()=='' || $('#password').val()==''){
                  $('#erore').html('<i style="color:red;">Lengkapi form dengan benar</i>');
                  return false;
              }
              return true;
          });
      });
  </script>
</body>
</html>