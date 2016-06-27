<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/html/justpujasamagri.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'breezeof_wp219');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'fw4bsibqvzriqktiyio0ybq4064krvuuolb8trtyvxrw7ul0djzl9jisxojyezm4');
define('SECURE_AUTH_KEY',  '31mlqxydgxqmskz0cenxzk8yrgrtyllaknmihk7zzhbqqcacesfbebyb0kai5bxh');
define('LOGGED_IN_KEY',    'mkkef3hmvj3mfylnuxgesnyiy3hiwm1nypsqldgzpytwn9rvbwa9lzpccofpkfvz');
define('NONCE_KEY',        'g5chmetucuo23in8wzrurrlu3rmtttgmqn5unfst1xx9b4mz3c3l49yszbe2jqt3');
define('AUTH_SALT',        'ijp1ultv6dyhgrnfymfdzoqp32wkhavfkjduhq3ksdabxxuv5cfzqsonextp5vhs');
define('SECURE_AUTH_SALT', 'pa0y8faz6sn1d5el7xlcxlmc83ajazuzl0lf10deadmruoldujvtup5r46j5mrbw');
define('LOGGED_IN_SALT',   'scsutsapw1kaevd0yzcb26gyujk2lvgohixawcv5qihfxftyjusp8gbleokuaybr');
define('NONCE_SALT',       'wyfsbmm8rrcacswjumcugfkga4xlqjmxjyreacn8wpk4e7rokvagzidstsb1b2sp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

