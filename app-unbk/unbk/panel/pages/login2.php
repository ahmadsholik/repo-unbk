<?php
include "../../config/server.php";

if($val == TRUE){
	if (mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_zona LIMIT 1")==TRUE){
	$skullogin= $log['XLogin'];
	$email=$log['XEmail'];
	$web=$log['XWeb'];
	$alamat=$log['XAlamat'];
	$tlp=$log['XTelp'];
	$h1=$log['XH1'];
	$h2=$log['XH2'];
	$h3=$log['XH3'];
	$cbt_header = mysqli_query($GLOBALS["___mysqli_ston"], 'select * from cbt_header');
	$ch = mysqli_fetch_array($cbt_header);
	if (mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_sinc LIMIT 1")==TRUE){
		$hakakses=$ch['HakAkses'];
		$loginpanel=$ch['LoginPanel'];
	}else{
		$hakakses=0;
		$loginpanel=0;
	}
	
}else{$skullogin= $log['XLogin'];
	$email=$log['XEmail'];
	$web=$log['XWeb'];
	$alamat=$log['XAlamat'];
	$tlp=$log['XTelp'];
	$h1=$log['XH1'];
	$h2=$log['XH2'];
	$h3=$log['XH3'];
	$cbt_header = mysqli_query($GLOBALS["___mysqli_ston"], 'select * from cbt_header');
	$ch = mysqli_fetch_array($cbt_header);	
	$hakakses="0";
	$loginpanel="0";
	
}}else{
$skull= "UJIAN BERBASIS KOMPUTER";
	$skullogin= "pertama.png";
	$web="www.tuwagapat.com";
	$tlp="0000-00000";
	$h1="UJIAN BERBASIS KOMPUTER";
	$h2="BEESMART EDUCATION PARTNER";
	$h3="BEESMART-CBT Login";	
	$hakakses="0";
	$loginpanel="0";
	
}

if(isset($sqlconn)){} else {$pesan1 = "Tidak dapat Koneksi Database.";}
if (!$sqlconn) {die('Could not connect: '.mysqli_error($GLOBALS["___mysqli_ston"]));}
 
 ?>

 <?php
include "../../config/server.php";
$sql = mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_admin");
$xadm = mysqli_fetch_array($sql);
$skull= $xadm['XSekolah'];
$skulkode= $xadm['XKodeSekolah'];
$skul_pic= $xadm['XLogo'];
$admpic= $xadm['XPicAdmin']; 
$skul_ban= $xadm['XBanner']; 
$skul_tkt= $xadm['XTingkat']; 
$skul_warna= $xadm['XWarna']; 
$skul_login= $xadm['XLogin']; 
$skul_adm= strtoupper($xadm['XAdmin']);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html !DOCTYPE html>
<html class="no-js" lang="en">

  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $skull; ?> | Administrator</title>
	<script language="JavaScript">
		var txt="<?php echo $skull; ?> | Administrator.....  ";
		var kecepatan=100;var segarkan=null;function bergerak() { document.title=txt;
		txt=txt.substring(1,txt.length)+txt.charAt(0);
		segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
	</script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="../../assets/styles/bootstrap.min.css" rel="stylesheet" />
	<link href="../../assets/login/css/style.css" rel="stylesheet"/>
	<link href="../../assets/styles/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="../../assets/css/login.min.css" rel="stylesheet" />
	<link href="../../assets/css/animate.min.css" rel="stylesheet" />
	<link href="../../assets/styles/font-awesome.min.css" rel="stylesheet" />
	<script src="../../assets/login/js/vendor/html5shiv.min.js"></script>
	<link href="../../images/icon.png" rel="icon" type="image/gif" />
	
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <!--<script language="JavaScript">
var txt="CBT DAFFAMEDIA.......";
var kecepatan=100;var segarkan=null;function bergerak() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
</script> -->

       
	

<!-- Custom Fonts -->

<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--
<style>
	.left 	{float: left;width: 50%;}
	.right 	{float: right;width: 42%; margin-top:150px;}
	.group:after {content:""; display: table; clear: both;}
	img {  max-width: 100%;  height: auto;}
	@media screen and (max-width: 480px) {.left, .right {float: none;  width: auto; margin-top:10px;	}}
	input[type=text] {padding: 12px 20px; margin: 8px 0; box-sizing: border-box; border:0;
		border-bottom: 2px solid #; background-color: #; color: #; width:100%;} 
	input[type=text]:focus {background-color: #fff; color: #999; width:100%;}
	input[type=password] {padding: 12px 20px; margin: 8px 0; box-sizing: border-box; border:0;  
		border-bottom: 2px solid #939292; background-color: #; color: white; width:100%;}
	input[type=password]:focus {background-color: #fff;  color: #999; width:100%; }
	.switch-field {font-family: "Lucida Grande", Tahoma, Verdana, sans-serif; overflow: hidden;}
	.switch-title {margin-bottom: 6px;}
	.switch-field input {display: none;}
	.switch-field label {float: left;}
	.switch-field label {display: inline-block; width: 0px; background-color: #; color: rgba(0, 0, 0, 0.6);
		font-size: 14px; font-weight: normal; text-align: center; text-shadow: none; padding: 6px 14px;
		border: 0px solid rgba(0, 0, 0, 0.2); -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
		box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);  -webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;  -ms-transition: all 0.1s ease-in-out;  -o-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	.switch-field label:hover {cursor: pointer;}
	.switch-field input:checked + label {background-color: #A5DC86; -webkit-box-shadow: none; box-shadow: none;}
	.switch-field label:first-of-type {border-radius: 4px 0 0 4px;}
	.switch-field label:last-of-type {border-radius: 0 4px 4px 0;}
	#ingat{width:84%; height:90px; background-color:#FBECF0; border:0; border-left:thick #FF0000 solid; padding-left:10; padding-top:15}
</style> -->
</head>
<script>
	function disableBackButton() {window.history.forward();}
	setTimeout("disableBackButton()", 0);
</script>

<script src="js/jquery-1.11.0.min.js">
function validateForm() {
    var x = document.forms["loginform"]["userz"].value;
    var y = document.forms["loginform"]["passz"].value;
    var peluru = '\u2022';
    if (x == null || x == "" || y == null || y == "") {
		document.getElementById("ingat").style.display = "block";
		document.getElementById("isine").textContent= peluru+"Username dan Password harus diisi";
        return false;
    }
}

</script>
<!-- Show Password -->
 

<script src="../../asset/bootstrap-show-password.js"></script>
<script>
    $(function() {
        $('#passz').password().on('show.bs.password', function(e) {
            $('#eventLog').text('On show event');
            $('#methods').prop('checked', true);
        }).on('hide.bs.password', function(e) {
                    $('#eventLog').text('On hide event');
                    $('#methods').prop('checked', false);
                });
        $('#methods').click(function() {
            $('#passz').password('toggle');
        });
    });
</script>
<!-- /Show Password -->
 
<body>


  <div class="site">
    
    </div>  
    <div class="site-canvas">
      <main class="site-main">
        <div id="home">
          <div id="particles-js" class="site-bg">
            <div class="site-bg-img"></div>
            <div class="site-bg-video"></div>
            <div class="site-bg-overlay"></div>
            <div class="site-bg-effect layer" data-depth=".30"></div>
            <canvas class="site-bg-canvas layer" data-depth=".30"></canvas>
          </div> <!-- .site-bg -->

	<div class="container">
            <div class="row-fluid">
              <div class="span8">
                <div>
                    <div>
                        <div class="tabbable custom-tabs flat flat-all track-url" data-wow-delay="2.0s" style="z-index: 100;position: relative">
                    <ul class="nav nav-tabs">
						<li><a href="#admin" data-toggle="tab" class="active "><i class="icon-user"></i>&nbsp;&nbsp;<span>Panel Admin</span></a></li>
                        <li><a href="#guru" data-toggle="tab"><i class="icon-user"></i>&nbsp;&nbsp;<span>Panel Guru</span></a></li>
                        <li><a href="#siswa" data-toggle="tab"><i class="icon-user"></i>&nbsp;&nbsp;<span>Panel Siswa</span></a></li>
                    </ul>
					
					<div class="tab-content">
                        <div class="tab-pane fade in active" id="admin" checked/>
                            <div class="row-fluid">
                                <div class="span5">
                                    <form id="loginform"  name="loginform"  action="../pages/ceklogin.php" class="login-form" method="post">
                                        <h4><i class="icon-lock"></i>&nbsp;&nbsp; Masuk</h4>

                                        <label>Username</label>
                                        <input type="text" autocomplete="off" name="userz" id="userz" placeholder="Username"  class="input-block-level" required/>
                                        <label>Password<a href="#" style="color: #006dcc" class="pull-right"><small><i class="icon-question-sign"></i>&nbsp;Lupa Password</small></a> </label>
                                        <input type="password" name="passz" id="passz" placeholder="Password"  class="input-block-level" required />
                                        
                                        <br />
										
                                        <button type="submit" class="btn btn-success" id="btn">Masuk&nbsp;&nbsp;&nbsp;<i class="icon-chevron-sign-right"></i></button>
										
									</form>
                                </div>
                                <div class="span7">
                                    <h4><i class="icon-question"></i>&nbsp;&nbsp;Bantuan</h4>
                                    <div class="box">
										<p>Anda sedang berada pada panel masuk admin atau bagian pihak pengelola</p>
                                        <ul>
                                            <li>Masukan akun username!</li>
                                            <li>Masukan password anda!</li>
                                        </ul>

                                    </div>
                                    <div class="box">
                                        <ul>
                                            <li>Pastikan anda tidak lupa akun masuk anda.</li>
                                            <li>Semua fitur sudah sepenuhnya dapat dikelola oleh admin</li>
                                        
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="panel_guru">
                            <div class="row-fluid">
                                <div class="span5">
										<form id="admin"  name="login" onSubmit="return validateForm();" action="../pages/ceklogin.php" class="login-form" method="post">
                                        <h4><i class="icon-lock"></i>&nbsp;&nbsp; Masuk</h4>

                                        <label>Username</label>
                                        <input type="text" autocomplete="false" name="username" class="input-block-level" />
                                        <label>Password<a href="#" style="color: #006dcc" class="pull-right"><small><i class="icon-question-sign"></i>&nbsp;Lupa Password</small></a> </label>
                                        <input type="password" name="password" class="input-block-level" />
                                        <input type="hidden" name="level" value="pengajar">
                                        <br />

                                        <button type="submit" class="btn" id="btn-guru">Masuk&nbsp;&nbsp;&nbsp;<i class="icon-chevron-sign-right"></i></button>
										</form>
                                </div>
                                <div class="span7">
                                    <h4><i class="icon-question"></i>&nbsp;&nbsp;Bantuan</h4>
                                    <div class="box">
                                        <p>Anda sedang berada pada panel masuk pengajar atau panel guru</p>
                                        <ul>
                                            <li>Masukan akun username!</li>
                                            <li>Masukan password anda!</li>
                                        </ul>

                                    </div>
                                    <div class="box">
                                        <ul>
                                            <li>Pastikan anda tidak lupa akun untuk masuk.</li>
                                            <li>Anda hanya dapat melakukan login pada 1 (satu) alat.</li>
                                            <li>Hubungi admin atau pihak pengelola jika lupa akun anda.</li>
                                            <li>Anda dapat mengelola bank soal dan tes ataupun kuis</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="panel_siswa">
                            <div class="row-fluid">
                                <div class="span5">
										
                                        <h4><i class="icon-lock"></i>&nbsp;&nbsp; Masuk</h4>

                                        <label>NISN atau Username</label>
                                        <input type="text" autocomplete="false" name="username" class="input-block-level" />
                                        <label>Password<a href="#" style="color: #006dcc" class="pull-right"><small><i class="icon-question-sign"></i>&nbsp;Lupa Password</small></a> </label>
                                        <input type="password" name="password" class="input-block-level" />
                                        <input type="hidden" name="level" value="admin">
                                        <br />

                                        <button type="submit" class="btn" id="btn-siswa">Masuk&nbsp;&nbsp;&nbsp;<i class="icon-chevron-sign-right"></i></button>
                                    
                                </div>
                                <div class="span7">
                                    <h4><i class="icon-question"></i>&nbsp;&nbsp;Bantuan</h4>
                                    <div class="box">
                                        <p>Anda sedang berada pada panel masuk peserta atau panel Siswa</p>
                                        <ul>


                                            <li>Masukan NISN atau username!</li>
                                            <li>Masukan password anda!</li>
                                        </ul>

                                    </div>
                                    <div class="box">
                                        <ul>
                                            <li>Pastikan anda tidak lupa akun untuk masuk.</li>
                                            <li>Peserta hanya dapat melakukan login pada 1 (satu) alat.</li>
                                            <li>Jika halaman error session lakukan reset session.</li>
                                            <li>Hubungi admin atau pihak pengelola jika lupa akun anda.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    
                </div>
              </div>
               
              <div class="span4" style="z-index: 100;position: relative">
                <div class="">
				  <h1 class="m-t-20 text-center" style="margin-top: 25px;">Panel Login</h1> 
                  
                  <img class="img-responsive float-r-sm-min" src="../../assets/login/img/item/home.png" alt="">
				 
				  <p class="text-center">SMP Negeri 6 Makassar &copy; <?php echo date("Y");?></p>
                  
                </div>
              </div>
            </div>
          </div>
        </div> <!-- #home -->

        
        
        
      </main> <!-- .site-main -->
    </div>
	</div>

  <script src="../../assets/login/js/vendor/jquery-1.11.3.min.js"></script>
  <script src="../../assets/login/js/vendor/bootstrap.min.js"</script>
  <script src="../../assets/login/js/vendor/plugin.js"></script>
  <script src="../../assets/login/js/variable.js"></script>
  <script src="../../assets/login/js/main.js"></script>
  <script src="../../assets/js/plugins/tabs.min.js"></script>
    <script src="../../assets/js/plugins/wow.min.js"></script>
    <script type="text/javascript">
         new WOW().init();
         $(document).ready(function(){
             $("#admin").submit(function(){
                $("#btn-siswa").html('Memproses masuk &nbsp;&nbsp;<i class="icon-spinner"></i>'); 
             });
             $("#guru").submit(function(){
                $("#btn-guru").html('Memproses masuk &nbsp;&nbsp;<i class="icon-spinner"></i>'); 
             });
             $("#siswa").submit(function(){
                $("#btn-admin").html('Memproses masuk &nbsp;&nbsp;<i class="icon-spinner"></i>'); 
             });
         });
    </script>
</body>
</html>
