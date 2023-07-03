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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'baza' );

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
define( 'AUTH_KEY',         'Cp23Zn?C)VH>Vm5;)=/DT{s,mwVWQVpP@/5]u[M}7^8-},)xNLf-O~8;:Dm!(Ik@' );
define( 'SECURE_AUTH_KEY',  'aQ5Hu6axwqLDyK&sUpy7{XY>.wqBAaYUuY!c|=o[59`lYgeL#I(/4}R};yS-J.Wg' );
define( 'LOGGED_IN_KEY',    '@Kd1oU3E_sW>ChK[gOJrA+,HT/svmCf46pqD32~,<P[zeVAEt3d2. 9-*<K2vElJ' );
define( 'NONCE_KEY',        'rC*iCv~,Q<Roq:|1a-?*?=S=f%nzu0h$nE?wozzbeK]]8L=E5PCG]?8,F9({,_l%' );
define( 'AUTH_SALT',        'D^)e[h~!ZYirz0Q{&5t~wBz!=Jh@ Y(,@u-y`>HRH(hAK>~ $?b)7[=UsTST;i&a' );
define( 'SECURE_AUTH_SALT', '+z:E}3^ *fCC]+`A3vZjA=>S.;%byu*5Dj;iQfs)*tJ(R&JcvJz2Q5s;|1Q!tA|}' );
define( 'LOGGED_IN_SALT',   '^Co`o)N^6*FLxouHHa*%%08x**0oTkq&ap/NJ#%]cG|@l737ZqIExI]YbOgCYs)l' );
define( 'NONCE_SALT',       'V=}IbT^<d)!wi/Tq?T5J}3uf`uk!0>B6Xp1*A38>a}|C:Nrwy%30:CFeomS!w2]}' );

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
