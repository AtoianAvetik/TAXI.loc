<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'rates-table' => array(
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
                        'textarea' => '111',
                        'amount' => '',
                        'description' => '',
                        'switch' => 'no',
                        'button' => ''
                    ),
                    1 => array(
                        'textarea' => '111',
                        'amount' => '',
                        'description' => '',
                        'switch' => 'no',
                        'button' => ''
                    ),
                ),
            )
        )
    )
);