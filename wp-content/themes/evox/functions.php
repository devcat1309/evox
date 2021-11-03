<?php
    /*
     *constants
     */
    if( !function_exists('evox_setup') ):
        function evox_setup(){
            
            /**
             * Set the content width based on the theme's design and stylesheet.
             */
            global $content_width;
            if ( ! isset( $content_width ) )
                $content_width = 900;
            
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             */
            load_theme_textdomain( 'evox', get_template_directory() . '/languages' );
            
            /**
             * plazart theme setup.
             *
             * Set up theme defaults and registers support for various WordPress features.se
             *
             * Note that this function is hooked into the after_setup_theme hook, which
             * runs before the init hook. The init hook is too late for some features, such
             * as indicating support post thumbnails.
             *
             */
            //Enable support for Header (tz-demo)
            add_theme_support( 'custom-header' );
            
            //Enable support for Background (tz-demo)
            add_theme_support( 'custom-background' );
            
            //Enable support for Post Thumbnails
            add_theme_support('post-thumbnails');
            
            // Add RSS feed links to <head> for posts and comments.
            add_theme_support( 'automatic-feed-links' );
            
            // This theme uses wp_nav_menu() in two locations.
            register_nav_menus( array(
                'primary' => esc_html__( 'Primary Menu', 'evox' ),
                'footer-menu' => esc_html__( 'Footer Menu', 'evox' ),
            ) );
            
            // add theme support title-tag
            add_theme_support( 'title-tag' );
            
            /*  Post Type   */
            add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','quote' ) );
            

            /*
            * This theme styles the visual editor to resemble the theme style,
            * specifically font, colors, icons, and column width.
            */
            add_editor_style( array( 'css/editor-style.css', evox_fonts_url()) );
        }
    endif;
    add_action( 'after_setup_theme', 'evox_setup' );
    
    /**
     * Register Sidebar
     */
    
    add_action( 'widgets_init', 'evox_widgets_init');
    function evox_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'evox'),
            'id'            => 'sidebar',
            'description'   => esc_html__( 'Display sidebar right or left on all page.', 'evox' ),
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        ));
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 1', 'evox' ),
            'id'            => 'tz-plazart-footer-1',
            'description'   => esc_html__( 'Display footer column 1 on all page.', 'evox' ),
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        ) );
        
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 2', 'evox' ),
            'id'            => 'tz-plazart-footer-2',
            'description'   => esc_html__( 'Display footer column 2 on all page.', 'evox' ),
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        ) );
        
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 3', 'evox' ),
            'id'            => 'tz-plazart-footer-3',
            'description'   => esc_html__( 'Display footer column 3 on all page.', 'evox' ),
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        ) );
        
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 4', 'evox' ),
            'id'            => 'tz-plazart-footer-4',
            'description'   => esc_html__( 'Display footer column 4 on all page.', 'evox' ),
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer 5', 'evox' ),
            'id'            => 'tz-plazart-footer-5',
            'description'   => esc_html__( 'Display footer column 5 on all page.', 'evox' ),
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title title-widget"><span>',
            'after_title'   => '</span></h3>'
        ) );

    }

//Admin Script
    function evox_admin_scripts(){
        
        wp_enqueue_style('evox-admin-style', get_template_directory_uri() . '/extension/assets/css/admin-styles.css');
        wp_enqueue_style('evox-option-style', get_template_directory_uri() . '/extension/assets/css/tz-theme-options.css');
        
        wp_enqueue_script('evox-meta-boxes-script', get_template_directory_uri() . '/extension/assets/js/portfolio-meta-boxes.js', array(), false, $in_footer=true );
        wp_enqueue_script('evox-option-script', get_template_directory_uri() . '/extension/assets/js/portfolio-theme-option.js', array(), false, $in_footer=true );
    }
    add_action('admin_enqueue_scripts', 'evox_admin_scripts');

//Front-End Styles
    function evox_front_end_styles(){
        global $post;
        $evox_content = '';
        if( !is_null($post)){
            $evox_content = $post->post_content;
        }
        wp_enqueue_style('evox-uikit', get_template_directory_uri().'/assets/css/uikit.min.css', false );
        wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', false );
        wp_enqueue_style('linearicons', get_template_directory_uri().'/css/linearicons.css', false );
        wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.min.css', false );
        wp_enqueue_style( 'evox-fonts', evox_fonts_url(), array(), null );
        wp_enqueue_style('evox-icheck', get_template_directory_uri().'/css/icheck/icheck.css', false );
        if( is_singular('post') || is_tag() || is_category() || is_archive() || is_author() || is_search() || is_home() ){
            wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css', false );
        }

        wp_enqueue_style('evox-style', get_template_directory_uri() . '/style.css', false);

    }
    add_action('wp_enqueue_scripts', 'evox_front_end_styles');

//Register Front-End Scripts
    function evox_front_end_scripts()
    {
        global $post;
        $evox_content = '';
        if( !is_null($post)){
            $evox_content = $post->post_content;
        }
        $evox_current_locale = get_locale();
        $evox_current_locale = substr(str_replace( '_', '-', $evox_current_locale), 0, 2);

        // Load the html5 shiv.
        wp_enqueue_script( 'evox-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.0' );
        wp_script_add_data( 'evox-html5', 'conditional', 'lt IE 9' );
        
        wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/uikit.min.js',array(),false,true );

        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
        
        $evox_header_page_option = evox_metabox('evox_header_page_option','','','default');
        $evox_header_page_select = evox_metabox('evox_header_page_type','','','0');
        $evox_header_theme_select = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
        $evox_header_select = '';
        
        if(is_page() && $evox_header_page_option == 'custom'):
            $evox_header_select = $evox_header_page_select;
        else:
            $evox_header_select = $evox_header_theme_select;
        endif;
        
        if($evox_header_select == '4'){
            wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);
            
            if ( $evox_current_locale != 'en' ) {
                $evox_file_name = '/js/locales/bootstrap-datepicker.' . $evox_current_locale . '.min.js';
                wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $evox_file_name, array(), false, true );
                
            }
            wp_enqueue_script('evox-header-type-5', get_template_directory_uri().'/js/tz-header-type-5.js',array(),false,true);
            
            $evox_arg  = array( 'lang' => $evox_current_locale);
            wp_localize_script('evox-header-type-5', 'evox_variable', $evox_arg);
        }
        
        wp_enqueue_script( 'evox-custom', get_template_directory_uri().'/js/custom.js',array('jquery'),false,true );
        $evox_admin_url      = admin_url('admin-ajax.php');
        $evox_arg   = array( 'url' => $evox_admin_url);
        wp_localize_script('evox-custom', 'evox_ajax', $evox_arg);
        
        
    }
    add_action('wp_enqueue_scripts', 'evox_front_end_scripts');
    
    if ( ! function_exists( 'evox_comment' ) ) :
        function evox_comment( $evox_comment, $evox_args, $evox_depth ) {
            switch ( $evox_comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
// Display trackbacks differently than normal comments.
                    ?>
                    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <p><?php  esc_html_e( 'Pingback:', 'evox'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(  esc_html__( '(Edit)', 'evox'), '<span class="edit-link">', '</span>' ); ?></p>
                    <?php
                    break;
                default :
                    // Proceed with normal comments.
                    ?>
                    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comments">
                        <div class="comment-meta comment-author vcard">
                            <?php echo get_avatar( $evox_comment, 75 ); ?>
                            <!--<img src="--><?php //echo get_avatar_url( get_the_author_meta('ID'),array('size'=> 75,)); ?><!--" alt="avatar">-->
                        </div>
                        
                        <?php if ( '0' == $evox_comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php  esc_html_e( 'Your comment is awaiting moderation.', 'evox'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content">
                            <?php
                                printf( '<h5 class="fn">%1$s</h5>',
                                    get_comment_author_link()
                                );
                            ?>

                            <div class="content">
                                <span class="time"><?php comment_time(); ?></span>
                                <span class="sp"> <?php echo esc_html__('-','evox'); ?></span>
                                <span class="date"><?php comment_date(); ?></span>
                                <?php if ( current_user_can( 'edit_comment', $evox_comment->comment_ID ) ) { ?>
                                    <span class="sp"> <?php echo esc_html__('/','evox'); ?></span>
                                <?php }?>
                                <?php edit_comment_link( esc_html__( 'Edit', 'evox' ) ); ?>
                                <span class="sp"> <?php echo esc_html__('/','evox'); ?></span>
                                <?php comment_reply_link( array_merge( $evox_args, array( 'reply_text' => esc_html__('Reply','evox'), 'depth' => $evox_depth, 'max_depth' => $evox_args['max_depth'] ) ) ); ?>
                            </div>
                            <?php
                                comment_text();
                            ?>

                        </div><!-- .comment-content -->
                        <div class="clearfix"></div>
                    </article><!-- #comment-## -->
                    <?php
                    break;
            endswitch; // end comment_type check
        }
    endif;
    
    /*
     * Required: include plugin theme scripts
     */
    require get_template_directory() . '/extension/tz-process-option.php';
    
    if ( class_exists( 'ReduxFramework' ) ) {
        /*
         * Required: Redux Framework
         */
        require get_template_directory() . '/extension/plazartredux/theme-options.php';
        require get_template_directory() . '/extension/plazartredux/example-functions.php';
    }
    
    if ( class_exists( 'RWMB_Loader')){
        /*
         * Required: Metabox
         */
        require get_template_directory() . '/extension/meta-box/page-general-metabox.php';
        require get_template_directory() . '/extension/meta-box/header-page-metabox.php';
        require get_template_directory() . '/extension/meta-box/breadcrumb-page-metabox.php';
        require get_template_directory() . '/extension/meta-box/newsletter-page-metabox.php';
        require get_template_directory() . '/extension/meta-box/page-home-slide-metabox.php';
        require get_template_directory() . '/extension/meta-box/branch-metabox.php';
        require get_template_directory() . '/extension/meta-box/footer-page-metabox.php';
        
    }
    if ( ! function_exists( 'evox_metabox' ) ) {
        function evox_metabox( $evox_mbid,$evox_args = array(),$evox_post_id = null,$evox_default = '') {
            if ( function_exists( 'rwmb_meta' ) ) {
                $evox_metabox_value = rwmb_meta( $evox_mbid,$evox_args,$evox_post_id );
                return $evox_metabox_value;
            }else{
                return $evox_default;
            }
        }
    }
    

    if ( class_exists( 'WooCommerce' ) ) {
        require get_template_directory() . '/extension/evox-woocommerce.php';
    }

// Enable upload custom font
//Update function by TemPlaza HungKv
    if( ! function_exists( 'evox_upload_mimes' ) ) {
        function evox_upload_mimes( $evox_upload_mimes=array() ){
            $evox_upload_mimes['woff']   = 'font/woff';
            $evox_upload_mimes['ttf'] 	= 'font/ttf';
            $evox_upload_mimes['svg'] 	= 'font/svg';
            $evox_upload_mimes['eot'] 	= 'font/eot';
            $evox_upload_mimes['otf'] 	= 'font/otf';
            return $evox_upload_mimes;
        }
    }
    add_filter('upload_mimes', 'evox_upload_mimes');
    
    /**
     * Show full editor
     */
    if( !function_exists('evox_ilc_mce_buttons') ){
        function evox_ilc_mce_buttons($evox_buttons){
            array_push($evox_buttons,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );
            return $evox_buttons;
        }
    }
    add_filter("mce_buttons_2", "evox_ilc_mce_buttons");
    
    /**
     * Add font-size editor
     */
    function evox_customize_text_sizes($evox_initArray){
        $evox_initArray['fontsize_formats'] = "8px 10px 12px 13px 14px 15px 16px 18px 20px 23px 24px 26px 30px 32px 36px 38px 40px 45px 48px 50px 55px 60px 65px 70px 72px 75px 80px 100px 120px 140px 160px 180px 200px 205px 210px 220px 230px 240px 250px";
        return $evox_initArray;
    }
    add_filter('tiny_mce_before_init', 'evox_customize_text_sizes');
    
    
    if ( ! function_exists( 'evox_fonts_url' ) ) :
        function evox_fonts_url() {
            $evox_fonts_url = '';
            
            /* Translators: If there are characters in your language that are not
            * supported by Open Sans, translate this to 'off'. Do not translate
            * into your own language.
            */
            $evox_OpenSans = _x( 'on', 'Open Sans font: on or off', 'evox' );
            
            if ('off' !== $evox_OpenSans) {
                $evox_font_families = array();
                
                if ( 'off' !== $evox_OpenSans ) {
                    $evox_font_families[] = 'Open Sans:300,400,600,700,800';
                }
                
                $evox_query_args = array(
                    'family' => urlencode( implode( '|', $evox_font_families ) ),
                    'subset' => urlencode( 'latin,latin-ext' ),
                );
                
                $evox_fonts_url = add_query_arg( $evox_query_args, 'https://fonts.googleapis.com/css' );
            }
            
            return esc_url_raw( $evox_fonts_url );
        }
    endif;
    
    /*
     *  Custom Content More Link
     */
    if ( ! function_exists( 'evox_content_more' ) ) :
        function evox_content_more() {
            $evox_new_link = '';
            $evox_link = get_permalink('');
            $evox_new_link .= '<a class="tzreadmore" href="' . esc_url($evox_link) . '">'.esc_html__('Read More','evox').'</a>';
            
            return $evox_new_link;
        }
    endif;
    add_filter('the_content_more_link', 'evox_content_more');
    
    /*
     * Content Nav
     */
    
    if ( ! function_exists( 'evox_paging_nav' ) ) :
        /**
         * Displays navigation to next/previous pages when applicable.
         */
        function evox_paging_nav() {
            global $wp_query, $wp_rewrite;
            // Don't print empty markup if there's only one page.
            if ( $wp_query->max_num_pages < 2 ) {
                return;
            }
            
            $evox_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
            $evox_pagenum_link = html_entity_decode( get_pagenum_link() );
            $evox_query_args   = array();
            $evox_url_parts    = explode( '?', $evox_pagenum_link );
            
            if ( isset( $evox_url_parts[1] ) ) {
                wp_parse_str( $evox_url_parts[1], $evox_query_args );
            }
            
            $evox_pagenum_link = remove_query_arg( array_keys( $evox_query_args ), $evox_pagenum_link );
            $evox_pagenum_link = trailingslashit( $evox_pagenum_link ) . '%_%';
            
            $evox_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $evox_pagenum_link, 'index.php' ) ? 'index.php/' : '';
            $evox_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
            // Set up paginated links.
            $evox_links = paginate_links( array(
                'base'     => $evox_pagenum_link,
                'format'   => $evox_format,
                'total'    => $wp_query->max_num_pages,
                'current'  => $evox_paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $evox_query_args ),
                'prev_text' =>  esc_html__('','evox'),
                'next_text' =>  esc_html__( '', 'evox' ),
            ) );
            
            if ( $evox_links ) :
                
                ?>
                <nav class="navigation paging-navigation">
                    <div class="tzpagination loop-pagination">
                        <?php echo balanceTags($evox_links); ?>
                    </div><!-- .pagination -->
                </nav><!-- .navigation -->
            <?php
            endif;
        }
    endif;
    
    if ( ! function_exists( 'evox_comment_nav' ) ) :
        function evox_comment_nav() {
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                ?>
                <nav class="navigation comment-navigation" role="navigation">
                    <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'evox' ); ?></h2>
                    <div class="nav-links">
                        <?php
                            if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'evox' ) ) ) :
                                printf( '<div class="nav-previous">%s</div>', $prev_link );
                            endif;
                            
                            if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'evox' ) ) ) :
                                printf( '<div class="nav-next">%s</div>', $next_link );
                            endif;
                        ?>
                    </div><!-- .nav-links -->
                </nav><!-- .comment-navigation -->
            <?php
            endif;
        }
    endif;
    
    /*
    * This function is used to get people to check out the article
    */
    if ( ! function_exists( 'evox_getPostViews' ) ) :
        function evox_getPostViews($evox_postID){
            $evox_count_key = 'post_views_count';
            $evox_count = get_post_meta($evox_postID, $evox_count_key, true);
            if($evox_count==''){ // If such views are not
                delete_post_meta($evox_postID, $evox_count_key);
                add_post_meta($evox_postID, $evox_count_key,'0');
                return "0"; // return value of 0
            }
            return $evox_count; // Returns views
        }
    endif;
    
    /*
    * This function is used to set and update the article views.
    */
    if ( ! function_exists( 'evox_setPostViews' ) ) :
        function evox_setPostViews($evox_postID) {
            $evox_count_key = 'post_views_count';
            $evox_count = get_post_meta($evox_postID, $evox_count_key, true);
            if($evox_count==''){
                $evox_count = 0;
                delete_post_meta($evox_postID, $evox_count_key);
                add_post_meta($evox_postID, $evox_count_key, '0');
            }else{
                $evox_count++; // Incremental view
                update_post_meta($evox_postID, $evox_count_key, $evox_count); // update count
            }
        }
    endif;
    /*
     * Custom Breadcrumb
     */
    if ( !function_exists( 'evox_breadcrumbs_custom' ) ) :
        function evox_breadcrumbs_custom() {
            
            // Settings
            $evox_separator          = '//';
            $evox_breadcrums_id      = 'breadcrumbs';
            $evox_breadcrums_class   = 'breadcrumbs';
            $evox_home_title         = esc_html__('Home','evox');
            
            // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. produevox_cat)
            $evox_custom_taxonomy    = 'product_cat';
            $evox_custom_taxonomy_1  = 'branchs-category';
            
            // Get the query & post information
            global $post,$wp_query;
            
            // Do not display on the homepage
            if ( !is_front_page() ) {
                echo '<div class="tz-breadcrumb-custom">';
                // Build the breadcrums
                echo '<ul id="' . esc_attr($evox_breadcrums_id) . '" class="' . esc_attr($evox_breadcrums_class) . '">';
                
                // Home page
                echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr($evox_home_title) . '">' . esc_html($evox_home_title) . '</a></li>';
                echo '<li class="separator separator-home"> ' . esc_html($evox_separator) . ' </li>';
                
                if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
                    
                    echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';
                    
                } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
                    
                    // If post is a custom post type
                    $evox_post_type = get_post_type();
                    
                    // If it is a custom post type display name and link
                    if($evox_post_type != 'post') {
                        
                        $evox_post_type_object = get_post_type_object($evox_post_type);
                        $evox_post_type_archive = get_post_type_archive_link($evox_post_type);
                        
                        
                        echo '<li class="item-cat item-custom-post-type-' . esc_attr($evox_post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($evox_post_type) . '" href="' . esc_url($evox_post_type_archive) . '" title="' . esc_attr($evox_post_type_object->labels->name) . '">' . esc_html($evox_post_type_object->labels->name) . '</a></li>';
                        echo '<li class="separator"> ' . esc_html($evox_separator) . ' </li>';
                        
                    }
                    
                    $evox_custom_tax_name = get_queried_object()->name;
                    echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . esc_html($evox_custom_tax_name) . '</strong></li>';
                    
                    
                } else if ( is_single() ) {
                    
                    // If post is a custom post type
                    $evox_post_type = get_post_type();
                    
                    // If it is a custom post type display name and link
                    if($evox_post_type != 'post') {
                        
                        $evox_post_type_object = get_post_type_object($evox_post_type);
                        $evox_post_type_archive = get_post_type_archive_link($evox_post_type);
                        
                        echo '<li class="item-cat item-custom-post-type-' . esc_attr($evox_post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($evox_post_type) . '" href="' . esc_url($evox_post_type_archive) . '" title="' . esc_attr($evox_post_type_object->labels->name) . '">' . esc_html($evox_post_type_object->labels->name) . '</a></li>';
                        echo '<li class="separator"> ' . esc_html($evox_separator) . ' </li>';
                        
                    }
                    
                    // Get post category info
                    $evox_category = get_the_category();
                    
                    if(!empty($evox_category)) {
                        
                        // Get last category post is in
                        $evox_category_array = array_values($evox_category);
                        $evox_last_category = end($evox_category_array);
                        
                        // Get parent any categories and create array
                        $evox_get_cat_parents = rtrim(get_category_parents($evox_last_category->term_id, true, ','),',');
                        $evox_cat_parents = explode(',',$evox_get_cat_parents);
                        
                        // Loop through parent categories and store in variable $evox_cat_display
                        $evox_cat_display = '';
                        foreach($evox_cat_parents as $evox_parents) {
                            $evox_cat_display .= '<li class="item-cat">'.balanceTags($evox_parents).'</li>';
                            $evox_cat_display .= '<li class="separator"> ' . esc_html($evox_separator) . ' </li>';
                        }
                        
                    }
                    
                    // If it's a custom post type within a custom taxonomy
                    $evox_taxonomy_exists = taxonomy_exists($evox_custom_taxonomy);
                    if(empty($evox_last_category) && !empty($evox_custom_taxonomy) && $evox_taxonomy_exists) {
                        
                        $evox_taxonomy_terms = get_the_terms( $post->ID, $evox_custom_taxonomy );
                        $evox_cat_id         = $evox_taxonomy_terms[0]->term_id;
                        $evox_cat_nicename   = $evox_taxonomy_terms[0]->slug;
                        $evox_cat_link       = get_term_link($evox_taxonomy_terms[0]->term_id, $evox_custom_taxonomy);
                        $evox_cat_name       = $evox_taxonomy_terms[0]->name;
                        
                    }
                    
                    // If it's a custom post type within a custom taxonomy
                    $evox_taxonomy_exists_1 = taxonomy_exists($evox_custom_taxonomy_1);
                    if(empty($evox_last_category) && !empty($evox_custom_taxonomy_1) && $evox_taxonomy_exists_1) {
                        
                        $evox_taxonomy_terms_1 = get_the_terms( $post->ID, $evox_custom_taxonomy_1 );
                        $evox_cat_id_1         = $evox_taxonomy_terms_1[0]->term_id;
                        $evox_cat_nicename_1   = $evox_taxonomy_terms_1[0]->slug;
                        $evox_cat_link_1       = get_term_link($evox_taxonomy_terms_1[0]->term_id, $evox_custom_taxonomy_1);
                        $evox_cat_name_1       = $evox_taxonomy_terms_1[0]->name;
                        
                    }
                    
                    // Check if the post is in a category
                    if(!empty($evox_last_category)) {
                        echo balanceTags($evox_cat_display);
                        echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                        
                        // Else if post is in a custom taxonomy
                    } else if(!empty($evox_cat_id)) {
                        
                        echo '<li class="item-cat item-cat-' . esc_attr($evox_cat_id) . ' item-cat-' . esc_attr($evox_cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($evox_cat_id) . ' bread-cat-' . esc_attr($evox_cat_nicename) . '" href="' . esc_url($evox_cat_link) . '" title="' . esc_attr($evox_cat_name) . '">' . esc_html($evox_cat_name) . '</a></li>';
                        echo '<li class="separator"> ' . esc_html($evox_separator) . ' </li>';
                        echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                        
                    } else if(!empty($evox_cat_id_1)) {
                        
                        echo '<li class="item-cat item-cat-' . esc_attr($evox_cat_id_1) . ' item-cat-' . esc_attr($evox_cat_nicename_1) . '"><a class="bread-cat bread-cat-' . esc_attr($evox_cat_id_1) . ' bread-cat-' . esc_attr($evox_cat_nicename_1) . '" href="' . esc_url($evox_cat_link_1) . '" title="' . esc_attr($evox_cat_name_1) . '">' . esc_html($evox_cat_name_1) . '</a></li>';
                        echo '<li class="separator"> ' . esc_html($evox_separator) . ' </li>';
                        echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                        
                    }else {
                        echo '<li class="ssss item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                        
                    }
                    
                } else if ( is_category() ) {
                    
                    // Category page
                    echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
                    
                } else if ( is_page() ) {
                    
                    // Standard page
                    if( $post->post_parent ){
                        
                        // If child page, get parents
                        $evox_anc = get_post_ancestors( $post->ID );
                        
                        // Get parents in the right order
                        $evox_anc = array_reverse($evox_anc);
                        
                        // Parent page loop
                        if ( !isset( $evox_parents ) ) $evox_parents = null;
                        foreach ( $evox_anc as $evox_ancestor ) {
                            $evox_parents .= '<li class="item-parent item-parent-' . esc_attr($evox_ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($evox_ancestor) . '" href="' . get_permalink($evox_ancestor) . '" title="' . get_the_title($evox_ancestor) . '">' . get_the_title($evox_ancestor) . '</a></li>';
                            $evox_parents .= '<li class="separator separator-' . esc_attr($evox_ancestor) . '"> ' . esc_html($evox_separator) . ' </li>';
                        }
                        
                        // Display parent pages
                        echo balanceTags($evox_parents);
                        
                        // Current page
                        echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                        
                    } else {
                        
                        // Just display current page if not parents
                        echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '"> ' . get_the_title() . '</strong></li>';
                        
                    }
                    
                } else if ( is_tag() ) {
                    
                    // Tag page
                    
                    // Get tag information
                    $evox_term_id        = get_query_var('tag_id');
                    $evox_taxonomy       = 'post_tag';
                    $evox_args           = 'include=' . $evox_term_id;
                    $evox_terms          = get_terms( $evox_taxonomy, $evox_args );
                    $evox_get_term_id    = $evox_terms[0]->term_id;
                    $evox_get_term_slug  = $evox_terms[0]->slug;
                    $evox_get_term_name  = $evox_terms[0]->name;
                    
                    // Display the tag name
                    echo '<li class="item-current item-tag-' . esc_attr($evox_get_term_id) . ' item-tag-' . esc_attr($evox_get_term_slug) . '"><strong class="bread-current bread-tag-' . esc_attr($evox_get_term_id) . ' bread-tag-' . esc_attr($evox_get_term_slug) . '">' . esc_html($evox_get_term_name) . '</strong></li>';
                    
                } elseif ( is_day() ) {
                    
                    // Day archive
                    
                    // Year link
                    echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','evox') . '</a></li>';
                    echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($evox_separator) . ' </li>';
                    
                    // Month link
                    echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives','evox') . '</a></li>';
                    echo '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_html($evox_separator) . ' </li>';
                    
                    // Day display
                    echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__(' Archives','evox') . '</strong></li>';
                    
                } else if ( is_month() ) {
                    
                    // Month Archive
                    
                    // Year link
                    echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','evox') . '</a></li>';
                    echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($evox_separator) . ' </li>';
                    
                    // Month display
                    echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives','evox') . '</strong></li>';
                    
                } else if ( is_year() ) {
                    
                    // Display year archive
                    echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','evox') . '</strong></li>';
                    
                } else if ( is_author() ) {
                    
                    // Auhor archive
                    
                    // Get the author information
                    global $author;
                    $evox_userdata = get_userdata( $author );
                    
                    // Display author name
                    echo '<li class="item-current item-current-' . esc_attr($evox_userdata->user_nicename) . '"><strong class="bread-current bread-current-' . $evox_userdata->user_nicename . '" title="' . $evox_userdata->display_name . '">' . esc_html__('Author: ','evox') . $evox_userdata->display_name . '</strong></li>';
                    
                } else if ( get_query_var('paged') ) {
                    
                    // Paginated archives
                    echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page','evox') . ' ' . get_query_var('paged') . '</strong></li>';
                    
                } else if ( is_search() ) {
                    
                    // Search results page
                    echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="' . esc_html__('Search results for: ','evox') . get_search_query() . '">' . esc_html__('Search results for: ','evox') . get_search_query() . '</strong></li>';
                    
                } elseif ( is_404() ) {
                    
                    // 404 page
                    echo '<li>' . esc_html__('Error 404','evox') . '</li>';
                }
                
                echo '</ul>';
                echo '</div>';
                
            }
            
        }
    endif;
    /*
     * TWITTER AMPERSAND ENTITY DECODE
     */
    if( ! function_exists( 'evox_social_title' )):
        function evox_social_title( $evox_title ) {
            $evox_title = html_entity_decode( $evox_title );
            $evox_title = urlencode( $evox_title );
            return $evox_title;
        }
    endif;
    
    /****************************************************************************************************************
     * Fuction override post_class()
     * */
    
    if ( ! function_exists( 'evox_post_classes' ) ) :
        function evox_post_classes( $evox_classes, $evox_class, $post_id ) {
            if( is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home() ){
                $evox_classes[] = 'tz-blog-item';
            }
            
            if(is_single()){
                $evox_classes[] = 'tz-blog-single-item';
            }
            return $evox_classes;
        }
    endif;
    add_filter( 'post_class', 'evox_post_classes', 10, 3 );


    /*
     * redirect home function
     */
    if ( ! function_exists( 'evox_redirect_home' ) ) {
        function evox_redirect_home() {
            echo '<script> location.replace("'.esc_url( home_url("/") ).'"); </script>';
            exit;
        }
    }
    add_action( 'evox_wrong_data', 'evox_redirect_home' );
    
    /*
     * get logo url function
     */
    if ( ! function_exists( 'evox_logo_url' ) ) {
        function evox_logo_url() {
            global $evox_options;
            $evox_url = '';
            if ( ! empty( $evox_options['evox_logo_images'] ) && ! empty( $evox_options['evox_logo_images']['url'] ) ) {
                $evox_url = $evox_options['evox_logo_images']['url'];
            } else {
                $evox_url = get_template_directory_uri() . '/images/logo.png';
            }
            return $evox_url;
        }
    }
    
    /*
     * Get Count Post By Meta
     */
    if ( ! function_exists( 'evox_get_post_count_by_meta' ) ) {
        function evox_get_post_count_by_meta( $evox_meta_key, $evox_meta_value, $evox_post_type = 'post' ) {
            $evox_args = array(
                'post_type' => $evox_post_type,
                'numberposts'	=> -1,
                'post_status'	=> 'publish',
            );
            if ( $evox_meta_key && $evox_meta_value ) {
                if ( is_array($evox_meta_value) ) {
                    $evox_args['meta_query'][] = array('key' => $evox_meta_key, 'value' => $evox_meta_value, 'compare' => 'IN');
                }elseif( $evox_meta_value == 'all' ){
                    $evox_args['meta_query'][] = array('key' => $evox_meta_key);
                }else {
                    $evox_args['meta_query'][] = array('key' => $evox_meta_key, 'value' => $evox_meta_value);
                }
            }
            $evox_posts = get_posts($evox_args);
            $evox_count = count($evox_posts);
            return $evox_count;
        }
    }
    
    /*
     * Get Count All Comment By Post Type
     */
    if ( ! function_exists( 'evox_get_all_comments_of_post_type' ) ) {
        function evox_get_all_comments_of_post_type($evox_post_type){
            global $wpdb;
            $evox_comments = $wpdb->get_var("SELECT COUNT(comment_ID) FROM $wpdb->comments
        WHERE comment_post_ID in ( SELECT ID FROM $wpdb->posts WHERE post_type = '$evox_post_type' AND post_status = 'publish')
        AND comment_approved = 1");
            return $evox_comments;
        }
    }
    
    /********************************************************************************
     * Function Override Number Posts Per Page
     */
    
    function evox_set_post_per_page( $query ) {
        global $evox_options;
        $evox_branchs_per_page = ((!isset($evox_options['evox_branchs_per_page'])) || empty($evox_options['evox_branchs_per_page'])) ? '8' : $evox_options['evox_branchs_per_page'];
        
        //Don't change in WordPress admin
        if ( is_admin() || ! $query->is_main_query() )
            return;
        
        if ( $query->is_post_type_archive( 'branchs' ) || is_tax('branchs-category') ) {
            $query->set('posts_per_page', $evox_branchs_per_page);
            return;
        }
    }
    add_action( 'pre_get_posts', 'evox_set_post_per_page', 1 );
    
    /*
     * Function hex--rgb
     */
    function evox_hex2rgb($evox_hex,$evox_o) {
        $evox_hex = str_replace("#", "", $evox_hex);
        
        if(strlen($evox_hex) == 3) {
            $evox_r = hexdec(substr($evox_hex,0,1).substr($evox_hex,0,1));
            $evox_g = hexdec(substr($evox_hex,1,1).substr($evox_hex,1,1));
            $evox_b = hexdec(substr($evox_hex,2,1).substr($evox_hex,2,1));
        } else {
            $evox_r = hexdec(substr($evox_hex,0,2));
            $evox_g = hexdec(substr($evox_hex,2,2));
            $evox_b = hexdec(substr($evox_hex,4,2));
        }
        $evox_rgba = array($evox_r, $evox_g, $evox_b,$evox_o);
        return implode(",", $evox_rgba); // returns the rgb values separated by commas
//                                return $rgb; // returns an array with the rgb values
    }
    
    function evox_colourBrightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex,'#')) {
            $hex = str_replace('#','',$hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
        //// CALCULATE
        for ($i=0; $i<3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent*2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for($i=0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if(strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash.$hex;
    }
    
    /*
     * get permalink page
     */
    if ( ! function_exists( 'evox_get_permalink_clang' ) ) {
        function evox_get_permalink_clang( $post_id )
        {
            $evox_url = "";
            if ( function_exists('icl_object_id') ) {
                $evox_language = ICL_LANGUAGE_CODE;
                
                $evox_lang_post_id = icl_object_id( $post_id , 'page', true, $evox_language );
                
                if( 0 != $evox_lang_post_id ) {
                    $evox_url = get_permalink( $evox_lang_post_id );
                } else {
                    // No page found, it's most likely the homepage
                    global $sitepress;
                    $evox_url = $sitepress->language_url( $evox_language );
                }
            } else {
                $evox_url = get_permalink( $post_id );
            }
            
            return esc_url( $evox_url );
        }
    }
    
    /*
     * get current page url
     */
    if ( ! function_exists( 'evox_get_current_page_url' ) ) {
        function evox_get_current_page_url() {
            global $wp;
            return esc_url( home_url(add_query_arg(array(),$wp->request)) );
        }
    }
    
    /*
     * get redirect page after login page url function
     */
    if ( ! function_exists( 'evox_start_page_url' ) ) {
        function evox_start_page_url() {
            
            global $evox_options;
            $start_page_url = '';
            if ( ! empty( $evox_options['evox_login_redirect_page'] ) ) {
                $start_page_url = evox_get_permalink_clang( $evox_options['evox_login_redirect_page'] );
            } else {
                $start_page_url = esc_url( admin_url('/') );
            }
            return $start_page_url;
        }
    }
    /*
     * login failed function
     */
    add_action( 'wp_login_failed', 'evox_login_failed' );
    
    if ( ! function_exists( 'evox_login_failed' ) ) {
        function evox_login_failed( $user ) {
            global $evox_options;
            if ( ! empty( $evox_options['evox_login_page'] ) ) {
                wp_redirect( add_query_arg( array( 'login' => 'failed', 'user' => $user ), evox_get_permalink_clang( $evox_options['evox_login_page'] ) ) );
                exit();
            }
        }
    }
    
    /*
     * lost password function
     */
    add_action( 'lost_password', 'evox_lost_password' );
    
    if ( ! function_exists( 'evox_lost_password' ) ) {
        function evox_lost_password() {
            global $evox_options;
            if ( ! empty( $evox_options['evox_lostpassword_page'] ) && empty( $_GET['no_redirect'] ) ) {
                wp_redirect( add_query_arg( $_GET, evox_get_permalink_clang( $evox_options['evox_lostpassword_page'] ) ) );
                exit;
            }
        }
    }
    
    /*
     * Authentication function
     */
    add_filter( 'authenticate', 'evox_authenticate', 1, 3);
    
    if ( ! function_exists( 'evox_authenticate' ) ) {
        function evox_authenticate(  $user, $username, $password  ){
            global $evox_options;
            if ( ! empty( $evox_options['evox_login_page'] ) && ( empty( $username ) || empty( $password ) ) && empty( $_GET['no_redirect'] ) ) {
                wp_redirect( add_query_arg( $_GET, evox_get_permalink_clang( $evox_options['evox_login_page'] ) ) );
                exit;
            }
        }
    }

// unsuccessfull registration
    add_action('register_post', 'binda_register_fail_redirect', 99, 3);
    
    function binda_register_fail_redirect( $sanitized_user_login, $user_email, $errors ){
        //this line is copied from register_new_user function of wp-login.php
        $errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );
        //this if check is copied from register_new_user function of wp-login.php
        if ( $errors->get_error_code() ){
            //setup your custom URL for redirection
//        $redirect_url = get_bloginfo('url') . '/register';
            
            global $evox_options;
            $evox_register_page = ((!isset($evox_options['evox_register_page'])) || empty($evox_options['evox_register_page'])) ? '' : $evox_options['evox_register_page'];
            
            //add error codes to custom redirection URL one by one
            foreach ( $errors->errors as $e => $m ){
                $redirect_url = add_query_arg( $e, '1', evox_get_permalink_clang($evox_register_page));
            }
            //add finally, redirect to your custom page with all errors in attributes
            wp_redirect( $redirect_url );
            exit;
        }
    }
    
    
    /* Count All Comment No Reply*/
    function evox_parent_comment_counter($post_id = 0 ){
        $post = get_post( $post_id );
        global $wpdb;
        
        if ( ! $post ) {
            $count = 0;
        } else {
            $post_id = $post->ID;
            $query = "SELECT COUNT(comment_post_id) AS count FROM $wpdb->comments WHERE comment_approved = 1 AND comment_post_ID = $post_id AND comment_parent = 0";
            $parents = $wpdb->get_row($query);
            $count = $parents->count;
        }
        return apply_filters( 'evox_parent_comment_counter', $count, $post_id );
    };
    
    /*method activie plugin*/
    require get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
    
    add_filter( 'plazart-installation_register', 'tz_realestate_register_required_demos' );

    /*method activie plugin*/
    require get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
    
    add_action('tgmpa_register', 'evox_register_required_plugins');
    function evox_register_required_plugins()
    {
        
        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $tz_realestate_plugins = array(
            
            /* This is an example of how to include a plugin pre-packaged with a theme */
            array(
                'name' => esc_html__('Plazart installation', 'evox'), /* The plugin name */
                'slug' => 'plazart-installation', /* The plugin slug (typically the folder name) */
                'source' => get_template_directory_uri() . '/plugins/plazart-installation.zip', /* The plugin source */
                'required' => true, /* If false, the plugin is only 'recommended' instead of required */
                'version' => '1.0.3', /* E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented */
                'force_activation' => false, /* If true, plugin is activated upon theme activation and cannot be deactivated until theme switch */
                'force_deactivation' => false, /* If true, plugin is deactivated upon theme switch, useful for theme-specific plugins */
                'external_url' => '', /* If set, overrides default API URL and points to an external URL */
            ),
        
        );
        
        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $tz_realestate_config = array(
            'id' => 'tgmpa',                 /* Unique ID for hashing notices for multiple instances of TGMPA. */
            'default_path' => '',                      /* Default absolute path to bundled plugins. */
            'menu' => 'tgmpa-install-plugins', /* Menu slug. */
            'parent_slug' => 'themes.php',            /* Parent menu slug. */
            'capability' => 'edit_theme_options',    /* Capability needed to view plugin install page, should be a capability associated with the parent menu used. */
            'has_notices' => true,                    /* Show admin notices or not. */
            'dismissable' => true,                    /* If false, a user cannot dismiss the nag message. */
            'dismiss_msg' => '',                      /* If 'dismissable' is false, this message will be output at top of nag. */
            'is_automatic' => false,                   /* Automatically activate plugins after installation or not. */
            'message' => '',                      /* Message to output right before the plugins table. */
        );
        
        tgmpa($tz_realestate_plugins, $tz_realestate_config);
    }
function replace_core_jquery_version() {
    wp_deregister_script( 'jquery-core' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery-core', get_template_directory_uri()."/js/jquery-2.2.4.min.js", array(), '2.2.4' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
//Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}

add_action('wp_default_scripts', 'remove_jquery_migrate');
add_filter( 'use_widgets_block_editor', '__return_false' );
?>