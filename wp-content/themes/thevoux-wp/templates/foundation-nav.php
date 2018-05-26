<div class="full-width full-width-nav <?php echo hp_page_meta()['transparency']; ?>">
	<div class="row collapse">
	<div class="small-12 columns">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1>
						<a href="/">
							<img class="opaque" src="<?php echo get_template_directory_uri(); ?>/assets-2018/img/homepolish-wordmark.png" alt="Homepolish">
							<img class="transparent" src="<?php echo get_template_directory_uri(); ?>/assets-2018/img/homepolish-wordmark-white.png" alt="Homepolish">
						</a>
					</h1>
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
			</ul>

			<section class="top-bar-section">

				<?php

					echo str_replace('sub-menu', 'dropdown', wp_nav_menu( array(
						'echo' => false,
						'menu' 		=> 'Header 2018', 
						'menu_class' => 'right'
						) )
					);

				?>

				<?php //echo hp_header_2018(); ?>

				<!-- Right Nav Section -->
				<!-- 
				<ul class="right">
					<li class="has-dropdown">
						<a href="#">Design</a>
						<ul class="dropdown">
							<li><a href="#">First link in dropdown</a></li>
							<li class=""><a href="#">Active link in dropdown</a></li>
						</ul>
					</li>
					<li><a href="#">Build Services</a></li>
					<li><a href="#">Concierge</a></li>
					<li><a href="#">Portfolio</a></li>
					<li class="has-dropdown">
						<a href="#">The Magazine</a>
						<ul class="dropdown">
							<li><a href="#">Category 1</a></li>
							<li class=""><a href="#">Active link in dropdown</a></li>
						</ul>
					</li>
					<li class="left-border"><a href="#">Log in</a></li>
					<li class="active"><a href="#">Book your design team</a></li>
				</ul>
				-->
			</section>
		</nav>
	</div>
	</div>
</div>