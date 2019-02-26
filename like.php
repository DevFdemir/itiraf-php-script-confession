<?php
	include 'ayar.php';
    $gelen = $_GET['layk'];
	$begen = $db->query("UPDATE rapor SET itiraf_like=itiraf_like+1 WHERE itiraf_id = '$gelen'");
    header("Location:index.php");
?>