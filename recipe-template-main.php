<script>
  var confirmResetCssMessage = "<?php _e('Are you sure you want to reset the CSS? Any changes you have made will be lost.', 'gmc'); ?>";
  var confirmResetCssTitle = "<?php _e('Confirmation', 'gmc'); ?>";
</script>
<?php global $post; ?>
<?php gmc_save_settings(); ?>
<div class="metabox-holder">
<div class="postbox-container">
<span id="gmc-logo">
      <img src="<?php echo gmc_plugin_url().'/images/icon.png'; ?>" alt="<?php _e('GetMeCooking logo', 'gmc')?>" />
    </span><h2><?php _e('GetMeCooking Recipe Template Settings', 'gmc'); ?></h2>        <?php if (!is_gmc_premium_active()) { ?>

<div class="postbox">
<h3>
          <?php _e('Premium Plugin', 'gmc'); ?>
        </h3><div class="inside">
<p>
            <?php echo sprintf(__('Did you know that we have a <a href="%s">premium plugin</a> that adds a lot more functionality?', 'gmc'), 'http://www.getmecooking.com/wordpress-recipe-plugin'); ?>

          </p>        </div>      </div>    <?php } ?>
<form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" id="gmc-settings" method="post" name="gmc-settings">
<input name="gmc-settings-save" type="hidden" value="Y" /><input id="gmc_resetcss" name="gmc_resetcss" type="hidden" /><div class="postbox">
        <?php $gmcusername = strtolower(get_option("gmc-username")); ?>
                <?php if (!$gmcusername) { ?>

<h3>
            <?php _e('Have we met?', 'gmc'); ?>
          </h3><div class="inside">
<p>
              <?php _e('Tell us your <a href="http://www.getmecooking.com/">GetMeCooking</a> username to get acknowledgement, a list of recipes on your profile page and <a href="http://www.getmecooking.com/recipe-template-info#featuresLinkToGMC">other features</a>.', 'gmc'); ?>
            </p><p>
              <?php _e('If you don\'t already have a user profile on GetMeCooking, you can <a href="http://www.getmecooking.com/login/">create a free user account</a> and then get listed on our <a href="http://www.getmecooking.com/blog-directory">food blog directory</a>.', 'gmc'); ?>
            </p>          </div>                <?php } else { ?>

<h3>
            <?php echo __('Hey', 'gmc') . ' ' . get_option('gmc-username'); ?>

          </h3><div class="inside">
<p>
              <?php _e('How are you today? Have you looked at the <a href="http://www.getmecooking.com/recipe-template-info">Recipe Template FAQ page</a> recently?', 'gmc'); ?>
            </p>          </div>        <?php } ?>
<table class="gmc-table">
<tbody>
<tr>
<th>
<label for="gmc-username">
                  <?php _e('GetMeCooking username', 'gmc'); ?>
                </label>              </th><td>
<input id="gmc-username" name="gmc-username" size="50" type="text" value="<?php echo get_option('gmc-username'); ?>" />              </td>            </tr>                        <?php if ($gmcusername) { ?>

<tr>
<th>
<label for="gmc-userProfile">
                    <?php _e('Your user profile', 'gmc'); ?>
                  </label>                </th><td>
<a href="http://www.getmecooking.com/user/<?php echo $gmcusername ?>">http://www.getmecooking.com/user/<?php echo $gmcusername ?></a>                  <?php _e('Is it up-to-date?', 'gmc'); ?>
                </td>              </tr><tr>
<th>
<label>
                    <?php _e('Food blog directory', 'gmc'); ?>
                  </label>                </th><td>
                  <?php _e('Are you listed in our <a href="http://www.getmecooking.com/blog-directory">food blog directory?</a>', 'gmc'); ?>
                </td>              </tr>            <?php } ?>
<tr>
<td colspan="2">
<input class="button button-primary save" name="submit" type="submit" value="<?php echo __('Save settings', 'gmc'); ?>" />              </td>            </tr>          </tbody>        </table>      </div><div class="postbox">
<h3 id="gmc-share-the-love"><?php _e('Share the love', 'gmc'); ?></h3><div class="inside">
<table class="gmc-table">
<tr>
<td>
                <input id="gmc-hide-recipes" value="Y" name="gmc-hide-recipes" type="checkbox" <?php echo (get_option('gmc-hide-recipes')!='Y' ? 'checked="checked"' : ''); ?>/>
              </td><td>
                <?php _e('I am happy for any recipes that I add using this plugin to appear on <a href= "http://www.getmecooking.com">www.getmecooking.com</a> (<a href="http://www.getmecooking.com/recipe-template-info#featuresPostRecipesOnGetMeCooking">see the benefits</a>)', 'gmc')               ; ?>
              </td>            </tr><tr>
<td colspan="2">
                <?php _e('<strong>Note:</strong> Recipes go through an approval process before appearing on <a href="http://www.getmecooking.com">www.getmecooking.com</a>. It must have a good quality photograph and full recipe information. For more information please see <a href="http://www.getmecooking.com/recipe-template-info#faqMissingRecipesGMC">the FAQ</a>.', 'gmc'); ?>
              </td>            </tr><tr>
<td>
                <input id="gmc-hide-links" value="Y" name="gmc-hide-links" type="checkbox" <?php echo (get_option('gmc-hide-links')!='Y' ? 'checked="checked"' : ''); ?>/>
              </td><td>
                <?php _e('I am happy for the plugin to link to recipes on GetMeCooking e.g. <strong>Meal type:</strong> <a href="http://www.getmecooking.com/recipes?course=Breakfast">Breakfast</a> is a link to all breakfast recipes on GetMeCooking', 'gmc')               ; ?>
<span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/plugin-link-to-recipes.png'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span>              </td>            </tr><tr>
<td>
                <input id="gmc-hide-powered-by" value="Y" name="gmc-hide-powered-by" type="checkbox" <?php echo (get_option('gmc-hide-powered-by')!='Y' ? 'checked="checked"' : ''); ?>/>
              </td><td>
                <?php _e('I am happy to display the link "Powered by GetMeCooking"', 'gmc'); ?>
<span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/powered-by-link.png'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span>              </td>            </tr><tr>
<td colspan="2">
<p>
                </p><b>
                  <?php _e('If you choose to untick any of these, please consider a <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=TJ2X9BHYUGEWU">donation</a>.', 'gmc'); ?>
                </b>              </td>            </tr><tr>
<td colspan="2">
<input class="button button-primary save" name="submit" type="submit" value="<?php echo __('Save settings', 'gmc'); ?>" />              </td>            </tr>          </table>        </div>      </div><div class="postbox">
<h3><?php _e('Heading text', 'gmc'); ?></h3><div class="inside">
<p>
            <?php _e('Here you can change the default text of the headings.', 'gmc'); ?>
          </p><table class="gmc-table">
<tr>
<th>
                <?php _e('Serves', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-serves" value="<?php echo get_option("gmc-label-serves");?>" /></td>            </tr><tr>
<th>
                <?php _e('Prep time', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-prep-time" value="<?php echo get_option("gmc-label-prep-time");?>" /></td>            </tr><tr>
<th>
                <?php _e('Cook time', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-cook-time" value="<?php echo get_option("gmc-label-cook-time");?>" /></td>            </tr><tr>
<th>
                <?php _e('Total time', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-total-time" value="<?php echo get_option("gmc-label-total-time");?>" /></td>            </tr><tr>
<th>
                <?php _e('Allergy', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-allergy" value="<?php echo get_option("gmc-label-allergy");?>" /></td>            </tr><tr>
<th>
                <?php _e('Dietary', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-dietary" value="<?php echo get_option("gmc-label-dietary");?>" /></td>            </tr><tr>
<th>
                <?php _e('Meal type', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-meal-type" value="<?php echo get_option("gmc-label-meal-type");?>" /></td>            </tr><tr>
<th>
                <?php _e('Misc', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-misc" value="<?php echo get_option("gmc-label-misc");?>" /></td>            </tr><tr>
<th>
                <?php _e('Occasion', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-occasion" value="<?php echo get_option("gmc-label-occasion");?>" /></td>            </tr><tr>
<th>
                <?php _e('Region', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-region" value="<?php echo get_option("gmc-label-region");?>" /></td>            </tr><tr>
<th>
                <?php _e('By author', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-source-author" value="<?php echo get_option("gmc-label-source-author");?>" /></td>            </tr><tr>
<th>
                <?php _e('From book', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-source-book" value="<?php echo get_option("gmc-label-source-book");?>" /></td>            </tr><tr>
<th>
                <?php _e('From magazine', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-source-mag" value="<?php echo get_option("gmc-label-source-mag");?>" /></td>            </tr><tr>
<th>
                <?php _e('Website', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-source-website" value="<?php echo get_option("gmc-label-source-website");?>" /></td>            </tr><tr>
<th>
                <?php _e('Ingredients', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-ingredients" value="<?php echo get_option("gmc-label-ingredients");?>" /></td>            </tr><tr>
<th>
                <?php _e('Directions', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-directions" value="<?php echo get_option("gmc-label-directions");?>" /></td>            </tr><tr>
<th>
                <?php _e('Step', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-step-text" value="<?php echo get_option("gmc-label-step-text");?>" /></td>            </tr><tr>
<th>
                <?php _e('Note', 'gmc'); ?>
              </th><td><input type="text" name="gmc-label-note" value="<?php echo get_option("gmc-label-note");?>" /></td>            </tr><tr>
<td>
<input class="button button-primary save" name="submit" type="submit" value="<?php echo __('Save settings', 'gmc'); ?>" />              </td><td>
              </td>            </tr>          </table><p>
            This plugin supports <a href="http://www.getmecooking.com/recipe-template-info#settingsUseYourOwnLanguage">multiple languages</a>.
          </p>        </div>      </div><div class="postbox">
<h3 id="layout-options"><?php _e('Layout options', 'gmc'); ?></h3><div class="inside">
<table class="gmc-table">
<tr>
<th>
                <?php _e('Do you want to use the wide theme?', 'gmc'); ?>
              </th><td><input id="gmc-widecss" value="Y" name="gmc-widecss" type="checkbox" <?php echo (get_option('gmc-widecss')=='Y' ? 'checked="checked"' : ''); ?>/><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/wide-theme.png'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('When clicking a thumbnail, should the photo popup?', 'gmc'); ?>
              </th><td><input id="gmc-img-popup" value="Y" name="gmc-img-popup" type="checkbox" <?php echo (get_option('gmc-img-popup')=='Y' ? 'checked="checked"' : ''); ?>/><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/img-popup.jpg'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('Hide recipe title if it matches the blog post title?', 'gmc'); ?>
              </th><td><input id="gmc-hide-title" value="Y" name="gmc-hide-title" type="checkbox" <?php echo (get_option('gmc-hide-title')=='Y' ? 'checked="checked"' : ''); ?>/><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/hide-title.jpg'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('What label option would you like between each recipe step?', 'gmc'); ?>
              </th><td><?php $step_text = __('Step', 'gmc');; ?><?php if (get_option('gmc-label-step-text')) { ?>

                  <?php $step_text = get_option('gmc-label-step-text'); ?>
                <?php } ?><select name="gmc-label-step">
                  <?php echo gmc_option_list(array(0 => "$step_text 1", 1 => "$step_text 1.", '1.', '1', 4 => __('No label', 'gmc')), get_option('gmc-label-step')); ?>

                </select><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/label-step-options.png'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('Where do you want the recipe step label to appear?', 'gmc'); ?>
              </th><td><select name="gmc-label-step-position">
                  <?php echo gmc_option_list(array(0 => __('Above the step text', 'gmc'), 1  => __('To the left of the step text', 'gmc')), get_option('gmc-label-step-position')); ?>

                </select><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/label-step-position-options.png'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('Where do you want the recipe step photo to appear?', 'gmc'); ?>
              </th><td><select name="gmc-step-photo-position">
                  <?php echo gmc_option_list(array(0 => __('Above the step text', 'gmc'), 1 => __('To the right of the step text', 'gmc'), 2 => __('Below the step text', 'gmc'), 3 => __('To the left of the step text', 'gmc')), get_option('gmc-step-photo-position')); ?>

                </select><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/step-photo-position-options.png'; ?>"><?php _e('example screenshot', 'gmc');?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('Where do you want the recipe note to appear?', 'gmc'); ?>
              </th><td><select name="gmc-note-position">
                  <?php echo gmc_option_list(array(0 => __('Before the recipe steps', 'gmc'), 1 => __('After the recipe steps', 'gmc')), get_option('gmc-note-position')); ?>

                </select></td>            </tr><tr>
<th>
                <?php _e('Background colour', 'gmc'); ?>
              </th><td><input type="text" name="gmc-background-colour" class="colors" size="7" value="<?php echo get_option("gmc-background-colour");?>" /></td>            </tr><tr>
<th>
                <?php _e('Border colour', 'gmc'); ?>
              </th><td><input type="text" name="gmc-border-colour" class="colors" size="7" value="<?php echo get_option("gmc-border-colour");?>" /></td>            </tr><tr>
<th>
                <?php _e('Border style', 'gmc'); ?>
              </th><td><select name="gmc-border-style">
                  <?php echo gmc_option_list(array("none" => __('none', 'gmc'), "dotted" => __('dotted', 'gmc'), "dashed" => __('dashed', 'gmc'), "solid" => __('solid', 'gmc'), "double" => __('double', 'gmc'), "groove" => __('groove', 'gmc'), "ridge" => __('ridge', 'gmc'), "inset" => __('inset', 'gmc'), "outset" => __('outset', 'gmc')), get_option('gmc-border-style'), true); ?>

                </select><span class="gmc-smaller">
                  (<a href="http://www.w3schools.com/css/css_border.asp"><?php _e('style options explained', 'gmc') ?></a>)
                </span></td>            </tr><tr>
<th>
                <?php _e('Border width', 'gmc'); ?>
              </th><td><select name="gmc-border-width">
                  <?php echo gmc_option_list(array("none" => __('none', 'gmc'), "thin" => __('thin', 'gmc'), "medium" => __('medium', 'gmc'), "thick" => __('thick', 'gmc')), get_option('gmc-border-width'), true); ?>

                </select></td>            </tr><tr>
<td>
<input class="button button-primary save" name="submit" type="submit" value="<?php echo __('Save settings', 'gmc'); ?>" />              </td><td>
              </td>            </tr>          </table>        </div>      </div><div class="postbox">
<h3>
          <?php _e('Use your own styling', 'gmc'); ?>
        </h3><div class="inside">
<p>
            <?php _e('Here you can replace the standard Recipe Template styling with your own.', 'gmc')           ; ?>
            <img class="gmc-tooltip" src="<?php echo gmc_plugin_url().'/images/help.png'; ?>" alt="<?php _e('Help', 'gmc'); ?>" title="<?php _e("Remember to tick 'Use custom CSS' and to 'Save settings'.", 'gmc'); ?>" />
          </p><p>
            <?php _e('To learn about Cascading Style Sheets (CSS), please see the <a href="http://www.w3schools.com/css/css_intro.asp">W3Schools introduction to CSS</a>', 'gmc'); ?>
          </p><p>
            <?php _e('Any print-only CSS you add is only shown on the preview page with Google Chrome but when you print it will be applied.', 'gmc'); ?>
          </p><table class="gmc-table">
<tbody>
<tr valign="top">
<th>
                  <?php _e('Use custom CSS (edited below)?', 'gmc'); ?>
                </th><td>
                  <input id="gmc-overridecss" value="Y" name="gmc-overridecss" type="checkbox" <?php echo (get_option('gmc-overridecss')=='Y' ? 'checked="checked"' : ''); ?>/>
                </td>              </tr><tr>
<th>
                </th><td>
<a href="#" id="gmc-reset-css">
                    <?php _e('Reset your custom CSS back to default', 'gmc'); ?>
                  </a><p>
                  </p>                </td>              </tr><tr valign="top">
<th>
                  <?php _e('Your custom CSS', 'gmc'); ?>
                </th><td>
                  <?php $gmccss=get_option('gmc-shortcodecss'); ?>
                  <?php if (empty($gmccss)) { ?>
                  <textarea class="gmc-admin-fullline" id="gmc-shortcodecss" name="gmc-shortcodecss"><?php include dirname(__FILE__)."/css/recipe-template.css"; ?>
                  <?php } else { ?>
                  <textarea class="gmc-admin-fullline" id="gmc-shortcodecss" name="gmc-shortcodecss"><?php echo stripslashes($gmccss); ?><?php } ?></textarea>
                </td>              </tr><tr>
<td colspan="2">
<input class="button button-primary save" id="save-settings" name="submit" type="submit" value="<?php echo __('Save settings', 'gmc'); ?>" />                </td><td>
                </td>              </tr>            </tbody>          </table>        </div>      </div><div class="postbox">
<h3><?php _e('Buy us a pizza?', 'gmc'); ?></h3><div class="inside">
<p>
            <?php _e('If you would like to help fund further improvements to this plugin (and feed the GetMeCooking team), please send us a donation (we really appreciate it!).', 'gmc'); ?>
          </p>          <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=TJ2X9BHYUGEWU"><img id="gmc-donate" width="160" height="47" alt="Donate towards the GetMeCooking Recipe Template plugin for WordPress" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" title="Donate towards the GetMeCooking Recipe Template plugin for WordPress" class="aligncenter size-full wp-image-174"></a>
        </div>      </div><div class="postbox">
<h3><?php _e('Feedback, help and support', 'gmc'); ?></h3><div class="inside">
<p>
            <?php _e('Please <a href="http://www.getmecooking.com/contact">let us know</a> what you think of this plugin, any features you would like or any problems that you find.', 'gmc'); ?>
          </p><p>
            <?php _e('For some basic information on this plugin and a list of common questions, please visit the <a href="http://www.getmecooking.com/recipe-template-info">Recipe Plugin FAQ page</a>', 'gmc'); ?>
          </p><p>
            <?php _e('Come and hang out with us', 'gmc'); ?> <a target="_blank" href="http://www.getmecooking.com/newsletter-subscribe"><img src="<?php echo gmc_plugin_url().'/images/email.png'; ?>" alt="<?php _e('GetMeCooking newsletter', 'gmc');?>" /></a> <a target="_blank" href="http://www.facebook.com/GetMeCooking/"><img src="<?php echo gmc_plugin_url().'/images/facebook.png'; ?>" alt="Facebook" /></a> <a target="_blank" href="http://www.twitter.com/getmecooking"><img src="<?php echo gmc_plugin_url().'/images/twitter.png'; ?>" alt="Twitter" /></a> <a target="_blank" href="http://www.getmecooking.com/rss"><img src="<?php echo gmc_plugin_url().'/images/rss.png'; ?>" alt="<?php _e('RSS','gmc');?>" /></a> <a target="_blank" href="http://www.youtube.com/user/GetMeCooking"><img src="<?php echo gmc_plugin_url().'/images/youtube.png'; ?>" alt="YouTube" /></a>
          </p><p>
            <?php _e('Like this plugin? Please rate it on WordPress', 'gmc');?><a target="_blank" href="http://wordpress.org/extend/plugins/getmecooking-recipe-template/"><img src="<?php echo gmc_plugin_url().'/images/star.png'; ?>" alt="<?php _e('Rate GetMeCooking 5 stars', 'gmc');?>" /><img src="<?php echo gmc_plugin_url().'/images/star.png'; ?>" alt="<?php _e('Rate GetMeCooking 5 stars', 'gmc');?>" /><img src="<?php echo gmc_plugin_url().'/images/star.png'; ?>" alt="<?php _e('Rate GetMeCooking 5 stars', 'gmc');?>" /><img src="<?php echo gmc_plugin_url().'/images/star.png'; ?>" alt="<?php _e('Rate GetMeCooking 5 stars', 'gmc');?>" /><img src="<?php echo gmc_plugin_url().'/images/star.png'; ?>" alt="<?php _e('Rate GetMeCooking 5 stars', 'gmc');?>" /></a>
          </p>        </div>      </div>    </form>  </div></div>