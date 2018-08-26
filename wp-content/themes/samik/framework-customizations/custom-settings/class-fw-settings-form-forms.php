<?php if (!defined('FW')) die('Forbidden');

class FW_Settings_Form_Forms extends FW_Settings_Form {
    public function get_values() {
        return get_option('forms_fw_settings_form', array());
    }

    public function set_values($values) {
        update_option('forms_fw_settings_form', $values, false);
    }

    public function get_options() {
//        $shortcode_instance = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' );
//        return $shortcode_instance->get_options();
        return fw()->theme->get_options('forms');
    }

    protected function _init() {
        add_action('admin_menu', array($this, '_action_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, '_action_admin_enqueue_scripts'));

        $title_value = __('Forms', 'samik');

        $this->set_is_side_tabs(true);
        $this->set_is_ajax_submit(true);
        $this->set_string( 'title', $title_value );
    }

    /**
     * @internal
     */
    public function _action_admin_menu() {
        if ( ! fw()->theme->locate_path('/options/forms.php') ) {
            return;
        }

        add_menu_page(
            __('Forms', 'samik'),
            __('Forms', 'samik'),
            'manage_options',
            /** used in @see _action_admin_enqueue_scripts() */
            'forms',
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
        if ('toplevel_page_'. 'forms' === $current_screen->base) {
            $this->enqueue_static();
        }
    }
}