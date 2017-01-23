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
define('DB_NAME', 'libar');

/** MySQL database username */
define('DB_USER', 'hrvojeA');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         'U;BXQ0eVD*9JXX{_>H g$l/LC+M9x]=Fic3@ 4Z<?{QUKOvHeCZu[/,x(:sth~e*');
define('SECURE_AUTH_KEY',  'QtAq,_JJkOiAl-C74KXw)3c($BKpQ7y-f)7AgP]qLQDC^.>jiGK^hGKD,byHt:Th');
define('LOGGED_IN_KEY',    '#O/CE4QBw! a]<QGoIF+~`)0kW Xv~<0VK/,Y(MT/x*3#$ FDqfZA9kiW6VR:6Sd');
define('NONCE_KEY',        '<,H]$ecL9V$CP.i>wy#F2U~R6T[uEE<}+LH>CJkul*BxQMC0xo)OT$bh,/1$P]+v');
define('AUTH_SALT',        '&5~Rfn_rg3dftB5h+*eS3CLUr1((keUmO^R,X$dlOH1a~!&A+Ym53}AkYE8VHCoK');
define('SECURE_AUTH_SALT', 'f?hTA-{H}WQ;Q~M,0V<WM:S^%6V+v6<,JrRz}rSFxL_p.DzCFlRTZ,N-R_6.sEgr');
define('LOGGED_IN_SALT',   'JTKBq*#1)0bT_W~t!c*#]sb%U71D+bB7/V4vj?*iHxvD_Xu2raJ2#B2{z)Q+g~f-');
define('NONCE_SALT',       '?STf93ppSPsCplUp-4GjUytW]bx3fsfNhbHNp:;zkxnLW(a>k5.`Wi->o9 >3m/z');

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
