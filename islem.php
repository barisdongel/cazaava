<?php
ob_start();
session_start();
include 'baglan.php';

/*
GÜNCELLEME İŞLEMLERİ
*/

//Genel Ayarlar Güncelleme İşlemi
if (isset($_POST['ayarguncelle'])) {

	$uploads_dir = 'demos/store/images/logo/';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$refimgyol = $uploads_dir.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$name");

	$ayarkaydet=$db->prepare("UPDATE ayar_tbl SET
		ayar_siteurl=:siteurl,
		ayar_title=:title,
		ayar_desc=:description,
		ayar_author=:author,
		ayar_key=:key,
		ayar_baslik=:baslik,
		ayar_footer=:footer,
		ayar_googlemap=:googlemap,
		ayar_logo=:logo
		WHERE ayar_id=0
		");
		$update=$ayarkaydet->execute(array(
			'siteurl' => $_POST['ayar_siteurl'],
			'title' => $_POST['ayar_title'],
			'description' => $_POST['ayar_desc'],
			'author' => $_POST['ayar_author'],
			'key' => $_POST['ayar_key'],
			'baslik' => $_POST['ayar_baslik'],
			'footer' => $_POST['ayar_footer'],
			'googlemap' => $_POST['ayar_googlemap'],
			'logo' => $refimgyol
		));

		if ($update) {
			Header("Location:cavsadmin/ayarlar.php?durum=ok");
		}
		else{
			Header("Location:cavsadmin/ayarlar.php?durum=no");
		}
	}
	//İletişim Ayarları Güncelleme İşlemi
	if (isset($_POST['iletisimguncelle'])) {

		$iletisimkaydet=$db->prepare("UPDATE ayar_tbl SET
			ayar_adres=:adres,
			ayar_il=:il,
			ayar_ilce=:ilce,
			ayar_tel=:tel,
			ayar_mail=:mail,
			ayar_facebook=:facebook,
			ayar_twitter=:twitter,
			ayar_instagram=:instagram,
			ayar_linkedin=:linkedin
			WHERE ayar_id=0
			");
			$update=$iletisimkaydet->execute(array(
				'adres' => $_POST['ayar_adres'],
				'il' => $_POST['ayar_il'],
				'ilce' => $_POST['ayar_ilce'],
				'tel' => $_POST['ayar_tel'],
				'mail' => $_POST['ayar_mail'],
				'facebook' => $_POST['ayar_facebook'],
				'twitter' => $_POST['ayar_twitter'],
				'instagram' => $_POST['ayar_instagram'],
				'linkedin' => $_POST['ayar_linkedin']
			));

			if ($update) {
				Header("Location:cavsadmin/iletisim.php?durum=ok");
			}
			else{
				Header("Location:cavsadmin/iletisim.php?durum=no");
			}
		}

		/*SLIDER İŞLEMLERİ*/
		//Slider Ekleme
		if (isset($_POST['sliderekle'])) {

			$uploads_dir = 'demos/store/images/slider/';

			@$tmp_name = $_FILES['slider_resim']["tmp_name"];
			@$name = $_FILES['slider_resim']["name"];

			$refimgyol = $uploads_dir.$name;
			@move_uploaded_file($tmp_name, "$uploads_dir/$name");

			$sliderkaydet=$db->prepare("INSERT INTO slider_tbl SET
				slider_ad=:ad,
				slider_sira=:sira,
				slider_resim=:resim
				");
				$insert=$sliderkaydet->execute(array(
					'ad' => $_POST['slider_ad'],
					'sira' => $_POST['slider_sira'],
					'resim' => $refimgyol
				));

				if ($insert) {
					Header("Location:cavsadmin/slider.php?durum=ok");
				}
				else{
					Header("Location:cavsadmin/slider.php?durum=no");
				}
			}

			//slider guncelleme
			if (isset($_POST['sliderduzenle'])) {

				$uploads_dir = 'demos/store/images/slider/';

				@$tmp_name = $_FILES['slider_resim']["tmp_name"];
				@$name = $_FILES['slider_resim']["name"];

				$refimgyol = $uploads_dir.$name;
				@move_uploaded_file($tmp_name, "$uploads_dir/$name");

				$sliderduzenle=$db->prepare("UPDATE slider_tbl SET
					slider_ad=:ad,
					slider_sira=:sira,
					slider_resim=:resim
					WHERE slider_id={$_POST['slider_id']}
					");
					$update=$sliderduzenle->execute(array(
						'ad' => $_POST['slider_ad'],
						'sira' => $_POST['slider_sira'],
						'resim' => $refimgyol
					));

					$slider_id=$_POST['slider_id'];

					if ($update) {
						Header("Location:cavsadmin/slider.php?slider_id=$slider_id&durum=ok");
					}
					else{
						Header("Location:cavsadmin/slider.php?durum=no");
					}
				}

				//slider silme
				if ($_GET['slidersil']=='ok') {

					$select = $db->prepare("SELECT * FROM slider_tbl where slider_id=:slider_id");
					$select->execute(array('slider_id' => $_GET['slider_id']));
					$bul = $select->fetch(PDO::FETCH_ASSOC);

					unlink($bul['slider_resim']);

					$sil=$db->prepare("DELETE FROM slider_tbl where slider_id=:slider_id");
					$kontrol=$sil->execute(array(
						"slider_id" => $_GET['slider_id']
					));

					if ($kontrol) {
						Header("Location:cavsadmin/slider.php?durum=ok");
					}
					else{
						Header("Location:cavsadmin/slider.php?durum=no");
					}
				}

				/*ÜRÜN İŞLEMLERİ*/

				//Ürün Ekleme
				if (isset($_POST['urunekle'])) {

					$uploads_dir = 'demos/store/images/product/';

					@$tmp_name = $_FILES['urun_foto']["tmp_name"];
					@$name = $_FILES['urun_foto']["name"];

					$sayi1=rand(10000,99999);

					$refimgyol = $uploads_dir.$sayi1.$name;
					@move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

					$urunkaydet=$db->prepare("INSERT INTO urunler_tbl SET
						urun_ad=:ad,
						urun_aciklama=:aciklama,
						urun_ozellik=:ozellik,
						urun_kategori=:kategori,
						urun_foto=:foto
						");
						$insert=$urunkaydet->execute(array(
							'ad' => $_POST['urun_ad'],
							'aciklama' => $_POST['urun_aciklama'],
							'ozellik' => $_POST['urun_ozellik'],
							'kategori' => $_POST['urun_kategori'],
							'foto' => $refimgyol
						));

						if ($insert) {
							Header("Location:cavsadmin/urunler.php?durum=ok");
						}
						else{
							Header("Location:cavsadmin/urunler.php?durum=no");
						}
					}

					//ürün düzenleme
					if (isset($_POST['urunduzenle'])) {

						$uploads_dir = 'demos/store/images/product/';

						@$tmp_name = $_FILES['urun_foto']["tmp_name"];
						@$name = $_FILES['urun_foto']["name"];

						$sayi1=rand(10000,99999);

						$refimgyol = $uploads_dir.$sayi1.$name;
						@move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

						$urunduzenle=$db->prepare("UPDATE urunler_tbl SET
							urun_ad=:ad,
							urun_aciklama=:aciklama,
							urun_ozellik=:ozellik,
							urun_kategori=:kategori,
							urun_foto=:foto
							WHERE urun_id={$_POST['urun_id']}
							");
							$update=$urunduzenle->execute(array(
								'ad' => $_POST['urun_ad'],
								'aciklama' => $_POST['urun_aciklama'],
								'ozellik' => $_POST['urun_ozellik'],
								'kategori' => $_POST['urun_kategori'],
								'foto' => $refimgyol
							));

							$urun_id=$_POST['urun_id'];

							if ($update) {
								Header("Location:cavsadmin/urunler.php?urun_id=$urun_id&durum=ok");
							}
							else{
								Header("Location:cavsadmin/urunler.php?durum=no");
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
								header("Location:cavsadmin/urunler.php?durum=ok");

							} else{
								header("Location:cavsadmin/urunler.php?durum=no");
							}
						}

						/*Ürün Kategori İşlemleri*/
						//kategori Ekleme
						if (isset($_POST['kategoriekle'])) {

							$uploads_dir = 'demos/store/images/product/kategori/';

							$tmp_name = $_FILES['kategori_foto']["tmp_name"];
							$name = $_FILES['kategori_foto']["name"];

							$sayi1=rand(10000,99999);

							$refimgyol = $uploads_dir.$sayi1.$name;
							@move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

							$kategorikaydet=$db->prepare("INSERT INTO kategori_tbl SET
								kategori_ad=:ad,
								kategori_ust=:ust,
								kategori_sira=:sira,
								kategori_foto=:foto
								");
								$insert=$kategorikaydet->execute(array(
									'ad' => $_POST['kategori_ad'],
									'ust' => $_POST['kategori_ust'],
									'sira' => $_POST['kategori_sira'],
									'foto' => $refimgyol
								));

								if ($insert) {
									Header("Location:cavsadmin/kategoriler.php?durum=ok");
								}
								else{
									Header("Location:cavsadmin/kategoriler.php?durum=no");
								}
							}

							//kategori düzenleme
							if (isset($_POST['kategoriduzenle'])) {

								$uploads_dir = 'demos/store/images/product/kategori/';

								$tmp_name = $_FILES['kategori_foto']["tmp_name"];
								$name = $_FILES['kategori_foto']["name"];

								$sayi1=rand(10000,99999);

								$refimgyol = $uploads_dir.$sayi1.$name;
								@move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

								$urunduzenle=$db->prepare("UPDATE kategori_tbl SET
									kategori_ad=:ad,
									kategori_ust=:ust,
									kategori_sira=:sira,
									kategori_foto=:foto
									WHERE kategori_id={$_POST['kategori_id']}
									");
									$update=$urunduzenle->execute(array(
										'ad' => $_POST['kategori_ad'],
										'ust' => $_POST['kategori_ust'],
										'sira' => $_POST['kategori_sira'],
										'foto' => $refimgyol
									));

									$kategori_id=$_POST['kategori_id'];

									if ($update) {
										Header("Location:cavsadmin/kategoriler.php?kategori_id=$kategori_id&durum=ok");
									}
									else{
										Header("Location:cavsadmin/kategoriler.php?durum=no");
									}
								}

									//ketegori silme
									if ($_GET['kategorisil']=='ok') {
										$select = $db->prepare("SELECT * FROM kategori_tbl where kategori_id=:kategori_id");
										$select->execute(array('kategori_id' => $_GET['kategori_id']));
										$bul = $select->fetch(PDO::FETCH_ASSOC);

										unlink($bul['kategori_foto']);

										$sil=$db->prepare("DELETE FROM kategori_tbl WHERE kategori_id=:kategori_id");
										$kontrol=$sil->execute(array('kategori_id' => $_GET['kategori_id']));

										if ($kontrol) {
											header("Location:cavsadmin/kategoriler.php?durum=ok");

										} else{
											header("Location:cavsadmin/kategoriler.php?durum=no");
										}
									}

									/*Ürün Fotogaleri İşlemleri*/
									//Fotogaleri ekleme
									if (isset($_POST['fotogaleriekle'])) {

										for ($i=0; $i<count($_FILES['resim']["name"]); $i++) {
											$uploads_dir = 'demos/store/images/product/fotogaleri/';

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
													Header("Location:cavsadmin/urunler.php?durum=ok");
												}
												else{
													Header("Location:cavsadmin/urunler.php?durum=no");
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
												header("Location:cavsadmin/urunler.php?durum=ok");

											} else{
												header("Location:cavsadmin/urunler.php?durum=no");
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
													header('Location:cavsadmin/index.php');
												} else {
													header('Location:cavsadmin/login.php?durum=2');

												}
											}
										}

										//Kullanici Ekleme
										if (isset($_POST['kullaniciekle'])) {

											$uploads_dir = '../cavsadmin/assets/img/users/';

											@$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
											@$name = $_FILES['kullanici_foto']["name"];

											$refimgyol = $uploads_dir.$name;
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
													Header("Location:cavsadmin/kullanicilar.php?durum=ok");
												}
												else{
													Header("Location:cavsadmin/kullanicilar.php?durum=no");
												}
											}

											//Kullanici düzenleme
											if (isset($_POST['kullaniciduzenle'])) {

												$uploads_dir = '../cavsadmin/assets/img/users/';

												@$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
												@$name = $_FILES['kullanici_foto']["name"];

												$refimgyol = $uploads_dir.$name;
												@move_uploaded_file($tmp_name, "cavsadmin/$uploads_dir/$name");

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
													kullanici_foto=:foto
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
														'foto' => $refimgyol
													));

													$kullanici_id=$_POST['kullanici_id'];

													if ($update) {
														Header("Location:cavsadmin/kullanicilar.php?kullanici_id=$kullanici_id&durum=ok");
													}
													else{
														Header("Location:cavsadmin/kullanicilar.php?durum=no");
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
														header("Location:cavsadmin/kullanicilar.php?durum=ok");
													} else{
														header("Location:cavsadmin/urunler.php?durum=no");
													}
												}

												?>
