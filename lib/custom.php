<?php 

define( 'UPLOADS', ''.'media' );

//Length shortcode
add_shortcode('trim', 'trim_shortcode');
function trim_shortcode($atts, $content = '') {
  $content = wpv_do_shortcode($content);
  $length = (int)$atts['length'];
  if (strlen($content) > $length) {
    $content = substr($content, 0, $length) . '&hellip;';
  }
  return $content;
}

//filter by child posts
add_action('pre_get_posts', 'parent_has_childs_func');
add_filter('wpv_filter_query', 'parent_has_childs_func', 101, 3);
 
function parent_has_childs_func($query, $view_settings, $view_id) {
if ( $view_id == '68' ) {
  global $wpdb;
  $ids = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_key = '_wpcf_belongs_albums_id'" );
  $query['post__in'] = array($ids);
}
return $query;
}
?>