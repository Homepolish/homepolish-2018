<!-- Start Archive title -->
<div id="archive-title" class="parallax_bg">
	<div class="row">
		<div class="small-12 medium-10 large-8 medium-centered columns">
      <?php echo '<h3 class="italic">'.thb_title(array('title' => thb_which_archive())).'</h3>'; ?>
      <?php if ($desc = category_description($id)) { echo $desc; }?>
		</div>
	</div>
</div>
<!-- End Archive title -->