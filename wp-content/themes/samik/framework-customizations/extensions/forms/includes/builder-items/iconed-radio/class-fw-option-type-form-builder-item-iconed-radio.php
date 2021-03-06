<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Form_Builder_Item_Iconed_Radio extends FW_Option_Type_Form_Builder_Item {
	public function get_type() {
		return 'iconed-radio';
	}

	private function get_uri( $append = '' ) {
		return fw_get_framework_directory_uri(
			'/extensions/forms/includes/option-types/' .
			$this->get_builder_type() . '/items/' .
			$this->get_type() . $append
		);
	}

	public function get_thumbnails() {
		return array(
			array(
				'html' =>
					'<div class="item-type-icon-title" data-hover-tip="' . __( 'Add a Single Choice field with icon',
						'samik' ) . '">' .
					'<div class="item-type-icon">' .
                    '<img src="' . esc_attr(  fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/iconed-radio/static/images/icon.png' ) ) . '" />' .
                    '</div>' .
					'<div class="item-type-title">' . __( 'Single Choice With Icon', 'samik' ) . '</div>' .
					'</div>'
			)
		);
	}

	public function enqueue_static() {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/iconed-radio/static');

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
            'fw_form_builder_item_type_iconed_radio',
            array(
                'l10n'     => array(
                    'item_title'      => __( 'Single Choice With Icon', 'samik' ),
                    'label'           => __( 'Label', 'samik' ),
                    'toggle_required' => __( 'Toggle mandatory field', 'samik' ),
                    'edit'            => __( 'Edit', 'samik' ),
                    'delete'          => __( 'Delete', 'samik' ),
                    'edit_label'      => __( 'Edit Label', 'samik' ),
                    'x_more'          => __( '{x} More', 'samik' ),
                    'close'           => __( 'Close', 'samik' ),
                    'edit_icon_label' => __( 'Change Icon', 'samik' ),
                ),
                'options'  => $this->get_options(),
                'defaults' => array(
                    'type'    => $this->get_type(),
                    'width'   => fw_ext( 'forms' )->get_config( 'items/width' ),
                    'options' => fw_get_options_values_from_input( $this->get_options(), array() )
                )
            )
        );

		fw()->backend->enqueue_options_static( $this->get_options() );
	}

	private function get_options() {
		return array(
			array(
				'g1' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'label' => array(
								'type'  => 'text',
								'label' => __( 'Label', 'samik' ),
								'desc'  => __( 'Enter field label (it will be displayed on the web site)', 'samik' ),
								'value' => __( 'Single Choice With Icon', 'samik' ),
							)
						),
						array(
							'required' => array(
								'type'  => 'switch',
								'label' => __( 'Mandatory Field', 'samik' ),
								'desc'  => __( 'Make this field mandatory?', 'samik' ),
								'value' => true,
							)
						),
					)
				)
			),
			array(
				'g2' => array(
					'type'    => 'group',
					'options' => array(
						array(
                            'choices' => array(
                                'type'  => 'addable-box',
                                'label' => __('Choices', 'samik'),
                                'help'  => __('Add choice', 'samik'),
                                'template' => '<i class="{{= o["icon"]["icon-class"] }}"></i>', // box title
                                'box-options' => array(
                                    array(
                                        'g21' => array(
                                            'type'    => 'group',
                                            'options' => array(
                                                array(
                                                    'value' => array(
                                                        'type'  => 'text',
                                                        'label' => __('Value', 'samik')
                                                    ),
                                                ),
                                            ),
                                        )
                                    ),
                                    array(
                                        'g22' => array(
                                            'type'    => 'group',
                                            'options' => array(
                                                array(
                                                    'icon' => array(
                                                        'type'  => 'icon-v2',
                                                        'preview_size' => 'medium',
                                                        'modal_size' => 'medium',
                                                        'label' => __('Icon', 'samik'),
                                                        'desc'  => __('Choose icon', 'samik'),
                                                    ),
                                                ),
                                                array(
                                                    'checked' => array(
                                                        'type'  => 'checkbox',
                                                        'value' => false, // checked/unchecked
                                                        'label' => __('Checked', 'samik'),
                                                        'help'  => __('Checked', 'samik'),
                                                    ),
                                                ),
                                            ),
                                        )
                                    ),
                                    array(
                                        'g23' => array(
                                            'type'    => 'group',
                                            'options' => array(
                                                array(
                                                    'hint-title' => array(
                                                        'type' => 'text',
                                                        'label' => __('Hint title', 'samik'),
                                                    ),
                                                ),
                                                array(
                                                    'hint-content' => array(
                                                        'type' => 'text',
                                                        'label' => __('Hint content', 'samik'),
                                                    ),
                                                ),
                                            )
                                        )
                                    ),
                                ),
                                'sortable' => true,
                            )
						),
						array(
							'randomize' => array(
								'type'  => 'switch',
								'label' => __( 'Randomize?', 'samik' ),
								'desc'  => __( 'Do you want choices to be displayed in random order?', 'samik' ),
								'value' => false,
							)
						),
					)
				)
			),
			array(
				'layout' => array(
					'type'    => 'select',
					'label'   => __( 'Field Layout', 'samik' ),
					'desc'    => __( 'Select choice display layout', 'samik' ),
					'choices' => array(
						'one-column'    => __( 'One column', 'samik' ),
						'two-columns'   => __( 'Two columns', 'samik' ),
						'three-columns' => __( 'Three columns', 'samik' ),
						'side-by-side'  => __( 'Side by side', 'samik' ),
					),
				)
			),
			array(
				'info' => array(
					'type'  => 'textarea',
					'label' => __( 'Instructions for Users', 'samik' ),
					'desc'  => __( 'The users will see these instructions in the tooltip near the field', 'samik' ),
				)
			),
			$this->get_extra_options()
		);
	}

	protected function get_fixed_attributes( $attributes ) {
		// do not allow sub items
		unset( $attributes['_items'] );

		$default_attributes = array(
			'type'      => $this->get_type(),
			'shortcode' => false, // the builder will generate new shortcode if this value will be empty()
			'width'     => '',
			'options'   => array()
		);

		// remove unknown attributes
		$attributes = array_intersect_key( $attributes, $default_attributes );

		$attributes = array_merge( $default_attributes, $attributes );

		/**
		 * Fix $attributes['options']
		 * Run the _get_value_from_input() method for each option
		 */
		{
			$only_options = array();

			foreach ( fw_extract_only_options( $this->get_options() ) as $option_id => $option ) {
				if ( array_key_exists( $option_id, $attributes['options'] ) ) {
					$option['value'] = $attributes['options'][ $option_id ];
				}
				$only_options[ $option_id ] = $option;
			}

			$attributes['options'] = fw_get_options_values_from_input( $only_options, array() );

			unset( $only_options, $option_id, $option );
		}

		if ( empty( $attributes['options']['choices'] ) ) {
			$attributes['options']['choices'][] = __( 'Single Choice', 'samik' );
		}

		return $attributes;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_value_from_attributes( $attributes ) {
		return $this->get_fixed_attributes( $attributes );
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_render( array $item, $input_value ) {
		$options = $item['options'];

		$value = (string) $input_value;

		// prepare choices
		{
			$choices = array();

			foreach ( $options['choices'] as $choice ) {
				$attr = array(
					'type'  => 'radio',
					'name'  => $item['shortcode'],
                    'value' => $choice['value'],
                    'checked' => $choice['checked']
				);

                $choice_item = array(
                    'attr' => $attr,
                    'options' => $choice,
                );

				$choices[] = $choice_item;
			}

			if ( $options['randomize'] ) {
				shuffle( $choices );
			}
		}

		return fw_render_view(
			$this->locate_path( '/views/view.php', dirname( __FILE__ ) . '/view.php' ),
			array(
				'item'    => $item,
				'choices' => $choices,
				'value'   => $value
			)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_validate( array $item, $input_value ) {
		$options = $item['options'];

		$messages = array(
			'required'            => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field is required', 'samik' )
			),
			'not_existing_choice' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( '{label}: Submitted data contains not existing choice', 'samik' )
			),
		);

		if ( empty( $options['choices'] ) ) {
			// the item was not displayed in frontend
			return;
		}

		if ( $options['required'] && empty( $input_value ) ) {
			return $messages['required'];
		}

		// check if has not existing choices
		if ( ! empty( $input_value ) && 1 === array_filter( $options['choices'], function ($var) use($input_value){
                return($var['value'] === $input_value);
            } ) ) {
			return $messages['not_existing_choice'];
		}

	}
}

FW_Option_Type_Builder::register_item_type( 'FW_Option_Type_Form_Builder_Item_Iconed_Radio' );
