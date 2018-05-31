<?php if (!defined( 'FW' )) die('Forbidden');

$options = array(
    'main' => array(
        'type' => 'box',
        'title' => __('Testing Options', '{domain}'),
        'options' => array(
            'model' => array(
                'type' => 'text',
                'label' => __('Модель', '{domain}')
            ),
            'price' => array(
                'type' => 'text',
                'label' => __('Цена', '{domain}')
            ),
            'sizes' => array(
                'type' => 'text',
                'label' => __('Размерный ряд', '{domain}')
            ),
            'top_mat' => array(
                'type' => 'text',
                'label' => __('Материал верха', '{domain}')
            ),
            'sole' => array(
                'type' => 'text',
                'label' => __('Подошва', '{domain}')
            ),
            'images' => array(
                'type' => 'multi-upload',
                'label' => __('Image', '{domain}'),
                'images_only' => true,
            ),
        ),
    ),
);