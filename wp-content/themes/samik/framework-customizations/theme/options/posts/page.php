<?php if (!defined( 'FW' )) die('Forbidden');

if (is_admin()) {
    if ( get_post( get_the_id() )->post_name == 'home-page') {
//        $options = array(
//            'main' => array(
//                'type' => 'box',
//                'title' => __('Home Options', 'samik'),
//                'options' => array(
//                    'text' => array(
//                        'type' => 'text',
//                        'label' => __('Text', 'samik')
//                    ),
//                ),
//            ),
//        );
    }
}


