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

    $table = get_option('rates_fw_settings_form', array())['rates-table'];
    $rows = $table['rows'];
    $cols = $table['cols'];
    $content = $table['content'];

    ?>

    <div class="container">
        <div class="m-gap" data-module="tabs">
            <ul class="tabs">
                <li class="tab -active"><a class="tab_link" href="#airport" data-js="trigger">Аэропорт</a></li>
                <li class="tab"><a class="tab_link" href="#railway" data-js="trigger">Ж/Д Вокзал</a></li>
            </ul>
            <div class="tabs-content">
                <div class="tab-pane -active" id="airport">
                    <div data-module="highlightTable">
                        <table class="cool-table" data-js="table">
                            <thead>
                            <tr class="head" data-js="stickyOnScroll">
                                <?php foreach ($content as $i => $row) :
                                    if ($rows[$i]['name'] === "heading-row") {
                                        foreach ($row as $j => $cell) : ?>
                                        <th data-col="col<?php echo esc_attr($j + 1) ?>"><?php echo esc_attr($cell['textarea']) ?></th>
                                <?php endforeach; } endforeach; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($content as $i => $row) :
                                if ($rows[$i]['name'] !== "heading-row") { ?>
                                    <tr>
                                    <?php foreach ($row as $j => $cell) : ?>
                                        <td data-col="col<?php echo esc_attr($j + 1) ?>" data-value="<?php echo esc_attr($cell['textarea']) ?>"><?php echo esc_attr($cell['textarea']) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php } endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="railway"></div>
            </div>
        </div>
    </div>

    <?php

endwhile; // End of the loop.
?>

<?php
get_footer();
