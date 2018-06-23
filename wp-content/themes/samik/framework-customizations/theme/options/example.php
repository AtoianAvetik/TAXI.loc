<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tab1' => array(
        'type' => 'tab',
        'title' => 'Tab #1',
        'options' => array(
            'opt1' => array(
                'type' => 'text',
                'label' => 'Option #1'
            ),
            'opt2' => array(
                'type' => 'textarea',
                'label' => 'Option #2'
            ),
        ),
    ),
    'tab2' => array(
        'type' => 'tab',
        'title' => 'Tab #2',
        'options' => array(
            'tab2_1' => array(
                'type' => 'tab',
                'title' => 'Sub Tab #1',
                'options' => array(
                    'opt2_1' => array(
                        'type' => 'text',
                        'label' => 'Sub Option #1'
                    ),
                ),
            ),
            'tab2_2' => array(
                'type' => 'tab',
                'title' => 'Sub Tab #2',
                'options' => array(
                    'opt2_2' => array(
                        'type' => 'textarea',
                        'label' => 'Sub Option #2'
                    ),
                ),
            ),
        ),
    ),
);