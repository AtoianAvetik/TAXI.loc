<?php if (!defined('FW')) die('Forbidden');
// file: {theme}/inc/static.php
// https://github.com/ThemeFuse/Theme-Includes

function fw_scripts() {
    wp_enqueue_script(
        'fw-form-helpers',
        fw_get_framework_directory_uri('/static/js/fw-form-helpers.js')
    );
    wp_localize_script('fw-form-helpers', 'fwAjaxUrl', admin_url('admin-ajax.php', 'relative'));
}

if (!is_admin()) {
    add_action( 'wp_enqueue_scripts', 'fw_scripts' );
}

