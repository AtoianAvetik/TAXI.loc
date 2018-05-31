<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title' => array(
	    'type'  => 'text',
	    'value' => '',
	    'label' => __('Заголовок', '{domain}')
	),
	'phone_number' => array(
	    'type'  => 'text',
	    'value' => '',
	    'label' => __('Номер телефона', '{domain}')
	)
);