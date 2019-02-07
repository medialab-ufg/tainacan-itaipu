<div class="col-6 d-flex mb-5">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="col-xs-12 col-md-4 blog-thumbnail align-self-center text-center mb-4 mb-md-0">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tainacan-interface-list-post', array('class' => 'img-fluid')); ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="col-xs-12 blog-content <?php if ( has_post_thumbnail() ) :?>col-md-8 blog-flex<?php else : ?>col-md-12<?php endif; ?> align-self-center">
        <?php tainacan_meta_date_author(); ?> 
        <h3 class="mt-2 mb-3">
            <a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
        </h3>
        <?php echo '<p class="text-black">' . wp_trim_words( get_the_excerpt(), 28, '...' ) . '</p>'; ?>
        
        <a href="<?php the_permalink(); ?>" class="readmore float-right screen-reader-text"><?php _e( 'Read more...', 'tainacan-interface' ); ?></a>
    </div>
</div>
