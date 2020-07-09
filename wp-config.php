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
define( 'DB_NAME', 'wp-blog' );

/** MySQL database username */
define( 'DB_USER', 'toogreen' );

/** MySQL database password */
define( 'DB_PASSWORD', 'toosad' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Px?2$,Xgpa&@] ]%m4Q.R.IHR vU F4^*s*||y~_fW26=*Njb>5ljtc7~N.>h`h,' );
define( 'SECURE_AUTH_KEY',  '&fTNiE2)qW0|]U>bZ MLjzJ$Om!.vr;y+QB@mZS@?[$Wgm./Mu4F(N3YG$]JjL_q' );
define( 'LOGGED_IN_KEY',    'I~6xv87gw!sGipF3_x@DuYJG/r5!XUb7/:s E;P}1(2/,(iBcQP>I&*k`~Sxo!xB' );
define( 'NONCE_KEY',        'E2T5WrWae~mgv3xig*L:)N-1WHr.fGeya)c!1FWIdb/? VRQ_/1`T+L|_*!o]mGY' );
define( 'AUTH_SALT',        'wZMnp|mF^ fGC:r!WNh~|Gj<tW6|oJS`Ky440H^{73E>U%6kxq>,-n^-|E+rte0C' );
define( 'SECURE_AUTH_SALT', '&Z5ozjXXt<8FGslGewKT| SN%(+].OGR5on8`=?v$tn61CWG?zY]=/6}2lz]u[5f' );
define( 'LOGGED_IN_SALT',   'm*X4E=]*%fc&jTDV+5gw^|5:mdx>KEd=g:V<d36T7eEvFXEX$uB#&E#jq_:[8S7v' );
define( 'NONCE_SALT',       'Tm;?(|5F}<#|c5%DjHeR3}z@bwvJg~@/f7|r?g-9wdF8;oSdQ5230bcc,zjO@tiv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_blog';

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
