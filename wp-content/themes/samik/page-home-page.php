<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package samik
 */

get_header(); ?>

    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'home' );

        echo do_shortcode( fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->render(get_option('order_form_fw_settings_form') ) );

    endwhile; // End of the loop.
    ?>

<?php
get_footer();
