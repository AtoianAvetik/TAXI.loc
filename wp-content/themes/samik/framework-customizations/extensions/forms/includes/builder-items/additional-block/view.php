<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
$items = $item["_items"];
$attr['id'] = 'rand-'. fw_unique_increment();
?>
<div class="<?php echo esc_attr(fw_ext_builder_get_item_width('form-builder', $item['width'] .'/frontend_class')) ?>">
    <div class="form-group">
        <?php if ($options['title']): ?>
        <div class="form-group_left">
            <label><?php echo fw_htmlspecialchars($options['title']) ?></label>
        </div>
        <div class="form-group_right">
            <?php endif; ?>

            <div class="form-check">
                <input class="form-check-input" <?php echo fw_attr_to_html($attr) ?> />
                <label class="form-check-label" for="<?php echo esc_attr($attr['id']) ?>"><?php echo $options['label']; ?></label>
            </div>

        <?php if ($options['title']): ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="col-12">
    <div class="<?php if (!$attr['checked']) { ?>-hidden<?php } ?>" data-show-checkbox="<?php echo esc_attr($attr['id']) ?>">
        <?php echo $items_html; ?>
    </div>
</div>
