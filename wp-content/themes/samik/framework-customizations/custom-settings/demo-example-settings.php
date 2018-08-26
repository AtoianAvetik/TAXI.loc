<?php if (!defined('FW')) die('Forbidden');

final class _Demo_Unyson_Settings_Page
{
    /**
     * @var FW_Form
     */
    private static $settings_form;

    public static function init()
    {
        self::$settings_form = new FW_Form('demo_settings', array(
            'render'   => array(__CLASS__, '_settings_form_render'),
            'validate' => array(__CLASS__, '_settings_form_validate'),
            'save'     => array(__CLASS__, '_settings_form_save'),
        ));

        add_action('admin_menu', array(__CLASS__, '_action_admin_menu'));
    }

    private static function get_settings_options()
    {
        /**
         * fixme: load options from a file
         * For e.g. fw()->theme->get_options('demo-settings')
         * will try to read '{theme}/framework-customizations/theme/options/demo-settings.php'
         */
        return fw()->theme->get_options('demo-settings');
    }

    public static function _action_admin_menu()
    {
        add_menu_page(
            __( 'Demo Settings', 'samik' ),
            __( 'Demo Settings', 'samik' ),
            'manage_options',
            'demo-settings',
            array(__CLASS__, '_print_settings_page')
        );
    }

    public static function _print_settings_page()
    {
        echo '<div class="wrap">';

        echo '<h2>' . __('Demo Settings', 'samik') . '</h2><br/>';

        self::$settings_form->render();

        echo '</div>';
    }

    public static function _settings_form_render($data)
    {
        $options = self::get_settings_options();

        if (empty($options)) {
            return $data;
        }

        if ($values = FW_Request::POST(FW_Option_Type::get_default_name_prefix())) {
            // This is form submit, extract correct values from $_POST values
            $values = fw_get_options_values_from_input($options, $values);
        } else {
            // Extract previously saved correct values
            $values = FW_WP_Option::get('demo_settings_options');
        }

        $data['attr']['class'] = 'demo-settings-form';

        $data['submit']['html'] = fw_html_tag('input', array(
            'type' => 'submit',
            'name' => 'demo_settings_save',
            'value' => __('Save', 'samik'),
            'class' => 'button-primary button-large',
        ));

        echo fw()->backend->render_options($options, $values);

        return $data;
    }

    public static function _settings_form_validate($errors)
    {
        if (!current_user_can('manage_options')) {
            $errors['_no_permission'] = __('You have no permissions to change settings options', 'samik');;
        }

        return $errors;
    }

    public static function _settings_form_save($data)
    {
        FW_WP_Option::set(
            'demo_settings_options',
            null,
            fw_get_options_values_from_input(self::get_settings_options())
        );

        FW_Flash_Messages::add(
            'demo_settings_form_save',
            __('The options were successfully saved', 'samik'),
            'success'
        );

        // redirect to the same page to prevent form re-submit on page refresh
        $data['redirect'] = fw_current_url();

        return $data;
    }
}
add_action('fw_init', array('_Demo_Unyson_Settings_Page', 'init'));