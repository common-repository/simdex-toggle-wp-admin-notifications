<?php
/*
Plugin Name: SimDex Toggle WP Admin Notifications
Plugin URI:  https://github.com/geoffmyers/simdex-toggle-wp-admin-notifications
Description: Hides annoying WordPress notifications, notices, alerts, warnings, errors, banners, updates, prompts, reminders, advertisements, etc. by default in the WordPress administrator dashboard and adds a toggle button to show or hide them with one click.
Version:     1.0.2
Author:      SimDex LLC / Geoff Myers
Author URI:  https://simdex.org/
Text Domain: simdex-toggle-wp-admin-notifications
Domain Path: /lang
 */

/* ************************************************** */
/* Only show WordPress update notifications to admins */
/* ************************************************** */
add_action('admin_head', 'simdex_hide_update_notice_to_all_but_admin_users', 1);

function simdex_hide_update_notice_to_all_but_admin_users()
{
    if ( ! current_user_can('update_core'))
    {
        remove_action('admin_notices', 'update_nag', 3);
    }
}

/* ************************************************** */
/* Load plugin styles (CSS) and scripts (JavaScript)  */
/* ************************************************** */
add_action('admin_enqueue_scripts', 'simdex_toggle_notifications_styles_scripts');

function simdex_toggle_notifications_styles_scripts()
{
    wp_enqueue_style(
        'toggle-notifications-styles',
        plugin_dir_url(__FILE__) . 'simdex-toggle-wp-admin-notifications.css'
    );
    wp_enqueue_script(
        'toggle-notifications-scripts',
        plugin_dir_url(__FILE__) . 'simdex-toggle-wp-admin-notifications.js',
        ['jquery', 'jquery-ui-accordion'],
        false,
        false
    );
}

/* ************************************************** */
/* Add Show / Hide Notifications button to WP admin   */
/* ************************************************** */
add_action('admin_notices', 'simdex_toggle_notifications_button', 1, 1);

function simdex_toggle_notifications_button()
{
    echo '<a class="toggle-notifications-button button-primary">Show / Hide Notifications</a>';
}
