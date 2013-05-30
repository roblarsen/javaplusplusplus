<?php
/**
 * Skeleton theme functions and definitions
 *
 * This theme is largely based on skeleton with some significant modifications
 * mainly to template files, but adds additional helper functions to the layout in general.
 * Other functions are attached to action and filter hooks in WordPress to change core functionality.
 * 
 * Layout Functions:
 * 
 * st_header  // Opening header tag and logo/header text
 * st_header_extras // Additional content may be added to the header
 * st_navbar // Opening navigation element and WP3 menus
 * st_before_content // Opening content wrapper 
 * st_after_content // Closing content wrapper 
 * st_before_sidebar // Opening sidebar wrapper 
 * st_after_sidebar // Closing sidebar wrapper 
 * st_before_footer // Opening footer wrapper 
 * st_footer // The footer (includes sidebar-footer.php)
 * st_after_footer // The closing footer wrapper 
 * 
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, skeleton_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'skeleton_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 0.1
 */

/*-----------------------------------------------------------------------------------*/
/* Set Proper Parent/Child theme paths for inclusion
/*-----------------------------------------------------------------------------------*/

@define( 'PARENT_DIR', get_template_directory() );
@define( 'CHILD_DIR', get_stylesheet_directory() );

@define( 'PARENT_URL', get_template_directory_uri() );
@define( 'CHILD_URL', get_stylesheet_directory_uri() );



remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'wp_generator');

function theme_css(){
  return;
}

function production_stylesheet($public_query_vars) {
  return;
}

function st_navbar() {
	return;
}
    function st_before_footer() {
      $footerwidgets = is_active_sidebar('first-footer-widget-area') + is_active_sidebar('second-footer-widget-area') + is_active_sidebar('third-footer-widget-area') + is_active_sidebar('fourth-footer-widget-area');
      $class = ($footerwidgets == '0' ? 'noborder' : 'normal');
      echo '<div class="clear"></div><footer id="footer" class="'.$class.' sixteen columns">';
    }
function st_footer() {
    //loads sidebar-footer.php
    get_sidebar( 'footer' );
    // prints site credits
    echo '<div id="credits">';
    echo '<small>&copy; Rob Larsen</small>';
    echo '</div>';
}
function st_after_footer() {
  echo "</footer><!--/#footer-->"."\n";
  echo "</div><!--/#wrap.container-->"."\n";
  if (of_get_option('footer_scripts') <> "" ) {
    echo '<script type="text/javascript">'.stripslashes(of_get_option('footer_scripts')).'</script>';
  }
}
if ( !function_exists( 'st_registerstyles' ) ) {
  add_action('get_header', 'st_registerstyles');
  function st_registerstyles() {
    $theme  = wp_get_theme();
    $version = $theme['Version'];
    $stylesheets = wp_enqueue_style('skeleton', get_bloginfo('template_directory').'/skeleton.css', false, $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('theme', get_bloginfo('stylesheet_directory').'/style.css', 'skeleton', $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('layout', get_bloginfo('stylesheet_directory').'/layout.css', 'theme', $version, 'screen, projection');
    echo apply_filters ('child_add_stylesheets',$stylesheets);
  }
}

if ( !function_exists( 'st_header_scripts' ) ) { 
  add_action('init', 'st_header_scripts');   
  function st_header_scripts() {     
   $javascripts  = wp_enqueue_script('jquery');
   $javascripts .= wp_enqueue_script('move',get_bloginfo('stylesheet_directory').'/jquery.event.move.js',array('jquery'),'1.2.3',true);
    $javascripts .= wp_enqueue_script('swipe',get_bloginfo('stylesheet_directory').'/jquery.event.swipe.js',array('jquery','move'),'1.2.3',true);
    $javascripts .= wp_enqueue_script('jppp',get_bloginfo('stylesheet_directory').'/jppp.js',array('jquery','move','swipe'),'1.2.3',true);
   echo apply_filters ('child_add_javascripts',$javascripts);                    }
}

add_filter( 'twitter_cards_properties', 'twitter_custom' );

  function twitter_custom( $twitter_card ) {
    if ( is_array( $twitter_card ) ) {
      $twitter_card['creator'] = '@robreact';
      $twitter_card['creator:id'] = '7579292';
    }
    return $twitter_card;
  }