<?php global $post; ?>
<?php $ingredient_post_title = null; ?>
<?php $ingredient_post_content = null; ?>
<?php $ingredientId = 'unique-ingred'; ?>
<?php if (!$gmc_add_new) { ?>

  <?php $ingredientId = $ingredient->ID; ?>
  <?php $ingredient_post_title = $ingredient->post_title; ?>
  <?php $ingredient_post_content = $ingredient->post_content; ?>
<?php } ?>
<tr class="gmc-singleingredient" id="gmc-ingredients-ingredient-<?php echo $i; ?>">
<input name="gmc-recipeingredientid[]" type="hidden" value="<?php echo $ingredientId; ?>" /><input id="gmc-recipeingredientorder-<?php echo $i; ?>" name="gmc-recipeingredientorder[]" type="hidden" value="<?php echo $i; ?>" /><td>
<img alt:="<?php echo __('Reposition ingredient in the list', 'gmc'); ?>" height="16" src="<?php echo gmc_plugin_url() . '/images/cursor-drag.png'; ?>" title="<?php echo __('Reposition ingredient in the list', 'gmc'); ?>" width="16" />  </td><td>
<input class="gmc-ingredient-quantity-hint" name="gmc-ingredientquantity[]" size="6" value="<?php echo get_post_meta($ingredientId,'gmc-ingredientquantity',true); ?>" />  </td><td>
<div id="gmc-standard-measurement-area-<?php echo $ingredientId; ?>"><a class="gmc-show-custom-measurement" href="#" id="gmc-show-custom-measurement-<?php echo $ingredientId; ?>" tabindex="-1"><?php _e('Measurement not listed?', 'gmc'); ?></a><br />      <?php $ms=get_post_meta($ingredientId,'gmc-ingredientmeasurement',true); ?>
<select name="gmc-ingredientmeasurement[]">
<option value="">
          <?php _e('None', 'gmc'); ?>
        </option><optgroup label="<?php echo __('Weight', 'gmc'); ?>">
          <?php echo gmc_option_list(array('g' => __('Grams', 'gmc'), 'kg' => __('Kilograms', 'gmc'), 'oz' => __('Ounces', 'gmc'), 'lb' => __('Pounds', 'gmc'), "imperial pint weight" => __('Pint (Imperial)', 'gmc'), "usa pint weight" => __('Pint (US)', 'gmc'), "imperial quart" => __('Quart (Imperial)', 'gmc'), "usa dry quart" => __('Quart (US)', 'gmc')), $ms); ?>

        </optgroup><optgroup label="<?php echo __('Liquids', 'gmc'); ?>">
          <?php echo gmc_option_list(array("ml" => __('Millilitre', 'gmc'), "l" => __('Litre', 'gmc'), "imperial fl oz" => __('Fluid Ounces (Imperial)', 'gmc'), "usa fl oz" => __('Fluid Ounces (US)', 'gmc'), "juice" => __('Juice(s)', 'gmc'), "imperial pint" => __('Pint (Imperial)', 'gmc'), "usa pint" => __('Pint (US)', 'gmc'), "imperial quart" => __('Quart (Imperial)', 'gmc'), "usa liquid quart" => __('Quart (US)', 'gmc')), $ms); ?>

        </optgroup><optgroup label="<?php echo __('Size', 'gmc'); ?>">
          <?php echo gmc_option_list(array("small" => __('Small', 'gmc'), "medium" => __('Medium', 'gmc'), "large" => __('Large', 'gmc')), $ms); ?>

        </optgroup><optgroup label="<?php echo __('Thickness', 'gmc'); ?>">
          <?php echo gmc_option_list(array("thin slice" => __('Thin slice(s)', 'gmc'), "medium slice" => __('Medium slice(s)', 'gmc'), "thick slice" => __('Thick slice(s)', 'gmc')), $ms); ?>

        </optgroup><optgroup label="<?php echo __('Other', 'gmc'); ?>">
          <?php echo gmc_option_list(array("bag" => __('Bag', 'gmc'), "bunch" => __('Bunch', 'gmc'), "bottle" => __('Bottle', 'gmc'), "box" => __('Box', 'gmc'), "bulb" => __('Bulb', 'gmc'), "can" => __('Can', 'gmc'), "carton" => __('Carton', 'gmc'), "clove" => __('Clove', 'gmc'), "cm" => __('centimetre', 'gmc'), "cube" => __('Cube', 'gmc'), "cup" => __('Cup', 'gmc'), "dash" => __('Dash', 'gmc'), "drizzle" => __('Drizzle', 'gmc'), "drop" => __('Drop', 'gmc'), "glass" => __('Glass', 'gmc'), "handful" => __('Handful', 'gmc'), "head" => __('Head', 'gmc'), "inch" => __('Inch', 'gmc'), "jar" => __('Jar', 'gmc'), "knob" => __('Knob', 'gmc'), "leaf" => __('Leaf', 'gmc'), "packet" => __('Packet', 'gmc'), "piece" => __('Piece', 'gmc'), "pinch" => __('Pinch', 'gmc'), "rib" => __('Rib', 'gmc'), "scoop" => __('Scoop', 'gmc'), "sheet" => __('Sheet', 'gmc'), "shot" => __('Shot', 'gmc'), "splash" => __('Splash', 'gmc'), "sprinkle" => __('Sprinkle', 'gmc'), "sprig" => __('Sprig', 'gmc'), "stalk" => __('Stalk', 'gmc'), "stick" => __('Stick', 'gmc'), "tablespoon" => __('Tablespoon', 'gmc'), "heaped tablespoon" => __('Tablespoon (heaped)', 'gmc'), "teaspoon" => __('Teaspoon', 'gmc'), "heaped teaspoon" => __('Teaspoon (heaped)', 'gmc'), "tin" => __('Tin', 'gmc'), "tube" => __('Tube', 'gmc'), "wedge" => __('Wedge', 'gmc'), "zest" => __('Zest', 'gmc')), $ms); ?>

        </optgroup>      </select>    </div><div id="gmc-custom-measurement-area-<?php echo $ingredientId; ?>"><a class="gmc-show-standard-measurement" href="#" id="gmc-show-standard-measurement-<?php echo $ingredientId; ?>"><?php _e('Show measurement list', 'gmc'); ?></a><br />            <?php if (get_post_meta($ingredientId, 'gmc-use-custom-measurement', true)) { ?>

<input class="gmc-custom-measurement" id="gmc-custom-measurement-<?php echo $ingredientId; ?>" name="gmc-custom-measurement[]" value="<?php echo get_post_meta($ingredientId, 'gmc-ingredientmeasurement', true); ?>" />            <?php } else { ?>

<input name="gmc-custom-measurement[]" />      <?php } ?>
<input class="gmc-use-custom-measurement" id="gmc-use-custom-measurement-<?php echo $ingredientId; ?>" name="gmc-use-custom-measurement[]" type="hidden" value="<?php echo get_post_meta($ingredientId, 'gmc-use-custom-measurement', true); ?>" />    </div>  </td><td>
        <?php if ($gmc_add_new) { ?>

<input class="gmc-ingredient-name-hint" id="gmc-admin-new-ingredient-<?php echo $i; ?>" name="gmc-ingredientname[]" size="25" />        <?php } else { ?>

<input class="gmc-ingredient-name-hint" name="gmc-ingredientname[]" size="25" value="<?php echo $ingredient_post_title; ?>" />    <?php } ?>
  </td><td>
<input class="gmc-ingredient-note-hint" name="gmc-ingredientnote[]" size="60" value="<?php echo $ingredient_post_content; ?>" />  </td><td>
<input name="gmc-ingredientgroup[]" size="25" value="<?php echo get_post_meta($ingredientId,'gmc-ingredientgroup',true); ?>" />  </td><td class="icon">
    <?php $gmcoptional=get_post_meta($ingredientId,'gmc-ingredientoptional',true); ?>
    <input value="<?php echo $ingredientId; ?>" name="gmc-ingredientoptional[]" type="checkbox" <?php echo ($gmcoptional=="Y" ? "checked='checked'" : ""); ?> />
  </td><td class="icon deleteIcon">
        <?php if (!$gmc_add_new) { ?>

<a class="gmc-delete-ingredient" href="#" id="gmc-ingredient-to-delete-<?php echo $ingredientId; ?>">
<img alt="<?php echo __('Delete this ingredient', 'gmc'); ?>" height="16" src="<?php echo gmc_plugin_url() . '/images/delete.png'; ?>" title="<?php echo __('Delete this ingredient', 'gmc'); ?>" width="16" />      </a>    <?php } ?>
  </td></tr>