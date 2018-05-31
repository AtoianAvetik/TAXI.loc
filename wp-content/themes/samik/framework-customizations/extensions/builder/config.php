<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

/**
 * Default item widths for all builders
 *
 * It is better to use fw_ext_builder_get_item_width() function to retrieve the item widths
 * because it has a filter and users will be able to customize the widths for a specific builder
 *
 * @see fw_ext_builder_get_item_width()
 * @since 1.2.0
 *
 * old $cfg['default_item_widths'] https://github.com/ThemeFuse/Unyson-Builder-Extension/issues/8
 * https://github.com/ThemeFuse/Unyson-Builder-Extension/blob/v1.1.17/config.php#L13
 */
$cfg['grid.columns'] = array(
	'1_6' => array(
		'title'          => '1/6',
		'backend_class'  => 'fw-col-sm-2',
		'frontend_class' => 'col-2 col-md-6 col-xs-12',
	),
	'1_4' => array(
		'title'          => '1/4',
		'backend_class'  => 'fw-col-sm-3',
		'frontend_class' => 'col-3 col-md-6 col-xs-12',
	),
	'1_3' => array(
		'title'          => '1/3',
		'backend_class'  => 'fw-col-sm-4',
		'frontend_class' => 'col-4 col-md-6 col-xs-12',
	),
	'1_2' => array(
		'title'          => '1/2',
		'backend_class'  => 'fw-col-sm-6',
		'frontend_class' => 'col-6 col-md-12',
	),
	'2_3' => array(
		'title'          => '2/3',
		'backend_class'  => 'fw-col-sm-8',
		'frontend_class' => 'col-8 col-md-12',
	),
	'3_4' => array(
		'title'          => '3/4',
		'backend_class'  => 'fw-col-sm-9',
		'frontend_class' => 'col-9 col-md-12',
	),
	'1_1' => array(
		'title'          => '1/1',
		'backend_class'  => 'fw-col-sm-12',
		'frontend_class' => 'col-12',
	),
);

/**
 * @since 1.2.0
 */
$cfg['grid.row.class'] = 'row';

/**
 * @deprecated since 1.2.0
 * if this is empty fw_ext_builder_get_item_width() will use $cfg['grid.columns']
 */
$cfg['default_item_widths'] = false;
