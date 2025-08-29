<?php

    function html5_support() {
        add_theme_support('html5', ['script', 'style']);
    }
    add_action('after_setup_theme', 'html5_support');

    function theme_styles() {
        wp_enqueue_style('main_style', get_stylesheet_uri(), array(), null, 'all');
    }

    add_action('get_footer', 'theme_styles', 5);

    function jquery_footer() {
        wp_scripts()->add_data( 'jquery', 'group', 1);
        wp_scripts()->add_data( 'jquery-core', 'group', 1);
    }
    add_action('wp_enqueue_styles', 'jquery_footer');

    function preload_fonts() {
        $fonts = array(
            ''
        );

        foreach ($fonts as $key=>$font) {
            echo '<link rel="preload" href="' . get_template_directory_uri() . '/web-fonts/' . $font .'" as="font" type="font/woff2" crossorigin>';
        }
    }

    //add_action('wp_head, 'preload_fonts');

    $localised_js = array(
        'location' => get_template_directory_uri(),
        'enviroment' => constant('WP_ENVIROMENT_TYPE'),
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'siteUrl' => get_option('siteurl'),
        'origin' => esc_html(get_site_url())
    );

    wp_localize_script( 'theme-script', 'WP', $localised_js);
    wp_enqueue_script( 'theme-script' );