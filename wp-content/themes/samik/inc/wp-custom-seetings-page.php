<?php

add_action('admin_menu', 'awesome_page_create');
function awesome_page_create() {
    $page_title = 'My Awesome Admin Page';
    $menu_title = 'WP Custom Settings page';
    $capability = 'administrator';
    $menu_slug = 'wp_custom_settings_page';
    $function = 'my_awesome_page_display';
    $icon_url = 'dashicons-admin-tools';
    $position = 24;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

function my_awesome_page_display() {
    echo '<h1>My Page!!!</h1>';
}