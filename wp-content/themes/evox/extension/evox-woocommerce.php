<?php
/*
 * Functions for WooCommerce Integration
 */

if ( is_admin() ) {
    add_action( 'admin_init', 'evox_compatible_with_woocommerce' );
} else {
    add_action( 'init', 'evox_compatible_with_woocommerce' );
}

if ( ! function_exists( 'evox_woocommerce_init' ) ) {
    function evox_woocommerce_init() {
        global $evox_options;

        if ( ! empty( $evox_options['evox_woocommerce_integration'] ) ) {
            // create necessary product category terms
            $product_cats = array(
                'tour' => esc_html__('Tours', 'evox'),
            );
            foreach ( $product_cats as $slug => $name ) {
                if ( ! term_exists( $slug , 'product_cat' ) ) {
                    evox_woo_create_product_category( $slug, $name );
                }
            }

            add_filter( 'post_type_link', 'evox_woo_update_product_link', 10, 4  );
        }
    }
}
add_action( 'init', 'evox_woocommerce_init' );

/*
 * Create Woocommerce product category terms
 */
if ( ! function_exists( 'evox_woo_create_product_category' ) ) {
    function evox_woo_create_product_category( $term_slug, $term_name ) {
        wp_insert_term(
            $term_name,
            'product_cat', // the taxonomy
            array(
                'description'=> esc_html__('Custom Category for WooCommerce integration','evox'),
                'slug' => $term_slug,
            )
        );
    }
}

/*
 * Disable generated product link and set it property link
 */
if ( ! function_exists( 'evox_woo_update_product_link' ) ) {
    function evox_woo_update_product_link( $post_link, $post ) {
        if ( $post->post_type === 'product' ) {
            $evox_post_id = get_post_meta( $post->ID, 'evox_post_id', true );
            if ( ! empty( $evox_post_id ) ) {
                $post_link = get_permalink( $evox_post_id );
            }
        }
        return $post_link;
    }
}

/*
 * Return WooCommerce Cart Page URL
 */
if ( ! function_exists( 'evox_get_woocommerce_cart_url' ) ) {
    function evox_get_woocommerce_cart_url( $evox_default_cart_url ) {
        if ( evox_is_woocommerce_integration_enabled() ) {
            return WC_Cart::get_cart_url();
        } else {
            return $evox_default_cart_url;
        }
    }
}
add_filter( 'evox_get_woocommerce_cart_url', 'evox_get_woocommerce_cart_url' );

// Add actions/filters to make Citytours compatible with WooCommerce
if ( ! function_exists( 'evox_compatible_with_woocommerce' ) ) {
    function evox_compatible_with_woocommerce() {

        if ( evox_is_woocommerce_integration_enabled() ) {

            add_action( 'plugins_loaded', 'evox_register_simple_tour_product_type' );
            add_action( 'woocommerce_product_data_panels', 'evox_tour_options_product_tab_content' );
            add_action( 'product_type_options', 'evox_enable_product_type_options');

            /* ADD Order when customer checkout with WooCommerce */
            add_action( 'woocommerce_order_status_completed', 'evox_change_order_status_as_completed', 11, 1 );
            add_action( 'woocommerce_checkout_order_processed', 'evox_add_new_booking_order', 15 );
            add_action( 'woocommerce_checkout_order_processed', 'evox_clear_cart_info', 20 );

            add_filter( 'product_type_selector', 'evox_add_custom_product_type' );
            add_filter( 'woocommerce_product_data_tabs', 'evox_add_custom_product_tabs' );
            add_filter( 'woocommerce_product_data_tabs', 'evox_add_custom_css_to_panels' );
        }
    }
}

/**
 * Register the Hotel product type after init
 */
if ( ! function_exists( 'evox_register_simple_tour_product_type' ) ) {
    function evox_register_simple_tour_product_type() {

        class WC_Product_Tour extends WC_Product {

            public function __construct( $product ) {
                $this->product_type = 'simple_tour';
                parent::__construct( $product );
            }

        }

    }
}

/**
 * Contents of the Hotel options product tab.
 */
if ( ! function_exists( 'evox_tour_options_product_tab_content' ) ) {
    function evox_tour_options_product_tab_content() {

        global $post;
        $evox_tour_id = get_post_meta( $post->ID, 'evox_post_id', true );

        ?>

        <div id='tour_options' class='panel woocommerce_options_panel'>
            <?php if ( get_post_type( $evox_tour_id ) == 'tour' ) : ?>
                <div class='options_group'>
                    <?php
                    $tour_date = get_post_meta( $post->ID, 'evox_booking_date', true );

                    $booking_info = get_post_meta( $post->ID, 'evox_booking_info' );
                    ?>
                    <div class="booking-date-container">
                        <div class="booking-date">
                            <label for="booking_date"><?php _e('Book Date : ', 'evox') ?></label>
                            <input type="text" id="booking_date" value="<?php echo $tour_date ?>">
                        </div>
                    </div>
                    <table class="tour-container">
                        <thead><tr>
                            <th><?php _e('Item', 'evox') ?></th>
                            <th><?php _e('Adults', 'evox') ?></th>
                            <th><?php _e('Children', 'evox') ?></th>
                            <th><?php _e('Combo', 'evox') ?></th>
                            <th><?php _e('Total', 'evox') ?></th>
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <a href="<?php echo get_edit_post_link( $booking_info[0]['tour_id'] ) ?>" target="_blank"><?php echo get_the_post_thumbnail( $booking_info[0]['tour_id'], 'thumbnail' ); ?></a>
                                </div>
                                <span class="item_cart"><a href="<?php echo get_edit_post_link( $booking_info[0]['tour_id'] ) ?>" target="_blank"><?php echo esc_html( get_the_title( $booking_info[0]['tour_id'] ) ); ?></a></span>
                            </td>
                            <td>
                                <input type="number" name="tour_adults" value="<?php echo $booking_info[0]['adults'] ?>" disabled>
                            </td>
                            <td>
                                <input type="number" name="tour_kids" value="<?php echo $booking_info[0]['kids'] ?>" disabled>
                            </td>
                            <td>
                                <input type="text" name="tour_combo" value="<?php echo $booking_info[0]['name_combo'] ?>" disabled>
                            </td>
                            <td>
                                <input type="text" name="tour_total" value="<?php echo evox_price($booking_info[0]['total_price']); ?>" disabled>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <?php
    }
}

/*
 * Enable original product type options for Hotel product type
 */
if ( ! function_exists( 'evox_enable_product_type_options' ) ) {
    function evox_enable_product_type_options( $options ) {
        $options['virtual']['wrapper_class'] = 'show_if_simple show_if_simple_tour';
        return $options;
    }
}

/*
 * Tour Booking Order when complete payment
 */
if ( ! function_exists( 'evox_add_new_booking_order' ) ) {
    function evox_add_new_booking_order( $order_id ) {
        global $wpdb;
//        $order = new WC_Order( $order_id );
        $order = wc_get_order( $order_id );
        $items = $order->get_items();

        $customer_id = $order->user_id;
        $evox_order_info = array();
        $evox_order_info['deposit_paid'] = 1;
        $evox_order_info['first_name'] = get_user_meta( $customer_id, 'billing_first_name', true );
        $evox_order_info['last_name'] = get_user_meta( $customer_id, 'billing_last_name', true );
        $evox_order_info['email'] = get_user_meta( $customer_id, 'billing_email', true );
        $evox_order_info['phone'] = get_user_meta( $customer_id, 'billing_phone', true );
        $evox_order_info['country'] = get_user_meta( $customer_id, 'billing_country', true );
        $evox_order_info['address'] = get_user_meta( $customer_id, 'billing_address_1', true );
        $evox_order_info['city'] = get_user_meta( $customer_id, 'billing_city', true );
        $evox_order_info['state'] = get_user_meta( $customer_id, 'billing_state', true );
        $evox_order_info['zip'] = get_user_meta( $customer_id, 'billing_postcode', true );
        $evox_order_info['other'] = $order_id;

        $result = $wpdb->get_var( 'SELECT id FROM  ' . $wpdb->prefix . 'evox_order WHERE other = ' . $order_id );
        if ( empty( $result ) ) {
            foreach ( $items as $item ) {
                $flag_custom = false;
                $total_price = 0;
                $total_adults = 0;
                $total_kids = 0;
                $people_combo = 0;


                $product_id = $item['product_id'];
                $evox_tour_id = get_post_meta( $product_id, 'evox_post_id', true );

                $total = get_post_meta( $product_id, 'evox_total_price', true );
                if ( $total && !empty($total) ) {
                    $total_price += $total;
                }
                $booking_info = get_post_meta( $product_id, 'evox_booking_info' );

                if ( $evox_tour_id ) {
                    $flag_custom = true;
                    $booking_date = get_post_meta( $product_id, 'evox_booking_date', true );
                    $evox_order_info['date_from'] = date( 'Y-m-d', evox_strtotime( $booking_date ) );

                    $booking_time = get_post_meta( $product_id, 'evox_booking_time', true );
                    $evox_order_info['time'] = $booking_time;

                    $total_adults += $booking_info[0]['adults'];
                    $total_kids += $booking_info[0]['kids'];
                    $people_combo += $booking_info[0]['people_combo'];
                }

                if ( $flag_custom ) {

                    $evox_order_info['name_combo']      = $booking_info[0]['name_combo'];
                    $evox_order_info['people_combo']    = $people_combo;
                    $evox_order_info['price_combo']     = $booking_info[0]['price_combo'];
                    $evox_order_info['total_price']     = $total_price;
                    $evox_order_info['total_adults']    = $total_adults;
                    $evox_order_info['total_kids']      = $total_kids;
                    $evox_order_info['status']          = 'new';
                    $evox_order_info['deposit_paid']    = 1;
                    $evox_order_info['mail_sent'] = 1;
                    $evox_order_info['post_id'] = $evox_tour_id;

                    /* Insert Booking Order into evox_ORDER_TABLE */
                    $evox_latest_order_id = $wpdb->get_var( 'SELECT id FROM ' . $wpdb->prefix . 'evox_order ORDER BY id DESC LIMIT 1' );
//                $evox_latest_order_id = $wpdb->get_var( $wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'evox_order ORDER BY id DESC LIMIT 1',"foo") );
                    $evox_booking_no = mt_rand( 1000, 9999 );
                    $evox_booking_no .= $evox_latest_order_id;
                    $evox_pin_code = mt_rand( 1000, 9999 );

                    $evox_order_info['booking_no'] = $evox_booking_no;
                    $evox_order_info['pin_code'] = $evox_pin_code;
                    $evox_order_info['currency_code'] = get_woocommerce_currency();
                    $evox_order_info['created'] = date( 'Y-m-d H:i:s' );
                    $evox_order_info['post_type'] = get_post_type( $evox_tour_id );

                    if ( $wpdb->insert( $wpdb->prefix . 'evox_order', $evox_order_info ) ) {
                        $evox_order_id = $wpdb->insert_id;

                        if ( ! empty( $booking_info ) ) {
                            $tour_booking_info = array();
                            $tour_booking_info['order_id']      = $evox_order_id;
                            $tour_booking_info['tour_id']       = $evox_tour_id;
                            $tour_booking_info['tour_time']     = $booking_time;
                            $tour_booking_info['tour_date']     = $booking_date;
                            $tour_booking_info['adults']        = $booking_info[0]['adults'];
                            $tour_booking_info['kids']          = $booking_info[0]['kids'];
                            $tour_booking_info['people_combo']  = $booking_info[0]['people_combo'];
                            $tour_booking_info['total_price']   = $booking_info[0]['total_price'];

                            $wpdb->insert( $wpdb->prefix . 'evox_tour_bookings', $tour_booking_info );
                        }
                    }

                }
            }
        }

        // Get Order Payment Method
        // $payment_method = get_post_meta( $order_id, '_payment_method', true );
    }
}


/**
 * Change Hotel/Tour order status to "Confirmed" after WooCommerce Order status is changed as "Completed"
 */
if ( ! function_exists( 'evox_change_order_status_as_completed' ) ) {
    function evox_change_order_status_as_completed( $order_id ) {
        global $wpdb, $ct_options;

        $order = new WC_Order( $order_id );
        $items = $order->get_items();

        foreach ( $items as $item ) {
            $product_id = $item['product_id'];
            $evox_tour_id = get_post_meta( $product_id, 'evox_post_id', true );

            if ( $evox_tour_id ) {
                // $result = $wpdb->get_var( 'SELECT id FROM ' . CT_ORDER_TABLE . ' WHERE other = ' . $order_id, ARRAY_A );
                $wpdb->update( $wpdb->prefix . 'evox_order', array( 'status' => 'confirmed' ), array( 'other' => $order_id ), array( '%s' ), array( '%d' ) );
            }
        }
    }
}

/*
 *
 */
if ( ! function_exists( 'evox_clear_cart_info' ) ) {
    function evox_clear_cart_info( $order_id ) {
        $order = new WC_Order( $order_id );
        $items = $order->get_items();

        foreach ( $items as $item ) {
            $post_id = get_post_meta( $item['product_id'], 'evox_post_id', true );
            $uid = '';

            if ( $post_id && !empty( $post_id ) ) {
                $booking_date = get_post_meta( $item['product_id'], 'evox_booking_date', true );
                $uid = $post_id . $booking_date;

                if ( $cart_data = evox_Session_Cart::evox_get( $uid ) ) {
                    evox_Session_Cart::evox_unset( $uid );
                }
            }
        }
    }
}

/**
 * Add to product type drop down.
 */
if ( ! function_exists( 'evox_add_custom_product_type' ) ) {
    function evox_add_custom_product_type( $types ){
        $types[ 'simple_tour' ] = esc_html__( 'Tour','evox' );
        return $types;
    }
}

/**
 * Add a Tour product tab.
 */
if ( ! function_exists( 'evox_add_custom_product_tabs' ) ) {
    function evox_add_custom_product_tabs( $tabs ) {

        $tabs['tour'] = array(
            'label'     => esc_html__( 'Tour', 'evox' ),
            'target'    => 'tour_options',
            'class'     => array( 'show_if_simple_tour' ),
        );

        return $tabs;
    }
}

/**
 * Add custom CSS classes to each data panel.
 */
if ( ! function_exists( 'evox_add_custom_css_to_panels' ) ) {
    function evox_add_custom_css_to_panels( $tabs ) {

        $tabs['inventory']['class'][] = 'show_if_simple_tour';
        $tabs['attribute']['class'][] = 'hide_if_simple_tour';
        $tabs['advanced']['class'][] = 'hide_if_simple_tour';

        return $tabs;
    }
}

/*
 * Filter shop page query not to show products Tour category
 * sondt
 * */
if ( ! function_exists( 'evox_shop_filter_certain_cat' ) ) {
    function evox_shop_filter_certain_cat( $query ) {
        if ( !is_admin() && is_post_type_archive( 'product' ) && $query->is_main_query() ) {

//            $query->set( 'orderby', 'date' );
//            $query->set( 'order', 'ASC' ); // or DESC

            $query->set('tax_query', array(
                    array(
                        'taxonomy'  => 'product_cat',
                        'field'     => 'slug',
                        'terms'     => array( 'tour' ),
                        'operator'  => 'NOT IN'
                    )
                )
            );

            global $evox_options;
            $evox_product_posts_per_page = ((!isset($evox_options['evox_shop_products_per_page'])) || empty($evox_options['evox_shop_products_per_page'])) ? '6' : $evox_options['evox_shop_products_per_page'];

            $query->set('posts_per_page', $evox_product_posts_per_page);
        }
    }
}
//add_action( 'pre_get_posts','evox_shop_filter_certain_cat' );

add_action( 'woocommerce_product_query', 'evox_shop_filter_certain_cat' );

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'evox_woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'evox_woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'evox_woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Change number or products per row
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        global $evox_options;
        $evox_number_columns = ((!isset($evox_options['evox_shop_columns'])) || empty($evox_options['evox_shop_columns'])) ? '3' : $evox_options['evox_shop_columns'];
        return $evox_number_columns;
    }
}
//add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
//
//function new_loop_shop_per_page( $cols ) {
//    // $cols contains the current number of products per page based on the value stored on Options -> Reading
//    // Return the number of products you wanna show per page.
//    $cols = 5;
//    return $cols;
//}

if ( ! function_exists( 'evox_woocommerce_template_loop_product_title' ) ) {
    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function evox_woocommerce_template_loop_product_title() {
        echo '<h2 class="woocommerce-loop-product__title"><a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a></h2>';
    }
}

if ( ! function_exists( 'evox_woocommerce_template_loop_product_thumbnail' ) ) {
    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function evox_woocommerce_template_loop_product_thumbnail() {
        echo '<div class="tz-shop-product-thumb">';
        echo the_post_thumbnail();
        echo '<div class="tz-shop-product-button">';
        echo do_action( 'evox_woocommerce_after_shop_loop_item' );
        echo '</div>';
        echo '</div>';
    }
}

// check for plugin using plugin name
if(in_array('quick-view-woocommerce/xoo-quickview-main.php', apply_filters('active_plugins', get_option('active_plugins')))){
    //plugin is activated
    global $xoo_qv_button_position_value;

    if($xoo_qv_button_position_value == 'woocommerce_after_shop_loop_item'){
        remove_action('woocommerce_after_shop_loop_item','xoo_qv_button',11); // Quick View button
        add_action( 'evox_woocommerce_after_shop_loop_item', 'xoo_qv_button', 11 );
    }

    remove_action( 'xoo-qv-images', 'woocommerce_show_product_sale_flash', 10 );
}

add_filter( 'woocommerce_products_widget_query_args', function( $query_args ){
    // Set HERE your product category slugs
    $query_args['tax_query'] = array( array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'     => array( 'tour' ),
        'operator'  => 'NOT IN'
    ));

    return $query_args;
}, 10, 1 );

add_filter( 'woocommerce_product_categories_widget_args', 'rv_exclude_wc_widget_categories' );
function rv_exclude_wc_widget_categories( $cat_args ) {
    $category_product_tour = get_term_by('slug', 'tour', 'product_cat');
    $cat_args['exclude'] = array( $category_product_tour->term_id ); // Insert the product category IDs you wish to exclude
    return $cat_args;
}

/* Override widget woocommerce top rated products */

function evox_override_woocommerce_widgets() {
    if ( class_exists( 'WC_Widget_Top_Rated_Products' ) ) {
        unregister_widget( 'WC_Widget_Top_Rated_Products' );
        include_once('widget-woo/tz-widget-top-rated-products.php' );
        register_widget( 'evox_WC_Widget_Top_Rated_Products' );
    }
    if ( class_exists( 'WC_Widget_Cart' ) ) {
        unregister_widget( 'WC_Widget_Cart' );
        get_template_part('extension/widget-woo/evox','widget-cart');
        register_widget( 'evox_WC_Widget_Cart' );
    }
}
add_action( 'widgets_init', 'evox_override_woocommerce_widgets', 15 );

function evox_wc_remove_quantity_field_from_cart( $return, $product ) {
    if ( is_cart() ) return false;
//    switch ( $product->product_type ) :
//        case "variable":
//            return true;
//            break;
//        case "grouped":
//            return true;
//            break;
//        case "simple_tour":
//            return false;
//            break;
//        default: // simple product type
//            return true;
//            break;
//    endswitch;
}
add_filter( 'woocommerce_is_sold_individually', 'evox_wc_remove_quantity_field_from_cart', 10, 2 );

add_action( 'woocommerce_after_order_itemmeta', 'evox_add_order_tour_info', 20, 3 );
function evox_add_order_tour_info( $item_id, $item, $product ) {
    global $wpdb;
    $order_id = $item->get_order_id();
    $evox_tour_id = get_post_meta( $product->get_id(), 'evox_post_id', true );
    if(get_post_type($evox_tour_id) == 'tour'){
        $order_tour_data = $wpdb->get_row( 'SELECT * FROM  ' . $wpdb->prefix . 'evox_order WHERE post_id = '. $evox_tour_id .' AND other = ' . $order_id );
//        var_dump($evox_tour_id,$order_tour_data);
        if($order_tour_data->name_combo != ''){
            echo esc_html__('Combo: ','evox') . esc_html($order_tour_data->name_combo);
        }else{
            echo esc_html__('Adult x','evox') . esc_html($order_tour_data->total_adults) . esc_html__(' and ','evox') . esc_html__('Child x','evox') . esc_html($order_tour_data->total_kids);
        }
    }
}


/* Start get cart */
if ( ! function_exists( 'evox_get_cart_item' ) ) :

    function evox_get_cart_item() {

        ?>
        <div class="tz-icon-cart">
            <a class="shop-woo__your-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e('View your shopping cart', 'evox'); ?>">
                <span class="icon"><i class="fa fa-opencart"></i></span>
                <span class="shop-woo__item-total count">
                    <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'evox' ), WC()->cart->get_cart_contents_count() ); ?>
                </span>
            </a>
        </div>
        <?php
    }

endif;
add_action( 'evox_get_cart_item', 'evox_get_cart_item', 10 );
if ( ! function_exists( 'evox_add_to_cart_fragment' ) ) :

    function evox_add_to_cart_fragment( $evox_fragments ) {

        ob_start();

        do_action( 'evox_get_cart_item' );

        $evox_fragments['div.tz-icon-cart'] = ob_get_clean();

        return $evox_fragments;

    }

endif;
add_action( 'woocommerce_add_to_cart_fragments', 'evox_add_to_cart_fragment' );

//////////
if ( ! function_exists( 'evox_get_cart_shop' ) ) :

    function evox_get_cart_shop() {

        ?>

        <?php global $woocommerce; ?>
        <a class="your-class-name" href="<?php echo wc_get_cart_url(); ?>"
           title="<?php _e('Cart View', 'woothemes'); ?>">
            <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
                $woocommerce->cart->cart_contents_count); ?> -
            <?php echo $woocommerce->cart->get_cart_subtotal(); ?>
        </a>
        <?php
    }

endif;
add_action( 'evox_get_cart_shop', 'evox_get_cart_shop', 10 );
if ( ! function_exists( 'evox_add_to_cart_shop' ) ) :

    function evox_add_to_cart_shop( $evox_fragmentes ) {

        ob_start();

        do_action( 'evox_get_cart_shop' );

        $evox_fragmentes['a.your-class-name'] = ob_get_clean();

        return $evox_fragmentes;

    }

endif;
add_action( 'woocommerce_add_to_cart_fragments', 'evox_add_to_cart_shop' );
