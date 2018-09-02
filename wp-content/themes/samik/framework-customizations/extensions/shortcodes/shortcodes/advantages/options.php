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
	'advantages' => array(
       'type' => 'addable-popup',
       'label' => __('Advantages', 'samik'),
       'template' => '{{- title }}',
       'popup-title' => null,
       'size' => 'medium', // small, medium, large
       'limit' => 0, // limit the number of popup`s that can be added
       'add-button-text' => __('Add', 'samik'),
       'sortable' => true,
       'popup-options' => array(
           'icon' => array(
               'type'  => 'icon-v2',
               'preview_size' => 'medium',
               'modal_size' => 'medium',
               'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
               'label' => __('Icon', 'samik'),
               'desc'  => __('Choose icon', 'samik'),
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