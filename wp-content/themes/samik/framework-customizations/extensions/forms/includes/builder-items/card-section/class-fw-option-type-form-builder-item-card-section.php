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
					'<div class="item-type-icon-title" data-hover-tip="' . __( 'Add an Section', 'samik' ) . '">' .
					'<div class="item-type-title">' . __( 'Section', 'samik' ) . '</div>' .
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
                    'item_title'      => __( 'Section', 'samik' ),
                    'title'           => __( 'Title', 'samik' ),
                    'edit'            => __( 'Edit', 'samik' ),
                    'delete'          => __( 'Delete', 'samik' ),
                    'edit_title'      => __( 'Edit Label', 'samik' ),
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
							'title' => array(
								'type'  => 'text',
								'label' => __( 'Title', 'samik' ),
								'desc'  => __( 'Enter section title (it will be displayed on the web site)', 'samik' ),
								'value' => __( 'Section', 'samik' ),
							)
						)
					)
				)
			),
			array(
				'g2' => array(
					'type'    => 'group',
					'options' => array(
						array(
							'accordion' => array(
                                'type'  => 'checkbox',
                                'value' => false, // checked/unchecked
                                'label' => __('Accordion', 'samik'),
                                'help'  => __('Accordion', 'samik'),
                            )
						),
                        array(
                            'header-border-color' => array(
                                'type'  => 'select',
                                'value' => '-default',
                                'label' => __('Title border color', 'samik'),
                                'help'  => __('Title border color', 'samik'),
                                'choices' => array(
                                    '-primary' => array(
                                        'text' => __('Main', 'samik'),
                                    ),
                                    '-default' => array(
                                        'text' => __('Default', 'samik'),
                                    ),
                                ),
                                /**
                                 * Allow save not existing choices
                                 * Useful when you use the select to populate it dynamically from js
                                 */
                                'no-validate' => false,
                            )
                        )
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
		return fw_render_view(
			$this->locate_path( '/views/view.php', dirname( __FILE__ ) . '/view.php' ),
			array(
				'item' => $item,
                'items_html' => $this->render_items( $item['_items'], [$input_value] )
			)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function frontend_validate( array $item, $input_value ) {
		return true;
	}

    public function render_items( array $items, array $input_values ) {
        /**
         * @var FW_Option_Type_Form_Builder_Item[] $item_types
         */
//        $item_types = $this->get_item_types();
        $method = new ReflectionMethod('FW_Option_Type_Builder', 'get_item_types');
        $method->setAccessible(true);
        $item_types = $method->invoke(new FW_Option_Type_Form_Builder);

        $row_class  = ($row_class  = fw_ext('builder')->get_config('grid.row.class')) ? 'form-card_row' : 'fw-row';
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
