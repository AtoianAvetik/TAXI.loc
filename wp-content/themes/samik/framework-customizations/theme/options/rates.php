<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tab1' => array(
        'type' => 'tab',
        'title' => 'Tab #1',
        'options' => array(
            'rates-table-1' => array(
                'type' => 'custom-table',
                'desc' => false,
                'label' => false,
                'value' => array(
                    'header_options_hide' => true,
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
        'title' => 'Tab #2',
        'options' => array(
            'rates-table-2' => array(
                'type' => 'custom-table',
                'desc' => false,
                'label' => false,
                'value' => array(
                    'header_options_hide' => true,
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