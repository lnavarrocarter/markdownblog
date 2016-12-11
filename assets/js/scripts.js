// Script del Logos RefTagger

	var refTagger = {
		settings: {
			bibleVersion: "NBLH",			
			roundCorners: true,			
			customStyle : {
				heading: {
					backgroundColor : "#389DC1",
					color : "#ffffff"
				},
				body   : {
					moreLink : {
						color: "#389DC1"
					}
				}
			}
		}
	};
	(function(d, t) {
		var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
		g.src = "//api.reftagger.com/v2/RefTagger.es.js";
		s.parentNode.insertBefore(g, s);
	}(document, "script"));


//Script para abrir enlaces externos en _blank

    $('a').not('[href*="mailto:"]').each(function () {
        var href = this.href;
        if ( href.indexOf(window.location.host) == -1 ) {
            $(this).attr('target', '_blank');
        }
    });

// Script para mostrar el archivo del Blog y para cerrarlo  

		$("#sidelink").click(function () {
			$("#sidebar").fadeIn("slow");
		});
		$("#close").click(function() {
			$("#sidebar").fadeOut("slow");
		});