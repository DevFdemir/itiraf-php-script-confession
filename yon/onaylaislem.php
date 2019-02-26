<?php

	session_start();
	include 'ayar.php';
	include 'ayara.php';

    $gelen = $_GET['b'];


	$begen = $db->query("UPDATE rapor SET itiraf_onay=itiraf_onay+1 WHERE itiraf_id = '$gelen'");
	
    header("Location:onayla.php");


 


?>