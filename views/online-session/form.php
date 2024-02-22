<?php
require_once('constants.php');
require_once('dyte.php');

if (isset($_POST['submit_session'])) {
    // Handle form submission
    $session_name = sanitize_text_field($_POST['session_name']);
    $session_description = sanitize_text_field($_POST['session_description']);
    // Sanitize and validate other input fields

    $meeting = create_meeting($session_name);

    var_dump($meeting);

    // Insert data into the database
    $wpdb->insert(
        TABLE_NAME,
        array(
            'session_name' => $session_name,
            'session_description' => $session_description,
            'dyte_meeting_id' => $meeting['data']['id']
        ),
        array(
            '%s', // session_name is a string
            '%s',
            // Define data types for other fields
        )
    );
}
?>

<!-- Your HTML form goes here -->
<form method="post">
    <label for="session_name">Session Name:</label>
    <input type="text" id="session_name" name="session_name" required>
    <label for="session_description">Session Description:</label>
    <input type="text" id="session_description" name="session_description" required>

    <input type="submit" name="submit_session" value="Submit">
</form>