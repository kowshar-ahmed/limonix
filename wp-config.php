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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Limonix' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'Zh/e8U&Lr^msY?_23yO=V8?0o|3mo]fKW;hn3Kx/$EvaRPRb*RaBZ;c?,;cqdE9>' );
define( 'SECURE_AUTH_KEY',  '$jE:w[eLTb:x*[9.MWPWD-&LMe3|8,t}ON4Rtk5.n-&f_=3jrc1O8Y>8QTvbNX];' );
define( 'LOGGED_IN_KEY',    'bhQ?hz8C04K/%PpbN}jvY:S[*<$>BYIsG9D~u>`>T]YsbJ_=:aaVVDj<hLEi<W,f' );
define( 'NONCE_KEY',        'Nc7ed^xbaWvF#6 >#wd0[gurI>*zxh YvvDk@^jdk:>kK=W09@s3SSE3$Vo4Ej`c' );
define( 'AUTH_SALT',        ':YKy<:}A%0gk%-je0[eY3^s)Bx^w`Tey{|Cih*R*c_<EoDdK5g=yGo2q&Pl14NmO' );
define( 'SECURE_AUTH_SALT', '(tlt:V^]b3v=Pv &qP/0}MkLR%Il31kN:V|(+3Ko=Xzp|!8SSB>P<*1*ubbh3q[Z' );
define( 'LOGGED_IN_SALT',   'WMXxEC37AwQb7_Pers#C2t6H^])}q?n$B6Vp&vAJ:2/%bji$*3 uD^Ne%<A:A$?S' );
define( 'NONCE_SALT',       '@4l*[GZqEcIQB_;*se!E4FPv^Y+N4pE{`NovLr+P}x~70xIz9zOvS#/PC`uawy9I' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
