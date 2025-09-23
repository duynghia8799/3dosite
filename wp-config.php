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
define( 'DB_NAME', '3dosite' );

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
define( 'AUTH_KEY',         '`fl?iNa+h(&(/^TN5n,WnNfl:;MdIry^@}TMC(mA*0lS:e3g*A3!~7$]qe{Z%A`u' );
define( 'SECURE_AUTH_KEY',  '<U%9%r~gH.=G(48Unn>A`CQR8hK!w40f)m7?2(h./;N;MC*AtQ}+#{_%8|VG<YKQ' );
define( 'LOGGED_IN_KEY',    'KBg|@Z+,y4ite_8i.#aymp^5&&^yxHrP_?oE}jZA~wR}DpJNo7/aK{aBW^h3*!&!' );
define( 'NONCE_KEY',        '_]IY4nm5Ami:]J6l#~WbBkjQwd*|~[7#/3AV%HFdx=f9(ehuy-_#;fT- 863*nI:' );
define( 'AUTH_SALT',        '2l(_^f#6.e|6p~+f65`<<tB6x6Y!gyyk#%%nN{+tGk`_vL9/9pkGlLG;=17`iI#!' );
define( 'SECURE_AUTH_SALT', 'GFYr%TwTi>X]x2,Z$QEqyDNa)7QCSV~3n4y7ePZ{nC3zcLMp8o!>LDH;=2]%{{4M' );
define( 'LOGGED_IN_SALT',   'uGNd58uUw;{t2Mj23rcJfWN Ni=*B;wXr|$m)hLT+,uBmscCfM6fW{I-4BDyBz35' );
define( 'NONCE_SALT',       '7svXUf]S7^He_;a2L#BV^#5 6 $/t$MH0w!AHw9%FoiqUM=Mo;@$xd6=<>FTZprQ' );

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
$table_prefix = 'wp_3do_';

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
