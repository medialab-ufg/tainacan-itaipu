jQuery(document).ready(function($){

	var $carousel = $('.carousel-destaque');

	$('ul.carousel-destaque--loop').slick({
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
		prevArrow: '<button type="button" data-role="none" class="front-page-list--collection-prev" aria-label="Previous" role="button" style="display: block;"><i class="mdi mdi-menu-left"></i></button>',
		nextArrow: '<button type="button" data-role="none" class="front-page-list--collection-next" aria-label="Next" role="button" style="display: block;"><i class="mdi mdi-menu-right"></i></button>',
		responsive: [
			{
			breakpoint: 1024,
			settings: {
					slidesToShow: 5,
					slidesToScroll: 1,
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
					slidesToShow: 1,
					slidesToScroll: 1,
					variableWidth: false
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});

	base.acessibilidade.iniciar();
	base.acessibilidade.manipularFontes();
	base.acessibilidade.ativarAltoContraste();
	base.jsNaoObstrusivo.ativar();
	base.searchBox.manipular();

	$('.menu-belowheader .margin-one-column').toggleClass('margin-one-column margin-two-column');
	$('nav[aria-label=breadcrumb]').toggleClass('margin-one-column margin-two-column');
	$('nav[aria-label=breadcrumb]').addClass('max-large');
	$('main[role=main]').toggleClass('margin-one-column margin-two-column');

	$('#mai-search').submit(function(e) {
		e.preventDefault();
		var val = $('#search-box__search').val();
		if (val) {
			window.location.href = mhn.search_target_url + '?s=' + val;
		}
		return;
	});
});

var base = {
	acessibilidade: {
		iniciar: function() {
			accessibilityCounter = 0;
		},

		manipularFontes: function() {
			jQuery('.button-text-minus').on('click',function() {
				if (accessibilityCounter > -3) {
					var _html = jQuery('html'),
						fonte = _html.css('font-size'),
						tamanho = fonte.split('px');

					_html.css('font-size', (parseInt(tamanho[0]) - 2));
					accessibilityCounter--;
				}
			});

			jQuery('.button-text-default').on('click',function() {
				jQuery('html').css('font-size','1rem');
				accessibilityCounter = 0;
			});

			jQuery('.button-text-plus').on('click',function() {
				if (accessibilityCounter < 3) {
					var _html = jQuery('html'),
						fonte = _html.css('font-size'),
						tamanho = fonte.split('px');

					_html.css('font-size', (parseInt(tamanho[0]) + 3));
					accessibilityCounter++;
				}
			});
		},

		ativarAltoContraste: function() {
			jQuery('.button-high-contrast').on('click',function() {
				jQuery('body').toggleClass('contraste');
			});
		}
	},

	jsNaoObstrusivo: {
		ativar: function() {
			jQuery('body').addClass('js');
		}
	},

	searchBox: {
		manipular: function() {
			var _form = jQuery('.search-box');

			_form
				.find('button[type=submit]')
				.on('click',function() {
					// Se o form está fechado, o clique abre o formulário
					if (!_form.hasClass('active')) {
						_form.addClass('active');
						_form.find('input[type=text]').attr('placeholder', 'Explore o acervo MHN');
						return false;
					} else {
						// Se o campo estiver vazio, o clique no botão fecha o form novamente
						var campo = _form.find('input[type=text]').val();
						if (campo == '') {
							_form.removeClass('active');
							_form.find('input[type=text]').removeAttr('placeholder');

							return false;
						}
					}
			});

			jQuery('#search-box__search').on('focus',function() {
				_form.addClass('active');
			});
		}
	},

};