<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Form_Builder_Item_Date_Picker extends FW_Option_Type_Form_Builder_Item
{
    /**
     * The item type
     * @return string
     */
    public function get_type()
    {
        return 'date-picker';
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
                    '<div class="item-type-icon-title" data-hover-tip="' . __( 'Add an Date picker field', 'samik' ) . '">'.
                    '    <div class="item-type-icon"><span class="dashicons dashicons-calendar-alt"></span></div>'.
                    '    <div class="item-type-title">'. __('Date', 'samik') .'</div>'.
                    '</div>',
            )
        );
    }

    /**
     * Enqueue item type scripts and styles (in backend)
     */
    public function enqueue_static()
    {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/date-picker/static');

        wp_enqueue_style(
            'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
            $uri .'/css/styles.css'
        );

        wp_enqueue_script(
            'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
            $uri .'/js/scripts.js',
            array('fw-events'),
            false,
            true
        );

        wp_localize_script(
            'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
            'fw_form_builder_item_type_date_picker',
            array(
                'l10n' => array(
                    'item_title'        => __('Date', 'samik'),
                    'label'             => __('Label', 'samik'),
                    'toggle_required'   => __('Toggle mandatory field', 'samik'),
                    'edit'              => __('Edit', 'samik'),
                    'delete'            => __('Delete', 'samik'),
                    'edit_label'        => __('Edit Label', 'samik'),
                ),
                'options'  => $this->get_options(),
                'defaults' => array(
                    'type'    => $this->get_type(),
                    'width'   => fw_ext( 'forms' )->get_config( 'items/width' ),
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
        $options = $item['options'];

        // prepare attributes
        {
            $attr = array(
                'type'        => 'text',
                'name'        => $item['shortcode'],
                'placeholder' => $options['placeholder'],
                'value'       => $input_value,
                'id'          => 'id-' . fw_unique_increment(),
            );

            if ( $options['required'] ) {
                $attr['required'] = 'required';
            }
        }

        return fw_render_view(
            $this->locate_path(
                // Search view in 'framework-customizations/extensions/forms/form-builder/items/date-picker/views/view.php'
                '/views/view.php',
                // Use this view by default
                dirname(__FILE__) .'/view.php'
            ),
            array(
                'item' => $item,
                'attr' => $attr,
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
            'required' => str_replace(
                array('{label}'),
                array($options['label']),
                __('This {label} field is required', 'samik')
            )
        );

        if ($options['required'] && empty($input_value)) {
            return $messages['required'];
        }
    }

    private function get_options()
    {
        return array(
            array(
                'g1' => array(
                    'type' => 'group',
                    'options' => array(
                        array(
                            'label' => array(
                                'type'  => 'text',
                                'label' => __('Label', 'samik'),
                                'desc'  => __('The label of the field that will be displayed to the users', 'samik'),
                                'value' => __('Date', 'samik'),
                            )
                        ),
                        array(
                            'required' => array(
                                'type'  => 'switch',
                                'label' => __('Mandatory Field?', 'samik'),
                                'desc'  => __('If this field is mandatory for the user', 'samik'),
                                'value' => true,
                            )
                        ),
                    )
                )
            ),
            array(
                'g2' => array(
                    'type' => 'group',
                    'options' => array(
                        array(
                            'placeholder' => array(
                                'type'  => 'text',
                                'label' => __( 'Placeholder', 'samik' ),
                                'desc'  => __( 'This text will be used as field placeholder', 'samik' ),
                            )
                        )
                    )
                )
            ),
            $this->get_extra_options()
        );
    }
}
FW_Option_Type_Builder::register_item_type('FW_Option_Type_Form_Builder_Item_Date_Picker');