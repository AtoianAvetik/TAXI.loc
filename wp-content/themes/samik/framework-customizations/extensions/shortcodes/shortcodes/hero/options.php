<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'title' => array(
        'type'  => 'text',
        'value' => '',
        'label' => __('Header', 'samik')
    ),
    'text_content' => array(
        'label' => __('Description', 'samik'),
        'type' => 'wp-editor',
        'teeny' => true,
        'reinit' => true,
        'desc' => __('Description', 'samik'),
    ),
    'bg_image' => array(
        'type' => 'upload',
        'label' => __('Image', 'samik'),
        'desc'  => __('Choose image', 'samik'),
    ),
    'button' => array(
        'type'  => 'addable-box',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Button', 'samik'),
        'desc'  => __('Add button', 'samik'),
        'box-options' => array(
            'button_label' => array(
                'type' => 'text',
                'label' => __('Text', 'samik'),
            ),
            'attrs' => array(
                'type' => 'textarea',
                'label' => __('Attr', 'samik'),
            ),
        ),
        'template' => '{{- button_label }}', // box title
        'box-controls' => array( // buttons next to (x) remove box button
            'control-id' => '<small class="dashicons dashicons-smiley"></small>',
        ),
        'limit' => 2, // limit the number of boxes that can be added
    ),
    'size' => array(
        'type'  => 'select',
        'value' => 'medium',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Block size', 'samik'),
        'choices' => array(
            'small' => __('Small', 'samik'),
            'medium' => __('Medium', 'samik'),
            'large' => __('Large', 'samik'),
        ),
        /**
         * Allow save not existing choices
         * Useful when you use the select to populate it dynamically from js
         */
        'no-validate' => false,
    ),
    'bg_parallax' => array(
        'type'  => 'checkbox',
        'value' => true, // checked/unchecked
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Parallax on background', 'samik'),
        'desc'  => __('Add parallax effect for the background image', 'samik'),
        'text'  => __('Yes', 'samik'),
    )
);