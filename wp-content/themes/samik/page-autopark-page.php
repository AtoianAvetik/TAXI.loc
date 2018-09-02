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
while (have_posts()) : the_post();
    get_template_part( 'template-parts/content', 'autopark' );

    $data = get_option('autopark_fw_settings_form');
    ?>

    <div class="container m-gap">
        <div class="filter-block" data-module="filterBlock">
            <div class="filter-block_panel box">
                <div class="filter-btn -active" data-filter="all">Все</div>
                <?php foreach ($data as $cat_key => $cat) : ?>
                    <div class="filter-btn" data-filter="<?php echo $cat_key ?>"><?php echo $cat['title']?></div>
                <?php endforeach; ?>
            </div>
            <div class="filter-block_content">
                <ul class="grid-3 filtr-container">
                    <?php foreach ($data as $cat_key => $cat) :
                          foreach ($cat['cars'] as $index => $car) : ?>
                        <li class="cell filtr-item" data-category="<?php echo $cat_key ?>">
                            <div class="card -frame">
                                <a class="card_image -bg" href="/" style="background-image: url(<?php echo $car['gallery'][0]['url']?>)" data-modal="modal-<?php echo $car['id'] ?>"></a>
                                <div class="card_title"><?php echo $car['name']?></div>
                            </div>
                        </li>
                    <?php endforeach;endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <?php

endwhile; // End of the loop.
?>

<?php
get_footer();
