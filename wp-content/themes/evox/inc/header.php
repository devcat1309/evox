<?php
$wrapper_classes  = 'site-header templaza-header-section header-absolute';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';
class Evox_Submenu_Wrap extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='uk-navbar-dropdown'><ul class='uk-nav uk-navbar-dropdown-nav'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">
    <div class="uk-flex uk-flex-middle uk-grid-collapse header-content" data-uk-grid>
        <div class="templaza-mobile-btn uk-position-left-center ">
            <span class="open" data-uk-icon="icon: menu; ratio: 1.6"></span>
            <span class="close" data-uk-icon="icon: close; ratio: 1.6"></span>
        </div>
        <div class="uk-width-auto@m uk-width-1-1 uk-flex uk-flex-middle mb-logo">
            <?php if ( has_custom_logo()) { ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php }else{
                ?>
                <div class="site-logo evox-logo">
                    <a class="templaza-logo templaza-logo-image" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="uk-preserve templaza-logo-default" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/logo.svg');?>" data-uk-svg>
                        <img class="uk-preserve templaza-logo-mobile" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/logo_mobile.svg');?>" data-uk-svg>
                    </a>
                </div>
            <?php
            } ?>
        </div>
        <div class="uk-width-expand">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav id="site-navigation" class="uk-navbar-container templaza-basic-navbar uk-navbar-transparent" data-uk-navbar>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'primary',
                        'menu_class'      => 'uk-navbar-nav',
                        'container_class' => 'uk-navbar-left',
                        'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                        'walker'          => new Evox_Submenu_Wrap()
                    )
                );
                ?>
            </nav><!-- #site-navigation -->

            <?php endif; ?>
        </div>
    </div>
</header>