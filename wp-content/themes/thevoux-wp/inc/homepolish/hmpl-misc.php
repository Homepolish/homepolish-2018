<?php



// Get the proper category header
function hmpl_get_category_aside($id=null) {
  $id = $id ? $id : get_the_ID();

  if( has_category() ) {
    $cat_mag_slug = get_category_by_slug( 'mag' );
    $service_mag_slug = get_category_by_slug( 'service' );
    $featured_post_slug = get_category_by_slug( 'featured-post' )->slug;

    // Grab the location
    $locations = get_the_terms( $id, 'location' );
    if ( !$locations || is_wp_error( $locations ) ) {
      $locations = get_term_by( 'name', 'new-york-city', 'location' );
    }

    $location_obj = $locations[0];
    $location_name = $location_obj->name;

    foreach( (get_the_category()) as $childcat) {
      if ($childcat->slug == $featured_post_slug) {
        continue;
      }
      if ( cat_is_ancestor_of($cat_mag_slug, $childcat) || cat_is_ancestor_of($service_mag_slug, $childcat) ) {
        echo '<aside class="post-meta cf"><h6>';
        echo '<a class="tertiary post-meta-category" href="'.get_category_link($childcat->cat_ID).'">'. $childcat->cat_name . '</a>';
        if( !cat_is_ancestor_of($service_mag_slug, $childcat) && isset($location_obj) ) {
          echo '<span class="post-meta-divider"> | </span>';
          echo '<a class="tertiary post-meta-location" href="'.get_term_link($location_obj->slug, 'location').'">'. $location_name . '</a>';
        }
        echo '</h6></aside>';
      }
    }
  }
}
add_action( 'hmpl_get_category_aside', 'hmpl_get_category_aside', 3);

// Get the image mode
function hmpl_get_image_dim($image, $device = "desktop") {
  $orientation = ( $image[1] / $image[2] > 1 ) ? "landscape" : "portrait";
  $mobile_dim = [375, round(($image[2] / $image[1]) * 375)];
  $desktop_dim = $orientation == "landscape" ? [1350, 900] : [703, 1056];
  return array(
    'orientation' => $orientation,
    'mobile_dim' => $mobile_dim,
    'desktop_dim' => $desktop_dim
    );
}
add_action( 'hmpl_get_image_dim', 'hmpl_get_image_dim', 3 );

function hmpl_get_attachment_image($image, $photo_caption="", $lazy_load=false) {
  $img_src = $image[0];
  if($lazy_load) {
    $html_src = ''; // let the javascript handle the src
  } else {
    $html_src = $img_src;
  }

  return "<img class='attachment-img' src='" . esc_url($html_src) . "' width='" . esc_attr($image[1]) . "' height='" . esc_attr($image[2]) . "' alt='" . esc_attr($photo_caption) . "' data-src='" . $img_src . "' />";
}
add_action( 'hmpl_get_attachment_image', 'hmpl_get_attachment_image', 3);