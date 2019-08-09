<?php
/**
 * Content Page Template
 *
 * The template used for displaying page content in page.php
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php responsive_mobile_entry_top(); ?>

	<?php get_template_part( 'template-parts/post-meta-page' );

	// Added filter to get featured_image option working.
	$featured_image = apply_filters( 'responsive_mobile_featured_image', '1' );
	if ( has_post_thumbnail() && $featured_image ) {
		?>
		<div class="page-feature-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php
	} ?>

	<div class="post-entry">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'responsive-mobile' ),
				'after'  => '</div>',
		) ); ?>
		<?php get_template_part( 'template-parts/post-data' ); ?>
		<?php responsive_mobile_entry_bottom(); ?>
	</div><!-- .post-entry -->
	<?php responsive_mobile_entry_after(); ?>
</article><!-- #post-## -->
