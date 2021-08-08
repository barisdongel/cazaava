<?php include 'header.php' ?>
<?php include 'sidebar.php';
$kategorisor=$db->prepare("SELECT * FROM kategori_tbl where kategori_id=:kategori_id");
$kategorisor->execute(array("kategori_id" => $_GET['kategori_id']));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Kategori Düzenle</h4>
			</div>
			<form action="../islem.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id']; ?>">
				<div class="form-group">
					<div class="form-group">
						<img style="width: 20%;" src="../<?php echo $kategoricek['kategori_foto'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-image"></i> Kategori Fotoğrafı</label>
						<input style="height: 50px;" type="file" name="kategori_foto" class="form-control">
					</div>
					<label><i class="fa fa-heading"></i> Kategori Ad</label>
					<input type="text" name="kategori_ad" class="form-control" value="<?php echo $kategoricek['kategori_ad'] ?>">
				</div>
				<div class="form-group">
					<label><i class="fa fa-heading"></i> Kategori Sıra</label>
					<input type="text" name="kategori_sira" class="form-control" value="<?php echo $kategoricek['kategori_sira'] ?>">
				</div>
				<div class="form-group">
					<label><i class="fa fa-thumbtack"></i> Kategori Üst</label>
					<select class="form-control" name="kategori_ust">
						<option value="0">Üst Kategori</option>
						<?php
						$kategorisor=$db->prepare("SELECT * FROM kategori_tbl WHERE kategori_id=2 || kategori_id=3");
						$kategorisor->execute();
						while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
							<option value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="kategoriduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
