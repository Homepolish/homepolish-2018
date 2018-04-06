<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/<?php echo $page_type; ?>" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<title></title>

<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="<?php echo $csrf_token; ?>" />
<meta content="" name="description"/>
<meta content="Homepolish" itemprop="name">
<meta content="127512634049491" property="fb:app_id">
<meta content="website" property="og:type">
<meta content="Homepolish: Seamless and Personal Interior Design" property="og:title">
<meta content="Premium interior design services in-home and online nationwide. From decorating rooms to renovating offices, our designers help you get any job done in style." property="og:description">
<meta content="https://www.homepolish.com/cdn/homepage/meta-images/og.jpg" property="og:image">
<meta content="https://homepolish.com/" property="og:url">
<meta content="Homepolish" property="og:site_name">
<meta content="en_US" property="og:locale">
<meta content="summary_large_image" name="twitter:card">
<meta content="Homepolish: Seamless and Personal Interior Design" name="twitter:title">
<meta content="Premium interior design services in-home and online nationwide. From decorating rooms to renovating offices, our designers help you get any job done in style." name="twitter:description">
<meta content="https://www.homepolish.com/cdn/homepage/meta-images/twitter.jpg" name="twitter:image">
<meta content="Living Room in Williamsburg Bachelor Pad" name="twitter:image:alt">
<meta content="@homepolish" name="twitter:site">
<meta content="@homepolish" name="twitter:creator">

<link rel="shortcut icon" type="image/x-icon" href="https://www.homepolish.com/assets/favicon-e848a316df83ffd48bc2a038b2e4d38988f99ab8ebe9b82f3cf9aaa6029d6845.ico" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/homepolish_logo.png" rel="apple-touch-icon">

<?php wp_head(); ?>

<body class="svelte landing-pages landing-pages--<?php echo post_slug(); ?>" data-action="<?php echo $data_action; ?>'" data-controller="landing_pages">

<?php get_template_part('templates/header', post_slug() ); ?>