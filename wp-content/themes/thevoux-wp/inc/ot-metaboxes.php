<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', '_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */


function _custom_meta_boxes() {

  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  
  // $post_metabox = array(  
  //   'id'          => 'post_meta_style',
  //   'title'       => 'Post Settings',
  //   'pages'       => array( 'post' ),
  //   'context'     => 'normal',
  //   'priority'    => 'high',
  //   'fields'      => array(
  //     array(
  //       'label'       => 'Post Style',
  //       'id'          => 'post-style',
  //       'type'        => 'radio',
  //       'choices'     => array(
  //         array(
  //           'label'       => 'Homepolish Tour',
  //           'value'       => 'style1'
  //         ),
  //   			array(
  //   				'label'       => 'Style 1 (Classic)',
  //   				'value'       => 'style1'
  //   			),
  //   			array(
  //   				'label'       => 'Style 2 (Large Top Image)',
  //   				'value'       => 'style2'
  //   			)
  //       ),
  //       'std'		      => 'Homepolish Tour',
  //       'desc'        => 'Which post style would you like to use?'
  //     ),
  //     array(
  //       'label'       => 'Top Image',
  //       'id'          => 'post-top-image',
  //       'type'        => 'upload',
  //       'desc'        => 'The image to display on top.',
  //       'condition'   => 'post-style:is(style2)'
  //     ),
  //   )
  // );

  $post_metabox_homepolish = array(  
    'id'          => 'post_meta_hp_style',
    'title'       => 'Homepolish Post Settings',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'Post Style',
        'id'          => 'hp-post-style',
        'type'        => 'radio',
        'choices'     => array(
          array(
            'label'       => 'Homepolish Story (Default)',
            'value'       => 'story'
          ),
          array(
            'label'       => '2018 Article',
            'value'       => 'article'
          ),

          // array(
          //   'label'       => 'Homepolish Interview',
          //   'value'       => 'interview'
          // )
        ),
        'std'         => 'story',
        'desc'        => 'Which post style would you like to use?'
      )
    )
  );

  $post_metabox_gallery = array(  
    'id'          => 'post_meta_gallery',
    'title'       => 'Post Gallery',
    'pages'       => array( 'post' ),
    'context'     => 'side',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => 'Post Gallery',
        'id'          => 'post-gallery-photos',
        'type'        => 'gallery',
        'desc'        => 'The image captions will be used as image information on the right side.'
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  // ot_register_meta_box( $post_metabox );
	ot_register_meta_box( $post_metabox_homepolish );
  ot_register_meta_box( $post_metabox_gallery );
}