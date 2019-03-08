<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerfront' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<div id="content"></div>
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
		<div class="front-page historico-museu-title mt-5 margin-two-column max-large">
			<h1><?php the_title(); ?></h1>
			<hr class="mi-hr title"/>
		</div>

		<div class="front-page historico-museu-content mt-5 py-4 bg-color">
			<section class="front-page-historico margin-two-column max-large">
				<h5>As ruinas e o museu</h5>
				<div class="media mt-3">
					<div class="media-body">
						<?php the_content('Leia mais...'); ?>
					</div>
				</div>
			</section>
		</div>
	<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>

<!-- Seção Exposições -->
<?php
$exposicoes = new WP_Query( array( 'pagename' => 'pagina-principal/exposicoes' ) );
if($exposicoes->have_posts()) :
	while($exposicoes->have_posts()) : $exposicoes->the_post(); ?>
		<div class="front-page exposicoes-text mt-5 margin-two-column max-large">
			<h1><?php the_title(); ?></h1>
			<hr class="mi-hr title"/>
			<section class="front-page-exposicoes mt-5 margin-one-column">
				<?php the_content('Leia mais...'); ?>
			</section>
		</div>
	<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>

<!-- Seção de grid de itens ou coleções -->
<div class="front-page max-large">
	<div class="container-fluid d-flex flex-wrap justify-content-center front-page-grid p-0 m-0">
		<?php foreach(get_images_to_front_grid() as $id => $image) :?>
			<div class="m-1 front-page-grid-image">
				<a href="<?php echo $image['urlFixa']; ?>">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/'.$image["name"].'.png'; ?>" alt="">
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<!-- Seção planeje sua visita -->
<?php
$planeje = new WP_Query( array( 'pagename' => 'pagina-principal/planeje-sua-visita' ) );
if($planeje->have_posts()) :
	while($planeje->have_posts()) : $planeje->the_post(); ?>
		<div class="front-page planeje-visita margin-two-column max-large">
			<h1><?php the_title() ?></h1>
			<hr class="mi-hr title"/>
		</div>

		<section class="front-page dados-visita max-large">
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
							<a style="color: #fff; font-size: 1rem; font-weight: 300;" target="_BLANK" href="<?php echo $facebook_front; ?>"><?php echo $facebook_front; ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>

<?php get_footer();
