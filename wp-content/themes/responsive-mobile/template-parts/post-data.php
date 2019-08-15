<?php
/**
 * Posts Date Template
 *
 * The template used for displaying post meta data for the posts like taxonimies
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

<footer class="post-data">
	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'responsive-mobile' ) );
			
			// Added filter to get by_line_categories toggle option working.
			$by_line_categories = apply_filters( 'responsive_mobile_by_line_categories', 1 );
			if ( $categories_list && responsive_mobile_categorized_blog() && $by_line_categories ) :
		?>
		
		<?php endif; // End if categories ?>

		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'responsive-mobile' ) );
			
			// Added filter to get by_line_tag option working.
			$by_line_tag = apply_filters( 'responsive_mobile_by_line_tag', '1' );
			
			if ( $tags_list && $by_line_tag ) :
		?>
		<span class="tags-links">
			<?php printf( __( 'Tagged with %1$s', 'responsive-mobile' ), $tags_list ); ?>
		</span>
		<?php endif; // End if $tags_list ?>
	<?php endif; // End if 'post' == get_post_type() ?>

<?php
	$responsive_options = responsive_mobile_get_options();
		if($responsive_options['blog_posts_index_layout_default']!=="three-column-posts")
		{ ?>
	<div class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'responsive-mobile' ), '<span class="post-edit">', '</span>' ); ?>
	</div><!-- .entry-meta -->
	<?php } ?>
</footer><!-- .post-data -->
