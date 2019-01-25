<?php if( have_posts() ) : ?>
	<div class="margin-two-column">
		<div class="container-fluid p-0 carousel-destaque max-large">
			<div class="carousel-destaque--control">
				<button type="button" class="control__prev"><i class="mdi mdi-chevron-up"></i></button>
				<button type="button" class="control__next"><i class="mdi mdi-chevron-down"></i></button>
			</div>
			<ul class="carousel-destaque--loop">
				<?php 
					while ( have_posts() ) : the_post();
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
								<span class="carousel-destaque--loop-content-description">
									<?php the_excerpt(); ?>
								</span>
							</div>
						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>	
		</div>
	</div>
<?php endif; ?>