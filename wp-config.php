<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'evox' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{,-1/TVRN-?Qy|fUtD]gu#ninSn3J8O0e@Nn1!>j1C0gDcC0;I:>7g`TcKro:]/k' );
define( 'SECURE_AUTH_KEY',  'L4~)o[05-I,BY%=]QC3euUJ$f3NOIFiFZVwOP->lE.{A9O#s?[k.H=[wG&a`M$hD' );
define( 'LOGGED_IN_KEY',    'e5EF>NQsVN7F/%b_PC_1{|K9CBawBu[~)@op:l4:2dBO}j![p{|)>qA.g-}yd(bH' );
define( 'NONCE_KEY',        'e;T8h:o3*=^uY0^[mSSUavv85bleM._Yx@-fwB-!F~{s{JQ&VpX]VZ3U+oB7UMp.' );
define( 'AUTH_SALT',        'KZ;+kyb$/(j*Xryvx4dRG~D~TSF;FpG;xXkn9b}5)G!dS9IDTv| hC2low.f/o<c' );
define( 'SECURE_AUTH_SALT', '$/2q/+gm5q652;F{v*Bc/~3<v<ubed{^22609lW|T:/!2gyB3[JWK50E16M 89aw' );
define( 'LOGGED_IN_SALT',   'RWkX=r;8(`|fC//(s%nAdd9-t<qzjq}~V_C^EE/1A6BDF^;E<-VdflB~syX$]n|^' );
define( 'NONCE_SALT',       'zlr<e|_o(JEUAHH{+]D$&Ds[=qdkT?@@!4+20XpUXL$y?L4L_D*e(iyDOX$-<mcm' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
