<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'readonly' => array(
        'type'  => 'checkbox',
        'value' => true, // checked/unchecked
        'label' => __('Read only', 'fw'),
        'help'  => __('Read only', 'fw'),
    )
);