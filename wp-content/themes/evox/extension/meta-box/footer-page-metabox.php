<?php
add_filter('rwmb_meta_boxes', 'evox_footer_page_meta_boxes');
function evox_footer_page_meta_boxes($evox_footer_page_meta_boxes)
{
    $evox_footer_page_meta_boxes[] = array(
        'id' => 'evox_footer_page_options',
        'title' => esc_html__('Footer Page Options', 'evox'),
        'post_types' => 'page',
        'autosave' => true,
        'fields' => array(

            array(
                'name' => esc_html__('Footer Top Option', 'evox'),
                'id' => "evox_footer_page_option",
                'type' => 'select',
                'desc' => esc_html__('If you select Default, Footer Top will get options in Theme Options', 'evox'),
                'options' => array(
                    'default' => esc_html__('Default', 'evox'),
                    'custom' => esc_html__('Custom', 'evox'),
                ),
                'std' => 'default',
            ),
            array(
                'name' => esc_html__('Footer Type', 'evox'),
                'id' => "evox_footer_page_type",
                'type' => 'select',
                'options' => array(
                    '3' => esc_html__('Select Footer Type', 'evox'),
                    '0' => esc_html__('Footer Type 1', 'evox'),
                    '1' => esc_html__('Footer type 2', 'evox'),
                    '2' => esc_html__('Footer type 3', 'evox'),
                ),
                'std' => '3',
            ),
            array(
                'name' => esc_html__('Option Background', 'evox'),
                'id' => "evox_footer_one_option",
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Custom Background', 'evox'),
                    '1' => esc_html__('No Background', 'evox'),
                ),
                'std' => '1',
            ),
            array(
                'name' => esc_html__('Footer Background Image', 'evox'),
                'id' => "evox_footer_page_bgimage",
                'type' => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete' => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
                // Display the "Uploaded 1/2 files" status
                'max_status' => false,
            ),
            array(
                'name' => __(" ".'<span>&nbsp;</span>'."", 'evox'),
                'desc' => esc_html__('Footer Background Color', 'evox'),
                'id' => "evox_footer_page_bgcolo",
                'type' => 'color',
            ),
            array(
                'name' => esc_html__('Padding Bottom', 'evox'),
                'id' => "evox_footer_page_padding",
                'type' => 'text',
                'desc' => 'Ex: 50px',
            ),
            array(
                'name' => esc_html__('Branch Gallery', 'evox'),
                'id' => "evox_footer_gallery_type",
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Show', 'evox'),
                    '1' => esc_html__('Hide', 'evox'),
                ),
                'std' => '0',
            ),
            array(
                'name' => esc_html__('Footer Bottom Option', 'evox'),
                'id' => "evox_footer_bottom_page_option",
                'type' => 'select',
                'desc' => esc_html__('If you select Default, Footer Bottom will get options in Theme Options', 'evox'),
                'options' => array(
                    'default' => esc_html__('Default', 'evox'),
                    'custom' => esc_html__('Custom', 'evox'),
                ),
                'std' => 'default',
            ),
            array(
                'name' => esc_html__('Footer Bottom Type', 'evox'),
                'id' => "evox_footer_bottom_page_type",
                'type' => 'select',
                'options' => array(
                    '0' => esc_html__('Footer Menu', 'evox'),
                    '1' => esc_html__('Footer Social', 'evox'),
                    '2' => esc_html__('Footer Logo Branch', 'evox'),
                ),
                'std' => '0',
            ),

        ),
    );
    return $evox_footer_page_meta_boxes;
}