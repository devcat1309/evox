<?php

defined('Evox_Elements_BUILDERS') or exit();

class Evox_Elements_Builders_Helper{
    public static function get_cat_taxonomy( $term = 'category', $cats = false, $vc = false ) {
        if ( ! $cats ) {
            $cats = array();
        }
        if ( is_admin() ) {
            $args  = array(
                'pad_counts'   => 1,
                'hierarchical' => 1,
                'hide_empty'   => 1,
                'orderby'      => 'name',
                'menu_order'   => false
            );
            $terms = get_terms( $term, $args );

            if ( is_wp_error( $terms ) ) {
            } else {
                if ( empty( $terms ) ) {
                } else {
                    $prefix = '';
                    foreach ( $terms as $term ) {
                        if ( $term->parent > 0 ) {
                            $prefix = "--";
                        }
                        if ( $vc == true ) {
                            $cats[$prefix . $term->name] = $term->term_id;
                        } else {
                            $cats[$term->term_id] = $prefix . $term->name;
                        }
                    }
                }
            }
        }

        return $cats;
    }

    public static function get_elements() {
        $TB       = TemplazaElements_Builder::instance();
        $elements = $TB->get_elements();

        // allow unset elements
        $unset = apply_filters( 'evox-elements-builder/elements-unset', array() );

        foreach ( $elements as $plugin => $_elements ) {
            foreach ( $unset as $item ) {
                $index = array_search( $item, $_elements );

                if ( $index != false ) {
                    unset( $elements[$plugin][$index] );
                }
            }
        }

        return $elements;
    }

    public static function get_group( $name ) {

        $TB       = TemplazaElements_Builder::instance();
        $elements = $TB->get_elements();

        foreach ( $elements as $group => $_elements ) {
            if ( in_array( $name, $_elements ) ) {
                return $group;
            }
        }

        return apply_filters( 'evox-elements-builder/default-group', 'general', $name );
    }
    
    public static function get_list_image_size($vc = false) {
        global $_wp_additional_image_sizes;

        $sizes                        = array();
        $get_intermediate_image_sizes = get_intermediate_image_sizes();

        // Create the full array with sizes and crop info
        foreach ( $get_intermediate_image_sizes as $_size ) {

            if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

                $sizes[$_size]['width']  = get_option( $_size . '_size_w' );
                $sizes[$_size]['height'] = get_option( $_size . '_size_h' );
                $sizes[$_size]['crop']   = (bool) get_option( $_size . '_crop' );

            } elseif ( isset( $_wp_additional_image_sizes[$_size] ) ) {

                $sizes[$_size] = array(
                    'width'  => $_wp_additional_image_sizes[$_size]['width'],
                    'height' => $_wp_additional_image_sizes[$_size]['height'],
                    'crop'   => $_wp_additional_image_sizes[$_size]['crop']
                );

            }

        }

        $image_size                                        = array();
        if($vc) {
            $image_size[esc_html__("No Image", 'evox_elements')] = 'none';
            $image_size[esc_html__("Custom Image", 'evox_elements')] = 'custom_image';
        }else{
            $image_size['none']         = esc_html__("No Image", 'evox_elements');
            $image_size['custom_image'] = esc_html__("Custom Image", 'evox_elements');
        }
        if ( ! empty( $sizes ) ) {
            foreach ( $sizes as $key => $value ) {
                if ( $value['width'] && $value['height'] ) {
                    if($vc) {
                        $image_size[$value['width'] . 'x' . $value['height']] = $key;
                    }else{
                        $image_size[$key]   = $value['width'] . 'x' . $value['height'];
                    }
                } else {
                    $image_size[$key] = $key;
                }

            }
        }

        return $image_size;
    }

    public static function get_feature_image( $attachment_id, $size_type = null, $width = null, $height = null,
                                              $alt = null, $title = null, $no_lazyload = null ) {

        if ( ! $size_type ) {
            $size_type = 'full';
        }
        $style = '';
        if ( $width && $height ) {
            $src   = wp_get_attachment_image_src( $attachment_id, array( $width, $height ) );
            $style = ' width="' . $width . '" height="' . $height . '"';
        } else {
            $src = wp_get_attachment_image_src( $attachment_id, $size_type );
            if ( ! empty( $src[1] ) && ! empty( $src[2] ) ) {
                $style = ' width="' . $src[1] . '" height="' . $src[2] . '"';
            }
        }

        if ( ! $src ) {
            $query_args    = array(
                'post_type'   => 'attachment',
                'post_status' => 'inherit',
                'meta_query'  => array(
                    array(
                        'key'     => '_wp_attached_file',
                        'compare' => 'LIKE',
                        'value'   => 'demo_image.jpg'
                    )
                )
            );
            $attachment_id = get_posts( $query_args );
            if ( ! empty( $attachment_id ) && $attachment_id[0] ) {
                $attachment_id = $attachment_id[0]->ID;
                $src           = wp_get_attachment_image_src( $attachment_id, 'full' );
            }
        }


        if ( ! $alt ) {
            $alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ? get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) : get_the_title( $attachment_id );
        }
        if ( $no_lazyload == 1 ) {
            $style .= ' data-skip-lazy';
        }
        if ( ! $title ) {
            $title = get_the_title( $attachment_id );
        }

        if ( empty( $src ) ) {
            return '<img src="' . esc_url( get_template_directory_uri() . '/images/demo_images/demo_image.jpg' ) . '" alt="' . esc_attr( $alt ) . '" title="' . esc_attr( $title ) . '" ' . $style . '>';
        }

        return '<img src="' . esc_url( $src[0] ) . '" alt="' . esc_attr( $alt ) . '" title="' . esc_attr( $title ) . '" ' . $style . '>';

    }

    public static function excerpt( $limit ) {
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        if ( count( $excerpt ) >= $limit ) {
            array_pop( $excerpt );
            $excerpt = implode( " ", $excerpt ) . '...';
        } else {
            $excerpt = implode( " ", $excerpt );
        }
        $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

        return '<p>' . wp_strip_all_tags( $excerpt ) . '</p>';
    }
}