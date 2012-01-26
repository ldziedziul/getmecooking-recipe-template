<?php global $post; ?>
<input id="gmc-selected-tab" name="gmc_selected_tab" type="hidden" /><input id="gmc-ingredient-to-delete" name="gmc_ingredient_to_delete" type="hidden" /><input id="gmc-step-to-delete" name="gmc_step_to_delete" type="hidden" /><div class="gmc-full">
<div>
<label class="gmc-admin-recipe-details">
      Number of servings:
    </label><input class="gmc-admin-input" name="gmc-nr-servings" value="<?php echo get_post_meta($post->ID, 'gmc-nr-servings', true); ?>" /><label>
      (e.g. 1 or 1 - 2)
<span class="gmc-tooltip">
        <img src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="Help" />
<b><em>
          </em>People like information. The more useful your blog is, the more engaged your visitors will be.
        </b>      </span>    </label>  </div><div>
<label class="gmc-admin-recipe-details">
      Total preparation time:
    </label><input class="gmc-admin-input" name="gmc-prep-time-hours" value="<?php echo get_post_meta($post->ID, 'gmc-prep-time-hours', true); ?>" /><label>
      hours
    </label><input class="gmc-admin-input" name="gmc-prep-time-mins" value="<?php echo get_post_meta($post->ID, 'gmc-prep-time-mins', true); ?>" /><label>
      minutes
    </label>  </div><div>
<label class="gmc-admin-recipe-details">
      Total cooking time:
    </label><input class="gmc-admin-input" name="gmc-cooking-time-hours" value="<?php echo get_post_meta($post->ID, 'gmc-cooking-time-hours', true); ?>" /><label>
      hours
    </label><input class="gmc-admin-input" name="gmc-cooking-time-mins" value="<?php echo get_post_meta($post->ID, 'gmc-cooking-time-mins', true); ?>" /><label>
      minutes
    </label>  </div><br /><div>
  </div><label class="gmc-admin-label">
<span>
<b>
        Recipe source (if applicable):
      </b>    </span>    <?php $selected_source =get_post_meta($post->ID, 'gmc-source-type', true); ?>
<select class="gmc-admin-halfline" id="gmc-source-type" name="gmc-source-type">
<option value="">
        No source
        <?php echo gmc_option_list(array("Author" => "Author", "Book" => "Book", "Magazine" => "Magazine", "Website" => "Website"), $selected_source); ?>

      </option>    </select>  </label><div id="gmc-source-author">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
      Name of author:       
    </label><input class="gmc-admin-author" name="gmc-source-author-name" value="<?php echo $selected_source == 'Author' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />  </div><div id="gmc-source-author-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
      Author website:
    </label><input class="gmc-admin-author" name="gmc-source-author-url" value="<?php echo $selected_source == 'Author' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />  </div><div id="gmc-source-book">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
      Name of book:
    </label><input class="gmc-admin-author" name="gmc-source-book-name" value="<?php echo $selected_source == 'Book' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />  </div><div id="gmc-source-book-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
      Book website:
    </label><input class="gmc-admin-author" name="gmc-source-book-url" value="<?php echo $selected_source == 'Book' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />  </div><div id="gmc-source-mag">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
      Name of magazine:
    </label><input class="gmc-admin-author" name="gmc-source-mag-name" value="<?php echo $selected_source == 'Magazine' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />  </div><div id="gmc-source-mag-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
      Magazine website:
    </label><input class="gmc-admin-author" name="gmc-source-mag-url" value="<?php echo $selected_source == 'Magazine' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />  </div><div id="gmc-source-website">
<label class="gmc-admin-recipe-details" id="gmc-source-name-label">
      Name of website:
    </label><input class="gmc-admin-author" name="gmc-source-website-name" value="<?php echo $selected_source == 'Website' ? get_post_meta($post->ID, 'gmc-source-name', true) : ''; ?>" />  </div><div id="gmc-source-website-url">
<label class="gmc-admin-recipe-details" id="gmc-source-url-label">
      Website URL:
    </label><input class="gmc-admin-author" name="gmc-source-website-url" value="<?php echo $selected_source == 'Website' ? get_post_meta($post->ID, 'gmc-source-url', true) : ''; ?>" />  </div><hr /><br /><div class="gmc-half">
<div class="padder">
    </div><div id="gmc-standard-region-area">
<label class="gmc-admin-label">
<span>
<b>
            Does the recipe come from a particular region?
          </b>        </span>        (<a href="#" id="gmc-show-custom-region">Region not listed?</a>)
      </label>      <?php $selectedregion = wp_get_object_terms($post->ID, 'gmc_region'); ?>
<select class="gmc-admin-fullline" id="gmc-recopt-region" name="gmc-recopt-region">
<option value="">
          No (Worldwide)
<optgroup label="General - Continent">
            <?php echo gmc_option_list(array("African" => "African", "American" => "American", "Asian" => "Asian", "European" => "European", "Oceanian" => "Oceanian", "South American" => "South American"), $selectedregion[0]->name); ?>

          </optgroup><optgroup label="Specific - Region">
            <?php echo gmc_option_list(array("British" => "British", "Canadian" => "Canadian", "Chinese" => "Chinese", "Croatian" => "Croatian", "French" => "French", "German" => "German", "Greek" => "Greek", "Indian" => "Indian", "Indonesian" => "Indonesian", "Irish" => "Irish", "Italian" => "Italian", "Jamaican" => "Jamaican", "Japanese" => "Japanese", "Lebanese" => "Lebanese", "Malaysian" => "Malaysian", "Mexican" => "Mexican", "Moroccan" => "Moroccan", "Russian" => "Russian", "Spanish" => "Spanish", "Swedish" => "Swedish", "Thai" => "Thai", "Turkish" => "Turkish", "Vietnamese" => "Vietnamese"), $selectedregion[0]->name); ?>

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
            When would you eat this recipe?
          </b>        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_course", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_course'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-when[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            Is the recipe for a specific occasion?
<span class="gmc-tooltip">
                <img src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="Help" />
<b><em>
                  </em>e.g. pumpkin soup for Halloween
                </b>              </span>          </b>        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_occasion", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_occasion'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-occasion[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div>  </div><div class="gmc-half">
<div>
<label class="gmc-admin-label">
<span>
<b>
            The recipe is...
<span class="gmc-tooltip">
                <img src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="Help" />
<b><em>
                  </em><strong>
                    Child friendly:
                  </strong>                  Can be made by children with adult supervision. No knives, naked flames, etc.
<br /><br /><strong>
                    Freezable:
                  </strong>                  Can be frozen (for storage or serving).
<br /><br /><strong>
                    Gourmet:
                  </strong>                  Food that is deemed highly refined and sophisticated. Not something you'd make for eating in front of the TV.
<br /><br /><strong>
                    Pre-preparable:
                  </strong>                  The recipe could be taken on a picnic. No cooking required.
<br /><br /><strong>
                    Serve Cold:
                  </strong>                  This recipe can or should be served cold (refrigerated or frozen).
<br /><br /><strong>
                    Serve Hot:
                  </strong>                  This recipe can (or should) be served hot.
                </b>              </span>          </b>        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_misc", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_misc'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-other[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            Can the recipe be associated with any dietary requirements?
          </b>        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_dietary", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_dietary'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-dietary[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div><div>
<label class="gmc-admin-label">
<span>
<b>
            Can the recipe be associated with any allergies?
          </b>        </span>      </label><div class="gmc-admin-fullline">
        <?php $gmallparams=get_terms("gmc_allergy", array("hide_empty" => 0)); ?>
        <?php $gmparams = wp_get_object_terms($post->ID, 'gmc_allergy'); ?>
                <?php foreach($gmallparams as $gmp) { ?>

<p>
            <input value="<?php echo $gmp->name; ?>" name="gmc-recopt-allergies[]" type="checkbox" <?php echo (in_array_field($gmp->name, 'name', $gmparams) ? "checked='checked'" : ""); ?> />
            <?php echo $gmp->name; ?>

          </p>        <?php } ?>
      </div>    </div>  </div></div><div style="clear:both">
</div>