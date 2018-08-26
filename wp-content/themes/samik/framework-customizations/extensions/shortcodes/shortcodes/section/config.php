<?php if (!defined('FW')) die('Forbidden');

$cfg = array(
	'page_builder' => array(
		'tab'         => __('Layout Elements', 'samik'),
		'title'       => __('Section', 'samik'),
		'description' => __('Add a Section', 'samik'),
		'title_template' => '{{- title }} {{- o.view_name }}',
		'type'        => 'section', // WARNING: Do not edit this
	)
);