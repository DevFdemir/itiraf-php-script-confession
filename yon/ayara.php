<?php

	function reptr($text) { // seo link yapısı
	    $text     = trim($text);
	    $search   = array(
	        'Ç',
	        'ç',
	        'Ğ',
	        'ğ',
	        'ı',
	        'İ',
	        'Ö',
	        'ö',
	        'Ş',
	        'ş',
	        'Ü',
	        'ü',
	        ' ',
	        '!',
	        '.',
	        ':',
	        ';',
	        '?',
	        ',',
	        ')',
	        '(',
	        ']',
	        '[',
	        '}',
	        '{',
	        "/",
	        "&"
	    );
	    $replace  = array(
	        'c',
	        'c',
	        'g',
	        'g',
	        'i',
	        'i',
	        'o',
	        'o',
	        's',
	        's',
	        'u',
	        'u',
	        '-',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        '',
	        "",
	        "-"
	    );
	    $new_text = str_replace($search, $replace, $text);
	    return strtolower($new_text);
	}

	function epostakontrol($mail) { 
	    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	        return 1;
	    }else{
	        return 0;
	    }
	}

	function fx_giris($fx_ayar, $fx_yonlendir, $fx_uyariyazisi, $fx_hatayazisi) { 
		

		include($fx_ayar); 

	    $uyecek = $db -> prepare("SELECT * FROM uyeler WHERE uye_kadi=? && uye_sifre=?");
	    
	    if (isset($_POST["giris"])) { 

	        $kadi  = htmlspecialchars(trim($_POST["kadi"])); 
	        $sifre = md5(sha1($_POST["sifre"])); 

	        if (empty($kadi) || empty($sifre)) { 
	            echo $fx_uyariyazisi; 
	        }else{ 

	            $uyecek -> execute(array(
	                $kadi,
	                $sifre
	            ));
	            $fetch    = $uyecek -> fetch(PDO::FETCH_ASSOC);
	            $rowcount = $uyecek -> rowCount();
	            
	            if ($rowcount) { // Giriş yapılmışsa
	                
	                $_SESSION["uye_id"] 			= $fetch["uye_id"]; 		//  id
	                $_SESSION["uye_adsoyad"] 		= $fetch["uye_adsoyad"]; 	//  adı soyadı
	                $_SESSION["uye_kadi"] 			= $fetch["uye_kadi"]; 		//  kullanıcı adı
               		$_SESSION["uye_sifre"] 			= $fetch["uye_sifre"]; 		//  şifresi
	                $_SESSION["uye_eposta"] 		= $fetch["uye_eposta"]; 	//  epostası
	                $_SESSION["uye_onay"] 			= $fetch["uye_onay"]; 		// Üye onayı
					$_SESSION["icerik_onay"] 			= $fetch["icerik_onay"];
 
	                
	                header("REFRESH:2;URL=" . $fx_yonlendir); // Yönlendir

	            }else{ // Giriş yapılmamışsa
	                echo $fx_hatayazisi; // Hata mesajı ver
	            }
	        }
	    }
	}

	function fx_mail($fx_benimmailim, $fx_konu, $fx_mesaj){
		
		global $fx_benimmailimx;
		global $fx_konux;
		global $fx_mesajx;

		$fx_benimmailim 	= $fx_benimmailimx;
		$fx_konu 			= $fx_konux;
		$fx_mesaj 		= $fx_mesajx;
	}

	function fx_kayit($fx_ayar, $fx_bosbirakilmauyarisi, $fx_mailvarsamesaji, $fx_kadivarmesaji, $fx_kayitbasarili, $fx_yonlendir, $fx_kadisifrehatali, $fx_kayitbasarisiz, $fx_sifreeslesmiyor, $fx_sahtemailuyarisi, $mailyolla) {
		
		global $fx_benimmailimx;
		global $fx_konux;
		global $fx_mesajx;

		include($fx_ayar); 

	    
		
		
		
		
		
		
		
		if (isset($_POST["kayit"])) { // Kayıt Ol

	        $isim  			= htmlspecialchars(trim($_POST["adsoyad"])); 	
	        $kadi  			= htmlspecialchars(trim($_POST["kadi"])); 		
	        $sifre  		= htmlspecialchars(trim($_POST["sifre"])); 		
	        $sifret  		= htmlspecialchars(trim($_POST["sifret"])); 	
	        $mail  			= htmlspecialchars(trim($_POST["eposta"])); 	
			$icerik_onay	= htmlspecialchars(trim($_POST["icerik_onay"]));
	        $sifrele 		= md5(sha1($sifre)); 

	        if (empty($isim) || empty($kadi) || empty($sifre) || empty($sifret) || empty($mail)) { 
				echo $fx_bosbirakilmauyarisi; 
	        }else{ 

	            $kontrol_et = epostakontrol($mail); 
	            
	            if ($kontrol_et == "1") { 

	                $epostakontrol = $db -> prepare("SELECT * FROM uyeler WHERE uye_eposta =:uye_eposta");
					$epostakontrol -> execute(array('uye_eposta'=>$mail));
					$epostasaydirma = $epostakontrol -> rowCount();
					 
					if($epostasaydirma > 0){ 
						echo $fx_mailvarsamesaji;
					}else{ 

						$kadikontrol = $db -> prepare("SELECT * FROM uyeler WHERE uye_kadi =:uye_kadi");
						$kadikontrol -> execute(array('uye_kadi' => $kadi));
						$kadisaydirma = $kadikontrol -> rowCount();
						 
						if($kadisaydirma > 0){ 
							echo $fx_kadivarmesaji;
						}else{ 
							if ($sifre == $sifret) { 
								$sql = "INSERT INTO uyeler SET uye_adsoyad=?, uye_kadi=?, uye_sifre=?, uye_eposta=?, icerik_onay=?";
								$kayit = $db -> prepare($sql);
								$kayit -> execute(array(
								    $isim,
								    $kadi,
								    $sifrele,
								    $mail,
									$icerik_onay
								));

								$uyecek = $db -> prepare("SELECT * FROM uyeler WHERE uye_kadi=? && uye_sifre=?");

								if ($kayit) { 
									$uyecek -> execute(array(
						                $kadi,
						                $sifrele
						            ));
						            $fetch    = $uyecek -> fetch(PDO::FETCH_ASSOC);
						            $rowcount = $uyecek -> rowCount();
						            
						            if ($rowcount) { 
						                
						                $_SESSION["uye_id"] 			= $fetch["uye_id"]; 
						                $_SESSION["uye_adsoyad"] 		= $fetch["uye_adsoyad"]; 
						                $_SESSION["uye_kadi"] 			= $fetch["uye_kadi"]; 
					               		$_SESSION["uye_sifre"] 			= $fetch["uye_sifre"]; 
						                $_SESSION["uye_eposta"] 		= $fetch["uye_eposta"]; 
						                $_SESSION["uye_onay"] 			= $fetch["uye_onay"]; 
										$_SESSION["icerik_onay"] 			= $fetch["icerik_onay"];
						                
										echo $fx_kayitbasarili; 
								  		header("REFRESH:2;URL=" . $fx_yonlendir); 

								  		if ($mailyolla == true) {
								  			
								  			$headers 	= 'From: ' . $fx_benimmailimx . "rn";
											mail($mail, $fx_konux, $fx_mesajx, $headers);
								  		}elseif ($mailyolla == false){
								  			
								  		}
								  	}else{
						                echo $fx_kadisifrehatali;
						            }
								}else{ 
									echo $fx_kayitbasarisiz;
								}
							}else{ 
								echo $fx_sifreeslesmiyor;
							}
						}
		            } 
		        }else{ 
		            echo $fx_sahtemailuyarisi;
		        }
	        }
	    }
	}

	function fx_profil($p){
		global $db; 					
		global $fx_profil_id; 		
		global $fx_profil_adsoyad; 	
		global $fx_profil_kadi; 		
		global $fx_profil_eposta;
		global $fx_profil_icerik;		

		
		$uyekontrol 	= $db -> prepare("SELECT * FROM uyeler WHERE uye_kadi =:uye_kadi ");
		$uyekontrol		-> execute(array('uye_kadi'=>$p));
		$uyesaydirma 	= $uyekontrol -> rowCount();
		 
		if($uyesaydirma > 0){ 

			$uyecek 	= $db -> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
			$uyecek 	-> execute(array($p));
			$uye_cek 	= $uyecek -> fetch(PDO::FETCH_ASSOC);

			
				$fx_profil_id 		= $uye_cek["uye_id"];
				$fx_profil_adsoyad 	= $uye_cek["uye_adsoyad"];
				$fx_profil_kadi 		= $uye_cek["uye_kadi"];
				$fx_profil_eposta 	= $uye_cek["uye_eposta"];
				$fx_profil_icerik 	= $uye_cek["icerik_onay"];
		}
	}

	function fx_cikis($fx_ayar, $fx_cikisyonlendir){
	

		include $fx_ayar;
		session_destroy();
		header("REFRESH:2;URL=" . $fx_cikisyonlendir);
	}
