<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/headercollection' ); ?>

<?php
/**
 * This template adss Collections details to the header
 *
 * It will only work with tainacan plugin enabled.
 *
 */
?>

<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<div class="front-page collections margin-two-column max-large">
    <h1><?php tainacan_the_collection_name(); ?></h1>
    <hr class="mi-hr title"/>
</div>