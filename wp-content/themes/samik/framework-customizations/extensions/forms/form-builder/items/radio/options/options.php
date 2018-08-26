<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'checked-variant' => array(
        'type'  => 'text',
        'value' => null,
        'label' => __('Checked variant', 'samik'),
        'help'  => __('Set index of variant, which must be checked on load', 'samik'),
    )
);