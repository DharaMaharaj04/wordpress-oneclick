<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

 //require_once __DIR__ . '/vendor/autoload.php';
 //$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 //$dotenv->load();


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

//define('DB_NAME', getenv('DB_NAME'));

/** Database username */
define( 'DB_USER', 'root' );
//define('DB_USER', getenv('DB_USER'));

/** Database password */
define( 'DB_PASSWORD', '' );
//define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** Database hostname */
define( 'DB_HOST', 'localhost' );
//define('DB_HOST', getenv('DB_HOST'));

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
define( 'AUTH_KEY',         'mv!IX@|L$k;_a/2:Ka1NWO$I0+CE1apMJ.s0/CPR0;L0H_eN<(FQHSyuN ,IVJsf' );
define( 'SECURE_AUTH_KEY',  'j{z26yu~k1s R-J3po@K{0~P9#Dh:5Yrk]@.DT5 =-O5yNrxZ)S<_3R8lP)*HplC' );
define( 'LOGGED_IN_KEY',    'Q_{5PEhxv[7h[R0ITD7A&dO]_ihD2s:P ~y=_C>tx6PK6B5!ek^kgZEM$K[,~<-m' );
define( 'NONCE_KEY',        'Hp}K$518vUPX@$Ul iT2G(~iyn}GuevPMeVrF*H4ldU;Cg>P*1dw$BBsI.Wi]}n ' );
define( 'AUTH_SALT',        'u~*j<K3~MqeFB;0U$HW2 `VRJc>3`1YGUDP8#L<j~%n~90Xs2`nGqYW}m5GCk>Jr' );
define( 'SECURE_AUTH_SALT', '3F:@8Aqn{*z2ToaSzxl9sDd;RHLRa_m;9:7]reD(2(:R>Pi|(DYg]*r)(t&co[>P' );
define( 'LOGGED_IN_SALT',   'EzAMd^n(9.`EXS~wy(lOuCh3=8,6l:*Tnr[MVmlrK,vGd/d{{)e}p:g7VZgOC(fT' );
define( 'NONCE_SALT',       'PU(wf>@Gdy%36SQA@$=1%*x,v(^s&y z8t#vi.MN-FVi@g )I_nZ~1>O]e)A _ 5' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */

 define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
