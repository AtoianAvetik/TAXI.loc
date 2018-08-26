<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $input_value
 */

$options = $item['options'];
?>

<?php if (empty($choices)): ?>
    <!-- select not displayed: no choices -->
<?php else: ?>
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
<!--                --><?php //echo do_shortcode( fw()->backend->option_type( 'select' )->render('select12345', array_merge($choices, array('attr'=>$attr) )) );?>
                <select <?php echo fw_attr_to_html($attr) ?> >
                    <?php foreach ($choices as $choice): ?>
                        <option <?php echo fw_attr_to_html($choice) ?> ><?php echo $choice['value'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
<?php endif; ?>