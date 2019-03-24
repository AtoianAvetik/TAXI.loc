<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
    'logo' => array(
        'type' => 'upload',
        'label' => __('Логотип', 'samik'),
        'desc'  => __('Выберите изображение для логотипа', 'samik'),
    ),
    'footer_logo' => array(
        'type' => 'upload',
        'label' => __('Нижний логотип', 'samik'),
        'desc'  => __('Выберите изображение для нижнего логотипа', 'samik'),
    )
);
