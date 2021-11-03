<?php
add_filter('rwmb_meta_boxes', 'evox_header_page_meta_boxes');
function evox_header_page_meta_boxes($evox_header_page_meta_boxes)
{
    $evox_header_page_meta_boxes[] = array(
        'id' => 'evox_header_footer_page_options',
        'title' => esc_html__('Header Page Options', 'evox'),
        'post_types' => 'page',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => esc_html__('Header Option', 'evox'),
                'id' => "evox_header_page_option",
                'type' => 'select',
                'desc' => esc_html__('If you select Default, Header will get options in Theme Options', 'evox'),
                'options' => array(
                    'default' => esc_html__('Default', 'evox'),
                    'custom' => esc_html__('Custom', 'evox'),
                ),
                'std' => 'default',
            ),
            array(
                'name' => esc_html__('Header Type', 'evox'),
                'id' => "evox_header_page_type",
                'type' => 'select',
                'options' => array(
                    '0'  => esc_html__('Header Type 1', 'evox'),
                    '1'  => esc_html__('Header type 2', 'evox'),
                    '2'  => esc_html__('Header type 3', 'evox'),
                    '3'  => esc_html__('Header type 4', 'evox'),
                    '4'  => esc_html__('Header type 5', 'evox'),
                    '5'  => esc_html__('Header type 6', 'evox'),
                    '6'  => esc_html__('Header type 7', 'evox'),
                    '7'  => esc_html__('Header type 8', 'evox'),
                    '8'  => esc_html__('Header type 9', 'evox'),
                    '9'  => esc_html__('Header type 10', 'evox'),
                    '10' => esc_html__('Header type 11', 'evox'),
                ),
                'std' => '0',
            ),

        ),
    );
    return $evox_header_page_meta_boxes;
}