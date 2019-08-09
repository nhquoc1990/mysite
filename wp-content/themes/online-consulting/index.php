<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Online Consulting
 */

get_header(); 
?>
<div class="container">
     <div class="site_content_panel">
        <div class="left_panel_content <?php if( get_theme_mod( 'online_consulting_hidesidebar_from_homepage' ) ) { ?>fullwidth<?php } ?>">
        	 <div class="my_blogpost_layout">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content' );
                    
                        endwhile;						
                        // Previous/next post navigation.
                        the_posts_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results' );
                    
                    endif;
                    ?>
              </div><!-- my_blogpost_layout -->
                   
             </div><!-- left_panel_content-->   
           <?php if( get_theme_mod( 'online_consulting_hidesidebar_from_homepage' ) == '') { ?> 
          		<?php get_sidebar();?>
        	<?php } ?>  
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>