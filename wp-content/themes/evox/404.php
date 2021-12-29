<?php
get_header();
?>
    <div class="templaza-basic-single-heading  uk-text-center home-heading">
        <?php
        if(is_search()){
            ?>
            <div class="uk-container">
                <div class="templaza-heading">
                    <h1 class="page-title uk-heading-small"><?php echo esc_html__('Search Results','evox');?></h1>
                    <?php
                    do_action('templaza_breadcrumb');
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
	<div class="uk-padding-small uk-container uk-container-large uk-margin-xlarge uk-text-center">
		<h1 class="templaza-404-tagline uk-heading-xlarge">
            <?php echo esc_html__( '404', 'evox' ); ?>
        </h1>

		<h2 class="templaza-404-title uk-heading-small uk-margin-remove-top"><?php echo esc_html__( 'Page not found', 'evox' ); ?></h2>

		<p class="templaza-404-text uk-margin-medium-bottom"><?php echo esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'evox' ); ?></p>

		<div class="templaza-404-button uk-flex uk-flex-center">
			<a class="templaza-btn uk-flex" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back to home', 'evox' ); ?></a>
		</div>
	</div>
<?php
get_footer();