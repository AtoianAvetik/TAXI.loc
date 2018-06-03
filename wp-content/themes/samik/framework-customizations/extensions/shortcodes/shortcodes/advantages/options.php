<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'advantages' => array(
       'type' => 'addable-popup',
       'label' => __('Преимущества', '{domain}'),
       'template' => '{{- title }}',
       'popup-title' => null,
       'size' => 'medium', // small, medium, large
       'limit' => 0, // limit the number of popup`s that can be added
       'add-button-text' => __('Добавить', '{domain}'),
       'sortable' => true,
       'popup-options' => array(
           'icon' => array(
               'type'  => 'icon-v2',
               'preview_size' => 'medium',
               'modal_size' => 'medium',
               'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
               'label' => __('Иконка', '{domain}'),
               'desc'  => __('Выберите иконку', '{domain}'),
           ),
           'title' => array(
               'label' => __('Заголовок', '{domain}'),
               'type' => 'text',
               'value' => '',
               'desc' => __('Заголовок', '{domain}'),
           ),
           'colored_title' => array(
               'label' => __('Заголовок с синим цветом', '{domain}'),
               'type' => 'text',
               'value' => '',
               'desc' => __('Заголовок с синим цветом', '{domain}'),
           ),
           'text_content' => array(
               'label' => __('Описание', '{domain}'),
               'type' => 'wp-editor',
               'teeny' => true,
               'reinit' => true,
               'desc' => __('Описание', '{domain}'),
           )
       ),
   )
);