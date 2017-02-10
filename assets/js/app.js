$(document).ready(function() {

    $('.js-activated').dropdownHover({
        instantlyCloseOthers: false,
        delay: 0
    }).dropdown();

});

$('.slider-main,.testimonials').flexslider({
    slideshowSpeed: 3000,
    directionNav: false,
    animation: "fade"
});


$("[data-toggle=popover]").popover();
$("[data-toggle=tooltip]").tooltip();

$(window).load(function() {
    $('.flexslider').flexslider({
        directionNav: false,
        slideshowSpeed: 3000,
        animation: "fade"
    });
});