<?php
get_header();
get_template_part('template_inc/inc','menu');
//get_template_part('template_inc/inc', 'breadcrumb');
global $evox_options;

$evox_single_sidebar    =   ((!isset($evox_options['evox_blog_single_sidebar'])) || empty($evox_options['evox_blog_single_sidebar'])) ? '3' : $evox_options['evox_blog_single_sidebar'];
$evox_single_related    =   ((!isset($evox_options['evox_blog_single_related'])) || empty($evox_options['evox_blog_single_related'])) ? '1' : $evox_options['evox_blog_single_related'];
$evox_single_comment    =   ((!isset($evox_options['evox_blog_single_comment'])) || empty($evox_options['evox_blog_single_comment'])) ? '1' : $evox_options['evox_blog_single_comment'];

$evox_single_date       =   ((!isset($evox_options['evox_blog_single_date'])) || empty($evox_options['evox_blog_single_date'])) ? '1' : $evox_options['evox_blog_single_date'];
$evox_single_author     =   ((!isset($evox_options['evox_blog_single_author'])) || empty($evox_options['evox_blog_single_author'])) ? '1' : $evox_options['evox_blog_single_author'];
$evox_single_cat        =   ((!isset($evox_options['evox_blog_single_cat'])) || empty($evox_options['evox_blog_single_cat'])) ? '1' : $evox_options['evox_blog_single_cat'];
$evox_single_tag        =   ((!isset($evox_options['evox_blog_single_tag'])) || empty($evox_options['evox_blog_single_tag'])) ? '1' : $evox_options['evox_blog_single_tag'];
$evox_single_title      =   ((!isset($evox_options['evox_blog_single_title'])) || empty($evox_options['evox_blog_single_title'])) ? '1' : $evox_options['evox_blog_single_title'];

$evox_type =   evox_metabox( 'evox_header_page_type','','','' );
$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_meta_option = evox_metabox('evox_header_page_option', '', '', 'default');

?>
<div class="tz-blog-single tz-destination-single  <?php if (($evox_type == '8' && $evox_redux_type == '8') || ($evox_meta_option != 'default' && $evox_type == '8') || ($evox_meta_option == 'default' && $evox_redux_type == '8' ) || ($evox_type == '' && $evox_meta_option == '' && $evox_redux_type == '8')) { echo 'tz-mgleft';} ?>">
    <?php
    if ( have_posts() ) : while (have_posts()) : the_post();
    evox_setPostViews(get_the_ID());
    $evox_comment_count  = wp_count_comments($post->ID);
    $evox_view = evox_getPostViews($post->ID);

    ?>
    <!--    Image-->
    <div class="tz-blog-thumbnail">
        <?php the_post_thumbnail();?>
        <div class="content">
            <div class="container">
                <h3 class="tz-blog-title"><?php the_title(); ?></h3>
                <div class="tz-blog-meta">
                    <span>
                        <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        <?php
                        $evox_args = array(
                            'post_type' => 'tour',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                    'key' => 'evox_tour_destination',
                                    'value' => $post->ID,
                                    'compare' => '=',
                                ),
                            )
                        );
                        $evox_query = new WP_Query($evox_args);
                        ?>
                        <?php echo $evox_query -> post_count; ?> <?php echo esc_html__('Deal Offers','evox'); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                        get_template_part( 'template_inc/content/content','info' );
                    ?>
                </div>
                <?php
                $evox_args_1 = array(
                    'post_type' => 'tour',
                    'posts_per_page' => -1,
                    'orderby'    => 'date',
                    'order'      => 'DESC',
                    'meta_query' => array(
                        array(
                            'key' => 'evox_tour_destination',
                            'value' => $post->ID,
                            'compare' => '=',
                        ),
                    )
                );
                $evox_query_1 = new WP_Query($evox_args_1);

                    if($evox_query_1->have_posts()){
                        ?>
                        <div class="destination-tour">
                            <h3>
                                <?php echo esc_html__('Tour to ','evox'); ?><?php the_title();?>
                                <a href="<?php echo esc_url(get_home_url('/')) . '/tour/?tour_destination[]=' . $post->ID; ?>"><?php echo esc_html__('Find More','evox')?> <i class="fa fa-angle-double-right"></i></a>
                            </h3>
                            <div class="destination-tour-grid">

                                    <?php

                                    $evox_wishlist = array();
                                    if ( is_user_logged_in() ) {
                                        $evox_user_id = get_current_user_id();
                                        $evox_wishlist = get_user_meta( $evox_user_id, 'wishlist', true );
                                    }

                                    if ( ! is_array( $evox_wishlist ) ) $evox_wishlist = array();

                                    $evox_wishlist_url = evox_get_tour_wishlist_page();

                                    $evox_count = 1;
                                    $evox_total = $evox_query_1->post_count;

                                    while( $evox_query_1->have_posts() ) {
                                        $evox_query_1->the_post();
                                        global $evox_options;

                                        $evox_max_adults        = isset( $evox_options['evox_tour_detail_max_adults'] ) ? $evox_options['evox_tour_detail_max_adults'] : 3;
                                        $evox_max_kids          = isset( $evox_options['evox_tour_detail_max_kids'] ) ? $evox_options['evox_tour_detail_max_kids'] : 0;

                                        $evox_duration      =   evox_metabox( 'evox_tour_duration','',$evox_query_1->post->ID,'' );
                                        $evox_address       =   evox_metabox( 'address','',$evox_query_1->post->ID,'' );
                                        $evox_destination   =   evox_metabox( 'evox_tour_destination','',$evox_query_1->post->ID,'' );

                                        $evox_tour_type             =   evox_metabox( 'evox_tour_type','',$evox_query_1->post->ID,'' );
                                        $evox_tour_external_button  =   evox_metabox( 'evox_tour_external_button','',$evox_query_1->post->ID,esc_html__('Book Now','evox') );
                                        $evox_tour_external_link    =   evox_metabox( 'evox_tour_external_link','',$evox_query_1->post->ID,'#' );
                                        $evox_departure_date        =   evox_metabox( 'evox_departure_date','',$evox_query_1->post->ID,'' );
                                        $evox_adult_price           =   evox_metabox( 'evox_adult_price','',$evox_query_1->post->ID,'0');
                                        $evox_child_price           =   evox_metabox( 'evox_child_price','',$evox_query_1->post->ID,'0' );
                                        $evox_discount              =   evox_metabox( 'evox_tour_discount','',$evox_query_1->post->ID,'0' );
                                        $evox_tour_available_days   =   evox_metabox( 'evox_available_days','',$evox_query_1->post->ID,'' );
                                        $evox_tour_start_date       =   evox_metabox( 'evox_tour_start_date','',$evox_query_1->post->ID,'' );
                                        $evox_tour_end_date         =   evox_metabox( 'evox_tour_end_date','',$evox_query_1->post->ID,'' );
                                        $evox_tour_departure_time   =   evox_metabox( 'evox_departure_time','',$evox_query_1->post->ID,'' );

                                        $evox_tour_start_date_milli_sec = 0;
                                        if ( ! empty( $evox_tour_end_date ) ) {
                                            $evox_tour_start_date_milli_sec = strtotime( $evox_tour_start_date) * 1000;
                                        }
                                        $evox_tour_end_date_milli_sec = 0;
                                        if ( ! empty( $evox_tour_end_date ) ) {
                                            $evox_tour_end_date_milli_sec = strtotime( $evox_tour_end_date) * 1000;
                                        }

                                        if( $evox_tour_type == 'daily' ){
                                            $evox_date = $evox_tour_start_date;
                                        }else{
                                            $evox_date = $evox_departure_date;
                                        }

//                                        $evox_check_tour_available = evox_tour_check_availability( $evox_query_1->post->ID );
                                        $evox_check_tour_available = evox_tour_check_availability_advance( $evox_query_1->post->ID, '', '' );
                                        $evox_allow_manager_people = evox_metabox( 'evox_tour_manager_people','',$evox_query_1->post->ID,'' );
                                        $evox_total_people = evox_metabox( 'evox_tour_total_people','',$evox_query_1->post->ID,'' );
//        var_dump($evox_check_tour_available);

                                        ?>
                                        <?php if($evox_count%3 == 1):?>
                                        <div class="row">
                                        <?php endif;?>

                                        <div class="col-md-4 col-sm-6 destination-tour-item">
                                            <div class="item-content">
                                                <div class="tz-thumb">
                                                    <a href="<?php the_permalink();?>">
                                                        <?php
                                                        the_post_thumbnail('large');
                                                        ?>
                                                    </a>

                                                    <?php
                                                    if ( ( $evox_allow_manager_people == '1' && $evox_total_people == '0' ) || $evox_tour_type == 'special' && empty($evox_tour_departure_time) && $evox_check_tour_available['0'] == '0' ) {
                                                        ?>
                                                        <span class="tz-tour-sold-out"><?php echo esc_html__('Sold Out','evox')?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php if( $evox_discount != '' && $evox_discount != 0 ) echo '<div class="discount"><span>'.esc_html($evox_discount).esc_html__('% OFF','evox').'</span></div>';?>
                                                <div class="tz-info">
                                                    <div class="tz-row tz-title">
                                                        <h4><a href="<?php the_permalink($evox_query_1->post->ID); ?>"><?php echo get_the_title($evox_query_1->post->ID); ?></a></h4>
                                                        <?php if( $evox_duration != ''){ ?>
                                                            <span><i class="fa fa-clock-o"></i><?php echo  esc_html($evox_duration);?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="tz-row tz-review-price">
                                                        <div class="tz-reviews">
                                                            <?php
                                                            if( class_exists( 'Comment_Rating_Output' ) ):
                                                                $evox_average_rating = get_post_meta( $evox_query_1->post->ID, 'tz-average-rating', true );
                                                                if ( empty( $evox_average_rating ) ) {
                                                                    $evox_average_rating = 0;
                                                                }
                                                                echo '<div class="tz-average-rating"><div class="tz-rating tz-rating-' . esc_attr($evox_average_rating) . '"></div></div>';
                                                            endif;

                                                            $evox_review_count = evox_parent_comment_counter($evox_query_1->post->ID);
                                                            if( $evox_review_count > 1 ){
                                                                $evox_review_count_text = esc_html__(' Reviews','evox');
                                                            }else{
                                                                $evox_review_count_text = esc_html__(' Review','evox');
                                                            }
                                                            ?>
                                                            <span class="reviews-count"><?php echo esc_html(evox_parent_comment_counter($evox_query_1->post->ID).$evox_review_count_text); ?></span>
                                                        </div>
                                                        <?php
                                                        if($evox_adult_price != '' || $evox_child_price != ''):
                                                            ?>
                                                            <div class="tz-price">
                                                                <p class="from"><?php esc_html_e('From','evox'); ?></p>
                                                                <p class="price">
                                                                    <?php
                                                                    if($evox_adult_price != ''){
                                                                        echo evox_price($evox_adult_price);
                                                                    }elseif($evox_child_price != ''){
                                                                        echo evox_price($evox_child_price);
                                                                    }?>
                                                                </p>
                                                            </div>
                                                        <?php endif;?>
                                                    </div>
                                                    <div class="tz-row tz-time">
                                                        <?php if( $evox_date != '' ){ ?>
                                                            <div class="tz-date">
                                                                <div class="icon"><i class="fa fa-clock-o"></i></div>
                                                                <p><?php esc_html_e('Date','evox') ?></p>
                                                                <span class="text"><?php echo esc_html($evox_date); ?></span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $evox_address != '' ){ ?>
                                                            <div class="tz-depature">
                                                                <div class="icon"><i class="fa fa-map-marker"></i></div>
                                                                <p><?php esc_html_e('Departure','evox') ?></p>
                                                                <span class="text"><?php echo esc_html($evox_address); ?></span>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="tz-row tz-button">
                                                        <span class="view"><i class="fa fa-eye"></i><?php echo esc_html(evox_getPostViews($evox_query_1->post->ID)); ?></span>

                                                        <?php if ( ! empty( $evox_wishlist_url ) ) : ?>
                                                            <a class="tz-btn-wishlist btn-add-wishlist" href="#" data-post-id="<?php echo esc_attr( $evox_query_1->post->ID ); ?>"<?php echo ( in_array( $evox_query_1->post->ID, $evox_wishlist) ? ' style="display:none;"' : '' ) ?>>
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                            <a class="tz-btn-wishlist btn-remove-wishlist" href="#" data-post-id="<?php echo esc_attr( $evox_query_1->post->ID ); ?>"<?php echo ( ! in_array( $evox_query_1->post->ID, $evox_wishlist) ? ' style="display:none;"' : '' ) ?>>
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php
                                                        if( $evox_tour_type == 'external' ){
                                                            if($evox_tour_external_button != ''):
                                                                echo '<a class="booking" href="'.esc_url($evox_tour_external_link).'" title="'.esc_html($evox_tour_external_button).'" target="_blank"><i class="fa fa-shopping-cart"></i>'.esc_html($evox_tour_external_button).'</a>';
                                                            endif;
                                                        }else{ ?>
                                                            <a class="booking book-now-ajax-btn<?php
                                                            if ( ( $evox_allow_manager_people == '1' && $evox_total_people == '0' ) || $evox_tour_type == 'special' && empty($evox_tour_departure_time) && $evox_check_tour_available['0'] == '0' ) {
                                                                echo ' disabled';
                                                            }
                                                            ?>" href="<?php the_permalink($evox_query_1->post->ID);?>"
                                                                <?php if($evox_tour_type == 'special' && empty($evox_tour_departure_time) && $evox_check_tour_available['2'] != ''){?>
                                                                    data-people-available="<?php echo $evox_check_tour_available['2'];?>"
                                                                <?php }else{?>
                                                                    data-people-available=""
                                                                <?php } ?>
                                                               data-post-id="<?php echo esc_attr( $evox_query_1->post->ID ); ?>" data-tour-type="<?php echo esc_attr($evox_tour_type); ?>" data-max-adults="<?php echo esc_attr( $evox_max_adults ); ?>" data-max-kids="<?php echo esc_attr( $evox_max_kids ); ?>" data-adults-price="<?php echo esc_attr( $evox_adult_price ); ?>" data-child-price="<?php echo esc_attr( $evox_child_price ); ?>" data-discount="<?php echo esc_attr( $evox_discount ); ?>" data-available-days='<?php echo json_encode( $evox_tour_available_days ); ?>' data-start-date="<?php echo esc_attr( $evox_tour_start_date_milli_sec ); ?>" data-end-date="<?php echo esc_attr( $evox_tour_end_date_milli_sec ); ?>" data-departure-time='<?php echo json_encode( $evox_tour_departure_time ); ?>'>
                                                                <i class="fa fa-shopping-cart"></i><?php esc_html_e('Book Now','evox'); ?>
                                                                <span class="loading-ajax"></span>
                                                            </a>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if( $evox_count%3 == 0 || $evox_count == $evox_total ):?>
                                        </div>
                                        <?php endif;?>
                                        <?php
                                        $evox_count++;
                                    }
                                    wp_reset_postdata();
                                    ?>
                            </div>

<!--                            <div class="tz-form-booking-ajax-content"></div>-->
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
        <?php
    endwhile; // end while ( have_posts )
    endif; // end if ( have_posts )
    ?>
</div>
<?php
get_footer();
?>

