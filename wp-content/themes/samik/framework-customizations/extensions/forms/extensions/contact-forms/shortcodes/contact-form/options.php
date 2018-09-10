<?php if (!defined('FW')) die('Forbidden');

/**
 * @var FW_Extension_Shortcodes $shortcodes_extension
 */

$shortcodes_extension = fw_ext('shortcodes');

require $shortcodes_extension->get_shortcode('contact_form')->get_declared_path('/options.php');

array_unshift($options, array(
    'g' => array(
        'type' => 'group',
        'options' => array(
            'form-title' => array(
                'type' => 'text',
                'label' => __('Form title', 'samik'),
            ),
            'hidden' => array(
                'type'  => 'switch',
                'value' => 'no',
                'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                'label' => __('Hide', 'samik'),
                'desc'  => __('Hide form on site', '{domain}'),
                'left-choice' => array(
                    'value' => 'yes',
                    'label' => __('Yes', 'samik'),
                ),
                'right-choice' => array(
                    'value' => 'no',
                    'label' => __('No', 'samik'),
                ),
            )
        )
    ))
);
