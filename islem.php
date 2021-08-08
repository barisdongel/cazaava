<?php
ob_start();
session_start();
include 'baglan.php';

/*ÜRÜN İŞLEMLERİ*/

//Ürün Ekleme
if (isset($_POST['urunekle'])) {
	if (isset($_FILES['urun_foto'])) {
		$uploads_dir = 'img/urunler/';
		@$tmp_name = $_FILES['urun_foto']["tmp_name"];
		@$name = $_FILES['urun_foto']["name"];
		$sayi1=rand(10000,99999);
		$refimgyol = $uploads_dir.$sayi1.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");
	}else {
		$refimgyol = '';
	}
	if (isset($_FILES['urun_icon'])) {
		$icon_dir = 'img/iconlar/';
		@$tmp_icon = $_FILES['urun_icon']["tmp_name"];
		@$icon = $_FILES['urun_icon']["name"];
		$sayi1=rand(10000,99999);
		$iconyol = $icon_dir.$sayi1.$icon;
		@move_uploaded_file($tmp_icon, "$icon_dir/$sayi1$icon");
	}else {
		$iconyol = '';
	}
	$urunkaydet=$db->prepare("INSERT INTO urunler_tbl SET
		urun_ad=:ad,
		urun_aciklama=:aciklama,
		urun_ozellik=:ozellik,
		urun_kategori=:kategori,
		urun_foto=:foto,
		urun_icon=:icon
		");
		$insert=$urunkaydet->execute(array(
			'ad' => $_POST['urun_ad'],
			'aciklama' => $_POST['urun_aciklama'],
			'ozellik' => $_POST['urun_ozellik'],
			'kategori' => $_POST['urun_kategori'],
			'foto' => $refimgyol,
			'icon' => $iconyol
		));

		if ($insert) {
			Header("Location:admin/urunler.php?durum=ok");
		}
		else{
			Header("Location:admin/urunler.php?durum=no");
		}
	}

	//ürün düzenleme
	if (isset($_POST['urunduzenle'])) {

		$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_id=:urun_id");
		$urunsor->execute(array("urun_id" => $_POST['urun_id']));
		$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

		if ($_FILES['urun_foto']['size'] != 0) {
			$uploads_dir = 'img/urunler/';
			@$tmp_name = $_FILES['urun_foto']["tmp_name"];
			@$name = $_FILES['urun_foto']["name"];
			$refimgyol = $uploads_dir.$name;
			@move_uploaded_file($tmp_name, "$uploads_dir/$name");
		}else {
			$refimgyol = $uruncek['urun_foto'];
		}
		if ($_FILES['urun_icon']['size'] != 0) {
			$icon_dir = 'img/iconlar/';
			@$tmp_icon = $_FILES['urun_icon']["tmp_name"];
			@$icon = $_FILES['urun_icon']["name"];
			$iconyol = $icon_dir.$icon;
			@move_uploaded_file($tmp_icon, "$icon_dir/$icon");
		}else {
			$iconyol = $uruncek['urun_icon'];
		}

		$urunduzenle=$db->prepare("UPDATE urunler_tbl SET
			urun_ad=:ad,
			urun_aciklama=:aciklama,
			urun_ozellik=:ozellik,
			urun_kategori=:kategori,
			urun_foto=:foto,
			urun_icon=:icon
			WHERE urun_id={$_POST['urun_id']}
			");
			$update=$urunduzenle->execute(array(
				'ad' => $_POST['urun_ad'],
				'aciklama' => $_POST['urun_aciklama'],
				'ozellik' => $_POST['urun_ozellik'],
				'kategori' => $_POST['urun_kategori'],
				'foto' => $refimgyol,
				'icon' => $iconyol
			));

			$urun_id=$_POST['urun_id'];

			if ($update) {
				Header("Location:admin/urunler.php?durum=ok");
			}
			else{
				Header("Location:admin/urunler.php?durum=no");
			}
		}

		//ürün silme
		if($_GET['urunsil']=="ok") {

			$select = $db->prepare("SELECT * FROM urunler_tbl where urun_id=:urun_id");
			$select->execute(array('urun_id' => $_GET['urun_id']));
			$bul = $select->fetch(PDO::FETCH_ASSOC);

			unlink($bul['urun_foto']);

			$sil=$db->prepare("DELETE FROM urunler_tbl WHERE urun_id=:urun_id");
			$kontrol=$sil->execute(array('urun_id' => $_GET['urun_id']));

			if ($kontrol) {
				header("Location:admin/urunler.php?durum=ok");

			} else{
				header("Location:admin/urunler.php?durum=no");
			}
		}

		/*Ürün Kategori İşlemleri*/

		//ketegori Ekleme
		if (isset($_POST['kategoriekle'])) {

			$kategorikaydet=$db->prepare("INSERT INTO kategori_tbl SET kategori_ad=:ad");
			$insert=$kategorikaydet->execute(array('ad' => $_POST['kategori_ad']));
			if ($insert) {
				Header("Location:admin/kategoriler.php?durum=ok");
			}
			else{
				Header("Location:admin/kategoriler.php?durum=no");
			}
		}

		//ketegori guncelleme
		if (isset($_POST['kategoriduzenle'])) {

			$kategoriduzenle=$db->prepare("UPDATE kategori_tbl SET
				kategori_ad=:ad
				WHERE kategori_id={$_POST['kategori_id']}
				");
				$update=$kategoriduzenle->execute(array(
					'ad' => $_POST['kategori_ad']
				));

				$kategori_id=$_POST['kategori_id'];

				if ($update) {
					Header("Location:admin/kategoriler.php?kategori_id=$kategori_id&durum=ok");
				}
				else{
					Header("Location:admin/kategoriler.php?durum=no");
				}
			}

			//ketegori silme
			if ($_GET['kategorisil']=='ok') {

				$sil=$db->prepare("DELETE FROM kategori_tbl where kategori_id=:kategori_id");
				$kontrol=$sil->execute(array(
					"kategori_id" => $_GET['kategori_id']
				));

				if ($kontrol) {
					Header("Location:admin/kategoriler.php?durum=ok");
				}
				else{
					Header("Location:admin/kategoriler.php?durum=no");
				}
			}

			/*Ürün Fotogaleri İşlemleri*/
			//Fotogaleri ekleme
			if (isset($_POST['fotogaleriekle'])) {

				for ($i=0; $i<count($_FILES['resim']["name"]); $i++) {
					$uploads_dir = 'img/galeri/';

					@$tmp_name = $_FILES['resim']["tmp_name"][$i];
					@$name = $_FILES['resim']["name"][$i];

					$sayi1=rand(20000,30000);
					$refimgyol = $uploads_dir.$sayi1.$name;
					@move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

					$urunkaydet=$db->prepare("INSERT INTO urun_fotogaleritbl SET
						urun_id=:urun_id,
						resim=:foto
						");
						$insert=$urunkaydet->execute(array(
							'urun_id' => $_POST['urun_id'],
							'foto' => $refimgyol
						));

						if ($insert) {
							Header("Location:admin/urunler.php?durum=ok");
						}
						else{
							Header("Location:admin/urunler.php?durum=no");
						}
					}
				}

				//Fotogaleri silme
				if($_GET['fotogalerisil']=="ok") {

					$select = $db->prepare("SELECT * FROM urun_fotogaleritbl where fotogaleri_id=:fotogaleri_id");
					$select->execute(array('fotogaleri_id' => $_GET['fotogaleri_id']));
					$bul = $select->fetch(PDO::FETCH_ASSOC);

					unlink($bul['resim']);

					$sil=$db->prepare("DELETE FROM urun_fotogaleritbl WHERE fotogaleri_id=:fotogaleri_id");
					$kontrol=$sil->execute(array('fotogaleri_id' => $_GET['fotogaleri_id']));

					if ($kontrol) {
						header("Location:admin/urunler.php?durum=ok");

					} else{
						header("Location:admin/urunler.php?durum=no");
					}
				}


				/*Kullanici Girişi*/
				if (isset($_POST['login'])) {

					$kullanici_ad=$_POST['kullanici_ad'];
					$kullanici_sifre=$_POST['kullanici_sifre'];

					if ($kullanici_ad && $kullanici_sifre) {

						$kullanicisor=$db->prepare("SELECT * FROM kullanici_tbl where kullanici_ad=:ad and kullanici_sifre=:sifre");
						$kullanicisor-> execute(array(
							'ad' => $kullanici_ad,
							'sifre' => $kullanici_sifre
						));

						echo $say=$kullanicisor->rowCount();

						if ($say>0) {
							$_SESSION['kullanici_ad'] = $kullanici_ad;
							header('Location:admin/index.php');
						} else {
							header('Location:admin/login.php?durum=2');

						}
					}
				}

				//Kullanici Ekleme
				if (isset($_POST['kullaniciekle'])) {

					$uploads_dir = 'admin/assets/img/users/';

					@$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
					@$name = $_FILES['kullanici_foto']["name"];

					$refimgyol = 'assets/img/users/'.$name;
					@move_uploaded_file($tmp_name, "$uploads_dir/$name");

					$urunkaydet=$db->prepare("INSERT INTO kullanici_tbl SET
						kullanici_ad=:ad,
						kullanici_sifre=:sifre,
						kullanici_zaman=:zaman,
						kullanici_hakkinda=:hakkinda,
						kullanici_dogumyeri=:dogumyeri,
						kullanici_adsoyad=:adsoyad,
						kullanici_yetki=:yetki,
						kullanici_facebook=:facebook,
						kullanici_twitter=:twitter,
						kullanici_github=:github,
						kullanici_instagram=:instagram,
						kullanici_tel=:tel,
						kullanici_foto=:foto
						");
						$insert=$urunkaydet->execute(array(
							'ad' => $_POST['kullanici_ad'],
							'sifre' => $_POST['kullanici_sifre'],
							'zaman' => $_POST['kullanici_zaman'],
							'hakkinda' => $_POST['kullanici_hakkinda'],
							'dogumyeri' => $_POST['kullanici_dogumyeri'],
							'adsoyad' => $_POST['kullanici_adsoyad'],
							'yetki' => $_POST['kullanici_yetki'],
							'facebook' => $_POST['kullanici_facebook'],
							'twitter' => $_POST['kullanici_twitter'],
							'github' => $_POST['kullanici_github'],
							'instagram' => $_POST['kullanici_instagram'],
							'tel' => $_POST['kullanici_tel'],
							'foto' => $refimgyol
						));

						if ($insert) {
							Header("Location:admin/kullanicilar.php?durum=ok");
						}
						else{
							Header("Location:admin/kullanicilar.php?durum=no");
						}
					}

					//Kullanici düzenleme
					if (isset($_POST['kullaniciduzenle'])) {

						$kullanicisor=$db->prepare("SELECT * FROM kullanici_tbl where kullanici_id=:kullanici_id");
						$kullanicisor->execute(array("kullanici_id" => $_POST['kullanici_id']));
						$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

						if ($_FILES['slider_resim']['size'] != 0) {
							$uploads_dir = 'admin/assets/img/users/';
							@$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
							@$name = $_FILES['kullanici_foto']["name"];
							$refimgyol = 'assets/img/users/'.$name;
							@move_uploaded_file($tmp_name, "$uploads_dir/$name");
						}else {
							$refimgyol = $kullanicicek['kullanici_foto'];
						}

						$kullaniciduzenle=$db->prepare("UPDATE kullanici_tbl SET
							kullanici_ad=:ad,
							kullanici_sifre=:sifre,
							kullanici_zaman=:zaman,
							kullanici_hakkinda=:hakkinda,
							kullanici_dogumyeri=:dogumyeri,
							kullanici_adsoyad=:adsoyad,
							kullanici_yetki=:yetki,
							kullanici_facebook=:facebook,
							kullanici_twitter=:twitter,
							kullanici_github=:github,
							kullanici_instagram=:instagram,
							kullanici_tel=:tel,
							kullanici_foto=:resim
							WHERE kullanici_id={$_POST['kullanici_id']}
							");
							$update=$kullaniciduzenle->execute(array(
								'ad' => $_POST['kullanici_ad'],
								'sifre' => $_POST['kullanici_sifre'],
								'zaman' => $_POST['kullanici_zaman'],
								'hakkinda' => $_POST['kullanici_hakkinda'],
								'dogumyeri' => $_POST['kullanici_dogumyeri'],
								'adsoyad' => $_POST['kullanici_adsoyad'],
								'yetki' => $_POST['kullanici_yetki'],
								'facebook' => $_POST['kullanici_facebook'],
								'twitter' => $_POST['kullanici_twitter'],
								'github' => $_POST['kullanici_github'],
								'instagram' => $_POST['kullanici_instagram'],
								'tel' => $_POST['kullanici_tel'],
								'resim' => $refimgyol
							));

							$kullanici_id=$_POST['kullanici_id'];

							if ($update) {
								Header("Location:admin/kullanicilar.php?kullanici_id=$kullanici_id&durum=ok");
							}
							else{
								Header("Location:admin/kullanicilar.php?durum=no");
							}
						}

						//Kullanici silme
						if($_GET['kullanicisil']=="ok") {

							$select = $db->prepare("SELECT * FROM kullanici_tbl where kullanici_id=:kullanici_id");
							$select->execute(array('kullanici_id' => $_GET['kullanici_id']));
							$bul = $select->fetch(PDO::FETCH_ASSOC);

							unlink($bul['kullanici_foto']);


							$sil=$db->prepare("DELETE FROM kullanici_tbl WHERE kullanici_id=:kullanici_id");
							$kontrol=$sil->execute(array(
								'kullanici_id' => $_GET['kullanici_id']
							));

							if ($kontrol) {
								header("Location:admin/kullanicilar.php?durum=ok");
							} else{
								header("Location:admin/urunler.php?durum=no");
							}
						}
