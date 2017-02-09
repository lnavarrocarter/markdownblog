<?php if ($sitedata->options->home_slider):?>
<section id="main-slider-bg">
  <div class="slider-overlay">
    <div class="slider-main">
      <div class="container text-center">
        <ul class="slides">
        <?php foreach ($sitedata->sliders as $slider):?>
          <li>
            <h1 class="slider-heading"><?php echo $slider->title;?></h1>
            <p class="slider-desc"><?php echo $slider->lead;?></p>
            <a href="<?php echo $slider->btn_link;?>" class="btn btn-lg btn-white"><?php echo $slider->btn_text;?></a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif;?>
<!-- INICIO: Sección Principal -->
<section id="services-sec" class="padding-60">
  <div class="container">
    <div class="row">
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="ion-heart"></i>
          <h3>Simplified management</h3>
          <p>
            Sentora is designed to simplify web hosting management, it gives your clients the ability to quickly and
            easily manage their web hosting.
          </p>
        </div>
      </div>
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="ion-help-buoy"></i>
          <h3>Supported</h3>
          <p>
            We provide both community-based (free) and <a href="support">subscription-based premium support</a> services
            to cater for both personal and commercial users!
          </p>
        </div>
      </div>
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="ion-android-share"></i>
          <h3>Extendable</h3>
          <p>
            Our Add-ons store provides our users with a central repository to install, rate, sell and publish modules,
            themes and localisations.
          </p>
        </div>
      </div>
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="ion-android-developer"></i>
          <h3>Open-souce</h3>
          <p>
            Released under the <a href="http://www.gnu.org/licenses/gpl-3.0.html" target="_blank">GPLv3</a>,
            Sentora is the perfect choice for the most small to medium ISPs looking for a cost effective, extendable platform.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FIN: Sección Principal -->
