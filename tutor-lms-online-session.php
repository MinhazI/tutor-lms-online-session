<?php

global $wp_filesystem;
include_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once(__DIR__ . '/utils/file_dir_helper.php');
require_once(__DIR__ . '/views/workouts/workouts.php');

/*
Plugin Name: Tutor LMS Online Session Extension
Description: Adds an online session menu to Tutor LMS and to the WP dashboard with Dyte.
Author: Win Authority LLC
Plugin URI:        https://www.winauthority.com/plugins/tutor-lms-online-session/
Version:           0.0.2
Requires at least: 5.2
Requires PHP:      7.2
Author URI:        https://www.winauthority.com/
License:           GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Update URI:        https://www.winauthority.com/
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
    } else {
        // Copy the template file to the Tutor LMS directory
        copy_custom_template_file();

        add_rewrite_rule('^online-session/?', 'index.php?custom_endpoint=online-session', 'top');

        // Flush permalinks
        flush_rewrite_rules();
    }
}
register_activation_hook(__FILE__, 'custom_tutor_lms_extension_activate');

// Function to copy the template file to the Tutor LMS directory
function copy_custom_template_file()
{
    $source_file = plugin_dir_path(__FILE__) . 'views/online_session.php';
    $source_dir = plugin_dir_path(__FILE__) . 'views/online-session/';
    $destination_tutor_dir = ABSPATH . 'wp-content/plugins/tutor/templates/dashboard/';

    // Create the destination directory if it doesn't exist
    check_and_create_dir($destination_tutor_dir);

    $destination_file = $destination_tutor_dir . 'online_session.php';
    $destination_dir = $destination_tutor_dir . 'online-session/';

    check_and_create_dir($destination_dir);

    // Copy the file
    $success_file = copy($source_file, $destination_file);
    $success_dir = copy_recursive($source_dir, $destination_dir);

    if (!$success_file || !$success_dir) {
        // Display an error message or log the error
        error_log('Failed to copy template file to destination directory.');
        return;
    }

    // Flush permalinks
    flush_rewrite_rules();
}


// Add custom link to Tutor LMS dashboard navigation
add_filter('tutor_dashboard/instructor_nav_items', 'add_online_sessions');
function add_online_sessions($links)
{

    $links['online_session'] = [
        "title" =>    __('Online Sessions', 'tutor'),
        "auth_cap" => tutor()->instructor_role,
        "icon" => "tutor-icon-calender-line",
    ];
    return $links;
}

// Load custom view file for the custom link
function load_custom_dashboard_view()
{
    if (is_tutor_lms_active()) {
        $template = locate_template('tutor/templates/dashboard/online_session.php');
        if (!$template) {
            $template = plugin_dir_path(__FILE__) . '/views/online_session.php';
        }
        if ($template) {
            load_template($template);
        }
    }
}
add_action('tutor_dashboard_template_loader', 'load_custom_dashboard_view');

// Function to run upon parsing the request
function custom_parse_request($wp)
{
    // Check if the requested URL matches the custom endpoint pattern
    if (isset($wp->query_vars) && preg_match('/^online-session\/?$/', $wp->request, $matches)) {
        // Set the custom query variable
        $wp->query_vars['custom_endpoint'] = 'online-session';
    }
}
add_action('parse_request', 'custom_parse_request');

// Load custom view file for the custom URL
function load_custom_template_file()
{
    // Retrieve the value of custom_endpoint query variable
    $custom_endpoint = get_query_var('custom_endpoint');

    // Check if the custom_endpoint is set to 'online-session'
    if ($custom_endpoint === 'online-session') {
        $template = plugin_dir_path(__FILE__) . '/views/online_session_template.php';
        if (file_exists($template)) {
            include $template;
            exit;
        } else {
            error_log('Template File Not Found'); // Debug statement if template file not found
        }
    } else {
        error_log('Template file not requested');
    }
}
add_action('template_redirect', 'load_custom_template_file');
