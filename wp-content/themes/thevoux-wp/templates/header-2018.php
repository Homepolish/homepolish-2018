
<!-- wp_head -->
<?php wp_head(); ?>
<!-- /wp_head -->

</head>

<body class="svelte landing-pages landing-pages--<?php echo hp_page_meta()['body_class']; ?>"
 data-action="<?php echo hp_page_meta()['data_action']; ?>" 
 data-controller="<?php echo hp_page_meta()['data_controller']; ?>">
<div class="fixed-banner"></div>
<div class="main-container">

<?php include( 'foundation-nav.php' ); ?>