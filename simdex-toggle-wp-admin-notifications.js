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

jQuery(document).ready(function ()
{
    jQuery('.toggle-notifications-button')
        .on('click', function ()
        {
            jQuery('\
            .error,\
            .is-dismissible,\
            .notice,\
            .notice-error,\
            .notice-info,\
            .notice-success,\
            .notice-warning,\
            .update-nag,\
            .updated\
            ')
                .toggle('fast')
        });
});
