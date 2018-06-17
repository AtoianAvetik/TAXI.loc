<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _action_theme_fw_ext_forms_include_custom_builder_items() {
    require_once dirname(__FILE__) .'/includes/builder-items/card-section/class-fw-option-type-form-builder-item-card-section.php';
    require_once dirname(__FILE__) .'/includes/builder-items/date-picker/class-fw-option-type-form-builder-item-date-picker.php';
    require_once dirname(__FILE__) .'/includes/builder-items/time-picker/class-fw-option-type-form-builder-item-time-picker.php';
    require_once dirname(__FILE__) .'/includes/builder-items/iconed-checkboxes/class-fw-option-type-form-builder-item-iconed-checkboxes.php';
    require_once dirname(__FILE__) .'/includes/builder-items/iconed-radio/class-fw-option-type-form-builder-item-iconed-radio.php';
}
add_action('fw_option_type_form_builder_init', '_action_theme_fw_ext_forms_include_custom_builder_items');