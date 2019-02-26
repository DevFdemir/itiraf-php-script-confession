<?php
	error_reporting(0);
	session_start();
	include 'ayar.php';
	include 'ayara.php';
	$icerika = $_SESSION["icerik_onay"];
?>

<?php
	
	// Ayar dosyası, Giriş yapıldıktan sonra yönlendirilecek yer, Uyarı mesajı, Hata mesajı
		if($icerika>='4')
{
    header("Location: /itiraf/yon/onayla.php");
}
else // Burası Login Sayfası
{
	
	fx_giris("ayar.php", "onayla.php", "<p> Boş Alan Bırakmayınız</p>", "<p>Kullanıcı adı veya şifre hatalı!</p>");

?>


<!DOCTYPE html>


<head>
		<meta charset="UTF-8" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Admin Paneli </title>
		<meta name="description" content="Özgün Günlük" />
		<meta name="keywords" content="gunluk, daily, dairly, love, peace" />
		<meta name="author" content="Demir" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
		<script src="/assets/vendor/jquery/jquery.min.js"></script>
		<script src="/assets/vendor/popper/popper.min.js"></script>
		<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
		<script src="/assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>
		<script src="/assets/js/blk-design-system.js"></script>
		<link href="/assets/vendor/nucleo/css/nucleo-icons.css" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
		<link type="text/css" href="/assets/css/blk-design-system.min.css" rel="stylesheet">
</head>
<body>
<br>
<br>
<div class="container">

	<div class="row">
	<div class="col-lg-3 col-xs-1"></div>
		<div class="col-lg-6 col-xs-10 centered">
		<div class="alert alert-success" role="alert">Admin Giriş</div>
 <form action="" method="POST">
  <div class="form-group">
	<i class="tim-icons icon-single-02"></i>
    <input type="text" name="kadi" class="form-control" id="kadi" aria-describedby="kadi" placeholder="Kullanıcı Adı">
  </div>
  <div class="form-group">
    <input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="Şifre">
  </div>
<br>
  <button type="submit" class="btn btn-primary float-right" name="giris">Giriş Yap!</button>
</form>
</div>
	</div>
		</div>
  
 
		</body>
			</html>
  

<?php } ?>