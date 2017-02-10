<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $sitedata->options->site_name;?> - <?php echo $title;?></title>
  <meta name="author" content="Matías Navarro">

  <meta name="description" content="Este es el sitio personal de Matías Navarro Carter, desarrollador web freelance. Aquí Matías escribe y comparte cursos, código y opiniones sobre nuevas tecnologías. Además de eso, muestra su trabajo.">
  <meta name="keywords" content="navarrocarter.com, desarrollo, web, programacion, blog, snippets">
  <meta property="og:image" content="http://sentora.org/img/sentora_logo.png" />
  <meta property="og:title" content="NavarroCarter.com" />
  <meta property="og:description" content="La página personal de Matías Navarro Carter, desarrollador web." />
  <meta property="og:url" content="https://navarrocarter.com" />
  <meta property="og:site_name" content="NC.com - <?php echo $title;?>" />
  <meta property="og:locale" content="es_CL" />
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/1.4.1/css/ionicons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/flexslider.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/bootstrap-markdown.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/atom-dark.css">
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,700,500' rel='stylesheet' type='text/css'>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

<?php if($navbar):?>
<!-- INICIO: Navbar -->
<?php $this->load->view('layouts/navbar');?>
<!-- FIN: Navbar -->
<?php endif;?>

<?php if($footer):?>
<?php $this->load->view($main_content);?>
<!-- INICIO: Footer -->
<?php $this->load->view('layouts/footer');?>
<!-- FIN: Footer -->
<?php endif;?>

<script src="//code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
<script src="<?php echo base_url();?>assets/js/unsaved_changes.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/app.js" type="text/javascript"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
