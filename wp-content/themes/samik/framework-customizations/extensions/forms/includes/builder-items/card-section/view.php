<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
$items = $item["_items"];
?>
<div class="col-12">
    <section <?php if ($options['accordion']): ?>class="accordion" data-module="accordion"<?php endif; ?>>
        <div class="form-card <?php if ($options['accordion']): ?>accordion_item -active" data-js="item<?php endif; ?>">
            <div class="form-card_header <?php echo $options['header-border-color']?> <?php if ($options['accordion']): ?>accordion_link" data-js="trigger<?php endif; ?>">
                <div class="form-card_title"><?php echo $options['title']?></div>
            </div>
            <div class="form-card_content" <?php if ($options['accordion']): ?>data-js="content"<?php endif; ?>>
                <?php echo $items_html; ?>
            </div>
        </div>
    </section>
</div>
