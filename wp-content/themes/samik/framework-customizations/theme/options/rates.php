<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tab1' => array(
        'type' => 'tab',
        'title' => 'Аэропорт',
        'options' => array(
            'tab-label-1' => array(
                'type' => 'text',
                'value' => 'Аэропорт'
            ),
            'rates-table-1' => array(
                'type' => 'custom-table',
                'desc' => false,
                'label' => false,
                'header_options_hide' => true,
                'value' => array(
                    'cols' => array(
                        0 => array('name' => 'default-col'),
                        1 => array('name' => 'default-col')
                    ),
                    'rows' => array(
                        0 => array('name' => 'default-row')
                    ),
                    'content' => array(
                        0 => array(
                            0 => array(
                                'textarea' => '',
                                'amount' => '',
                                'description' => '',
                                'switch' => 'no',
                                'button' => ''
                            ),
                            1 => array(
                                'textarea' => '',
                                'amount' => '',
                                'description' => '',
                                'switch' => 'no',
                                'button' => ''
                            ),
                        ),
                    )
                )
            )
        ),
    ),
    'tab2' => array(
        'type' => 'tab',
        'title' => 'Ж/Д Вокзал',
        'options' => array(
            'tab-label-2' => array(
                'type' => 'text',
                'value' => 'Ж/Д Вокзал'
            ),
            'rates-table-2' => array(
                'type' => 'custom-table',
                'desc' => false,
                'label' => false,
                'header_options_hide' => true,
                'value' => array(
                    'cols' => array(
                        0 => array('name' => 'default-col'),
                        1 => array('name' => 'default-col')
                    ),
                    'rows' => array(
                        0 => array('name' => 'default-row')
                    ),
                    'content' => array(
                        0 => array(
                            0 => array(
                                'textarea' => '',
                                'amount' => '',
                                'description' => '',
                                'switch' => 'no',
                                'button' => ''
                            ),
                            1 => array(
                                'textarea' => '',
                                'amount' => '',
                                'description' => '',
                                'switch' => 'no',
                                'button' => ''
                            ),
                        ),
                    )
                )
            )
        ),
    ),
);