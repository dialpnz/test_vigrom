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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/storage/ssd1/670/8615670/public_html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'id8615670_wp_f58ddb7bdc33725c6d60f4b7800d9611' );

/** MySQL database username */
define( 'DB_USER', 'id8615670_wp_f58ddb7bdc33725c6d60f4b7800d9611' );

/** MySQL database password */
define( 'DB_PASSWORD', '5c7ac71149e6fa0c2124e4545945a98c888af387' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '2:AKyFlt[)02WQ#ioG*gnp;o!~j_QY2XXvV*2F#Ib*%g:Rns)`.uGsPFR&9j)M($' );
define( 'SECURE_AUTH_KEY',   'hb3R@(h:O4-ddWy5(PDi^P8OnpeK(:qOgk70[n 5gPh=@)+_}=]fdUS;50+ti2/!' );
define( 'LOGGED_IN_KEY',     'qk0x]#q:/?/&&LgzWl*(?X$VvC8H%`=Yd+jzq9ejRlt[AY5Go0hl?}{)yMxmQZi[' );
define( 'NONCE_KEY',         'JQ8i>%yP&d3Qn!W0<nKabgTCI(8Uz3vB>F|i##ta{aNjs?Pb+W%T%kXn0LjhEl[T' );
define( 'AUTH_SALT',         'C{}K&4BXUfZ6~EefTXZ1] <f`Oa}$jai~- uh0T}VO1rsW4QgONt;}P;4*c CTB?' );
define( 'SECURE_AUTH_SALT',  '0E4+-2[upUIQPd?1 Nx32L-f3+i[GBU3>VV0M#fyjA[pj*Qk2IV.}GPr==Gy1v6,' );
define( 'LOGGED_IN_SALT',    '`ec=WAm3=w@MdRO@nrE-6-N2TE8sQ-K)@-u;VN6,ygvXMVGYpd6]i/&Zt*EJ{e%L' );
define( 'NONCE_SALT',        'kPs$R5I~JZVP<Z])G/A^WIV0i/LylE!rYMHrRG~;EF*ie^,mtVL${b]=5i 47K24' );
define( 'WP_CACHE_KEY_SALT', 'g_RB_,fQGe[S3 Yg<)P;^~`dhz@D9 pnO##hz2%+g/{@Ri~@e>F^u,Qn,/a(g>8=' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
