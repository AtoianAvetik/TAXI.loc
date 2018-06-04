<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Form_Builder_Item_Whence_Section extends FW_Option_Type_Form_Builder_Item
{
    /**
     * The item type
     * @return string
     */
    public function get_type()
    {
        return 'whence-section';
    }

    /**
     * The boxes that appear on top of the builder and can be dragged down or clicked to create items
     * @return array
     */
    public function get_thumbnails()
    {
        return array(
            array(
                'html' =>
                    '<div class="item-type-icon-title">'.
                    '    <div class="item-type-icon"><span class="dashicons dashicons-editor-help"></span></div>'.
                    '    <div class="item-type-title">'. __('Whence section', 'unyson') .'</div>'.
                    '</div>',
            )
        );
    }

    /**
     * Enqueue item type scripts and styles (in backend)
     */
    public function enqueue_static()
    {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/whence-section/static');

        wp_enqueue_style(
            'fw-form-builder-item-type-whence-section',
            $uri .'/backend.css',
            array(),
            fw()->theme->manifest->get_version()
        );

        wp_enqueue_script(
            'fw-form-builder-item-type-whence-section',
            $uri .'/backend.js',
            array('fw-events'),
            fw()->theme->manifest->get_version(),
            true
        );

        wp_localize_script(
            'fw-form-builder-item-type-whence-section',
            'fw_form_builder_item_type_whence_section',
            array(
                'l10n' => array(
                    'item_title'        => __('Yes/No', 'unyson'),
                    'label'             => __('Label', 'unyson'),
                    'toggle_required'   => __('Toggle mandatory field', 'unyson'),
                    'edit'              => __('Edit', 'unyson'),
                    'delete'            => __('Delete', 'unyson'),
                    'edit_label'        => __('Edit Label', 'unyson'),
                    'yes'               => __('Yes', 'unyson'),
                    'no'                => __('No', 'unyson'),
                ),
                'options'  => $this->get_options(),
                'defaults' => array(
                    'type'    => $this->get_type(),
                    'options' => fw_get_options_values_from_input($this->get_options(), array())
                )
            )
        );

        fw()->backend->enqueue_options_static($this->get_options());
    }

    /**
     * Render item html for frontend form
     *
     * @param array $item Attributes from Backbone JSON
     * @param null|string|array $input_value Value submitted by the user
     * @return string HTML
     */
    public function frontend_render(array $item, $input_value)
    {
        if (is_null($input_value)) {
        }

        return fw_render_view(
            $this->locate_path(
                // Search view in 'framework-customizations/extensions/forms/form-builder/items/whence-section/views/view.php'
                '/views/view.php',
                // Use this view by default
                dirname(__FILE__) .'/view.php'
            ),
            array(
                'item' => $item,
                'input_value' => $input_value
            )
        );
    }

    /**
     * Validate item on frontend form submit
     *
     * @param array $item Attributes from Backbone JSON
     * @param null|string|array $input_value Value submitted by the user
     * @return null|string Error message
     */
    public function frontend_validate(array $item, $input_value)
    {
        $options = $item['options'];

        $messages = array(
            'required-1' => str_replace(
                array('{label}'),
                array($options['label']),
                __('This {label} field is required', 'unyson')
            ),
        );

        if ($options['required-1'] && empty($input_value)) {
            return $messages['required-1'];
        }
    }

    private function get_options()
    {
        return array(
            array(
                'place' => array(
                    'type' => 'group',
                    'options' => array(
                        array(
                            'show-1' => array(
                                'type'  => 'checkbox',
                                'value' => true,
                                'label' => __('Показывать', '{domain}'),
                            )
                        ),
                        array(
                            'label-1' => array(
                                'label' => __('Заголовок поля', '{domain}'),
                                'type' => 'text',
                                'value' => 'Место',
                            )
                        ),
                        array(
                            'required-1' => array(
                                'type'  => 'switch',
                                'label' => __('Обязательное поле?', 'unyson'),
                                'desc'  => __('Если это поле является обязательным для пользователя', 'unyson'),
                                'value' => true,
                            )
                        ),
                        array(
                            'place-1' => array(
                                'type' => 'popup',
                                'label' => __('Города', '{domain}'),
                                'template' => '{{- label }}',
                                'popup-title' => null,
                                'popup-options' => array(
                                    'option_2' => array(
                                        'type'  => 'addable-option',
                                        'value' => array('Аэропорт Симферополя', 'Ж/д вокзал Симферополя', 'Ай-даниль', 'Алупка', 'Алушта', 'Андреевка', 'Армянск', 'Балаклава', 'Бахчисарай', 'Белогорск', 'Береговое (ЮБК)', 'Береговое (бахчисарай)', 'Ботанический сад', 'Вилино', 'Витино', 'Гаспра', 'Геническ', 'Голубой Залив', 'Гурзуф', 'Гурзуф (Артек)', 'Даниловка', 'Джанкой', 'Евпатория', 'Заозерное', 'Зеленогорье', 'Золотое (Керчь)', 'Казантип (Поповка)', 'Канака', 'Кастрополь', 'Кацивели', 'Кача', 'Керчь', 'Керчь (героевка)', 'Керчь(порт крым)', 'Кикенеиз', 'Коктебель', 'Кореиз', 'Красные пещеры', 'Курортное (Белог. р-н)', 'Курортное (Керчь)', 'Курортное (Ленин. р-н)', 'Курортное (Феодос. р-н)', 'Курортное (Щебетовка)', 'Курпаты', 'Лавровое', 'Лазурное', 'Ласпи', 'Ленино', 'Ливадия', 'Малореченское', 'Массандра', 'Межводное', 'Меллас', 'Мирный(казантип)', 'Мисхор', 'Морское', 'Мраморные пещеры', 'Мрия резорт СКК', 'Мысовое(щелкино)', 'Научный', 'Нижнегорское', 'Нижняя Ореанда', 'Никита', 'Николаевка', 'Николаевка(Украина)', 'Новоозерное', 'Новоотрадное', 'Новофедоровка', 'Новый свет', 'Окуневка', 'Оленевка', 'Олива', 'Оползневое (Мрия Резорт))', 'Орджоникидзе', 'Орлиное', 'Орловка', 'Отрадное', 'Парковое', 'Партенит', 'Песочное (Щелкино)', 'Песчаное', 'Понизовка (СКК Мрия)', 'Поповка', 'Прибрежное (Саки)', 'Приветное', 'Раздольное', 'Рыбачье', 'Саки', 'Саки (полтава)', 'Санаторное', 'Сатера', 'Севастополь (Гагар. р-н)', 'Севастополь (Голландия)', 'Севастополь (Ленин. р-н)', 'Севастополь (Любимовка)', 'Севастополь (Радиогорка)', 'Севастополь (Учкуевка )', 'Севастополь (Фиолент)', 'Семидворье', 'Симеиз', 'Симферополь', 'Соколиное', 'Солнечная Долина', 'Солнечногорское', 'Сотера', 'Старый Крым', 'Судак', 'Угловое', 'Утёс', 'Феодосия', 'Феодосия (Приморский)', 'Феодосия(Береговое)', 'Форос', 'Фрунзе', 'Херсон (Украина)', 'Черноморское', 'Чонгар', 'Штормовое', 'Щебетовка', 'Щелкино', 'Щелкино (Азовский)', 'Ялта'),
                                        'label' => __('Города', '{domain}'),
                                        'option' => array( 'type' => 'text' ),
                                        'sortable' => true,
                                    )
                                ),
                            )
                        ),
                    )
                )
            ),
            array(
                'flight-number' => array(
                    'type' => 'group',
                    'options' => array(
                        array(
                            'show-2' => array(
                                'type'  => 'checkbox',
                                'value' => true,
                                'label' => __('Показывать', '{domain}'),
                            )
                        ),
                        array(
                            'label-2' => array(
                                 'label' => __('Заголовок поля', '{domain}'),
                                 'type' => 'text',
                                 'value' => 'Номер рейса',
                            )
                        ),
                        array(
                            'required-2' => array(
                                'type'  => 'switch',
                                'label' => __('Обязательное поле?', 'unyson'),
                                'desc'  => __('Если это поле является обязательным для пользователя', 'unyson'),
                                'value' => true,
                            )
                        ),
                    )
                )
            ),
            array(
                'date' => array(
                    'type' => 'group',
                    'options' => array(
                        array(
                            'show-3' => array(
                                'type'  => 'checkbox',
                                'value' => true,
                                'label' => __('Показывать', '{domain}'),
                            )
                        ),
                        array(
                            'label-3' => array(
                                 'label' => __('Заголовок поля', '{domain}'),
                                 'type' => 'text',
                                 'value' => 'Дата',
                            )
                        ),
                        array(
                            'required-3' => array(
                                'type'  => 'switch',
                                'label' => __('Обязательное поле?', 'unyson'),
                                'desc'  => __('Если это поле является обязательным для пользователя', 'unyson'),
                                'value' => true,
                            )
                        ),
                    )
                )
            ),
            array(
                'time' => array(
                    'type' => 'group',
                    'options' => array(
                        array(
                            'show-4' => array(
                                'type'  => 'checkbox',
                                'value' => true,
                                'label' => __('Показывать', '{domain}'),
                            )
                        ),
                        array(
                            'label-4' => array(
                                 'label' => __('Заголовок поля', '{domain}'),
                                 'type' => 'text',
                                 'value' => 'Время',
                            )
                        ),
                        array(
                            'required-4' => array(
                                'type'  => 'switch',
                                'label' => __('Обязательное поле?', 'unyson'),
                                'desc'  => __('Если это поле является обязательным для пользователя', 'unyson'),
                                'value' => true,
                            )
                        ),
                    )
                )
            )
        );
    }
}
FW_Option_Type_Builder::register_item_type('FW_Option_Type_Form_Builder_Item_Whence_Section');