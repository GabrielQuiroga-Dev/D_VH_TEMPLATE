<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testwp2' );

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
define( 'AUTH_KEY',         'Df>t/aQ,:Zk2yJA!]$)5QXSZ)t[I6.-gGbeA#-aF |~L(8;lXhV%OR:i.j)Qm@4s' );
define( 'SECURE_AUTH_KEY',  'nXE)wHMH[|h`iwJnLb7)wv2x]fj@4]dZ3/obsqB-ljtM0?4h=<kNZ. -#cQ6w%p)' );
define( 'LOGGED_IN_KEY',    '`ZQ$6!pO)5aWr^vTQ0mZv@.Bz3:r7`C2Ju|Z2q~jZ7.ulyf:eOQl<9a* rex{4sV' );
define( 'NONCE_KEY',        '} mC>(,q?_S>Z|z%DwuU6>{i5I!39n%6Rq{P74#4CQlp!*>:6t3gEwWT:h0E8uP)' );
define( 'AUTH_SALT',        '+Mo?+eb3p%MNl;h9Gw61q04.,I}=S-tA_y:hGKg^,KC <8GXW*:*{1dt=x LYN2D' );
define( 'SECURE_AUTH_SALT', 'Jn-@U8prom~MFp>,>DkU`;)yoTr@cES[_|DD?3J3U0V JC705P[(1>ZL~PIkhz];' );
define( 'LOGGED_IN_SALT',   'Q|*!|[AB^QXVW)Z;D,idnO4[a0brE<@5%R]rBtm3Jo ]=&asD;&]IwZ0(B_~ X2J' );
define( 'NONCE_SALT',       '}:t,t7$IjHo#sBMLvibK_;:t`G?biX)IR>9|`NlNm]NYH/BTmgaB`QMsk~|fp5Oj' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
