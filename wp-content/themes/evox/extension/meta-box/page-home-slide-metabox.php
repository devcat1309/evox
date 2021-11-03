<?php
add_filter( 'rwmb_meta_boxes', 'evox_home_slide_metaboxs' );
function evox_home_slide_metaboxs( $evox_home_slide_metaboxs ) {
    $evox_home_slide_metaboxs[] = array(
        'id'         => 'evox_home_slide_option',
        'title'      => esc_html__( 'Home Slide Option', 'evox' ),
        'post_types' => 'page',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Logo Type', 'evox' ),
                'id'        => "evox_home_slide_logo_type",
                'type'      => 'select',
                'options'   => array(
                    'text'     => esc_html__('Logo Text', 'evox'),
                    'image'    => esc_html__('Logo Image', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'image',
            ),

            array(
                'name'  => esc_html__( 'Logo Text', 'evox' ),
                'id'    => "evox_home_slide_logo_text",
                'type'  => 'text',
                'std'   => esc_html__( 'evox', 'evox' ),
            ),

            array(
                'name'             => esc_html__( 'Image Upload', 'evox' ),
                'id'               => "evox_home_slide_logo_image",
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'  => esc_html__( 'Revolution', 'evox' ),
                'id'    => "evox_home_slide_revolution",
                'type'  => 'text',
                'std'   => '',
                'desc'  => esc_html__('Insert the alias of slider revolution here.','evox')
            ),

            array(
                'type' => 'divider',
            ),

            array(
                'name'      => esc_html__( 'Search Option', 'evox' ),
                'id'        => "evox_home_slide_search_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'      => esc_html__( 'Field Name Option', 'evox' ),
                'id'        => "evox_home_slide_search_field_name_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Name Label', 'evox' ),
                'id'    => "evox_home_slide_search_field_name_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Keywords', 'evox' ),
            ),

            array(
                'name'      => esc_html__( 'Field Destination Option', 'evox' ),
                'id'        => "evox_home_slide_search_field_destination_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Destination Label', 'evox' ),
                'id'    => "evox_home_slide_search_field_destination_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Destination', 'evox' ),
            ),

            array(
                'name'      => esc_html__( 'Field Date Option', 'evox' ),
                'id'        => "evox_home_slide_search_field_date_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Date Label', 'evox' ),
                'id'    => "evox_home_slide_search_field_date_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Date', 'evox' ),
            ),

            array(
                'name'      => esc_html__( 'Field Duration Option', 'evox' ),
                'id'        => "evox_home_slide_search_field_duration_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Duration Label', 'evox' ),
                'id'    => "evox_home_slide_search_field_duration_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Duration', 'evox' ),
            ),

            array(
                'name'      => esc_html__( 'Field Categoy Option', 'evox' ),
                'id'        => "evox_home_slide_search_field_category_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Category Label', 'evox' ),
                'id'    => "evox_home_slide_search_field_category_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Category', 'evox' ),
            ),

            array(
                'name'      => esc_html__( 'Field Language Option', 'evox' ),
                'id'        => "evox_home_slide_search_field_language_option",
                'type'      => 'select',
                'options'   => array(
                    'show'     => esc_html__('Show', 'evox'),
                    'hide'     => esc_html__('Hide', 'evox'),
                ),
                'desc'      => '',
                'std'       => 'show',
            ),

            array(
                'name'  => esc_html__( 'Field Language Label', 'evox' ),
                'id'    => "evox_home_slide_search_field_language_label",
                'type'  => 'text',
                'std'   => esc_html__( 'Language', 'evox' ),
            ),

            array(
                'name'  => esc_html__( 'Button Search', 'evox' ),
                'id'    => "evox_home_slide_search_button",
                'type'  => 'text',
                'std'   => esc_html__( 'Search', 'evox' ),
            ),
        ),
    );
    return $evox_home_slide_metaboxs;
}