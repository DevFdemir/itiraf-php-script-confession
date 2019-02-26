<?php
	
	$host 		= "localhost";
	$dbname 	= "itiraf";
	$charset 	= "utf8";
	$root 		= "root";
	$password 	= "";

	try{
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
	}catch(PDOExeption $error){
		echo $error->getMessage();
	}
	
	$baglantia = new mysqli("localhost", "root", "", "itiraf");
	$baglantia->set_charset("utf8");
?>