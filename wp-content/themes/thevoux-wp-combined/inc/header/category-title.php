<?php
	if (is_category()) {
		$cat = get_queried_object();
		$cat_id = $cat->term_id;	
		$category_header = ot_get_option('category_headers');
	}
?>
<!-- Start Archive title -->
<div id="category-title">
	<div class="row">
		<div class="small-12 medium-10 large-8 medium-centered columns">
			<?php echo '<h5>'.single_cat_title('', false).'</h5>'; ?>
			<div class="cat-description">
				<?php if ($desc = category_description()) { echo $desc; }?>
			</div>
		</div>
	</div>
</div>
<!-- End Archive title -->