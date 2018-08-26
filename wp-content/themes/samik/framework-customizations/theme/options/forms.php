<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'orderForm' => array(
        'type' => 'tab',
        'title' => 'Главная форма заказа',
        'options' => array(
            fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->get_options()
        ),
    ),
    'tab2' => array(
        'type' => 'tab',
        'title' => 'Form 2',
        'options' => array(
            'tab-label-1' => array(
                'type' => 'text',
                'value' => 'Аэропорт'
            ),
        ),
    ),
);