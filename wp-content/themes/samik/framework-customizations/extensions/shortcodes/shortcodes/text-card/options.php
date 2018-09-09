<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'title' => array(
        'type'  => 'text',
        'label' => __('Header', 'samik'),
        'desc'  => __('Header to be displayed in the block', 'samik')
    ),
    'text' => array(
        'type'  => 'wp-editor',
        'label' => __('Text', 'samik'),
        'desc'  => __('Text to be displayed in the block', 'samik'),
        'editor_height' => 400,
    )
);