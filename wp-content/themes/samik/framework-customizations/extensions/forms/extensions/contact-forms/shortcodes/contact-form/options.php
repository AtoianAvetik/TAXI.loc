<?php if (!defined('FW')) die('Forbidden');

/**
 * @var FW_Extension_Shortcodes $shortcodes_extension
 */
$shortcodes_extension = fw_ext('shortcodes');

require $shortcodes_extension->get_shortcode('contact_form')->get_declared_path('/options.php');

$options[] = array(
    'form-title' => array(
        'type' => 'text',
        'label' => __('Form title', 'samik'),
    ),
);