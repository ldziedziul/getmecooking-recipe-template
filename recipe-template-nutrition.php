<?php if (is_gmc_premium_active()) { ?>

  <?php require(dirname( dirname(__FILE__) ).DIRECTORY_SEPARATOR."getmecooking-recipe-template-premium/nutrition-admin.php"); ?>
<?php } else { ?>

  <?php printf(__("If you have the <a href='%s'>premium version</a> of this plugin you can add nutrional information and a lot more.", 'gmc'), 'http://www.getmecooking.com/wordpress-recipe-plugin'); ?>
<?php } ?>
