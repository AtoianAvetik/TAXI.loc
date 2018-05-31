<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
    'Header text' => array(
         'type'  => 'text',
         'value' => 'default value',
         'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
         'label' => __('Header text', '{domain}'),
         'desc'  => __('Description', '{domain}'),
         'help'  => __('Help tip', '{domain}'),
     )
);