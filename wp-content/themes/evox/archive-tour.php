<?php
//global $evox_options,$evox_post_id,$evox_wishlist_url,$evox_wishlist;
global $evox_options,$evox_post_id,$evox_wishlist_url,$evox_wishlist,$evox_count,$evox_category_filter,$evox_language_filter,$evox_price_filter_jquery,$evox_destination_filter,$evox_order_by,$evox_order,$evox_list_grid_type,$evox_type;

get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

$evox_sidebar_min_price              = isset( $evox_options['evox_filter_sidebar_min_price'] ) ? $evox_options['evox_filter_sidebar_min_price']:'0';
$evox_sidebar_max_price              = isset( $evox_options['evox_filter_sidebar_max_price'] ) ? $evox_options['evox_filter_sidebar_max_price']:'10000';

/*  Demo    */
$evox_type = '';
if(isset($_GET['type']) && $_GET['type'] != ''){
    $evox_type = $_GET['type'];
}

/*  Check Url Taxonomy  */
$evox_tax_category = '';
if( is_tax( 'tour-category') ){
    $evox_term_slug = get_query_var( 'term' );
    $evox_taxonomy_name = get_query_var( 'taxonomy' );
    $evox_current_term = get_term_by( 'slug', $evox_term_slug, $evox_taxonomy_name );

    $evox_tax_category =  $evox_current_term->term_id;
}

$evox_tax_language = '';
if( is_tax('tour-language') ){
    $evox_term_slug = get_query_var( 'term' );
    $evox_taxonomy_name = get_query_var( 'taxonomy' );
    $evox_current_term = get_term_by( 'slug', $evox_term_slug, $evox_taxonomy_name );

    $evox_tax_language =  $evox_current_term->term_id;
}

$evox_wishlist = array();
if ( is_user_logged_in() ) {
    $evox_user_id = get_current_user_id();
    $evox_wishlist = get_user_meta( $evox_user_id, 'wishlist', true );
}
if ( ! is_array( $evox_wishlist ) ) $evox_wishlist = array();

$evox_wishlist_url = evox_get_tour_wishlist_page();

$evox_order_array = array( 'ASC', 'DESC' );
$evox_order_by_array = array(
    '' => '',
    'name' => 'name',
    'price' => 'price',
    'rating' => 'rating',
    'popularity' => 'popularity'
);
$evox_order_defaults = array(
    'price' => 'ASC',
    'rating' => 'DESC'
);

$evox_s          = isset($_REQUEST['s']) ? sanitize_text_field( $_REQUEST['s'] ) : '';
$evox_date       = isset($_REQUEST['date']) ? sanitize_text_field( $_REQUEST['date'] ) : '';
$evox_tour_length       = isset($_REQUEST['tour_length']) ? sanitize_text_field( $_REQUEST['tour_length'] ) : '';

$evox_order_by   = ( isset( $_REQUEST['order_by'] ) && array_key_exists( $_REQUEST['order_by'], $evox_order_by_array ) ) ? sanitize_text_field( $_REQUEST['order_by'] ) : '';
$evox_order      = ( isset( $_REQUEST['order'] ) && in_array( $_REQUEST['order'], $evox_order_array ) ) ? sanitize_text_field( $_REQUEST['order'] ) : 'DESC';

$evox_price_filter   = ( isset( $_REQUEST['price_filter'] ) && is_array( $_REQUEST['price_filter'] ) ) ? $_REQUEST['price_filter'] : array();
$evox_rating_filter  = ( isset( $_REQUEST['rating_filter'] ) && is_array( $_REQUEST['rating_filter'] ) ) ? $_REQUEST['rating_filter'] : array();

if( $evox_tax_category == '' ){
    $evox_category_filter = ( isset( $_REQUEST['tour_categories'] ) && is_array( $_REQUEST['tour_categories'] ) ) ? $_REQUEST['tour_categories'] : array();
}else{
    $evox_category_filter = array($evox_tax_category);
}
if( $evox_tax_language == '' ){
    $evox_language_filter = ( isset( $_REQUEST['tour_languages'] ) && is_array( $_REQUEST['tour_languages'] ) ) ? $_REQUEST['tour_languages'] : array();
}else{
    $evox_language_filter = array($evox_tax_language);
}
$evox_destination_filter = ( isset( $_REQUEST['tour_destination'] ) && is_array( $_REQUEST['tour_destination'] ) ) ? $_REQUEST['tour_destination'] : array();

$evox_page       = ( isset( $_REQUEST['page'] ) && ( is_numeric( $_REQUEST['page'] ) ) && ( $_REQUEST['page'] >= 1 ) ) ? sanitize_text_field( $_REQUEST['page'] ):1;
$evox_per_page   = ( isset( $evox_options['evox_tour_archive_limit'] ) && is_numeric($evox_options['evox_tour_archive_limit']) )?$evox_options['evox_tour_archive_limit']:12;
$evox_order_date_default   = ( isset( $evox_options['evox_order_date'] ) && is_numeric($evox_options['evox_order_date']) )?$evox_options['evox_order_date']:0;

$evox_search_result = evox_tour_get_search_result( array(
        'evox_s'                    =>  $evox_s,
        'evox_date'                 =>  $evox_date,
        'evox_tour_length'          =>  $evox_tour_length,
        'evox_categories_filter'    =>  $evox_category_filter,
        'evox_destination_filter'   =>  $evox_destination_filter,
        'evox_language_filter'      =>  $evox_language_filter,
        'evox_price_filter'         =>  $evox_price_filter,
        'evox_rating_filter'        =>  $evox_rating_filter,
        'evox_order_by'             =>  $evox_order_by_array[$evox_order_by],
        'evox_order'                =>  $evox_order,
        'evox_default_order'        =>  $evox_order_date_default,
        'evox_last_no'              =>  ( $evox_page - 1 ) * $evox_per_page,
        'evox_per_page'             =>  $evox_per_page )
);

$evox_post_list = $evox_search_result['ids'];
$evox_count = $evox_search_result['count']; // total_count

$evox_price_filter_jquery   = ( isset( $_REQUEST['price_filter'] ) && is_array( $_REQUEST['price_filter'] ) ) ? $_REQUEST['price_filter'] : array( $evox_sidebar_min_price,$evox_sidebar_max_price);
$evox_rating_filter_jquery  = ( isset( $_REQUEST['rating_filter'] ) && is_array( $_REQUEST['rating_filter'] ) ) ? $_REQUEST['rating_filter'] : array();

/*  Tour Archive Option */
$evox_column_desk = $evox_column_tablet = $evox_column_mobilelandscape = $evox_column_mobile = '1';

$evox_list_grid_type               = isset( $evox_options['evox_tour_archive_list_grid_type'] ) ? $evox_options['evox_tour_archive_list_grid_type']:'list-grid';
if( $evox_list_grid_type != 'list' && $evox_type != 'only_list' ){
    if( $evox_type == '2_column' ){
        $evox_column_desk = $evox_column_tablet = '2';
    }elseif( $evox_type == '3_column' ){
        $evox_column_desk = '3';
        $evox_column_tablet = '2';
    }elseif( $evox_type == '4_column' ){
        $evox_column_desk = '4';
        $evox_column_tablet = '2';
    }else{
        $evox_column_desk               = isset( $evox_options['evox_grid_desk_column'] ) ? $evox_options['evox_grid_desk_column']:'3';
        $evox_column_tablet             = isset( $evox_options['evox_grid_tablet_column'] ) ? $evox_options['evox_grid_tablet_column']:'2';
        $evox_column_mobilelandscape    = isset( $evox_options['evox_grid_mobilelandscape_column'] ) ? $evox_options['evox_grid_mobilelandscape_column']:'1';
        $evox_column_mobile             = isset( $evox_options['evox_grid_mobile_column'] ) ? $evox_options['evox_grid_mobile_column']:'1';
    }

}
$evox_sidebar_filter                 = isset( $evox_options['evox_filter_sidebar'] ) ? $evox_options['evox_filter_sidebar']:'right';
$evox_sidebar_results                = isset( $evox_options['evox_filter_sidebar_results'] ) ? $evox_options['evox_filter_sidebar_results']:'1';
$evox_sidebar_price                  = isset( $evox_options['evox_filter_sidebar_price'] ) ? $evox_options['evox_filter_sidebar_price']:'1';
$evox_sidebar_rating                 = isset( $evox_options['evox_filter_sidebar_rating'] ) ? $evox_options['evox_filter_sidebar_rating']:'1';
$evox_sidebar_categories             = isset( $evox_options['evox_filter_sidebar_categories'] ) ? $evox_options['evox_filter_sidebar_categories']:'1';
$evox_sidebar_destinations           = isset( $evox_options['evox_filter_sidebar_destinations'] ) ? $evox_options['evox_filter_sidebar_destinations']:'1';
$evox_sidebar_language               = isset( $evox_options['evox_filter_sidebar_language'] ) ? $evox_options['evox_filter_sidebar_language']:'1';
$evox_sidebar_search                 = isset( $evox_options['evox_filter_sidebar_search'] ) ? $evox_options['evox_filter_sidebar_search']:'1';

$evox_sidebar_title_price            = isset( $evox_options['evox_filter_sidebar_title_price'] ) ? $evox_options['evox_filter_sidebar_title_price']:'';
$evox_sidebar_title_rating           = isset( $evox_options['evox_filter_sidebar_title_rating'] ) ? $evox_options['evox_filter_sidebar_title_rating']:'';
$evox_sidebar_title_categories       = isset( $evox_options['evox_filter_sidebar_title_categories'] ) ? $evox_options['evox_filter_sidebar_title_categories']:'';
$evox_sidebar_title_destinations     = isset( $evox_options['evox_filter_sidebar_title_destinations'] ) ? $evox_options['evox_filter_sidebar_title_destinations']:'';
$evox_sidebar_title_language         = isset( $evox_options['evox_filter_sidebar_title_language'] ) ? $evox_options['evox_filter_sidebar_title_language']:'';
$evox_sidebar_title_search           = isset( $evox_options['evox_filter_sidebar_title_search'] ) ? $evox_options['evox_filter_sidebar_title_search']:'';

$evox_header_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

$evox_sidebar_class = 'col-lg-9 col-md-8 col-sm-8 col-xs-12 tz-no-padding';
if( $evox_sidebar_filter == 'none' || $evox_type == 'no_filter' || $evox_type == '4_column' ){
    $evox_sidebar_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12 tz-no-padding';
}

$evox_data_type = '';
if( $evox_type != '' ){
    $evox_data_type = $evox_type;
}else{
    $evox_data_type = $evox_list_grid_type;
}

$evox_day_start_week = get_option('start_of_week');

?>

    <div class="tz-tour-archive <?php if (($evox_header_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_header_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_header_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>" data-type="<?php echo esc_attr($evox_data_type); ?>" data-desktop="<?php echo esc_attr($evox_column_desk) ?>" data-tablet="<?php echo esc_attr($evox_column_tablet) ?>" data-mobilelandscape="<?php echo esc_attr($evox_column_mobilelandscape) ?>" data-mobile="<?php echo esc_attr($evox_column_mobile) ?>">
        <div class="container">
            <div class="row">
                <!--Sidebar Filter Left -->
                <?php if( $evox_sidebar_filter == 'left' || $evox_type == 'left_filter' ){
                    evox_get_template('sidebar-filter.php','/tour/templates/');
                } ?><!--End Sidebar Filter Left -->

                <div class="<?php echo esc_attr($evox_sidebar_class); ?>">
                    <?php if( is_tax( 'tour-category')  && !empty($evox_current_term->description) ){ ?>
                        <p class="tz-tour-category-descripton">
                            <?php echo esc_html($evox_current_term->description); ?>
                        </p>
                    <?php } ?>

                    <!--Sort Results -->
                    <?php evox_get_template('sort-results.php','/tour/templates/'); ?>
                    <!--End Sort Results -->

                    <?php
                    if ( empty( $evox_post_list ) ) :
                        echo '<h4 class="empty-list">' . esc_html__( 'No available tours', 'evox' ) . '</h4>';
                    else : ?>
                        <div class="tz-tour-content tour-masonry <?php if( $evox_list_grid_type == 'list' || $evox_type == 'only_list' ) echo 'tour-layout-list' ?>">
                            <?php
                            foreach( $evox_post_list as $evox_post_obj ) :
                                $evox_post_id = $evox_post_obj['tour_id'];
                                evox_get_template( 'tour-list-grid.php', '/tour/templates/');
//                                get_template_part('tour/templates/tour-list', 'grid');
                            endforeach;
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    <div class="tz-tour-pagination text-center">
                        <?php
                        unset( $_GET['page'] );
                        $evox_pagenum_link = strtok( $_SERVER["REQUEST_URI"], '?' ) . '%_%';
                        $evox_total = ceil( $evox_count / $evox_per_page );
                        $evox_nav_args = array(
                            'base' => $evox_pagenum_link, /* http://example.com/all_posts.php%_% : %_% is replaced by format (below) */
                            'total' => $evox_total,
                            'format' => '?page=%#%',
                            'current' => $evox_page,
                            'show_all' => false,
                            'prev_next' => true,
                            'prev_text' => '<i class="fa fa-angle-left"></i>',
                            'next_text' => '<i class="fa fa-angle-right"></i>',
                            'end_size' => 1,
                            'mid_size' => 2,
                            'type' => 'list',
                            'add_args' => $_GET,
                        );
                        echo paginate_links( $evox_nav_args );
                        ?>
                    </div><!-- end pagination-->
                </div>
                <?php if( $evox_sidebar_filter == 'right' && $evox_type != 'left_filter' && $evox_type != 'no_filter' && $evox_type != '4_column' ){
                    evox_get_template('sidebar-filter.php','/tour/templates/');
                } ?>
            </div>
            <!--            <div class="tz-form-booking-ajax-content"></div>-->
            <!--            <div class="tz-reviews-ajax-content"></div>-->
        </div>
    </div>
<?php get_footer(); ?>