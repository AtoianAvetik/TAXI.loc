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
    <!-- checkboxes not displayed: no choices -->
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

                <div class="field-columns-<?php echo esc_attr($columns); ?> form-icon-list">
                    <?php if ($columns > 1): ?>
                        <?php
                        $choices_count = count($choices);
                        $choices_per_column = abs($choices_count / $columns)
                            + (($choices_count % $columns > $columns / 2) ? 1 : 0);
                        $counter = 0;
                        ?>
                        <div class="field-column">
                        <?php while ($choice = array_shift($choices)): ?>
                            <?php
                            $choice['attr']['id'] = 'rand-'. fw_unique_increment();
                            $choice_attrs = $choice['attr'];
                            $choice_options = $choice['options']; ?>
                            <div class="form-icon">
                                <input class="form-icon-input" <?php echo fw_attr_to_html($choice_attrs) ?> />
                                <label class="form-icon-label <?php if ( ! empty( $choice_options['hint-title'] ) || ! empty( $choice_options['hint-content'] ) ) { ?>tipso tipso_style<?php } ?> <?php echo $choice_options['icon']['icon-class-without-root'] ?>"
                                       <?php if ( ! empty( $choice_options['hint-title'] ) ) { ?>data-tipso-title="<?php echo $choice_options['hint-title']; } ?>"
                                       <?php if ( ! empty( $choice_options['hint-content'] ) ) { ?>data-tipso="<?php echo $choice_options['hint-content']; } ?>"
                                       for="<?php echo esc_attr($choice_attrs['id']) ?>"></label>
                            </div>
                            <?php if (!(++$counter % $choices_per_column)): ?>
                                </div><div class="field-column">
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php foreach ($choices as $choice):
                            $choice['attr']['id'] = 'rand-'. fw_unique_increment();
                            $choice_attrs = $choice['attr'];
                            $choice_options = $choice['options']; ?>
                            <div class="form-icon">
                                <input class="form-icon-input" <?php echo fw_attr_to_html($choice_attrs) ?> />
                                <label class="form-icon-label <?php if ( ! empty( $choice_options['hint-title'] ) || ! empty( $choice_options['hint-content'] ) ) { ?>tipso tipso_style<?php } ?> <?php echo $choice_options['icon']['icon-class-without-root'] ?>"
                                       <?php if ( ! empty( $choice_options['hint-title'] ) ) { ?>data-tipso-title="<?php echo $choice_options['hint-title']; } ?>"
                                       <?php if ( ! empty( $choice_options['hint-content'] ) ) { ?>data-tipso="<?php echo $choice_options['hint-content']; } ?>"
                                       for="<?php echo esc_attr($choice_attrs['id']) ?>"></label>
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