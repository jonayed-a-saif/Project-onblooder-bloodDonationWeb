<?php
define( 'WP_CACHE', true );


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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'onbloode_wp997' );

/** Database username */
define( 'DB_USER', 'onbloode_wp997' );

/** Database password */
define( 'DB_PASSWORD', 'x!(p4MO70S' );

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
define( 'AUTH_KEY',         'lgt89feyljyru9fvixhaeh33khvdan3mjdetiu2wvy2gua0shhhnhztnd7oqoztz' );
define( 'SECURE_AUTH_KEY',  'stvj76maew60uvmajj38sr9irwclampwzdubpgawzqtgyruiurmxxl37bf9zy3jn' );
define( 'LOGGED_IN_KEY',    'la1zzp1mjqdtgor1djlm2v6btofjrkveif3n5xnusr9ae79y8piz5fkt2a1p5jbh' );
define( 'NONCE_KEY',        'ume7zn5ic7z66tmhixxwwmlksgo1mjibvvtuuwty0r17uebdurucd9n3fbiozbqk' );
define( 'AUTH_SALT',        'bcrcqiv0mdxlobgikw5g7sauwarz273tlituhxe00vvvxcc8sstcikkmmpcn9tr0' );
define( 'SECURE_AUTH_SALT', 'kz6qyr2cnbzavsc8l6xpnupmsmd4n9bbqoi52bazhqgm7k6ajoruixvnob2c4zzr' );
define( 'LOGGED_IN_SALT',   'ud4yz2alhedo17qsdiqh3khniammtagew7iiqyvcqoenv4rl679ujpxmqvr16qmm' );
define( 'NONCE_SALT',       'ps6e9erxqdyjjvi1edl522ilpkf270eybpvypdp6oxj7gf5wgxurhknmkc4w6dsu' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpxp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
