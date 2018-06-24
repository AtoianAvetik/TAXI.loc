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

    $data = get_option('rates_fw_settings_form');
    $options = fw()->theme->get_options('rates');

    ?>

    <div class="container">
        <div class="m-gap" data-module="tabs">
            <ul class="tabs">
                <?php $i = 0; ?>
                <?php foreach ($options as $tab_key => $tab) :
                    $id = null;
                    $table = null;
                    foreach ($options[$tab_key]['options'] as $key => $option) :
                        if ( $option['type'] === 'custom-table' ) {
                            $id = $key;
                            $table = $data[$key];
                        }
                    endforeach;
                    if ( $table ): ?>
                    <li class="tab <?php if ( $i === 0 ) { ?>-active<?php } ?>"><a class="tab_link" href="#highlight-<?php echo $id?>" data-js="trigger"><?php echo $tab['title']?></a></li>
                <?php endif;$i ++;endforeach; ?>
            </ul>
            <div class="tabs-content">
                <?php $i = 0; ?>
                <?php foreach ($options as $tab_key => $tab) :
                    $id = null;
                    $table = null;
                    $rows = null;
                    $cols = null;
                    $content = null;
                    foreach ($options[$tab_key]['options'] as $key => $option) :
                        if ( $option['type'] === 'custom-table' ) {
                            $id = $key;
                            $table = $data[$key];
                            $rows = $table['rows'];
                            $cols = $table['cols'];
                            $content = $table['content'];
                        }
                    endforeach;
                    if ( $table ): ?>
                    <div class="tab-pane <?php if ( $i === 0 ) { ?>-active<?php } ?>" id="highlight-<?php echo $id; ?>">
                        <div data-module="highlightTable">
                            <table class="cool-table" data-js="table">
                                <thead>
                                <tr class="head" data-js="stickyOnScroll">
                                    <?php foreach ($content as $k => $row) :
                                        if ($rows[$k]['name'] === "heading-row") {
                                            foreach ($row as $j => $cell) : ?>
                                            <th data-col="col<?php echo esc_attr($j + 1) ?>"><?php echo esc_attr($cell['textarea']) ?></th>
                                    <?php endforeach; } endforeach; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($content as $k => $row) :
                                    if ($rows[$k]['name'] !== "heading-row") { ?>
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
                <?php endif;$i ++;endforeach; ?>
            </div>
        </div>
    </div>

    <?php

endwhile; // End of the loop.
?>

<?php
get_footer();
