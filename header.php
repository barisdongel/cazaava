<?php
include 'baglan.php';
include 'function.php';
//ayarlar
$ayarsor =$db->prepare("SELECT * FROM ayar_tbl WHERE ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
//ayarlar son

//menü urunler
$urunler=$db->prepare("SELECT * FROM urunler_tbl");
$urunler->execute(array(0));
//son

?>
<!doctype html>
<html lang="tr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title><?=$ayarcek['ayar_title'] ?></title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/bootstrap/css/jquery.mobile.datepicker.css">
  <link rel="stylesheet" href="vendors/bootstrap/css/jquery.mobile.datepicker.theme.css">
  <link rel="stylesheet" href="vendors/themify/themify-icons.css">
  <link rel="stylesheet" href="vendors/font-awosome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/slick/slick.css">
  <link rel="stylesheet" href="vendors/animation/animate.css">
  <link rel="stylesheet" href="vendors/magnify-pop/magnific-popup.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200&display=swap" rel="stylesheet">
</head>
<body>
  <div class="body_wrapper">
    <div class="loader">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="-466.4 259.6 280.2 47.3" enable-background="new -466.4 259.6 280.2 47.3" xml:space="preserve">
        <polyline fill="none" stroke="#2196f4" class="heart" stroke-width="1" stroke-linecap="square" stroke-miterlimit="10" points="-465.4,281
        -436,281 -435.3,280.6 -431.5,275.2 -426.9,281 -418.9,281 -423.9,281 -363.2,281 -355.2,269 -345.2,303 -335.2,263 -325.2,291
        -319.2,281 -187.2,281 "></polyline>
      </svg>
    </div>
    <header class="header_area">
      <nav class="navbar navbar-expand-lg" id="header">
        <div class="container">
          <a class="navbar-brand" href="anasayfa"><img src="<?=$ayarcek['ayar_logo'] ?>" width="100%" alt=""></a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu_toggle">
              <span class="hamburger">
                <span></span>
                <span></span>
                <span></span>
              </span>
              <span class="hamburger-cross">
                <span></span>
                <span></span>
              </span>
            </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h2><?php echo $ayarcek['ayar_baslik']; ?></h2>
          </div>
          <div class="col-lg-2 col-6 lang text-center">
            <h6 style="border-bottom:1px solid #ddd;">Dil Tercihleri</h6>
            <a href="#" onclick="doGTranslate('auto|tr');return false;" title="Turkish"><img src="img/lang/tr.gif" alt="tr"> </a>
            <a href="#" onclick="doGTranslate('auto|en');return false;" title="English"><img src="img/lang/en.gif" alt="en"></a>
            <a href="#" onclick="doGTranslate('auto|ar');return false;" title="Arabic"><img src="img/lang/ar.gif" alt="ar"></a>
            <a href="#" onclick="doGTranslate('auto|es');return false;" title="Espanol"><img src="img/lang/es.gif" alt="es"></a>
          </div>
        </div>
      </nav>
    </header>
