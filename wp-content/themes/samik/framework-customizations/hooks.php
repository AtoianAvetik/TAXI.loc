<?php

include_once dirname(__FILE__) . '/custom-settings/demo-example-settings.php';
//
//function _action_theme_example_fw_settings_form() {
//    if (class_exists('FW_Settings_Form')) {
//        require_once dirname(__FILE__) . '/custom-settings/class-fw-settings-form-example.php';
//        new FW_Settings_Form_Example('example');
//    }
//}
//add_action('fw_init', '_action_theme_example_fw_settings_form');

function _action_theme_rates_fw_settings_form() {
    if (class_exists('FW_Settings_Form')) {
        require_once dirname(__FILE__) . '/custom-settings/class-fw-settings-form-rates.php';
        new FW_Settings_Form_Rates('rates');
    }
}
add_action('fw_init', '_action_theme_rates_fw_settings_form');

function _action_theme_cities_list_fw_settings_form() {
    if (class_exists('FW_Settings_Form')) {
        require_once dirname(__FILE__) . '/custom-settings/class-fw-settings-form-cities-list.php';
        new FW_Settings_Form_Cities_List('cities-list');
    }
}
add_action('fw_init', '_action_theme_cities_list_fw_settings_form');

function _action_theme_forms_fw_settings_form() {
    if (class_exists('FW_Settings_Form')) {
        require_once dirname(__FILE__) . '/custom-settings/class-fw-settings-form-forms.php';
        new FW_Settings_Form_Forms('forms');
    }
}
add_action('fw_init', '_action_theme_forms_fw_settings_form');

function _action_theme_autopark_fw_settings_form() {
    if (class_exists('FW_Settings_Form')) {
        require_once dirname(__FILE__) . '/custom-settings/class-fw-settings-form-autopark.php';
        new FW_Settings_Form_Autopark('autopark');
    }
}
add_action('fw_init', '_action_theme_autopark_fw_settings_form');



/** @internal */
function _action_theme_include_custom_option_types() {
    require_once dirname(__FILE__) . '/includes/option-types/custom-table/class-fw-option-type-custom-table.php';
}
add_action('fw_option_types_init', '_action_theme_include_custom_option_types');