 <?php 
include 'ayar.php';
if ($_GET) 
{

include("ayar.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.
include("ayara.php");


// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglantia->query("DELETE FROM rapor WHERE itiraf_id =".(int)$_GET['idn'])) 
{
    header("location:listele.php"); 
}
}

?>