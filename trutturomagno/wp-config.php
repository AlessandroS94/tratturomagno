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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tratturomagno' );

/** Database username */
define( 'DB_USER', 'diemme' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:8889' );

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
define( 'AUTH_KEY',         'sD|,%H<` ]i}R>!MSndGPZ}O| -;usx^1nT6*sRV_+s+|8;PU]k3`l%XM$utQQT.' );
define( 'SECURE_AUTH_KEY',  'P00z/ZuDEE=-^&$[-k?|Sv_u~DCxtt?<PKR>Wt|!s,HLh( r$w^~)S0wz<@{|RP?' );
define( 'LOGGED_IN_KEY',    '(-?,0VI!VEDBc{Q51qdN Z[J=rdM-]S`VSb-HMi0CY;a5(sEp%+4?a$Nz))t!&a/' );
define( 'NONCE_KEY',        '|p@]8=jew,Eyp[]1[M.>6V6}6Qh+wxgnDx$P9.t/q[v>uSdal=fK:`L_#qOG(1O~' );
define( 'AUTH_SALT',        ']p@q&eC.8<8R`HpIV&KL*yz#qI!Z]bY!]{?nf*W35b ,N] Fv<W#?4)ojNh[,Gic' );
define( 'SECURE_AUTH_SALT', '^Q}^K{8kUE8#)<egL+Mtk4_*j{+oNmTu9g3)Xf gBOs<PH~y&k!IgW<F*dM!po2*' );
define( 'LOGGED_IN_SALT',   'Y);KN#w:zYiTq-X<e9d vqAmaC^lr,W>f5&;<@ghmQd)]BBj&YSP!-~s,[AuQHQH' );
define( 'NONCE_SALT',       '^Z[Tw5HG(lY7kRe:}WjR.l6ciy~5P ]sutqRczZ1O~m[icVmZUxEBPW[s1Pp]~YM' );

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
