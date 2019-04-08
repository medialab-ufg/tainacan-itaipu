<?php if ( has_nav_menu( 'navMenubelowHeader' ) ) : ?>
	<nav class="navbar navbar-expand-md navbar-light bg-white px-0 border-bottom menu-belowheader" role="navigation">
		<div class="container-fluid max-large px-0 margin-one-column">
			<!-- Brand and toggle get grouped for better mobile display -->	
			<a class="navbar-brand d-md-none" href="#"></a>
			<button class="navbar-toggler text-heavy-metal border-0 px-2 pt-2" type="button" data-toggle="collapse" data-target="#menubelowHeader" aria-controls="menubelowHeader" aria-expanded="false" aria-label="Toggle navigation">	
				<span class="navbar-toggler-icon"></span>	
			</button>
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'navMenubelowHeader',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'menubelowHeader',
					'menu_class'      => 'navbar-nav mr-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
			?>
		</div>
	</nav>
<?php endif; ?>

	<?php tainacan_interface_the_breadcrumb(); ?>
