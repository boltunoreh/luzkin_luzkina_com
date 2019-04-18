<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="secondary" class="widget-area" role="complementary">
  		<?php if (is_single()) {
        if ($post->post_type == 'movies') {
        ?>
          <div class="sidebar_tag_title_for_sinular">Verdict:</div>
          <div class="tax_list"><?php the_terms( $post->ID, 'cinema' ); ?>
          </div>
        <?php
        }
        elseif ($post->post_type == 'places') {
        ?>
          <div class="sidebar_tag_title_for_sinular">Location:</div>
          <div class="tax_list"><?php the_terms( $post->ID, 'togo' ); ?></div>
          <br>
          <div class="sidebar_tag_title_for_sinular">Type:</div>          
          <div class="tax_list"><?php the_terms( $post->ID, 'togo_type' ); ?></div>
        <?php
        }
        elseif ($post->post_type == 'videos' || is_page('video') ) {
        ?>
          <div class="sidebar_tag_title_for_sinular">Tags for this video:</div>
          <div class="tax_list"><?php the_terms( $post->ID, 'l-and-l-video' ); ?></div>
        <?php
        }
        elseif ($post->post_type == 'post') {
    			dynamic_sidebar( 'sidebar-1' );
    	  }
      }
      else { ?>
      
        <?php
        if ($post->post_type == 'movies') {
        ?>
          <div class="sidebar_tag_title_for_archives">Rates:</div>
          <div class="tax_list"><?php wp_list_categories('taxonomy=cinema&style=list&title_li='); ?></div>
          </div>
        <?php
        }
        elseif ($post->post_type == 'places') {
        ?>
          <div class="sidebar_tag_title_for_archives">Locations:</div>
          <div class="tax_list"><?php wp_list_categories('taxonomy=togo&style=list&title_li='); ?></div>
          <br>
          <div class="sidebar_tag_title_for_archives">Types:</div>          
          <div class="tax_list"><?php wp_list_categories('taxonomy=togo_type&style=list&title_li='); ?></div>
        <?php
        }
        elseif ($post->post_type == 'videos' || is_page('video') ) {
        ?>
          <div class="sidebar_tag_title_for_archives">Tags:</div>          
          <div class="tax_list"><?php wp_tag_cloud( array( 'taxonomy' => 'l-and-l-video', 'number' => 25, 'smallest' => 12, 'largest' => 24, 'unit' => 'px' ) ); ?></div>
        <?php
        }
        elseif ($post->post_type == 'post') {
    			dynamic_sidebar( 'sidebar-1' );
    	  }
      }
      ?>
      
  	</div><!-- #secondary -->
	<?php endif; ?>