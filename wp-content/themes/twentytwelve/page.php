<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
    
      <!-- IF VIDEO -->
      <?php
      if (is_page('video')) {
        randomvideos();
      }
         
      elseif (is_page('map') or is_page('map-adding') or is_page('togo-map') ) {
      ?>

  	  <br>
      <div id="YMapsID"></div>
      <?php
      if (is_page('map') or is_page('map-adding')) {
      ?>
      <table id="places_list_table">
      <tr>
      <td>
      <?php include ($_SERVER['DOCUMENT_ROOT']."/maps/visited/places-list.php"); ?>
      </td>
      <td id="places_list_legend">
      <table id="places_list_legend_table">
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/visited/images/flag-p.png"></td><td> - здесь был Павлик</td></tr>
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/visited/images/flag-l.png"></td><td> - здесь была Люба</td></tr>
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/visited/images/flag-ll.png"></td><td> - здесь были Павлик с Любой</td></tr>
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/visited/images/flag-lf.png"></td><td> - здесь была вся алазанская семья</td></tr>
      </table>
      </td>
      </tr>
      </table>
      <?php
      }
      else {
      ?>
      <table id="places_list_legend_table">
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/togo-map/images/flag-prison.png"></td><td> - отели в бывших тюрьмах</td></tr>
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/togo-map/images/flag-hotel.png"></td><td> - интересные отели</td></tr>
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/togo-map/images/flag-bunker.png"></td><td> - бункеры, открытые для посещения</td></tr>
        <tr><td><img src="<?php echo get_home_url(); ?>/maps/togo-map/images/flag-architecture.png"></td><td> - архитекутрные достопримечательности</td></tr>        
      </table>
      <?php
      }
      }          
      else {
  			while ( have_posts() ) : the_post();
  				get_template_part( 'content', 'page' );
  				comments_template( '', true );
  			endwhile; // end of the loop.
      }
      ?>

    </div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>