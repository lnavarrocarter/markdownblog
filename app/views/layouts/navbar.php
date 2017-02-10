<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Mostrar Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>"><img class="hidden-lg hidden-md" src="<?php echo base_url();?>assets/img/logo_top.png" class="img-responsive" alt="<?php echo $sitedata->options->site_name;?> - <?php echo $sitedata->options->site_motto;?>"> <span class="hidden-xs hidden-sm"><?php echo $sitedata->options->site_name;?></span></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="<?php echo base_url();?>">Inicio</a>
        </li>
        <!-- INICIO: Menú Página -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown"><?php echo $sitedata->options->page_name;?> <i class="ion-ios7-arrow-down"></i></a>
          <ul class="dropdown-menu">
          <?php foreach ($sitedata->pages as $page):?>
            <li><a href="<?php echo base_url();?>home/page/<?php echo $page->slug;?>"><?php echo $page->title;?></a></li>
          <?php endforeach;?>
          </ul>
        <!-- FIN: Menú Página -->
        </li>
        <li class="dropdown">
          <a href="/download">Blog</a>
        </li>
        <li class="dropdown">
          <a href="/donate">Donar</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Administrar <i class="ion-ios7-arrow-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>admin/settings">Ajustes </a></li>
            <li><a href="<?php echo base_url();?>admin/users">Usuarios </a></li>
            <li><a href="<?php echo base_url();?>admin/pages">Páginas </a></li>
            <li><a href="<?php echo base_url();?>admin/entries">Entradas </a></li>
            <li><a href="<?php echo base_url();?>admin/sliders">Sliders </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php if($pagetitle):?>
<section id="page-tree" class="">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-5">
        <h1 class=""><?php echo $title?></h1>
      </div>
      <div class="col-md-7 col-sm-7">
        <?php echo $breadcrumb;?>
      </div>
    </div>
  </div>
</section>
<?php endif;?>