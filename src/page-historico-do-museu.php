<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>

<div id="content"></div>
<!-- Seção Histórico do Museu -->
<?php
$historico = new WP_Query( array( 'pagename' => 'pagina-principal/historico-do-museu' ) );
if($historico->have_posts()) :
	while($historico->have_posts()) : $historico->the_post(); ?>
		<div class="front-page historico-museu-title mt-5 margin-two-column max-large">
			<h1><?php the_title(); ?></h1>
			<hr class="mi-hr title"/>
		</div>

		<div class="front-page historico-museu-content mt-5 py-4">
			<section class="front-page-historico mt-2 margin-two-column max-large">
				<div class="media mt-3 margin-one-column">
					<div class="media-body">
						<?php the_content(); ?>
					</div>
				</div>
			</section>
		</div>
	<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>

<?php get_footer();