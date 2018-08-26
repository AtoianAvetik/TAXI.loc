<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'samik'),
		'type'         => 'switch',
	),
	'view_name' => array(
        'label'        => __('Section name', 'samik'),
        'type'         => 'text',
    ),
	'custom_class' => array(
		'label'        => __('Custom class', 'samik'),
		'desc'  => __('Insert custom class for section', 'samik'),
		'type'         => 'text',
	),
    'custom_id' => array(
        'label' => __('Section ID', 'samik'),
        'desc'  => __('Insert section id', 'samik'),
        'type'  => 'text',
    ),
	'background_color' => array(
		'label' => __('Background Color', 'samik'),
		'desc'  => __('Please select the background color', 'samik'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'samik'),
		'desc'    => __('Please select the background image', 'samik'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'samik'),
		'desc'  => __('Insert Video URL to embed this video', 'samik'),
		'type'  => 'text',
	)
);
