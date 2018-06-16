<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
$items = $item["_items"];
?>
<div class="col-12">
    <div class="card -form">
        <div class="card_header -primary">
            <div class="card_title"><?php echo $options['title']?></div>
        </div>
        <div class="card_content card_pd">
            <?php echo $items_html; ?>
        </div>
    </div>
</div>
