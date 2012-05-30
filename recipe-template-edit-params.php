<script>
  var postPublishedMessage = "<?php _e('Recipe saved, you must now create a post and insert this recipe by pressing the GetMeCooking icon on the post page.', 'gmc'); ?>";
  var postUpdatedMessage = "<?php _e('Recipe updated. If you  have not already done so, you must create a post and insert this recipe by pressing the GetMeCooking icon on the post page.', 'gmc'); ?>";
  var saveRecipeMessage = "<?php _e('Save Recipe', 'gmc'); ?>";
  var updateRecipeMessage = "<?php _e('Update Recipe', 'gmc'); ?>";
  var submitRecipeForReviewMessage = "<?php _e('Submit Recipe for Review', 'gmc'); ?>";
  var scheduleRecipeForPublishingMessage = "<?php _e('Schedule Recipe Publishing', 'gmc'); ?>";
  var confirmDeleteIngredientMessage = "<?php _e('Are you sure you want to delete this ingredient?', 'gmc'); ?>";
  var confirmDeleteIngredientTitle = "<?php _e('Confirmation', 'gmc'); ?>";
  var confirmDeleteStepMessage = "<?php _e('Are you sure you want to delete this step?', 'gmc'); ?>";
  var confirmDeleteStepTitle = "<?php _e('Confirmation', 'gmc'); ?>";
  var ingredientName = "<?php _e("e.g. 'onion' or 'cheese'", 'gmc'); ?>";
  var ingredientNote = "<?php _e("e.g. 'finely chopped' or 'freshly grated'", 'gmc'); ?>";
  var ingredientQuantity = "<?php _e("e.g. 1", 'gmc'); ?>";
  var recipeDescription = "<?php _e('e.g. These muffins have a crunchy top with a crumbly inside where you taste the subtle hint of lemon.', 'gmc'); ?>";
</script>
<?php global $post; ?>
<input id="gmc-selected-tab" name="gmc_selected_tab" type="hidden" /><input id="gmc-ingredient-to-delete" name="gmc_ingredient_to_delete" type="hidden" /><input id="gmc-step-to-delete" name="gmc_step_to_delete" type="hidden" /><div class="gmc-full">
<div>
<label class="gmc-admin-recipe-details">
      <?php _e('Number of servings', 'gmc'); ?>
    </label><input class="gmc-admin-input" name="gmc-nr-servings" value="<?php echo get_post_meta($post->ID, 'gmc-nr-servings', true); ?>" /><label>
      <?php _e('(e.g. 1 or 1 - 2)', 'gmc')     ; ?>
      <img class="gmc-tooltip" src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="<?php _e('Help', 'gmc') ?>" title="<?php _e('People like information. The more useful your blog is, the more engaged your visitors will be.', 'gmc');?>" />
    </label>  </div><br /><div>
<label class="gmc-admin-recipe-details">
      <?php _e('Total preparation time', 'gmc'); ?>
    </label><input class="gmc-admin-input" name="gmc-prep-time-hours" value="<?php echo get_post_meta($post->ID, 'gmc-prep-time-hours', true); ?>" /><label>
      <?php _e('hours', 'gmc'); ?>
    </label><input class="gmc-admin-input" name="gmc-prep-time-mins" value="<?php echo get_post_meta($post->ID, 'gmc-prep-time-mins', true); ?>" /><label>
      <?php _e('minutes', 'gmc'); ?>
    </label>  </div><br /><div>
<label class="gmc-admin-recipe-details">
      <?php _e('Total cooking time', 'gmc'); ?>
    </label><input class="gmc-admin-input" name="gmc-cooking-time-hours" value="<?php echo get_post_meta($post->ID, 'gmc-cooking-time-hours', true); ?>" /><label>
      <?php _e('hours', 'gmc'); ?>
    </label><input class="gmc-admin-input" name="gmc-cooking-time-mins" value="<?php echo get_post_meta($post->ID, 'gmc-cooking-time-mins', true); ?>" /><label>
      <?php _e('minutes', 'gmc'); ?>
    </label>  </div><br /><div>
<label class="gmc-admin-label">
      <?php _e('Recipe source (if applicable)', 'gmc'); ?>
    </label>    <?php $selected_source =get_post_meta($post->ID, 'gmc-source-type', true); ?>
<select class="gmc-admin-recipe-details" id="gmc-source-type" name="gmc-source-type">
<option value="">
        <?php _e('No source', 'gmc'); ?>
        <?php echo gmc_option_list(array("Author" => __('Author', 'gmc'), "Book" => __('Book', 'gmc'), "Magazine" => __('Magazine', 'gmc'), "Website" => __('Website', 'gmc')), $selected_source); ?>

      </option>    </select><div id="gmc-source-author">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
        <?php _e('Name of author', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-author-name" value="<?php echo $selected_source == 'Author' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />    </div><div id="gmc-source-author-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
        <?php _e('Author website', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-author-url" value="<?php echo $selected_source == 'Author' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />    </div><div id="gmc-source-book">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
        <?php _e('Name of book', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-book-name" value="<?php echo $selected_source == 'Book' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />    </div><div id="gmc-source-book-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
        <?php _e('Book website', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-book-url" value="<?php echo $selected_source == 'Book' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />    </div><div id="gmc-source-mag">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
        <?php _e('Name of magazine', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-mag-name" value="<?php echo $selected_source == 'Magazine' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />    </div><div id="gmc-source-mag-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
        <?php _e('Magazine website', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-mag-url" value="<?php echo $selected_source == 'Magazine' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />    </div><div id="gmc-source-website">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
        <?php _e('Name of website', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-website-name" value="<?php echo $selected_source == 'Website' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />    </div><div id="gmc-source-website-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
        <?php _e('Website URL', 'gmc'); ?>
      </label><input class="gmc-admin-author" name="gmc-source-website-url" value="<?php echo $selected_source == 'Website' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />    </div>  </div><hr /><br /><div class="gmc-half">
<div class="padder">
    </div><div id="gmc-standard-region-area">
<label class="gmc-admin-label">
        <?php _e('Does the recipe come from a particular region?', 'gmc'); ?>
      </label>      (<a href="#" id="gmc-show-custom-region"><?php _e('Region not listed?', 'gmc'); ?></a>)
      <?php $selectedregion = wp_get_object_terms($post->ID, 'gmc_region'); ?>
<select class="gmc-admin-recipe-details" id="gmc-recopt-region" name="gmc-recopt-region">
<option value="">
          <?php _e('No', 'gmc'); ?>
<optgroup label="<?php echo __('General - Continent', 'gmc'); ?>">
            <?php echo gmc_option_list(array("African" => __('African', 'gmc'), "American" => __('American', 'gmc'), "Asian" => __('Asian', 'gmc'), "European" => __('European', 'gmc'), "Oceanian" => __('Oceanian', 'gmc'), "South American" => __('South American', 'gmc')), $selectedregion[0]->name); ?>

          </optgroup><optgroup label="<?php echo __('Specific - Region', 'gmc'); ?>">
            <?php echo gmc_option_list(array("British" => __('British', 'gmc'), "Canadian" => __('Canadian', 'gmc'), "Chinese" => __('Chinese', 'gmc'), "Croatian" => __('Croatian', 'gmc'), "French" => __('French', 'gmc'), "German" => __('German', 'gmc'), "Greek" => __('Greek', 'gmc'), "Indian" => __('Indian', 'gmc'), "Indonesian" => __('Indonesian', 'gmc'), "Irish" => __('Irish', 'gmc'), "Italian" => __('Italian', 'gmc'), "Jamaican" => __('Jamaican', 'gmc'), "Japanese" => __('Japanese', 'gmc'), "Lebanese" => __('Lebanese', 'gmc'), "Malaysian" => __('Malaysian', 'gmc'), "Mexican" => __('Mexican', 'gmc'), "Moroccan" => __('Moroccan', 'gmc'), "Russian" => __('Russian', 'gmc'), "Spanish" => __('Spanish', 'gmc'), "Swedish" => __('Swedish', 'gmc'), "Thai" => __('Thai', 'gmc'), "Turkish" => __('Turkish', 'gmc'), "Vietnamese" => __('Vietnamese', 'gmc')), $selectedregion[0]->name); ?>

          </optgroup>        </option>      </select>    </div><div id="gmc-custom-region-area">
<label class="gmc-admin-label">
        <?php _e('Custom Region', 'gmc'); ?>
      </label>      (<a href="#" id="gmc-show-standard-region"><?php _e('Show region list', 'gmc'); ?></a>)     
            <?php if (get_post_meta($post->ID, 'gmc-use-custom-region', true)) { ?>

<input class="gmc-admin-fullline" id="gmc-custom-region" name="gmc-custom-region" value="<?php echo get_post_meta($post->ID, 'gmc-recopt-region', true); ?>" />            <?php } else { ?>

<input class="gmc-admin-fullline" id="gmc-custom-region" name="gmc-custom-region" />      <?php } ?>
<input id="gmc-use-custom-region" name="gmc-use-custom-region" type="hidden" value="<?php echo get_post_meta($post->ID, 'gmc-use-custom-region', true); ?>" />    </div><div>
<label class="gmc-admin-label">
        <?php _e('When would you eat this recipe?', 'gmc'); ?>
      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_course", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_course'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-when[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
        <?php _e('Is the recipe for a specific occasion?', 'gmc')             ; ?>
      </label>      <img class="gmc-tooltip" src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="<?php _e('Help', 'gmc') ?>" title="<?php _e('e.g. pumpkin soup for Halloween', 'gmc');?>" />
<div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_occasion", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_occasion'); ?>
      </div>            <?php foreach($gmallparams as $gmp) { ?>

<p>
          <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-occasion[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
          <?php echo $gmp->name; ?>

        </p>      <?php } ?>
    </div>  </div><div class="gmc-half">
<div>
<label class="gmc-admin-label">
        The recipe is...             
      </label>      <?php echo '<img class="gmc-tooltip" src="'.gmc_plugin_url().'/images/help.png'.'" alt="'. __('Help', 'gmc').'" title="<strong>'.__('Child friendly', 'gmc').'</strong> '.__('Can be made by children with adult supervision. No knives, naked flames, etc.', 'gmc').'<br/><br/>
      <strong>'.__('Freezable', 'gmc').'</strong> '.__('Can be frozen (for storage or serving).', 'gmc').'<br/><br/>
      <strong>'.__('Gourmet', 'gmc').'</strong> '.__("Food that is deemed highly refined and sophisticated. Not something you'd make for eating in front of the TV.", 'gmc').'<br/><br/>
      <strong>'.__('Pre-preparable', 'gmc').'</strong> '.__('The recipe could be taken on a picnic. No cooking required.', 'gmc').'<br/><br/>
      <strong>'.__('Serve cold', 'gmc').'</strong> '.__('This recipe can or should be served cold (refrigerated or frozen).', 'gmc').'<br/><br/>
      <strong>'.__('Serve hot', 'gmc').'</strong> '.__('This recipe can (or should) be served hot.', 'gmc').'"/>';?>
<div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_misc", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_misc'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-other[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
        <?php _e('Can the recipe be associated with any dietary requirements?', 'gmc'); ?>
      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_dietary", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_dietary'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-dietary[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
        <?php _e('Can the recipe be associated with any allergies?', 'gmc'); ?>
      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_allergy", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_allergy'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-allergies[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div>  </div></div><div style="clear:both">
</div>