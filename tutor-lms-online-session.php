<?php
/*
Plugin Name: Custom Tutor LMS Extension
Description: Adds custom functionality to Tutor LMS.
Version: 1.0
Author: Your Name
*/

// Check if Tutor LMS is active
function is_tutor_lms_active()
{
    return class_exists('TutorLMS');
}

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
