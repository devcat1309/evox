<?php
  /*
  *	---------------------------------------------------------------------
  *	This file create and contains the portfolio post_type meta elements
  *	---------------------------------------------------------------------
  */
  add_action('init', 'templaza_create_portfolio');
  function templaza_create_portfolio()
  {
      $tz_theme_support = get_theme_support('templaza-post-type');
      $tz_theme_support = $tz_theme_support?(array)$tz_theme_support:array();
      $tz_theme_support = count($tz_theme_support)?$tz_theme_support[0]:$tz_theme_support;
      if(!in_array('portfolio', $tz_theme_support)){
          return;
      }
    $labels = array(
      'name'               => esc_html_x('Portfolio', 'Portfolio General Name', 'evox-elements'),
      'singular_name'      => esc_html_x('Portfolio Item', 'Portfolio Singular Name', 'evox-elements'),
      'add_new'            => esc_html_x('Add New', 'Add New Portfolio Name', 'evox-elements'),
      'add_new_item'       => esc_html__('Add New Portfolio', 'evox-elements'),
      'all_items'          => esc_html__( 'All Portfolios', 'evox-elements'),
      'edit_item'          => esc_html__('Edit Portfolio', 'evox-elements'),
      'new_item'           => esc_html__('New Portfolio', 'evox-elements'),
      'view_item'          => esc_html__('View Portfolio', 'evox-elements'),
      'search_items'       => esc_html__('Search Portfolio', 'evox-elements'),
      'not_found'          => esc_html__('Nothing found', 'evox-elements'),
      'not_found_in_trash' => esc_html__('Nothing found in Trash', 'evox-elements'),
      'parent_item_colon'  => ''
    );
    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'query_var'          => true,
      'show_in_rest'       => true,
      'capability_type'    => 'post',
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array('title', 'editor','author','excerpt', 'thumbnail','comments'), //'editor', 'excerpt', 'comments',
      'rewrite'            => array('slug' => 'portfolio', 'with_front' => false ),
        'has_archive' => true
    );
    register_post_type('portfolio', $args);
    register_taxonomy(
      "portfolio-category", array( "portfolio" ), array(
      "hierarchical"   => true,
      "show_in_rest"   => true,
      "label"          => esc_html__("Portfolio Categories",'evox-elements'),
      "singular_label" => esc_html__("Portfolio Categories",'evox-elements'),
      "rewrite"        => true ));
    register_taxonomy_for_object_type('portfolio-category', 'portfolio');

      // function tags
      register_taxonomy(
          "portfolio_tag",array("portfolio"), array(
              "hierarchical"   => '',
              "show_in_rest"   => true,
              "label"          => esc_html__("Portfolio Tags",'evox-elements'),
              "singular_label" => esc_html__("Portfolio Tags",'evox-elements'),
              "rewrite"        => ''
          )
      );
      register_taxonomy_for_object_type('portfolio_tag','portfolio');
  }

  // filter for portfolio first page
  add_filter("manage_edit-portfolio_columns", "templaza_show_portfolio_column");
  function templaza_show_portfolio_column($columns)
  {
    $columns = array(
      "cb"                 => "<input type=\"checkbox\" />",
      "title"              => esc_html__("Title",'evox-elements'),
      "author"             => esc_html__("Author",'evox-elements'),
      "portfolio-category" => esc_html__("Portfolio Categories",'evox-elements'),
      "portfolio_tag"     => esc_html__("Portfolio Tags",'evox-elements'),
      "date"               => esc_html__("date",'evox-elements')
    );

    return $columns;
  }

  add_action("manage_posts_custom_column", "templaza_portfolio_custom_columns");
  function templaza_portfolio_custom_columns($column)
  {
    global $post;
    switch ($column) {
      case "portfolio-category":
        echo get_the_term_list($post->ID, 'portfolio-category', '', ', ', '');
        break;
        case "portfolio_tag":
            echo get_the_term_list($post->ID, 'portfolio_tag', '', ', ', '');
            break;
    }
  }

  function get_portfolio_categories(){
    $taxonomy     = 'portfolio-category';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 0;

    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'hide_empty'   => $empty
    );

    $categories = get_categories( $args );

    return $categories;
  }

function get_cat_portfolio_ID( $cat_name ) {
    $cat = get_term_by( 'name', $cat_name, 'portfolio-category' );
    if ( $cat )
        return $cat->term_id;
    return 0;
}

function get_category_portfolio_link( $category ) {
    if ( ! is_object( $category ) )
        $category = (int) $category;

    $category = get_term_link( $category, 'portfolio-category' );

    if ( is_wp_error( $category ) )
        return '';

    return $category;
}
if ( class_exists( 'RWMB_Loader')){
add_filter( 'rwmb_meta_boxes', 'templaza_portfolio_meta_boxes' );
function templaza_portfolio_meta_boxes( $templaza_portfolio_meta_boxes ) {
    $templaza_portfolio_meta_boxes[] = array(
        'id'         => 'templaza_portfolio_options',
        'title'      => esc_html__( 'Portfolio Options', 'evox-elements' ),
        'post_types' => 'portfolio',
        'autosave'   => true,
        'fields'     => array(
	        array(
		        'name'             => esc_html__( 'Gallery', 'evox-elements' ),
		        'id'               => "gallery",
		        'type'             => 'image_advanced',
		        // Delete image from Media Library when remove it from post meta?
		        // Note: it might affect other posts if you use same image for multiple posts
		        'force_delete'     => false,
		        // Maximum image uploads
		        'max_file_uploads' => '',
		        // Display the "Uploaded 1/2 files" status
		        'max_status'       => true,
	        ),
	        array(
		        'id'    => 'oembed',
		        'name'  => esc_html__( 'Embed Code', 'evox-elements' ),
		        'type'  => 'oembed',

		        // Input size
		        'size'  => 30,
	        ),
        ),
    );
    return $templaza_portfolio_meta_boxes;
}
}