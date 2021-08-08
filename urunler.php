<?php include 'header.php';
$kategorisov=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori");
$kategorisov->execute();

$kategoriso1=$db->prepare("SELECT * FROM kategori_tbl WHERE kategori_id>3 ORDER BY kategori_sira");
$kategoriso1->execute();

if (isset($_POST['aranan'])) {
	$aranan=$_POST['aranan'];
	$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_ad LIKE '%$aranan%'");
	$urunsor->execute();
}

?>
<!-- Page Title
============================================= -->
<div class="title font-com" style="background-image: url('demos/store/images/contact/2.jpg');">
	<h3 class="titular-title center font-com text-white p-5">ÜRÜNLERİMİZ</h3>
</div>

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap pb-0">
		<div class="container-fluid topmargin">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center"><a href="Urunler" class="border p-3 text-cavsa-mavi">Tüm Ürünler</a></h3>
					<ul class="justify-content-center nav nav-tabs theme-tabs urun-kategorileri" role="tablist">
						<?php while ($kategorice1=$kategoriso1->fetch(PDO::FETCH_ASSOC)) { ?>
							<li class="nav-item">
								<a class="nav-link"href="urunler.php?urun_kategori=<?php echo $kategorice1['kategori_id'] ?>"><img src="<?php echo $kategorice1['kategori_foto'];?>" class="img-fluid p-1" width="70" alt=""><?php echo $kategorice1['kategori_ad'];?></a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-12">
					<div id="shop" class="row shop grid-container" data-layout="fitRows">	


						<?php
						if (isset($_GET['urun_kategori'])) {
							$kategorisor=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori where urun_kategori=:urun_kategori");
							$kategorisor->execute(array("urun_kategori" => $_GET['urun_kategori']));

							$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_kategori=:urun_kategori ORDER BY urun_id");
							$urunsor->execute(array('urun_kategori' => $_GET['urun_kategori']));

							while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
								<!-- Shop Item 1
								============================================= -->
								<div class="col-lg-4 col-md-6 mb-4 sf-shoes sf-sportswear sf-new">
									<div class="product">
										<div class="product-image position-relative">
											<a href="urun?urun_id=<?php echo $uruncek['urun_id'] ?>"><img src="<?php echo $uruncek['urun_foto'] ?>" alt="Black Shoe"></a>
										</div>
										<div class="product-desc">
											<div class="product-title">
												<h3><a href="urun?urun_id=<?php echo $uruncek['urun_id'] ?>"><?php echo $uruncek['urun_aciklama'] ?></a></h3>
												<span><a href="#"><?php echo $uruncek['urun_ad'] ?></a></span>
											</div>
											<?php $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC) ?>
											<div class="product-price"><ins><?php echo $kategoricek['kategori_ad'] ?></ins></div>
										</div>
									</div>
								</div>
							<?php } }elseif (isset($_POST['aranan'])) {
								$aranan=$_POST['aranan'];
								$urunso1=$db->prepare("SELECT * FROM urunler_tbl where urun_ad LIKE '%$aranan%'");
								$urunso1->execute();
								while ($uruncek=$urunso1->fetch(PDO::FETCH_ASSOC)) { ?>
									<div class="col-lg-4 col-md-6 mb-4 sf-shoes sf-sportswear sf-new">
										<div class="product">
											<div class="product-image position-relative">
												<a href="urun?urun_id=<?php echo $uruncek['urun_id'] ?>"><img src="<?php echo $uruncek['urun_foto'] ?>" alt="Black Shoe"></a>
											</div>
											<div class="product-desc">
												<div class="product-title">
													<h3><a href="urun?urun_id=<?php echo $uruncek['urun_id'] ?>"><?php echo $uruncek['urun_aciklama'] ?></a></h3>
													<span><a href="#"><?php echo $uruncek['urun_ad'] ?></a></span>
												</div>
												<?php $kategoricek=$kategorisov->fetch(PDO::FETCH_ASSOC) ?>
												<div class="product-price"><ins><?php echo $kategoricek['kategori_ad'] ?></ins></div>
											</div>
										</div>
									</div>
								<?php } }else{
								$urunsov =$db->prepare("SELECT * FROM urunler_tbl ORDER BY urun_id");
								$urunsov->execute();
								while ($uruncek=$urunsov->fetch(PDO::FETCH_ASSOC)) { ?>
									<div class="col-lg-4 col-md-6 mb-4 sf-shoes sf-sportswear sf-new">
										<div class="product">
											<div class="product-image position-relative">
												<a href="urun?urun_id=<?php echo $uruncek['urun_id'] ?>"><img src="<?php echo $uruncek['urun_foto'] ?>" alt="Black Shoe"></a>
											</div>
											<div class="product-desc">
												<div class="product-title">
													<h3><a href="urun?urun_id=<?php echo $uruncek['urun_id'] ?>"><?php echo $uruncek['urun_aciklama'] ?></a></h3>
													<span><a href="#"><?php echo $uruncek['urun_ad'] ?></a></span>
												</div>
												<?php $kategoricek=$kategorisov->fetch(PDO::FETCH_ASSOC) ?>
												<div class="product-price"><ins><?php echo $kategoricek['kategori_ad'] ?></ins></div>
											</div>
										</div>
									</div>
								<?php } }?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

		<?php include 'footer.php' ?>
