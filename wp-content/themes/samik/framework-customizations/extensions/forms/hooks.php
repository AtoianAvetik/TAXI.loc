<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _action_theme_fw_ext_forms_include_custom_builder_items() {
    require_once dirname(__FILE__) .'/includes/builder-items/yes-no/class-fw-option-type-form-builder-item-yes-no.php';
    require_once dirname(__FILE__) .'/includes/builder-items/card-section/class-fw-option-type-form-builder-item-card-section.php';
//    require_once dirname(__FILE__) .'/includes/builder-items/whence-section/class-fw-option-type-form-builder-item-whence-section.php';
}
add_action('fw_option_type_form_builder_init', '_action_theme_fw_ext_forms_include_custom_builder_items');