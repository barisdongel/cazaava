<?php
include 'header.php';
include 'sidebar.php';

//İndex istatistikler için sorgular
$kullaniciara =$db->prepare("SELECT * FROM kullanici_tbl");
$kullaniciara->execute();

$kategoriler=$db->prepare("SELECT * FROM kategori_tbl");
$kategoriler->execute();
?>

<!-- Main Content -->
<div class="main-content">

<div class="row">
</div>
	<img src="assets/alibon.jpg" alt="" width="100%">
</div>
</div>
<?php include 'footer.php' ?>
