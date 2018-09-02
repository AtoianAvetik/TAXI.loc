<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'choices' => array(
        'type'  => 'addable-option',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Cities', 'samik'),
        'option' => array( 'type' => 'text' ),
        'add-button-text' => __('Add', 'samik'),
        'sortable' => true,
    )
);