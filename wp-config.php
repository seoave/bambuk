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
define( 'DB_NAME', 'bambuk' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'frBjdXdIRn642U3xTzfDqgz4Tqnju6yqkwBs83L8wgPxWfOP8fQoULXD0vpSk24x' );
define( 'SECURE_AUTH_KEY',  'zj7XSqDt2iaW0UVTimRCfPzS7BfLDOqALbAdTYV8aXRVnV1AAlHhxRqwb6AheBr3' );
define( 'LOGGED_IN_KEY',    'zScTyqD0DFkRzIu1d6WUBEFaFqjpevCv5YwPJv9UN5GADXq9GW5q3k2SLlzMgXYf' );
define( 'NONCE_KEY',        'jluwNWRRyMV6tME7Wzi5trUYdv7XI5POhpmN3zZBtL1YTlSzhV1Xpu0JeYqfMEMx' );
define( 'AUTH_SALT',        '5PM94t6zsUvjoQPcE4Fele0NMBUvcD39uRcMmEQi0rkmaJk1SUWvNEgAHBgHimAP' );
define( 'SECURE_AUTH_SALT', '8M9oTOTbQVDTeS6Urc1IxTGkPUIgL2fYqFRpfbr6RlkSa1FwUxIjo6ACn9GhZzSM' );
define( 'LOGGED_IN_SALT',   'qbzijZiGIRhP1Tseh1jx3pvyoszepetl5QmGGaLWAt2xWaT7nNkpbM6RgyGYRiDn' );
define( 'NONCE_SALT',       'UKIxJoUeR5ULDZ1FmQpchjh4MHk7ks3lNsSx6Q4pknk4M9vixkbSxi4Rn9NBaCk8' );

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
