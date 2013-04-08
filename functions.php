<?php
/**
 * 
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
    $stylesheets .= wp_enqueue_style('formalize', get_bloginfo('template_directory').'/formalize.css', 'theme', $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('superfish', get_bloginfo('template_directory').'/superfish.css', 'theme', $version, 'screen, projection');
    if ( class_exists( 'jigoshop' ) ) {
    $stylesheets .= wp_enqueue_style('jigoshop', get_bloginfo('template_directory').'/jigoshop.css', 'theme', $version, 'screen, projection');
    }
    echo apply_filters ('child_add_stylesheets',$stylesheets);
}

}

