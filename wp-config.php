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
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         '`0{8n`:g!(8hcCk)}|tSQw~an+[V:,p$(Ok|F#z9g/G1pi!u@=.gLiLFgouX6qRt' );
define( 'SECURE_AUTH_KEY',  '_MVO!{1T9Gx 8<#Gt)>eo#Hq-Y.0Vn9{d?HSm^<95R}Jta4u[ppk#%kt__.<&(SP' );
define( 'LOGGED_IN_KEY',    ')w@] QK3wfA-d#s<^1NZ(R@,B4@=1g&7emw88MMU6?,^o,z|lK$dlZDB.rt|C^KM' );
define( 'NONCE_KEY',        'y}BV.}?9@N2t4d^P0*&[clYl_0/G#N60qiQ Ryfo&WGZ~cf[#6;>$.fK=t1Wy$YP' );
define( 'AUTH_SALT',        'si8G.}vS[(uR`s_pgtOPbjD/%xio;>gmM|@K;@/Ul5E+2XTzt<gHWUpljw$.n+E9' );
define( 'SECURE_AUTH_SALT', 'L}9RA8Fjs=l0AJrEj$&/!TUs:~KZ!Dp56B_{ROyOz5_//>f5k2V!f!_.^XiqOLLP' );
define( 'LOGGED_IN_SALT',   'B#YjW;9V}h;#y4Y2R*{9GcO.<OG_9rE_.(]|ou*QAOJfo$ol^d_&0D:+wbtcyW)[' );
define( 'NONCE_SALT',       'V@7!,r5Ni#mqog#aglplF4vqNB1$*k2zd7=-LIbks2+GE7HO`j`@$uPh7,3w{}^E' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
