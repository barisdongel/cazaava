<?php
$slidersor =$db->prepare("SELECT * FROM slider_tbl");
$slidersor->execute(array(0))?>
<!-- Slider
============================================= -->
<section id="slider" class="slider-element swiper_wrapper min-vh-100" data-loop="true" data-speed="1000" data-autoplay="5000">
  <div class="slider-inner">

    <div class="swiper-container swiper-parent">
      <div class="swiper-wrapper">
        <?php while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {
          $slider_id=$slidercek['slider_id'];
          ?>
          <div class="swiper-slide dark">
            <div class="swiper-slide-bg" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.1), rgba(0,0,0,.6)), url('<?php echo $slidercek['slider_resim'] ?>');"></div>
          </div>
        <?php } ?>
      </div>
      <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
      <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
      <div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
    </div>

    <div class="social-icons">
      <a href="#" class="social-icon si-small si-borderless si-rounded si-facebook">
        <i class="icon-facebook text-white-50"></i>
        <i class="icon-facebook"></i>
      </a>
      <a href="#" class="social-icon si-small si-borderless si-rounded si-instagram">
        <i class="icon-instagram text-white-50"></i>
        <i class="icon-instagram"></i>
      </a>
      <a href="mailto:info@cavsa.com.tr" class="social-icon si-small si-borderless si-rounded si-youtube">
        <i class="icon-envelope text-white-50"></i>
        <i class="icon-envelope"></i>
      </a>
    </div>

  </div>
</section><!-- #Slider End -->
