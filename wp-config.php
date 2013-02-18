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
define('DB_NAME', 'sansink_rare');

/** MySQL database username */
define('DB_USER', 'sansink_rare');

/** MySQL database password */
define('DB_PASSWORD', 'zq2l;E&dg$FM');

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
define('AUTH_KEY',         '@!c}}^;-*$0+[jm{^EZ`7[|qgcBq?VS4z8lV$PL-XzUxw4cb!%r.W@6p3wpp/-%<');
define('SECURE_AUTH_KEY',  '$?Qw,&OM(8-kc=?GdgDQRX-Iftp|sXye-gT^f o5/Ht+(JCHychYqZ++xox+(UGG');
define('LOGGED_IN_KEY',    '_2Ho|<NRTsl_?{wjR-f@_e9Fr.Q-h!3Gs>tHd3-|rY*MzzK/2BfF<WZ[s`~9{8,c');
define('NONCE_KEY',        'cv*=j(iaU O]gyvc#]]f+[wU9s`&/rPq/ ?q$x0i|8.owtJJKEUjmS?8|!QT*6-h');
define('AUTH_SALT',        'fvspSNy$YFJ,`mE[B;=T9T|o9:r|l0FZ!Vh-FlLG|#~]Sa0y!u$L2<1mRC7DQ AK');
define('SECURE_AUTH_SALT', 'V(k(#oWlmct^c ;A*,yKC-fy{Y1(q]#Q@M*sA Xsnc(H/}`Q2ly-KvIv=:C0hD~%');
define('LOGGED_IN_SALT',   '?Gg}hN!NxD[u 6_3@N2lQt&;Sk0-B.2J)CAus0+vX911TvpUt]xs/-=#~?q;>a0-');
define('NONCE_SALT',       '|;+$Ih{`OsTwjh^-.wksx2OM(97wM-YY!S%-A2I5Z[K=a+|vx)@+Z<+f*rgJs5*a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rare_';

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
