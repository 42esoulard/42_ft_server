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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '={i=]M~xe/TPP9(r*_(J{b1=4>fP3@p;gH^-.w>N;/vTpHHubp$SXahmdvF#I[h8');
define('SECURE_AUTH_KEY',  'p ;[-Y++0hjNY!.jX-:ovoitbq-)[Uu)a+5+R~A?,E`zuj>9=T/na$t%]X7qp7h+');
define('LOGGED_IN_KEY',    '7,|R-lx^Jb:6Dm7:gD~)2pTiMuFtmllQ(Wl|s;sR,HVBKSd6:-v}i1@-]i;-tjiN');
define('NONCE_KEY',        '=uA*.X+wB ![5yD b.mM[0++xA&Z+{.w,1g9Eihoj|{g)?dTK&Vir c-TahC@yyu');
define('AUTH_SALT',        'ry8g4?`+y2d/:M(Ob-I)t&%8&(y+N$kISe%Iv/7YPNdl$Sx:Gce4w+163BZ7rTwV');
define('SECURE_AUTH_SALT', '^dtwy]YWdfw)57@jd3F12~bNh!rI>{YOun?ES9/c+3$+}ZF[!HZ~TFBj<Tw[{-G0');
define('LOGGED_IN_SALT',   'xF,bk@i=hfY.I8U+<o`| b7zmbZBG4nkrI`Gv[MaP!?6Ld@_n*aY+H-BVU*?VV:r');
define('NONCE_SALT',       'bU3_cA[[eAW-m}] h40=3Vj<B>H.%r8<Wythd$U#@3Y=.RJv6T[P$m7se$D92$qY');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define( 'WP_ALLOW_REPAIR', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );