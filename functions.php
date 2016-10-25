<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/*
 * Check if link is external
 */
function is_external($url) {
  $link = parse_url( $url );
  return ( false === strpos( $link['host'], $_SERVER['SERVER_NAME'] ) ) ? false : true;
}

/**
 * Wraps oEmbeds in an embed container
 *
 */
function oembed_video_container( $html, $url, $attr, $post_id ) {
  return '<div class="embed__container">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'oembed_video_container', 99, 4 );

/**
 * Remove taxonomy lavels from archive titles
 */
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  }
  return $title;
});
