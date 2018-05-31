<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slides' => array(
       'type' => 'addable-popup',
       'label' => __('Cлайды', '{domain}'),
       'template' => '{{- title }}',
       'popup-title' => null,
       'size' => 'medium', // small, medium, large
       'limit' => 0, // limit the number of popup`s that can be added
       'add-button-text' => __('Добавить', '{domain}'),
       'sortable' => true,
       'popup-options' => array(
           'title' => array(
               'label' => __('Заголовок', '{domain}'),
               'type' => 'text',
               'value' => '',
               'desc' => __('Заголовок слайда', '{domain}'),
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
               'desc'  => __('Выберите изображение для слайда', '{domain}'),
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
               'limit' => 1, // limit the number of boxes that can be added
           )
       ),
   )
);