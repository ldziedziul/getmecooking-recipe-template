<?php global $post; ?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>
<?php $steps=get_posts('post_status=publish&post_type=gmc_recipestep&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID); ?>
<?php if(!empty($gmcCssPrint)) { ?>

<input class="gmcPrintCssPath" type="hidden" value="<?php echo gmc_plugin_url().'/css/recipe-template.css?ver='.GMC_VERSION; ?>" /><?php } ?>
<div class="gmc-recipe" id="gmc-print-<?php echo $post->ID; ?>" itemscope itemtype="http://schema.org/Recipe" style="<?php echo gmc_recipe_main_style(); ?>">
  <?php $parent_title = $tmppost->post_title; ?>
  <?php $recipe_title = get_the_title(); ?>
    <?php if ($showtitle) { ?>

<h2 class="gmc-recipe-title <?php echo strtolower($recipe_title) == strtolower($parent_title) ? 'gmc-web-hidden' : ''; ?>" itemprop="name"><?php echo $recipe_title; ?></h2><div class="gmc-print-area">
            <?php if ($steps) { ?>

                <?php foreach ($steps as $step) { ?>

          <?php $thumbid=get_post_thumbnail_id($step->ID); ?>
                    <?php if ($thumbid) { ?>

            <?php $hasStepImage = true; ?>
            <?php break; ?>
          <?php } ?>
        <?php } ?>
      <?php } ?>
            <?php if (!$hasStepImage && !$large_image_url) { ?>

<a class="gmc-print-options gmc-print-hidden" href="#" id="gmc-print-text-<?php echo $post->ID; ?>">
<img src="<?php echo gmc_plugin_url() . '/images/print.png'; ?>" />          Print recipe
        </a>            <?php } else { ?>

<a class="gmc-print-options gmc-print-hidden" href="#" id="gmc-print-options-<?php echo $post->ID; ?>">
<img src="<?php echo gmc_plugin_url() . '/images/print.png'; ?>" />          Print recipe
        </a><ul class="gmc-print-options-box" id="gmc-print-options-box-<?php echo $post->ID; ?>" style="display:none">
                    <?php if ($hasStepImage) { ?>

<li>
<a class="gmc-print-full gmc-print-hidden" href="#" id="gmc-print-full-<?php echo $post->ID; ?>">
                Print with all photos
              </a>            </li>          <?php } ?>
                    <?php if ($large_image_url) { ?>

<li>
<a class="gmc-print-main gmc-print-hidden" href="#" id="gmc-print-main-<?php echo $post->ID; ?>">
                Print with main photo 
              </a>            </li>          <?php } ?>
<li>
<a class="gmc-print-text gmc-print-hidden" href="#" id="gmc-print-text-<?php echo $post->ID; ?>">
              Print text only
            </a>          </li>        </ul>      <?php } ?>
    </div>  <?php } ?>
<div class="gmc-clear-both">
  </div><div class="gmc-recipe-main-photo">
<a href="<?php echo $large_image_url[0]; ?>">
      <?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => "$recipe_title", 'title' => "$recipe_title")); ?>
    </a>  </div>  <?php $prepHour = get_post_meta($post->ID,"gmc-prep-time-hours",true); ?>
  <?php $prepMinute = get_post_meta($post->ID,"gmc-prep-time-mins",true); ?>
  <?php $cookHour = get_post_meta($post->ID,"gmc-cooking-time-hours",true); ?>
  <?php $cookMinute = get_post_meta($post->ID,"gmc-cooking-time-mins",true); ?>
<table class="gmc-recipe-summary <?php echo empty($large_image_url[0]) ? 'no-main-photo' : ''; ?>">
    <?php $servings = get_post_meta($post->ID,"gmc-nr-servings",true); ?>
        <?php if (!empty($servings)) { ?>

<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-serves") ? get_option("gmc-label-serves") . ':' : "Serves:"; ?>

        </td><td itemprop="recipeYield"><?php echo $servings; ?></td></tr>    <?php } ?>
<tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-prep-time") ? get_option("gmc-label-prep-time") . ':' : "Prep time:"; ?>

      </td>      <?php $searchEngineTime = search_engine_time($prepHour, $prepMinute); ?><td content="<?php echo $searchEngineTime; ?>" itemprop="prepTime"><?php echo gmc_time($prepHour,$prepMinute); ?></td></tr><tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-cook-time") ? get_option("gmc-label-cook-time") . ':' : "Cook time:"; ?>

      </td>      <?php $searchEngineTime = search_engine_time($cookHour, $cookMinute); ?><td content="<?php echo $searchEngineTime; ?>" itemprop="cookTime"><?php echo gmc_time($cookHour,$cookMinute); ?></td></tr><tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-total-time") ? get_option("gmc-label-total-time") . ':' : "Total time:"; ?>

      </td>      <?php $searchEngineTime = search_engine_total_time($prepHour, $prepMinute, $cookHour, $cookMinute); ?><td content="<?php echo $searchEngineTime; ?>" itemprop="totalTime"><?php echo gmc_total_time($prepHour,$prepMinute,$cookHour,$cookMinute); ?></td></tr>    <?php $allergies = wp_get_object_terms($post->ID, 'gmc_allergy'); ?>
        <?php if (!empty($allergies)) { ?>

<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-allergy") ? get_option("gmc-label-allergy") . ':' : "Allergy:"; ?>

          <?php $output = ''; ?>
                    <?php foreach($allergies as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp->name, $large_image_url, 'allergy').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $dietary = wp_get_object_terms($post->ID, 'gmc_dietary'); ?>
        <?php if (!empty($dietary)) { ?>

<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-dietary") ? get_option("gmc-label-dietary") . ':' : "Dietary:"; ?>

          <?php $output = ''; ?>
                    <?php foreach($dietary as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp->name, $large_image_url, 'dietary').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $mealType = wp_get_object_terms($post->ID, 'gmc_course'); ?>
        <?php if (!empty($mealType)) { ?>

<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-meal-type") ? get_option("gmc-label-meal-type") . ':' : "Meal type:"; ?>

          <?php $output = ''; ?>
                    <?php foreach($mealType as $gmp) { ?>

            <?php $output.= '<span itemprop="recipeCategory">'. gmc_recipe_filter_link($gmp->name, $large_image_url, 'course').'</span>, '; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $misc = wp_get_object_terms($post->ID, 'gmc_misc'); ?>
        <?php if (!empty($misc)) { ?>

<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-misc") ? get_option("gmc-label-misc") . ':' : "Misc:"; ?>

          <?php $output = ''; ?>
                    <?php foreach($misc as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp->name, $large_image_url, 'misc').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $occasion = wp_get_object_terms($post->ID, 'gmc_occasion'); ?>
        <?php if (!empty($occasions)) { ?>

<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-occasion") ? get_option("gmc-label-occasion") . ':' : "Occasion:"; ?>

          <?php $output = ''; ?>
                    <?php foreach($occasion as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp->name, $large_image_url, 'occasion').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $region = wp_get_object_terms($post->ID, 'gmc_region'); ?>
        <?php if (!empty($region)) { ?>

      <?php $region = $region[0]->name; ?>
        <?php } else { ?>

      <?php $region = 'Worldwide'; ?>
    <?php } ?>
<tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-region") ? get_option("gmc-label-region") . ':' : "Region:"; ?>

      </td><td itemprop="recipeCuisine">
        <?php echo gmc_recipe_filter_link($region, $large_image_url, 'region'); ?>

      </td>    </tr>    <?php $author = get_post_meta($post->ID, 'gmc-source-name', true); ?>
        <?php if (!empty($author)) { ?>

      <?php $author_url = get_post_meta($post->ID, 'gmc-source-url', true); ?>
            <?php if(!empty($author_url)) { ?>

        <?php $author = gmc_create_author_link($author, $author_url); ?>
      <?php } ?>
<tr>
<td class="gmc-heading">
          <?php $source_type = get_post_meta($post->ID, 'gmc-source-type', true); ?>
                    <?php if($source_type == 'Author') { ?>

            <?php echo get_option("gmc-label-source-author") ? get_option("gmc-label-source-author") . ':' : "By author:"; ?>

                    <?php } elseif($source_type == 'Book') { ?>

            <?php echo get_option("gmc-label-source-book") ? get_option("gmc-label-source-book") . ':' : "From book:"; ?>

                    <?php } elseif($source_type == 'Magazine') { ?>

            <?php echo get_option("gmc-label-source-mag") ? get_option("gmc-label-source-mag") . ':' : "From magazine:"; ?>

                    <?php } else { ?>

            <?php echo get_option("gmc-label-source-website") ? get_option("gmc-label-source-website") . ':' : "Website:"; ?>

          <?php } ?>
        </td><td>
          <?php echo $author; ?>

        </td>      </tr>    <?php } ?>
  </table>  <?php $gmc_description = get_post_meta($post->ID,"gmc-description",true); ?>
    <?php if(!empty($gmc_description)) { ?>

<div class="gmc-recipe-description" itemprop="description">
      <?php echo $gmc_description; ?>

    </div>  <?php } ?>
  <?php $ingredients=get_posts('post_status=publish&post_type=gmc_recipeingredient&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID); ?>
    <?php if ($ingredients) { ?>

<div class="gmc-recipe-ingredients"><h2 class="gmc-recipe-subtitle"><?php echo get_option("gmc-label-ingredients") ? get_option("gmc-label-ingredients") : "Ingredients"; ?></h2><?php $distinctGroupNames = gmc_distinct_group_names($post->ID); ?>
            <?php if (!empty($distinctGroupNames)) { ?>

<ul class="gmc-ingredient-list">
                    <?php foreach ($ingredients as $ingredient) { ?>

            <?php $inGroup = get_post_meta($ingredient->ID, "gmc-ingredientgroup", true); ?>
                        <?php if(!$inGroup) { ?>

              <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                            <?php if(!$optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>                            <?php } else { ?>

                <?php $containsOptional = true; ?>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        </ul>                <?php if($containsOptional) { ?>

<h3 class="gmc-recipe-subtitle">
            Optional
          </h3><ul class="gmc-ingredient-list">
                        <?php foreach ($ingredients as $ingredient) { ?>

              <?php $inGroup = get_post_meta($ingredient->ID, "gmc-ingredientgroup", true); ?>
                            <?php if(!$inGroup) { ?>

                <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                                <?php if($optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>                <?php } ?>
              <?php } ?>
            <?php } ?>
          </ul>        <?php } ?>
                <?php foreach($distinctGroupNames as $groupName) { ?>

          <?php $containsOptional = false; ?>
          <?php $containsGroup = false; ?>
                    <?php foreach ($ingredients as $ingredient) { ?>

            <?php $ingredient_group_name = get_post_meta($ingredient->ID, "gmc-ingredientgroup", true); ?>
                        <?php if($ingredient_group_name == $groupName)              { ?>

              <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                            <?php if($optional) { ?>

                <?php $containsOptional = true; ?>
                            <?php } else { ?>

                <?php $containsGroup = true; ?>
              <?php } ?>
            <?php } ?>
          <?php } ?>
                    <?php if($containsGroup) { ?>

<h3 class="gmc-recipe-subtitle"><?php echo $groupName; ?></h3><ul class="gmc-ingredient-list">
                            <?php foreach ($ingredients as $ingredient) { ?>

                <?php $ingredient_group_name = get_post_meta($ingredient->ID, "gmc-ingredientgroup", true); ?>
                                <?php if($ingredient_group_name == $groupName) { ?>

                  <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                                    <?php if(!$optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </ul>          <?php } ?>
                    <?php if($containsOptional) { ?>

<h3 class="gmc-recipe-subtitle"><?php echo $groupName; ?>

                (Optional)</h3><ul class="gmc-ingredient-list">
                            <?php foreach ($ingredients as $ingredient) { ?>

                <?php $ingredient_group_name = get_post_meta($ingredient->ID, "gmc-ingredientgroup", true); ?>
                                <?php if($ingredient_group_name == $groupName) { ?>

                  <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                                    <?php if($optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </ul>          <?php } ?>
        <?php } ?>
            <?php } else        { ?>

<ul class="gmc-ingredient-list">
                    <?php foreach ($ingredients as $ingredient) { ?>

            <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                        <?php if(!$optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>                        <?php } else { ?>

              <?php $containsOptional = true; ?>
            <?php } ?>
          <?php } ?>
        </ul>                <?php if($containsOptional) { ?>

<h3 class="gmc-recipe-subtitle">
            Optional
          </h3><ul class="gmc-ingredient-list">
                        <?php foreach ($ingredients as $ingredient) { ?>

              <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                            <?php if($optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>              <?php } ?>
            <?php } ?>
          </ul>        <?php } ?>
      <?php } ?>
    </div>  <?php } ?>
    <?php if ($steps) { ?>

        <?php if (!empty($post->post_content) && get_option('gmc-note-position') != '1') { ?>

<h2 class="gmc-recipe-subtitle"><?php echo get_option("gmc-label-note") ? get_option("gmc-label-note") : "Note"; ?></h2>      <?php echo wpautop(get_the_content()); ?>

    <?php } ?>
<div class="gmc-recipe-steps">
<h2 class="gmc-recipe-subtitle">
        <?php echo get_option("gmc-label-directions") ? get_option("gmc-label-directions") : "Directions"; ?>

      </h2>            <?php if (get_option('gmc-label-step-position') == '1') { ?>

        <?php $i=0; ?>
<table class="gmc-step-list">
                    <?php foreach ($steps as $step) { ?>

            <?php $i++                 ; ?>
<tr class="gmc-step-list-item">
<td class="<?php echo gmc_label_step_class($i); ?>">
                <?php echo gmc_label_step($i); ?>

              </td>              <?php $thumbid=get_post_thumbnail_id($step->ID); ?>
                            <?php if ($thumbid) { ?>

                <?php $altText = $recipeTitle; ?>
                <?php $large_image_url = wp_get_attachment_image_src($thumbid, 'large'); ?>
                <?php $gmc_step_photo_position = get_option('gmc-step-photo-position', 1)         ; ?>
<td>
                                    <?php if($gmc_step_photo_position == '0')                                { ?>

<a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo'))                 ; ?></a><div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div>                                    <?php } elseif($gmc_step_photo_position == '1')                                      { ?>

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><td><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo gmc-img-right'))               ; ?></a></td>                                    <?php } elseif($gmc_step_photo_position == '2')                      { ?>

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo')); ?></a>                                    <?php } else { ?>

<a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo')); ?></a><td class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></td>                  <?php } ?>
                </td>                            <?php } else { ?>

<td class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></td>              <?php } ?>
            </tr>          <?php } ?>
        </table>            <?php } else { ?>

        <?php $i=0; ?>
<table class="gmc-step-list">
                    <?php foreach ($steps as $step) { ?>

            <?php $i++; ?>
<tr>
<td class="gmc-step-list-title" colspan="2">
                <?php echo gmc_label_step($i); ?>

              </td>            </tr><tr class="gmc-step-list-item">
              <?php $thumbid=get_post_thumbnail_id($step->ID); ?>
                            <?php if ($thumbid) { ?>

                <?php $altText = $recipeTitle; ?>
                <?php $large_image_url = wp_get_attachment_image_src($thumbid, 'large'); ?>
                <?php $gmc_step_photo_position = get_option('gmc-step-photo-position', 1); ?>
<td>
                                    <?php if($gmc_step_photo_position == '0')                                { ?>

<a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo'))                 ; ?></a><div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div>                                    <?php } elseif($gmc_step_photo_position == '1')                                      { ?>

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><td><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo gmc-img-right')); ?></a></td>                                    <?php } elseif($gmc_step_photo_position == '2')                      { ?>

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo')); ?></a>                                    <?php } else { ?>

<a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo')); ?></a><td class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></td>                  <?php } ?>
                </td>                            <?php } else { ?>

<td class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></td>              <?php } ?>
            </tr>          <?php } ?>
        </table>      <?php } ?>
    </div>        <?php if (!empty($post->post_content) && get_option('gmc-note-position') == '1') { ?>

<h2 class="gmc-recipe-subtitle"><?php echo get_option("gmc-label-note") ? get_option("gmc-label-note") : "Note"; ?></h2>      <?php echo wpautop(get_the_content()); ?>

    <?php } ?>
  <?php } ?>
</div><?php if (get_option('gmc-hide-powered-by') != 'Y') { ?>

<div class="gmc-powered-by">
    <a href="http://www.getmecooking.com/recipe-template">Powered by GetMeCooking</a>
  </div><?php } ?>
