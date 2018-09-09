<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'readonly' => array(
        'type'  => 'checkbox',
        'value' => false, // checked/unchecked
        'label' => __('Read only', 'samik'),
        'help'  => __('Read only', 'samik'),
    ),
    'float-label' => array(
        'type'  => 'checkbox',
        'value' => false, // checked/unchecked
        'label' => __('Float label', 'samik'),
        'help'  => __('Float label', 'samik'),
    ),
);