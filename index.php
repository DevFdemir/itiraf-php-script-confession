<?php
	include 'ayar.php';
	include 'lang/tr.php';
// ------------------------------------- sayfalandirma yaptim -------------------------------------
	$Sayfa   = @ceil($_GET['sayfa']); //5,2 girilirse eğer get o zaman onu tam sayı yapar yanı 5 yapıyoruz bu kod ile

if ($Sayfa < 1) { $Sayfa = 1;} //eğer get değeri yerine girilen sayi 1 den küçükse sayfa değerini 1 yapıyoruz yani 1. sayfaya atıyoruz

$Say   = $db->query("select * from rapor WHERE itiraf_onay = 1 order by itiraf_id DESC"); //makale sayısını çekiyoruz

$ToplamVeri   = $Say->rowCount(); //makale sayısını saydırıyoruz

$Limit	= 5; //bir sayfada kaç içerik çıkacağını belirtiyoruz. 

$Sayfa_Sayisi	= ceil($ToplamVeri/$Limit); //toplam veri ile limiti bölerek her toplam sayfa sayısını buluyoruz

if($Sayfa > $Sayfa_Sayisi){$Sayfa = $Sayfa_Sayisi;} //eğer yazılan sayı büyükse eğer toplam sayfa sayısından en son sayfaya atıyoruz kullanıcıyı

$Goster   = $Sayfa * $Limit - $Limit; // sayfa= 2 olsun limit=3 olsun 2*3=6 6-3=3 buranın değeri 2. sayfada 3'dür 3-4-5-6... sayfalarda da aynı işlem yapılıp değer bulunur

$GorunenSayfa   = 5; //altta kaç tane sayfa sayısı görüneceğini belirtiyoruz.

$Makale	= $db->query("select * from rapor WHERE itiraf_onay = 1 order by itiraf_id DESC limit $Goster,$Limit"); //yukarda göstere attıgımız değer diyelim ki 3 o zaman 3.'id den başlayarak limit kadar veri ceker.

$MakaleAl = $Makale->fetchAll(PDO::FETCH_ASSOC);
		//  ------------------------------------- sayfalandirma bitis -------------------------------------
		
		
		
		
		?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $title;?></title>
  <link rel="stylesheet" href="bg.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shards.min.css">
	
</head>
<style>
body {
	background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
}
</style>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/shards.min.js"></script>
	<br>
	<div align="center"><h3> <?php echo $center_title; ?> </h3></div>	
	<div class="row">
			<div class="col-lg-3 col-xs-1"> 
												<br> <br>
				<div class="card">
				<?php 
			echo $notice; ?>
					<div class="card-body">
				<?php
			echo $notice_body; ?>
					</div>
				</div>
			</div>
			
			
			
		<div class="col-lg-6 col-xs-10">
		<br>
		
		<br>
		<div class="card">
  <div class="card-body">
  
  
  <div align="right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <!--- Acilir Pencere Button ---->
 <?php echo $sendx;?>
</button></div>
  
		
		
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!--- Acilir Pencere Start ---->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $sendtitle;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="alert alert-success" role="alert"><font size="2"><?php echo $announcement;?></font></div>
	 
	 <form action="yolla.php" method="post">
		  <div class="form-group">
   &nbsp;  <label for="baslik"><?php echo $nick;?>:</label>
    <textarea class="form-control" id="itiraf_rumuz" name="itiraf_rumuz" rows="1"></textarea>
  </div>

  <div class="form-group">
   &nbsp;  <label for="baslik"><?php echo $gender;?>:</label>
    <select class="form-control form-control-lg" name="itiraf_cinsiyet">
  <option value="<?php echo $boyss; ?>"><?php echo $boyss; ?></option>
  <option value="<?php echo $girl; ?>"><?php echo $girl; ?></option>
</select>
  </div>
  
  &nbsp;  
  

  <div class="form-group">
 &nbsp;   <label for="notalmayazisi"><?php echo $ttt;?>:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="itiraf_text"></textarea>
  </div>


 &nbsp;  <button type="submit" class="btn btn-primary btn-lg btn-block" name="kaydetx"><?php echo $send;?></button>
<p hidden><select class="form-control" id="itiraf_like" name="itiraf_like">
            <option value="0" selected>0</option>
</select></p hidden>
<p hidden><select class="form-control" id="itiraf_onay" name="itiraf_onay">
            <option value="0" selected>0</option>
</select></p hidden>
</form>
	 
	 
      </div>

    </div>
  </div>
</div> <!--- Acilir Pencere End ---->
		<br>
		<!---- Assagi Yaz ---->
		
		
		
		
		
		<?php foreach($MakaleAl as $MakaleCek){
	   
		$itiraf_rumuz = $MakaleCek["itiraf_rumuz"];
		$itiraf_text = $MakaleCek["itiraf_text"]; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
		$itiraf_id = $MakaleCek["itiraf_id"];
		$itiraf_like = $MakaleCek["itiraf_like"];
		$cinsiyetsec = $MakaleCek["itiraf_cinsiyet"];

echo'
<div class="card">
  <div class="card-header">
    '.$nick.': '.$itiraf_rumuz.' &nbsp; &nbsp; <span class="badge badge-info">'.$cinsiyetsec.'</span>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">'.$itiraf_text.'</li>
<form action="like.php" method="POST"><a href="like.php?layk='.$itiraf_id.'"><button class="btn btn-danger btn-sm" type="button" style="float: right">
  <em class="fa fa-heart"></em> <span class="badge">'.$itiraf_like.'</span>
</button></a></form>
  </ul>
</div>
<br>
	';

		
    } ?>
		<br><div align="center">
		<?php if($Sayfa > 1){
	 
	 $onceki = $Sayfa - 1;
	 
	 ?>

  <a href="index.php?sayfa=1"><button type="button" class="btn btn-outline-info btn-pill"> <span class="say_sabit"><font color="#0080ff"><<</font></span> </button></a><!--1. Sayfaya gider-->

   <a href="index.php?sayfa=<?php print $onceki?>"><button type="button" class="btn btn-outline-info btn-pill"><div class="say_sabit"><font color="#0080ff"><</font></div></button></a> <!--Bir Önceki Sayfaya Gitmek İçin Sayfa Değerini 1 eksiltiyoruz-->

   <?php } ?>

   <?php 
    for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){ // i kaç ise o sayıdan başlar 1-2-3-4-5 yazmaya. mesela sayfa 7deyiz 7 - 5 = 2'dir 2 sayfadan sonra sayfalamaya başlar yani 2-3-4-5-6-7 gibi bu aynı mantıkla devam eder.
      if($i > 0 and $i <= $Sayfa_Sayisi){
         if($i == $Sayfa){
            echo '<button type="button" class="btn btn-outline-info btn-pill"><span class="say_aktif"><font color="#ff2400">'.$i.'</font></span></button>'; //eğer i ile sayfa değerleri aynıysa o zaman onu aktif css'si ekle
         }else{
            echo '<a class="say_a" href="index.php?sayfa='.$i.'"><button type="button" class="btn btn-outline-info btn-pill"><font color="#0080ff">'.$i.'</font></button></a>'; //eğer aynı değilse normal listele
         }
      }
   }
   ?>
   <?php if($Sayfa != $Sayfa_Sayisi){
	   $sonraki = $Sayfa + 1;
	   ?>

   <a href="index.php?sayfa=<?php print $sonraki ?>"><button type="button" class="btn btn-outline-info btn-pill"><div class="say_sabit"><font color="#0080ff">></font></div></button></a><!--Bir Sonra ki Sayfaya Gitmek için sayfa değerini 1 artırıyoruz.-->

  <a href="index.php?sayfa=<?php echo $Sayfa_Sayisi?>"><button type="button" class="btn btn-outline-info btn-pill"> <div class="say_sabit"><font color="#0080ff">>></font></div></button></a><!--Buldugumuz Toplam Sayfa Sayısını buraya cekiyoruz tıklandıgında en son sayfaya gider-->

   <?php } ?>
		
		</div>
		
		
		</div>
	</div>
		</div>
	</div>
	
	<footer class="page-footer font-small blue pt-4">
    <div class="container-fluid text-center text-md-left">
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
          <p>Furkan Demir Tarafından Kodlanmıştır.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="https://instagram.com/fxdemir"> Furkan Demir</a>
    </div>
  </footer>