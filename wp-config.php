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
define( 'DB_NAME', 'rsc' );

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
define( 'AUTH_KEY',         'Q5+p$|a]$evgtGV%O1tPC6iDrZYQ4.gC_9!TI}d*auW/X<X;P.4$K6XR4m<=:X-P' );
define( 'SECURE_AUTH_KEY',  'FSwP|:n);!t[9e8]VJC;6|zfD!sjgT@{LDK8^oZXL?YLujYQbZNZMr3.~H![/4Qa' );
define( 'LOGGED_IN_KEY',    'JgpNhl:}Yld-&P~Zx45]~|%OK$X_8y,$lR3HgO3-Gwb,jWHZJ3z{24co)rX1luls' );
define( 'NONCE_KEY',        '[Lq+fcIeZbPMo9O^tA-hH)B=dg0I>{x&R(7:Hf[9K?1)9xTD-:P23fK+Q<cvF/m]' );
define( 'AUTH_SALT',        ' Z~)`~j=?@L/SKNyR5R3Gg*{y|,=tfe`&[5^mTYY7@4)O:k#A|goq{J~V k[.|!w' );
define( 'SECURE_AUTH_SALT', 'x5jgnLeP1f4QtMMpOO!bI}<gYpL_~G>hQG[1+yw! u7ox3t3*^:0F/DY02LTviC ' );
define( 'LOGGED_IN_SALT',   '}B@@6vIKgSx:!|ElcD-Hv4G7L;5 .g(-L?Mr D#I|nRk%03}>GDeQ:TDN]ou*SEZ' );
define( 'NONCE_SALT',       'E7O5V0ycf?69yj|&*^?IsU3|=iTVF*R_Kc/FOF`!HK(N(kB7nI`Uy+A=xq4@z8aA' );

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
