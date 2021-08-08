<?php include 'header.php';

$urunsor=$db->prepare("SELECT * FROM urunler_tbl where urun_id=:urun_id");
$urunsor->execute(array('urun_id' => $_GET['urun_id']));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

$fotogalerisor=$db->prepare("SELECT * FROM urun_fotogaleritbl where urun_id=:urun_id");
$fotogalerisor->execute(array('urun_id' => $_GET['urun_id']));

$kategorisor=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori where urun_id=:urun_id");
$kategorisor->execute(array('urun_id' => $_GET['urun_id']));

$kategorisob=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori");
$kategorisob->execute();
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
		<div class="single-product mb-6">
			<div class="product">
				<div class="container-fluid">
					<div class="row gutter-50">
						<div class="col-xl-5 col-lg-5 mb-0 sticky-sidebar-wrap">

							<div class="masonry-thumbs grid-container grid-2" data-lightbox="gallery">
								<?php  while ($fotogalericek=$fotogalerisor->fetch(PDO::FETCH_ASSOC)){ ?>
									<a class="grid-item" href="<?php echo $fotogalericek['resim'] ?>" data-lightbox="gallery-item"><img src="<?php echo $fotogalericek['resim'] ?>" alt="Watch 1"></a>
								<?php } ?>
							</div>

						</div>

						<div class="col-xl-7 col-lg-7 mb-0">

							<div class="line line-sm"></div>

							<div data-readmore-size="250px">

								<h3><?php echo $uruncek['urun_ad'] ?></h3>

								<!-- Product Single - Short Description
								============================================= -->
								<p><?php echo $uruncek['urun_aciklama'] ?></p>
							</div>

							<!-- Product Single - Meta
							============================================= -->
							<div class="card product-meta mt-4 mb-5 rounded-0">
								<div class="card-body">
									<?php $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); ?>
									<span itemprop="productID" class="sku_wrapper"><?php echo $kategoricek['kategori_ad'] ?></span></span>
								</div>
							</div><!-- Product Single - Meta End -->

							<div>
								<h4>Ürün Detayları</h4>
								<?php echo $uruncek['urun_ozellik'] ?>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="section mb-0">

			<div class="container mw-md text-center">
				<h4>Diğer Ürünler</h4>

				<div class="row justify-content-center gutter-1">
					<?php
					$benzersor =$db->prepare("SELECT * FROM urunler_tbl ORDER BY urun_id LIMIT 3");
					$benzersor->execute();
					while ($benzercek=$benzersor->fetch(PDO::FETCH_ASSOC)) { ?>
						<div class="col-md-3 col-6 h-translate-y-sm all-ts">
							<div class="product bg-white">
								<div class="product-image position-relative">
									<a href="urun?urun_id=<?php echo $benzercek['urun_id'] ?>"><img src="<?php echo $benzercek['urun_foto'] ?>" alt="Black Shoe"></a>
								</div>
								<div class="product-desc flex-column px-4">
									<div class="product-title">
										<h3><a href="urun?urun_id=<?php echo $benzercek['urun_id'] ?>"><?php echo $benzercek['urun_ad'] ?></a></h3>
										<?php $kategoriceb=$kategorisob->fetch(PDO::FETCH_ASSOC); ?>
										<span><a href="#"><?php echo $kategoriceb['kategori_ad'] ?></a></span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>

			</div>

		</div>

	</div>
</section><!-- #content end -->

<?php include 'footer.php' ?>
