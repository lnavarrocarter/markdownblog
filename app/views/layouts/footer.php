<section id="footer-defoult" class="padding-60">
  <div class="container">
    <div class="row">
      <div class="col-md-4 margin-btm20">
        <div class="footer-column">
          <h3>Matías Navarro Carter</h3>
          <p class="margin-btm20">
            Matías es un desarrollador web freelance chileno que, junto a su hermano, fundó su propia compañía de desarrollo llamada <a href="https://ncai.cl" target="_blank">Ncai SpA</a>. En su tiempo libre, Matías gusta de desarrollar diversas aplicaciones y descubrir nuevas tecnologías. Vive en Santiago de Chile junto a su esposa Briony, originaria de Irlanda del Norte, con la cual está casado desde Julio de 2017.
          </p>
          <ul class="list-unstyled list-inline social">
          <?php foreach($socials as $social):?>
            <li><a href="<?php echo $social['url'];?>" target="_blank"><i style="height:10px 10px" class="fa fa-<?php echo $social['brand'];?> fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $social['tooltip'];?>"></i></a></li>
          <?php endforeach;?>
          
          </ul>
        </div><!--footer columns end-->
      </div>
      <div class="col-md-4 margin-btm20">
        <div class="footer-column">
          <h3>Últimas Entradas</h3>
          <ul class="list-unstyled contact-list margin-btm20">
            <?php foreach($entries as $entry):?>          
            <li><strong><a href="<?php echo base_url();?>home/entry/<?php echo $entry['slug'];?>"><i class="fa fa-bookmark-o fa-fw"></i> <?php echo $entry['title'];?></a></strong> <small><?php echo $this->tools->calculate_time_from($entry['date']);?></small></li>
            <?php endforeach;?>
          </ul>
        </div><!--footer columns end-->
      </div>
      <div class="col-md-4 margin-btm20">
        <div class="footer-column">
          <h3>The Markdown Blog</h3>
          <p class="small">Este sitio funciona con The Markdown Blog, un gestor de contenido PHP rápido, liviano, no-sql y basado en Markdown.</a>!</p>
          <h3>Última Versión</h3>
          <h1>
            <i class="fa fa-download fa-fw"></i>
            <a href="<?php echo $latest->zipball_url;?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="¡Descargar la última versión!"><?php echo $latest->tag_name;?></a> <small>(<?php echo $latest->name;?>)</small>
          </h1>
          <small><a href="<?php echo $latest->html_url;?>" target="_blank">Release Notes</a></small>
        </div>
      </div>
    </div><!--row end -->

    <div class="divied-40"></div>
    <div class="row">
      <div class="col-md-12 text-center margin-btm20">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/watermark.png" alt="Sentora - The open-source web hosting control panel"></a>
      </div>
      <div class="col-md-12 text-center">
        <span><?php echo $options->footer_copy_text;?></span>
      </div>
    </div>
  </div><!--container-->
</section><!--footer default end-->