<?php
$args = array(
    'post_type' => 'tainacan-collection',
    'posts_per_page' => -1
);
$query = new WP_Query($args);

if ( $query->have_posts() ) : ?>
	<div class="tainacan-list-post front-page-list px-md-0 mt-5 margin-one-column">
        <div class="tainacan-list-collection--container-card max-large front-page-list--collection">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<a class="tainacan-list-collection--card-link" href="<?php the_permalink(); ?>">
					<div class="tainacan-list-collection--card">
						<p class="tainacan-list-collection--card-title text-black text-left p-3 mb-0 text-truncate">
							<?php the_title(); ?>           
						</p>
						<?php if ( has_post_thumbnail() ) : 
							$thumbnail_id = get_post_thumbnail_id( $post->ID );
							$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
							<img src="<?php the_post_thumbnail_url( 'tainacan-medium' ) ?>" class="img-fluid tainacan-list-collection--grid-img" alt="<?php echo esc_attr($alt); ?>">  
						<?php else : ?>
							<div class="image-placeholder">
								<h4 class="text-center">
									<?php echo esc_html( tainacan_get_initials( get_the_title() ) ); ?>
								</h4>
							</div>
						<?php endif; ?>
					</div>
				</a>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
