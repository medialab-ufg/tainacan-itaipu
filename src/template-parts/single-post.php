<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
	<section class="tainacan-content text-black margin-two-column">
		<?php
			the_content();
		?>
		<div class="row margin-one-column">
			<?php // Previous/next post navigation.
				wp_link_pages(
					array(
						'before' => '<div class="page-link"><span>' . __( 'Pages:', 'tainacan-interface' ) . '</span>',
						'after'  => '</div>',
					)
				); ?>
		</div>
	</section>
	<?php if ( ! is_singular( 'page' ) ) { ?>
	<footer class="mt-5 border-top pt-3">
		<p>
			<?php _e( 'Category: ', 'tainacan-interface' );
			the_category( ' <span>|</span> ' ) ?> -
			<?php if ( has_tag() ) {
				the_tags( 'Tags: ', ' <span>|</span> ' ); ?> -
			<?php }
			_e( 'Comments: ', 'tainacan-interface' ); ?>
			<?php comments_popup_link( __( 'None', 'tainacan-interface' ), '1', '%' ); ?>
		</p>
	</footer>
	<?php } ?>
</article>
<div class="row">
	<!-- Container -->
	<div class="col mt-3 mx-auto">
		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif; ?>
	</div>
</div>
