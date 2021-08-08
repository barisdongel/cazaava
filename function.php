<?php
ob_start();
session_start();

if (isset($_POST['login'])) {
	$kullanici_kullaniciadi=$_POST['kullanici_kullaniciadi'];
	$sifre=md5($_POST['sifre']);

}


/*
	function kontrol () {
		$yonetici_adi=$_SESSION['KULLANICI_ADI'];
		$yoneticisor=mysql_query("select * from login where KULLANICI_ADI='$yonetici_adi'");
		$yoneticisay=mysql_num_rows($yoneticisor);

		if ($yoneticisay==0) {
			header('Location:login.php');
		}
	}
*/
	function seo($s) {
		$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',' ',',','?');
		$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
		$s = str_replace($tr,$eng,$s);
		$s = strtolower($s);
		$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
		$s = preg_replace('/\s+/', '-', $s);
		$s = preg_replace('|-+|', '-', $s);
		$s = preg_replace('/#/', '', $s);
		$s = str_replace('.', '', $s);
		$s = trim($s, '-');
		return $s;
	}

	?>
