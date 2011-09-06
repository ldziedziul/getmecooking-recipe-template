<?php global $post; ?>
<input id="gmc-selected-tab" name="gmc_selected_tab" type="hidden" /><input id="gmc-ingredient-to-delete" name="gmc_ingredient_to_delete" type="hidden" /><input id="gmc-step-to-delete" name="gmc_step_to_delete" type="hidden" /><div class="gmc-full">
<div class="gmc-half">
<div class="padder">
<div>
<label class="gmc-admin-recipe-details">
          Number of servings:
        </label><input class="gmc-admin-input" name="gmc-nr-servings" value="<?php echo get_post_meta($post->ID, 'gmc-nr-servings', true); ?>" /><label>
          (e.g. 1 or 1 - 2)
        </label>      </div><div>
<label class="gmc-admin-recipe-details">
          Total preparation time:
        </label><input class="gmc-admin-input" name="gmc-prep-time-hours" value="<?php echo get_post_meta($post->ID, 'gmc-prep-time-hours', true); ?>" /><label>
          hours
        </label><input class="gmc-admin-input" name="gmc-prep-time-mins" value="<?php echo get_post_meta($post->ID, 'gmc-prep-time-mins', true); ?>" /><label>
          minutes
        </label>      </div><div>
<label class="gmc-admin-recipe-details">
          Total cooking time:
        </label><input class="gmc-admin-input" name="gmc-cooking-time-hours" value="<?php echo get_post_meta($post->ID, 'gmc-cooking-time-hours', true); ?>" /><label>
          hours
        </label><input class="gmc-admin-input" name="gmc-cooking-time-mins" value="<?php echo get_post_meta($post->ID, 'gmc-cooking-time-mins', true); ?>" /><label>
          minutes
        </label>      </div><div>
<p>
          If you got this recipe from somewhere, you can credit the source:
        </p>        <?php $selected_source =get_post_meta($post->ID, 'gmc-source-type', true); ?>
<select class="gmc-admin-halfline" id="gmc-source-type" name="gmc-source-type">
<option value="">
            No source
            <?php echo gmc_option_list(array("Author" => "Author", "Book" => "Book", "Website" => "Website"), $selected_source); ?>

          </option>        </select>      </div><div id="gmc-source-author">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
          Name of author:       
        </label><input class="gmc-admin-author" name="gmc-source-author-name" value="<?php echo $selected_source == 'Author' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />      </div><div id="gmc-source-author-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
          Author website:
        </label><input class="gmc-admin-author" name="gmc-source-author-url" value="<?php echo $selected_source == 'Author' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />      </div><div id="gmc-source-book">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
          Name of book:
        </label><input class="gmc-admin-author" name="gmc-source-book-name" value="<?php echo $selected_source == 'Book' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />      </div><div id="gmc-source-book-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
          Book website:
        </label><input class="gmc-admin-author" name="gmc-source-book-url" value="<?php echo $selected_source == 'Book' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />      </div><div id="gmc-source-website">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
          Name of website:
        </label><input class="gmc-admin-author" name="gmc-source-website-name" value="<?php echo $selected_source == 'Website' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />      </div><div id="gmc-source-website-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
          Website URL:
        </label><input class="gmc-admin-author" name="gmc-source-website-url" value="<?php echo $selected_source == 'Website' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />      </div>    </div>  </div><div class="gmc-half">
<div id="gmc-standard-region-area">
<label class="gmc-admin-label">
<span>
<b>
            Does the recipe come from a particular region?
          </b>        </span>        (<a href="#" id="gmc-show-custom-region">Region not listed?</a>)
      </label>      <?php $selectedregion =get_post_meta($post->ID, 'gmc-recopt-region', true); ?>
<select class="gmc-admin-fullline" id="gmc-recopt-region" name="gmc-recopt-region">
<option value="">
          No (Worldwide)
<optgroup label="General - Continent">
            <?php echo gmc_option_list(array("African" => "African", "American" => "American", "Asian" => "Asian", "European" => "European", "Oceanian" => "Oceanian", "South American" => "South American"), $selectedregion); ?>

          </optgroup><optgroup label="Specific - Region">
            <?php echo gmc_option_list(array("British" => "British", "Canadian" => "Canadian", "Chinese" => "Chinese", "Croatian" => "Croatian", "French" => "French", "German" => "German", "Greek" => "Greek", "Indian" => "Indian", "Indonesian" => "Indonesian", "Irish" => "Irish", "Italian" => "Italian", "Jamaican" => "Jamaican", "Japanese" => "Japanese", "Lebanese" => "Lebanese", "Malaysian" => "Malaysian", "Mexican" => "Mexican", "Moroccan" => "Moroccan", "Russian" => "Russian", "Spanish" => "Spanish", "Swedish" => "Swedish", "Thai" => "Thai", "Turkish" => "Turkish", "Vietnamese" => "Vietnamese"), $selectedregion); ?>

          </optgroup>        </option>      </select>    </div><div id="gmc-custom-region-area">
<label class="gmc-admin-label">
<b>
          Custom Region:
        </b>      </label>      (<a href="#" id="gmc-show-standard-region">Show region list</a>)     
            <?php if (get_post_meta($post->ID, 'gmc-use-custom-region', true)) { ?>

<input class="gmc-admin-fullline" id="gmc-custom-region" name="gmc-custom-region" value="<?php echo get_post_meta($post->ID, 'gmc-recopt-region', true); ?>" />            <?php } else { ?>

<input class="gmc-admin-fullline" id="gmc-custom-region" name="gmc-custom-region" />      <?php } ?>
<input id="gmc-use-custom-region" name="gmc-use-custom-region" type="hidden" value="<?php echo get_post_meta($post->ID, 'gmc-use-custom-region', true); ?>" />    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            When would you eat this meal?
          </b>          (Tick all that apply)
        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=array("Appetizer", "Beverage", "Bread", "Breakfast", "Condiment", "Dessert", "Lunch", "Main Dish", "Salad", "Side Dish", "Snack", "Soup", "Starter"); ?>
        <?php $gmparams=(array)unserialize(get_post_meta($post->ID,'gmc-recopt-when',true)); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp; ?>" name="gmc-recopt-when[]" type="checkbox" <?php echo (in_array($gmp, $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            Is the recipe for a specific occasion?
          </b>          (e.g. pumpkin soup for Halloween) (Tick all that apply)
        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=array("Barbecue", "Birthday Party", "Casual Party", "Christmas", "Formal Party", "Halloween", "Thanksgiving"); ?>
        <?php $gmparams=(array)unserialize(get_post_meta($post->ID,'gmc-recopt-occasion',true)); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp; ?>" name="gmc-recopt-occasion[]" type="checkbox" <?php echo (in_array($gmp, $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            Can the recipe be associated with any dietary requirements?
          </b>          (Tick all that apply)
        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=array("Diabetic", "Gluten Free", "Vegan", "Vegetarian"); ?>
        <?php $gmparams=(array)unserialize(get_post_meta($post->ID,'gmc-recopt-dietary',true)); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp; ?>" name="gmc-recopt-dietary[]" type="checkbox" <?php echo (in_array($gmp, $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            Can the recipe be associated with any allergies?
          </b>        </span>        (Tick all that apply)
      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=array("Egg", "Fish", "Milk", "Peanuts", "Shellfish", "Soy", "Tree Nuts", "Wheat"); ?>
        <?php $gmparams=(array)unserialize(get_post_meta($post->ID,'gmc-recopt-allergies',true)); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp; ?>" name="gmc-recopt-allergies[]" type="checkbox" <?php echo (in_array($gmp, $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            The recipe is...
          </b>        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=array("Child Friendly", "Freezable", "Gourmet", "Pre-preparable", "Serve Cold", "Serve Hot"); ?>
        <?php $gmparams=(array)unserialize(get_post_meta($post->ID,'gmc-recopt-other',true)); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp; ?>" name="gmc-recopt-other[]" type="checkbox" <?php echo (in_array($gmp, $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp; ?>

          </p>        <?php } ?>
      </div>    </div>  </div></div>