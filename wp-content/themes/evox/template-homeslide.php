<?php
/*
 * Template Name: Template Home Slide
 */
?>
<?php

$evox_top_email         =   ((!isset($evox_options['evox_logo_top_email'])) || empty($evox_options['evox_logo_top_email'])) ? '' : $evox_options['evox_logo_top_email'];
$evox_top_phone         =   ((!isset($evox_options['evox_logo_top_phone'])) || empty($evox_options['evox_logo_top_phone'])) ? '' : $evox_options['evox_logo_top_phone'];
$evox_top_address       =   ((!isset($evox_options['evox_logo_top_address'])) || empty($evox_options['evox_logo_top_address'])) ? '' : $evox_options['evox_logo_top_address'];
$evox_top_randl         =   ((!isset($evox_options['evox_logo_top_randl'])) || empty($evox_options['evox_logo_top_randl'])) ? '' : $evox_options['evox_logo_top_randl'];

$evox_logo_type         =   evox_metabox( 'evox_home_slide_logo_type','','','image' );
$evox_logo_text         =   evox_metabox( 'evox_home_slide_logo_text','','','' );
$evox_logo_image        =   evox_metabox( 'evox_home_slide_logo_image','','','' );
$evox_slide             =   evox_metabox( 'evox_home_slide_revolution','','','' );

$evox_search_option     =   evox_metabox( 'evox_home_slide_search_option','','','show' );

$evox_field_name_option =   evox_metabox( 'evox_home_slide_search_field_name_option','','','show' );
$evox_field_name_label  =   evox_metabox( 'evox_home_slide_search_field_name_label','','','' );

$evox_field_destination_option =   evox_metabox( 'evox_home_slide_search_field_destination_option','','','show' );
$evox_field_destination_label  =   evox_metabox( 'evox_home_slide_search_field_destination_label','','','' );

$evox_field_date_option =   evox_metabox( 'evox_home_slide_search_field_date_option','','','show' );
$evox_field_date_label  =   evox_metabox( 'evox_home_slide_search_field_date_label','','','' );

$evox_field_duration_option =   evox_metabox( 'evox_home_slide_search_field_duration_option','','','show' );
$evox_field_duration_label  =   evox_metabox( 'evox_home_slide_search_field_duration_label','','','' );

$evox_field_category_option =   evox_metabox( 'evox_home_slide_search_field_category_option','','','hide' );
$evox_field_category_label  =   evox_metabox( 'evox_home_slide_search_field_category_label','','','' );

$evox_field_language_option =   evox_metabox( 'evox_home_slide_search_field_language_option','','','hide' );
$evox_field_language_label  =   evox_metabox( 'evox_home_slide_search_field_language_label','','','' );

$evox_field_search_button   =   evox_metabox( 'evox_home_slide_search_button','','','' );

get_header();
?>
<div class="tz-home-slide">
    <div class="tz-home-left">
        <div class="tz-home-left-box">
            <div class="tz-home-logo">
                <a class="tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                    <?php
                    if($evox_logo_type == 'text'):
                        echo esc_html($evox_logo_text);
                    else:
                        foreach($evox_logo_image as $evox_image) :
                            echo'<img src="'. esc_url($evox_image['full_url']) .'" alt="'.get_bloginfo('title').'" />';
                        endforeach;
                    endif;
                    ?>
                </a>
            </div>

            <button class="navbar-toggle collapsed tz_icon_menu" type="button" data-target="#tz-main-menu" data-toggle="collapse">
                <i class="fa fa-bars"></i>
            </button>

            <nav class="nav-collapse vertical_menu">
                <?php

                if ( has_nav_menu('primary') ) :
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav navbar-nav collapse navbar-collapse main-menu',
                        'menu_id'        => 'tz-main-menu',
                        'container'      => false,
                    ) ) ;
                endif;

                ?>
            </nav>

            <div class="sidebar-home-slide">
                <?php
                if(is_active_sidebar("tz-sidebar-home-slide") ):
                    dynamic_sidebar("tz-sidebar-home-slide");
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="tz-home-right">
        <div class="tz-home-right-box">
            <div class="tz-home-head">
                <div class="top-left pull-left">
                    <?php if($evox_top_phone != ''):?>
                        <a href="tel:<?php echo esc_url( $evox_top_phone ); ?>">
                            <i class="fa fa-headphones"></i>
                            <?php echo esc_html('Call Center: '. $evox_top_phone); ?>
                        </a>
                        <span>|</span>
                    <?php endif; ?>

                    <?php if($evox_top_email != ''):?>
                        <a href="mailto:<?php echo esc_url($evox_top_email); ?>">
                            <i class="fa fa-envelope"></i>
                            <?php echo esc_html($evox_top_email); ?>
                        </a>
                    <?php endif; ?>

                </div>
                <div class="top-right pull-right">
                    <?php if($evox_top_address != ''):?>
                        <a href="#">
                            <i class="fa fa-map-marker"></i>
                            <?php echo esc_html($evox_top_address); ?>
                        </a>
                    <?php endif; ?>
                    <?php
                    if(!is_user_logged_in()):
                        if($evox_top_randl == true):
                            ?>
                            <span>|</span>
                            <a href="<?php echo wp_login_url(); ?>">
                                <i class="fa fa-sign-in"></i>
                                <?php echo esc_html__('Login','evox') ?>
                            </a>
                        <?php if (get_option('users_can_register') == 1) : ?>
                            <span>|</span>
                            <a href="<?php echo wp_registration_url(); ?>">
                                <i class="fa fa-user"></i>
                                <?php echo esc_html__('Register','evox') ?>
                            </a>
                            <?php
                            endif;
                        endif;
                    else:
                        if($evox_top_randl == true):
                            ?>
                            <span>|</span>
                            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                <i class="fa fa-sign-out"></i>
                                <?php echo esc_html__('Logout','evox'); ?>
                            </a>
                        <?php
                        endif;
                    endif;
                    ?>
                </div>
            </div>
            <div class="tz-home-content">
                <?php
                if($evox_slide != ''):
                    putRevSlider($evox_slide);
                endif;
                ?>
            </div>

            <?php
            if($evox_search_option == 'show'):
            ?>
            <div class="tz-home-search">
                <span class="tz-search-tour-mobile"><?php echo esc_html__('Search Tour','evox')?><i class="fa fa-angle-double-up"></i></span>
                <form class="tzElement_search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="tzElement_search_field">
                        <input type="hidden" name="post_type" value="tour">

                        <?php if($evox_field_name_option == 'show'):?>
                            <div class="form-group form-name">
                                <label>
                                    <?php
                                    if($evox_field_name_label != ''):
                                        echo esc_html($evox_field_name_label);
                                    else:
                                        esc_html_e( 'Keywords', 'evox' );
                                    endif;
                                    ?>
                                </label>
                                <div class="field-box">
                                    <input type="text" class="form-control" name="s" placeholder="<?php echo esc_attr__( 'Enter a keyword here','evox' ) ?>">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($evox_field_destination_option == 'show'):?>

                            <div class="form-group form-destination">
                                <label>
                                    <?php
                                    if($evox_field_destination_label != ''):
                                        echo esc_html($evox_field_destination_label);
                                    else:
                                        esc_html_e( 'Destination', 'evox' );
                                    endif;
                                    ?>
                                </label>

                                <div class="field-box">
                                    <select name="tour_destination[]">
                                        <option value=""><?php echo esc_html__('Any','evox' ); ?></option>
                                        <?php

                                        $evox_args_destinations = array(
                                            'post_type'         => 'destination',
                                            'post_status'       => 'publish',
                                            'orderby'           => 'name',
                                            'order'             => 'ASC',
                                            'posts_per_page'    => -1
                                        );

                                        // The Query
                                        $evox_destinations_query = new WP_Query( $evox_args_destinations );
                                        // The Loop
                                        if ( $evox_destinations_query->have_posts() ) {
                                            while ( $evox_destinations_query->have_posts() ) {
                                                $evox_destinations_query->the_post();
                                                echo '<option  value="'.get_the_ID().'">'.get_the_title().'</option>';
                                            }
                                            /* Restore original Post Data */
                                            wp_reset_postdata();
                                        } else {
                                            // no posts found
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if($evox_field_date_option == 'show'):?>
                            <div class="form-group form-date">
                                <label>
                                    <?php
                                    if($evox_field_date_label != ''):
                                        echo esc_html($evox_field_date_label);
                                    else:
                                        esc_html_e( 'Departure Date', 'evox' );
                                    endif;
                                    ?>
                                </label>

                                <div class="field-box">
                                    <input class="date-pick form-control" placeholder="Any" data-date-format="mm/dd/yyyy" type="text" name="date">
                                </div>

                            </div>
                        <?php endif;?>

                        <?php if($evox_field_duration_option == 'show'): ?>
                            <div class="form-group form-duration">
                                <label>
                                    <?php
                                    if($evox_field_duration_label != ''):
                                        echo esc_html($evox_field_duration_label);
                                    else:
                                        esc_html_e( 'Duration', 'evox' );
                                    endif;
                                    ?>
                                </label>
                                <div class="field-box">
                                    <select name="tour_length">
                                        <option  value=""><?php esc_html_e('Any','evox' ); ?></option>
                                        <option  value="1"><?php esc_html_e('1 Day','evox' ); ?></option>
                                        <option  value="2"><?php esc_html_e('2 Days','evox' ); ?></option>
                                        <option  value="3"><?php esc_html_e('3 Days','evox' ); ?></option>
                                        <option  value="4"><?php esc_html_e('4 Days','evox' ); ?></option>
                                        <option  value="5"><?php esc_html_e('5 Days','evox' ); ?></option>
                                        <option  value="6"><?php esc_html_e('6 Days','evox' ); ?></option>
                                        <option  value="7"><?php esc_html_e('7 Days','evox' ); ?></option>
                                        <option  value="8"><?php esc_html_e('8 Days','evox' ); ?></option>
                                        <option  value="9"><?php esc_html_e('9 Days','evox' ); ?></option>
                                        <option  value="10"><?php esc_html_e('10 Days','evox' ); ?></option>
                                        <option  value="11"><?php esc_html_e('11 Days','evox' ); ?></option>
                                        <option  value="12"><?php esc_html_e('12 Days','evox' ); ?></option>
                                        <option  value="13"><?php esc_html_e('13 Days','evox' ); ?></option>
                                        <option  value="14"><?php esc_html_e('14 Days','evox' ); ?></option>
                                        <option  value="15"><?php esc_html_e('15 Days','evox' ); ?></option>
                                    </select>
                                </div>

                            </div>

                        <?php endif; ?>

                        <?php if($evox_field_category_option == 'show'): ?>

                            <div class="form-group form-category">
                                <label>
                                    <?php
                                    if($evox_field_category_label != ''):
                                        echo esc_html($evox_field_category_label);
                                    else:
                                        esc_html_e( 'Category', 'evox' );
                                    endif;
                                    ?>
                                </label>

                                <div class="field-box">
                                    <select name="tour_categories[]">
                                        <option  value=""><?php esc_html_e('Any','evox' ); ?></option>
                                        <?php
                                        $evox_all_tour_categoies = get_terms( 'tour-category', array('hide_empty' => 0) );
                                        if ( ! empty( $evox_all_tour_categoies ) ) :
                                            foreach ( $evox_all_tour_categoies as $evox_tour_category ) {
                                                echo '<option  value="' . esc_attr( $evox_tour_category->term_id ) . '">'. esc_html( $evox_tour_category->name ) .'</option>';
                                            }
                                        endif;?>
                                        ?>
                                    </select>
                                </div>

                            </div>

                        <?php endif; ?>
                        <?php if($evox_field_language_option == 'show'): ?>
                            <div class="form-group form-language">
                                <label>
                                    <?php
                                    if($evox_field_language_label != ''):
                                        echo esc_html($evox_field_language_label);
                                    else:
                                        esc_html_e( 'Language', 'evox' );
                                    endif;
                                    ?>
                                </label>
                                <div class="field-box">
                                    <select name="tour_languages[]">
                                        <option  value=""><?php esc_html_e('Any','evox' ); ?></option>
                                        <?php
                                        $evox_all_tour_languages = get_terms( 'tour-language', array('hide_empty' => 0) );
                                        if ( ! empty( $evox_all_tour_languages ) ) :
                                            foreach ( $evox_all_tour_languages as $evox_tour_language ) {
                                                echo '<option  value="' . esc_attr( $evox_tour_language->term_id ) . '">'. esc_html( $evox_tour_language->name ) .'</option>';
                                            }
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif;?>

                    </div>

                    <div class="tzElement_search_submit">
                        <button type="submit" class="btn btn-default tz-search-btn">
                            <?php
                            if($evox_field_search_button != ''):
                                echo esc_html($evox_field_search_button);
                            else:
                                esc_html_e('Search','evox' );
                            endif;
                            ?>
                        </button>
                    </div>
                </form>
            </div>

            <?php
            endif;
            ?>
        </div>
    </div>
</div>

<?php
if (have_posts()):
    while (have_posts()):the_post();
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'evox' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'evox' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
        ) );
    endwhile;
endif;
?>

<?php
get_footer();
?>