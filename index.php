<?php
include 'header.php';
include 'slider.php';
$kategorisob=$db->prepare("SELECT * FROM urunler_tbl inner join kategori_tbl on kategori_tbl.kategori_id=urunler_tbl.urun_kategori");
$kategorisob->execute();
?>


<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap pb-0">
""
		<div class="container-fluid">
			<div class="mx-auto center bottommargin" style="max-width: 700px">
				<h2 class="buyukharf font-com">21 yıllık deneyim ve tecrübe ile en iyi çözümler</h2>
				<p>Çavsa Soğukhava ve Paketleme Tesisleri 21 yıllık tecrübesi ile siz değerli müşterilerimize hem ekonomik hem de kaliteli ürünler sunmaktadır.</p>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row mt-2">
				<?php
				$coksatan =$db->prepare("SELECT * FROM urunler_tbl ORDER BY urun_id LIMIT 3");
				$coksatan->execute();
				while ($coksatanscek=$coksatan->fetch(PDO::FETCH_ASSOC)) { ?>
					<div class="col-md-4 mb-5">
						<div class="card rounded-0 border-0 dark">
							<img src="<?php echo $coksatanscek['urun_foto'] ?>" class="card-img" alt="...">
							<div class="align-items-start card-img-overlay p-4">
								<h3 class="h2 text-dark ls--1 font-weight-bold"><?php echo $coksatanscek['urun_ad'] ?></h3>
								<?php $kategoriceb=$kategorisob->fetch(PDO::FETCH_ASSOC); ?>
								<span class="text-dark"><?php echo $kategoriceb['kategori_ad'] ?></span>
								<p class="text-dark"><?php echo $coksatanscek['urun_aciklama'] ?></p>
								<a href="urun?urun_id=<?php echo $coksatanscek['urun_id'] ?>" class="button button button-white button-light ml-0">Detay</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row mt-5">
				<div class="col-md-12 mb-5 text-center row welcome">
					<div class="col-md-3">
						<i class="fas fa-industry fa-3x bg-cavsa-mavi text-white p-5 rounded-circle"></i><br>
						<h3 class="font-com pt-4">Soğukhava Depolama</h3>
						<p class="text-dark">Soğukhava Depolamacılığı Sektörünün Öncüsü Olan Çavsa Soğukhava, Ürünlerinizin İlk Günkü Gibi Taze Kalması İçin Modern Tesislerimizde Siz Değerli Müşterilerimizin Mahsullerini Sizlere Tekrar İlk Günkü Tazeliğinde Sunabilmek İçin Hijyen Kurallarına Uygun Olarak Depolamaktadır.</p>
					</div>
					<div class="col-md-3">
						<i class="fas fa-pepper-hot fa-3x bg-cavsa-mavi text-white p-5 rounded-circle"></i><br>
						<h3 class="font-com pt-4">Gıda Paketleme</h3>
						<p class="text-dark">Müşterilerimizin Bizlere Emanet Ettiği Ürünlerini Çap, Renk ve Ağırlıklarına Göre Modern Paketleme, Boylama Ünitemizde Hijyen Kurallarına Uygun Olarak Müşterilerimizin İsteklerine Göre Paketlemekteyiz.</p>
					</div>
					<div class="col-md-3">
						<i class="fas fa-tractor fa-3x bg-cavsa-mavi text-white p-5 rounded-circle"></i><br>
						<h3 class="font-com pt-4">Tarım Hizmetleri</h3>
						<p class="text-dark">Karaman Merkezde Bulunan Toplamda 300 Dekarlık Bahçelerimizde Yetiştirdiğimiz Granny Smith, Golden, Fuji, Gala, Starkrimson Elma Çeşitlerimizin Tüm Aşamalarını Ziraat Mühendislerimiz Tarafından Kontrol Edilmektedir.</p>
					</div>
					<div class="col-md-3">
						<i class="fas fa-wine-bottle fa-3x bg-cavsa-mavi text-white p-5 rounded-circle"></i><br>
						<h3 class="font-com pt-4">Plastik İmalatı</h3>
						<p class="text-dark">Çavsa Plastik, Lojistik ve Sanayi Faaliyetleri İçin İhtiyaç Duyulan Büyük Hacimli Konteyner Kasalardan Gıda Sektöründe Kullanılan Tarım Kasalarına Varıncaya Kadar Sektörün Tüm İhtiyaçlarına Cevap Verebilmektedir. Ayrıca Ambalaj Grubu İle Tek Kullanımlık Gıda Ürünlerini Üretmektedir.</p>
					</div>
				</div>
			</div>
		</div>

	</div>



	<!--TANITIM VİDEOSU
	<div class="section m-0 border-0" style="padding: 120px 0;">
	<div class="video-wrap" style="z-index: 0">
	<video preload="auto" loop autoplay muted>
	<source src='one-page/images/page/portrait/video.mp4' type='video/mp4' />
</video>
<div class="video-overlay" style="background: rgba(0,0,0,0.2)"></div>
</div>
<div class="emphasis-title widget subscribe-widget mx-auto center px-4" data-loader="button" style="max-width: 650px">
<h1 class="font-weight-bold text-white">21 yıllık deneyim ve tecrübe ile en iyi çözümler</h1>
<button class="btn btn-transparent p-3"><a href="#" class="text-white"><i class="fa fa-play fa-3x text-info"></i></a></button>
</div>
</div>
-->

<img src="demos/store/images/others/tanıtım.png" class="img-fluid">

<div class="section bg-transparent p-5">
	<div class="container-fluid">
		<div class="row justify-content-center m-auto" style="max-width: 1000px;">
			<div class="col-md-7">
				<p class="h6 mb-0 text-muted">Çavsa Soğukhava ve Paketleme Tesisleri 21 yıllık tecrübesi ile siz değerli müşterilerimize hem ekonomik hem de kaliteli ürünler sunmaktadır. <a href="mailto:info@cavsa.com.tr"><u>info@cavsa.com.tr</u></a> Mail gönderin.</p>
			</div>
			<div class="col-md-5 mt-3 mt-md-0">
				<h2 class="h1 font-weight-bold ls--1 color"><a href="tel:+90(338) 213 00 77">+90(338) 213 00 77</a></h2>
			</div>
		</div>
	</div>
</div>

</div>
</section><!-- #content end -->
<?php include 'footer.php' ?>
