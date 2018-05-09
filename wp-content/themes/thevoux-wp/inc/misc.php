<?php
/* Title Tag */
function thb_theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'thb_theme_slug_setup' );

/* Editor Style */
function thb_add_editor_styles() {
    // $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lora:300,400,400italic,500,600,700' );
    // add_editor_style( array($font_url, 'assets/css/editor-style.css') );
}
add_action( 'after_setup_theme', 'thb_add_editor_styles' );

/* Required Settings */
if(!isset($content_width)) $content_width = 1170;
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

/* Remove Unwanted Tags */
function thb_remove_invalid_tags($str, $tags) 
{
    foreach($tags as $tag)
    {
    	$str = preg_replace('#^<\/'.$tag.'>|<'.$tag.'>$#', '', $str);
    }

    return $str;
}

/* Category Rel Fix */
function thb_remove_category_list_rel( $output ) {
    return str_replace( ' rel="category tag"', '', $output );
}
 
add_filter( 'wp_list_categories', 'thb_remove_category_list_rel' );
add_filter( 'the_category', 'thb_remove_category_list_rel' );

/* Editor Styling */
add_editor_style();



/* Youtube & Vimeo Embeds */
function thb_remove_youtube_controls($code){
    if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false || strpos($code, 'player.vimeo.com') !== false){
        $return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&modestbranding=1&controls=0", $code);
        
        $return = '<div class="flex-video widescreen'.(strpos($code, 'player.vimeo.com') !== false ? ' vimeo' : ' youtube').'">'.$return.'</div>';
    } else if(strpos($code, 'twitter.com') || strpos($code, 'instagram.com')) {
    		 $return = $code;
    } else {
        $return = '<div class="flex-video widescreen video-others">'.$code.'</div>';
    }
    return $return;
}
 
add_filter('embed_handler_html', 'thb_remove_youtube_controls');
add_filter('embed_oembed_html', 'thb_remove_youtube_controls');

/* Handheld Device Images */
function thb_handhelded_devices() {

	$icon_link = '<link rel="apple-touch-icon"%2$s href="%1$s">';

	$old_iphone_icon = ot_get_option('handheld_old_iphone');
	if ( $old_iphone_icon ) {
		printf( $icon_link, esc_url( $old_iphone_icon ), '' );
	}

	$old_ipad_icon = ot_get_option('handheld_old_ipad');
	if ( $old_ipad_icon ) {
		printf( $icon_link, esc_url( $old_ipad_icon ), ' sizes="76x76"' );
	}

	$retina_iphone_icon = ot_get_option('handheld_retina_iphone');
	if ( $retina_iphone_icon ) {
		printf( $icon_link, esc_url( $retina_iphone_icon ), ' sizes="120x120"' );
	}

	$retina_ipad_icon = ot_get_option('handheld_retina_ipad');
	if ( $retina_ipad_icon ) {
		printf( $icon_link, esc_url( $retina_ipad_icon ), ' sizes="152x152"' );
	}

}

add_action( 'thb_handhelded_devices', 'thb_handhelded_devices',3 );

/* Remove Version From CSS & JS Files */
// function thb_remove_script_version( $src ){
// 	return remove_query_arg( 'ver', $src );
// }

// add_filter( 'script_loader_src', 'thb_remove_script_version' );
// add_filter( 'style_loader_src', 'thb_remove_script_version' );

/* Author FB, TW & G+ Links */
function thb_my_new_contactmethods( $contactmethods ) {
// Add Position
$contactmethods['position'] = 'Position';
// Add Twitter
$contactmethods['twitter'] = 'Twitter URL';
// Add Facebook
$contactmethods['facebook'] = 'Facebook URL';
// Add Google+
$contactmethods['googleplus'] = 'Google Plus URL';

return $contactmethods;
}
add_filter('user_contactmethods','thb_my_new_contactmethods',10,1);

/* Font Awesome Array */
function thb_getIconArray(){
	$icons = array(
		'' => '',
		'fa-glass' => 'fa-glass',
		'fa-music' => 'fa-music',
		'fa-search' => 'fa-search',
		'fa-envelope-o' => 'fa-envelope-o',
		'fa-heart' => 'fa-heart',
		'fa-star' => 'fa-star',
		'fa-star-o' => 'fa-star-o',
		'fa-user' => 'fa-user',
		'fa-film' => 'fa-film',
		'fa-th-large' => 'fa-th-large',
		'fa-th' => 'fa-th',
		'fa-th-list' => 'fa-th-list',
		'fa-check' => 'fa-check',
		'fa-times' => 'fa-times',
		'fa-search-plus' => 'fa-search-plus',
		'fa-search-minus' => 'fa-search-minus',
		'fa-power-off' => 'fa-power-off',
		'fa-signal' => 'fa-signal',
		'fa-cog' => 'fa-cog',
		'fa-trash-o' => 'fa-trash-o',
		'fa-home' => 'fa-home',
		'fa-file-o' => 'fa-file-o',
		'fa-clock-o' => 'fa-clock-o',
		'fa-road' => 'fa-road',
		'fa-download' => 'fa-download',
		'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down',
		'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up',
		'fa-inbox' => 'fa-inbox',
		'fa-play-circle-o' => 'fa-play-circle-o',
		'fa-repeat' => 'fa-repeat',
		'fa-refresh' => 'fa-refresh',
		'fa-list-alt' => 'fa-list-alt',
		'fa-lock' => 'fa-lock',
		'fa-flag' => 'fa-flag',
		'fa-headphones' => 'fa-headphones',
		'fa-volume-off' => 'fa-volume-off',
		'fa-volume-down' => 'fa-volume-down',
		'fa-volume-up' => 'fa-volume-up',
		'fa-qrcode' => 'fa-qrcode',
		'fa-barcode' => 'fa-barcode',
		'fa-tag' => 'fa-tag',
		'fa-tags' => 'fa-tags',
		'fa-book' => 'fa-book',
		'fa-bookmark' => 'fa-bookmark',
		'fa-print' => 'fa-print',
		'fa-camera' => 'fa-camera',
		'fa-font' => 'fa-font',
		'fa-bold' => 'fa-bold',
		'fa-italic' => 'fa-italic',
		'fa-text-height' => 'fa-text-height',
		'fa-text-width' => 'fa-text-width',
		'fa-align-left' => 'fa-align-left',
		'fa-align-center' => 'fa-align-center',
		'fa-align-right' => 'fa-align-right',
		'fa-align-justify' => 'fa-align-justify',
		'fa-list' => 'fa-list',
		'fa-outdent' => 'fa-outdent',
		'fa-indent' => 'fa-indent',
		'fa-video-camera' => 'fa-video-camera',
		'fa-picture-o' => 'fa-picture-o',
		'fa-pencil' => 'fa-pencil',
		'fa-map-marker' => 'fa-map-marker',
		'fa-adjust' => 'fa-adjust',
		'fa-tint' => 'fa-tint',
		'fa-pencil-square-o' => 'fa-pencil-square-o',
		'fa-share-square-o' => 'fa-share-square-o',
		'fa-check-square-o' => 'fa-check-square-o',
		'fa-arrows' => 'fa-arrows',
		'fa-step-backward' => 'fa-step-backward',
		'fa-fast-backward' => 'fa-fast-backward',
		'fa-backward' => 'fa-backward',
		'fa-play' => 'fa-play',
		'fa-pause' => 'fa-pause',
		'fa-stop' => 'fa-stop',
		'fa-forward' => 'fa-forward',
		'fa-fast-forward' => 'fa-fast-forward',
		'fa-step-forward' => 'fa-step-forward',
		'fa-eject' => 'fa-eject',
		'fa-chevron-left' => 'fa-chevron-left',
		'fa-chevron-right' => 'fa-chevron-right',
		'fa-plus-circle' => 'fa-plus-circle',
		'fa-minus-circle' => 'fa-minus-circle',
		'fa-times-circle' => 'fa-times-circle',
		'fa-check-circle' => 'fa-check-circle',
		'fa-question-circle' => 'fa-question-circle',
		'fa-info-circle' => 'fa-info-circle',
		'fa-crosshairs' => 'fa-crosshairs',
		'fa-times-circle-o' => 'fa-times-circle-o',
		'fa-check-circle-o' => 'fa-check-circle-o',
		'fa-ban' => 'fa-ban',
		'fa-arrow-left' => 'fa-arrow-left',
		'fa-arrow-right' => 'fa-arrow-right',
		'fa-arrow-up' => 'fa-arrow-up',
		'fa-arrow-down' => 'fa-arrow-down',
		'fa-share' => 'fa-share',
		'fa-expand' => 'fa-expand',
		'fa-compress' => 'fa-compress',
		'fa-plus' => 'fa-plus',
		'fa-minus' => 'fa-minus',
		'fa-asterisk' => 'fa-asterisk',
		'fa-exclamation-circle' => 'fa-exclamation-circle',
		'fa-gift' => 'fa-gift',
		'fa-leaf' => 'fa-leaf',
		'fa-fire' => 'fa-fire',
		'fa-eye' => 'fa-eye',
		'fa-eye-slash' => 'fa-eye-slash',
		'fa-exclamation-triangle' => 'fa-exclamation-triangle',
		'fa-plane' => 'fa-plane',
		'fa-calendar' => 'fa-calendar',
		'fa-random' => 'fa-random',
		'fa-comment' => 'fa-comment',
		'fa-magnet' => 'fa-magnet',
		'fa-chevron-up' => 'fa-chevron-up',
		'fa-chevron-down' => 'fa-chevron-down',
		'fa-retweet' => 'fa-retweet',
		'fa-shopping-cart' => 'fa-shopping-cart',
		'fa-folder' => 'fa-folder',
		'fa-folder-open' => 'fa-folder-open',
		'fa-arrows-v' => 'fa-arrows-v',
		'fa-arrows-h' => 'fa-arrows-h',
		'fa-bar-chart' => 'fa-bar-chart',
		'fa-twitter-square' => 'fa-twitter-square',
		'fa-facebook-square' => 'fa-facebook-square',
		'fa-camera-retro' => 'fa-camera-retro',
		'fa-key' => 'fa-key',
		'fa-cogs' => 'fa-cogs',
		'fa-comments' => 'fa-comments',
		'fa-thumbs-o-up' => 'fa-thumbs-o-up',
		'fa-thumbs-o-down' => 'fa-thumbs-o-down',
		'fa-star-half' => 'fa-star-half',
		'fa-heart-o' => 'fa-heart-o',
		'fa-sign-out' => 'fa-sign-out',
		'fa-linkedin-square' => 'fa-linkedin-square',
		'fa-thumb-tack' => 'fa-thumb-tack',
		'fa-external-link' => 'fa-external-link',
		'fa-sign-in' => 'fa-sign-in',
		'fa-trophy' => 'fa-trophy',
		'fa-github-square' => 'fa-github-square',
		'fa-upload' => 'fa-upload',
		'fa-lemon-o' => 'fa-lemon-o',
		'fa-phone' => 'fa-phone',
		'fa-square-o' => 'fa-square-o',
		'fa-bookmark-o' => 'fa-bookmark-o',
		'fa-phone-square' => 'fa-phone-square',
		'fa-twitter' => 'fa-twitter',
		'fa-facebook' => 'fa-facebook',
		'fa-github' => 'fa-github',
		'fa-unlock' => 'fa-unlock',
		'fa-credit-card' => 'fa-credit-card',
		'fa-rss' => 'fa-rss',
		'fa-hdd-o' => 'fa-hdd-o',
		'fa-bullhorn' => 'fa-bullhorn',
		'fa-bell' => 'fa-bell',
		'fa-certificate' => 'fa-certificate',
		'fa-hand-o-right' => 'fa-hand-o-right',
		'fa-hand-o-left' => 'fa-hand-o-left',
		'fa-hand-o-up' => 'fa-hand-o-up',
		'fa-hand-o-down' => 'fa-hand-o-down',
		'fa-arrow-circle-left' => 'fa-arrow-circle-left',
		'fa-arrow-circle-right' => 'fa-arrow-circle-right',
		'fa-arrow-circle-up' => 'fa-arrow-circle-up',
		'fa-arrow-circle-down' => 'fa-arrow-circle-down',
		'fa-globe' => 'fa-globe',
		'fa-wrench' => 'fa-wrench',
		'fa-tasks' => 'fa-tasks',
		'fa-filter' => 'fa-filter',
		'fa-briefcase' => 'fa-briefcase',
		'fa-arrows-alt' => 'fa-arrows-alt',
		'fa-users' => 'fa-users',
		'fa-link' => 'fa-link',
		'fa-cloud' => 'fa-cloud',
		'fa-flask' => 'fa-flask',
		'fa-scissors' => 'fa-scissors',
		'fa-files-o' => 'fa-files-o',
		'fa-paperclip' => 'fa-paperclip',
		'fa-floppy-o' => 'fa-floppy-o',
		'fa-square' => 'fa-square',
		'fa-bars' => 'fa-bars',
		'fa-list-ul' => 'fa-list-ul',
		'fa-list-ol' => 'fa-list-ol',
		'fa-strikethrough' => 'fa-strikethrough',
		'fa-underline' => 'fa-underline',
		'fa-table' => 'fa-table',
		'fa-magic' => 'fa-magic',
		'fa-truck' => 'fa-truck',
		'fa-pinterest' => 'fa-pinterest',
		'fa-pinterest-square' => 'fa-pinterest-square',
		'fa-google-plus-square' => 'fa-google-plus-square',
		'fa-google-plus' => 'fa-google-plus',
		'fa-money' => 'fa-money',
		'fa-caret-down' => 'fa-caret-down',
		'fa-caret-up' => 'fa-caret-up',
		'fa-caret-left' => 'fa-caret-left',
		'fa-caret-right' => 'fa-caret-right',
		'fa-columns' => 'fa-columns',
		'fa-sort' => 'fa-sort',
		'fa-sort-desc' => 'fa-sort-desc',
		'fa-sort-asc' => 'fa-sort-asc',
		'fa-envelope' => 'fa-envelope',
		'fa-linkedin' => 'fa-linkedin',
		'fa-undo' => 'fa-undo',
		'fa-gavel' => 'fa-gavel',
		'fa-tachometer' => 'fa-tachometer',
		'fa-comment-o' => 'fa-comment-o',
		'fa-comments-o' => 'fa-comments-o',
		'fa-bolt' => 'fa-bolt',
		'fa-sitemap' => 'fa-sitemap',
		'fa-umbrella' => 'fa-umbrella',
		'fa-clipboard' => 'fa-clipboard',
		'fa-lightbulb-o' => 'fa-lightbulb-o',
		'fa-exchange' => 'fa-exchange',
		'fa-cloud-download' => 'fa-cloud-download',
		'fa-cloud-upload' => 'fa-cloud-upload',
		'fa-user-md' => 'fa-user-md',
		'fa-stethoscope' => 'fa-stethoscope',
		'fa-suitcase' => 'fa-suitcase',
		'fa-bell-o' => 'fa-bell-o',
		'fa-coffee' => 'fa-coffee',
		'fa-cutlery' => 'fa-cutlery',
		'fa-file-text-o' => 'fa-file-text-o',
		'fa-building-o' => 'fa-building-o',
		'fa-hospital-o' => 'fa-hospital-o',
		'fa-ambulance' => 'fa-ambulance',
		'fa-medkit' => 'fa-medkit',
		'fa-fighter-jet' => 'fa-fighter-jet',
		'fa-beer' => 'fa-beer',
		'fa-h-square' => 'fa-h-square',
		'fa-plus-square' => 'fa-plus-square',
		'fa-angle-double-left' => 'fa-angle-double-left',
		'fa-angle-double-right' => 'fa-angle-double-right',
		'fa-angle-double-up' => 'fa-angle-double-up',
		'fa-angle-double-down' => 'fa-angle-double-down',
		'fa-angle-left' => 'fa-angle-left',
		'fa-angle-right' => 'fa-angle-right',
		'fa-angle-up' => 'fa-angle-up',
		'fa-angle-down' => 'fa-angle-down',
		'fa-desktop' => 'fa-desktop',
		'fa-laptop' => 'fa-laptop',
		'fa-tablet' => 'fa-tablet',
		'fa-mobile' => 'fa-mobile',
		'fa-circle-o' => 'fa-circle-o',
		'fa-quote-left' => 'fa-quote-left',
		'fa-quote-right' => 'fa-quote-right',
		'fa-spinner' => 'fa-spinner',
		'fa-circle' => 'fa-circle',
		'fa-reply' => 'fa-reply',
		'fa-github-alt' => 'fa-github-alt',
		'fa-folder-o' => 'fa-folder-o',
		'fa-folder-open-o' => 'fa-folder-open-o',
		'fa-smile-o' => 'fa-smile-o',
		'fa-frown-o' => 'fa-frown-o',
		'fa-meh-o' => 'fa-meh-o',
		'fa-gamepad' => 'fa-gamepad',
		'fa-keyboard-o' => 'fa-keyboard-o',
		'fa-flag-o' => 'fa-flag-o',
		'fa-flag-checkered' => 'fa-flag-checkered',
		'fa-terminal' => 'fa-terminal',
		'fa-code' => 'fa-code',
		'fa-reply-all' => 'fa-reply-all',
		'fa-star-half-o' => 'fa-star-half-o',
		'fa-location-arrow' => 'fa-location-arrow',
		'fa-crop' => 'fa-crop',
		'fa-code-fork' => 'fa-code-fork',
		'fa-chain-broken' => 'fa-chain-broken',
		'fa-question' => 'fa-question',
		'fa-info' => 'fa-info',
		'fa-exclamation' => 'fa-exclamation',
		'fa-superscript' => 'fa-superscript',
		'fa-subscript' => 'fa-subscript',
		'fa-eraser' => 'fa-eraser',
		'fa-puzzle-piece' => 'fa-puzzle-piece',
		'fa-microphone' => 'fa-microphone',
		'fa-microphone-slash' => 'fa-microphone-slash',
		'fa-shield' => 'fa-shield',
		'fa-calendar-o' => 'fa-calendar-o',
		'fa-fire-extinguisher' => 'fa-fire-extinguisher',
		'fa-rocket' => 'fa-rocket',
		'fa-maxcdn' => 'fa-maxcdn',
		'fa-chevron-circle-left' => 'fa-chevron-circle-left',
		'fa-chevron-circle-right' => 'fa-chevron-circle-right',
		'fa-chevron-circle-up' => 'fa-chevron-circle-up',
		'fa-chevron-circle-down' => 'fa-chevron-circle-down',
		'fa-html5' => 'fa-html5',
		'fa-css3' => 'fa-css3',
		'fa-anchor' => 'fa-anchor',
		'fa-unlock-alt' => 'fa-unlock-alt',
		'fa-bullseye' => 'fa-bullseye',
		'fa-ellipsis-h' => 'fa-ellipsis-h',
		'fa-ellipsis-v' => 'fa-ellipsis-v',
		'fa-rss-square' => 'fa-rss-square',
		'fa-play-circle' => 'fa-play-circle',
		'fa-ticket' => 'fa-ticket',
		'fa-minus-square' => 'fa-minus-square',
		'fa-minus-square-o' => 'fa-minus-square-o',
		'fa-level-up' => 'fa-level-up',
		'fa-level-down' => 'fa-level-down',
		'fa-check-square' => 'fa-check-square',
		'fa-pencil-square' => 'fa-pencil-square',
		'fa-external-link-square' => 'fa-external-link-square',
		'fa-share-square' => 'fa-share-square',
		'fa-compass' => 'fa-compass',
		'fa-caret-square-o-down' => 'fa-caret-square-o-down',
		'fa-caret-square-o-up' => 'fa-caret-square-o-up',
		'fa-caret-square-o-right' => 'fa-caret-square-o-right',
		'fa-eur' => 'fa-eur',
		'fa-gbp' => 'fa-gbp',
		'fa-usd' => 'fa-usd',
		'fa-inr' => 'fa-inr',
		'fa-jpy' => 'fa-jpy',
		'fa-rub' => 'fa-rub',
		'fa-krw' => 'fa-krw',
		'fa-btc' => 'fa-btc',
		'fa-file' => 'fa-file',
		'fa-file-text' => 'fa-file-text',
		'fa-sort-alpha-asc' => 'fa-sort-alpha-asc',
		'fa-sort-alpha-desc' => 'fa-sort-alpha-desc',
		'fa-sort-amount-asc' => 'fa-sort-amount-asc',
		'fa-sort-amount-desc' => 'fa-sort-amount-desc',
		'fa-sort-numeric-asc' => 'fa-sort-numeric-asc',
		'fa-sort-numeric-desc' => 'fa-sort-numeric-desc',
		'fa-thumbs-up' => 'fa-thumbs-up',
		'fa-thumbs-down' => 'fa-thumbs-down',
		'fa-youtube-square' => 'fa-youtube-square',
		'fa-youtube' => 'fa-youtube',
		'fa-xing' => 'fa-xing',
		'fa-xing-square' => 'fa-xing-square',
		'fa-youtube-play' => 'fa-youtube-play',
		'fa-dropbox' => 'fa-dropbox',
		'fa-stack-overflow' => 'fa-stack-overflow',
		'fa-instagram' => 'fa-instagram',
		'fa-flickr' => 'fa-flickr',
		'fa-adn' => 'fa-adn',
		'fa-bitbucket' => 'fa-bitbucket',
		'fa-bitbucket-square' => 'fa-bitbucket-square',
		'fa-tumblr' => 'fa-tumblr',
		'fa-tumblr-square' => 'fa-tumblr-square',
		'fa-long-arrow-down' => 'fa-long-arrow-down',
		'fa-long-arrow-up' => 'fa-long-arrow-up',
		'fa-long-arrow-left' => 'fa-long-arrow-left',
		'fa-long-arrow-right' => 'fa-long-arrow-right',
		'fa-apple' => 'fa-apple',
		'fa-windows' => 'fa-windows',
		'fa-android' => 'fa-android',
		'fa-linux' => 'fa-linux',
		'fa-dribbble' => 'fa-dribbble',
		'fa-skype' => 'fa-skype',
		'fa-foursquare' => 'fa-foursquare',
		'fa-trello' => 'fa-trello',
		'fa-female' => 'fa-female',
		'fa-male' => 'fa-male',
		'fa-gratipay' => 'fa-gratipay',
		'fa-sun-o' => 'fa-sun-o',
		'fa-moon-o' => 'fa-moon-o',
		'fa-archive' => 'fa-archive',
		'fa-bug' => 'fa-bug',
		'fa-vk' => 'fa-vk',
		'fa-weibo' => 'fa-weibo',
		'fa-renren' => 'fa-renren',
		'fa-pagelines' => 'fa-pagelines',
		'fa-stack-exchange' => 'fa-stack-exchange',
		'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right',
		'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left',
		'fa-caret-square-o-left' => 'fa-caret-square-o-left',
		'fa-dot-circle-o' => 'fa-dot-circle-o',
		'fa-wheelchair' => 'fa-wheelchair',
		'fa-vimeo-square' => 'fa-vimeo-square',
		'fa-try' => 'fa-try',
		'fa-plus-square-o' => 'fa-plus-square-o',
		'fa-space-shuttle' => 'fa-space-shuttle',
		'fa-slack' => 'fa-slack',
		'fa-envelope-square' => 'fa-envelope-square',
		'fa-wordpress' => 'fa-wordpress',
		'fa-openid' => 'fa-openid',
		'fa-university' => 'fa-university',
		'fa-graduation-cap' => 'fa-graduation-cap',
		'fa-yahoo' => 'fa-yahoo',
		'fa-google' => 'fa-google',
		'fa-reddit' => 'fa-reddit',
		'fa-reddit-square' => 'fa-reddit-square',
		'fa-stumbleupon-circle' => 'fa-stumbleupon-circle',
		'fa-stumbleupon' => 'fa-stumbleupon',
		'fa-delicious' => 'fa-delicious',
		'fa-digg' => 'fa-digg',
		'fa-pied-piper' => 'fa-pied-piper',
		'fa-pied-piper-alt' => 'fa-pied-piper-alt',
		'fa-drupal' => 'fa-drupal',
		'fa-joomla' => 'fa-joomla',
		'fa-language' => 'fa-language',
		'fa-fax' => 'fa-fax',
		'fa-building' => 'fa-building',
		'fa-child' => 'fa-child',
		'fa-paw' => 'fa-paw',
		'fa-spoon' => 'fa-spoon',
		'fa-cube' => 'fa-cube',
		'fa-cubes' => 'fa-cubes',
		'fa-behance' => 'fa-behance',
		'fa-behance-square' => 'fa-behance-square',
		'fa-steam' => 'fa-steam',
		'fa-steam-square' => 'fa-steam-square',
		'fa-recycle' => 'fa-recycle',
		'fa-car' => 'fa-car',
		'fa-taxi' => 'fa-taxi',
		'fa-tree' => 'fa-tree',
		'fa-spotify' => 'fa-spotify',
		'fa-deviantart' => 'fa-deviantart',
		'fa-soundcloud' => 'fa-soundcloud',
		'fa-database' => 'fa-database',
		'fa-file-pdf-o' => 'fa-file-pdf-o',
		'fa-file-word-o' => 'fa-file-word-o',
		'fa-file-excel-o' => 'fa-file-excel-o',
		'fa-file-powerpoint-o' => 'fa-file-powerpoint-o',
		'fa-file-image-o' => 'fa-file-image-o',
		'fa-file-archive-o' => 'fa-file-archive-o',
		'fa-file-audio-o' => 'fa-file-audio-o',
		'fa-file-video-o' => 'fa-file-video-o',
		'fa-file-code-o' => 'fa-file-code-o',
		'fa-vine' => 'fa-vine',
		'fa-codepen' => 'fa-codepen',
		'fa-jsfiddle' => 'fa-jsfiddle',
		'fa-life-ring' => 'fa-life-ring',
		'fa-circle-o-notch' => 'fa-circle-o-notch',
		'fa-rebel' => 'fa-rebel',
		'fa-empire' => 'fa-empire',
		'fa-git-square' => 'fa-git-square',
		'fa-git' => 'fa-git',
		'fa-hacker-news' => 'fa-hacker-news',
		'fa-tencent-weibo' => 'fa-tencent-weibo',
		'fa-qq' => 'fa-qq',
		'fa-weixin' => 'fa-weixin',
		'fa-paper-plane' => 'fa-paper-plane',
		'fa-paper-plane-o' => 'fa-paper-plane-o',
		'fa-history' => 'fa-history',
		'fa-circle-thin' => 'fa-circle-thin',
		'fa-header' => 'fa-header',
		'fa-paragraph' => 'fa-paragraph',
		'fa-sliders' => 'fa-sliders',
		'fa-share-alt' => 'fa-share-alt',
		'fa-share-alt-square' => 'fa-share-alt-square',
		'fa-bomb' => 'fa-bomb',
		'fa-futbol-o' => 'fa-futbol-o',
		'fa-tty' => 'fa-tty',
		'fa-binoculars' => 'fa-binoculars',
		'fa-plug' => 'fa-plug',
		'fa-slideshare' => 'fa-slideshare',
		'fa-twitch' => 'fa-twitch',
		'fa-yelp' => 'fa-yelp',
		'fa-newspaper-o' => 'fa-newspaper-o',
		'fa-wifi' => 'fa-wifi',
		'fa-calculator' => 'fa-calculator',
		'fa-paypal' => 'fa-paypal',
		'fa-google-wallet' => 'fa-google-wallet',
		'fa-cc-visa' => 'fa-cc-visa',
		'fa-cc-mastercard' => 'fa-cc-mastercard',
		'fa-cc-discover' => 'fa-cc-discover',
		'fa-cc-amex' => 'fa-cc-amex',
		'fa-cc-paypal' => 'fa-cc-paypal',
		'fa-cc-stripe' => 'fa-cc-stripe',
		'fa-bell-slash' => 'fa-bell-slash',
		'fa-bell-slash-o' => 'fa-bell-slash-o',
		'fa-trash' => 'fa-trash',
		'fa-copyright' => 'fa-copyright',
		'fa-at' => 'fa-at',
		'fa-eyedropper' => 'fa-eyedropper',
		'fa-paint-brush' => 'fa-paint-brush',
		'fa-birthday-cake' => 'fa-birthday-cake',
		'fa-area-chart' => 'fa-area-chart',
		'fa-pie-chart' => 'fa-pie-chart',
		'fa-line-chart' => 'fa-line-chart',
		'fa-lastfm' => 'fa-lastfm',
		'fa-lastfm-square' => 'fa-lastfm-square',
		'fa-toggle-off' => 'fa-toggle-off',
		'fa-toggle-on' => 'fa-toggle-on',
		'fa-bicycle' => 'fa-bicycle',
		'fa-bus' => 'fa-bus',
		'fa-ioxhost' => 'fa-ioxhost',
		'fa-angellist' => 'fa-angellist',
		'fa-cc' => 'fa-cc',
		'fa-ils' => 'fa-ils',
		'fa-meanpath' => 'fa-meanpath',
		'fa-buysellads' => 'fa-buysellads',
		'fa-connectdevelop' => 'fa-connectdevelop',
		'fa-dashcube' => 'fa-dashcube',
		'fa-forumbee' => 'fa-forumbee',
		'fa-leanpub' => 'fa-leanpub',
		'fa-sellsy' => 'fa-sellsy',
		'fa-shirtsinbulk' => 'fa-shirtsinbulk',
		'fa-simplybuilt' => 'fa-simplybuilt',
		'fa-skyatlas' => 'fa-skyatlas',
		'fa-cart-plus' => 'fa-cart-plus',
		'fa-cart-arrow-down' => 'fa-cart-arrow-down',
		'fa-diamond' => 'fa-diamond',
		'fa-ship' => 'fa-ship',
		'fa-user-secret' => 'fa-user-secret',
		'fa-motorcycle' => 'fa-motorcycle',
		'fa-street-view' => 'fa-street-view',
		'fa-heartbeat' => 'fa-heartbeat',
		'fa-venus' => 'fa-venus',
		'fa-mars' => 'fa-mars',
		'fa-mercury' => 'fa-mercury',
		'fa-transgender' => 'fa-transgender',
		'fa-transgender-alt' => 'fa-transgender-alt',
		'fa-venus-double' => 'fa-venus-double',
		'fa-mars-double' => 'fa-mars-double',
		'fa-venus-mars' => 'fa-venus-mars',
		'fa-mars-stroke' => 'fa-mars-stroke',
		'fa-mars-stroke-v' => 'fa-mars-stroke-v',
		'fa-mars-stroke-h' => 'fa-mars-stroke-h',
		'fa-neuter' => 'fa-neuter',
		'fa-facebook-official' => 'fa-facebook-official',
		'fa-pinterest-p' => 'fa-pinterest-p',
		'fa-whatsapp' => 'fa-whatsapp',
		'fa-server' => 'fa-server',
		'fa-user-plus' => 'fa-user-plus',
		'fa-user-times' => 'fa-user-times',
		'fa-bed' => 'fa-bed',
		'fa-viacoin' => 'fa-viacoin',
		'fa-train' => 'fa-train',
		'fa-subway' => 'fa-subway',
		'fa-medium' => 'fa-medium',
	);
  return $icons;
}

/**
 * Shorten large numbers into abbreviations (i.e. 1,500 = 1.5k)
 *
 * @param int    $number  Number to shorten
 * @return String   A number with a symbol
 */ 
function thb_numberAbbreviation($number) {
    $abbrevs = array(12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => "");

	if ($number > 999) {
	    foreach($abbrevs as $exponent => $abbrev) {
	        if($number >= pow(10, $exponent)) {
	        	$display_num = $number / pow(10, $exponent);
	        	$decimals = ($exponent >= 4 && round($display_num) < 100) ? 1 : 0;
	            return number_format($display_num,$decimals) . $abbrev;
	        }
	    }
	} else {
		return $number;	
	}
}
//Get Facebook Likes Count of a page
function thb_fbLikeCount($pageID) {
	
	$cache = get_transient( 'thb_page_fbcount' );
	switch (ot_get_option('sharing_cache', '1')) {
		case '1h':
			$time = 3600;
			break;
		case '1':
			$time = DAY_IN_SECONDS;
			break;
		case '7':
			$time = WEEK_IN_SECONDS;
			break;
		case '30':
			$time = DAY_IN_SECONDS * 30;
			break;
	}
	if ( empty( $cache ) ) {
		$fb_access_token = ot_get_option('fb_access_token');
		//Construct a Facebook URL
		$json_url = 'https://graph.facebook.com/'.$pageID.'?fields=likes&access_token='.$fb_access_token;

		$json = wp_remote_get($json_url);
		// Check for error
		if ( is_wp_error( $json ) ) {
			echo $error_string = $json->get_error_message();
			return;
		}
		$data = wp_remote_retrieve_body( $json );
		$json_output = json_decode($data);

	 	set_transient( 'thb_page_fbcount', $json_output->likes, $time );
	 	
		//Extract the likes count from the JSON object
		$likes = $json_output->likes ? $json_output->likes : 0;
		
	} else {
		$likes = $cache;
	}

	// EAR 4/16/18 a fake number
	echo thb_numberAbbreviation(50000);

	//echo thb_numberAbbreviation($likes);
}
add_filter( 'thb_fbLikeCount', 'thb_fbLikeCount', 99, 2 );

//Get Twitter Follower Count of a page
function thb_getTwitterFollowers() {
    $settings = array(
        'oauth_access_token' => ot_get_option('twitter_bar_accesstoken'),
        'oauth_access_token_secret' => ot_get_option('twitter_bar_accesstokensecret'),
        'consumer_key' => ot_get_option('twitter_bar_consumerkey'),
        'consumer_secret' => ot_get_option('twitter_bar_consumersecret')
    );
    $url = 'https://api.twitter.com/1.1/users/show.json';
    $requestMethod = 'GET';
    $getfield = '?screen_name='.ot_get_option('twitter_bar_username');
    
    $cache = get_transient( 'thb_page_twcount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    if ( empty( $cache ) ) {
	    $twitter = new thb_TwitterAPIExchange($settings);
	    $twitter_data = json_decode($twitter->setGetfield($getfield)
	                 ->buildOauth($url, $requestMethod)
	                 ->performRequest());
      $followers = $twitter_data->followers_count;
        
        set_transient( 'thb_page_twcount', $followers, $time );
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_twFollowerCount', 'thb_getTwitterFollowers', 99, 1 );

//Get Instagram Follower Count
function thb_getInstagramFollowers() {
    $id = ot_get_option('instagram_id');
    $api_key = ot_get_option('instagram_accesstoken');
    
    $cache = get_transient( 'thb_page_inscount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    
    if ( empty( $cache ) ) {
	    $request = @wp_remote_get( 'https://api.instagram.com/v1/users/' . $id . '?access_token=' . $api_key );


      $response = json_decode( @wp_remote_retrieve_body( $request ) );

      if (( $request == false ) || ( isset($response->meta->error_type))) {
        $followers = "1.1M"; // default counter text
      }

      if ( isset( $response->data ) && isset( $response->data->counts ) && isset( $response->data->counts->followed_by ) ) {
      	
      	$followers = $response->data->counts->followed_by;
        set_transient( 'thb_page_inscount', $followers, $time );
      }
        
        
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_insFollowerCount', 'thb_getInstagramFollowers', 99, 1 );

//Get Pinterest Follower Count
function thb_getPinterestFollowers() {
    $id = "homepolish";

    $cache = get_transient( 'thb_page_pincount' );

    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
				$time = 3600;
				break;
    	case '1':
				$time = DAY_IN_SECONDS;
				break;
    	case '7':
				$time = WEEK_IN_SECONDS;
				break;
    	case '30':
				$time = DAY_IN_SECONDS * 30;
				break;
    }

    if ( empty( $cache ) ) {
			$metas = @get_meta_tags( 'http://pinterest.com/' . $id );

      if ( false == $metas ) {
        return null;
      }

      $response = json_decode( @wp_remote_retrieve_body( $request ) );

      if ( isset( $metas ) && isset( $metas['pinterestapp:followers'] ) ) {
      	$followers = $metas['pinterestapp:followers'];
        set_transient( 'thb_page_pincount', $followers, $time );
      }

    } else {
			$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_pinFollowerCount', 'thb_getPinterestFollowers', 99, 1 );

//Get Google+ Follower Count
function thb_getGplusFollowers() {
    $id = ot_get_option('gp_username');
    $apikey = ot_get_option('gp_apikey');
    
    $cache = get_transient( 'thb_page_gpcount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    if ( empty( $cache ) ) {
	    $request = file_get_contents( 'https://www.googleapis.com/plus/v1/people/' . $id . '?key=' . $apikey );

      if ( false == $request ) {
      	$followers = '0';
        return null;
      }
  
      $response = json_decode( $request );

      if ( isset( $response->circledByCount ) ) {
      	
      	$followers = $response->circledByCount;
        set_transient( 'thb_page_gpcount', $followers, $time );
      }
        
        
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_gpFollowerCount', 'thb_getGplusFollowers', 99, 1 );

/* Social */
function thb_fb_information() {
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
	
	if (in_array('facebook',$sharing_type) && is_single()) {
		$image_id = get_post_thumbnail_id();
	  $image_link = wp_get_attachment_image_src($image_id,'full');

		$image = aq_resize( $image_link[0], 200, 200, true, false, true);
		?>
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
		<meta property="og:image" content="<?php echo $image[0]; ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<?php
	}
}
add_action( 'thb_fb_information', 'thb_fb_information',3 );

/* Social */
function thb_author($id) {
	$id = $id ? $id : get_the_author_meta( 'ID' );
	?>
	<?php echo get_avatar( $id , '164'); ?>
	<div class="author-content">
		<h1><a href="<?php echo get_author_posts_url( $id ); ?>"><?php the_author_meta('display_name', $id ); ?></a></h1>
		<?php if(get_the_author_meta('position', $id) != '') { ?>
			<h4><?php echo get_the_author_meta('position', $id ); ?></h4>
		<?php } ?>
		<p><?php the_author_meta('description', $id ); ?></p>
		<?php if(get_the_author_meta('url', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('url', $id ); ?>" class="boxed-icon fill"><i class="fa fa-link"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('twitter', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('twitter', $id ); ?>" class="boxed-icon fill twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('facebook', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('facebook', $id ); ?>" class="boxed-icon fill facebook"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('googleplus', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('googleplus', $id ); ?>" class="boxed-icon fill google-plus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
	</div>
	<?php
}
add_action( 'thb_author', 'thb_author',3 );

function thb_is_gallery() {
	$format = get_post_format();
	
	if ($format == 'gallery') {
		echo 'has-gallery';
	} else {
		return false;
	}
}
add_action( 'thb_is_gallery', 'thb_is_gallery', 1 );

function thb_social_article_totalshares($id) {
	$id = $id ? $id : get_the_ID();
	
	$total = get_post_meta($id, 'thb_pssc_counts', true);
	
	return thb_numberAbbreviation($total);
}
add_action( 'thb_social_article_totalshares', 'thb_social_article_totalshares',3 );

function facebook_share_link($permalink) {
	return 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).'';
}
add_action( 'facebook_share_link', 'facebook_share_link',3 );

function twitter_share_link($permalink, $title) {
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');

	return 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . '';
}
add_action( 'twitter_share_link', 'twitter_share_link',3 );

function pinterest_share_link($permalink, $image) {
	return 'http://pinterest.com/pin/create/button/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '';
}
add_action( 'pinterest_share_link', 'pinterest_share_link',3 );

function thb_social_article($id) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
 ?>
 	<?php if (!empty($sharing_type)) { ?>
		<?php if (in_array('facebook',$sharing_type)) { ?>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon social fill facebook"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if (in_array('twitter',$sharing_type)) { ?>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon social fill twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if (in_array('google-plus',$sharing_type)) { ?>
		<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon social fill google-plus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
		<?php if (in_array('pinterest',$sharing_type)) { ?>
		<a href="<?php echo 'http://pinterest.com/pin/create/button/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . ''; ?>" class="boxed-icon social fill pinterest"><i class="fa fa-pinterest"></i></a>
		<?php } ?>
	<?php } ?>
<?php
}
add_action( 'thb_social_article', 'thb_social_article', 3 );

// Can take a particular image (pinterest), otherwise defaults to featured image for post
function thb_social_article_detail($id = false, $description = "", $fixed = false, $class = false, $image = false, $count_shares = true) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = $image ? $image : wp_get_attachment_image_src($image_id,'full');
	$image_dimensions = hmpl_get_image_dim($image);
	$share_image = aq_resize( $image[0], $image_dimensions['desktop_dim'][0], $image_dimensions['desktop_dim'][1], true, false, true );
	$twitter_user = ot_get_option('twitter_bar_username', 'homepolish');

	// We need to call all of the shares here to get an accurate popular sort [FUTURE] May cause performance issues
	if($count_shares) {
		$pinterest_share_count = pssc_pinterest();
		pssc_all($id);
	}
 ?>

	<aside class="share-article<?php if ($fixed) { ?> fixed-me<?php } ?> <?php echo $class; ?>">
		<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $share_image[0] ) ? $share_image[0] : '' ). '&amp;description=' . urlencode(strip_tags($description)) . ''; ?>" class="square-icon social pinterest" nopin="nopin" data-pin-no-hover="true">
			<?php if ($count_shares && $pinterest_share_count > 50) : ?>
				<span class="pre-display-count v1-icon-pinterest"></span><!-- No linebreak (important) --><span class="display-count italic">
					<span class="display-count-inner"><?php echo thb_numberAbbreviation($pinterest_share_count) ?></span>
				</span>
			<?php else : ?>
				<span class="v1-icon-pinterest"></span>
			<?php endif; ?>
		</a>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="square-icon social facebook">
			 <span class="v1-icon-facebook"></span>
		</a>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="square-icon social twitter">
			<span class="v1-icon-twitter"></span>
		</a>
	</aside>
<?php
}
add_action( 'thb_social_article_detail', 'thb_social_article_detail', 3, 6 );

/* Get Top-Level Domain */
function thb_get_domain($url = false) {
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : '';
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}
/* Thb Header Search */
function thb_quick_search() {
 ?>
 	<aside id="quick_search">
		<!-- Start SearchForm -->
		<form method="get" class="searchform" role="search" action="<?php echo home_url(); ?>/wp-search">
		    <fieldset>
		    	<input name="s" type="text" class="s" placeholder="<?php _e( 'Search things like Manrepeller or Kitchens...', THB_THEME_NAME ); ?>">
		    </fieldset>
		</form>
		<!-- End SearchForm -->
		<span class="v1-icon-search"></span>
	</aside>
<?php
}
add_action( 'thb_quick_search', 'thb_quick_search',3 );

/* THB Social Icons */
function thb_social() {
 ?>
	<?php if (ot_get_option('fb_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('fb_link')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('pinterest_link')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('twitter_link')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('linkedin_link')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('instragram_link')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('xing_link')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('tumblr_link')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('vk_link')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('googleplus_link')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('soundcloud_link')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if (ot_get_option('dribbble_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('dribbble_link')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if (ot_get_option('youtube_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('youtube_link')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if (ot_get_option('spotify_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('spotify_link')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
	<?php } ?>
<?php
}
add_action( 'thb_social', 'thb_social',3 );

function thb_social_header() {
	$social_style = ot_get_option('header_socialstyle', 'style1');
	
	if ($social_style == 'style1') {
 ?>
	<aside id="social_header">
		<div>
			<?php if (ot_get_option('fb_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('fb_link_header')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if (ot_get_option('pinterest_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('pinterest_link_header')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			<?php if (ot_get_option('twitter_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('twitter_link_header')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if (ot_get_option('linkedin_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('linkedin_link_header')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if (ot_get_option('instragram_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('instragram_link_header')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if (ot_get_option('xing_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('xing_link_header')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
			<?php } ?>
			<?php if (ot_get_option('tumblr_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('tumblr_link_header')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
			<?php } ?>
			<?php if (ot_get_option('vk_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('vk_link_header')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
			<?php } ?>
			<?php if (ot_get_option('googleplus_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('googleplus_link_header')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if (ot_get_option('soundcloud_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('soundcloud_link_header')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
			<?php } ?>
			<?php if (ot_get_option('dribbble_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('dribbble_link_header')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
			<?php } ?>
			<?php if (ot_get_option('youtube_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('youtube_link_header')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			<?php if (ot_get_option('spotify_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('spotify_link_header')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
			<?php } ?>
		</div>
		<i><svg version="1.1" id="social_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
		<path d="M11.521,14.194c-0.447,0.523-0.956,0.943-1.531,1.257c-0.552,0.314-1.126,0.461-1.698,0.461
			c-0.618,0-1.235-0.168-1.83-0.524c-0.595-0.376-1.062-0.921-1.446-1.674c-0.361-0.753-0.553-1.569-0.553-2.47
			c0-1.09,0.298-2.199,0.873-3.308C5.908,6.848,6.61,6.011,7.46,5.466C8.311,4.9,9.14,4.628,9.947,4.628
			c0.617,0,1.191,0.146,1.744,0.481c0.574,0.293,1.042,0.774,1.446,1.424l0.36-1.612h1.893l-1.531,6.972
			c-0.212,0.982-0.318,1.507-0.318,1.61c0,0.189,0.086,0.355,0.214,0.482c0.149,0.146,0.318,0.209,0.532,0.209
			c0.381,0,0.849-0.209,1.465-0.629c0.809-0.564,1.446-1.297,1.913-2.238c0.47-0.921,0.703-1.885,0.703-2.891
			c0-1.151-0.317-2.218-0.915-3.223c-0.595-1.005-1.487-1.822-2.698-2.408c-1.19-0.606-2.489-0.92-3.935-0.92
			c-1.658,0-3.146,0.397-4.507,1.151C4.932,3.79,3.89,4.88,3.146,6.283C2.38,7.706,2.019,9.234,2.019,10.847
			c0,1.694,0.361,3.159,1.128,4.396c0.743,1.215,1.827,2.135,3.23,2.721c1.424,0.566,2.998,0.859,4.721,0.859
			c1.848,0,3.379-0.293,4.634-0.9s2.169-1.361,2.807-2.24h1.892c-0.36,0.732-0.956,1.486-1.85,2.24
			c-0.871,0.753-1.892,1.34-3.104,1.779c-1.213,0.439-2.658,0.67-4.338,0.67c-1.573,0-3.018-0.21-4.337-0.586
			c-1.317-0.397-2.445-1.006-3.36-1.799c-0.933-0.776-1.637-1.697-2.104-2.723c-0.595-1.319-0.893-2.722-0.893-4.25
			c0-1.696,0.361-3.308,1.063-4.835c0.85-1.864,2.082-3.308,3.657-4.312c1.573-0.984,3.485-1.487,5.738-1.487
			c1.743,0,3.316,0.355,4.698,1.046c1.403,0.711,2.489,1.759,3.296,3.141c0.681,1.214,1.021,2.51,1.021,3.914
			c0,2.01-0.723,3.79-2.147,5.36c-1.296,1.381-2.679,2.093-4.208,2.093c-0.491,0-0.873-0.084-1.171-0.229
			c-0.297-0.126-0.531-0.335-0.659-0.607C11.648,14.929,11.563,14.613,11.521,14.194L11.521,14.194z M6.418,11.389
			c0,0.941,0.234,1.676,0.681,2.199c0.468,0.522,1,0.797,1.573,0.797c0.403,0,0.809-0.126,1.255-0.357
			c0.425-0.23,0.851-0.564,1.255-1.027c0.402-0.459,0.722-1.045,0.977-1.737c0.255-0.71,0.384-1.401,0.384-2.114
			c0-0.942-0.258-1.675-0.724-2.198c-0.468-0.523-1.063-0.774-1.745-0.774c-0.444,0-0.87,0.105-1.253,0.334
			c-0.404,0.23-0.786,0.586-1.169,1.089c-0.36,0.502-0.66,1.109-0.893,1.821C6.546,10.134,6.418,10.782,6.418,11.389z"/>
		</svg></i>
	</aside>
 <?php		
	} else if ($social_style == 'style2') {
 ?>
	<?php if (ot_get_option('fb_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('fb_link_header')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('pinterest_link_header')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('twitter_link_header')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('linkedin_link_header')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('instragram_link_header')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('xing_link_header')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('tumblr_link_header')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('vk_link_header')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('googleplus_link_header')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('soundcloud_link')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if (ot_get_option('dribbble_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('dribbble_link_header')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if (ot_get_option('youtube_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('youtube_link_header')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if (ot_get_option('spotify_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('spotify_link_header')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
	<?php } ?>
<?php
	}
}
add_action( 'thb_social_header', 'thb_social_header',3 );

/* Add Category slug as class to categories */
function thb_add_class_callback( $result ) {
	$class = strtolower( $result[2] );
	$class = str_replace( ' ', '-', $class );
	$class = sanitize_title($class);
	
	$replacement = sprintf( ' class="%s">%s</a>', 'cat-'.$class, $result[2] );
	
	return preg_replace( '#>([^<]+)</a>#Uis', $replacement, $result[0] );
}

function thb_add_category_slug( $html ) {
	$search  = '#<a[^>]+(\>([^<]+)\</a>)#Uuis';
	$html = preg_replace_callback( $search, 'thb_add_class_callback', $html );
	
	return $html;
}

add_filter( 'the_category', 'thb_add_category_slug', 99, 1 );

/* Post Categories Array */
function thb_blogCategories(){
	$blog_categories = get_categories();
	$out = array();
	foreach($blog_categories as $category) {
		$out[$category->name] = $category->cat_ID;
	}
	return $out;
}

/* First letter of Content */
function thb_FirstLetter() {
	// $content = get_the_excerpt();
	// return mb_substr($content,0,1, "utf-8");
	return "&#8962;";
}


/* Prev/Next Post Links - http://wordpress.org/plugins/previous-and-next-post-in-same-taxonomy/ */
function thb_previous_post_link($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	thb_adjacent_post_link($in_same_cat, $excluded_categories, true, $taxonomy);
}
function thb_next_post_link($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	thb_adjacent_post_link($in_same_cat, $excluded_categories, false, $taxonomy);
}
function thb_adjacent_post_link($in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category') {
	
	$post = thb_get_adjacent_post($in_same_cat, $excluded_categories, $previous, $taxonomy);
	if ( !$post )
		return;
	if ($taxonomy == 'post') {
		$title = $previous ? __('<span>&larr;</span> Previous Post', THB_THEME_NAME) : __('Next Post <span>&rarr;</span>', THB_THEME_NAME);
	}
	if ($taxonomy == 'portfolio') {
		$title = $previous ? __('Previous Project', THB_THEME_NAME) : __('Next Project', THB_THEME_NAME);
	}
	
	$dir = $previous ? __('PREVIOUS', THB_THEME_NAME) : __('NEXT', THB_THEME_NAME);
	$date = mysql2date(get_option('date_format'), $post->post_date);
	$rel = $previous ? 'prev' : 'next';
	
	if ($taxonomy == 'post') {
		$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" data-id="'.$post->ID.'" class="'.$rel.'">'. $title . '</a>';
	}
	if ($taxonomy == 'portfolio') {
		$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" data-id="'.$post->ID.'" class="'.$rel.'">'. $title . '</a>';
	}
	echo $string;
}
function thb_get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category' ) {
	global $post, $wpdb;
	if ( empty( $post ) )
		return null;
	$current_post_date = $post->post_date;
	$join = '';
	$posts_in_ex_cats_sql = '';
	if ( $in_same_cat || ! empty( $excluded_categories ) ) {
		$join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";
		if ( $in_same_cat ) {
			$cat_array = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
			$join .= " AND tt.taxonomy = '$taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
		}
		$posts_in_ex_cats_sql = "AND tt.taxonomy = '$taxonomy'";
		if ( ! empty( $excluded_categories ) ) {
			if ( ! is_array( $excluded_categories ) ) {
				// back-compat, $excluded_categories used to be IDs separated by " and "
				if ( strpos( $excluded_categories, ' and ' ) !== false ) {
					_deprecated_argument( __FUNCTION__, '3.3', sprintf( __( 'Use commas instead of %s to separate excluded categories.', THB_THEME_NAME ), "'and'" ) );
					$excluded_categories = explode( ' and ', $excluded_categories );
				} else {
					$excluded_categories = explode( ',', $excluded_categories );
				}
			}
			$excluded_categories = array_map( 'intval', $excluded_categories );
				
			if ( ! empty( $cat_array ) ) {
				$excluded_categories = array_diff($excluded_categories, $cat_array);
				$posts_in_ex_cats_sql = '';
			}
			if ( !empty($excluded_categories) ) {
				$posts_in_ex_cats_sql = " AND tt.taxonomy = '$taxonomy' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
			}
		}
	}
	$adjacent = $previous ? 'previous' : 'next';
	$op = $previous ? '<' : '>';
	$order = $previous ? 'DESC' : 'ASC';
	$join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
	$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
	$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );
	$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
	$query_key = 'adjacent_post_' . md5($query);
	$result = wp_cache_get($query_key, 'counts');
	if ( false !== $result )
		return $result;
	$result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
	if ( null === $result )
		$result = '';
	wp_cache_set($query_key, $result, 'counts');
	return $result;
}

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', THB_THEME_NAME), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}

	return $human_time;

}

/* Portfolio Navigation */
function thb_post_navigation($arg) {
 ?>
	<nav class="post_nav cf">
		<?php thb_previous_post_link(false, '', $arg[0]); ?>
		<?php thb_next_post_link(false, '', $arg[0]); ?>
	</nav>
<?php
}
add_action( 'thb_post_navigation', 'thb_post_navigation', 3 );

/*--------------------------------------------------------------------*/                							
/*  ADD DASHBOARD LINK			                							
/*--------------------------------------------------------------------*/
function thb_admin_menu_new_items() {
    global $submenu;
    $submenu['index.php'][500] = array( 'Fuelthemes.net', 'manage_options' , 'http://fuelthemes.net/?ref=wp_sidebar' ); 
}
add_action( 'admin_menu' , 'thb_admin_menu_new_items' );


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function thb_footer_admin () {  
  echo 'Thank you for choosing <a href="http://fuelthemes.net/?ref=wp_footer" target="blank">Fuel Themes</a>.';  
}
add_filter('admin_footer_text', 'thb_footer_admin'); 
?>