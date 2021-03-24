<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'newtek' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' ); 

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9s/#PvsJa}cp@io1AWZQWILf)9Y+ZCig>FQb3O?< Us/9[$FY#HoWz4&647premX');
define('SECURE_AUTH_KEY',  'ls/|nngk.EO9{/VOk>b4gXujK!OnOy97^]=SJ#Ac-jRp>23:6G,Sbc14 26wm%[h');
define('LOGGED_IN_KEY',    'r{tR_KxzHmhTRrJV`:LrcKCQ7X}[]:b]K~-%U7G:H05(J((zje<kejsqQa<iZdiw');
define('NONCE_KEY',        '#+A&||Gu.5%P.)xyH1OU@rq!_6+]ADuc|Y=Y}Y/uj6MxOT+;Hq!w237R; CW#>In');
define('AUTH_SALT',        '%;EvOy$Ddt.t&y]-Y]%F_(i7QzQ~1R #ufS!h2~3]l|/UbRzk%WL*_R^_:%NA)@0');
define('SECURE_AUTH_SALT', '}/$:,~dM~Yz6hgqD&j=|P[rk^)roL93$3B=[O9+]]vK+PcRaJ3r{Tqi20@giXg/d');
define('LOGGED_IN_SALT',   'NqOWe8G6ZzYe!Beq=|nq,`{ ^!}x6LAMTN8VG p]>@Y=Q}5OyR=,xxo{Gw?+H2Qw');
define('NONCE_SALT',       'B7GKSet-7^NZDl3q]S0-+3ywaHkyg6+$Z93lgSM~Dyu;gcB^k!&~Ug*MSnJQ9,bK');

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

//password_Admin_136#pass@word