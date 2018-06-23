<?php if (!defined('FW')) die('Forbidden');

class FW_Settings_Form_Example extends FW_Settings_Form {
    public function get_values() {
        return get_option('example_fw_settings_form', array());
    }

    public function set_values($values) {
        update_option('example_fw_settings_form', $values, false);
    }

    public function get_options() {
        return fw()->theme->get_options('example');
    }

    protected function _init() {
        add_action('admin_menu', array($this, '_action_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, '_action_admin_enqueue_scripts'));

        $this->set_is_side_tabs(true);
        $this->set_is_ajax_submit(true);
    }

    /**
     * @internal
     */
    public function _action_admin_menu() {
        if ( ! fw()->theme->locate_path('/options/example.php') ) {
            return;
        }

        add_menu_page(
            'Example FW Settings Form',
            'Example FW Settings Form',
            'manage_options',
            /** used in @see _action_admin_enqueue_scripts() */
            'example-fw-settings-form',
            array($this, 'render'),
            'dashicons-admin-tools'
        );
    }

    /**
     * @internal
     */
    public function _action_admin_enqueue_scripts() {
        $current_screen = get_current_screen(); // fw_print($current_screen);

        // enqueue only on settings page
        if ('toplevel_page_'. 'example-fw-settings-form' === $current_screen->base) {
            $this->enqueue_static();
        }
    }
}