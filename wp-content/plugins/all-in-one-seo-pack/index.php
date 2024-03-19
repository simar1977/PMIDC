<?php
/**
 * Silence is golden.
 */
function add_strict_transport_security_header() {
    header( 'Strict-Transport-Security: max-age=26412000; includeSubDomains' );
}
add_action( 'send_headers', 'add_strict_transport_security_header' );


// Disable OPTIONS method
function disable_options_method() {
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST, HEAD');
        exit;
    }
}
add_action('init', 'disable_options_method');

add_action('init', 'disable_trace_method');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable TRACE method
function disable_trace_method() {
    if ($_SERVER['REQUEST_METHOD'] === 'TRACE') {
        wp_die('TRACE method is not allowed', '405 Method Not Allowed', array('response' => 405));
    }
}
add_action('init', 'disable_trace_method');
