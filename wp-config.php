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
define( 'DB_NAME', 'clqo1axw700269ns31map9hqu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'clqu9mvms00309ns34z8l0spy' );

/** Database hostname */
define( 'DB_HOST', '172.17.0.6' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
# update wp-config file
define('WP_HOME','https://empirewp.galico.io');
define('WP_SITEURL','https://empirewp.galico.io');

#also add
define('FORCE_SSL_ADMIN', true);
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
    $_SERVER['HTTPS']='on';
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
define( 'AUTH_KEY',         'hM(xnz8.6o1s` SG^C1E5BYRi=Ba//_WFXs~  F1f-Xgg9JyU[F0v(}.nT:{lO;1' );
define( 'SECURE_AUTH_KEY',  'PVN;O<=1mFRf+)caGi0cm:J Gkr}&ubw1SvQ>FuqW%V]r0F)cfKM<)^<zG Q+P5v' );
define( 'LOGGED_IN_KEY',    'WB=,.kkO4[%)%*X`Wf?>PAXzJ(EbOX-b]Jm_MPJP~;[.N#m6i!(3<;WJLSS/+oPe' );
define( 'NONCE_KEY',        ')ijzE${VogoSP]=sgKRV;R5<G%vCP>Hf#x`f36!+sAFCOLIk{IRk@9N5wl%n(CJb' );
define( 'AUTH_SALT',        'vY$QA$IXDfR_t:e5@W45Mh@djjQ/[ObmN?Nc1(Q!e!#GnK4[{R-cf4]<[r&Zv-#f' );
define( 'SECURE_AUTH_SALT', 'x~m]TXdJ.?n;fv>2>d4R9Fr7A%?.Dj, LI|5E#J{?U1lG[KJj!d>0YFO+q`OoAVV' );
define( 'LOGGED_IN_SALT',   '@nMk0/l;dn[f%a(KmY2!gKhfuQ^Rc[s#Ep3K:RT8(;aPLr(.~XYJ>KI/~.eIyPr(' );
define( 'NONCE_SALT',       '>W6}NeS_f-<Sdk.!<]q$F.t_8Ia@=:$yRqY&y}F7RpmU67j01gNAow{#Dm N_3F,' );
define( 'WP_MEMORY_LIMIT', '256M' );
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'emw_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
