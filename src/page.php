<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<div class="container-fluid max-large">
	<div class="row">

		<div class="col-sm p-0">
			<div id="content" role="main">
				<?php get_template_part( 'template-parts/loop', 'singular' ); ?>
			</div><!-- /#content -->
		</div>
	</div><!-- /.row -->
</div>
<?php get_footer(); ?>
