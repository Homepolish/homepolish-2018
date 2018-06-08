<?php

	// This is a stopgap as we change the URL scheme. Once we go live with /mag, remove 6/8/18 EAR
	if( ! strpos( site_url(), 'staging' ) ) {

		echo '<!-- prod or dev -->';
	}
	else {
		echo '<!-- staging! -->';
	}
?>

<!-- homepolishwp --><!DOCTYPE html>
<html itemscope itemtype="http://schema.org/<?php echo hp_page_meta()['page_type']; ?>" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
	<link href="<?php echo get_template_directory_uri(); ?>/assets-2018/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets-2018/homepolish_logo.png" rel="apple-touch-icon">
	<meta name="csrf-param" content="authenticity_token" />
	<meta name="csrf-token" content="CSRF-TOKEN?" />
	<meta content="<?php echo get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ); ?>" itemprop="description">
	<meta content="<?php the_permalink(); ?>" itemprop="url">
	<meta content="127512634049491" property="fb:app_id">
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />


<style>
.hide {

	display: none !important;
}
</style>


	<?php include_once("inc/homepolish/hmpl-google-scripts.php") ?>
	<?php get_template_part( 'templates/header', hp_page_type() ); ?>