<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'choices' => array(
        'type'  => 'addable-option',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Города', '{domain}'),
        'option' => array( 'type' => 'text' ),
        'add-button-text' => __('Add', '{domain}'),
        'sortable' => true,
    )
);