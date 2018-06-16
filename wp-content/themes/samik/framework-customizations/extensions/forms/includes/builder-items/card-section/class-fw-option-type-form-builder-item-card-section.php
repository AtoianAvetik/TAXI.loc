<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Form_Builder_Item_Card_Section extends FW_Option_Type_Form_Builder_Item {
	public function get_type() {
		return 'card-section';
	}

	private function get_uri( $append = '' ) {
		return fw_get_template_customizations_directory_uri(
			'/extensions/forms/includes/builder-items/' .
			$this->get_type() . $append
		);
	}

	public function get_thumbnails() {
		return array(
			array(
				'html' =>
					'<div class="item-type-icon-title" data-hover-tip="' . __( 'Add Card Section', 'fw' ) . '">' .
					'<div class="item-type-icon"><img src="' . esc_attr( $this->get_uri( '/static/images/icon.png' ) ) . '" /></div>' .
					'<div class="item-type-title">' . __( 'Card Section', 'fw' ) . '</div>' .
					'</div>'
			)
		);
	}

	public function enqueue_static() {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/card-section/static');

		wp_enqueue_style(
			'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
            $uri . '/css/styles.css'
		);

		wp_enqueue_script(
			'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
            $uri . '/js/scripts.js',
			array(
				'fw-events',
			),
			false,
			true
		);

        wp_localize_script(
            'fw-builder-' . $this->get_builder_type() . '-item-' . $this->get_type(),
            'fw_form_builder_item_type_card_section',
            array(
                'l10n'     => array(
                    'item_title'      => __( 'Single Line Text', 'fw' ),
                    'label'           => __( 'Label', 'fw' ),
                    'toggle_required' => __( 'Toggle mandatory field', 'fw' ),
                    'edit'            => __( 'Edit', 'fw' ),
                    'delete'          => __( 'Delete', 'fw' ),
                    'edit_label'      => __( 'Edit Label', 'fw' ),
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
								'label' => __( 'Label', 'fw' ),
								'desc'  => __( 'Enter field label (it will be displayed on the web site)', 'fw' ),
								'value' => __( 'Single Line Text', 'fw' ),
							)
						),
						array(
							'required' => array(
								'type'  => 'switch',
								'label' => __( 'Mandatory Field', 'fw' ),
								'desc'  => __( 'Make this field mandatory?', 'fw' ),
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
							'placeholder' => array(
								'type'  => 'text',
								'label' => __( 'Placeholder', 'fw' ),
								'desc'  => __( 'This text will be used as field placeholder', 'fw' ),
							)
						),
						array(
							'default_value' => array(
								'type'  => 'text',
								'label' => __( 'Default Value', 'fw' ),
								'desc'  => __( 'This text will be used as field default value', 'fw' ),
							)
						)
					)
				)
			),
			array(
				'g3' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'constraints' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'value'   => array(
									'constraint' => 'characters',
								),
								'picker'  => array(
									'constraint' => array(
										'label'   => __( 'Restrictions', 'fw' ),
										'desc'    => __( 'Set characters or words restrictions for this field', 'fw' ),
										'type'    => 'radio',
										'inline'  => true,
										'choices' => array(
											'characters' => __( 'Characters', 'fw' ),
											'words'      => __( 'Words', 'fw' )
										),
									)
								),
								'choices' => array(
									'characters' => array(
										'min' => array(
											'type'  => 'short-text',
											'label' => __( 'Min', 'fw' ),
											'desc'  => __( 'Minim value', 'fw' ),
											'value' => 0
										),
										'max' => array(
											'type'  => 'short-text',
											'label' => __( 'Max', 'fw' ),
											'desc'  => __( 'Maxim value', 'fw' ),
											'value' => ''
										),
									),
									'words'      => array(
										'min' => array(
											'type'  => 'short-text',
											'label' => __( 'Min', 'fw' ),
											'desc'  => __( 'Minim value', 'fw' ),
											'value' => 0
										),
										'max' => array(
											'type'  => 'short-text',
											'label' => __( 'Max', 'fw' ),
											'desc'  => __( 'Maxim value', 'fw' ),
											'value' => ''
										),
									),
								),
							)
						),
					)
				)
			),
			array(
				'g4' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'info' => array(
								'type'  => 'textarea',
								'label' => __( 'Instructions for Users', 'fw' ),
								'desc'  => __( 'The users will see these instructions in the tooltip near the field',
									'fw' ),
							)
						),
					)
				)
			),
			$this->get_extra_options()
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_render( array $item, $input_value ) {
		$options = $item['options'];

		// prepare attributes
		{
			$attr = array(
				'type'        => 'text',
				'name'        => $item['shortcode'],
				'placeholder' => $options['placeholder'],
				'value'       => is_null( $input_value ) ? $options['default_value'] : $input_value,
				'id'          => 'id-' . fw_unique_increment(),
			);

			if ( $options['required'] ) {
				$attr['required'] = 'required';
			}

			if ( ! empty( $options['constraints']['constraint'] ) ) {
				$constraint      = $options['constraints']['constraint'];
				$constraint_data = $options['constraints'][ $constraint ];

				switch ( $constraint ) {
					case 'characters':
					case 'words':
						if ( $constraint_data['min'] || $constraint_data['max'] ) {
							$attr['data-constraint'] = json_encode( array(
								'type' => $constraint,
								'data' => $constraint_data
							) );
						}

						if ( $constraint == 'characters' && $constraint_data['max'] ) {
							$attr['maxlength'] = $constraint_data['max'];
						}
						break;
					default:
						trigger_error( 'Unknown constraint: ' . $constraint, E_USER_WARNING );
				}
			}
		}

		return fw_render_view(
			$this->locate_path( '/views/view.php', dirname( __FILE__ ) . '/view.php' ),
			array(
				'item' => $item,
				'attr' => $attr,
                'items_html' => $this->render_items( $item['_items'], [$input_value] )
			)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_validate( array $item, $input_value ) {
		$options = $item['options'];

		$messages = array(
			'required'                => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field is required', 'fw' )
			),
			'characters_min_singular' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d character', 'fw' )
			),
			'characters_min_plural'   => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d characters', 'fw' )
			),
			'characters_max_singular' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d character', 'fw' )
			),
			'characters_max_plural'   => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d characters', 'fw' )
			),
			'words_min_singular'      => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d word', 'fw' )
			),
			'words_min_plural'        => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain minimum %d words', 'fw' )
			),
			'words_max_singular'      => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d word', 'fw' )
			),
			'words_max_plural'        => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				__( 'The {label} field must contain maximum %d words', 'fw' )
			),
		);

		if ( $options['required'] && ! fw_strlen( trim( $input_value ) ) ) {
			return $messages['required'];
		}

		$length = fw_strlen( $input_value );

		if ( $length && ! empty( $options['constraints']['constraint'] ) ) {
			$constraint      = $options['constraints']['constraint'];
			$constraint_data = $options['constraints'][ $constraint ];

			switch ( $constraint ) {
				case 'characters':
					if ( $constraint_data['min'] && $length < $constraint_data['min'] ) {
						return sprintf( $messages[ 'characters_min_' . ( $constraint_data['min'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['min']
						);
					}
					if ( $constraint_data['max'] && $length > $constraint_data['max'] ) {
						return sprintf( $messages[ 'characters_max_' . ( $constraint_data['max'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['max']
						);
					}
					break;
				case 'words':
					$words_length = count( preg_split( '/\s+/', $input_value ) );

					if ( $constraint_data['min'] && $words_length < $constraint_data['min'] ) {
						return sprintf( $messages[ 'words_min_' . ( $constraint_data['min'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['min']
						);
					}
					if ( $constraint_data['max'] && $words_length > $constraint_data['max'] ) {
						return sprintf( $messages[ 'words_max_' . ( $constraint_data['max'] == 1 ? 'singular' : 'plural' ) ],
							$constraint_data['max']
						);
					}
					break;
				default:
					return 'Unknown constraint: ' . $constraint;
			}
		}
	}

    public function render_items( array $items, array $input_values ) {
        /**
         * @var FW_Option_Type_Form_Builder_Item[] $item_types
         */
//        $item_types = $this->get_item_types();
        $method = new ReflectionMethod('FW_Option_Type_Builder', 'get_item_types');
        $method->setAccessible(true);
        $item_types = $method->invoke(new FW_Option_Type_Form_Builder);

        $row_class  = ($row_class  = fw_ext('builder')->get_config('grid.row.class')) ? 'card_row' : 'fw-row';
        $html       = '<div class="'. esc_attr($row_class) .'"><div class="row">';
        $width      = 0;
        $counter    = 0;

        foreach ( $items as $item ) {
            if ( ! isset( $item_types[ $item['type'] ] ) ) {
                trigger_error( 'Invalid form item type: ' . $item['type'], E_USER_WARNING );
                continue;
            }

            $input_value = isset( $input_values[ $item['shortcode'] ] ) ? $input_values[ $item['shortcode'] ] : null;

            $width += $this->calculate_width( $item['width'] );

            $html .= $item_types[ $item['type'] ]->frontend_render( $item, $input_value );

            if ( $width >= 1 ) {
                $html .= '</div></div><div class="'. esc_attr($row_class) .'"><div class="row">';
                $width = 0;
            } elseif ( isset( $items[ $counter + 1 ] )
                && ( $width + $this->calculate_width( $items[ $counter + 1 ]['width'] ) > 1 )
            ) {
                $html .= '</div></div><div class="'. esc_attr($row_class) .'"><div class="row">';
                $width = 0;
            }

            $counter ++;
        }

        return $html . '</div></div>';
    }

    private function calculate_width( $width ) {

        if ( empty( $width ) ) {
            return 1;
        }

        $widths = explode( '_', $width );

        if ( empty( $widths ) ) {
            return 1;
        }

        return ( float ) ( (int) $widths[0] / (int) $widths[1] );
    }
}

FW_Option_Type_Builder::register_item_type( 'FW_Option_Type_Form_Builder_Item_Card_Section' );
