<?php global $post; ?>
<input name="gmc-recipeingredientid[]" type="hidden" value="<?php echo $ingredient->ID; ?>" /><div class="gmc-full <?php echo $gmcaddnew ? 'gmc-sidebar' : ''; ?>">
<div class="gmc-half">
<div class="padder">
<div>
<label class="gmc-admin-label">
<span>
<b>
              Ingredient name:
            </b>          </span>          (e.g. Sausage)
        </label><input class="gmc-admin-fullline" name="gmc-ingredientname[]" value="<?php echo $ingredient->post_title; ?>" />      </div><div>
<label class="gmc-admin-label">
<span>
<b>
              Quantity:
            </b>          </span>          (e.g. 1)
        </label><input class="gmc-admin-fullline" name="gmc-ingredientquantity[]" value="<?php echo get_post_meta($ingredient->ID,'gmc-ingredientquantity',true); ?>" />      </div><div id="gmc-standard-measurement-area-<?php echo $ingredient->ID; ?>">
<label class="gmc-admin-label">
<span>
<b>
              Measurement type:
            </b>          </span>          (<a class="gmc-show-custom-measurement" href="#" id="gmc-show-custom-measurement-<?php echo $ingredient->ID; ?>" tabindex="-1">Measurement not listed?</a>)
        </label>        <?php $ms=get_post_meta($ingredient->ID,'gmc-ingredientmeasurement',true); ?>
<select class="gmc-admin-fullline" name="gmc-ingredientmeasurement[]">
<option value="">
            None
          </option><optgroup label="Weight">
            <?php echo gmc_option_list(array("g" => "Grams", "kg" => "Kilograms", "pound" => "Pounds", "ounce" => "Ounces"), $ms); ?>

          </optgroup><optgroup label="Liquids">
            <?php echo gmc_option_list(array("ml" => "Millilitre", "litre" => "Litre", "juice" => "Juice(s)"), $ms); ?>

          </optgroup><optgroup label="Size">
            <?php echo gmc_option_list(array("small" => "Small", "medium" => "Medium", "large" => "Large"), $ms); ?>

          </optgroup><optgroup label="Thickness">
            <?php echo gmc_option_list(array("thin slice" => "Thin slice(s)", "medium slice" => "Medium slice(s)", "thick slice" => "Thick slice(s)"), $ms); ?>

          </optgroup><optgroup label="Other">
            <?php echo gmc_option_list(array("bunch" => "Bunch", "bottle" => "Bottle", "can" => "Can", "cube" => "Cube", "cup" => "Cup", "glass" => "Glass", "handful" => "Handful", "jar" => "Jar", "piece" => "Piece", "pinch" => "Pinch", "scoop" => "Scoop", "tablespoon" => "Tablespoon", "heaped tablespoon" => "Tablespoon (heaped)", "teaspoon" => "Teaspoon", "heaped teaspoon" => "Teaspoon (heaped)", "tin" => "Tin"), $ms)       ; ?>

          </optgroup>        </select>      </div><div id="gmc-custom-measurement-area-<?php echo $ingredient->ID; ?>">
<label class="gmc-admin-label">
<b>
            Custom measurement:
          </b>          (<a class="gmc-show-standard-measurement" href="#" id="gmc-show-standard-measurement-<?php echo $ingredient->ID; ?>">Show measurement list</a>)
        </label>                <?php if (get_post_meta($ingredient->ID, 'gmc-use-custom-measurement', true)) { ?>

<input class="gmc-admin-fullline gmc-custom-measurement" id="gmc-custom-measurement-<?php echo $ingredient->ID; ?>" name="gmc-custom-measurement[]" value="<?php echo get_post_meta($ingredient->ID, 'gmc-ingredientmeasurement', true); ?>" />                <?php } else { ?>

<input class="gmc-admin-fullline" name="gmc-custom-measurement[]" />        <?php } ?>
<input class="gmc-use-custom-measurement" id="gmc-use-custom-measurement-<?php echo $ingredient->ID; ?>" name="gmc-use-custom-measurement[]" type="hidden" value="<?php echo get_post_meta($ingredient->ID, 'gmc-use-custom-measurement', true); ?>" />      </div><div>
<label class="gmc-admin-label">
<span>
<strong>
              Ingredient group name (optional):
            </strong>          </span><p>
            Ingredients can be placed into groups such as '
<strong>Cake base</strong>', '
<strong>Cake filling</strong>' and '
<strong>Cake topping</strong>'.
          </p><p>
            Grouping makes it easy for your visitors to see which ingredients are for which part of the recipe.
          </p>        </label><input class="gmc-admin-fullline" name="gmc-ingredientgroup[]" value="<?php echo get_post_meta($ingredient->ID,'gmc-ingredientgroup',true); ?>" />      </div><div class="gmc-admin-fullline">
        <?php $gmcoptional=get_post_meta($ingredient->ID,'gmc-ingredientoptional',true); ?>
        <input value="<?php echo ($ingredient->ID ? $ingredient->ID : 0); ?>" name="gmc-ingredientoptional[]" type="checkbox" <?php echo ($gmcoptional=="Y" ? "checked='checked'" : ""); ?> />
        This is an optional ingredient
      </div>            <?php if (!$gmcaddnew) { ?>

<div class="gmc-admin-fullline">
<a class="gmc-delete-ingredient" href="#" id="gmc-ingredient-to-delete-<?php echo $ingredient->ID; ?>">
            Delete this ingredient
          </a>        </div>      <?php } ?>
    </div>  </div><div class="gmc-half">
<div>
<label class="gmc-admin-label">
<span>
<b>
            Note:
          </b>        </span>        (e.g. Plain pork sausages are best)
      </label>      <textarea class="gmc-admin-fullline autoResize" name="gmc-ingredientnote[]"><?php echo $ingredient->post_content; ?></textarea>
    </div>  </div><div style="clear:both">
  </div></div>