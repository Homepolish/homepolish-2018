<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/<?php echo hp_page_meta()['page_type']; ?>" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/homepolish_logo.png" rel="apple-touch-icon">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta content="<?php echo get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ); ?>" itemprop="description">
	<meta content="<?php echo hp_canonical_url(); ?>" itemprop="url">
	<meta content="127512634049491" property="fb:app_id">
	<style>
		.hide {

			display: none !important;
		}
	</style>

<!-- wp_head -->
<?php wp_head(); ?>
<!-- /wp_head -->

<?php get_template_part( 'header', hp_page_type() );