<?php global $post; ?>
<div class="gmc-recipe" id="gmc-print-<?php echo $post->ID; ?>" itemscope itemtype="http://schema.org/Recipe" style="<?php echo gmc_recipe_main_style(); ?>">
  <?php $recipeTitle = get_the_title(); ?>
    <?php if ($showtitle) { ?>

<h2 class="gmc-recipe-title" itemprop="name"><?php echo $recipeTitle; ?></h2><a class="gmc-printable gmc-print-hidden" href="#" id="gmc-printable-<?php echo $post->ID; ?>">
<img src="<?php echo gmc_plugin_url() . '/images/print.png'; ?>" />      Print recipe
    </a>  <?php } ?>
<div class="gmc-clear-both">
  </div><div class="gmc-recipe-main-photo">
    <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>
<a href="<?php echo $large_image_url[0]; ?>">
      <?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => "$recipeTitle", 'title' => "$recipeTitle")); ?>
    </a>  </div>  <?php $prepHour = get_post_meta($post->ID,"gmc-prep-time-hours",true); ?>
  <?php $prepMinute = get_post_meta($post->ID,"gmc-prep-time-mins",true); ?>
  <?php $cookHour = get_post_meta($post->ID,"gmc-cooking-time-hours",true); ?>
  <?php $cookMinute = get_post_meta($post->ID,"gmc-cooking-time-mins",true); ?>
<table class="gmc-recipe-summary <?php echo empty($large_image_url[0]) ? 'no-main-photo' : ''; ?>">
<tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-serves") ? get_option("gmc-label-serves") . ':' : "Serves:";; ?>

      </td><td itemprop="recipeYield"><?php echo get_post_meta($post->ID,"gmc-nr-servings",true); ?></td></tr><tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-prep-time") ? get_option("gmc-label-prep-time") . ':' : "Prep time:";; ?>

      </td>      <?php $searchEngineTime = search_engine_time($prepHour, $prepMinute); ?><td content="<?php echo $searchEngineTime; ?>" itemprop="prepTime"><?php echo gmc_time($prepHour,$prepMinute); ?></td></tr><tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-cook-time") ? get_option("gmc-label-cook-time") . ':' : "Cook time:";; ?>

      </td>      <?php $searchEngineTime = search_engine_time($cookHour, $cookMinute); ?><td content="<?php echo $searchEngineTime; ?>" itemprop="cookTime"><?php echo gmc_time($cookHour,$cookMinute); ?></td></tr><tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-total-time") ? get_option("gmc-label-total-time") . ':' : "Total time:";; ?>

      </td>      <?php $searchEngineTime = search_engine_total_time($prepHour, $prepMinute, $cookHour, $cookMinute); ?><td content="<?php echo $searchEngineTime; ?>" itemprop="totalTime"><?php echo gmc_total_time($prepHour,$prepMinute,$cookHour,$cookMinute); ?></td></tr>    <?php $allergies = get_post_meta($post->ID,'gmc-recopt-allergies',true); ?>
        <?php if (!empty($allergies)) { ?>

      <?php $gmparams=(array)unserialize($allergies); ?>
<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-allergy") ? get_option("gmc-label-allergy") . ':' : "Allergy:";; ?>

          <?php $output = ''; ?>
                    <?php foreach($gmparams as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp, 'allergy').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $dietry = get_post_meta($post->ID,'gmc-recopt-dietry',true); ?>
        <?php if (!empty($dietry)) { ?>

      <?php $gmparams=(array)unserialize($dietry); ?>
<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-dietry") ? get_option("gmc-label-dietry") . ':' : "Dietry:";; ?>

          <?php $output = ''; ?>
                    <?php foreach($gmparams as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp, 'dietry').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $mealType = get_post_meta($post->ID,'gmc-recopt-when',true); ?>
        <?php if (!empty($mealType)) { ?>

      <?php $gmparams=(array)unserialize($mealType); ?>
<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-meal-type") ? get_option("gmc-label-meal-type") . ':' : "Meal type:";; ?>

          <?php $output = ''; ?>
                    <?php foreach($gmparams as $gmp) { ?>

            <?php $output.= '<span itemprop="recipeCategory">'. gmc_recipe_filter_link($gmp, 'course').'</span>, '; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $misc = get_post_meta($post->ID,'gmc-recopt-other',true); ?>
        <?php if (!empty($misc)) { ?>

      <?php $gmparams=(array)unserialize($misc); ?>
<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-misc") ? get_option("gmc-label-misc") . ':' : "Misc:";; ?>

          <?php $output = ''; ?>
                    <?php foreach($gmparams as $gmp) { ?>

          <?php } ?>
          <?php $output.= gmc_recipe_filter_link($gmp, 'misc').", "; ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $occasions = get_post_meta($post->ID,'gmc-recopt-occasion',true); ?>
        <?php if (!empty($occasions)) { ?>

      <?php $gmparams=(array)unserialize($occasions); ?>
<tr>
<td class="gmc-heading">
          <?php echo get_option("gmc-label-occasion") ? get_option("gmc-label-occasion") . ':' : "Occasion:";; ?>

          <?php $output = ''; ?>
                    <?php foreach($gmparams as $gmp) { ?>

            <?php $output.= gmc_recipe_filter_link($gmp, 'occasion').", "; ?>
          <?php } ?>
        </td><td>
          <?php echo substr($output, 0, strlen($output) -2); ?>

        </td>      </tr>    <?php } ?>
    <?php $region = get_post_meta($post->ID, 'gmc-recopt-region', true); ?>
        <?php if (!$region) { ?>

      <?php $region = 'Worldwide'; ?>
    <?php } ?>
<tr>
<td class="gmc-heading">
        <?php echo get_option("gmc-label-region") ? get_option("gmc-label-region") . ':' : "Region:";; ?>

      </td><td itemprop="recipeCuisine">
        <?php echo gmc_recipe_filter_link($region, 'region'); ?>

      </td>    </tr>  </table><div class="gmc-recipe-description" itemprop="description">
    <?php global $gmc_skip_content; ?>
    <?php $gmc_skip_content=true; ?>
    <?php the_content(); ?>
    <?php $gmc_skip_content=false; ?>
  </div>  <?php $ingredients=get_posts('post_status=publish&post_type=recipeingredient&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID); ?>
    <?php if ($ingredients) { ?>

<div class="gmc-recipe-ingredients"><h2 class="gmc-recipe-subtitle"><?php echo get_option("gmc-label-ingredients") ? get_option("gmc-label-ingredients") . ':' : "Ingredients:";; ?></h2><?php $distinctGroupNames = gmc_distinct_group_names($post->ID); ?>
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

<h3 class="gmc-recipe-subtitle"><?php echo $groupName; ?></h3><ul class="gmc-ingredient-list">
                        <?php foreach ($ingredients as $ingredient) { ?>

              <?php $ingredient_group_name = get_post_meta($ingredient->ID, "gmc-ingredientgroup", true); ?>
                            <?php if($ingredient_group_name == $groupName) { ?>

                <?php $optional=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true); ?>
                                <?php if(!$optional) { ?>

<li class="gmc-ingredient-list-item" itemprop="ingredients"><?php echo print_ingredient_description($ingredient); ?></li>                                <?php } else { ?>

                  <?php $containsOptional = true; ?>
                <?php } ?>
              <?php } ?>
            <?php } ?>
          </ul>                    <?php if($containsOptional) { ?>

<h3 class="gmc-recipe-subtitle"><?php echo $groupName; ?> (Optional)</h3><ul class="gmc-ingredient-list">
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
  <?php $steps=get_posts('post_status=publish&post_type=recipestep&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID); ?>
    <?php if ($steps) { ?>

<div class="gmc-recipe-steps">
<h2 class="gmc-recipe-subtitle">
        <?php echo get_option("gmc-label-directions") ? get_option("gmc-label-directions") . ':' : "Directions";; ?>

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

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><td><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo'))               ; ?></a></td>                                    <?php } elseif($gmc_step_photo_position == '2')                      { ?>

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

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><td><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo'))               ; ?></a></td>                                    <?php } elseif($gmc_step_photo_position == '2')                      { ?>

<div class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></div><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo')); ?></a>                                    <?php } else { ?>

<a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail($step->ID, "medium", array('class' => 'gmc-step-photo')); ?></a><td class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></td>                  <?php } ?>
                </td>                            <?php } else { ?>

<td class="gmc-step-desc" itemprop="recipeInstructions"><?php echo nl2br($step->post_content); ?></td>              <?php } ?>
            </tr>          <?php } ?>
        </table>      <?php } ?>
    </div>  <?php } ?>
</div><?php if (get_option('gmc-hide-powered-by') != 'Y') { ?>

<div class="gmc-powered-by">
    <a href="http://www.getmecooking.com">Powered by GetMeCooking</a>
  </div><?php } ?>
