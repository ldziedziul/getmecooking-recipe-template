<?php   
/*
	Plugin Name: GetMeCooking Recipe Template
	Plugin URI: http://www.getmecooking.com/wordpress-recipe-plugin
	Description: <strong>For food bloggers - allows you to add recipes to your blog</strong>. Includes recipe title, photographs, list of ingredients, recipe steps and Search Engine Optimisation (SEO). Also your recipes can be added to <a href="http://www.getmecooking.com/">http://www.getmecooking.com</a>, which will give your recipes additional functionality, more exposure and increased traffic. Visit the <a href="http://www.getmecooking.com/recipe-template/">information page</a> for full details.
	Version: 1.27
	Author: GetMeCooking
	Author URI: http://www.getmecooking.com/
*/

define('GMC_URL', 'http://www.getmecooking.com/recipeservice.svc/submitrecipe');
define('GMC_VERSION', '1.27');
$premium_files = dirname( dirname(__FILE__) ).DIRECTORY_SEPARATOR.'getmecooking-recipe-template-premium'.DIRECTORY_SEPARATOR.'recipe-template-premium.php';
define('GMC_PREMIUM_FILES', $premium_files);

require_once "recipe-template-functions.php";

register_activation_hook( __FILE__, 'gmc_activate' );
register_deactivation_hook( __FILE__, 'gmc_deactivate' );

add_action('admin_menu', 'gmc_menu');

add_action('init', 'gmc_init');
add_action('admin_init', 'gmc_activate_redirect');

add_action('wp_enqueue_scripts', 'gmc_enqueue_scripts');
add_action('admin_enqueue_scripts', 'gmc_admin_enqueue_scripts');

add_action('add_meta_boxes', 'gmc_add_meta_boxes');

add_action('save_post', 'gmc_save_recipe', 10, 2);
add_action('wp_trash_post', 'gmc_trash_post');
add_action('untrash_post', 'gmc_untrash_post');

add_action('after_wp_tiny_mce', 'gmc_insert_recipe_dialog');

add_action('after_setup_theme', 'gmc_after_setup_theme');

add_action('add_attachment','gmc_add_edit_attachment');
add_action('edit_attachment','gmc_add_edit_attachment');

add_action('parent_file', 'gmc_parent_menu');

add_shortcode('gmc_recipe', 'gmc_recipe_shortcode');

add_filter('the_content', 'gmc_the_content', 10);
add_filter('tiny_mce_version', 'gmc_refresh_mce');
add_filter('enter_title_here', 'gmc_enter_title_here', 10, 2);
add_filter('admin_post_thumbnail_html', 'gmc_admin_post_thumbnail_html');
add_filter('plugin_action_links', 'gmc_plugin_action_links', 10, 2);
add_filter('admin_body_class', 'gmc_admin_body_class');
add_filter('attachment_fields_to_edit', 'gmc_attachment_fields_to_edit', 15, 2);
add_filter('media_upload_tabs', 'gmc_remove_media_tabs', 15);
add_filter('redirect_post_location', 'gmc_redirect_post_location', 10, 2);
add_filter('list_terms_exclusions','gmc_exclude_recipe_category');
?>
