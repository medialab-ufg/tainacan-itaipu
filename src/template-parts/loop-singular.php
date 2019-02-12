<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="front-page to-pages margin-two-column max-large">
			<h1><?php the_title() ?></h1>
			<hr class="mi-hr title"/>
		</div>
		<div class="tainacan-single-post margin-one-column">
			<?php get_template_part( 'template-parts/single-post' ); ?>
		</div>
		<?php if ( ! is_singular( 'page' ) ) : ?>
			<div class="row justify-content-between">
				<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'tainacan-interface' ) ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'tainacan-interface' ) ); ?></span>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php _e( 'Nothing found', 'tainacan-interface' ); ?>
<?php endif; ?>
