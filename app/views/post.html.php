<?php setlocale(LC_ALL,"es_ES@euro","es_ES","esp")?>
<div class="post">

	<h2><?php echo $p->title ?></h2>

	<div class="date"><?php echo strftime('%B %d, %Y', $p->date)?></div>

	<?php echo $p->body?>
	
	<br />
	<div id="disqus_thread"></div>
	<script>
	
	/**
	 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
	
	var disqus_config = function () {
	    this.page.url = '<?php echo $p->url?>';  // Replace PAGE_URL with your page's canonical URL variable
	  	this.page.identifier = '<?php echo $p->title ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
	};
	
	(function() { // DON'T EDIT BELOW THIS LINE
	    var d = document, s = d.createElement('script');
	    s.src = '//blog-navarrocarter-com.disqus.com/embed.js';
	    s.setAttribute('data-timestamp', +new Date());
	    (d.head || d.body).appendChild(s);
	})();
	</script>
	<noscript>Por favor activa JavaScript para ver los <a href="https://disqus.com/?ref_noscript">comentarios proporcionados por Disqus.</a></noscript>

</div>

