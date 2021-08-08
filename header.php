<?php
include 'baglan.php';
include 'function.php';

$ayarsor =$db->prepare("SELECT * FROM ayar_tbl WHERE ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
	<title><?php echo $ayarcek['ayar_title'] ?></title>
	<!--
	<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $ayarcek['ayar_desc'] ?>">
<meta name="keywords" content="<?php echo $ayarcek['ayar_key'] ?>">
<meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">

<!-- Stylesheets
============================================= -->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/swiper.css" type="text/css" />
<link rel="stylesheet" href="css/dark.css" type="text/css" />


<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="css/animate.css" type="text/css" />
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

<!--FONTAWESOME-->
<link rel="stylesheet" type="text/css" href="css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

<link rel="stylesheet" href="css/custom.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Store Demo Specific Stylesheet -->
<link rel="stylesheet" href="css/colors2135.css?color=222222" type="text/css" /> <!-- Store Theme Color -->
<link rel="stylesheet" href="demos/store/css/fonts.css" type="text/css" /> <!-- Store Theme Font -->
<link rel="stylesheet" href="demos/store/store.css" type="text/css" /> <!-- Store Theme Custom CSS -->
<!-- / -->

<!--fonts-->
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Commissioner&family=Crimson+Text&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

</head>

<body class="stretched modal-subscribe-bottom">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<div id="top-bar">
			<div class="clearfix pr-5 pl-5">

				<div class="row">

					<div class="col-8">
						<!-- Top Social
						============================================= -->
						<ul id="top-social">
							<li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text"><?php echo $ayarcek['ayar_facebook'] ?></span></a></li>
							<li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text"><?php echo $ayarcek['ayar_instagram'] ?></span></a></li>
							<li><a href="tel:+90 (338) 213 00 77" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text"><?php echo $ayarcek['ayar_tel'] ?></span></a></li>
							<li><a href="<?php echo $ayarcek['ayar_mail'] ?>" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text"><?php echo $ayarcek['ayar_mail'] ?></span></a></li>
						</ul><!-- #top-social end -->

					</div>
					<div class="col-4 p-2" style="text-align: right;">
						<span class="font-com" style="font-weight: bold;">Dil Tercihleri: </span>
						<a href="#" onclick="doGTranslate('auto|tr');return false;" title="Turkish"><img src="demos/store/images/lang/tr.gif" width="25"></a>
						<a href="#" onclick="doGTranslate('auto|en');return false;" title="English"><img src="demos/store/images/lang/en.gif" width="25"></a>
					</div>
				</div>

			</div>
		</div><!-- #top-bar end -->
		<!-- Header
		============================================= -->
		<header id="header" class="full-header">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="Anasayfa" class="standard-logo" data-dark-logo="<?php echo $ayarcek['ayar_logo'] ?>"><img src="<?php echo $ayarcek['ayar_logo'] ?>" class="p-2" alt="Canvas Logo"></a>
							<a href="Anasayfa" class="retina-logo" data-dark-logo="<?php echo $ayarcek['ayar_logo'] ?>"><img src="<?php echo $ayarcek['ayar_logo'] ?>" class="p-2" alt="Canvas Logo"></a>
						</div><!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div><!-- #top-search end -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu style-6">

							<ul class="menu-container">
								<li class="menu-item"><a class="menu-link" href="Anasayfa"><div>ANASAYFA</div></a></li>
								<li class="menu-item mega-menu"><a class="menu-link" href="Kurumsal"><div class="main-menu">KURUMSAL</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row text-center">
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-3">
													<li class="mega-menu-title menu-item"><a class="menu-link" href="Kurumsal#hakkimizda"><div>HAKKIMIZDA</div></a>
														<ul class="sub-menu-container">
															<a href="Kurumsal#hakkimizda"><i class="fa fa-users fa-5x text-cavsa-mavi"></i></a>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-3">
													<li class="mega-menu-title menu-item"><a class="menu-link" href="Kurumsal#vision"><div>VİZYONUMUZ</div></a>
														<ul class="sub-menu-container">
															<a href="Kurumsal#vision" class="text-success"><i class="fas fa-chart-line fa-5x text-cavsa-mavi"></i></a>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-3">
													<li class="mega-menu-title menu-item"><a class="menu-link" href="Kurumsal#mision"><div>MİSYONUMUZ</div></a>
														<ul class="sub-menu-container">
															<a href="Kurumsal#mision" class="text-success"><i class="fas fa-chess-king fa-5x text-cavsa-mavi"></i></a>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-3">
													<li class="mega-menu-title menu-item"><a class="menu-link" href="Kurumsal#degerlerimiz"><div>DEĞERLERİMİZ</div></a>
														<ul class="sub-menu-container">
															<a href="Kurumsal#degerlerimiz" class="text-success"><i class="fas fa-hands fa-5x text-cavsa-mavi"></i></a>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-12">
													<ul class="sub-menu-container">
														<li class="mega-menu-title menu-item"><a class="menu-link" href="#"></a><h3>Bu Sektörde Lider Bir Markayız ve Her Müşterimiz İçin Özel Çözümler Üretiyoruz.</h3>
															<p>ÇAVSA GROUP sektörde 21 yıllık tecrübeye sahip yönetici, asistan, hat sorumluları, bakım sorumluları ve deneyimli idari personelleri ile yenilikçi, çevreye dost, kaliteli, özgün ve işlevsel tasarım hedefiyle üretim gerçekleştirmektedir.</p>
														</li>

													</ul>
												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
								<li class="menu-item mega-menu"><a class="menu-link" href="Urunler"><div class="main-menu">ÜRÜNLERİMİZ</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-6">
													<li class="mega-menu-title menu-item"><a class="menu-link" href="Urunler"><div>Plastik Enjeksiyon</div></a>
														<ul class="sub-menu-container">
															<?php
															$kategoriler = $db->query("SELECT * FROM kategori_tbl WHERE kategori_ust=2", PDO::FETCH_ASSOC);
															foreach ($kategoriler as $kategori) { ?>
																<li class="menu-item"><a class="menu-link" href="Urunler?urun_kategori=<?php echo $kategori['kategori_id'] ?>"><img src="<?php echo $kategori['kategori_foto']; ?>" class="img-fluid pr-2" width="60" alt="urun"><?php echo $kategori['kategori_ad']; ?></a></li>
															<?php } ?>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-6">
													<li class="mega-menu-title menu-item"><a class="menu-link" href="Urunler"><div>Ambalaj Grubu</div></a>
														<ul class="sub-menu-container">
															<?php
															$kategorile1 = $db->query("SELECT * FROM kategori_tbl WHERE kategori_ust=3", PDO::FETCH_ASSOC);
															foreach ($kategorile1 as $kategori) { ?>
																<li class="menu-item"><a class="menu-link" href="Urunler?urun_kategori=<?php echo $kategori['kategori_id'] ?>"><img src="<?php echo $kategori['kategori_foto']; ?>" class="img-fluid pr-2" width="60" alt="urun"><?php echo $kategori['kategori_ad']; ?></a></li>
															<?php } ?>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
								<li class="menu-item mega-menu"><a class="menu-link" href="Faaliyetlerimiz"><div class="main-menu">FAALİYET ALANLARIMIZ</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row text-center">
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-4">
													<li class="mega-menu-title menu-item ">
														<a class="menu-link text-info" href="Faaliyetlerimiz#sogukhava">ÇAVSA SOĞUK HAVA <hr><br><br><img class="faaliyet-menu-foto" src="demos/store/images/others/soguk-oda-surgulu-kapi.jpg" width="200"></a>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-4">
													<li class="mega-menu-title menu-item">
														<a class="menu-link text-info" href="Faaliyetlerimiz#paketleme">ÇAVSA PAKETLEME <hr><br><br><img class="faaliyet-menu-foto" src="demos/store/images/others/cavsa-paketleme.jpg" width="200"></a>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container border-left-0 col-lg-4">
													<li class="mega-menu-title menu-item">
														<a class="menu-link text-info" href="Faaliyetlerimiz#plastik">ÇAVSA PLASTİK <hr><br><br><img class="faaliyet-menu-foto" src="demos/store/images/others/plastik.jpg" width="200" height="135"></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
								<li class="menu-item"><a class="menu-link" href="#" target="_blank"><div class="main-menu">E-KATALOG</div></a></li>
								<li class="menu-item mega-menu"><a class="menu-link" href="Iletisim"><div class="main-menu">İLETİŞİM</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="mega-menu-column sub-menu-container col-lg-4 border-left-0">
													<li class="mega-menu-title menu-item"><a class="menu-link text-info" href="#"><div>İletişime Geçin</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item">
																<div class="widget">
																	<address>
																		<strong><?php echo $ayarcek['ayar_il']?>:</strong><br>
																		<?php echo $ayarcek['ayar_ilce']?><br>
																		<?php echo $ayarcek['ayar_adres']?><br>
																	</address>
																	<abbr title="Telefon Numarası"><strong>Telefon:</strong></abbr><?php echo $ayarcek['ayar_tel'] ?><br>
																	<abbr title="Fax"><strong>Fax:</strong></abbr> +90 (338) 212 33 21<br>
																	<abbr title="Email"><strong>Email:</strong></abbr> <?php echo $ayarcek['ayar_mail'] ?>
																</div>
															</li>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container col-lg-2 border-left-0">
													<li class="mega-menu-title menu-item"><a class="menu-link text-info" href="#"><div>Sosyal Medya</div></a>
														<ul class="sub-menu-container social-navbar">
															<li class="menu-item"><a class="menu-link" href="<?php echo $ayarcek['ayar_facebook'] ?>"><div class="text-primary"><i class="fab fa-facebook"></i>Facebook</div></a></li>
															<li class="menu-item"><a class="menu-link" href="<?php echo $ayarcek['ayar_instagram'] ?>"><div class="text-instagram"><i class="fab fa-instagram"></i>Instagram</div></a></li>
															<li class="menu-item"><a class="menu-link" href="<?php echo $ayarcek['ayar_mail'] ?>"><div class="text-primary"><i class="fa fa-envelope-o"></i>Mail</div></a></li>
															<li class="menu-item"><a class="menu-link" href="<?php echo $ayarcek['ayar_tel'] ?>"><div class="text-danger"><i class="fa fa-phone"></i>Telefon</div></a></li>
														</ul>
													</li>
												</ul>
												<ul class="mega-menu-column sub-menu-container col-lg-6 border-left-0 mb-3">
													<li class="mega-menu-title menu-item"><a class="menu-link text-info" href="#"><div>Google Map</div></a>
														<iframe src="<?php echo $ayarcek['ayar_googlemap']; ?>" width="400" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="urunler.php" method="POST">
							<input type="text" name="aranan" class="form-control" value="" placeholder="Ürün ara..." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->
