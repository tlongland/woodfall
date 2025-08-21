<?php

    define(WP_ENVIROMENT_TYPE, 'development');

    if (constant('WP_ENVIROMENT_TYPE') === 'development') {
        define('DB_NAME', 'new-theme');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'root');
        define('WP_DEBUG', true);
        define('WP_DEBUG_LOG', false);
    } elseif (constant('WP_ENVIROMENT_TYPE') === 'staging') {
        define('DB_NAME', '');
        define('DB_USER', '');
        define('DB_PASSWORD', '');
        define('WP_DEBUG', false);
    } elseif (constant('WP_ENVIROMENT_TYPE') === 'production') {
        define('DB_NAME', '');
        define('DB_USER', '');
        define('DB_PASSWORD', '');
        define('WP_DEBUG', false);
        define('WP_DEBUG_LOG', false);
    }

    define( 'DB_HOST', 'localhost' );

    define( 'DB_CHARSET', 'utf8' );

    define( 'DB_COLLATE', '' );

    if (! defined('ABSPATH')) { 
        define('ABSPATH', dirname(__FILE__) . '/');
    }

    require_once ABSPATH . 'wp-settings.php';