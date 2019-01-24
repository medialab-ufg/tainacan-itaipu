<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<?php get_template_part( 'template-parts/loop-collections-carousel' ); ?>

<div class="front-page mt-5 margin-two-column">
	<h1>Histórico do Museu</h1>
	<hr class="mi-hr title"/>
</div>

<div class="front-page mt-5 py-4 bg-color">
	<section class="front-page-historico mt-2 margin-two-column">
		<h6>As ruinas e o museu</h6>
		<div class="media mt-3">
			<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/fachada.jpg'; ?>" class="mr-3" alt="...">
			<div class="media-body">
				O antigo Recolhimento de Santa Teresa, fundado em 1764, é uma construção em alvenaria de pedra, com conchas dos sambaquis, molduras de cantaria, unidas por óleo de baleia. O corpo principal do prédio ainda permanece com todas as suas características. Sua planta é um retângulo, medindo 46,40 metros de comprimento por 26,60 metros de largura. Há predominância das linhas horizontais, devido a pouca altura do pé direito e a grande largura dos vãos, características que criam um aspecto de calma e solidez.
				Não existe simetria no conjunto, mas há elementos dispostos simetricamente em relação à entrada principal, que parece ser o centro de uma composição que não chegou a seu fim. A área conta com sete pátios abertos, dos quais existe a certeza de pelo menos um ter sido coberto por telhado. O prédio foi tombado em 1955 pelo Departamento do Patrimônio Histórico e Artístico Nacional (DPHAN) e em 1968 iniciaram-se as obras de consolidação e conservação-restauração da capela e das paredes de rocha das muralhas. As aberturas existentes em suas paredes foram vedadas e a desocupação de seu interior foi efetuada.
			</div>
		</div>
	</section>
</div>

<?php get_footer();
