<?php
include 'header.php';
$url = $_SERVER['QUERY_STRING'];
if ($url == '' || $url== NULL || $url == 'durum=ok' || $url == 'durum=no') {
  $kategorisor=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori");
  $kategorisor->execute();

  $urunsor=$db->prepare("SELECT * FROM urunler_tbl ORDER BY urun_id ASC limit 20");
  $urunsor->execute();
  $say=$urunsor->rowCount();
}else{
  $kategorisor=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori where urun_kategori=:urun_kategori");
  $kategorisor->execute(array('urun_kategori' => $_GET['urun_kategori']));

  $urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_kategori=:urun_kategori");
  $urunsor->execute(array('urun_kategori' => $_GET['urun_kategori']));
}
if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $urunsor=$db->prepare("SELECT * FROM urunler_tbl WHERE urun_ad LIKE '%$aranan%' ORDER BY urun_id ASC limit 20");
  $urunsor->execute();
  $say=$urunsor->rowCount();
}
$kategoriso1=$db->prepare("SELECT * FROM kategori_tbl");
$kategoriso1->execute();
?>
<section class="fiona_service_area">
  <div class="section_title text-center wow fadeInUp" data-wow-delay="0.3s">
    <h2 class="s_title">Ava Arşiv</h2>
  </div>
  <div class="container mb-3">
    <h3>KATEGORİLER</h3>
    <div class="row">
        <td><a href="anasayfa" class="border font-weight-bold p-3 text-center text-dark m-2">Tüm Mapler</a></td>
        <?php while ($kategorice1=$kategoriso1->fetch(PDO::FETCH_ASSOC)) { ?>
          <td><a href="anasayfa?urun_kategori=<?=$kategorice1['kategori_id'] ?>" class="border font-weight-bold p-3 m-2 text-center text-dark"><?=$kategorice1['kategori_ad'];?></a></td>
        <?php } ?>
    </div>
  </div>
  <div class="container">
    <form action="" method="POST" class="container">
      <h3 class="text-center">Aramak istediğiniz mapin adını giriniz</h3>
      <div class="input-group col-md-11 p-2 m-2">
        <i class="fa fa-search p-2 bg-dark text-white text-center" style="width:8%;"></i>
        <input type="text" name="aranan" class="form-control" placeholder="Ara..">
        <button style="border-radius: 0px; width:8%;" type="submit" name="arama" class="btn btn-dark">Ara!</button>
      </div>
    </form>
    <div class="row">
      <?php foreach ($urunsor as $rows) {?>
        <div class="col-lg-4 col-sm-6">
          <a href="urun-detay.php?urun_id=<?=$rows['urun_id']?>">
            <div class="fiona_service_item wow fadeInLeft">
              <img src="<?=$rows['urun_foto']?>" alt="<?=$rows['urun_ad']?>" width="100%">
              <h5><?=$rows['urun_ad']?></h5>
              <p><?php echo kisalt($rows['urun_ozellik'],80)?></p>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
