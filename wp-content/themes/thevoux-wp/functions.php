<?php

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file.
	You have been warned!

-------------------------------------------------------------------------------------*/

require_once('hmpl-keys.php'); // Make sure we don't store the keyes in the codebase

// Define Theme Name for localization
if (!defined('THB_THEME_NAME')) {
	define('THB_THEME_NAME', 'thevoux');
	define('THB_THEME_ROOT', get_template_directory_uri());
	define('THB_THEME_ROOT_ABS', get_template_directory());
}

// Translation
add_action('after_setup_theme', 'lang_setup');
function lang_setup(){
	load_theme_textdomain(THB_THEME_NAME, THB_THEME_ROOT_ABS . '/inc/languages');
}

// Option-Tree Theme Mode
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_override_forced_textarea_simple', '__return_true' );
include_once( 'inc/ot-fonts.php' );
include_once( 'inc/ot-radioimages.php' );
include_once( 'inc/ot-metaboxes.php' );
include_once( 'inc/ot-themeoptions.php' );
include_once( 'inc/ot-functions.php' );
if ( ! class_exists( 'OT_Loader' ) ) {
	include_once( 'admin/ot-loader.php' );
}

// Script Calls
require_once('inc/script-calls.php');

// Excerpts
require_once('inc/excerpts.php');

// Ajax
require_once('inc/ajax.php');

// TGM Plugin Activation Class
if ( is_admin() ) {
	require_once('inc/class-tgm-plugin-activation.php');
	require_once('inc/plugins.php');
}

// Enable Featured Images
require_once('inc/postthumbs.php');

// Post Formats
add_theme_support('post-formats', array('image', 'gallery'));

// Add Menu Support
require_once('inc/wp3menu.php');

// Enable Sidebars
require_once('inc/sidebar.php');

// Custom Comments
// require_once('inc/comments.php');

// Widgets
require_once('inc/widgets.php');

// Misc 
require_once('inc/misc.php');

// Breadcrumbs 
require_once('inc/related.php');

// Breadcrumbs 
require_once('inc/breadcrumbs.php');

// AQ Resizer
require_once('inc/aq_resizer.php');

// Twitter oAuth
require_once('inc/TwitterAPIExchange.php');

// Share Counts
require_once('inc/posts-social-shares-count/posts-share-count.php');

// Visual Composer Integration
require_once('inc/visualcomposer.php');

// HTML5 Galleries
add_theme_support( 'html5', array( 'caption', 'comment-list' ) );
add_filter( 'use_default_gallery_style', '__return_false' );

// Shortcode Generator & Shortcodes (+)
require_once('inc/tinymce/tinymce-class.php');	
require_once('inc/tinymce/shortcode-processing.php');

// Theme Info
if ( is_admin() ) {
	include_once( trailingslashit(THB_THEME_ROOT_ABS) . '/inc/theme_info.php' );
}

// WordPress Importer
if ( is_admin() ) {
	if(!class_exists('WP_Import'))
		require_once( trailingslashit(THB_THEME_ROOT_ABS) . 'inc/wordpress-importer/wordpress-importer.php');
	require_once( trailingslashit(THB_THEME_ROOT_ABS) . 'inc/import.php');
}

/* HOMEPOLISH */
// Custom Taxonomy
require_once('inc/homepolish/hmpl-custom-taxonomy.php');

// Misc methods
require_once('inc/homepolish/hmpl-misc.php');

// Import functions * can be removed once imported
require_once('inc/homepolish/hmpl-post-prep.php');

/* add more repeatable metabox for boutique*/
//add_action( 'admin_init', 'homepolish_addevent_metabox' );
function homepolish_addevent_metabox(){
		 
 //global $post;
     //if(!empty($post))
   // {
       //echo $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

       // if($pageTemplate == 'tmp_homepolish.php' )
       // {
   
add_meta_box('html_myid_61_section', 'Events', 'homepolish_addevent_output', 'page', 'normal' ,'high');
//}

//}


}

//call back function
function homepolish_addevent_output($post) { ?>
		<?php
   global $post;
   $author_data = get_post_meta($post->ID, 'team_member_info', true);
   //echo '<pre>'; print_r($author_data); echo count($author_data['authorMeta']);die;
   if(!empty($author_data) && count($author_data['authorMeta']) >0 ){
    
   	echo '<div class="authorBoxwrap">';
   	foreach($author_data['authorMeta'] as $ky =>$val)
    {
   	$output ='<table id="authorBox-'.$ky.'" class="form-table">';
      $output .='<tr><th><label for="Name">Date</label></th><td>';
    $output .='<input type="text" name="_my_meta[authorMeta]['.$ky.'][date]" id="" value="'.$val['date'].'" size="50" /> 
     <br /><span class="description">Put date here.</span>'; 
  $output .='</td></tr>';
   $output .='<tr><th><label for="Name">Event Title</label></th><td>';
    $output .='<input type="text" name="_my_meta[authorMeta]['.$ky.'][title]" id="" value="'.$val['title'].'" size="50" /> 
     <br /><span class="description">Put event title here.</span>'; 
  $output .='</td></tr>';
  $output .='<tr><th><label for="Name">Event Time</label></th><td>';
    $output .='<input type="text" name="_my_meta[authorMeta]['.$ky.'][time]" id="" value="'.$val['time'].'" size="50" /> 
     <br /><span class="description">Put event time here.</span>'; 
  $output .='</td></tr>';
   	$output .='<tr><th><label for="Title">Event Description</label></th><td>';
    $output .='<textarea name="_my_meta[authorMeta]['.$ky.'][description]" rows="10" cols="60">'.$val['description'].'</textarea><br />
    <span class="description">Put event description here.</span>';
    $output .='</td></tr>';
	$output .='<tr><th><label for="description">Event Link</label></th><td>';
    $output .='<input type="text" name="_my_meta[authorMeta]['.$ky.'][link]" id="" value="'.$val['link'].'" size="50" /> '; 
    $output .='<br/><span class="description">Put event link here.</span>';
	$output .='</td></tr>';
	$output .='<tr><td><input type="button" onClick="authorDelete(this)" class="authorDelete button-primary" value="X"></td></tr>';
   	$output .='</table>';
    $output .='<hr>';
    echo $output;
    }
   	echo '</div>';

   }
   else
   {
    echo '<div class="authorBoxwrap">';
    echo '<table id="authorBox-1" class="form-table">';
    echo '<tr><th><label for="name">Date</label></th><td>';
    echo '<input type="text" name="_my_meta[authorMeta][1][date]" id="" value="" size="50" /> 
		  <br /><span class="description">Put date here.</span>'; 
	echo '</td></tr>';
	echo '<tr><th><label for="name">Event Title</label></th><td>';
    echo '<input type="text" name="_my_meta[authorMeta][1][title]" id="" value="" size="50" /> 
		  <br /><span class="description">Put event title here.</span>'; 
	echo '</td></tr>';
	echo '<tr><th><label for="name">Event Time</label></th><td>';
    echo '<input type="text" name="_my_meta[authorMeta][1][time]" id="" value="" size="50" /> 
		  <br /><span class="description">Put event time here.</span>'; 
	echo '</td></tr>';
    echo '<tr><th><label for="title">Event Description</label></th><td>';
  	echo '<textarea name="_my_meta[authorMeta][1][description]" rows="10" cols="60"></textarea>
  	<br /><span class="description">Put event description here.</span> ';
    echo '</td></tr>';
	echo '<tr><th><label for="description">Event Link</label></th><td>';
    echo '<input type="text" name="_my_meta[authorMeta][1][link]" id="" value="" size="50" />'; 
    echo '<br/><span class="description">Put the event link here.</span>';
	echo '</td></tr>';
	echo '<tr><td><input type="button" onClick="authorDelete(this)" class="authorDelete button-primary" value="X"></td></tr>';
    echo '</table>';
    echo '<hr>';
    echo '</div>';
    } // else end
 echo '<button id="authorBoxAdd" class="button-primary">Add More</button>';
 ?>
  <script type="text/javascript">
             jQuery("button#authorBoxAdd").live('click', function(e) {
             	//e.preventdefault();
      var ingrLastID = parseInt(jQuery(".authorBoxwrap table").last().attr("id").replace("authorBox-", ""));
      var ingrNewID = parseInt(ingrLastID+1);
      //alert(ingrNewID);
      var newTable =  '\
      <table id="authorBox-'+ ingrNewID +'" class="form-table">\
       <tr>\
        <th><label for="Name">Date</label></th>\
          <td class="colIngrAmount">\
            <input type="text" name="_my_meta[authorMeta][' + ingrNewID + '][date]" value="" size="50">\
            <br /><span class="description">Put date here.</span>\
          </td>\
          </tr>\
           <tr>\
        <th><label for="Name">Event Title</label></th>\
          <td class="colIngrAmount">\
            <input type="text" name="_my_meta[authorMeta][' + ingrNewID + '][title]" value="" size="50">\
            <br /><span class="description">Put event title here.</span>\
          </td>\
          </tr>\
             <tr>\
        <th><label for="Name">Event Time</label></th>\
          <td class="colIngrAmount">\
            <input type="text" name="_my_meta[authorMeta][' + ingrNewID + '][time]" value="" size="50">\
            <br /><span class="description">Put event time here.</span>\
          </td>\
          </tr>\
        <tr>\
        <th><label for="Title">Event Description</label></th>\
          <td class="colIngrAmount">\
          <textarea name="_my_meta[authorMeta]['+ ingrNewID +'][description]" id="desc' + ingrNewID + '" rows="10" cols="60"></textarea>\
          <br /><span class="description">Put event description here.</span>\
          </td>\
          </tr>\
          <tr><th><label for="description">Event Link</label></th><td>\
          <input type="text" name="_my_meta[authorMeta][' + ingrNewID + '][link]" value="" size="50">\
          <br /><span class="description">Put event link here.</span>\
         </td></tr>\
         <tr><td>\
          <input type="button" onClick="authorDelete(this)" class="authorDelete button-primary" value="X">\
          </td>\
          </tr>\
          </table>';
         
          jQuery(".authorBoxwrap").append(newTable);
       return false;
    });
     /*
      * Remove fields
      */
     function authorDelete (obj){
          if (jQuery(".authorBoxwrap table").length < 2) {
        alert("At least one is needed!");
      }
      else {
          var delID= jQuery(obj).closest('.authorBoxwrap table').attr('id');
          //alert(delID);
          jQuery('#'+delID).remove();

     }
    } //authorDelete        
 </script>
<?php }
function save_custom_meta_data_author($post_id){
	global $wpdb;
	$old = get_post_meta($post_id, 'team_member_info', true);
	
	$wp_upload_dir = wp_upload_dir();
    $wp_upload_dir['baseurl'];
    $insrtArray= $_POST['_my_meta'];

	$new = $insrtArray;
	    if ($new && $new != $old) {  
		update_post_meta($post_id, 'team_member_info', $new); 
	    } elseif ('' == $new && $old) {  
		delete_post_meta($post_id, 'team_member_info', $old);  
	    }

}


//add_action( 'save_post', 'save_custom_meta_data_author', 10 , 2);


add_action( 'add_meta_boxes', 'adding_new_metaabox' );              
function adding_new_metaabox() {
    global $post;
   // echo $post->ID;
     if(!empty($post))
    {
      $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'tmp_homepolish.php')
        {
   


        add_meta_box('html_myid_6111_section', 'Manage Top Section Content', 'my_output_function', 'page', 'normal', 'high');
}

}
}
function my_output_function( $post ) 
    {

 global $post;
     if(!empty($post))
    {

    $top_date_text=get_post_meta (  $post->ID,'top_date_text' ,true);
    $top_subtitle_text=get_post_meta (  $post->ID,'top_subtitle_text' ,true);
    $welldesign_title_text=get_post_meta (  $post->ID,'welldesign_title_text' ,true);
   // $valueeee2=  get_post_meta($post->ID, 'SMTH_METANAME_VALUE' , true ) ;
    $welldesign_rightvertical_text=get_post_meta (  $post->ID,'welldesign_rightvertical_text' ,true);
    $welldesign_whentitle_text=get_post_meta (  $post->ID,'welldesign_whentitle_text' ,true);
    $welldesign_whencontent_text=get_post_meta (  $post->ID,'welldesign_whencontent_text' ,true);
    $welldesign_wheretitle_text=get_post_meta (  $post->ID,'welldesign_wheretitle_text' ,true);
    $welldesign_wherecontent_text=get_post_meta (  $post->ID,'welldesign_wherecontent_text' ,true);

    $event_title_text=get_post_meta (  $post->ID,'event_title_text' ,true);
    $signup_title_text=get_post_meta (  $post->ID,'signup_title_text' ,true);
     $signup_subtitle_text=get_post_meta (  $post->ID,'signup_subtitle_text' ,true);
       $signup_link_text=get_post_meta (  $post->ID,'signup_link_text' ,true);
    ?>


    <h3>Top Section Date</h3>
   <input type="text" size="90" name="top_date_text" id="top_date_text" value="<?php echo $top_date_text; ?>" />
    <h3>Top Section Subtitle</h3>
   <input type="text" size="90" name="top_subtitle_text" id="top_subtitle_text" value="<?php echo $top_subtitle_text; ?>" />
   <h3>Well Design Title</h3>
   <input type="text" size="90" name="welldesign_title_text" id="welldesign_title_text" value="<?php echo $welldesign_title_text; ?>" />
    <h3>Well Design Content</h3>
    <?php
    $abtprofilecontntval=  get_post_meta($post->ID, 'about_profile_content_meta' , true ) ;
    wp_editor( htmlspecialchars_decode($abtprofilecontntval), 'mettaabox_ID_stylee2', $settings = array('textarea_name'=>'MyInputNAME2') ); ?>
   <h3>Well Design Where Title</h3>
   <input type="text" size="90" name="welldesign_wheretitle_text" id="welldesign_wheretitle_text" value="<?php echo $welldesign_wheretitle_text; ?>" />
   <h3>Well Design Where content</h3>
   <input type="text" size="90" name="welldesign_wherecontent_text" id="welldesign_wherecontent_text" value="<?php echo $welldesign_wherecontent_text; ?>" />
    <h3>Well Design When Title</h3>
   <input type="text" size="90" name="welldesign_whentitle_text" id="welldesign_whentitle_text" value="<?php echo $welldesign_whentitle_text; ?>" />
   <h3>Well Design When content</h3>
   <input type="text" size="90" name="welldesign_whencontent_text" id="welldesign_whencontent_text" value="<?php echo $welldesign_whencontent_text; ?>" />
    <h3>Well Design Right Vertical Text</h3>
   <input type="text" size="90" name="welldesign_rightvertical_text" id="welldesign_rightvertical_text" value="<?php echo $welldesign_rightvertical_text; ?>" />
   <h3>Event Right Vertical Title</h3>
   <input type="text" size="90" name="event_title_text" id="event_title_text" value="<?php echo $event_title_text; ?>" />
   <h3>Sign Up Title</h3>
   <input type="text" size="90" name="signup_title_text" id="signup_title_text" value="<?php echo $signup_title_text; ?>" />
   <h3>Sign Up Subtitle</h3>
   <input type="text" size="90" name="signup_subtitle_text" id="signup_subtitle_text" value="<?php echo $signup_subtitle_text; ?>" />
      <h3>Sign Up Link</h3>
   <input type="text" size="90" name="signup_link_text" id="signup_link_text" value="<?php echo $signup_link_text; ?>" />
<?php    }
}
function save_my_postdata( $post_id ) 
{                   
    if (!empty($_POST['MyInputNAME2']))
        {
        $datta2=htmlspecialchars($_POST['MyInputNAME2']);
        update_post_meta($post_id, 'about_profile_content_meta', $datta2 );
        }
          elseif(empty($_POST['MyInputNAME2'])){
                delete_post_meta( $post_id, 'about_profile_content_meta','');
        }

        ////////////////////////////////////////

          $top_date_text_old=get_post_meta (  $post_id,'top_date_text' ,true);
     $top_date_text = $_POST['top_date_text'];
     
    if( $top_date_text || $top_date_text_old != $top_date_text  )  {
        update_post_meta( $post_id, 'top_date_text', $top_date_text);
    }
    elseif( empty($top_date_text) || empty($top_date_text_old)){

      delete_post_meta( $post_id, 'top_date_text','');
    } 

    /////////////////////////////////////////////

    $top_subtitle_text_old=get_post_meta (  $post_id,'top_subtitle_text' ,true);
     $top_subtitle_text = $_POST['top_subtitle_text'];
     
    if( $top_subtitle_text || $top_subtitle_text_old != $top_subtitle_text  )  {
        update_post_meta( $post_id, 'top_subtitle_text', $top_subtitle_text);
    }
    elseif( empty($top_subtitle_text) || empty($top_subtitle_text_old)){

      delete_post_meta( $post_id, 'top_subtitle_text','');
    } 

    ////////////////////////////////////////

      $welldesign_title_text_old=get_post_meta (  $post_id,'welldesign_title_text' ,true);
     $welldesign_title_text = $_POST['welldesign_title_text'];
     
    if( $welldesign_title_text || $welldesign_title_text_old != $welldesign_title_text  )  {
        update_post_meta( $post_id, 'welldesign_title_text', $welldesign_title_text);
    }
    elseif( empty($welldesign_title_text) || empty($welldesign_title_text_old)){

      delete_post_meta( $post_id, 'welldesign_title_text','');
    } 

    ////////////////////////////////////////

      $welldesign_rightvertical_text_old=get_post_meta (  $post_id,'welldesign_rightvertical_text' ,true);
     $welldesign_rightvertical_text = $_POST['welldesign_rightvertical_text'];
     
    if( $welldesign_rightvertical_text || $welldesign_rightvertical_text_old != $welldesign_rightvertical_text  )  {
        update_post_meta( $post_id, 'welldesign_rightvertical_text', $welldesign_rightvertical_text);
    }
    elseif( empty($welldesign_rightvertical_text) || empty($welldesign_rightvertical_text_old)){

      delete_post_meta( $post_id, 'welldesign_rightvertical_text','');
    } 

    ////////////////////////////////////////

      $event_title_text_old=get_post_meta (  $post_id,'event_title_text' ,true);
     $event_title_text = $_POST['event_title_text'];
     
    if( $event_title_text || $event_title_text_old != $event_title_text  )  {
        update_post_meta( $post_id, 'event_title_text', $event_title_text);
    }
    elseif( empty($event_title_text) || empty($event_title_text_old)){

      delete_post_meta( $post_id, 'event_title_text','');
    } 

    ////////////////////////////////////////

      $signup_title_text_old=get_post_meta (  $post_id,'signup_title_text' ,true);
     $signup_title_text = $_POST['signup_title_text'];
     
    if( $signup_title_text || $signup_title_text_old != $signup_title_text  )  {
        update_post_meta( $post_id, 'signup_title_text', $signup_title_text);
    }
    elseif( empty($signup_title_text) || empty($signup_title_text_old)){

      delete_post_meta( $post_id, 'signup_title_text','');
    } 

    ////////////////////////////////////////

      $signup_subtitle_text_old=get_post_meta (  $post_id,'signup_subtitle_text' ,true);
     $signup_subtitle_text = $_POST['signup_subtitle_text'];
     
    if( $signup_subtitle_text || $signup_subtitle_text_old != $signup_subtitle_text  )  {
        update_post_meta( $post_id, 'signup_subtitle_text', $signup_subtitle_text);
    }
    elseif( empty($signup_subtitle_text) || empty($signup_subtitle_text_old)){

      delete_post_meta( $post_id, 'signup_subtitle_text','');
    } 

    ////////////////////////////////////////

      $welldesign_whentitle_text_old=get_post_meta (  $post_id,'welldesign_whentitle_text' ,true);
     $welldesign_whentitle_text = $_POST['welldesign_whentitle_text'];
     
    if( $welldesign_whentitle_text || $welldesign_whentitle_text_old != $welldesign_whentitle_text  )  {
        update_post_meta( $post_id, 'welldesign_whentitle_text', $welldesign_whentitle_text);
    }
    elseif( empty($welldesign_whentitle_text) || empty($welldesign_whentitle_text_old)){

      delete_post_meta( $post_id, 'welldesign_whentitle_text','');
    } 


    ////////////////////////////////////////

      $welldesign_whencontent_text_old=get_post_meta (  $post_id,'welldesign_whencontent_text' ,true);
     $welldesign_whencontent_text = $_POST['welldesign_whencontent_text'];
     
    if( $welldesign_whencontent_text || $welldesign_whentitle_text_old != $welldesign_whencontent_text  )  {
        update_post_meta( $post_id, 'welldesign_whencontent_text', $welldesign_whencontent_text);
    }
    elseif( empty($welldesign_whencontent_text) || empty($welldesign_whencontent_text_old)){

      delete_post_meta( $post_id, 'welldesign_whencontent_text','');
    }


    ////////////////////////////////////////

      $welldesign_wheretitle_text_old=get_post_meta (  $post_id,'welldesign_wheretitle_text' ,true);
     $welldesign_wheretitle_text = $_POST['welldesign_wheretitle_text'];
     
    if( $welldesign_wheretitle_text || $welldesign_wheretitle_text_old != $welldesign_wheretitle_text  )  {
        update_post_meta( $post_id, 'welldesign_wheretitle_text', $welldesign_wheretitle_text);
    }
    elseif( empty($welldesign_wheretitle_text) || empty($welldesign_wheretitle_text_old)){

      delete_post_meta( $post_id, 'welldesign_wheretitle_text','');
    } 

    
    ////////////////////////////////////////

      $welldesign_wherecontent_text_old=get_post_meta (  $post_id,'welldesign_wherecontent_text' ,true);
     $welldesign_wherecontent_text = $_POST['welldesign_wherecontent_text'];
     
    if( $welldesign_wherecontent_text || $welldesign_wherecontent_text_old != $welldesign_wherecontent_text  )  {
        update_post_meta( $post_id, 'welldesign_wherecontent_text', $welldesign_wherecontent_text);
    }
    elseif( empty($welldesign_wherecontent_text) || empty($welldesign_wherecontent_text_old)){

      delete_post_meta( $post_id, 'welldesign_wherecontent_text','');
    }

    ////////////////////////////////////////

      $signup_link_text_old=get_post_meta (  $post_id,'signup_link_text' ,true);
     $signup_link_text = $_POST['signup_link_text'];
     
    if( $signup_link_text || $signup_link_text_old != $signup_link_text  )  {
        update_post_meta( $post_id, 'signup_link_text', $signup_link_text);
    }
    elseif( empty($signup_link_text) || empty($signup_link_text_old)){

      delete_post_meta( $post_id, 'signup_link_text','');
    }
}
add_action( 'save_post', 'save_my_postdata' ); 

 function my_enqueue1() {
  global $post;
  $_GET['post'];
        $pageTemplate = get_post_meta($_GET['post'], '_wp_page_template', true);
        if($pageTemplate == 'tmp_homepolish.php')
        	{
        	wp_register_style( 'hadmin_css', get_template_directory_uri() . '/css/hadmin.css', false, '1.0.0' );
       wp_enqueue_style( 'hadmin_css' );
        }
       }
add_action( 'admin_enqueue_scripts', 'my_enqueue1' );
?>