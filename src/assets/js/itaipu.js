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
});