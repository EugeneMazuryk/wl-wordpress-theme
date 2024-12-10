<?php
/*
Template Name: Home page
*/

/**
 * ACF fields
 */

?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/global/section', 'custom-block', array( 'page_id' => get_the_ID() ) ); ?>

<?php get_template_part( 'template-parts/forms/custom-form', null,
	array(
		'form_id'    => 'default-form',
		'form_title' => esc_html( 'Custom Form' )
	)
); ?>

<?php get_sidebar(); ?>

<?php get_footer();
