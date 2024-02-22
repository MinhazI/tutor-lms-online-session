<?php

require_once(__DIR__ . '/messages/dashboard-admin-messages.php');
include_once ABSPATH . 'wp-admin/includes/plugin.php';

/*
Plugin Name: Tutor LMS Online Session Extension
Description: Adds an online session menu to Tutor LMS and to the WP dashboard with Dyte.
Version: 1.0
Author: Win Authority LLC
*/

// Check if Tutor LMS is active
function is_tutor_lms_active()
{
    return is_plugin_active('tutor/tutor.php');
}

// Function to run upon plugin activation
function custom_tutor_lms_extension_activate()
{
    $is_tutor_active = is_tutor_lms_active();
    // Check if Tutor LMS is active
    if (!$is_tutor_active) {
        // Tutor LMS is not active, display an error message and halt activation
        wp_die('Sorry, but this plugin requires Tutor LMS to be installed and active. Please activate Tutor LMS and try again.');
    }
}
register_activation_hook(__FILE__, 'custom_tutor_lms_extension_activate');

// Add custom link to Tutor LMS dashboard navigation
function add_custom_link_to_dashboard($links)
{
    $links['custom_link'] = array(
        'title' => __('Custom Link', 'tutor'),
        'url' => '//youtube.com',
        'icon' => 'tutor-icon-calender-line'
    );
    return $links;
}
add_filter('tutor_dashboard/nav_items', 'add_custom_link_to_dashboard');

// Load custom view file for the custom link
function load_custom_dashboard_view()
{
    if (is_tutor_lms_active()) {
        $template = locate_template('tutor/templates/dashboard/custom_link.php');
        if (!$template) {
            $template = plugin_dir_path(__FILE__) . 'custom_link.php';
        }
        if ($template) {
            load_template($template);
        }
    }
}
add_action('tutor_dashboard_template_loader', 'load_custom_dashboard_view');
