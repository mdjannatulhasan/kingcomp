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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kingcomp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uJ vo98:,2(26z8?+JD#zW-fPH0qJ9^KMJn`[4*>RLPYM%usa8d?7m5C[@hcv^7l' );
define( 'SECURE_AUTH_KEY',  'Ec1oTmg7-`Mc#};p_mBU:7.2l6<.3^N7F+!@)-UI)L@r4m~E7_eva`2lp;KPxVX@' );
define( 'LOGGED_IN_KEY',    'E_P RkjqwP`Ns;);|;8XKfz33Rl0uw!SHE3o^wJ0Rw~7&rv#eUF&G1Azc%Fp54L[' );
define( 'NONCE_KEY',        'R|XQXi8K9Zlr+V33~zq:2C7BHdP<pR{vf}x|G bGfEb#p~Z&OGp)Nu)wCBtmEyJa' );
define( 'AUTH_SALT',        '1YJ@`Rd%0LwdCRF3,Zj&NXOFG/0.^rKl|%IW#S8]x*atfT#U3%pxYYCKA}c,(o];' );
define( 'SECURE_AUTH_SALT', '[[^Q7L^`2zNBv%:Sm^ayrBB[pV1v9q|!3FIu6VS}< ?}lTb6E?6q)F|_]N?-p.s^' );
define( 'LOGGED_IN_SALT',   'ZMsP_x=H]fA:*-!k>A,1`jnx7dC4MD2ywzVI%M?97M CYup.6pc<bd2(`.Ie<7X$' );
define( 'NONCE_SALT',       'wsi@F&pww3{Mq.^e_0{g;lQ2=p`WY8A.:(_rk`n4@r:o_E5!x2LYlc|njDx=))m8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
