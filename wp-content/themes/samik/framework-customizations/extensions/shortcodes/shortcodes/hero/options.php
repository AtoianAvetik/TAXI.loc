<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'title' => array(
        'type'  => 'text',
        'value' => '',
        'label' => __('Заголовок', '{domain}')
    ),
    'text_content' => array(
        'label' => __('Описание', '{domain}'),
        'type' => 'wp-editor',
        'teeny' => true,
        'reinit' => true,
        'desc' => __('Описание', '{domain}'),
    ),
    'bg_image' => array(
        'type' => 'upload',
        'label' => __('Изображение', '{domain}'),
        'desc'  => __('Выберите изображение', '{domain}'),
    ),
    'button' => array(
        'type'  => 'addable-box',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Кнопка', '{domain}'),
        'desc'  => __('Добавить кнопку', '{domain}'),
        'box-options' => array(
            'button_label' => array(
                'type' => 'text',
                'label' => __('Текст', '{domain}'),
            ),
            'attrs' => array(
                'type' => 'textarea',
                'label' => __('Attr', '{domain}'),
            ),
        ),
        'template' => '{{- button_label }}', // box title
        'box-controls' => array( // buttons next to (x) remove box button
            'control-id' => '<small class="dashicons dashicons-smiley"></small>',
        ),
        'limit' => 2, // limit the number of boxes that can be added
    ),
    'size' => array(
        'type'  => 'select',
        'value' => 'medium',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Размер блока', '{domain}'),
        'choices' => array(
            'small' => __('Маленький', '{domain}'),
            'medium' => __('Средний', '{domain}'),
            'large' => __('Большой', '{domain}'),
        ),
        /**
         * Allow save not existing choices
         * Useful when you use the select to populate it dynamically from js
         */
        'no-validate' => false,
    ),
    'bg_parallax' => array(
        'type'  => 'checkbox',
        'value' => true, // checked/unchecked
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Параллакс на фоне', '{domain}'),
        'desc'  => __('Добавить параллакс еффект для фонновой картинки', '{domain}'),
        'text'  => __('Да', '{domain}'),
    )
);