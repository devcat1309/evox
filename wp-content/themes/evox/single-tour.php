<?php
get_header();
$evox_tour_type             =   evox_metabox( 'evox_tour_type','','','' );
$evox_duration              =   evox_metabox( 'evox_tour_duration','','','' );
$evox_departure_date        =   evox_metabox( 'evox_departure_date','','','' );
$evox_tour_start_date       =   evox_metabox( 'evox_tour_start_date','','','' );
$evox_tour_end_date         =   evox_metabox( 'evox_tour_end_date','','','' );
$evox_tour_available_days   =   evox_metabox( 'evox_available_days','','','' );
$evox_tour_external_note    =   evox_metabox( 'evox_tour_external_note','','','' );
$evox_tour_external_button  =   evox_metabox( 'evox_tour_external_button','','',esc_html__('Book Now','evox') );
$evox_tour_external_link    =   evox_metabox( 'evox_tour_external_link','','','#' );
$evox_itinerary             =   evox_metabox( 'evox_tour_itinerary','','','' );
$evox_location_des          =   evox_metabox( 'evox_introduce_location','','','' );
$evox_map                   =   evox_metabox( 'map','','','' );
$evox_address               =   evox_metabox( 'address','','','' );
$evox_discount              =   evox_metabox( 'evox_tour_discount','','','0' );
$evox_add_combo             =   evox_metabox( 'evox_add_combo','','','' );
$evox_add_combo_tour        =   evox_metabox( 'evox_add_combo_tour','','','' );
$evox_adult_price           =   evox_metabox( 'evox_adult_price','','','0' );
$evox_child_price           =   evox_metabox( 'evox_child_price','','','0' );
$evox_image_itinerary       =   evox_metabox( 'evox_tour_image_itinerary_option','','','');
$evox_destination           =   evox_metabox( 'evox_tour_destination','','','' );
$evox_tour_guide            =   evox_metabox( 'evox_tour_guide','','','' );
$evox_departure_time        =   evox_metabox( 'evox_departure_time','','','' );

/* Book & Contact Option*/
$evox_booking_head_option        =   evox_metabox( 'evox_tour_booking_head_option','','','default' );
$evox_booking_head_display       =   evox_metabox( 'evox_tour_booking_head_display','','','1' );
$evox_booking_form_option        =   evox_metabox( 'evox_tour_booking_form_option','','','default' );
$evox_booking_form_display       =   evox_metabox( 'evox_tour_booking_form_display','','','1' );
$evox_tour_contact_option        =   evox_metabox( 'evox_tour_contact_option','','','default' );
$evox_tour_contact_display       =   evox_metabox( 'evox_tour_contact_display','','','1' );

$evox_check_has_combo = false;
foreach ( $evox_add_combo_tour as $evox_combo_item ) {
    if( $evox_combo_item['price_combo'] != '' && $evox_combo_item['people_combo'] != '' && $evox_combo_item['name_combo'] != '' ){
        $evox_check_has_combo = true;
    }
}

$evox_date = '';
if( $evox_tour_type == 'daily' ){
    $evox_date = $evox_tour_start_date;
}else{
    $evox_date = $evox_departure_date;
}

global $evox_options,$evox_booking_form_show,$evox_adult_price,$evox_child_price,$evox_contact_description,$evox_contact_form,$evox_booking_sidebar,$evox_type,$evox_sidebar_class,$evox_discount;

$evox_contact_option        = ((!isset($evox_options['evox_tour_detail_contact_option'])) || empty($evox_options['evox_tour_detail_contact_option'])) ? '1' : $evox_options['evox_tour_detail_contact_option'];
$evox_contact_description   = ((!isset($evox_options['evox_tour_detail_contact_description'])) || empty($evox_options['evox_tour_detail_contact_description'])) ? '' : $evox_options['evox_tour_detail_contact_description'];
$evox_contact_form          = ((!isset($evox_options['evox_tour_detail_contact_form'])) || empty($evox_options['evox_tour_detail_contact_form'])) ? '' : $evox_options['evox_tour_detail_contact_form'];

$evox_booking_head      = isset( $evox_options['evox_tour_detail_booking_head'] ) ? $evox_options['evox_tour_detail_booking_head'] : '1';
$evox_price_box         = isset( $evox_options['evox_tour_detail_price_box'] ) ? $evox_options['evox_tour_detail_price_box'] : '1';
$evox_phone             = isset( $evox_options['evox_tour_detail_phone'] ) ? $evox_options['evox_tour_detail_phone'] : '';
$evox_booking_sidebar   = isset( $evox_options['evox_tour_detail_booking_sidebar'] ) ? $evox_options['evox_tour_detail_booking_sidebar']:'right';
//var_dump($evox_booking_head);

/*  Booking Form Option */
$evox_booking_form      = isset( $evox_options['evox_tour_detail_form_booking'] ) ? $evox_options['evox_tour_detail_form_booking'] : '1';
$evox_first_name_show   = isset( $evox_options['evox_tour_detail_first_name'] ) ? $evox_options['evox_tour_detail_first_name'] : '1';
$evox_first_name_label  = isset( $evox_options['evox_tour_detail_first_name_label'] ) ? $evox_options['evox_tour_detail_first_name_label'] : '';
$evox_last_name_show    = isset( $evox_options['evox_tour_detail_last_name'] ) ? $evox_options['evox_tour_detail_last_name'] : '1';
$evox_last_name_label   = isset( $evox_options['evox_tour_detail_last_name_label'] ) ? $evox_options['evox_tour_detail_last_name_label'] : '';
$evox_email_show        = isset( $evox_options['evox_tour_detail_email'] ) ? $evox_options['evox_tour_detail_email'] : '1';
$evox_email_label       = isset( $evox_options['evox_tour_detail_email_label'] ) ? $evox_options['evox_tour_detail_email_label'] : '';
$evox_field_phone_show  = isset( $evox_options['evox_tour_detail_field_phone'] ) ? $evox_options['evox_tour_detail_field_phone'] : '1';
$evox_field_phone_label = isset( $evox_options['evox_tour_detail_field_phone_label'] ) ? $evox_options['evox_tour_detail_field_phone_label'] : '';
$evox_departure_label   = isset( $evox_options['evox_tour_detail_departure_label'] ) ? $evox_options['evox_tour_detail_departure_label'] : '';
$evox_field_time_show   = isset( $evox_options['evox_tour_detail_field_time'] ) ? $evox_options['evox_tour_detail_field_time'] : '1';
$evox_departure_time_label   = isset( $evox_options['evox_tour_detail_departure_time_label'] ) ? $evox_options['evox_tour_detail_departure_time_label'] : '';
$evox_adults_label      = isset( $evox_options['evox_tour_detail_adults_label'] ) ? $evox_options['evox_tour_detail_adults_label'] : '';
$evox_children_label    = isset( $evox_options['evox_tour_detail_children_label'] ) ? $evox_options['evox_tour_detail_children_label'] : '';
$evox_booking_text      = isset( $evox_options['evox_tour_detail_button_text'] ) ? $evox_options['evox_tour_detail_button_text'] : '';
$evox_max_adults        = isset( $evox_options['evox_tour_detail_max_adults'] ) ? $evox_options['evox_tour_detail_max_adults'] : 3;
$evox_max_kids          = isset( $evox_options['evox_tour_detail_max_kids'] ) ? $evox_options['evox_tour_detail_max_kids'] : 0;
/*  End Booking Form Option */

$evox_decimal_prec       = isset( $evox_options['evox_currency_decimal_prec'] ) ? $evox_options['evox_currency_decimal_prec'] : 2;
$evox_decimal_sep        = isset( $evox_options['evox_currency_decimal_sep'] ) ? $evox_options['evox_currency_decimal_sep'] : '.';
$evox_thousands_sep      = isset( $evox_options['evox_currency_thousands_sep'] ) ? $evox_options['evox_currency_thousands_sep'] : ',';

$evox_itinerary_options  = isset( $evox_options['evox_tour_detail_itinerary_option'] ) ? $evox_options['evox_tour_detail_itinerary_option'] : 1;
$evox_location_options   = isset( $evox_options['evox_tour_detail_location_option'] ) ? $evox_options['evox_tour_detail_location_option'] : 1;
$evox_reviews_options    = isset( $evox_options['evox_tour_detail_reviews_option'] ) ? $evox_options['evox_tour_detail_reviews_option'] : 1;
$evox_other_tour_options = isset( $evox_options['evox_tour_detail_other_option'] ) ? $evox_options['evox_tour_detail_other_option'] : 1;
$evox_tour_detail_slider = isset( $evox_options['evox_tour_detail_slider'] ) ? $evox_options['evox_tour_detail_slider'] : '';

$evox_redux_type = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];

$evox_tour_start_date_milli_sec = 0;
if ( ! empty( $evox_tour_end_date ) ) {
    $evox_tour_start_date_milli_sec = strtotime( $evox_tour_start_date) * 1000;
}

$evox_tour_end_date_milli_sec = 0;
if ( ! empty( $evox_tour_end_date ) ) {
    $evox_tour_end_date_milli_sec = strtotime( $evox_tour_end_date) * 1000;
}

$evox_type = '';
if(isset($_GET['type']) && $_GET['type'] != ''){
    $evox_type = $_GET['type'];
}

$evox_tour_single_class = 'tz-tour-single';

if( $evox_booking_sidebar == 'none' || $evox_type == 'booking_none' ){
    $evox_tour_single_class .= ' tz-tour-single-sidebar-none';
} elseif( $evox_booking_sidebar == 'left' || $evox_type == 'booking_left' ){
    $evox_tour_single_class .= ' tz-tour-single-sidebar-left';
} else{
    $evox_tour_single_class .= ' tz-tour-single-sidebar-right';
}

$evox_sidebar_class = 'col-lg-9 col-md-8 col-sm-8 col-xs-12';
//$evox_sidebar_class = 'tz-tab-content-wrap';
if( $evox_booking_sidebar == 'none' || $evox_type == 'booking_none' ){
    $evox_sidebar_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
}

$evox_class_has_combo = '';
if ( $evox_check_has_combo == true ){
    $evox_class_has_combo = 'has_combo';
}

$evox_booking_head_show = '';
if($evox_booking_head_option == 'custom'){
    $evox_booking_head_show = $evox_booking_head_display;
}else{
    $evox_booking_head_show = $evox_booking_head;
}

$evox_contact_form_show = '';
if($evox_tour_contact_option == 'custom'){
    $evox_contact_form_show = $evox_tour_contact_display;
}else{
    $evox_contact_form_show = $evox_contact_option;
}

$evox_booking_form_show = '';
if($evox_booking_form_option == 'custom'){
    $evox_booking_form_show = $evox_booking_form_display;
}else{
    $evox_booking_form_show = $evox_booking_form;
}
$evox_day_start_week = get_option('start_of_week');
if(isset($_GET['slider'])){
    $slider = $_GET['slider'];
}else{
    $slider='';
}
get_template_part('template_inc/inc','menu');
if ( have_posts() ) : while (have_posts()) : the_post() ;
    evox_setPostViews(get_the_ID());
    global $evox_ID;
    $evox_ID = get_the_ID();
    $evox_view = evox_getPostViews($evox_ID);

    $evox_check_tour_available = evox_tour_check_availability_advance( $evox_ID, '', '' );
    $evox_allow_manager_people = evox_metabox( 'evox_tour_manager_people','',$evox_ID,'' );
    $evox_total_people = evox_metabox( 'evox_tour_total_people','',$evox_ID,'' );

    ?>
    <div class="<?php echo esc_attr($evox_tour_single_class);?> <?php if ($evox_redux_type == '8'){ echo 'tz-mgleft';} ?>">
        <div class="tz-tour-head">
            <?php
            /*  Gallery */
            if($evox_tour_detail_slider =='owl' || $slider=='owl'){
                evox_get_template('galleryowl.php','/tour/templates/single-tour/');
            }else{
                evox_get_template('gallery.php','/tour/templates/single-tour/');
            }

            /*  End Gallery */

            /*  Tour Title */
            evox_get_template('title.php','/tour/templates/single-tour/');
            /*  End Tour Title */
            ?>
        </div>
        <div class="tz-tour-tab-title">
            <div class="container">
                <div class="row">
                    <?php if( $evox_booking_sidebar == 'left' || $evox_type == 'booking_left' ){ ?>
                        <!--Sidebar Filter Left -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                        <!--End Sidebar Filter Left -->
                    <?php } ?>
                    <div class="<?php echo esc_attr($evox_sidebar_class); ?>">
                        <ul  class="nav nav-pills">
                            <li class="active">
                                <a  href="#description" data-toggle="tab"><?php esc_html_e('Description','evox') ?></a>
                            </li>
                            <?php if($evox_itinerary_options == '1'): ?>
                                <li>
                                    <a href="#itinerary" data-toggle="tab"><?php esc_html_e('Itinerary','evox') ?></a>
                                </li>
                            <?php endif;?>

                            <?php if($evox_location_options == '1'): ?>
                                <li>
                                    <a href="#location" data-toggle="tab"><?php esc_html_e('Location','evox') ?></a>
                                </li>
                            <?php endif;?>

                            <?php if($evox_reviews_options == '1'): ?>
                                <li>
                                    <a href="#reviews" data-toggle="tab"><?php esc_html_e('Reviews','evox') ?></a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <?php if( $evox_booking_sidebar == 'right' && $evox_type != 'booking_left' && $evox_type != 'booking_none' ){ ?>
                        <!--Sidebar Filter right -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                        <!--End Sidebar Filter right -->
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="tz-tour-content">
            <div class="container">
                <div class="row">
                    <div class="tz-tab-content-wrap">
                        <div id="post-<?php the_ID(); ?>">
                            <div class="tab-content clearfix">

                                <div class="tab-pane active" id="description">

                                    <?php if( !empty($evox_image_itinerary)): ?>
                                        <div class="tour-image-itinerary">
                                            <?php
                                            foreach( $evox_image_itinerary as $evox_image ):
                                                ?>
                                                <img src="<?php echo esc_url($evox_image["full_url"]);?>" alt="<?php echo esc_attr($evox_image["title"]);?>" title="<?php echo esc_attr($evox_image["title"]);?>">
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content detail">
                                        <div class="tour-info <?php if( !empty($evox_image_itinerary)){ echo 'tour-has-image-itinerary';} ?>">
                                            <div class="tour-info-box">
                                                <div class="tour-info-column">
                                                    <?php if( $evox_tour_type != '' ):?>
                                                        <span class="tour-info-item tour-info-type">
                                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                                            <?php
                                                            if( $evox_tour_type == 'daily' ):
                                                                echo esc_html__('Daily Tour','evox');
                                                            else:
                                                                echo esc_html__('Special Tour','evox');
                                                            endif;
                                                            ?>
                                                </span>
                                                    <?php endif; ?>

                                                    <?php if($evox_duration != ''):?>
                                                        <span class="tour-info-item tour-info-duration">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            <?php echo esc_html($evox_duration);?>
                                                    </span>
                                                    <?php endif;?>


                                                    <?php if( $evox_date != '' ): ?>
                                                        <span class="tour-info-item tour-info-date">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            <?php echo esc_html__('Availability: ','evox') . esc_html($evox_date); ?>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="tour-info-column">
                                                    <?php if($evox_address != ''):?>
                                                        <span class="tour-info-item tour-info-address">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            <?php echo esc_html($evox_address);?>
                                                    </span>
                                                    <?php endif;?>

                                                    <?php if($evox_destination != ''):?>
                                                        <?php
                                                        $evox_destiantion_content = array();
                                                        foreach ($evox_destination as $item){
                                                            $evox_destiantion_content[] = get_post($item)->post_title;
                                                        }
                                                        ?>
                                                        <span class="tour-info-item tour-info-destination">
                                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                                            <?php echo esc_html(implode(", ",$evox_destiantion_content));?>
                                                    </span>
                                                    <?php endif;?>
                                                    <?php if($evox_tour_guide != ''):?>
                                                        <?php
                                                        $evox_tour_guide_content = get_post($evox_tour_guide);
                                                        ?>
                                                        <span class="tour-info-item tour-info-guider">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                            <?php echo esc_html__('Tour Guide: ','evox') . esc_html($evox_tour_guide_content->post_title);?>
                                                    </span>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>

                                <?php if($evox_itinerary_options == '1'): ?>
                                    <div class="tab-pane" id="itinerary">

                                        <div class="content itinerary">
                                            <?php
                                            $evox_itinerary_content = apply_filters( 'the_content', $evox_itinerary );
                                            $evox_itinerary_content = str_replace( ']]>', ']]&gt;', $evox_itinerary_content );
                                            echo balanceTags($evox_itinerary_content); ?>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <?php if($evox_location_options == '1'): ?>
                                    <div class="tab-pane" id="location">

                                        <div class="content location">
                                            <div class="description">
                                                <?php echo balanceTags($evox_location_des); ?>
                                            </div>
                                            <iframe width="650" height="450" style="border:0" src="<?php echo esc_url('https://maps.google.com/maps?q='.$evox_address.'&amp;ie=UTF8&amp;&amp;output=embed'); ?>" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <?php if($evox_reviews_options == '1'): ?>
                                    <div class="tab-pane" id="reviews">
                                        <div class="content reviews">
                                            <?php comments_template( '', true ); ?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php if( $evox_type != 'booking_none' ){ ?>
                        <!--Sidebar Filter right -->
                        <!--                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">-->
                        <div class="tz-tour-booking-wrap">
                            <div class="tz-tour-booking">
                                <?php if($evox_booking_head_show == '1'){?>
                                    <div class="tz-booking-head">
                                        <?php if( $evox_phone != '' ){ ?>
                                            <div class="tz-tour-contact-number">
                                                <i class="fa fa-headphones" aria-hidden="true"></i>
                                                <?php esc_html_e('&nbsp;Call Center: ','evox') ?><span><?php echo esc_html($evox_phone); ?></span>
                                            </div>
                                        <?php } ?>
                                        <!--Total Price -->
                                        <?php if($evox_price_box == '1'){ ?>
                                            <div class="tz-tour-price <?php if( $evox_tour_type == 'external' ){echo esc_attr($evox_tour_type);} ?>">
                                                <?php
                                                if( $evox_tour_type != 'external' ){
                                                    if($evox_adult_price != '' || $evox_child_price != ''):
                                                        ?>
                                                        <span class="tz-tour-total-price">
                                                        <?php echo esc_html__('Total:','evox');?>

                                                            <span class="total-price">
                                                                <span class="total_all_price"><?php
                                                                    if($evox_adult_price != ''){
                                                                        $evox_total_price = $evox_adult_price;
                                                                        echo evox_price($evox_total_price);
                                                                        //                                                            echo evox_price($evox_adult_price);
                                                                    }elseif($evox_child_price != ''){
                                                                        $evox_total_price = $evox_child_price;
                                                                        echo evox_price($evox_total_price);
                                                                        //                                                            echo evox_price($evox_child_price);
                                                                    }
                                                                    ?></span>
                                                            </span>
                                                        </span>
                                                    <?php endif; ?>
                                                    <?php
                                                    if($evox_adult_price != '' || $evox_child_price != ''):
                                                        ?>
                                                        <span class="tz-tour-price-per-person">
                                                            <?php echo esc_html__('From','evox');?>
                                                            <span class="price-per-person">
                                                                <?php
                                                                if($evox_adult_price != ''){
                                                                    echo evox_price($evox_adult_price);
                                                                }elseif($evox_child_price != ''){
                                                                    echo evox_price($evox_child_price);
                                                                }?>
                                                                </span>
                                                            <?php echo esc_html__('/person','evox');?>
                                                                </span>
                                                    <?php endif;?>
                                                    <?php if($evox_adult_price == '' && $evox_child_price == ''):?>
                                                        <span class="tz-tour-price-message">
                                                            <?php echo esc_html__('Please Contact Us for Price','evox');?>
                                                        </span>
                                                    <?php endif;?>
                                                    <?php
                                                }else{
                                                    echo '<span class="tz-tour-external-message">'.esc_html__('External Tour','evox').'</span>';
                                                    ?>
                                                <?php }?>

                                            </div>
                                        <?php } ?>
                                        <!--End Total Price -->
                                    </div>
                                <?php } ?>
                                <?php if($evox_booking_form_show == '1'){?>
                                    <?php
                                    if ( ( $evox_allow_manager_people == '1' && $evox_total_people == '0' ) || $evox_tour_type == 'special' && empty($evox_departure_time) && $evox_check_tour_available['0'] == '0' ){ ?>
                                        <span class="tz-tour-our-of-stock-message"><?php echo esc_html__('Out of stock','evox'); ?></span>
                                    <?php }else{ ?>
                                        <?php if( $evox_tour_type != 'external' ){ ?>
                                            <?php if($evox_adult_price != '' || $evox_child_price != ''):?>
                                                <!--Booking Form -->
                                                <div class="tz-tour-book-form">
                                                    <form method="get" id="booking-form" action="<?php echo esc_url( evox_get_tour_cart_page() ); ?>">
                                                        <input type="hidden" name="tour_id" value="<?php echo get_the_ID()?>">
                                                        <?php if($evox_tour_type == 'special' && empty($evox_departure_time) && $evox_check_tour_available['2'] != ''){?>
                                                            <input type="hidden" name="people_available" value="<?php echo $evox_check_tour_available['2'];?>">
                                                        <?php }else{?>
                                                            <input type="hidden" name="people_available" value="">
                                                        <?php } ?>

                                                        <?php if( $evox_first_name_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $evox_first_name_label != '' ){
                                                                    echo '<label>'.esc_html($evox_first_name_label).'</label>';
                                                                } ?>
                                                                <div class="book-name">
                                                                    <input name="first_name" value="" placeholder="<?php echo esc_html($evox_first_name_label) ?>" type="text" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $evox_last_name_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $evox_last_name_label != '' ){
                                                                    echo '<label>'.esc_html($evox_last_name_label).'</label>';
                                                                } ?>
                                                                <div class="book-name">
                                                                    <input name="last_name" value="" placeholder="<?php echo esc_html($evox_last_name_label) ?>" type="text" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $evox_email_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $evox_email_label != '' ){
                                                                    echo '<label>'.esc_html($evox_email_label).'</label>';
                                                                } ?>
                                                                <div class="book-email">
                                                                    <input name="your_email" value="" placeholder="<?php echo esc_html($evox_email_label) ?>" type="text" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $evox_field_phone_show == '1' ){ ?>
                                                            <div class="form-group">
                                                                <?php if( $evox_field_phone_label != '' ){
                                                                    echo '<label>'.esc_html($evox_field_phone_label).'</label>';
                                                                } ?>
                                                                <div class="book-phone">
                                                                    <input name="your_phone" value="" placeholder="<?php echo esc_html($evox_field_phone_label) ?>" type="text" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if($evox_tour_type == 'daily'):?>
                                                            <div class="form-group">
                                                                <?php if( $evox_departure_label != '' ){
                                                                    echo '<label>'.esc_html($evox_departure_label).'</label>';
                                                                } ?>
                                                                <div class="book-departure-date">
                                                                    <input class="date-pick form-control" data-locale="<?php echo esc_attr(get_locale()); ?>" data-day-start-week= "<?php echo esc_attr($evox_day_start_week);?>" data-date-format="yyyy-mm-dd" type="text" name="date" placeholder="<?php esc_html_e('yyyy-mm-dd','evox') ?>">
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <?php if ( $evox_field_time_show == '1' && ! empty( $evox_departure_time ) ) :?>
                                                            <div class="form-group">
                                                                <?php
                                                                if($evox_departure_time_label != ''){
                                                                    echo '<label>'.esc_html($evox_departure_time_label).'</label>';
                                                                }else{
                                                                    echo '<label>'.esc_html__('Departure Time','evox').'</label>';
                                                                }
                                                                ?>
                                                                <div class="book-departure-time">
                                                                    <select name="departure_time">
                                                                        <option  value=""><?php esc_html_e('Choose departure time','evox' ); ?></option>
                                                                        <?php

                                                                        foreach ( $evox_departure_time as $evox_time ) {
                                                                            echo '<option  value="' . esc_attr( $evox_time ) . '">'. esc_html( $evox_time ) .'</option>';
                                                                        }

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <p class="require-date-time-message"><?php echo esc_html__('( Please select date and time before select people )','evox'); ?></p>

                                                        <p class="our-of-stock-message"><?php echo esc_html__('Out of stock','evox'); ?></p>

                                                        <?php if ( $evox_check_has_combo == true ) :?>
                                                            <div class="form-group">
                                                                <?php
                                                                echo '<label>'.esc_html__('Choose Combo','evox').'</label>';
                                                                ?>
                                                                <div class="book-combo-tours">
                                                                    <select id="price_combo" name="price_combo">
                                                                        <?php
                                                                        foreach ( $evox_add_combo_tour as $evox_combo_tour ) {
                                                                            echo '<option  value="' . esc_attr( $evox_combo_tour['price_combo'] ) . '" data-people-combo="' . esc_attr( $evox_combo_tour['people_combo'] ) . '">'. esc_html( $evox_combo_tour['name_combo'] ) .'</option>';
                                                                        }
                                                                        ?>
                                                                        <option  value="custom" selected><?php esc_html_e('Choose Persons','evox' ); ?></option>
                                                                    </select>
                                                                    <input class="name_combo" name="name_combo" value="" type="hidden">
                                                                    <input class="people_combo" name="people_combo" value="" type="hidden">
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <?php if( $evox_adult_price != ''){ ?>
                                                            <div class="form-group <?php echo esc_html($evox_class_has_combo); ?>">
                                                                <?php if( $evox_adults_label != '' ){
                                                                    echo '<label>'.esc_html($evox_adults_label).'</label>';
                                                                } ?>
                                                                <div class="st_adults_children">
                                                                    <div class="input-number-ticket">
                                                                        <input class="input-number" name="number_adults" type="text" value="1" data-min="1" data-max="<?php echo esc_attr($evox_max_adults); ?>" min="1" max="<?php echo esc_attr($evox_max_adults); ?>"/>
                                                                        <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                                                        <input name="price_adults" value="<?php echo esc_attr($evox_adult_price); ?>" type="hidden">
                                                                    </div>
                                                                    <div class="tz_price">
                                                                        <span class="adult_price"><?php echo esc_html('×&nbsp;').evox_price($evox_adult_price); ?></span>
                                                                        <span class="total_price_adults"><?php echo esc_html('=&nbsp;').evox_price($evox_adult_price); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if( $evox_child_price != '' && $evox_child_price != 0 ){ ?>
                                                            <div class="form-group <?php echo esc_html($evox_class_has_combo); ?>">
                                                                <?php if( $evox_children_label != '' ){
                                                                    echo '<label>'.esc_html($evox_children_label).'</label>';
                                                                } ?>
                                                                <div class="st_adults_children">
                                                                    <div class="input-number-ticket">
                                                                        <input class="input-number" name="number_children" type="text" value="0" data-min="0" data-max="<?php echo esc_attr($evox_max_kids); ?>" min="0" max="<?php echo esc_attr($evox_max_kids); ?>"/>
                                                                        <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                                                        <input name="price_child" value="<?php echo esc_attr($evox_child_price); ?>" type="hidden">
                                                                    </div>
                                                                    <div class="tz_price">
                                                                        <span class="child_price"><?php echo esc_html('×&nbsp;').evox_price($evox_child_price); ?></span>
                                                                        <span class="total_price_children"><?php echo esc_html('=&nbsp;').evox_price(0); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <p class="book-message">
                                                            <?php echo esc_html__('Exceed the maximum number of people for this tour. The number of seats available is ','evox')?>
                                                            <span class="book-number-available">
                                                                10
                                                            </span>
                                                        </p>
                                                        <?php if( $evox_booking_text != '' ){
                                                            echo '<button type="submit" class="btn_full book-now">'.esc_html($evox_booking_text).'</button>';
                                                        } ?>
                                                    </form>
                                                </div>
                                                <!--End Booking Form -->
                                            <?php endif;?>
                                        <?php }else{
                                            if($evox_tour_external_note != ''):
                                                echo '<p class="tz-external-description">'.esc_html($evox_tour_external_note).'</p>';
                                            endif;
                                            if($evox_tour_external_button != ''):
                                                echo '<a class="btn-external" href="'.esc_url($evox_tour_external_link).'" title="'.esc_html($evox_tour_external_button).'" target="_blank">'.esc_html($evox_tour_external_button).'</a>';
                                            endif;
                                        } ?>
                                    <?php } ?>
                                <?php } ?>

                                <!--Contact Form -->
                                <?php if($evox_contact_form_show == '1'):
                                    evox_get_template('contact-form.php','/tour/templates/single-tour/');
                                endif;?>
                                <!--End Contact Form -->
                                <div class="tz-tour-data" data-adults-price="<?php if($evox_adult_price != ''){ echo esc_attr( $evox_adult_price ); }else{ echo '0';} ?>" data-child-price="<?php if($evox_child_price != ''){ echo esc_attr( $evox_child_price ); }else{ echo '0';} ?>" data-discount="<?php echo esc_attr( $evox_discount ); ?>" data-available-days='<?php echo json_encode($evox_tour_available_days );?>' data-start-date="<?php echo esc_attr($evox_tour_start_date_milli_sec); ?>" data-end-date="<?php echo esc_attr($evox_tour_end_date_milli_sec); ?>" data-decimal-prec="<?php echo esc_attr($evox_decimal_prec); ?>" data-decimal-sep="<?php echo esc_attr($evox_decimal_sep); ?>" data-thousands-sep="<?php echo esc_attr($evox_thousands_sep); ?>" data-departure-time='<?php echo json_encode($evox_departure_time );?>'></div>
                            </div>
                        </div>
                        <!--End Sidebar Filter right -->
                    <?php } ?>

                    <?php
                    if($evox_other_tour_options == '1'):
                        evox_get_template('other-tour.php','/tour/templates/single-tour/');
                    endif;?>
                </div>
            </div>
        </div>

    </div>
<?php
endwhile; // end while ( have_posts )
endif; // end if ( have_posts )
get_footer(); ?>
