<?php
/*
* Plugin Name: Main Immobilien Contact
* Description: REST Endpoint for contact form
* Version: 1.0 
*/

if(!defined('ABSPATH')) {
    exit;
};

add_action('rest_api_init', 'main_immobilien_register_contact_route');

function main_immobilien_register_contact_route(){
    register_rest_route('main-immobilien/v1', '/contact', array(
        'methods' => 'POST',
        'callback' => 'main_immobilien_handle_contact',
        'permission_callback' => '__return_true',
    ));
}

function main_immobilien_handle_contact(WP_REST_Request $request){
    $name = sanitize_text_field($request->get_param('name'));
    $email = $request->get_param('email');
    $message = sanitize_textarea_field($request->get_param('message'));

    $website = $request->get_param('website');

if ($website !== null && $website !== '') {
    return new WP_Error(
        'spam_detected',
        'Die Anfrage konnte nicht verarbeitet werden.',
        array('status' => 400)
    );
}

     if($name === '' || $message === '') {
            return new WP_Error(
                'missing_fields',
                'Bitte geben Sie Ihren Namen und Ihre Nachricht ein.',
                array('status' => 400)
            );
    }

    if(!is_email($email)) {
        return new WP_Error(
            'invalid_email',
            'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            array('status' => 400)
        );
    }

    $to = get_option('admin_email');
    $subject = 'Neue Kontaktanfrage - Main Immobilien';

    $body = "Name: {$name}\n";
    $body .= "E-Mail: {$email}\n\n";
    $body .= "Nachricht:\n{$message}";

    $headers = array(
    'Content-Type: text/plain; charset=UTF-8',
    'From: Main Immobilien <kontakt@mainimmobilien.site>',
    'Reply-To: ' . $email,
);

    $sent = wp_mail($to, $subject, $body, $headers);

    if(!$sent) {
        return new WP_Error(
            'mail_failed',
            'Ihre Anfrage konnte nicht gesendet werden. Bitte versuchen Sie es erneut.',
            array('status' => 500)
        );
    }

    return new WP_REST_Response(array(
        'message' => 'Vielen Dank! Ihre Anfrage wurde übermittelt.',

    ), 200);
}