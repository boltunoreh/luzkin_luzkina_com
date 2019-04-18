<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<!-- MAP -->
  <?php if (is_page('map-adding') or is_page('map') or is_page('togo-map') ) : ?> 
    <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AA_GcU4BAAAA_nukBQMAGXmSUH8VYFvNyWiDqZlbZiQ3YAQAAAAAAAAAAADWFOKMZHngH17cS5py9L6rqIMRrQ==" type="text/javascript"></script>
    <script type="text/javascript">
      window.onload = function () {
        var map = new YMaps.Map(document.getElementById("YMapsID"));
        map.setCenter(new YMaps.GeoPoint(26.33, 23.44), 2, YMaps.MapType.HYBRID);
        
        <?php if (is_page('map-adding')) : ?>
        map.disableDblClickZoom();
        <?php endif; ?>
        
        map.enableScrollZoom();
        map.addControl(new YMaps.TypeControl());
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ScaleLine());
        
        map.removeAllOverlays();
        
        <?php if (is_page('map-adding') or is_page('map')) {
          $visited_or_togo = "visited";
        }
        elseif (is_page('togo-map')) {
          $visited_or_togo = "togo-map";
        } ?>

        var ml = new YMaps.YMapsML( '<?php echo get_home_url(); ?>/maps/<?php echo $visited_or_togo; ?>/create_YMapsML.php' );

        
        map.addOverlay(ml);

        YMaps.Events.observe(ml, ml.Events.Fault, function (error) {
          alert('Ошибка: ' + error);
        });
			
			  <?php if (is_page('map-adding')) : ?>
			
			  YMaps.Events.observe(map, map.Events.DblClick, function (map, mEvent) {
          var myHtml = "Значение: " + mEvent.getGeoPoint() + "<br>"+'<form id="formadd" name="formadd_point" method="post" action="<?php echo get_home_url(); ?>/maps/visited/outpoint.php"><p>Город: <input name="namepoint" type="text" size="20" maxlength="80" /></p><p>Страна: <input name="countrypoint" type="text" size="20" maxlength="80" /></p><p>Ссылка на фотку: <input name="photopoint" type="text" size="20" maxlength="800" /></p><p>Подпись: <textarea name="descriptpoint" cols="20" rows="5"></textarea></p><p>Кто был: <select name="whopoint"><option value= "Pumbel" SELECTED>Luzkin</option><option value="Lu">Luzkina</option><option value="Luzkin&Luzkin">Luzkin&Luzkin</option><option value="Luzin Family">Luzin Family</option></select></p><input name="pcoord" type="hidden" value="'+mEvent.getGeoPoint()+'" /><p><input name="subpoint" type="submit" value="Добавить" /></p></form>';
          map.openBalloon(mEvent.getGeoPoint(), myHtml);
        });
        
        <?php endif; ?>
        	
      }
    </script>      
  <?php endif; ?>
<!-- MAP END -->

<!-- google analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29281411-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<meta name="google-site-verification" content="du5rW1EOcPwWFIpC1enyNX4SaT-mv8cq6gPOOBY_qEM" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">