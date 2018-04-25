<?php

# LOCAL VARIABLES

// Makes changing wp_options unnecessary

define('WP_HOME','http://your_localhost');
define('WP_SITEURL','http://your_localhost');

# Database Configuration

define( 'DB_NAME', 'your_dbname' );
define( 'DB_USER', 'your_user' );
define( 'DB_PASSWORD', 'your_users_password' );
define( 'DB_HOST', 'your_localhost' );
define( 'DB_HOST_SLAVE', 'your_localhost' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc]

// Regerate  at https://api.wordpress.org/secret-key/1.1/salt/

define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
