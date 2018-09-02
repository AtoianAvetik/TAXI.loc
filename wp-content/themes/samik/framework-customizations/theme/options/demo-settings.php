<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'rates-table' => array(
        'type' => 'custom-table',
        'desc' => false,
        'label' => false,
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
    ),
    'popup' => array(
        'type' => 'popup',
        'value' => array(
            'option_1' => 'value 1',
            'option_2' => 'value 2',
        ),
        'label' => __('Popup', 'samik'),
        'desc'  => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'samik'),
        'popup-title' => __('Popup Title', 'samik'),
        'button' => __('Edit', 'samik'),
        'popup-title' => null,
        'size' => 'small', // small, medium, large
        'popup-options' => array(
            'option_1' => array(
                'label' => __('Text', 'samik'),
                'type' => 'text',
                'value' => 'Demo text value',
                'desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'samik'),
                'help' => sprintf("%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
                    __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'samik'),
                    __('Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'samik')
                ),
            ),
            'option_2' => array(
                'label' => __('Textarea', 'samik'),
                'type' => 'textarea',
                'value' => 'Demo textarea value',
                'desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'samik'),
                'help' => sprintf("%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
                    __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'samik'),
                    __('Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'samik')
                ),
            ),
        ),
    )
);