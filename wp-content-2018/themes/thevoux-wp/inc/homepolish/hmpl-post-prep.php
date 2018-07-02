<?php
# Methods that scrub and adjust data from HIVE xml import
# * can ignore after launch

function parse_description($description, $attid) {
  if($description == null || $description == '') {
    echo "NO DESC";
    return;
  }

  $tax_arr = explode("|", $description);

  if(array_key_exists(0, $tax_arr) == 1)
    apply_taxonomy('vibe', $tax_arr[0], $attid);

  if(array_key_exists(1, $tax_arr) == 1)
    apply_taxonomy('room', $tax_arr[1], $attid);

  if(array_key_exists(2, $tax_arr) == 1)
    apply_taxonomy('product', $tax_arr[2], $attid);
}
function apply_taxonomy($tax_type, $tax_str, $attid) {
  if($tax_str == null || $tax_str == '') {
    echo "NO TAX";
    return;
  }

  echo "APPLYING TAX";
  $tax_arr = explode(",", $tax_str);

  foreach( $tax_arr as $tax ) {
    $par_child = explode(" &gt; ", $tax);

    $parent_term_str = $par_child[0];

    $parent_term = term_exists( $parent_term_str, $tax_type, null );
    if($parent_term == null) { // parent term does not exist
      # Create the parent term
      $new_parent_term = wp_insert_term(
        $parent_term_str, // the term 
        $tax_type // the taxonomy
      );
      $parent_term_id = $new_parent_term['term_id'];
    } else {
      $parent_term_id = $parent_term['term_id'];
    }

    if(array_key_exists(1, $par_child) == 1) { // we have a child
      $child_term_str = $par_child[1];

      # Handle the child term
      $child_term = term_exists( $child_term_str, $tax_type, $parent_term_id );
      if($child_term == null) { // parent term does not exist
        var_dump($child_term);
        # Create the child term
        $new_child_term = wp_insert_term(
          $child_term_str, // the term 
          $tax_type, // the taxonomy
          array(
            'parent'=> $parent_term_id
          )
        );
        var_dump($new_child_term);
        return;
        $child_term_id = $new_child_term['term_id'];
      } else {
        $child_term_id = $child_term['term_id'];
      }
    } else {
      $child_term_id = $parent_term_id; # just add the child term as the parent term since no child exists
    }

    # Apply the term to the attachment
    wp_set_post_terms( $attid, array($child_term_id), $tax_type, 1 );
  }

}

// Loop through posts and add all attached images to the gallery along with categories
function gallery_image_attached($pid, $attid, $image_filepath){
  echo $attid;

  $post = get_post($pid); // grab the post
  $attachment = get_post($attid); // grab the attachment
  
  # Grab all attached images & prep a string of IDs
  $medias = get_attached_media( 'image', $pid );
  $mediaIDs = array();
  foreach($medias as $media) {
    $mediaIDs[] = $media->ID;

    # Applying taxonomies to attachments
    $description = $media->post_content; // description is embedded in attachment post_content
    // parse_description($description, $attid);
  }
  $mediaIDsStr = implode( "," , $mediaIDs );

  # Add all attached media to the Voux gallery (which is kept via a custom field)
  update_post_meta($pid, 'post-gallery-photos', $mediaIDsStr);


  echo "*";
}
add_action('pmxi_gallery_image', 'gallery_image_attached', 10, 3);

# Run manually after imported
function add_tax_to_attachments() {
  # Grab all the attachments
  $attachments = get_posts( array(
    'post_type' => 'attachment',
    'numberposts' => -1,
    'offset' => 0 # must include the offset because wpengine times out otherwise

  ) );

  foreach($attachments as $attachment) {
    echo "UPDATING " . $attachment->ID;

    $description = $attachment->post_content;
    if($description == null || $description == '') {
      next;
    }

    parse_description($description, $attachment->ID);

    // # Clear out import description
    // # ONLY run after confirmation of proper categories
    wp_update_post( array('ID'=>$attachment->ID,'post_content'=>'') );
  }
}
// add_action('init', 'add_tax_to_attachments');


function remove_duplicate_post_content_excerpt() {
 # Grab all the posts
  $posts = get_posts( array(
   'post_type' => 'post',
   'numberposts' => -1
  ) );

  foreach($posts as $post) {
    $post_content = $post->post_content;
    $post_id = $post->ID;
    if(get_post_meta($post_id)['talking_points']) {
      $talking_points = get_post_meta($post_id)['talking_points'][0];
    }

    if($talking_points) {
      // echo "UPDATING " . $post->ID . " > ";
      // echo $post_content;
      // echo ">>";
      $updated_post_content = trim(str_replace($talking_points, "", $post_content)); // remove the talking points but leave everything else
      // echo $updated_post_content;
      // echo "<br>";
      if($post_content != $updated_post_content) {
        wp_update_post( array('ID'=>$post_id,'post_content'=>$updated_post_content) );
      }
    }
  }
}
// add_action('init', 'remove_duplicate_post_content_excerpt');

?>