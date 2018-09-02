<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'form' => array(
        'type'  => 'select',
        'value' => 'form-1', //form-1|form-2,  locate: framework-customizations/theme/options/forms.php
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Форма', 'samik'),
        'desc'  => __('Выберите форму', 'samik'),
        'choices' => fw()->extensions->get( 'shortcodes' )->get_shortcode( 'forms' )->get_forms_from_db(),
        /**
         * Allow save not existing choices
         * Useful when you use the select to populate it dynamically from js
         */
        'no-validate' => false,
    )
);