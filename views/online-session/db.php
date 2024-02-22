<?php

require_once('constants.php');

// Check if the table exists, if not, create it
$sql = "SHOW TABLES LIKE " . TABLE_NAME;
$table_exists = $wpdb->get_results($sql);

if (empty($table_exists)) {
    // Table doesn't exist, create it
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE " . TABLE_NAME . " (
        id INT NOT NULL AUTO_INCREMENT,
        session_name VARCHAR(255) NOT NULL,
        session_description VARCHAR(255) NOT NULL,
        dyte_meeting_id VARCHAR(500) NOT NULL,
        dyte_meeting_link VARCHAR(500) NOT NULL,
        session_instructor_id VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
