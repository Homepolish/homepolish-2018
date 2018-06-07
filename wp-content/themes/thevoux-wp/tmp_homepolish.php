<!-- event-template --><?php 
/**
 * Template Name: Event Template
 *
 */


get_header('event');
$tpl_id  = get_the_ID();
    $top_date_text=get_post_meta ($tpl_id ,'top_date_text' ,true);
    $top_subtitle_text=get_post_meta ($tpl_id ,'top_subtitle_text' ,true);
    $welldesign_title_text=get_post_meta ($tpl_id ,'welldesign_title_text' ,true);
    $welldesign_rightvertical_text=get_post_meta ($tpl_id ,'welldesign_rightvertical_text' ,true);
    $event_title_text=get_post_meta ($tpl_id ,'event_title_text' ,true);
    $signup_title_text=get_post_meta ($tpl_id ,'signup_title_text' ,true);
    $signup_subtitle_text=get_post_meta ($tpl_id ,'signup_subtitle_text' ,true);

    $abtmissioncontntval=  get_post_meta($tpl_id, 'about_profile_content_meta' , true ) ;
    $abtmissioncontntval = isset($abtmissioncontntval) ? $abtmissioncontntval :""; 
        $welldesign_whentitle_text=get_post_meta ($tpl_id,'welldesign_whentitle_text' ,true);
    $welldesign_whencontent_text=get_post_meta (  $tpl_id,'welldesign_whencontent_text' ,true);
    $welldesign_wheretitle_text=get_post_meta (  $tpl_id,'welldesign_wheretitle_text' ,true);
    $welldesign_wherecontent_text=get_post_meta (  $tpl_id,'welldesign_wherecontent_text' ,true);               
    $signup_link_text=get_post_meta (  $tpl_id,'signup_link_text' ,true);                 
?>
<main class="main-wrap">
    
      <div class="hero-wrap">
        <div class="container-fluid">
          <div class="row">
            <div class="slide-img pull-right wow fadeIn">
              <?php $top_background_image = get_field('top_background_image'); ?>
              <img src="<?php echo $top_background_image = isset($top_background_image) ? $top_background_image :""; ?>" alt="" class="img-responsive">
            </div>
            <div class="slide-content clearfix">
              <div class="wow slideInUp slide-date-anim">
                <div class="slide-date"><?php echo $top_date_text; ?></div>
              </div>
              <div class="slide-cont-inn wow slideInUp">
                <div class="logo-slide">
                  <span class="h-polish-logo">
                 <?php
                  if ( has_post_thumbnail() ):
                  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($tpl_id), 'full' );
                  //echo  '<img src="'.$large_image_url [0].'" alt="">';
                  endif;
                   ?>
                    <img src="<?php echo $large_image_url [0]; ?>" alt="PlacebyHP Web">
                  </span>
                </div>
                <span class="at"><?php echo $top_subtitle_text; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="well-design-wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-push-4">
              <div class="heding-well  wow slideInUp">
             <?php echo $welldesign_title_text; ?>
              </div>
            

            <div class="well-descrp wow slideInUp">
<?php  echo  wpautop(htmlspecialchars_decode($abtmissioncontntval));?>
              </div>
    <div class="whr-whn-wrp wow slideInUp">
<div class="whr-wrap"><label><?php echo $welldesign_wheretitle_text;?></label><?php echo $welldesign_wherecontent_text;?></div>
<div class="whr-wrap"><label><?php echo $welldesign_whentitle_text;?></label><?php echo $welldesign_whencontent_text;?></div>
</div>
            </div>
            <div class="image-wll  wow slideInUp">
           <?php $well_design_image = get_field('well_design_image'); ?>
              <img src="<?php echo $well_design_image = isset($well_design_image) ? $well_design_image :""; ?>" alt="" class="img-responsive">
            </div>
            <div class="wow slideInDown wts-hpn-anim">
              <div class="wts-hpn"><?php echo $welldesign_rightvertical_text; ?></div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="events-wrap">
        <div class="container">
          <div class="row">
            <div class="head-cnt-anim wow slideInUp">
              <div class="head-cnt"><?php echo $event_title_text; ?></div>
            </div>
            <div class="col-md-9 col-md-push-3 event-cont wow slideInUp">
              <div class="event-box">


 <?php 
 $add_events = get_field('add_events');
//echo'<pre>';print_r($add_events);
  foreach ($add_events as $key => $value) {
  $date = $value['date'];
  $event_subtitle = $value['event_subtitle'];
  $event_title = $value['event_title'];
   $event_time = $value['event_time'];
 $event_description = $value['event_description'];
   $event_link = $value['event_link'];
      $event_link_text = $value['event_link_text'];
 ?>
          

            <?php if(!empty($date)){?>     
 <div class="evt-date"><?php echo $date;?></div> 
 <?php }?>
                <div class="event-row">
                  <div class="event-desc">
                    <div class="event-desc-lft">
                      <?php if(!empty($event_title)){?> 
                      <div class="title-event"><?php echo $event_title;?></div>
                       <?php }?>
                       <?php if(!empty($event_time)){?> 
                      <div class="time-event"><?php echo $event_time;?></div>
                       <?php }?>
                    </div>
                    <div class="event-desc-right">
                       <?php if(!empty($event_subtitle)){?>
                      <p><?php echo $event_subtitle;?></p>
                       <?php }?>
                      <div class="event-feat">
                        <?php echo $event_description;?>
                        <?php 
                        if(!empty($event_link_text)){
                         if(!empty($event_link_text) && !empty($event_link)){?>
                        <a href="<?php echo $event_link;?>" class="rsvp">
                          <span><?php echo $event_link_text; ?></span>
                          <!--<span class="ic"> > </span>
                          <span class="d-mob">To event</span>-->
                        </a>
                         <?php }
                         elseif (!empty($event_link_text) && empty($event_link)) {
                          echo '<span>'.$event_link_text.'</span>';
                         }
?>

                         <?php }?>
                      </div>
                    </div>
                  </div>
                </div>        

        <?php

          }

           ?>
         
              
                
              </div>
            

            </div>
          </div>
        </div>
      </div>
               <?php $signup_image = get_field('signup_image'); ?>
      <div class="sign-up-wrap" style="background:url(<?php echo $signup_image; ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="sign-box wow slideInUp">
                <h1><?php echo $signup_title_text; ?></h1>
                <p><?php echo $signup_subtitle_text; ?></p>
                <a href="<?php echo $signup_link_text; ?>" class="btn btn-default btn-sgnup">sign up</a>
              </div>
            </div>
          </div>
        </div>
      </div>

	</main>

<?php 

get_footer('event');
?>