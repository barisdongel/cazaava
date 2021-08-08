<?php include 'header.php';
$url = $_SERVER['QUERY_STRING'];
if ($url == '' || $url== NULL) {
  $sayfa =$db->prepare("SELECT * FROM sayfalar_tbl");
  $sayfa->execute(array(0));
  $sayfalist=$sayfa->fetch(PDO::FETCH_ASSOC);
}else{
  $sayfa=$db->prepare("SELECT * FROM sayfalar_tbl WHERE sayfa_id=:sayfa_id");
  $sayfa->execute(array('sayfa_id' => $_GET['sayfa_id']));
  $sayfalist=$sayfa->fetch(PDO::FETCH_ASSOC);
  if (empty($sayfalist['sayfa_id'])) {
    header('Location: 404');
  }
}
?>
<section class="breadcrumb_area parallaxie"  data-background="<?=$sayfalist['sayfa_banner']?>" style="background: url(<?=$sayfalist['sayfa_banner']?>) no-repeat;">
    <div class="container">
        <div class="breadcrumb_content">
            <h1><?=$sayfalist['sayfa_adi']?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="anasayfa">Anasayfa</a></li>
                <li class="breadcrumb-item"><?=$sayfalist['sayfa_adi']?></li>
            </ol>
        </div>
    </div>
</section>
<section class="fiona_about_area_two sec_pad">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="fiona_about_content">
          <h4 class="s_t_top"><?=$sayfalist['sayfa_adi']?></h4>
          <p><?=$sayfalist['sayfa_icerik'] ?></p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="about_author_img">
          <img src="<?=$sayfalist['sayfa_resim'] ?>" width="100%" alt="<?=$sayfalist['sayfa_resim'] ?>">
          <img class="about_dot" src="img/home-2/pattern_bg.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
