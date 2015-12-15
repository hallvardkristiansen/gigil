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
define('DB_NAME', 'gigil');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'g1g1l');

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
define('AUTH_KEY',         'c;O_?r7yJp~)_GPi]I|xWcE0nI~185)(dp%@0q>XEXG%bPZ]5fA~33>t.z:e)VOz');
define('SECURE_AUTH_KEY',  'Za^79!PeIRzzBa>nk0FDb9_8+H6onahF(eJjfb@r=dVmz21QcE,Fum+0Bey,+-#B');
define('LOGGED_IN_KEY',    'z/l+65#.A-m^p&l!<$f.@4$N3:AXz=ivQ$FAsOn#A.$-z|%%T34Qj<| .K-gsF+g');
define('NONCE_KEY',        '&cc`b}+7zkT4PE+SOyA$bW+6r_]Q>SWFNm-DV$@ty.[[)-Dz(oMXV:,}=&/%sZD+');
define('AUTH_SALT',        '806MiLJ28D?{b0svE[KF1704~/n8CZIjn>]]f|n@j|U1gN[8-A)+zejUh3{m(R&U');
define('SECURE_AUTH_SALT', 'yuX;1P-_IAKpBU]iczf`1*y-./VbE1Dc++Uz)FqEd7}bZR.~-cduz=OwUvL,#[hf');
define('LOGGED_IN_SALT',   '.szO}a=ba7q|w:dan+1:a$-OPP-64H>~wP((|#1=t.I`y!,e.,-x9*vYVVUMy#&>');
define('NONCE_SALT',       'FOlc48pDHqWZ[CkRMy/{v`S6HLsg]L>jIy/=HERr<P#E/DxZ+82~|I/LE;=gMFey');

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
