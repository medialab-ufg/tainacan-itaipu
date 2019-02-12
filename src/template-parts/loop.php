<?php if ( have_posts() ) : ?>
	<div class="tainacan-title">
		<div class="front-page tainacan-title-page eventos-noticias">
			<h1>
				<?php if ( is_home() ) {
					if ( get_option( 'page_for_posts' ) ) :
						echo get_the_title( get_option( 'page_for_posts' ) );
					else :
						_e( 'Blog Posts', 'tainacan-interface' );
					endif;
				} elseif ( is_search() ) {
					_e( 'Search Results for', 'tainacan-interface' );
					echo ' "' , get_search_query(), '"';
				} elseif ( is_archive() ) {
					echo ' ' . get_the_archive_title();
				} ?>
			</h1>
			<hr class="mi-hr title">
		</div>
	</div>

	<div class="mt-5 tainacan-list-post margin-one-column">
		<div class="row blog-post mb-3">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/list-post' ); ?>
			<?php endwhile; ?>
		</div>
	</div>

	<?php echo tainacan_pagination(); ?>
	
<?php else : ?>
	<?php _e( 'Nothing found', 'tainacan-interface' ); ?>
<?php endif; ?>
