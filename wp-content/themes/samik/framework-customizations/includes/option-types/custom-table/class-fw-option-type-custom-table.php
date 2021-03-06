<?php if (!defined('FW')) {
    die('Forbidden');
}

class FW_Option_Type_Custom_Table extends FW_Option_Type
{
    public function get_type()
    {
        return 'custom-table';
    }

    /**
     * @internal
     */
    protected function _enqueue_static($id, $option, $data)
    {
        $static_uri = fw_get_template_customizations_directory_uri('/includes/option-types/'. $this->get_type() .'/static/');

        wp_enqueue_style( 'font-awesome' );

        wp_enqueue_style(
            'fw-option-' . $this->get_type() . '-default',
            $static_uri . 'css/default-styles.css',
            array(),
            fw()->theme->manifest->get_version()
        );
        wp_enqueue_style(
            'fw-option-' . $this->get_type() . '-extended',
            $static_uri . 'css/extended-styles.css',
            array(),
            fw()->theme->manifest->get_version()
        );
        wp_enqueue_script(
            'fw-option-' . $this->get_type(),
            $static_uri . 'js/scripts.js',
            array( 'jquery', 'fw-events', 'jquery-ui-sortable' ),
            fw()->theme->manifest->get_version(),
            true
        );

        wp_localize_script(
            'fw-option-' . $this->get_type(),
            'localizeTableBuilder',
            array(
                'msgEdit' => __( 'Edit', 'samik' ),
                'maxCols' => apply_filters( 'fw_ext_shortcodes_custom_table_max_columns', 6 )
            )
        );

        fw()->backend->option_type( 'popup' )->enqueue_static();
        fw()->backend->option_type( 'textarea-cell' )->enqueue_static();
    }

    /**
     * @internal
     */
    protected function _render($id, $option, $data)
    {
        if ( ! isset( $data['value'] ) || empty( $data['value'] ) ) {
            $data['value'] = $option['value'];
        }

        $this->replace_with_defaults( $option );

        $view_path = fw_get_template_customizations_directory('/includes/option-types/'. $this->get_type() .'/views/view.php');

        return fw_render_view($view_path, array(
            'id'     => $option['attr']['id'],
            'option' => $option,
            'data'   => $data,
        ) );
    }

    protected function replace_with_defaults( &$option ) {
        $defaults                                           = $this->_get_defaults();
        $option['header_options']                           = $defaults['header_options'];
        $option['row_options']                              = $defaults['row_options'];
        $option['columns_options']                          = $defaults['columns_options'];
        $option['content_options']                          = $defaults['content_options'];
        $option['row_options']['name']['attr']['class']     = isset( $option['row_options']['name']['attr']['class'] ) ? $option['row_options']['name']['attr']['class'] . ' fw-custom-table-builder-row-style' : 'fw-custom-table-builder-row-style';
        $option['columns_options']['name']['attr']['class'] = isset( $option['columns_options']['name']['attr']['class'] ) ? $option['columns_options']['name']['attr']['class'] . ' fw-custom-table-builder-col-style' : 'fw-custom-table-builder-col-style';
    }

    /**
     * @internal
     */
    protected function _get_value_from_input( $option, $input_value ) {
        if ( ! is_array( $input_value ) ) {
            /**
             * Execute get_value_from_input() on custom options
             * because there may be `unique` option type that it must be updated
             */
            foreach (array('button-row') as $row_type) {
                if (empty($option['content_options'][$row_type])) {
                    continue;
                }

                $only_options = fw_extract_only_options($option['content_options'][$row_type]);

                foreach ($option['value']['rows'] as $i => $row) {
                    if ($row['name'] !== $row_type || empty($option['value']['content'][$i])) {
                        continue;
                    }

                    foreach ($option['value']['content'][$i] as &$row_values) {
                        /**
                         * Move values in each $option['value'] because these values are in db format
                         * not $inpute_value (html) format
                         */
                        foreach ($only_options as $o_id => $o_o) {
                            if (isset($row_values[$o_id])) {
                                $only_options[$o_id]['value'] = $row_values[$o_id];
                            } else {
                                unset($only_options[$o_id]['value']);
                            }
                        }

                        $row_values = fw_get_options_values_from_input($only_options, array());
                    }
                }
            }

            return $option['value'];
        }

        if ( ! isset( $input_value['content'] ) || empty( $input_value['content'] ) ) {
            $input_value['content'] = $option['value']['content'];
        }

        if ( ! isset( $input_value['rows'] ) || empty( $input_value['rows'] ) ) {
            $input_value['rows'] = $option['value']['rows'];
        }

        if ( ! isset( $input_value['cols'] ) || empty( $input_value['cols'] ) ) {
            $input_value['cols'] = $option['value']['cols'];
        }

        if ( isset( $input_value['content']['_template_key_row_'] ) ) {
            unset( $input_value['content']['_template_key_row_'] );
        }

        if ( isset( $input_value['rows']['_template_key_row_'] ) ) {
            unset( $input_value['rows']['_template_key_row_'] );
        }

        $value = array();

        if ( is_array( $input_value ) ) {
            if ( isset( $input_value['rows'] ) ) {
                $i = 0;
                foreach ($input_value['rows'] as $input_val) {
                    $value['rows'][$i] = $input_val;
                    $i++;
                }
            }

            if ( isset( $input_value['cols'] ) && is_array($input_value['cols']) ) {
                $value['cols'] =  $input_value['cols'] ;
            }

            if ( isset( $input_value['header_options'] ) and is_array( $input_value['header_options'] ) ) {
                $value['header_options'] = $input_value['header_options'];
            }

            if ( isset( $input_value['content'] ) && is_array( $input_value['content'] ) ) {
                $row_count = 0;
                foreach ( $input_value['content'] as $row => $input_value_rows_data ) {
                    $cols = array();

                    foreach ( $input_value_rows_data as $column => $input_value_cols_data ) {
                        $row_name = $input_value['rows'][ $row ]['name'];

                        foreach ( $option['content_options'][ $row_name ] as $id => $options ) {
                            if ( $value['cols'][$column]['name'] == 'desc-col' ) {
                                $cols[ $column ][ 'textarea' ]
                                    = fw()->backend->option_type( 'textarea-cell' )->get_value_from_input(
                                    $options,
                                    $input_value_cols_data[ 'default-row' ][ 'textarea-' . $row . '-' . $column ]
                                );
                                continue;
                            }
                            $cols[ $column ][ $id ]
                                = fw()->backend->option_type( $options['type'] )->get_value_from_input(
                                $options,
                                $input_value_cols_data[ $row_name ][ $id . '-' . $row . '-' . $column ]
                            );
                        }

                    }
                    $value['content'][ $row_count++ ] = $cols;
                }
            }
        }

        return $value;
    }

    /**
     * @internal
     */
    protected function _get_defaults() {
        return apply_filters( 'fw_option_type_custom_table_defaults', array(
            'header_options'  => array(
                'table_purpose' => array(
                    'type'    => 'select',
                    'label'   => __( 'Table Styling', 'samik' ),
                    'desc'    => __( 'Choose the table styling options', 'samik' ),
                    'choices' => array(
                        'pricing' => __( 'Use the table as a pricing table', 'samik' ),
                        'tabular' => __( 'Use the table to display tabular data', 'samik' ),
                    ),
                    'value'   => 'pricing',
                    'attr'    => array(
                        'data-allowed-rows' => json_encode( array(
                                'pricing' => 'default-row heading-row pricing-row button-row switch-row',
                                'tabular' => 'default-row heading-row'
                            )
                        ),
                        'data-allowed-cols' => json_encode( array(
                            'pricing' => 'default-col highlight-col desc-col',
                            'tabular' => 'default-col desc-col'
                        ) ),
                    )
                ),
            ),
            'row_options'     => array(
                'name' => array(
                    'type'    => 'select',
                    'label'   => false,
                    'desc'    => false,
                    'choices' => array(
                        'default-row' => __( 'Default row', 'samik' ),
                        'heading-row' => __( 'Heading row', 'samik' ),
                        'pricing-row' => __( 'Pricing row', 'samik' ),
                        'button-row'  => __( 'Button row', 'samik' ),
                        'switch-row'  => __( 'Row switch', 'samik' )
                    ),
                )
            ),
            'columns_options' => array(
                'name' => array(
                    'type'    => 'select',
                    'label'   => false,
                    'desc'    => false,
                    'choices' => array(
                        'default-col'   => __( 'Default column', 'samik' ),
                        'desc-col'      => __( 'Description column', 'samik' ),
                        'highlight-col' => __( 'Highlight column', 'samik' ),
                        'center-col'    => __( 'Center text column', 'samik' )
                    ),
                )
            ),
            'content_options' => array(
                'default-row' => array(
                    'textarea' => array(
                        'type'  => 'textarea-cell',
                        'label' => false,
                        'desc'  => false,
                        'value' => '',
                    )
                ),
                'heading-row' => array(
                    'textarea' => array(
                        'type'  => 'textarea-cell',
                        'label' => false,
                        'desc'  => false,
                        'value' => '',
                    )
                ),
                'pricing-row' => array(
                    'amount'      => array(
                        'type'         => 'text',
                        'label'        => false,
                        'desc'         => false,
                        'value'        => '',
                        'wrapper_attr' => array(
                            'class' => 'fw-col-sm-6'
                        )
                    ),
                    'description' => array(
                        'type'         => 'text',
                        'label'        => false,
                        'desc'         => false,
                        'value'        => '',
                        'attr'         => array(
                            'placeholder' => __( 'per month', 'samik' )
                        ),
                        'wrapper_attr' => array(
                            'class' => 'fw-col-sm-6'
                        )
                    ),
                ),
                'button-row'  => array(
                    'button' => ( $button = $this->get_button_shortcode() )
                        ? array(
                            'type'          => 'popup',
                            'popup-title'   => __( 'Button', 'samik' ),
                            'button'        => __( 'Add', 'samik' ),
                            'popup-options' => $button->get_options()
                        )
                        : array(
                            'type' => 'multi',
                            'label' => false,
                        )
                ),
                'switch-row'  => array(
                    'switch' => array(
                        'label'        => false,
                        'type'         => 'switch',
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'samik' )
                        ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'samik' )
                        ),
                        'value'        => 'no',
                        'desc'         => false,
                    )
                )

            ),
            'value'           => array(
                'header_options' => array(
                    'table_purpose' => 'pricing',
                ),
                'cols'           => array(
                    array( 'name' => 'default-col' ),
                    array( 'name' => 'default-col' ),
                    array( 'name' => 'default-col' )
                ),
                'rows'           => array(
                    array( 'name' => 'default-row' ),
                    array( 'name' => 'default-row' ),
                    array( 'name' => 'default-row' )
                ),
                'content'        => $this->_fw_generate_default_values()
            )
        ) );
    }

    private function _fw_generate_default_values( $cols = 3, $rows = 3 ) {
        $result = array();
        for ( $i = 0; $i < $rows; $i ++ ) {
            for ( $j = 0; $j < $cols; $j ++ ) {
                $result[ $i ][ $j ] = array(
                    'textarea' => '',
                    'amount' => '',
                    'description' => '',
                    'switch' => 'no',
                    'button' => '',
                );
            }
        }

        return $result;
    }


    /**
     * @internal
     */
    public function _get_backend_width_type() {
        return 'full';
    }

    /**
     * @return string
     * @since 1.3.22
     */
    public function get_button_shortcode_tag() {
        try {
            return FW_Cache::get($cache_key = 'fw:ext:shortcodes:table:button-shortcode-name');
        } catch (FW_Cache_Not_Found_Exception $e) {
            FW_Cache::set(
                $cache_key,
                /**
                 * If you disable default shortcode 'button' and create your own shortcode use this filter to specify its name.
                 * Fixes https://github.com/ThemeFuse/Unyson/issues/2056
                 */
                $shortcode_name = apply_filters('fw:ext:shortcodes:table:button-shortcode-name', 'button')
            );

            return $shortcode_name;
        }
    }

    /**
     * @return FW_Shortcode|null
     * @since 1.3.22
     */
    public function get_button_shortcode() {
        /** @var FW_Extension_Shortcodes $shortcodes */
        $shortcodes = fw_ext('shortcodes');

        return $shortcodes->get_shortcode($this->get_button_shortcode_tag());
    }

}

FW_Option_Type::register('FW_Option_Type_Custom_Table');