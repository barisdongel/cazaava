<?php
$kullanicisor =$db->prepare("SELECT * FROM kullanici_tbl WHERE kullanici_ad=:ad");
$kullanicisor->execute(array(
  'ad' => $_SESSION['kullanici_ad']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <ul class="sidebar-menu">
      <li class="dropdown active" style="display: block;">
        <div class="sidebar-profile">
          <div class="siderbar-profile-pic">
            <img src="<?=$kullanicicek['kullanici_foto'] ?>" class="profile-img-circle box-center" alt="User Image">
          </div>
          <div class="siderbar-profile-details">
            <div class="siderbar-profile-name">HOŞGELDİN</div>
            <div class="siderbar-profile-name text-warning"><?php echo $_SESSION['kullanici_ad'] ?> </div>
            <div class="sidebar-profile-position">
              <?php if ($kullanicicek['kullanici_yetki']==0) {
                echo "Yetki : Root";
              }elseif ($kullanicicek['kullanici_yetki']==1) {
                echo "Yetki: Yönetici";
              }else{echo "Yetki: Üye";}
              ?></div>
            </div>
          </div>
        </li>
        <li class="menu-header">Admin Menü</li>
        <li><a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Admin Paneli Anasayfa</span></a></li>
        <?php if($kullanicicek['kullanici_yetki']<=1) { ?>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i><span>Ürünler</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="urunler.php">Ürünler</a></li>
              <li><a class="nav-link" href="kategoriler.php">Ürün Kategorileri</a></li>
            </ul>
          </li>
          <?php if ($kullanicicek['kullanici_yetki']==0) { ?>
            <li><a class="nav-link" href="kullanicilar.php"><i class="fas fa-user"></i><span>Kullanıcı Ayarları</span></a></li>
          <?php } ?>
          <li><a class="nav-link" href="ayarlar.php"><i class="fas fa-cog"></i><span>Genel Ayarlar</span></a></li>
        <?php } ?>
        <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Çıkış Yap</span></a></li>
      </ul>
    </aside>
  </div>
