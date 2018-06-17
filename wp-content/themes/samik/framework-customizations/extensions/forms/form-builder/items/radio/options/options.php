<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'checked-variant' => array(
        'type'  => 'text',
        'value' => null,
        'label' => __('Checked variant', 'fw'),
        'help'  => __('Set index of variant, which must be checked on load', 'fw'),
    )
);