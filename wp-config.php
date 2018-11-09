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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'main_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K9m]!.^[r;2Nc_ij6Gcpb;jV6(RO9T=K9Zj/=47jIQxj% w.[&K`5:(A8}6e&c,s');
define('SECURE_AUTH_KEY',  '4T69z=P=-wfkStKr6G+}@!5c-NbHd&s}5@*^3@e(];R#h|2CnhX$]bXRpN`tA.dq');
define('LOGGED_IN_KEY',    '8XD|2NsL.}~/v>;D<J7KLUXrx>!Af44P!t>%fI:s4*{E67TVUyHD`P%V] &AMd-B');
define('NONCE_KEY',        '%mXZM}45[+AwAp/B>}9!`5SATQAH,>Fmb|EkYFR+KGXe5]H;#cue:6H<_E)e]v[q');
define('AUTH_SALT',        '*dP&..O5cH0XK%#Q/n$fli,Mt|0$Ty5eqBmm)L>>Y0WA:j1,V]HlcS/J;;^Q7Yz*');
define('SECURE_AUTH_SALT', '^?~rNBAlex!9$TM#0ZR#b;9VjCoV0,_2Gzxud/=!1r!M)$E H6hHLbV4aBK#OR66');
define('LOGGED_IN_SALT',   'yrB.yn>bmGl8{8WJX:aWG4L/y=g>YJ ?-fCqcNI3_T:#42*;$( J@m2:7j.[y_S.');
define('NONCE_SALT',       '5D!2 fP1aWr.(B3)}&Hf7@<;EXX(3{>Urp :Re0]zfK>[eu&b~7wEu_sxXKl#_6_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
