<?php
if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' ) ) {
    ?>
    <footer id="colophon" class="site-footer" >
        <div class="footer-bottom uk-text-center">
            <div class="uk-container uk-container-large">
                <?php
                printf(
                /* translators: %s: WordPress. */
                    esc_html__( '© Evox - WordPress Theme 2021. Design by %s.', 'evox' ),
                    '<a href="' . esc_url( 'https://evox.com/' ) . '">'.esc_html('Evox').'</a>'
                );
                ?>
            </div>
        </div>
    </footer><!-- #colophon -->
<?php
}
wp_footer(); ?>
</body>
</html>
