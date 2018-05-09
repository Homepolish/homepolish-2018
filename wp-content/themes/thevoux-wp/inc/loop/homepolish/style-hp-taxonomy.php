<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post style-hp-taxonomy-post'); ?> id="post-<?php the_ID(); ?>" role="article">
  <div class="row" data-equal=">.columns">
    <div class="small-12 medium-3 columns">
      <?php hmpl_get_category_aside(); ?>
      <div class="post-title">
        <a href="<?php echo get_the_permalink(); ?>">
          <h4><?php echo the_title(); ?></h4>
        </a>
      </div>
      <div class="post-featured-thumbnail">
        <?php hmpl_featured_image_thumbnail(array('dimensions' => array('height' => 400, 'width' => 400))); ?>
      </div>
      <div class="post-excerpt">
        <p class="small italic">
          <?php echo hmpl_get_talking_points(); ?>
        </p>
      </div>
      <?php $link_text = has_category('tour') ? 'See the whole tour' : 'Read the whole article'; ?>
      <div class="post-link">
        <a href="<?php echo get_the_permalink(); ?>" class="secondary">
          <h6><?php echo $link_text; ?></h6>
          <span class="v1-icon-caret-right"></span>
        </a>
      </div>
    </div>
    <div class="small-12 medium-9 columns no-padding-desktop attachments-grid">
      <table>
        <tbody>
          <tr><th></th><th></th><th></th><th></th></tr>
        <?php foreach($attachments as $index=>$attachment) { ?>
          <?php if ($index % 4 == 0) { ?>
            <!-- <div class="row"> -->
            <tr>
          <?php } ?>
          <!-- <div class="small-6 medium-3 columns attachment"> -->
          <td>
            <?php $gallery_link = get_the_permalink().'?gallery_id='.$attachment->ID; ?>
            <?php hmpl_image_thumbnail($attachment->ID, array('height' => 230, 'width' => 230), $gallery_link); ?>
            <h6>Photo</h6>
            <p class="extra-small">
              <?php echo truncate($attachment->post_excerpt, 95, array('ending' => '&hellip;', 'exact' => false, 'html' => true)); ?>
            </p>
          <!-- </div> -->
          </td>
          <?php if (($index + 1) % 4 == 0) { ?>
            <!-- </div> -->
            </tr>
          <?php } ?>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</article>
