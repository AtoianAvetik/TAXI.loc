<?php if (!defined('FW')) die('Forbidden');

class FW_Settings_Form_Order_Form extends FW_Settings_Form {
    public function get_values() {
        return get_option('order_form_fw_settings_form', array());
    }

    public function set_values($values) {
        update_option('order_form_fw_settings_form', $values, false);
    }

    public function get_options() {
        $shortcode_instance = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' );
        return $shortcode_instance->get_options();
    }

    protected function _init() {
        add_action('admin_menu', array($this, '_action_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, '_action_admin_enqueue_scripts'));

//        $this->set_is_side_tabs(true);
        $this->set_is_ajax_submit(true);
        $this->set_string( 'title', __('Order Form', 'fw') );
    }

    /**
     * @internal
     */
    public function _action_admin_menu() {
        add_menu_page(
            'Order Form',
            'Order Form',
            'manage_options',
            /** used in @see _action_admin_enqueue_scripts() */
            'order-form',
            array($this, 'render'),
            'dashicons-editor-table'
        );
    }

    /**
     * @internal
     */
    public function _action_admin_enqueue_scripts() {
        $current_screen = get_current_screen(); // fw_print($current_screen);

        // enqueue only on settings page
        if ('toplevel_page_'. 'order-form' === $current_screen->base) {
            $this->enqueue_static();
        }
    }
}