
<?php 

	include 'ayar.php';

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
		$itiraf_text = htmlspecialchars($_POST['itiraf_text']);
		$itiraf_rumuz = htmlspecialchars($_POST['itiraf_rumuz']);
		$itiraf_like = htmlspecialchars($_POST['itiraf_like']);
		$itiraf_cinsiyet = htmlspecialchars($_POST['itiraf_cinsiyet']);
		$itiraf_onay = htmlspecialchars($_POST['itiraf_onay']);
     { 
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.
        
         // Veri ekleme sorgumuzu yazıyoruz.
        if ($db->query("INSERT INTO rapor (itiraf_text, itiraf_rumuz, itiraf_like, itiraf_cinsiyet, itiraf_onay) VALUES ('$itiraf_text','$itiraf_rumuz','$itiraf_like','$itiraf_cinsiyet','$itiraf_onay')")) 
        {
          // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
			header("Location:index.php");
			
        }
        else
        {
            echo "Hata oluştu";
        }

    }

}

?>