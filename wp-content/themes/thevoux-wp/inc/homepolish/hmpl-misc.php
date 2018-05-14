<?php
/* Environemnt settings */
if( preg_match("/localhost/", $_SERVER['SERVER_NAME'], $matches) ) {
  define("HMPL_ENV", "dev");
} else {
  define("HMPL_ENV", "prod");
}

/* Cloud Front URL Adjustments */
if(HMPL_ENV == "dev") {
  define('WP_SITEURL', HMPL_LOCALHOST); // Testing URL * uncomment to show https://wp.homepolish.com when ready to go live
  define('WP_HOME', HMPL_LOCALHOST); // Testing URL * uncomment to show https://www.homepolish.com or https://www.homepolish.com when ready to test or go live
} else {
  //define('WP_SITEURL', 'https://wp.homepolish.com'); // The wp engine endpoint * must be on homepolish.com subdomain to avoid cross-domain issues
  //define('WP_HOME', 'https://www.homepolish.com'); // How wordpress view the links * must also change urls in database to match
}



// /* Device Readings */
// if($_SERVER['HTTP_CLOUDFRONT_IS_MOBILE_VIEWER'] == "true") { // [SOURCE] http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/header-caching.html#header-caching-web-device
//   define("HMPL_MOBILE", "YES");
// } else {
//   define("HMPL_MOBILE", "NO");
// }

define("HMPL_MOBILE", "NO");

/* Homepolish Business Constants */
define("HMPL_OFFICE_ADDRESS_LINE_ONE", "27 W 24th Street Fl. 2");
define("HMPL_OFFICE_ADDRESS_LINE_TWO", "New York, NY 10010");
define("HMPL_PHONE_NUMBER", "844-808-4434");
define("HMPL_EMAIL", "info@homepolish.com");

/* Homepolish Server Constants */
define("HMPL_SERVICE_URI", "https://www.homepolish.com");

/* Homepolish root categories */
define("HMPL_MAG_CAT_ID", get_term_by('name', 'magazine', 'category')->term_id);
define("HMPL_SVC_CAT_ID", get_term_by('name', 'service', 'category')->term_id);

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

function hmpl_featured_image_thumbnail($params=array()) {
  $id = isset($params['id']) ? $params['id'] : get_post_thumbnail_id();
  hmpl_image_thumbnail($id, $params['dimensions'], get_the_permalink());
}
add_action( 'hmpl_featured_image_thumbnail', 'hmpl_featured_image_thumbnail');

// Returns the ID of the custom "Homepage Image" set on the post, if present
// Otherwise, falls back to the post's featured image
function hmpl_get_post_featured_thumbnail_id() {
  $homepage_image = get_field('homepage_image');
  if ($homepage_image) {
    return $homepage_image['id'];
  } else {
    return get_post_thumbnail_id();
  }
}

// Segment JS library initialization
function hmpl_js_analytics() {
  if (!defined('SEGMENT_JS_WRITE_KEY')) {
    return;
  }

  ?>
    <script type="text/javascript">
      !function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","reset","group","track","ready","alias","page","once","off","on"];analytics.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);analytics.push(e);return analytics}};for(var t=0;t<analytics.methods.length;t++){var e=analytics.methods[t];analytics[e]=analytics.factory(e)}analytics.load=function(t){var e=document.createElement("script");e.type="text/javascript";e.async=!0;e.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.com/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};analytics.SNIPPET_VERSION="3.1.0";

      analytics.load("<?php echo SEGMENT_JS_WRITE_KEY; ?>");
      analytics.page();
      }}();
    </script>
  <?php
}

// Renders HTML containing a properly dimensioned image, wrapped in a link
// Can be called outside of the loop
function hmpl_image_thumbnail($id, $dimensions, $link) {
  $image_src = wp_get_attachment_image_src($id, 'full');
  $image_title = esc_attr( get_the_title($id) );

  if (!empty($dimensions)) {
    $image = aq_resize( $image_src[0], $dimensions['height'], $dimensions['width'], true, false, true);
  } else if (HMPL_MOBILE == "YES") {
    $image = aq_resize( $image_src[0], 345, 264, true, false, true);
  } else {
    $image = aq_resize( $image_src[0], 600, 460, true, false, true);
  }

  ?>
  <a href="<?php echo $link; ?>">
    <img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" />
  </a>
  <?php
}
add_action( 'hmpl_image_thumbnail', 'hmpl_image_thumbnail');

// Gets the talking points of a post, if present, or the excerpt
// (Optionally) truncates with an ellipsis
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

function hmpl_header_title($ajax) {
  if ( $ajax == '0' ) {
    the_title('<h1 class="entry-title" itemprop="headline">', '</h1>');
  } else {
    the_title('<h1 class="entry-title" itemprop="headline"><a href="'.get_permalink().'" class="tertiary" title="'.the_title_attribute("echo=0").'">', '</a></h1>');
  }
}

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

function hmpl_gallery_button($id) {
  echo do_shortcode('[hmpl_gallery_button post_id='.$id.']View Gallery[/hmpl_gallery_button]');
}

function hmpl_author_social_links() {
  $links = array(
    'instagram' => get_the_author_meta('instagram'),
    'facebook' => get_the_author_meta('facebook'),
    'twitter' => get_the_author_meta('twitter'),
    'pinterest' => get_the_author_meta('pinterest')
  );

  $links = array_filter($links, 'strlen');

  if (!empty($links)) {
    ?>
      <?php  ?>
      <div class="author-social-links">
        <h6>Follow:</h6>

        <?php foreach($links as $site => $profile_link) { ?>
          <a href="<?php echo $profile_link; ?>" class="tertiary" target="_blank">
            <span class="v1-icon-<?php echo $site; ?>"></span>
          </a>
        <?php } ?>
      </div>
    <?php
  }
}

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

function hmpl_login_link() {
  ?>
    <a href="<?php echo HMPL_SERVICE_URI ?>/log_in" class="tertiary auth-link ">Log In</a>
  <?php
}
add_action( 'hmpl_login_link', 'hmpl_login_link', 3 );

function hmpl_logout_link() {
  ?>
    <a href="/app/logout" class="tertiary auth-link" data-logout-link="true">Log Out</a>
  <?php
}
add_action( 'hmpl_logout_link', 'hmpl_logout_link', 3 );

// get custom taxonomies terms to display on post page
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

function hmpl_attach_term_urls($terms, $taxonomy_slug) {
  return array_map(function($t) use ($taxonomy_slug) {
    $t->url = get_term_link($t->slug, $taxonomy_slug);
    return $t;
  }, $terms);
}

function hmpl_nav_links() {
  $prev_active = get_previous_posts_link();
  $next_active = get_next_posts_link();
  ?>
  <a href="<?php echo $prev_active ? previous_posts() : ''; ?>" class="prev <?php echo $prev_active ? 'active' : 'inactive'; ?>"><span class="v1-icon-caret-left"></span>
    <?php _e( 'Prev', THB_THEME_NAME ); ?>
  </a>
  <a href="<?php echo $next_active ? next_posts() : ''; ?>" class="next <?php echo $next_active ? 'active' : 'inactive'; ?>">
    <?php _e( 'Next', THB_THEME_NAME ); ?><span class="v1-icon-caret-right"></span>
  </a>
  <?php
}
add_action( 'hmpl_post_navigation', 'hmpl_post_navigation');

/* Filters, hooks */

/* Customizes the query for the default search function:
 *   - return only Posts (i.e. no Pages)
 */
function hmpl_search_query($query) {
  if ($query->is_search && $query->is_main_query()) {
    add_filter( 'posts_where', 'hmpl_search_query_where', 1, 2);
    $query->set('post_type', 'post');
  }

  return $query;
}
add_filter( 'pre_get_posts', 'hmpl_search_query' );

/*
* Adds an OR condition to check for the queried string in the talking_points field
*/
function hmpl_search_query_where($where, $query) {
  if ($query->is_search && $query->is_main_query()) {
      $talking_points_query = new WP_Query(array(
      'post_type' => 'post',
      'meta_key' => 'talking_points',
      'meta_value' => $query->get('s'),
      'meta_compare' => 'LIKE',
      'fields' => 'ids'
    ));

    $post_ids = $talking_points_query->posts;

    if (!empty($post_ids)) {
      $where .= " OR wp_posts.id IN(".implode(',', $post_ids).")";
    }
  }

  remove_filter( 'posts_where', 'hmpl_search_query_where');
  return $where;
}

function hmpl_add_contactmethods( $contactmethods ) {
  $contactmethods['instagram'] = 'Instagram Profile URL';
  $contactmethods['pinterest'] = 'Pinterest Profile URL';

  return $contactmethods;
}
add_filter( 'user_contactmethods', 'hmpl_add_contactmethods', 10, 1);

/* Taxonomy page queries */

function hmpl_tax_post_count($taxonomy_term) {
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy_term->taxonomy,
        'field' => 'slug',
        'terms' => $taxonomy_term->slug
      )
    )
  );

  $posts = new WP_Query($args);
  wp_reset_postdata();

  return $posts->found_posts;
}

function hmpl_tax_attachment_count($taxonomy_term) {
  $args = hmpl_tax_attachment_query_args($taxonomy_term);

  $attachments = new WP_Query($args);
  wp_reset_postdata();

  return $attachments->found_posts;
}
add_action( 'hmpl_tax_attachment_count', 'hmpl_tax_attachment_count' );

function hmpl_tax_child_attachments($parent_posts, $taxonomy_term) {
  $parent_ids = array_map(function($p) {
    return $p->ID;
  }, $parent_posts);

  $args = hmpl_tax_attachment_query_args($taxonomy_term);
  $args = array_merge($args, array(
    'post_parent__in' => $parent_ids,
    'posts_per_page' => -1
  ));

  // Images are not tagged w/ location, and it's safe to assume all photos in
  // an article were taken in the same location
  if (hmpl_tax_is_location($taxonomy_term)) {
    unset($args['tax_query']);
  }

  $attachments = get_posts($args);
  wp_reset_postdata();

  return $attachments;
}
add_action('hmpl_tax_child_attachments', 'hmpl_tax_child_attachments');

function hmpl_tax_attachment_query_args($taxonomy_term) {
  $args = array(
    'post_type' => 'attachment',
    'post_status' => 'inherit',
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy_term->taxonomy,
        'field' => 'slug',
        'terms' => $taxonomy_term->slug
      )
    )
  );
  return $args;
}
add_action('hmpl_tax_attachment_query_args', 'hmpl_tax_attachment_query_args');

function hmpl_tax_is_location($taxonomy_term) {
  return $taxonomy_term->taxonomy == 'location';
}

// Display posts with a caption first (caption length doesn't matter),
// with ID (descending) as secondary sort order
function hmpl_txn_sort_child_attachments($attachments, $cutoff=false) {
  usort($attachments, function($a1, $a2) {
    if (strlen($a1->post_excerpt) > 0 && strlen($a2->post_excerpt) == 0) {
      return -1;
    } else if (strlen($a1->post_excerpt) == 0 && strlen($a2->post_excerpt) > 0) {
      return 1;
    } else {
      return $a1->ID > $a2->ID;
    }
  });

  if ($cutoff) {
    $attachments = array_slice($attachments, 0, $cutoff);
  }
  return $attachments;
}

// Preview posts on the wp.homepolish.com domain
function hmpl_post_preview_link($link) {
  if (!HMPL_ENV == 'dev') {
    return preg_replace('/(?<=\/\/)www/', 'wp', $link, 1);
  } else {
    return $link;
  }
}
add_filter( 'preview_post_link', 'hmpl_post_preview_link' );

// Rename image uploads for SEO
function hmpl_image_upload_rename($file) {
  if (preg_match('/^image/', $file['type'])) {
    $file_name = $file['name'];
    $file_extension = substr($file_name, strripos($file_name, '.'));
    $file_name = 'Homepolish-interior-design-'.substr(md5(rand()), 0, 5).$file_extension;

    // In the unlikely event of a collision
    $upload_dir = wp_upload_dir();
    while (file_exists($upload_dir['basedir'].'/'.$file_name)) {
      $file_name = 'Homepolish-interior-design-squad'.substr(md5(rand()), 0, 5).$file_extension;
    }
    $file['name'] = $file_name;
  }
  return $file;
}
add_filter('wp_handle_upload_prefilter','hmpl_image_upload_rename');

// URL Rewrite Rules
function rewrite_rules() {
  $rules = get_option( 'rewrite_rules' );

  // If we haven't set the rewrite rules yet, flush the cache * Expensive! *
  if ( ! isset( $rules['^wp-search/page/(\d+)$'] ) ) {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
  }

  // Make sure /mag and /magazine go to the homepage
  //add_rewrite_rule('^(mag)(azine)?\/?$', 'index.php', 'top');

  // Grab all of the cities
  $terms = get_terms('location');
  foreach( $terms as $location) {
    add_rewrite_rule('^' . $location->slug, 'index.php?location=' . $location->slug, 'top'); // allow for cities to be accessed directly
  }

  add_rewrite_rule('^(service)\/?$', 'index.php?pagename=service', 'top');
  add_rewrite_rule('^(startups)\/?$', 'index.php?pagename=commercial', 'top');
  add_rewrite_rule('^(careers)\/?$', 'index.php?pagename=jobs', 'top');
  add_rewrite_rule('^(mag)/faq$', 'index.php?pagename=faq', 'top');

  add_rewrite_rule('^wp-search$', 'index.php?s=$matches[1]', 'top');

  add_rewrite_rule('^wp-search/page/(\d+)$', 'index.php?paged=$matches[1]&s=$matches[2]', 'top');
}
add_action('init', 'rewrite_rules');

/**
* Function below is taken from this SO post & answer:
* http://stackoverflow.com/a/16583897/3536464
*
* Which in turn took it from the CakePHP framework (MIT licensed)
* http://cakephp.org
*/


/**
* Truncates text.
*
* Cuts a string to the length of $length and replaces the last characters
* with the ending if the text is longer than length.
*
* ### Options:
*
* - `ending` Will be used as Ending and appended to the trimmed string
* - `exact` If false, $text will not be cut mid-word
* - `html` If true, HTML tags would be handled correctly
*
* @param string  $text String to truncate.
* @param integer $length Length of returned string, including ellipsis.
* @param array $options An array of html attributes and options.
* @return string Trimmed string.
* @access public
* @link http://book.cakephp.org/view/1469/Text#truncate-1625
*/
function truncate($text, $length = 100, $options = array()) {
  $default = array(
    'ending' => '...', 'exact' => true, 'html' => false
    );
  $options = array_merge($default, $options);
  extract($options);

  if ($html) {
    if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
      return $text;
    }
    $totalLength = mb_strlen(strip_tags($ending));
    $openTags = array();
    $truncate = '';

    preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
    foreach ($tags as $tag) {
      if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
        if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
          array_unshift($openTags, $tag[2]);
        } else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
          $pos = array_search($closeTag[1], $openTags);
          if ($pos !== false) {
            array_splice($openTags, $pos, 1);
          }
        }
      }
      $truncate .= $tag[1];

      $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
      if ($contentLength + $totalLength > $length) {
        $left = $length - $totalLength;
        $entitiesLength = 0;
        if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
          foreach ($entities[0] as $entity) {
            if ($entity[1] + 1 - $entitiesLength <= $left) {
              $left--;
              $entitiesLength += mb_strlen($entity[0]);
            } else {
              break;
            }
          }
        }

        $truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);
        break;
      } else {
        $truncate .= $tag[3];
        $totalLength += $contentLength;
      }
      if ($totalLength >= $length) {
        break;
      }
    }
  } else {
    if (mb_strlen($text) <= $length) {
      return $text;
    } else {
      $truncate = mb_substr($text, 0, $length - mb_strlen($ending));
    }
  }
  if (!$exact) {
    $spacepos = mb_strrpos($truncate, ' ');
    if (isset($spacepos)) {
      if ($html) {
        $bits = mb_substr($truncate, $spacepos);
        preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
        if (!empty($droppedTags)) {
          foreach ($droppedTags as $closingTag) {
            if (!in_array($closingTag[1], $openTags)) {
              array_unshift($openTags, $closingTag[1]);
            }
          }
        }
      }
      $truncate = mb_substr($truncate, 0, $spacepos);
    }
  }
  $truncate .= $ending;

  if ($html) {
    foreach ($openTags as $tag) {
      $truncate .= '</'.$tag.'>';
    }
  }

  return $truncate;
}
add_action('truncate', 'truncate');
?>
