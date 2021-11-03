<?php
 /*
 Template Name: Template Register
 */

get_header();
get_template_part('template_inc/inc', 'menu');
get_template_part('template_inc/inc','breadcrumb');
global $evox_options;
$evox_image_page  =  ((!isset($evox_options['evox_login_image'])) || empty($evox_options['evox_login_image'])) ? '' : $evox_options['evox_login_image'];

?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<div class="tz_page_login">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div id="login" class="login">
							<div class="text-center">
								<?php if($evox_image_page != ''):?>
									<img src="<?php echo esc_url($evox_image_page["url"]);?>" alt="" data-retina="true" >
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri()).'/images/logo.png' ?>" alt="" data-retina="true" >
								<?php endif;?>
							</div>
							<hr>

							<form name="registerform" class="login-form" action="<?php echo esc_url( wp_registration_url() )?>" method="post">
								<div class="form-group-description">
									<?php esc_html_e(  'Register For This Site', 'evox' );?>
								</div>

								<?php
								if ( isset( $_GET['email_exists'] ) && $_GET['email_exists'] == '1' ) {
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','evox') .'</label>';
									esc_html_e( 'This email is already registered, please choose another one.', 'evox' );
									echo '</div>';
								} elseif( isset( $_GET['username_exists'] ) && $_GET['username_exists'] == '1' ){
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','evox') .'</label>';
									esc_html_e('This username is already registered. Please choose another one.','evox');
									echo '</div>';
								} elseif( isset( $_GET['empty_username'] ) && $_GET['empty_username'] == '1' ){
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','evox') .'</label>';
									esc_html_e('Please enter a username.', 'evox');
									echo '</div>';
								} elseif( isset( $_GET['empty_email'] ) && $_GET['empty_email'] == '1' ){
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','evox') .'</label>';
									esc_html_e('Please type your email address.','evox');
									echo '</div>';
								}
								?>

								<div class="form-group">
									<label><?php esc_html_e(  'Username', 'evox' ); ?></label>
									<input type="text" name="user_login" class=" form-control" placeholder="<?php esc_html_e(  'Username', 'evox' ); ?>">
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Email', 'evox' ); ?></label>
									<input type="email" name="user_email" class=" form-control" placeholder="<?php esc_html_e(  'Email', 'evox' ); ?>">
								</div>

								<input type="hidden" name="redirect_to" value="<?php echo esc_url( add_query_arg( 'checkemail', 'registered', wp_login_url() ) ); ?>">
								<div id="pass-info" class="clearfix"></div>
<!--								--><?php //do_action('register_form');?>
								<button class="btn_full btn_create_account"><?php esc_html_e(  'Create an account', 'evox' ); ?></button>
								<br /><?php esc_html_e(  'Already a member?', 'evox' ); ?> <a href="<?php echo wp_login_url(); ?>"><?php esc_html_e(  'Login', 'evox' ); ?></a>
							</form>

						</div>
					</div>
				</div>
			</div><!--End Container -->
		</div><!--End Page Content -->
<?php
	endwhile;
endif;
?>

<?php
get_footer();
?>