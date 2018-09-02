<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tab1' => array(
        'type' => 'tab',
        'title' => 'Главная форма заказа',
        'options' => array (
            'form-1' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Главная форма заказа'
                    ),
                    fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->get_options()
                )
            ),
        )
    ),
    'tab2' => array(
        'type' => 'tab',
        'title' => 'Form 2',
        'options' => array (
            'form-2' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Form 2'
                    ),
                    fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->get_options()
                )
            ),
        )
    ),
);