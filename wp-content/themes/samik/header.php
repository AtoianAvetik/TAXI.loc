<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package samik
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=0">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="wrapper">
	<header class="header" data-module="header">
        <div class="navbar-wrap">
            <div class="navbar navbar_full-width" data-js="navbar">
                <div class="container">
                    <div class="row -around no-gutters navbar-inner">
                        <div class="navbar_block navbar_panel">
                            <div class="logo logo-container"><a class="logo_link" href="/"><img src="<?php echo fw_get_db_settings_option('logo')['url']; ?>" alt=""></a>
                                <div class="logo-text"><span class="logo-label"><?php echo get_bloginfo('name');?></span><span class="logo-sub-label"><?php echo get_bloginfo('description');?></span></div>
                            </div>
                            <button class="menu-btn btn-pure"><span class="hamburger"><span class="hamburger_box"><span class="hamburger_inner"></span></span></span>
                            </button>
                        </div>
                        <div class="navbar_block navbar_contact-box-wrap">
                            <div class="contact-box"><i class="icon thin-icon-phone-call"></i>
                                <dl>
                                    <dt>Позвоните Нам:</dt>
                                    <dd></dd><a href="callto:#">+7(978) xxx xx xx</a>
                                </dl>
                            </div>
                        </div>
                        <div class="navbar_block navbar_nav-wrap">
                            <nav class="navbar-nav menu" data-module="menu">
                                <ul class="menu-list">
                                    <?php
                                        $pageId = get_the_ID();
                                        $items = wp_get_nav_menu_items( 'menu-1' );
                                        foreach($items as $menuItem){
                                    ?>
                                    <li class="menu-item">
                                        <a class="menu-item_link<?php if($pageId == $menuItem->object_id){?> -active<?php } ?>" href="<?php echo $menuItem->url; ?>">
                                        <?php echo $menuItem->title; ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar_is-sticky navbar_full-width" data-js="navbarSticky">
                <div class="container">
                    <div class="row -around no-gutters navbar-inner">
                        <div class="navbar_block navbar_panel">
                            <div class="logo logo-container"><a class="logo_link" href="/"><img src="<?php echo fw_get_db_settings_option('logo')['url']; ?>" alt=""></a>
                                <div class="logo-text"><span class="logo-label"><?php echo get_bloginfo('name');?></span><span class="logo-sub-label"><?php echo get_bloginfo('description');?></span></div>
                            </div>
                        </div>
                        <div class="navbar_block navbar_contact-box-wrap">
                            <div class="contact-box"><i class="icon icon-phone-call"></i>
                                <dl>
                                    <dt>Позвоните Нам:</dt>
                                    <dd></dd><a href="callto:#">+7(978) xxx xx xx</a>
                                </dl>
                            </div>
                        </div>
                        <div class="navbar_block navbar_nav-wrap">
                            <nav class="navbar-nav menu">
                                <ul class="menu-list">
                                    <?php
                                        $pageId = get_the_ID();
                                        $items = wp_get_nav_menu_items( 'menu-1' );
                                        foreach($items as $menuItem){
                                    ?>
                                    <li class="menu-item">
                                        <a class="menu-item_link<?php if($pageId == $menuItem->object_id){?> -active<?php } ?>" href="<?php echo $menuItem->url; ?>">
                                        <?php echo $menuItem->title; ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="content">

