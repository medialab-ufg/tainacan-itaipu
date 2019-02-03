<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<?php get_template_part( 'template-parts/loop-collections-carousel' ); ?>

<!-- Dados para exibição na seção de planeje sua visita -->
<?php
	$page = get_page_by_title( 'Planeje sua Visita' );
	$telefone_front = get_post_meta($page->ID, 'informacoes-front-telefone', true);
	$endereco_front = get_post_meta($page->ID, 'informacoes-front-endereco', true);
	$cep_front = get_post_meta($page->ID, 'informacoes-front-cep', true);
	$facebook_front = get_post_meta($page->ID, 'informacoes-front-facebook', true);
?>

<!-- Seção Histórico do Museu -->
<?php
$historico = new WP_Query( array( 'pagename' => 'pagina-principal/historico-do-museu' ) );
if($historico->have_posts()) :
	while($historico->have_posts()) : $historico->the_post(); ?>
		<div class="front-page mt-5 margin-two-column max-large">
			<h1><?php the_title(); ?></h1>
			<hr class="mi-hr title"/>
		</div>

		<div class="front-page mt-5 py-4 bg-color">
			<section class="front-page-historico mt-2 margin-two-column max-large">
				<h6>As ruinas e o museu</h6>
				<div class="media mt-3">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="mr-3" alt="...">
					<div class="media-body">
						<?php the_excerpt(); ?>
						<a style="color: #fff; float: right;" href="<?php the_permalink(); ?>">Leia mais...</a>
					</div>
				</div>
			</section>
		</div>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<!-- Seção Exposições -->
<?php
$exposicoes = new WP_Query( array( 'pagename' => 'pagina-principal/exposicoes' ) );
if($exposicoes->have_posts()) :
	while($exposicoes->have_posts()) : $exposicoes->the_post(); ?>
		<div class="front-page mt-5 margin-two-column max-large">
			<h1><?php the_title(); ?></h1>
			<hr class="mi-hr title"/>
			<section class="front-page-exposicoes mt-5 margin-one-column">
				<?php the_content(); ?>
			</section>
		</div>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<!-- Seção de grid de itens ou coleções -->
<div class="front-page mt-5 pb-5 max-large">
	<div class="container-fluid front-page-grid p-0 m-0">
		<div class="row m-0">
			<div class="col-sm p-0 front-page-grid-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaviao.png'; ?>" alt="">
			</div>
			<div class="col-sm p-0 front-page-grid-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaviao.png'; ?>" alt="">
			</div>
			<div class="col-sm p-0 front-page-grid-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/gaviao.png'; ?>" alt="">
			</div>
		</div>
	</div>
</div>

<!-- Seção planeje sua visita -->
<?php
$planeje = new WP_Query( array( 'pagename' => 'pagina-principal/planeje-sua-visita' ) );
if($planeje->have_posts()) :
	while($planeje->have_posts()) : $planeje->the_post(); ?>
		<div class="front-page mt-5 margin-two-column max-large">
			<h1><?php the_title() ?></h1>
			<hr class="mi-hr title"/>
		</div>

		<section class="front-page mt-5 max-large">
			<div class="container-fluid front-page-grid p-0 m-0">
				<div class="row m-0">
					<div class="col-sm-7 front-page-grid--planeje-dados">
						<?php the_content(); ?>
						<ul>
							<li>Estudantes de nível fundamental e médio do ensino público;</li>
							<li>Idosos (60 anos ou mais);</li>
							<li>Estudantes de Museologia;</li>
							<li>Museólogos;</li>
							<li>Funcionários do IBRAM;</li>
							<li>Membros do ICOM;</li>
							<li>Moradores do Canto de Itaipu;</li>
							<li>Portadores do cartão magnético do Vale-cultura – com direito a dois acompanhantes;</li>
							<li>Crianças até 07 anos;</li>
							<li>Visitas às quartas-feiras;</li>
							<li>Guias de turismo com registro da Embratur.</li>
						</ul>
					</div>
					<div class="col-sm p-0 front-page-grid--planeje-contato">
						<div class="p-5">
							<h5>Contato</h5>
							<p>Telefones: </p>
							<span><?php echo $telefone_front; ?></span>
							<p>Endereço: </p>
							<span><?php echo $endereco_front; ?> <br> CEP <?php echo $cep_front; ?></span>
							<p>E-mail: </p>
							<span>mai@museus.gov.br</span>
							<p>Facebook: </p>
							<a style="color: #fff; float: right; font-weight: 300;" target="_BLANK" href="<?php echo $facebook_front; ?>"><?php echo $facebook_front; ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>

<?php get_footer();
