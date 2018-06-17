<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $choices
 * @var array $value
 */

$options = $item['options'];

switch ($options['layout']) {
	case 'one-column': $columns = 1; break;
	case 'two-columns': $columns = 2; break;
	case 'three-columns': $columns = 3; break;
	default: $columns = 0;
}
?>
<?php if (empty($choices)): ?>
	<!-- radio not displayed: no choices -->
<?php else: ?>
	<div class="<?php echo esc_attr(fw_ext_builder_get_item_width('form-builder', $item['width'] .'/frontend_class')) ?>">
        <div class="form-group">
			<?php if ($options['label']): ?>
                <div class="form-group_left">
                    <label><?php echo fw_htmlspecialchars($options['label']) ?>
                        <?php if ($options['required']): ?><sup>*</sup><?php endif; ?>
                    </label>
                </div>
                <div class="form-group_right">
			<?php endif; ?>

                <div class="field-columns-<?php echo esc_attr($columns); ?>">
                    <?php if ($columns > 1): ?>
                        <?php
                        $choices_count = count($choices);
                        $choices_per_column = abs($choices_count / $columns)
                                              + (($choices_count % $columns > $columns / 2) ? 1 : 0);
                        $counter = 0;
                        ?>
                        <div class="field-column">
                        <?php while ($choice = array_shift($choices)): ?>
                            <?php $choice['id'] = 'rand-'. fw_unique_increment(); ?>
                            <div class="form-radio">
                                <input class="form-radio-input" <?php echo fw_attr_to_html($choice) ?> />
                                <label class="form-radio-label" for="<?php echo esc_attr($choice['id']) ?>"><?php echo $choice['value'] ?></label>
                            </div>
                            <?php if (!(++$counter % $choices_per_column)): ?>
                                </div><div class="field-column">
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php foreach ($choices as $key=>$choice):
                            $choice['id'] = 'rand-'. fw_unique_increment(); ?>
                            <div class="form-radio">
                                <input class="form-radio-input" <?php echo fw_attr_to_html($choice) ?> <?php if ($key === (intval($options['checked-variant'])) - 1) { ?>checked="checked"<?php } ?>/>
                                <label class="form-radio-label" for="<?php echo esc_attr($choice['id']) ?>"><?php echo $choice['value'] ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php if ($options['info']): ?>
                    <p><em><?php echo $options['info'] ?></em></p>
                <?php endif; ?>

            <?php if ($options['label']): ?>
                </div>
            <?php endif; ?>
		</div>
	</div>
<?php endif; ?>