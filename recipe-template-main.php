<?php global $post; ?>
<?php gmc_save_settings(); ?>
<div class="metabox-holder">
<div class="postbox-container">
<span id="gmc-logo">
      <img src="<?php echo gmc_plugin_url().'/images/icon.png'; ?>" alt="GetMeCooking logo" />
    </span><h2>GetMeCooking Recipe Template Settings</h2><form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" id="gmc-settings" method="post" name="gmc-settings">
<input name="gmc-settings-save" type="hidden" value="Y" /><input id="gmc_reset_css" name="gmc_reset_css" type="hidden" /><div class="postbox">
        <?php $gmcusername= strtolower(get_option("gmc-username")); ?>
        <?php if (!$gmcusername) { ?>
<h3>Have we met?</h3><div class="inside">
<p>
            Tell us your
<a href="http://www.getmecooking.com/">GetMeCooking</a>            username to get acknowledgement, a list of recipes on your profile page and
<a href="http://www.getmecooking.com/recipe-template-info#why-link">
              other features.
            </a>          </p><p>
            If you don't already have a user profile on GetMeCooking, you can
<a href="http://www.getmecooking.com/login/">
                create a free user account
              </a>          </p>        </div>        <?php } else { ?>
<h3>Hey <?php echo get_option('gmc-username'); ?></h3><div class="inside">
<p>
            How are you today? Have you looked at the
<a href="http://www.getmecooking.com/recipe-template-info">
                Recipe Template FAQ page
              </a>              recently?
          </p>        </div>        <?php } ?>
<table class="gmc-table">
<tbody>
<tr>
<th>
                  <label for="gmc-username">GetMeCooking username:
                </th><td>
<input id="gmc-username" name="gmc-username" size="50" type="text" value="<?php echo get_option('gmc-username'); ?>" />                </td>              </tr>              <?php if ($gmcusername) { ?>
<tr>
<th>
                  <label for="gmc-userProfile">Your user profile:
                </th><td>
<a href="http://www.getmecooking.com/user/<?php echo $gmcusername ?>">http://www.getmecooking.com/user/<?php echo $gmcusername ?></a>                  Is it up-to-date?
                </td>              </tr><tr>
<th>
                  <label>Food blog directory:
                </th><td>
                  Are you listed in our
<a href="http://www.getmecooking.com/blog-directory">
                      food blog directory?
                    </a>                </td>              </tr>              <?php } ?>
<tr>
<td colspan="2">
<input class="button button-primary save" name="submit" type="submit" value="Save settings" />                </td>              </tr>            </tbody>          </table>      </div><div class="postbox">
<h3 id="gmc-share-the-love">Share the love</h3><div class="inside">
<table class="gmc-table">
<tr>
<td>
                <input id="gmc-hide-recipes" value="Y" name="gmc-hide-recipes" type="checkbox" <?php echo (get_option('gmc-hide-recipes')!='Y' ? 'checked="checked"' : ''); ?>/>
              </td><td>
                I am happy for any recipes that I add using this plugin to appear on
<a href="http://www.getmecooking.com">www.getmecooking.com</a>                (<a href="http://www.getmecooking.com/recipe-template-info#why-link">see the benefits</a>)
              </td>            </tr><tr>
<td>
                <input id="gmc-hide-links" value="Y" name="gmc-hide-links" type="checkbox" <?php echo (get_option('gmc-hide-links')!='Y' ? 'checked="checked"' : ''); ?>/>
              </td><td>
                I am happy for the plugin to link to recipes on GetMeCooking e.g.
<strong>
                  Meal type:
<a href="http://www.getmecooking.com/recipes?course=Breakfast">Breakfast</a>                </strong>                is a link to all breakfast recipes on GetMeCooking
<span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/plugin-link-to-recipes.png'; ?>">example screenshot</a>)
                </span>              </td>            </tr><tr>
<td>
                <input id="gmc-hide-powered-by" value="Y" name="gmc-hide-powered-by" type="checkbox" <?php echo (get_option('gmc-hide-powered-by')!='Y' ? 'checked="checked"' : ''); ?>/>
              </td><td>
                I am happy to display the link "Powered by GetMeCooking"
<span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/powered-by-link.png'; ?>">example screenshot</a>)
                </span>              </td>            </tr><tr>
<td colspan="2">
<p>
                </p><b>
                  If you choose to untick any of these, please consider a donation.
                </b>              </td>            </tr><tr>
<td colspan="2">
<input class="button button-primary save" name="submit" type="submit" value="Save settings" />              </td>            </tr>          </table>        </div>      </div><div class="postbox">
<h3>Want to help?</h3><div class="inside">
<p>
            If you would like to help fund further improvements to this plugin (and feed the GetMeCooking team), please send us a donation (we really appreciate it!).
          </p>          <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=TJ2X9BHYUGEWU"><img id="gmc-donate" width="122" height="47" alt="Donate towards the GetMeCooking Recipe Template plugin for WordPress" src="http://grandslambert.com/files/2010/06/btn_donateCC_LG.gif" title="Donate towards the GetMeCooking Recipe Template plugin for WordPress" class="aligncenter size-full wp-image-174"></a>
        </div>      </div><div class="postbox">
<h3>Feedback, help and support</h3><div class="inside">
<p>
            Please let us know what you think of this template, any features you would like or any problems that you find, by
<a href="http://www.getmecooking.com/contact">contacting us</a>            via our website.
          </p><p>
            For some basic information on this plugin and a list of common questions, please visit the
<a href="http://www.getmecooking.com/recipe-template-info">Recipe Template FAQ page</a>          </p>        </div>      </div><div class="postbox">
<h3>Layout options</h3><div class="inside">
<table class="gmc-table">
<tr>
<th>
                What label option would you like between each recipe step?
              </th><td><select name="gmc-label-step">
                  <?php echo gmc_option_list(array("Step 1", "Step 1.", "step 1", "step 1.", '1.', '1', "No label"), get_option('gmc-label-step')); ?>

                </select><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/label-step-options.png'; ?>">example screenshot</a>)
                </span></td>            </tr><tr>
<th>
                Where do you want the recipe step label to appear?
              </th><td><select name="gmc-label-step-position">
                  <?php echo gmc_option_list(array("Above the step text", "To the left of the step text"), get_option('gmc-label-step-position')); ?>

                </select><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/label-step-position-options.png'; ?>">example screenshot</a>)
                </span></td>            </tr><tr>
<th>
                Where do you want the recipe step photo to appear?
              </th><td><select name="gmc-step-photo-position">
                  <?php echo gmc_option_list(array("Above the step text", "To the right of the step text", "Below the step text", "To the left of the step text"), get_option('gmc-step-photo-position')); ?>

                </select><span class="gmc-smaller">
                  (<a href="<?php echo gmc_plugin_url().'/docs/step-photo-position-options.png'; ?>">example screenshot</a>)
                </span></td>            </tr><tr>
<th>
                Background colour
              </th><td><input type="text" name="gmc-background-colour" class="colors" size="7" value="<?php echo get_option("gmc-background-colour");?>" /></td>            </tr><tr>
<th>
                Border colour
              </th><td><input type="text" name="gmc-border-colour" class="colors" size="7" value="<?php echo get_option("gmc-border-colour");?>" /></td>            </tr><tr>
<th>
                Border style
              </th><td><select name="gmc-border-style">
                  <?php echo gmc_option_list(array("none", "dotted", "dashed", "solid", "double", "groove", "ridge", "inset", "outset"), get_option('gmc-border-style'), true); ?>

                </select><span class="gmc-smaller">
                  (<a href="http://www.w3schools.com/css/css_border.asp">style options explained</a>)
                </span></td>            </tr><tr>
<th>
                Border width
              </th><td><select name="gmc-border-width">
                  <?php echo gmc_option_list(array("none", "thin", "medium", "thick"), get_option('gmc-border-width'), true); ?>

                </select></td>            </tr><tr>
<td>
<input class="button button-primary save" name="submit" type="submit" value="Save settings" />              </td><td>
              </td>            </tr>          </table>        </div>      </div><div class="postbox">
<h3>Heading text</h3><div class="inside">
<p>
            Here you can change the default text of the headings.
          </p><table class="gmc-table">
<tr>
<th>
                Serves
              </th><td><input type="text" name="gmc-label-serves" value="<?php echo get_option("gmc-label-serves");?>" /></td>            </tr><tr>
<th>
                Prep time
              </th><td><input type="text" name="gmc-label-prep-time" value="<?php echo get_option("gmc-label-prep-time");?>" /></td>            </tr><tr>
<th>
                Cook time
              </th><td><input type="text" name="gmc-label-cook-time" value="<?php echo get_option("gmc-label-cook-time");?>" /></td>            </tr><tr>
<th>
                Total time
              </th><td><input type="text" name="gmc-label-total-time" value="<?php echo get_option("gmc-label-total-time");?>" /></td>            </tr><tr>
<th>
                Allergy
              </th><td><input type="text" name="gmc-label-allergy" value="<?php echo get_option("gmc-label-allergy");?>" /></td>            </tr><tr>
<th>
                Dietry
              </th><td><input type="text" name="gmc-label-dietry" value="<?php echo get_option("gmc-label-dietry");?>" /></td>            </tr><tr>
<th>
                Meal type
              </th><td><input type="text" name="gmc-label-meal-type" value="<?php echo get_option("gmc-label-meal-type");?>" /></td>            </tr><tr>
<th>
                Misc
              </th><td><input type="text" name="gmc-label-misc" value="<?php echo get_option("gmc-label-misc");?>" /></td>            </tr><tr>
<th>
                Occasion
              </th><td><input type="text" name="gmc-label-occasion" value="<?php echo get_option("gmc-label-occasion");?>" /></td>            </tr><tr>
<th>
                Region
              </th><td><input type="text" name="gmc-label-region" value="<?php echo get_option("gmc-label-region");?>" /></td>            </tr><tr>
<th>
                Ingredients
              </th><td><input type="text" name="gmc-label-ingredients" value="<?php echo get_option("gmc-label-ingredients");?>" /></td>            </tr><tr>
<th>
                Directions
              </th><td><input type="text" name="gmc-label-directions" value="<?php echo get_option("gmc-label-directions");?>" /></td>            </tr><tr>
<td>
<input class="button button-primary save" name="submit" type="submit" value="Save settings" />              </td><td>
              </td>            </tr>          </table>        </div>      </div><div class="postbox">
<h3>Use your own styling</h3><div class="inside">
<p>
            Here you can replace the standard Recipe Template styling with your own.
          </p><p>
            To learn about Cascading Style Sheets (CSS), please see the
<a href="http://www.w3schools.com/css/css_intro.asp">
                W3Schools introduction to CSS
              </a>          </p><table class="gmc-table">
<tbody>
<tr valign="top">
<th>
                  Use your own CSS?
                </th><td>
                  <input id="gmc-overridecss" value="Y" name="gmc-overridecss" type="checkbox" <?php echo (get_option('gmc-overridecss')=='Y' ? 'checked="checked"' : ''); ?>/>
                </td>              </tr><tr>
<th>
                </th><td>
<a href="#" id="gmc-reset-css">
                    Reset CSS back to default
                  </a><p>
                  </p>                </td>              </tr><tr valign="top">
<th>
                  Custom CSS:
                </th><td>
                  <?php $gmccss=get_option('gmc-shortcodecss'); ?>
                  <?php if (empty($gmccss)) { ?>
                  <textarea class="gmc-admin-fullline" id="gmc-shortcodecss" name="gmc-shortcodecss"><?php include dirname(__FILE__)."/css/recipe-template.css"; ?>
                  <?php } else { ?>
                  <textarea class="gmc-admin-fullline" id="gmc-shortcodecss" name="gmc-shortcodecss"><?php echo stripslashes($gmccss); ?><?php } ?></textarea>
                </td>              </tr><tr>
<td colspan="2">
<input class="button button-primary save" id="save-settings" name="submit" type="submit" value="Save settings" />                </td><td>
                </td>              </tr>            </tbody>          </table>        </div>      </div>    </form>  </div></div>