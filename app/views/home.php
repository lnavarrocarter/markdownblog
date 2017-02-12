<?php if ($options->home_slider):?>
<section id="main-slider-bg">
  <div class="slider-overlay">
    <div class="slider-main">
      <div class="container text-center">
        <ul class="slides">
        <?php foreach ($slidersdata as $slider):?>
          <li>
            <h1 class="slider-heading"><?php echo $slider['title'];?></h1>
            <p class="slider-desc"><?php echo $slider['lead'];?></p>
            <a href="<?php echo $slider['btn_link'];?>" class="btn btn-lg btn-white"><?php echo $slider['btn_text'];?></a>
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
          <i class="fa fa-fighter-jet fa-fw"></i>
          <h3>Veloz</h3>
          <p>
            Debido a que no utiliza un servicio de base de datos externo, la velocidad de The Markdown Blog es increíble. ¿No te convence? ¡Prueba esta misma página!
          </p>
        </div>
      </div>
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="fa fa-check-square-o fa-fw"></i>
          <h3>Sencillo</h3>
          <p>
            ¡Olvidate de los complicados paneles de administración! En The Markdown Blog todo es muy claro, comprensible y sencillo de utilizar. ¡Compruébalo!
          </p>
        </div>
      </div>
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="fa fa-user-circle-o fa-fw"></i>
          <h3>Personalizable</h3>
          <p>
            Cambia los colores, crea bloques de contenido y aplica CSS y JS personalizado. Hasta puedes crear un tema completo. ¡Las posibilidades son infinitas!
          </p>
        </div>
      </div>
      <div class="col-md-3 margin-btm20">
        <div class="services-box">
          <i class="fa fa-code-fork fa-fw"></i>
          <h3>Abierto</h3>
          <p>
            The Markdown Blog es un software de código abierto, lo que significa que cualquiera puede ver el código, y contribuir a su mejora. ¡En serio!
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FIN: Sección Principal -->
