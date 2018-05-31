<?php if (!defined('FW')) die('Forbidden');

$cfg = array(
	'page_builder' => array(
		'tab'         => __('Layout Elements', 'fw'),
		'title'       => __('Section', 'fw'),
		'description' => __('Add a Section', 'fw'),
		'title_template' => '{{- title }} {{- o.view_name }}',
		'type'        => 'section', // WARNING: Do not edit this
	)
);