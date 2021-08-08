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
<div class="title font-com">
	<h3 class="titular-title center font-com p-5">MAP DETAY</h3>
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
									<a class="grid-item" href="<?=$uruncek['urun_foto'] ?>" data-lightbox="gallery-item" target="_blank"><img src="<?=$uruncek['urun_foto'] ?>" alt="Watch 1" width="100%"></a>
							</div>

						</div>

						<div class="col-xl-7 col-lg-7 mb-0">

							<div class="line line-sm"></div>

							<div data-readmore-size="250px">

								<h3><?=$uruncek['urun_ad'] ?></h3>

								<!-- Product Single - Short Description
								============================================= -->
								<p><?=$uruncek['urun_aciklama'] ?></p>
							</div>

							<!-- Product Single - Meta
							============================================= -->
							<div class="card product-meta mt-4 mb-5 rounded-0">
								<div class="card-body">
									<?php $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC); ?>
									<span itemprop="productID" class="sku_wrapper"><?=$kategoricek['kategori_ad'] ?></span></span>
								</div>
							</div><!-- Product Single - Meta End -->

							<div>
								<h4>Map Detayları</h4>
								<?=$uruncek['urun_ozellik'] ?>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</section><!-- #content end -->

<?php include 'footer.php' ?>
