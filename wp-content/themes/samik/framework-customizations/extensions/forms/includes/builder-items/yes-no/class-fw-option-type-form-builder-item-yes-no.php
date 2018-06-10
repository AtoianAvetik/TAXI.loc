<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Form_Builder_Item_Yes_No extends FW_Option_Type_Form_Builder_Item
{
    /**
     * The item type
     * @return string
     */
    public function get_type()
    {
        return 'yes-no';
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
                    '    <div class="item-type-title">'. __('Yes/No Question', 'unyson') .'</div>'.
                    '</div>',
            )
        );
    }

    /**
     * Enqueue item type scripts and styles (in backend)
     */
    public function enqueue_static()
    {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/yes-no/static');

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
            'fw_form_builder_item_type_yes_no',
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
        if (is_null($input_value)) {
            $input_value = $item['options']['default_value'];
        }

        return fw_render_view(
            $this->locate_path(
                // Search view in 'framework-customizations/extensions/forms/form-builder/items/yes-no/views/view.php'
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
            'required' => str_replace(
                array('{label}'),
                array($options['label']),
                __('This {label} field is required', 'unyson')
            ),
            'not_existing_choice' => str_replace(
                array('{label}'),
                array($options['label']),
                __('{label}: Submitted data contains not existing choice', 'unyson')
            ),
        );

        if ($options['required'] && empty($input_value)) {
            return $messages['required'];
        }

        // check if has not existing choices
        if (!empty($input_value) && !in_array($input_value, array('yes', 'no'))) {
            return $messages['not_existing_choice'];
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
                                'label' => __('Label', 'unyson'),
                                'desc'  => __('The label of the field that will be displayed to the users', 'unyson'),
                                'value' => __('Yes/No', 'unyson'),
                            )
                        ),
                        array(
                            'required' => array(
                                'type'  => 'switch',
                                'label' => __('Mandatory Field?', 'unyson'),
                                'desc'  => __('If this field is mandatory for the user', 'unyson'),
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
                            'default_value' => array(
                                'type'  => 'radio',
                                'label' => __('Default Value', 'unyson'),
                                'choices' => array(
                                    '' => __('None', 'unyson'),
                                    'yes' => __('Yes', 'unyson'),
                                    'no' => __('No', 'unyson'),
                                ),
                            )
                        )
                    )
                )
            ),
            $this->get_extra_options()
        );
    }
}
FW_Option_Type_Builder::register_item_type('FW_Option_Type_Form_Builder_Item_Yes_No');