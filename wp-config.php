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
define('DB_NAME', 'blog');

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
define('AUTH_KEY',         'IQP64*:]q> +*HRNted5={^&2$& IBu8gP~bxGncxt[vDNhvV5[[-Ebl`mxPl7Bc');
define('SECURE_AUTH_KEY',  'uVZHrAQuqv#)G6>3ivx04TL&vS]K,Aq4GD+q,<`9Y;mb$]c2nr@iH1?6m<ONTTQ=');
define('LOGGED_IN_KEY',    '#yCzs^^]jB6Of|``nXbb$T+(FZ9+8f&<> )TMPj;JY0X[0_;|}2N]RDpnB!|~X|2');
define('NONCE_KEY',        'I+T^^A]zieZDp2A69s4(r6T]8Zz *ui|fU?[9:C[008C8Va-Ih4hp`/A&Rei>}5@');
define('AUTH_SALT',        'RT4lXx/bUs_!-xS:dR.RdaYBsQsOQBV~^@{..xu&]!XKAj#@2gZc4MkmRFnqKN]|');
define('SECURE_AUTH_SALT', 'vIZyP)W.Z[SJze]Ij?Q/g|,Z{g.q3CsZhk4_Qkm+]{ Iqgy )lAYB!IFTot9LNXn');
define('LOGGED_IN_SALT',   'PwL9E~<}[aDH,sD|8e&/;R^*DtMHK,tPz%bKBAe! ;4D/-;f?d;9uuv5h @xakO$');
define('NONCE_SALT',       '/}W>irJF8,H9|`!ttU4=j&_D)3(3W~@)jv^?i1}BY=:PjQB{2Pp:ebY#`Law# HK');

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
