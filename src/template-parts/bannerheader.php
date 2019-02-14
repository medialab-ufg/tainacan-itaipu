<?php global $wp; ?>
<?php
//Verify if is page Contato
$contato_class = (is_page('Contato') || is_page( 'Como Chegar' )) ? 'change-position-contato' : '';

$acervo_class = ( is_archive('colecoes') || is_archive('collections') ) ? 'change-position-acervo' : 's';

if(is_page()) {
    $page_thumb = get_the_post_thumbnail_url(get_the_ID());
} elseif(is_home()) {
    $page_id = get_page_by_path($wp->query_vars["pagename"]);
    $page_thumb = get_the_post_thumbnail_url($page_id->ID);
}
?>
<?php if( ( is_page() ) && $page_thumb != '' ) :
   $banner = 'class="page-header header-filter clear-filter page-height '. $contato_class .'" style="background-image: url(' .$page_thumb. ')" ';
elseif( is_home() ) :
    $banner = 'class="page-header header-filter clear-filter page-height" style="background-image: url(' .$page_thumb. ')" ';
elseif ( get_header_image() ) :
    $banner = 'class="page-header header-filter clear-filter page-height '. $acervo_class .'" style="background-image: url(' . get_header_image() . ')"';
else :
    $banner = 'class="page-header header-filter clear-filter align-items-center" style="background-image: url("' .get_template_directory_uri(). '/assets/images/capa.png" )"';
endif; ?>

<div <?php echo $banner; ?>>
	<div class="container-fluid max-large p-0 ph-title-description">
		<div class="bg-white-title title-header <?php if ( is_singular() || is_archive() || is_search() || is_home() ) { echo 'singular-title'; }?>">
			<h1 class="mb-0">
				<?php
				if ( is_home() ) {
					bloginfo( 'title' );
				} elseif ( is_singular() ) {
					bloginfo( 'title' );
				} elseif ( is_search() ) {
					_e( 'Search Results', 'tainacan-interface' );
				} elseif ( is_tag() || is_category() || is_tax() ) {
					single_term_title();
				} elseif ( is_archive() ) {
					if ( have_posts() ) {
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'tainacan-interface' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'tainacan-interface' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tainacan-interface' ) ) );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'tainacan-interface' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tainacan-interface' ) ) );
						elseif ( is_author() ) :
							echo get_the_author();
						elseif ( 'tainacan-collection' == get_post_type() ) :
							echo get_the_archive_title();
						else :
							echo tainacan_the_collection_name();
						endif;
					}
				} ?>
			</h1>
			<?php do_action( 'tainacan-interface-banner-header-description' ); ?>
		</div>
	</div>

	<form action="<?php echo home_url( '/' ); ?>" method="get" class="search-box" id="mai-search">
        <fieldset>
            <legend>Formulário de busca</legend>

            <input type="text" id="search-box__search" name="search">
            <button type="submit"><i class="mdi mdi-magnify"></i></button>
        </fieldset>
    </form>

    <div class="collection-header--share collection-header--type-b">
        <div class="btn trigger">
            <span class="mdi mdi-share-variant"></span>
        </div>
        <div class="icons">
            <?php if ( true == get_theme_mod( 'facebook_share', true ) ) : ?> 
                <div class="rotater">
                    <a href="http://www.facebook.com/sharer.php?u=<?php echo home_url( $wp->request ); ?>" target="_blank">
                        <div class="btn btn-icon">
                            <i class="mdi mdi-facebook"></i>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ( true == get_theme_mod( 'google_share', true ) ) : ?> 
                <div class="rotater">
                    <a href="https://plus.google.com/share?url=<?php echo home_url( $wp->request ); ?>" target="_blank">
                        <div class="btn btn-icon">
                            <i class="mdi mdi-google-plus"></i>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ( true == get_theme_mod( 'twitter_share', true ) && get_option( 'twitter_user') ) : ?> 
                <div class="rotater">
                    <a href="http://twitter.com/share?url=<?php echo home_url( $wp->request ); ?>&amp;text=<?php the_title_attribute(); ?>&amp;via=<?php echo get_option( 'twitter_user', '' ) ?>" target="_blank">
                        <div class="btn btn-icon">
                            <i class="mdi mdi-twitter"></i>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
