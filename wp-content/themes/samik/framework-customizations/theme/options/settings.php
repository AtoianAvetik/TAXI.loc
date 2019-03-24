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
    ),
    'phonenumber' => array(
        'type' => 'text',
        'label' => __('Номер телефона', 'samik'),
        'desc'  => __('Введите номер телефона отображаемый в шапке и подвале сайта', 'samik'),
    )
);
