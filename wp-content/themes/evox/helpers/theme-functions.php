<?php
if(!class_exists('Evox_Theme_Functions')){
    class Evox_Theme_Functions{
        public function __construct(){
            $this -> hook();
        }
        public static function locate_my_template($template_names, $load = false, $require_once = true, $args = array()){
            $located    = '';
            foreach ( (array) $template_names as &$template_name ) {
                if ( ! $template_name ) {
                    continue;
                }
                if(!preg_match('/\.php$/i', $template_name)){
                    $template_name  .= '.php';
                }
                if ( file_exists( get_template_directory() . '/templaza-framework/templates/' . $template_name ) ) {
                    $located = get_template_directory() . '/templaza-framework/templates/' . $template_name;
                    break;
                }
            }
            if($load && $located != '') {
                load_template($located, $require_once, $args);
            }

            return $located;
        }
        public function load_my_layout($partial, $load = true, $require_once = true, $args = array()){
            $partial    = str_replace('.', '/', $partial);
            $located    = self::locate_my_template((array) $partial, $load, $require_once, $args);

            return $located;
        }
        public function hook(){
            add_filter('user_contactmethods', array($this, 'templaza_modify_contact_methods'));
            add_filter('wp_kses_allowed_html', array($this, 'templaza_wpkses_post_tags'), 10, 2);
            add_filter('upload_mimes', array($this, 'templaza_mime_types'));
            add_filter('edit_post_link', array($this, 'templaza_edit_post_link'),10,3);
            add_filter('the_content_more_link', array($this, 'templaza_modify_read_more_link'));

            add_action('templaza_get_postviews',array($this,'templaza_get_post_views'));
            add_action('templaza_set_postviews',array($this,'templaza_set_post_views'));
            add_action('templaza_get_commentcount_post',array($this,'templaza_get_comment_count_post'));
            add_action('templaza_breadcrumb',array($this,'templaza_breadcrumbs'));
            add_action('templaza_share_post',array($this,'templaza_get_share_social'));
            add_action('templaza_pagination',array($this,'templaza_pagination'));
            add_action('templaza_gallery_post',array($this,'templaza_get_gallery_post'));
            add_action('templaza_image_post',array($this,'templaza_get_image_post'));
            add_action('templaza_video_post',array($this,'templaza_get_video_post'));
            add_action('templaza_audio_post',array($this,'templaza_get_audio_post'));
            add_action('templaza_title_post',array($this,'templaza_get_title_post'));
            add_action('templaza_meta_post_header',array($this,'templaza_get_meta_post_header'));
            add_action('templaza_meta_post_footer',array($this,'templaza_get_meta_post_footer'));
            add_action('templaza_link_post',array($this,'templaza_get_link_post'));
            add_action('templaza_quote_post',array($this,'templaza_get_quote_post'));
            add_action('templaza_excerpt_post',array($this,'templaza_get_excerpt_post'));
            add_action('templaza_readmore_post',array($this,'templaza_get_readmore_post'));
            add_action('templaza_single_title_post',array($this,'templaza_single_get_title_post'));
            add_action('templaza_single_meta_post',array($this,'templaza_single_get_meta_post'));
            add_action('templaza_single_tag_post',array($this,'templaza_single_get_tag_post'));
            add_action('templaza_single_next_post',array($this,'templaza_single_get_next_post'));
            add_action('templaza_single_author_post',array($this,'templaza_single_get_author_post'));
            add_action('templaza_single_related_post',array($this,'templaza_single_get_related_post'));
            add_action('templaza_author_social',array($this,'templaza_author_social'));
            add_action('templaza_search_no_result',array($this,'templaza_search_no_result'));
            add_action('templaza_archive_no_result',array($this,'templaza_archive_no_result'));
            add_action('templaza_all_taxonomy',array($this,'templaza_all_taxonomy'),10,2);
            add_action('templaza_post_taxonomy',array($this,'templaza_post_taxonomy'),10,1);
            add_filter('templaza_cause_donate',array($this,'templaza_cause_donate'),10,1);
            add_action('templaza_cause_donate_archive',array($this,'templaza_cause_donate_archive'),10,1);

        }
        public function templaza_modify_contact_methods($profile_fields)
        {
            $profile_fields['job'] = 'Job';
            $profile_fields['facebook'] = esc_html__('Facebook URL','evox');
            $profile_fields['twitter'] = esc_html__('Twitter URL','evox');
            $profile_fields['instagram'] = esc_html__('Instagram URL','evox');
            $profile_fields['dribbble'] = esc_html__('Dribbble URL','evox');
            $profile_fields['linkedin'] = esc_html__('Linkedin URL','evox');
            $profile_fields['pinterest'] = esc_html__('Pinterest URL','evox');
            $profile_fields['youtube'] = esc_html__('Youtube URL','evox');
            $profile_fields['vimeo'] = esc_html__('Vimeo URL','evox');
            $profile_fields['flickr'] = esc_html__('Flickr URL','evox');
            $profile_fields['tumblr'] = esc_html__('Tumblr URL','evox');
            $profile_fields['whatsapp'] = esc_html__('WhatsApp URL','evox');
            return $profile_fields;
        }
        public function templaza_modify_read_more_link() {
            return '';
        }

        public function templaza_get_post_views($postID)
        {
            $args   = get_defined_vars();
            $this->load_my_layout('template-parts.content-views',true,false,$args);
        }

        function templaza_set_post_views($postID)
        {
            $count_key = 'post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if ($count == '') {
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            } else {
                $count++; // Incremental view
                update_post_meta($postID, $count_key, $count); // update count
            }
        }

        public function templaza_get_comment_count_post()
        {
            $templaza_comment_count = wp_count_comments(get_the_ID());
            if ($templaza_comment_count->approved == ''|| $templaza_comment_count->approved == 1) {
                echo esc_html__('Comment:','evox').' '.esc_html($templaza_comment_count->approved);
            }else{
                echo esc_html__('Comments:','evox').' '.esc_html($templaza_comment_count->approved);
            }
        }

        public function templaza_wpkses_post_tags( $tags, $context ) {
            if ( 'post' === $context || 'html' === $context) {
                $tags['iframe'] = array(
                    'src'             => true,
                    'height'          => true,
                    'width'           => true,
                    'frameborder'     => true,
                    'allowfullscreen' => true,
                    'data-uk-responsive' => true,
                    'data-uk-video' => true,
                );
                $tags['form'] = array(
                    'action'         => true,
                    'class'          => true,
                    'id'             => true,
                    'accept'         => true,
                    'accept-charset' => true,
                    'enctype'        => true,
                    'method'         => true,
                    'name'           => true,
                    'target'         => true,
                );
                $tags['input'] = array(
                    'class' => true,
                    'id'    => true,
                    'name'  => true,
                    'value' => true,
                    'type'  => true,
                    'placeholder'  => true,
                );
            }

            return $tags;
        }

        function templaza_author_social () {
            $author_social = array('facebook','twitter','instagram','dribbble','linkedin','pinterest','youtube','vimeo','flickr','tumblr','whatsapp');
            foreach($author_social as $item){
                if(get_the_author_meta($item)){
                    ?>
                    <a class="uk-margin-right" href="<?php echo esc_url(get_the_author_meta($item));?>" target="_blank">
                        <i class="fab fa-<?php echo esc_attr($item);?>"></i>
                    </a>
                    <?php
                }
            }
        }        

        public function templaza_mime_types( $mimes ){
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }

        public function templaza_pagination() {
            the_posts_pagination( array(
                'type' => 'plain',
                'mid_size' => 2,
                'prev_text' => ent2ncr('<i class="fa fa-angle-double-left"></i>'),
                'next_text' => ent2ncr('<i class="fa fa-angle-double-right"></i>'),
                'screen_reader_text' => '',
            ) );
        }
        public function templaza_edit_post_link($link, $post_id, $text) {
            if ( is_admin() ) {
                return $link;
            }

            $edit_url = get_edit_post_link( $post_id );

            if ( ! $edit_url ) {
                return;
            }

            return '<span class="post-edit"><a href="' . esc_url( $edit_url ) . '">' . esc_html__('Edit','evox') . '</a></span>';
        }

        public function templaza_get_share_social () {
            $this->load_my_layout('template-parts.content-share',true,false);
        }

        public function templaza_breadcrumbs() {
            $this->load_my_layout('template-parts.breadcrumb_html');
        }

        public function templaza_get_gallery_post() {
            $this->load_my_layout('template-parts.content-gallery',true,false);
        }

        public function templaza_get_image_post() {
            $this->load_my_layout('template-parts.content-image',true,false);
        }

        public function templaza_get_video_post() {
            $this->load_my_layout('template-parts.content-video',true,false);
        }

        public function templaza_get_audio_post() {
            $this->load_my_layout('template-parts.content-audio',true,false);
        }

        public function templaza_get_title_post() {

            $this->load_my_layout('template-parts.content-title',true,false);
        }

        public function templaza_get_meta_post_header() {
            $this->load_my_layout('template-parts.content-meta-header',true,false);
        }
	    public function templaza_get_meta_post_footer() {
		    $this->load_my_layout('template-parts.content-meta-footer',true,false);
	    }

        public function templaza_get_link_post() {
            $this->load_my_layout('template-parts.content-link',true,false);
        }

        public function templaza_get_quote_post() {
            $this->load_my_layout('template-parts.content-quote',true,false);
        }

        public function templaza_get_excerpt_post() {
            $this->load_my_layout('template-parts.content-excerpt',true,false);
        }

        public function templaza_get_readmore_post() {
            $this->load_my_layout('template-parts.content-readmore',true,false);
        }

        public function templaza_single_get_title_post() {
            $this->load_my_layout('template-parts.content-single-title',true,false);
        }

        public function templaza_single_get_meta_post() {
            $this->load_my_layout('template-parts.content-single-meta',true,false);
        }

        public function templaza_single_get_tag_post() {
            $this->load_my_layout('template-parts.content-single-tag',true,false);
        }

        public function templaza_single_get_next_post() {
            $this->load_my_layout('template-parts.content-single-next-preview',true,false);
        }

        public function templaza_single_get_author_post() {
            $this->load_my_layout('template-parts.content-single-author',true,false);
        }

        public function templaza_single_get_related_post() {
            $this->load_my_layout('template-parts.content-single-related',true,false);
        }

        public  function templaza_search_no_result( ) {
            $this->load_my_layout('template-parts.content-search-no-result', true, false);
        }

        public  function templaza_archive_no_result( ) {
            $this->load_my_layout('template-parts.content-archive-no-result', true, false);
        }

        public  function templaza_all_taxonomy( $taxonomy,$empty) {
            $args   = get_defined_vars();
            $this->load_my_layout('template-parts.all-taxonomy', true, false,$args);
        }

        public  function templaza_post_taxonomy( $taxonomy) {
            $args   = get_defined_vars();
            $this->load_my_layout('template-parts.post-taxonomy', true, false,$args);
        }

        public  function templaza_cause_donate($postID) {
            $args   = get_defined_vars();
            ob_start();
            $this->load_my_layout('template-parts.cause-donate', true, false,$args);
            $donate_count = ob_get_contents();
            ob_end_clean();
            return $donate_count;
        }

        public  function templaza_cause_donate_archive($postID) {
            $args   = get_defined_vars();
            $this->load_my_layout('template-parts.cause-donate', true, false,$args);
        }

    }

    $evox_theme_functions = new Evox_Theme_Functions();

}