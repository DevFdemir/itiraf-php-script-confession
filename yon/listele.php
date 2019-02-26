<?php
	include 'lang/tr.php';
	session_start();
	include 'ayar.php';
	include 'ayara.php';
			
$sira = $_SESSION["uye_id"];


	$vericekk="SELECT * FROM rapor ORDER BY itiraf_id desc"; // video iceriklerini cekme islemi 
	$listele=mysqli_query($baglantia,$vericekk);



if(!isset($_SESSION["uye_id"])){
    header("Location:index.php");   // giris yapilmamissa index e at
}
else {


		?>
		<!DOCTYPE html>


<head>
		<meta charset="UTF-8" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Admin Paneli | Sırala </title>
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


<!---- Navbar ----->
	<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Paneli</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="onayla.php">Onayla <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listele.php">Listele</a>
        </li>
      </ul>
      
	  <span class="navbar-text">
        Admin Paneli v1.0
      </span>
	   &nbsp; &nbsp; &nbsp;
	  <a href="cikis.php"><span class="badge badge-default"><span class="navbar-text">
        Çıkış &nbsp;<i class="fas fa-sign-out-alt"></i>
      </span></span></a>
    </div>
  </div>
</nav>
<!---- Navbar Bitis----->

<br> <br> 
<div class="container">
<div class="card">
  <div class="card-body">
	<div class="row">
	
		<div class="col centered">

<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Rumuz</th>
            <th>İtiraf</th>
            <th class="text-right">İşlemler</th>
        </tr>
    </thead>
	
	
    <tbody>
	
	<?php
		// icerik ureticisi while dongusu
		while ($liste = mysqli_fetch_array($listele)) {


$idn = $liste["itiraf_id"]; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.	
$baslik = $liste["itiraf_rumuz"];
$kategori = $liste["itiraf_text"];
	
	echo '
        <tr>
            <td class="text-center">'.$idn.'</td>
            <td>'.$baslik.'</td>
            <td>'.$kategori.'</td>   
            <td class="td-actions text-right">
                <a href="sil.php?idn='.$idn.'"><button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                    <i class="fas fa-trash-alt"></i>
                </button></a>
            </td>
        </tr>';
        } ?>
    </tbody>
</table>


</div>
</div>
</div>
</div>
</div>
</div>





<?php } ?>