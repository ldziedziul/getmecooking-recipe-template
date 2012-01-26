<?php global $post; ?>
<?php $ingredientId = $ingredient->ID;; ?>
<?php if ($gmcaddnew) { ?>

  <?php $ingredientId = 'unique-ingred';; ?>
<?php } ?>
<input name="gmc-recipeingredientid[]" type="hidden" value="<?php echo $ingredientId; ?>" /><input id="gmc-recipeingredientorder-<?php echo $i; ?>" name="gmc-recipeingredientorder[]" type="hidden" value="<?php echo $i; ?>" /><div class="gmc-full <?php echo $gmcaddnew ? 'gmc-sidebar' : ''; ?>">
<div class="gmc-half">
<div class="padder">
<div>
<label class="gmc-admin-label">
<span>
<b>
              Ingredient name:
            </b>          </span>          (e.g. Sausage)
        </label>      </div>            <?php if ($gmcaddnew) { ?>

<input class="gmc-admin-fullline" id="gmc-admin-new-ingredient-<?php echo $i; ?>" name="gmc-ingredientname[]" value="<?php echo $ingredient->post_title; ?>" />            <?php } else { ?>

<input class="gmc-admin-fullline" name="gmc-ingredientname[]" value="<?php echo $ingredient->post_title; ?>" />      <?php } ?>
<div>
<label class="gmc-admin-label">
<span>
<b>
              Quantity:
            </b>          </span>          (e.g. 1)
        </label><input class="gmc-admin-fullline" name="gmc-ingredientquantity[]" value="<?php echo get_post_meta($ingredientId,'gmc-ingredientquantity',true); ?>" />      </div><div id="gmc-standard-measurement-area-<?php echo $ingredientId; ?>">
<label class="gmc-admin-label">
<span>
<b>
              Measurement type:
            </b>          </span>          (       
<a class="gmc-show-custom-measurement" href="#" id="gmc-show-custom-measurement-<?php echo $ingredientId; ?>" tabindex="-1">Measurement not listed?</a>          )
        </label>        <?php $ms=get_post_meta($ingredientId,'gmc-ingredientmeasurement',true); ?>
<select class="gmc-admin-fullline" name="gmc-ingredientmeasurement[]">
<option value="">
            None
          </option><optgroup label="Weight">
            <?php echo gmc_option_list(array("g" => "Grams", "kg" => "Kilograms", "oz" => "Ounces", "lb" => "Pounds", "imperial pint weight" => "Pint (Imperial)", "usa pint weight" => "Pint (US)"), $ms); ?>

          </optgroup><optgroup label="Liquids">
            <?php echo gmc_option_list(array("ml" => "Millilitre", "litre" => "Litre", "imperial fl oz" => "Fluid Ounces (Imperial)", "usa fl oz" => "Fluid Ounces (US)", "juice" => "Juice(s)"), $ms); ?>

          </optgroup><optgroup label="Size">
            <?php echo gmc_option_list(array("small" => "Small", "medium" => "Medium", "large" => "Large"), $ms); ?>

          </optgroup><optgroup label="Thickness">
            <?php echo gmc_option_list(array("thin slice" => "Thin slice(s)", "medium slice" => "Medium slice(s)", "thick slice" => "Thick slice(s)"), $ms); ?>

          </optgroup><optgroup label="Other">
            <?php echo gmc_option_list(array("bunch" => "Bunch", "bottle" => "Bottle", "box" => "Box", "bulb" => "Bulb", "can" => "Can", "clove" => "Clove", "cube" => "Cube", "cup" => "Cup", "drizzle" => "Drizzle", "drop" => "Drop", "glass" => "Glass", "handful" => "Handful", "head" => "Head", "jar" => "Jar", "knob" => "Knob", "packet" => "Packet", "piece" => "Piece", "pinch" => "Pinch", "imperial pint" => "Pint (Imperial)", "usa pint" => "Pint (US)", "rib" => "Rib", "scoop" => "Scoop", "sheet" => "Sheet", "sprinkle" => "Sprinkle", "sprig" => "Sprig", "stalk" => "Stalk", "stick" => "Stick", "tablespoon" => "Tablespoon", "heaped tablespoon" => "Tablespoon (heaped)", "teaspoon" => "Teaspoon", "heaped teaspoon" => "Teaspoon (heaped)", "tin" => "Tin", "wedge" => "Wedge", "zest" => "Zest"), $ms); ?>

          </optgroup>        </select>      </div><div id="gmc-custom-measurement-area-<?php echo $ingredientId; ?>">
<label class="gmc-admin-label">
<b>
            Custom measurement:
          </b>          (<a class="gmc-show-standard-measurement" href="#" id="gmc-show-standard-measurement-<?php echo $ingredientId; ?>">Show measurement list</a>)
        </label>                <?php if (get_post_meta($ingredientId, 'gmc-use-custom-measurement', true)) { ?>

<input class="gmc-admin-fullline gmc-custom-measurement" id="gmc-custom-measurement-<?php echo $ingredientId; ?>" name="gmc-custom-measurement[]" value="<?php echo get_post_meta($ingredientId, 'gmc-ingredientmeasurement', true); ?>" />                <?php } else { ?>

<input class="gmc-admin-fullline" name="gmc-custom-measurement[]" />        <?php } ?>
<input class="gmc-use-custom-measurement" id="gmc-use-custom-measurement-<?php echo $ingredientId; ?>" name="gmc-use-custom-measurement[]" type="hidden" value="<?php echo get_post_meta($ingredientId, 'gmc-use-custom-measurement', true); ?>" />      </div><div>
<label class="gmc-admin-label">
<span>
<strong>
              Ingredient group name (optional):
            </strong><span class="gmc-tooltip">
              <img src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="Help" />
<b><em>
                </em><p>
                  Ingredients can be placed into groups such as '
<strong>Cake base</strong>', '
<strong>Cake filling</strong>' and '
<strong>Cake topping</strong>'.
                </p><p>
                  Grouping makes it easy for your visitors to see which ingredients are for which part of the recipe.
                </p>              </b>            </span>          </span>        </label><input class="gmc-admin-fullline" name="gmc-ingredientgroup[]" value="<?php echo get_post_meta($ingredientId,'gmc-ingredientgroup',true); ?>" />      </div><div class="gmc-admin-fullline">
        <?php $gmcoptional=get_post_meta($ingredientId,'gmc-ingredientoptional',true); ?>
        <input value="<?php echo $ingredientId; ?>" name="gmc-ingredientoptional[]" type="checkbox" <?php echo ($gmcoptional=="Y" ? "checked='checked'" : ""); ?> />
        This is an optional ingredient
<span class="gmc-tooltip">
            <img src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="Help" />
<b><em>
              </em>Could be an ingredient that is not suitable for everyone (e.g. alcohol), or a garnish.
            </b>          </span><div class="gmc-admin-fullline">
        </div>                <?php if (!$gmcaddnew) { ?>

<a class="gmc-delete-ingredient" href="#" id="gmc-ingredient-to-delete-<?php echo $ingredientId; ?>">
            Delete this ingredient
          </a>        <?php } ?>
      </div>    </div>  </div><div class="gmc-half">
<div>
<label class="gmc-admin-label">
<span>
<b>
            Note:
          </b>        </span>        (e.g. Plain pork sausages are best)
      </label>      <textarea class="gmc-admin-fullline autoResize" name="gmc-ingredientnote[]"><?php echo $ingredient->post_content; ?></textarea>
    </div>  </div><div style="clear:both">
  </div></div>