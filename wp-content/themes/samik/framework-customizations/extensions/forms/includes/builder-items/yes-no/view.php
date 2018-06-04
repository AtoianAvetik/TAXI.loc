<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $input_value
 */

$options = $item['options'];
?>
<div class="<?php echo esc_attr(fw_ext_builder_get_item_width('form-builder', $item['width'] .'/frontend_class')) ?>">
    <div class="field-radio input-styled">
        <label><?php echo fw_htmlspecialchars($item['options']['label']) ?>
            <?php if ($options['required']): ?><sup>*</sup><?php endif; ?>
        </label>
        <div class="custom-radio">
            <div class="options">
                <?php
                foreach (array('yes' => __('Yes', 'unyson'), 'no' => __('No', 'unyson')) as $value => $label): ?>
                    <?php
                    $choice_attr = array(
                        'value' => $value,
                        'type' => 'radio',
                        'name' => $item['shortcode'],
                        'id' => 'rand-'. fw_unique_increment(),
                    );

                    if ($input_value === $value) {
                        $choice_attr['checked'] = 'checked';
                    }
                    ?>
                    <input <?php echo fw_attr_to_html($choice_attr) ?> />
                    <label for="<?php echo esc_attr($choice_attr['id']) ?>"><?php echo $label ?></label>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>