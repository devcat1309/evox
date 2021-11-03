<?php
add_filter( 'rwmb_meta_boxes', 'evox_page_general_meta_boxes' );
function evox_page_general_meta_boxes( $evox_page_general_meta_boxes ) {
    $evox_page_general_meta_boxes[] = array(
        'id'         => 'evox_page_general_options',
        'title'      => esc_html__( 'Page General Options', 'evox' ),
        'post_types' => 'page',
        'autosave'   => true,
        'fields'     => array(
            array(
                'name'      => esc_html__( 'Row Option', 'evox' ),
                'id'        => "evox_page_general_row",
                'type'      => 'select',
                'options'   => array(
                    'container'  => esc_html__('Container','evox'),
                    'no-container'  => esc_html__('No Container','evox'),
                ),
                'std'       => 'container',
            ),
            array(
                'name'      => esc_html__( 'Padding Top(px)', 'evox' ),
                'id'        => "evox_page_general_padding_top",
                'type'      => 'text',
                'std'       => '',
                'desc'      => esc_html__('Default:90px','evox'),
            ),
            array(
                'name'      => esc_html__( 'Padding Bottom(px)', 'evox' ),
                'id'        => "evox_page_general_padding_bottom",
                'type'      => 'text',
                'std'       => '',
                'desc'      => esc_html__('Default:90px','evox'),
            ),
            array(
                'name' => esc_html__( 'Background Color', 'evox' ),
                'id'   => "evox_page_general_backgroud_color",
                'type' => 'color',
            ),
        ),
    );
    return $evox_page_general_meta_boxes;
}