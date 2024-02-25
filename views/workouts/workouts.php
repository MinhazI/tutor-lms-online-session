<?php
require_once(__DIR__ . '/views/add_new_workout.php');
require_once(__DIR__ . '/views/main_workouts.php');

// Function to add a new menu item
function add_workouts_menu()
{
    add_menu_page(
        'Workouts', // Page title
        'Workouts', // Menu title
        'manage_options', // Capability required to access the menu item
        'workouts', // Menu slug
        'workouts_page_content', // Function to output the page content
        'dashicons-format-aside', // Icon (optional)
        20 // Position in the menu
    );

    // Add submenu items
    add_submenu_page(
        'workouts', // Parent slug
        'Add New Workout', // Page title
        'Add New', // Menu title
        'manage_options', // Capability required to access the menu item
        'add-new-workout', // Menu slug
        'add_new_workout_page_content' // Function to output the page content
    );
}
add_action('admin_menu', 'add_workouts_menu');

// Callback function for the Workouts page
function workouts_page_content()
{
    main_workouts();
}

// Callback function for the Add New Workout page
function add_new_workout_page_content()
{
    add_new_workout();
}
