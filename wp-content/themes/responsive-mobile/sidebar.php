<?php
/**
 * Default Sidebar
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

/*
 * Load the correct sidebar according to the page layout
 */
$layout = responsive_mobile_get_layout();
switch ( $layout ) {
    case 'content-sidebar-page':
        get_sidebar( 'right' );
        return;
        break;

    case 'sidebar-content-page':
        get_sidebar( 'left' );
        return;
        break;

    case 'content-sidebar-half-page':
		get_sidebar( 'right-half' );
		return;
		break;

	case 'sidebar-content-half-page':
		get_sidebar( 'left-half' );
		return;
		break;

	case 'full-width-page':
		return;
		break;

	case 'three-column-posts':
		return;
		break;
}
?>
<?php responsive_mobile_widgets_before(); ?>
<div id="widgets" class="widget-area default-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php responsive_mobile_widgets(); ?>
        <?php
        if(!is_page()) {
            $current_post_id = get_the_ID();
            $parent_id = get_post_meta($current_post_id, "post_page_parent",true);
            $list_children = new WP_Query(array('post_status__not_in'=>array('trash'),'meta_key' => 'post_page_parent', 'meta_value' => $parent_id, 'orderby' => 'ID', 'order' => 'ASC'));

            if ($list_children->have_posts()) {
                echo '<aside id="same-post-parent-table-in-side-bar" class="widget-wrapper">';
                echo '<h4 class="widget-title">List Post In Same Catology</h4><ul>';
                while ($list_children->have_posts()):$list_children->the_post();
                    if (get_the_ID() == $current_post_id) {
                        ?>
                        <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><b> <img
                                            class="item-sidebar-icon"
                                            src="<?php apply_url("/wp-content/uploads/2019/08/item.png"); ?>"> <?php the_title(); ?>
                                </b></a></li>
                        <?php
                    } else {
                        ?>
                        <li><img class="item-sidebar-icon"
                                 src="<?php apply_url("/wp-content/uploads/2019/08/item.png"); ?>"> <a
                                    href="<?php the_permalink() ?>"
                                    title="<?php the_title_attribute(); ?>">   <?php the_title(); ?></a></li>
                        <?php
                    }
                endwhile;
                echo '</ul>';
                echo '</aside>';
            }
        }
        ?>
        <aside id="archives" class="widget-wrapper hidden-by-quoc" >
            <h3 class="widget-title"><?php _e( 'In Archive', 'responsive-mobile' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>

    <?php dynamic_sidebar( 'main-sidebar' ) ; ?>
	<?php responsive_mobile_widgets_end(); ?>
</div><!-- #default-sidebar -->
<?php responsive_mobile_widgets_after(); ?>
