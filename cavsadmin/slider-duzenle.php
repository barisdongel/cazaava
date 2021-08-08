<?php include 'header.php' ?>
<?php include 'sidebar.php';
$slidersor=$db->prepare("SELECT * FROM slider_tbl where slider_id=:slider_id");
$slidersor->execute(array("slider_id" => $_GET['slider_id']));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Slider Ekle</h4>
     </div>
     <form action="../islem.php" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">

      <div class="card-body">
        <div class="form-group">
          <img style="width: 20%;" src="../<?php echo $slidercek['slider_resim'] ?>">
        </div>
        <div class="form-group">
          <label><i class="fa fa-image"></i> Slider Resim</label>
          <input style="height: 50px;" type="file" name="slider_resim" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-heading"></i> Slider Ad</label>
          <input type="text" name="slider_ad" value="<?php echo $slidercek['slider_ad'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label><i class="fa fa-list"></i> Slider Sıra</label>
          <input type="number" name="slider_sira" value="<?php echo $slidercek['slider_sira'] ?>" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <a class="btn btn-warning" href="slider.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
      <button class="btn btn-info" type="submit" name="sliderduzenle">Ekle</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
