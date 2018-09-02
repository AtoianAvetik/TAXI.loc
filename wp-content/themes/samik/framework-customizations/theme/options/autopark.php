<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tab1' => array(
        'type' => 'tab',
        'title' => 'Эконом-класс',
        'options' => array (
            'category-1' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Эконом-класс'
                    ),
                    'cars' => array(
                        'type' => 'addable-popup-full',
                        'label' => false,
                        'template' => '<div class="add-popup-template"><div class="add-popup-template_image"><img src="{{= image[0]["url"] }}"></img></div><div class="add-popup-template_title">{{= name }}</div></div>',
                        'size' => 'small', // small, medium, large
                        'limit' => 0, // limit the number of popup`s that can be added
                        'popup-title' => ' ',
                        'add-button-text' => __('Add', 'samik'),
                        'sortable' => true,
                        'popup-options' => array(
                            'name' => array(
                                'label' => __('Name', 'samik'),
                                'type' => 'text'
                            ),
                            'image' => array(
                                'type' => 'multi-upload',
                                'label' => __('Image', '{domain}'),
                                'images_only' => true,
                            ),
                        ),
                    )
                )
            ),
        )
    ),
    'tab2' => array(
        'type' => 'tab',
        'title' => 'Комфорт-класс',
        'options' => array (
            'category-2' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Комфорт-класс'
                    ),
                    'cars' => array(
                        'type' => 'addable-popup-full',
                        'label' => false,
                        'template' => '<div class="add-popup-template"><div class="add-popup-template_image"><img src="{{= image[0]["url"] }}"></img></div><div class="add-popup-template_title">{{= name }}</div></div>',
                        'size' => 'small', // small, medium, large
                        'limit' => 0, // limit the number of popup`s that can be added
                        'popup-title' => ' ',
                        'add-button-text' => __('Add', 'samik'),
                        'sortable' => true,
                        'popup-options' => array(
                            'name' => array(
                                'label' => __('Name', 'samik'),
                                'type' => 'text'
                            ),
                            'image' => array(
                                'type' => 'multi-upload',
                                'label' => __('Image', '{domain}'),
                                'images_only' => true,
                            ),
                        ),
                    )
                )
            ),
        )
    ),
    'tab3' => array(
        'type' => 'tab',
        'title' => 'Бизнес-класс',
        'options' => array (
            'category-3' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'title' => array(
                        'type'  => 'hidden',
                        'value' => 'Бизнес-класс'
                    ),
                    'cars' => array(
                        'type' => 'addable-popup-full',
                        'label' => false,
                        'template' => '<div class="add-popup-template"><div class="add-popup-template_image"><img src="{{= image[0]["url"] }}"></img></div><div class="add-popup-template_title">{{= name }}</div></div>',
                        'size' => 'small', // small, medium, large
                        'limit' => 0, // limit the number of popup`s that can be added
                        'popup-title' => ' ',
                        'add-button-text' => __('Add', 'samik'),
                        'sortable' => true,
                        'popup-options' => array(
                            'name' => array(
                                'label' => __('Name', 'samik'),
                                'type' => 'text'
                            ),
                            'image' => array(
                                'type' => 'multi-upload',
                                'label' => __('Image', '{domain}'),
                                'images_only' => true,
                            ),
                        ),
                    )
                )
            ),
        )
    ),
);