<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
?>
<div class="<?php echo esc_attr(fw_ext_builder_get_item_width('form-builder', $item['width'] .'/frontend_class')) ?>">
    <div class="form-group">
        <div class="form-group_left">
            <?php if ($options['label']): ?>
            <label for="<?php echo esc_attr($attr['id']) ?>"><?php echo fw_htmlspecialchars($options['label']) ?>
                <?php if ($options['required']): ?><sup>*</sup><?php endif; ?>
            </label>
            <?php endif; ?>
        </div>
        <div class="form-group_right">
            <input class="form-control -wide" <?php echo fw_attr_to_html($attr) ?>>
            <?php if ($options['info']): ?>
                <p><em><?php echo $options['info'] ?></em></p>
            <?php endif; ?>
        </div>
    </div>
</div>
