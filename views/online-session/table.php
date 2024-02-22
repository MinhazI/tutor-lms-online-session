<?php
require_once('constants.php');

$query = "SELECT * FROM your_table_name ";

$results = $wpdb->get_results($query);

if ($result) {
    echo '<table>';

    echo '<thead><tr>';
    foreach ($results[0] as $key => $value) {
        echo '<th>' . esc_html($key) . '</th>';
    }
    echo '</tr></thead>';

    echo '<tbody>';
    foreach ($results as $row) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td>' . esc_html($value) . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';

    echo '</table>';
}
