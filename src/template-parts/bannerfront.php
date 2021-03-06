<?php
$posts_to_front = new WP_Query( array( 'post_type' => 'destaque-post' ) );
if( $posts_to_front->have_posts() ) : ?>
	<div class="margin-one-column no-mobile">
		<div class="container-fluid p-0 carousel-destaque max-large">
			<div class="carousel-destaque--control">
				<button type="button" class="control__prev"><i class="tainacan-icon tainacan-icon-showmore"></i></button>
				<button type="button" class="control__next"><i class="tainacan-icon tainacan-icon-showmore"></i></button>
			</div>
			<ul class="carousel-destaque--loop">
				<?php 
					while ( $posts_to_front->have_posts() ) : $posts_to_front->the_post();
				?>
					<?php if( has_post_thumbnail() ) : ?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</a>
							<div class="carousel-destaque--loop-content">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="carousel-destaque--loop-content-title">
									<?php the_title(); ?>
								</a>
								<div class="carousel-destaque--loop-content-description">
									<?php echo wp_trim_words( get_the_content(), 25, '.' ); ?>
								</div>
							</div>
						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>	
		</div>
	</div>
<?php endif; wp_reset_postdata(); ?>