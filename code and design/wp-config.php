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
define( 'DB_NAME', 'code and design' );

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
define( 'AUTH_KEY',         '*7Tk4h*ZlB8ybrX;S._M/r%_DSImb-Ap*(zl,G&Qw_KWy*~{d~NWBd{Di&_FzWXj' );
define( 'SECURE_AUTH_KEY',  'Zj5HZ+C `*Y/Lgti}{=,`w(X<sN+#D90O&kA^.xq%DCX^8}uyPK :&Z[^%+g8%Aq' );
define( 'LOGGED_IN_KEY',    'VJkzJHKE5-9;_l(iA3#sx,J`c)-Lysxc]#&,A~F3X]$ 7-g}NhDUSgYB!G[`Yc6c' );
define( 'NONCE_KEY',        '9jjY. !T4H2+,|@%GzoC$Q:FHp;F.(FG68vJ(lzT)HmhzdFFLj^Q|-K@$U.McC;P' );
define( 'AUTH_SALT',        'tR?B,_6`E^vt]u7 GF,oaJDw10]h;XNRav>T86#T&vjDr%N(C:!M{q44.,LQ5:l9' );
define( 'SECURE_AUTH_SALT', 'Ld+dL.9(b,p>L0Pl(g~FjOY@2+fotSU~e*Vy<*{EpcA;uUp/pC5PmJ3bU7hh.;:(' );
define( 'LOGGED_IN_SALT',   'X<#-+{YDuWUNeX<tf#*J&(Jws_-;/TEI;O6#UTti]88t+M8Wh(nbJv1r+P* e{7`' );
define( 'NONCE_SALT',       'jxXVRjZgr(8.B3kwrMpc86fYv#;qu!nB?,J=Oh] U];.j(X0q{&ph&6bV[2Q2>v5' );

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
