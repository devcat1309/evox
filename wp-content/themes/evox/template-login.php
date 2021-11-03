<?php
 /*
 Template Name: Template Login
 */

get_header();
get_template_part('template_inc/inc', 'menu');
get_template_part('template_inc/inc','breadcrumb');

global $evox_options;
$evox_register_page = ((!isset($evox_options['evox_register_page'])) || empty($evox_options['evox_register_page'])) ? '' : $evox_options['evox_register_page'];
$evox_image_page  =  ((!isset($evox_options['evox_login_image'])) || empty($evox_options['evox_login_image'])) ? '' : $evox_options['evox_login_image'];


$evox_register_url = add_query_arg( 'action', 'register', evox_get_permalink_clang( $evox_register_page ) );
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

							<form name="loginform" class="login-form" action="<?php echo esc_url( wp_login_url() )?>" method="post">
								<?php if ( ! empty( $_GET['login'] ) && ( $_GET['login'] == 'failed' ) ) { ?>
									<div class="alert alert-info"><span class="message"><?php esc_html_e(  'Invalid username or password','evox' ); ?></span></div>
								<?php } ?>
								<div class="form-group-description">
									<?php if ( isset( $_GET['checkemail'] ) ) {
										esc_html_e( 'Check your e-mail for the confirmation link.', 'evox' );
									} else {
										esc_html_e( 'Please login to your account.', 'evox' );
									} ?>
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Username', 'evox' ); ?></label>
									<input type="text" name="log" class="form-control" placeholder="<?php esc_html_e(  'Username', 'evox' ); ?>" value="<?php echo empty($_GET['user']) ? '' : esc_attr( $_GET['user'] ) ?>">
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Password', 'evox' ); ?></label>
									<input type="password" name="pwd" class="form-control" placeholder="<?php esc_html_e(  'Password', 'evox' ); ?>">
								</div>
								<div class="form-group">
									<input type="checkbox" name="rememberme" tabindex="3" value="forever" id="rememberme" class="pull-left"> <label for="rememberme" class="pl-8"><?php esc_html_e(  'Remember my details', 'evox' ); ?></label>
									<div class="small pull-right"><a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e(  'Forgot password?', 'evox' ); ?></a></div>
								</div>
								<button type="submit" class="btn_full btn_sign_in"><?php esc_html_e( 'Sign in', 'evox')?></button>
								<input type="hidden" name="redirect_to" value="<?php echo esc_url( evox_start_page_url() ) ?>">
								<?php if ( get_option('users_can_register') ) { ?>
									<br><?php esc_html_e(  "Don't have an account?", 'evox' ) ?>
									<a href="<?php echo esc_url($evox_register_url); ?>" class=""><?php esc_html_e(  "Register", 'evox' ) ?></a>
								<?php } ?>
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