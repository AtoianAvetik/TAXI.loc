<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Form_Builder_Item_Additional_Block extends FW_Option_Type_Form_Builder_Item {
	public function get_type() {
		return 'additional-block';
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
					'<div class="item-type-icon-title" data-hover-tip="' . __( 'Add an Additional Block', 'samik' ) . '">' .
					'<div class="item-type-title">' . __( 'Additional Block', 'samik' ) . '</div>' .
					'</div>'
			)
		);
	}

	public function enqueue_static() {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/additional-block/static');

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
            'fw_form_builder_item_type_additional_block',
            array(
                'l10n'     => array(
                    'item_title'      => __( 'Additional block', 'samik' ),
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
								'desc'  => __( 'Enter additional block title (it will be displayed on the web site)', 'samik' ),
								'value' => __( 'Additional block', 'samik' ),
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
                            'label' => array(
                                'type'  => 'text',
                                'label' => __( 'Title', 'samik' ),
                                'desc'  => __( 'Enter checkbox label (it will be displayed on the web site)', 'samik' ),
                                'value' => __( 'Label', 'samik' ),
                            )
                        ),
                        array(
                            'checked' => array(
                                'type'  => 'checkbox',
                                'value' => false,
                                'label' => __('Collapsed', 'samik'),
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
        $options = $item['options'];

        // prepare attr
        {
            $attr = array(
                'type'  => 'checkbox',
                'name'  => $item['shortcode'] . '[]',
                'value' => $options['label'],
                'checked' => $options['checked']
            );
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
		return;
	}

    public function render_items( array $items, array $input_values ) {
        /**
         * @var FW_Option_Type_Form_Builder_Item[] $item_types
         */
//        $item_types = $this->get_item_types();
        $method = new ReflectionMethod('FW_Option_Type_Builder', 'get_item_types');
        $method->setAccessible(true);
        $item_types = $method->invoke(new FW_Option_Type_Form_Builder);

        $row_class  = ($row_class  = fw_ext('builder')->get_config('grid.row.class')) ? 'row' : 'fw-row';
        $html       = '<div class="'. esc_attr($row_class) .'">';
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
                $html .= '</div><div class="'. esc_attr($row_class) .'">';
                $width = 0;
            } elseif ( isset( $items[ $counter + 1 ] )
                && ( $width + $this->calculate_width( $items[ $counter + 1 ]['width'] ) > 1 )
            ) {
                $html .= '</div><div class="'. esc_attr($row_class) .'">';
                $width = 0;
            }

            $counter ++;
        }

        return $html . '</div>';
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

FW_Option_Type_Builder::register_item_type( 'FW_Option_Type_Form_Builder_Item_Additional_Block' );
