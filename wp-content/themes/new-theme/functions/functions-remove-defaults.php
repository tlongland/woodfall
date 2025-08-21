<?php

    function remove_block_css() {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');
        remove_filter('render_block', 'wp_render_layout_support_flag', 10, 2);
    }

    add_action('wp_enqueue_scripts', 'remove_block_css');

    function remove_block_icons() {
        remove_action('wp_head', 'wp_generator');

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        remove_action('wp_head', 'wp_global_styles_render_svg_filters');
        remove_action('in_admin_header', 'wp_global_styles_render_svg_filters');

        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');

        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        
        remove_action('wp_head', 'wp_resource_hints', 2, 99);

        remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    }

    add_action('init', 'remove_block_icons');

    function remove_footer_scripts() {
        wp_dequeue_script('wp-embed');
    }

    add_action('wp_footer', 'remove_footer_scripts');

    function remove_jquery_migrate($scripts) {
        if (!is_admin() && isset($scripts->registered['jquery'])) {
            $script = $scripts->registered['jquery'];
            if ($script->deps) {
                $script->deps = array_diff($script->deps, array('jquery-migrate'));
            }
        }
    }

    add_action('wp_default_scripts', 'remove_jquery_migrate');

    remove_action('welcome_panel', 'wp_welcome_panel');

    add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

    function remove_dashboard_widgets() {
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
        remove_meta_box('dashboard_primary', 'dashboard', 'side');
        remove_meta_box('dashboard_secondary', 'dashboard', 'side');
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');
        remove_meta_box('welcome_panel', 'dashboard', 'normal');
    }

