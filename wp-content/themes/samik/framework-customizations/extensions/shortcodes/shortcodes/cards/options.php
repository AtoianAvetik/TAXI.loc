<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'title' => array(
        'label' => __('Section header', 'samik'),
        'type' => 'text',
        'value' => '',
        'desc' => __('Section header', 'samik'),
    ),
	'cards' => array(
        'type' => 'addable-popup',
        'label' => __('Cards', 'samik'),
        'desc'  => __('Blocks with image and text', 'samik'),
        'template' => '{{- title }}',
        'popup-title' => null,
        'size' => 'medium', // small, medium, large
        'limit' => 0, // limit the number of popup`s that can be added
        'add-button-text' => __('Add', 'samik'),
        'sortable' => true,
        'popup-options' => array(
            'image' => array(
               'type' => 'upload',
               'label' => __('Image', 'samik'),
               'images_only' => true,
            ),
            'title' => array(
               'label' => __('Header', 'samik'),
               'type' => 'text',
               'value' => '',
               'desc' => __('Header', 'samik'),
            ),
            'text_content' => array(
               'label' => __('Description', 'samik'),
               'type' => 'wp-editor',
               'teeny' => true,
               'reinit' => true,
               'desc' => __('Description', 'samik'),
            )
        ),
   )
);