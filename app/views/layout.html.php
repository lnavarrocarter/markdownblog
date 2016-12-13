<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) : config('blog.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no" />
	<meta name="description" content="<?php echo config('blog.description')?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title')?>  Feed" href="<?php echo site_url()?>rss" />

	<link href="<?php echo site_url() ?>assets/css/<?php echo config('design.theme') ?>.css" rel="stylesheet" />
	<script src="<?php echo site_url() ?>assets/js/jquery.js"></script>


	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body>
	<?php setlocale(LC_ALL,"es_ES@euro","es_ES","esp")?>

	<aside id="sidebar" style="display:none">
	<p><a href="#" id="close">X</a></p>
	<?php foreach($all_posts as $p):?>
	<p><a href="<?php echo $p->url?>"><?php echo $p->title ?><br/><span class="link"><?php echo strftime('%B %d, %Y', $p->date)?></span></a></p>
	<?php endforeach;?>
	</aside>

	<header>

		<h1><a href="<?php echo site_url() ?>"><?php echo config('blog.title') ?></a></h1>

		<p class="description"><?php echo config('blog.description')?></p>

		<ul>
			<li><a href="<?php echo site_url() ?>">Inicio</a></li>
			<li><a href="#" id="sidelink">Archivo del Blog</a></li>
			<li><a href="http://navarrocarter.com">Página Personal</a></li>
			<li><a href="#">Código del Blog</a></li>
		</ul>

		<p class="author"><?php echo config('blog.authorbio') ?></p>

	</header>

	<section id="content">

		<?php echo content()?>

	</section>

	<script src="<?php echo site_url() ?>assets/js/scripts.js"></script>

</body>
</html>
