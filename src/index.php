<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>


<main id="content" role="main" class="mt-5 max-large margin-two-column">
	<div class="row">
		<div class="col-12">
			<?php get_template_part( 'template-parts/loop' ); ?>
		</div>
	</div>
</main>
<?php get_footer();
