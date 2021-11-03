<?php
add_filter('rwmb_meta_boxes', 'evox_newsletter_page_meta_boxes');
function evox_newsletter_page_meta_boxes($evox_newsletter_page_meta_boxes)
{
    $evox_newsletter_page_meta_boxes[] = array(
        'id' => 'evox_newsletter_page_options',
        'title' => esc_html__('Newsletter Page Options', 'evox'),
        'post_types' => 'page',
        'autosave' => true,
        'fields' => array(
            array(
                'name' => esc_html__('Newsletter Option', 'evox'),
                'id' => "evox_newsletter_page_option",
                'type' => 'select',
                'desc' => esc_html__('If you select Default, Newsletter will get options in Theme Options', 'evox'),
                'options' => array(
                    'default' => esc_html__('Default', 'evox'),
                    'custom' => esc_html__('Custom', 'evox'),
                ),
                'std' => 'default',
            ),

            array(
                'name' => esc_html__('Newsletter Type', 'evox'),
                'id' => "evox_newsletter_page_type",
                'type' => 'select',
                'desc' => '',
                'options' => array(
                    '0' => esc_html__('Newsletter Type 1', 'evox'),
                    '1' => esc_html__('Newsletter Type 2', 'evox'),
                    '3' => esc_html__('Newsletter Type 3', 'evox'),
                    '4' => esc_html__('Newsletter Type 4', 'evox'),
                    '2' => esc_html__('Hide Newsletter', 'evox'),

                ),
                'std' => '0',
            ),

            array(
                'name' => esc_html__('Title', 'evox'),
                'id' => "evox_newsletter_page_title",
                'type' => 'textarea',
                'std' => esc_html__('Submit your newsletter', 'evox'),
                'desc' => '',
            ),

            array(
                'name' => esc_html__('Subtitle', 'evox'),
                'id' => "evox_newsletter_page_subtitle",
                'type' => 'text',
                'std' => esc_html__('Register now! We will send you best offers for your trip.', 'evox'),
                'desc' => '',
            ),

            // IMAGE ADVANCED - RECOMMENDED
            array(
                'name' => esc_html__('Background Image', 'evox'),
                'id' => "evox_newsletter_page_bgimage",
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
                'name' => esc_html__('Background Color', 'evox'),
                'id' => "evox_newsletter_page_bgcolo",
                'type' => 'color',
            )
        ),
    );
    return $evox_newsletter_page_meta_boxes;
}