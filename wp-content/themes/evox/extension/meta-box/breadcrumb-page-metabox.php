<?php
add_filter( 'rwmb_meta_boxes', 'evox_breadcrumb_page_meta_boxes' );
function evox_breadcrumb_page_meta_boxes( $evox_breadcurmb_page_meta_boxes ) {
    $evox_breadcurmb_page_meta_boxes[] = array(
        'id'         => 'evox_breadcrumb_page_options',
        'title'      => esc_html__( 'Breadcrumb Page Options', 'evox' ),
        'post_types' => 'page',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Breadcrumb Option', 'evox' ),
                'id'        => "evox_breadcrumb_page_option",
                'type'      => 'select',
                'desc'      => esc_html__('If you select Default, Breadcrumb will get options in Theme Options','evox'),
                'options'   => array(
                    'default'  => esc_html__('Default','evox'),
                    'custom'  => esc_html__('Custom','evox'),
                ),
                'std'       => 'default',
            ),
            array(
                'name'      => esc_html__( 'Show Hide Breadcrumb', 'evox' ),
                'id'        => "evox_breadcrumb_page_show",
                'type'      => 'select',
                'options'   => array(
                    '1'  => esc_html__('Show','evox'),
                    '2'  => esc_html__('Hide','evox'),
                ),
                'std'       => '1',
            ),

            // IMAGE ADVANCED - RECOMMENDED
            array(
                'name'             => esc_html__( 'Image Background', 'evox' ),
                'id'               => "evox_breadcrumb_page_bgimage",
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
                // Display the "Uploaded 1/2 files" status
                'max_status'       => false,
            ),

            array(
                'name'      => esc_html__( 'Show Hide Title', 'evox' ),
                'id'        => "evox_breadcrumb_page_title",
                'type'      => 'select',
                'options'   => array(
                    '1'  => esc_html__('Show','evox'),
                    '2'  => esc_html__('Hide','evox'),
                ),
                'std'       => '1',
            ),

            array(
                'name'      => esc_html__( 'Show Hide Path Breadcrumb', 'evox' ),
                'id'        => "evox_breadcrumb_page_path",
                'type'      => 'select',
                'options'   => array(
                    '1'  => esc_html__('Show','evox'),
                    '2'  => esc_html__('Hide','evox'),
                ),
                'std'       => '1',
            ),

            array(
                'name'      => esc_html__( 'Padding Top Of Breadcrumb(px)', 'evox' ),
                'id'        => "evox_breadcrumb_page_padding_top",
                'type'      => 'text',
                'std'       => '',
                'desc'      => esc_html__('Default:60px','evox'),
            ),
            array(
                'name'      => esc_html__( 'Padding Bottom Of Breadcrumb(px)', 'evox' ),
                'id'        => "evox_breadcrumb_page_padding_bottom",
                'type'      => 'text',
                'std'       => '',
                'desc'      => esc_html__('Default:60px','evox'),
            ),
        ),
    );
    return $evox_breadcurmb_page_meta_boxes;
}