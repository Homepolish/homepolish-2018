<?php function hmpl_gallery_button_shortcode( $atts, $content = '' ) {
    extract(shortcode_atts(array(
        'post_id' => '0'
    ), $atts));

  $out = '';

  $out .= '<a href="#post-gallery-'.$post_id.'" class="btn secondary gallery-link gallery-link-button" data-class="post-gallery-lightbox">';
  $out .= '  <span class="v1-icon-gallery"></span>'.$content;
  $out .= '</a>';

  return $out;
}
add_shortcode('hmpl_gallery_button', 'hmpl_gallery_button_shortcode');
