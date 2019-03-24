<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
?>
<div class="<?php echo esc_attr(fw_ext_builder_get_item_width('form-builder', $item['width'] . '/frontend_class')) ?>">
    <div class="form-group <?php if ( $options['float-label'] ) { ?>float-label<?php } ?>">
        <?php if ( $options['float-label'] ) { ?>
            <textarea class="form-control -textarea" rows="6" <?php echo fw_attr_to_html($attr) ?>><?php echo fw_htmlspecialchars($value) ?></textarea>
            <?php if ($options['info']): ?>
                <p><em><?php echo $options['info'] ?></em></p>
            <?php endif; ?>
            <label class="form-control-placeholder" for="<?php echo esc_attr($attr['id']) ?>">
                <?php echo fw_htmlspecialchars($options['label']) ?>
                <?php if ($options['required']): ?><sup>*</sup><?php endif; ?>
            </label>
        <?php } else { ?>

            <?php if ($options['label']): ?>
                <div class="form-group_left">
                    <label for="<?php echo esc_attr($attr['id']) ?>"><?php echo fw_htmlspecialchars($options['label']) ?>
                        <?php if ($options['required']): ?><sup>*</sup><?php endif; ?>
                    </label>
                </div>
                <div class="form-group_right">
            <?php endif; ?>

                <textarea class="form-control -textarea" rows="6" <?php echo fw_attr_to_html($attr) ?>><?php echo fw_htmlspecialchars($value) ?></textarea>
                <?php if ($options['info']): ?>
                    <p><em><?php echo $options['info'] ?></em></p>
                <?php endif; ?>

            <?php if ($options['label']): ?>
                </div>
            <?php endif; ?>

        <?php } ?>
    </div>
</div>

