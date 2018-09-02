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
        'title' => 'Форма обратной связи',
        'options' => array (
            'form-2' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Форма обратной связи'
                    ),
                    fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->get_options()
                )
            ),
        )
    ),
    'tab3' => array(
        'type' => 'tab',
        'title' => 'Форма заказа звонка',
        'options' => array (
            'form-3' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Форма заказа звонка'
                    ),
                    fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->get_options()
                )
            ),
        )
    ),
);