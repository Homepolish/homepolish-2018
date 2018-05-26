<?php

function hmpl_get_post_display_terms() {
  $post = get_post( get_the_ID() );
  $post_type = $post->post_type;

  $vibes = hmpl_get_ordered_post_terms($post, 'vibe', 3);
  $rooms = hmpl_get_ordered_post_terms($post, 'room', 2);
  $terms = array_merge($vibes, $rooms);

  usort($terms, function($t1, $t2) {
    return $t1->count < $t2->count;
  });
  $featured_term = array_shift($terms);

  return array('featured_term' => $featured_term, 'list_terms' => $terms);
}

// Gets the terms on a post for a given taxonomy, ordered by total # of posts w/ term
// Also attaches the proper url
function hmpl_get_ordered_post_terms($post, $taxonomy_slug, $limit=5) {
  $terms = get_the_terms( $post->ID, $taxonomy_slug );
  if ($terms && ! empty($terms)) {
    usort($terms, function($t1, $t2) {
      return $t1->count < $t2->count;
    });
    $terms = hmpl_attach_term_urls($terms, $taxonomy_slug);
    return array_slice($terms, 0, $limit);
  } else {
    return array();
  }
}

// Soon to be deprecated
function hmpl_header_date_author() {
  $author = get_the_author();
  $author_url = get_author_posts_url(get_the_author_id());
  ?>
    <span class="post-date-author">
      <time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
        <h6><?php echo thb_human_time_diff_enhanced(); ?></h6>
      </time>

      <?php if ($author_url) { ?>
        <span class="extra-small show-for-medium-up">|</span>

        <span class="extra-small italic">written by&nbsp;</span>

        <h6>
          <a class="tertiary" href="<?php echo $author_url ?>">
            <?php echo $author ?>
          </a>
        </h6>
      <?php } ?>
    </span>
  <?php
}

function hp_2018_header_date_author() {
    $datetime = esc_attr( get_the_date( 'c' ) );
    $date = date_create( $datetime );
    ?>
    <span class="post-date-author">
        <span ="meta-key">Posted: </span>
            <time class="time" datetime="<?php echo $datetime; ?>">
                <?php echo date_format( $date, 'n.d.y' ); ?>
            </time>
    </span>
<?php }

function hmpl_get_talking_points($params=array()) {
  $id = isset($params['id']) ? $params['id'] : get_the_ID();
  $cutoff = isset($params['cutoff']) ? $params['cutoff'] : null;

  $talking_points = get_field('talking_points', $id);
  $text = $talking_points ? $talking_points : get_the_excerpt($id);
  // Remove [] brackets around … (result of WP auto-truncation)
  $formatted = preg_replace('/\s\[\&hellip;]$/u', '&hellip;', $text);
  if ($cutoff && strlen($text) > $cutoff) {
    $formatted = truncate($formatted, $cutoff, array('ending' => '&hellip;', 'exact' => false, 'html' => true));
  }
  return $formatted;
}
add_action('hmpl_get_talking_points', 'hmpl_get_talking_points');

//This should go away ER
function hmpl_header_title($ajax) {
  if ( $ajax == '0' ) {
    the_title('<h1 class="entry-title">', '</h1>');
  } else {
    the_title('<h1 class="entry-title"><a href="'.get_permalink().'" class="tertiary" title="'.the_title_attribute("echo=0").'">', '</a></h1>');
  }
}

// Soon to be deprecated Get the proper category header
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

function hp_2018_get_category_aside($id=null) {
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
        /*if( !cat_is_ancestor_of($service_mag_slug, $childcat) && isset($location_obj) ) {
          echo '<span class="post-meta-divider"> | </span>';
          echo '<a class="tertiary post-meta-location" href="'.get_term_link($location_obj->slug, 'location').'">'. $location_name . '</a>';
        }
        */
        echo '</h6></aside>';
      }
    }
  }
}
add_action( 'hmpl_get_category_aside', 'hp_2018_get_category_aside', 3);

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















/* Images */

function hmpl_gallery_button($id) {
  echo do_shortcode('[hmpl_gallery_button post_id='.$id.']View Gallery[/hmpl_gallery_button]');
}