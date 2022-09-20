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
define( 'DB_NAME', 'listra' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

/** Database hostname */
define( 'DB_HOST', 'database' );

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
define( 'AUTH_KEY',         'UT~YO;+LEJ*KZ:BVG6|bkWt0;G>VyiH{GIoa[ym.x5W`ha,jncMxaIWc`~OiVwK3' );
define( 'SECURE_AUTH_KEY',  'kg_;D;K)oI~]6{~.7q8;qUPHbuc4`5DNXiL#z*df?P00J5tU~r@jp%r40ZSc4V.[' );
define( 'LOGGED_IN_KEY',    '+2Yx3G^1*L^)&.t,teWEImEDczCfa@=R||yK:Y@pQI3RxODanoxk5[DZb@i)u5xR' );
define( 'NONCE_KEY',        'Un5g5p`LBksPOXt mqnw]/c@M]$Yxk`R5 Kn}odu3e`XemCJ1Z+)P)Vd]g<~E `r' );
define( 'AUTH_SALT',        '=0iT9xz/Dz~STfPqhHQU0Ju**YSz,k]Claz&Ao,G{BF3B57a^MH ~e7%3FZdT+]s' );
define( 'SECURE_AUTH_SALT', '1vfA-K`JBeCHPqL7LYOD3RIU3,A*z?N. <:NV6t@L52}]6nMN^i8kFS*W|cDPH&[' );
define( 'LOGGED_IN_SALT',   '7<pe8$O`uk_]nUc;3t K!R4uX2VQCfP0c<ytjp5FJ,:}}xx cmx5T?ed:5}2ymI|' );
define( 'NONCE_SALT',       '7MGN0Qci8Iq<(=),X3BG6zMw:tleO90[Ob2tHK)}D,ioMY.P$pqYL57b^IqCyH2H' );

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
