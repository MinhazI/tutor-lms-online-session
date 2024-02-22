<?php

function create_meeting($title)
{
    $request_body = json_encode([
        'title' => $title,
        'preferred_region' => 'ap-south-1',
        'record_on_start' => false,
        'live_stream_on_start' => false,
    ]);

    $credentials = base64_encode('3b0c74c3-3084-490a-868b-bd14d00a9c69:dce61cba87bdf70f83de');

    $args = array(
        'headers' => array(
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . $credentials,
            'Content-Type' => 'application/json',
        ),
        'body' => $request_body,
    );


    $response = wp_remote_post('https://api.dyte.io/v2/meetings', $args);

    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo "Error: $error_message";
    } else {
        $response_body = wp_remote_retrieve_body($response);
        // Decode the JSON string into a PHP array
        $data = json_decode($response_body, true);

        return $data;
    }
}
