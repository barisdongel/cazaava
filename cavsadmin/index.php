<?php include 'header.php' ?>
<?php include 'sidebar.php';
$kullaniciara =$db->prepare("SELECT * FROM kullanici_tbl");
$kullaniciara->execute();

$kullanicisayisi =$db->prepare("SELECT COUNT(*) FROM kullanici_tbl");
$kullanicisayisi->execute();
$kullanicisay = $kullanicisayisi->fetchColumn();

$urunsayisi =$db->prepare("SELECT COUNT(*) FROM urunler_tbl");
$urunsayisi->execute();
$urunsay = $urunsayisi->fetchColumn();
?>
<!-- Main Content -->
<div class="main-content">
	<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon-square card-icon-bg-green">
				<i class="fas fa-users"></i>
			</div>
			<div class="card-wrap">
				<div class="padding-20">
					<div class="text-right">
						<h3 class="font-light mb-0">
							<i class="ti-arrow-up text-success"></i><?php echo $kullanicisay ?>
						</h3>
						<span class="text-muted">Kullanıcı</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon-square card-icon-bg-purple">
				<i class="fas fa-box"></i>
			</div>
			<div class="card-wrap">
				<div class="padding-20">
					<div class="text-right">
						<h3 class="font-light mb-0">
							<i class="ti-arrow-up text-success"></i><?php echo $urunsay ?>
						</h3>
						<span class="text-muted">Ürün</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 col-sm-12 col-lg-5">
		<div class="card profile-widget">
			<div class="profile-widget-header">
				<div class="row">
					<div class="col-12">
						<img alt="image" src="<?php echo $kullanicicek['kullanici_foto'] ?>"
							class="rounded-circle profile-widget-picture box-center">
					</div>
				</div>
			</div>
			<div class="profile-widget-description pb-0">
				<div class="profile-widget-name">
					<?php echo $kullanicicek['kullanici_adsoyad'] ?>
					<div class="text-muted d-inline font-weight-normal">
						<div class="slash"></div>
						<?php
						if ($kullanicicek['kullanici_yetki']==0 ) {
							echo "ROOT";
						}elseif ($kullanicicek['kullanici_yetki']==1 ) {
							echo "YÖNETİCİ";
						}elseif ($kullanicicek['kullanici_yetki']==2 ) {
							echo "ÜYE";
						}else{
							echo "KULLANICI";
						}
						?>
					</div>
				</div>
				<p><?php echo $kullanicicek['kullanici_hakkinda'] ?></p>
			</div>
			<div class="card-footer text-center pt-0">
				<div class="font-weight-bold mb-2 text-small">Sosyal Medya
				</div>
				<a href="<?php echo $kullanicicek['kullanici_facebook'] ?>" class="btn btn-social-icon mr-1 btn-facebook">
					<i class="fab fa-facebook-f"></i>
				</a> <a href="<?php echo $kullanicicek['kullanici_twitter'] ?>" class="btn btn-social-icon mr-1 btn-twitter">
					<i class="fab fa-twitter"></i>
				</a> <a href="<?php echo $kullanicicek['kullanici_github'] ?>" class="btn btn-social-icon mr-1 btn-github">
					<i class="fab fa-github"></i>
				</a> <a href="<?php echo $kullanicicek['kullanici_instagram'] ?>" class="btn btn-social-icon mr-1 btn-instagram">
					<i class="fab fa-instagram"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-lg-7 mt-5">
		<div class="card">
			<div class="card-header">
				<h4>Aktif Kullanıcılar</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped">
						<tr>
							<th>Kullanıcı Foto</th>
							<th>Kullanıcı Adı Soyadı</th>
							<th>Kullanıcı Telefon</th>
							<th>Kullanıcı email</th>
						</tr>
						<?php
						while ($kullanicitut=$kullaniciara->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>
							<td><img src="<?php echo $kullanicitut['kullanici_foto'] ?>" style="width:100%; padding:5px;"></td>
							<td style="width:45%;"><?php echo $kullanicitut['kullanici_adsoyad'] ?></td>
							<td style="width:45%;"><?php echo $kullanicitut['kullanici_tel'] ?></td>
							<td><?php echo $kullanicitut['kullanici_ad'] ?></td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
