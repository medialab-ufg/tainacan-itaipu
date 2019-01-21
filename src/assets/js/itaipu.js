jQuery(document).ready(function($){

	var $carousel = $('.carousel-destaque');

	$('.carousel-destaque--loop').slick({
		speed: 1000,
		fade: true,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 2000,
		slidesToShow: 1,
		prevArrow: $carousel.find('.control__prev'),
		nextArrow: $carousel.find('.control__next'),
		dots: true,
		adaptiveHeight: true
	});

	$('.front-page-list--collection').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		variableWidth: true,
		responsive: [
			{
			breakpoint: 1024,
			settings: {
					slidesToShow: 5,
					slidesToScroll: 1,
					infinite: true,
					dots: false
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});
});