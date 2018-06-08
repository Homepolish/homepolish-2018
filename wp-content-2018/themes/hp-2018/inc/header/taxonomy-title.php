<?php
  $all_attachments_count = hmpl_tax_attachment_count($taxonomy_term);
  $all_articles_count = hmpl_tax_post_count($taxonomy_term);
?>
<!-- Start Archive title -->
<div id="taxonomy-title" class="parallax_bg">
  <div class="row">
    <div class="small-12 medium-10 medium-centered columns">
      <h2 class="italic"><?php echo $taxonomy_term->name; ?></h2>
      <?php if ($all_articles_count > 0) { ?>
        <span class="small de-emphasize">
          <?php echo $all_articles_count; ?> tours<?php echo ($all_attachments_count > 0) ? ', '.$all_attachments_count.' photos' : '' ?>
        </span>
      <?php } ?>
      <p class="taxonomy-description"><?php echo $taxonomy_term->description; ?></p>
    </div>
  </div>
</div>
<!-- End Archive title -->
