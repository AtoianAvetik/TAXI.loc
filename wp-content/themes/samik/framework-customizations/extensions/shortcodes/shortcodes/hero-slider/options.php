<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slides' => array(
       'type' => 'addable-popup',
       'label' => __('Slides', 'samik'),
       'template' => '{{- title }}',
       'popup-title' => null,
       'size' => 'medium', // small, medium, large
       'limit' => 0, // limit the number of popup`s that can be added
       'add-button-text' => __('Add', 'samik'),
       'sortable' => true,
       'popup-options' => array(
           'title' => array(
               'label' => __('Header', 'samik'),
               'type' => 'text',
               'value' => '',
               'desc' => __('Slide header', 'samik'),
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
               'desc'  => __('Choose image for slide', 'samik'),
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
               'limit' => 1, // limit the number of boxes that can be added
           )
       ),
   )
);