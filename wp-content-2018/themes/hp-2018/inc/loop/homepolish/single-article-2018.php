<!-- single-article-2018 -->
<?php
  //$fixed = ot_get_option('article_fixed_sidebar', 'on');
  //$fullwidth = ot_get_option('article_fullwidth', 'off');
  //$dropcap = ot_get_option('article_dropcap', 'on');
  //$adv_postend = ot_get_option('adv_postend');
  //$adv_postend_ajax = ot_get_option('adv_postend_ajax');

  //$talking_points = get_field('talking_points');
  //$social_description = $talking_points ? $talking_points : get_the_excerpt();
  //$terms = hmpl_get_post_display_terms();
  //$list_terms = $terms['list_terms'];
  //$featured_term = $terms['featured_term'];
  // Gallery information
  //$post_gallery_photos = get_post_meta($id, 'post-gallery-photos', true);
?>

<div class="row-container">

<!-- hero -->

<div class="row hero hero-article">
    <div class="large-centered large-10 columns">
        <div class="row collapsed">
            <div class="small-12 text-center post-cat">
                <h4><?php hp_2018_get_category_aside(); ?></h4>
            </div>
            <div class="small-12 text-center post-title">
                <?php hmpl_header_title($ajax); ?>
            </div>
            <div class="small-12 text-center post-meta">
                <span class="meta-container">
                    <?php hp_2018_header_date_author(); ?>
                </span>

                <span class="meta-container">
                <?php
                    // Designer
                    $designer_hash = wp_get_post_terms($post->ID, 'designer'); // Grab just the first designer
                    $designer_name = $designer_hash ? $designer_hash[0]->name : null;
                    $designer_slug = $designer_hash ? $designer_hash[0]->slug : null;

                    if($designer_name && $designer_slug) { ?>
                        <span class="meta-key">Designer: </span><a href="<?php echo get_term_link($designer_slug, 'designer') ?>" class="secondary"><?php echo $designer_name; ?></a>
                    <?php }
                ?>
                </span>

                <span class="meta-container">
                <?php 
                    //City
                    $location_hash = wp_get_post_terms($post->ID, 'location'); // Grab just the first location
                    $location_name = $location_hash ? $location_hash[0]->name : null;
                    $location_slug = $location_hash ? $location_hash[0]->slug : null;

                    if( $location_name && $location_slug ) { ?>
                        <span class="meta-key">City: </span><a href="<?php echo get_term_link($location_slug, 'location') ?>" class="secondary"><?php echo $location_name; ?></a>
                    <?php }   
                    ?>
                </span>
            </div>
            <div class="small-12">

                <figure class="post-gallery">
                <?php
                $image_id = get_post_thumbnail_id();
                $image_link = wp_get_attachment_image_src($image_id,'full');
                $image = aq_resize( $image_link[0], 800, 500, true, false, true);  // Blog
                $permalink = get_permalink($id);
                ?>

                <aside class="hp-share-icon">
                <a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image_link[0] ) ? $image_link[0] : '' ) . '&amp;description=' . urlencode($social_description) . ''; ?>" class="circle-icon pinterest social" nopin="nopin" data-pin-no-hover="true"><span class="v1-icon-pinterest"></span></a>
                </aside>

                <img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php the_title_attribute(); ?>" />

                <?php get_template_part( 'inc/postformats/post-gallery' ); ?>
                </figure>
            </div>
        </div>
    </div>
</div>

<!-- 
<div class="MainContainer">
    <div class="ParallaxContainer">
    <h1>
    Aloha!
    </h1>
    </div>

    <div class="ContentContainer">
    <div class="Content">
    <p>ʻO Lorem Ipsum kahi haʻahaʻa wale nō o ka paʻi a me keʻano o nāʻoihana. ʻO Lorem Ipsum ka 'ōlelo papahana maʻamau o kaʻoihana o ka makahiki 1500, i ka wā i lawe ai kekahi mea paʻi kiʻiʻole i keʻano o ka type a scrambled iā ia e hana i kahi puke kiko'ī. ʻAʻole i ola wale i kaʻelima mau kenekulia, akā,ʻo ka leleʻana hoʻi i nāʻano o ka lolouila, e hoʻololiʻoleʻia ana. Ua hoʻolahaʻia i nā makahiki 1960 me ka hoʻokuʻuʻana i nā pepa Letraset i loko o nā moʻolelo Lorem Ipsum, a me nā mea hou aku me ka polokalamu hoʻopuka pākī e like me Aldus PageMaker me nā papa o Lorem Ipsum.
    </p>
    <p>ʻO Lorem Ipsum kahi haʻahaʻa wale nō o ka paʻi a me keʻano o nāʻoihana. ʻO Lorem Ipsum ka 'ōlelo papahana maʻamau o kaʻoihana o ka makahiki 1500, i ka wā i lawe ai kekahi mea paʻi kiʻiʻole i keʻano o ka type a scrambled iā ia e hana i kahi puke kiko'ī. ʻAʻole i ola wale i kaʻelima mau kenekulia, akā,ʻo ka leleʻana hoʻi i nāʻano o ka lolouila, e hoʻololiʻoleʻia ana. Ua hoʻolahaʻia i nā makahiki 1960 me ka hoʻokuʻuʻana i nā pepa Letraset i loko o nā moʻolelo Lorem Ipsum, a me nā mea hou aku me ka polokalamu hoʻopuka pākī e like me Aldus PageMaker me nā papa o Lorem Ipsum.
    </p>
    <p>ʻO Lorem Ipsum kahi haʻahaʻa wale nō o ka paʻi a me keʻano o nāʻoihana. ʻO Lorem Ipsum ka 'ōlelo papahana maʻamau o kaʻoihana o ka makahiki 1500, i ka wā i lawe ai kekahi mea paʻi kiʻiʻole i keʻano o ka type a scrambled iā ia e hana i kahi puke kiko'ī. ʻAʻole i ola wale i kaʻelima mau kenekulia, akā,ʻo ka leleʻana hoʻi i nāʻano o ka lolouila, e hoʻololiʻoleʻia ana. Ua hoʻolahaʻia i nā makahiki 1960 me ka hoʻokuʻuʻana i nā pepa Letraset i loko o nā moʻolelo Lorem Ipsum, a me nā mea hou aku me ka polokalamu hoʻopuka pākī e like me Aldus PageMaker me nā papa o Lorem Ipsum.
    </p>
    </div>
    </div>
</div>

-->

<div class="the-content single-article-2018">
  <?php echo the_content(); ?>
</div>


</div><!-- row container -->
