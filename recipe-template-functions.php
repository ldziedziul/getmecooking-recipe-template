<?php

/*
  Plugin support functions
*/

$gmc_skip_content=false;

function gmc_plugin_url() {
  return WP_PLUGIN_URL.'/'.basename(dirname(__FILE__));
} 

function populate_taxonomies() {
  wp_insert_term('Egg', 'gmc_allergy');
  wp_insert_term('Fish', 'gmc_allergy');
  wp_insert_term('Milk', 'gmc_allergy');
  wp_insert_term('Peanuts', 'gmc_allergy');
  wp_insert_term('Shellfish', 'gmc_allergy');
  wp_insert_term('Soy', 'gmc_allergy');
  wp_insert_term('Tree Nuts', 'gmc_allergy');
  wp_insert_term('Wheat', 'gmc_allergy');
  
  wp_insert_term('Appetizer', 'gmc_course');
  wp_insert_term('Beverage', 'gmc_course');
  wp_insert_term('Bread', 'gmc_course');
  wp_insert_term('Breakfast', 'gmc_course');
  wp_insert_term('Condiment', 'gmc_course');
  wp_insert_term('Dessert', 'gmc_course');
  wp_insert_term('Lunch', 'gmc_course');
  wp_insert_term('Main Dish', 'gmc_course');
  wp_insert_term('Salad', 'gmc_course');
  wp_insert_term('Side Dish', 'gmc_course');
  wp_insert_term('Snack', 'gmc_course');
  wp_insert_term('Soup', 'gmc_course');
  wp_insert_term('Starter', 'gmc_course');
  
  wp_insert_term('Diabetic', 'gmc_dietary');
  wp_insert_term('Gluten Free', 'gmc_dietary');
  wp_insert_term('Vegan', 'gmc_dietary');
  wp_insert_term('Vegetarian', 'gmc_dietary');
  
  wp_insert_term('Child Friendly', 'gmc_misc');
  wp_insert_term('Freezable', 'gmc_misc');
  wp_insert_term('Gourmet', 'gmc_misc');
  wp_insert_term('Pre-preparable', 'gmc_misc');
  wp_insert_term('Serve Cold', 'gmc_misc');
  wp_insert_term('Serve Hot', 'gmc_misc');
  
  wp_insert_term('Barbecue', 'gmc_occasion');
  wp_insert_term('Birthday Party', 'gmc_occasion');
  wp_insert_term('Casual Party', 'gmc_occasion');
  wp_insert_term('Christmas', 'gmc_occasion');
  wp_insert_term('Formal Party', 'gmc_occasion');
  wp_insert_term('Halloween', 'gmc_occasion');
  wp_insert_term('Thanksgiving', 'gmc_occasion');
}

function gmc_menu() {
  add_menu_page('GetMeCooking Settings','GetMeCooking Settings','edit_others_posts', 'getmecooking_options', 'gmc_main', gmc_plugin_url().'/images/icon-admin-menu.png');
  add_submenu_page('getmecooking_options', 'GetMeCooking settings', 'General Settings', 'activate_plugins', 'getmecooking_options', 'gmc_main');
  add_submenu_page('getmecooking_options', 'GetMeCooking allergies', 'Allergies', 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_allergy&post_type=gmc_recipe');  
  add_submenu_page('getmecooking_options', 'GetMeCooking courses', 'Courses', 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_course&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking dietaries', 'Dietaries', 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_dietary&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking miscs', 'Miscs', 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_misc&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking occasions', 'Occasions', 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_occasion&post_type=gmc_recipe');
  //add_submenu_page('getmecooking_options', 'GetMeCooking regions', 'Regions', 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_region&post_type=gmc_recipe');
}

function gmc_parent_menu($parent_file) {
	 global $current_screen;
	 $taxonomy = $current_screen->taxonomy;
  
	 if ($taxonomy == 'gmc_allergy' || $taxonomy == 'gmc_course' || $taxonomy == 'gmc_dietary' || $taxonomy == 'gmc_misc' || $taxonomy == 'gmc_occasion')
		 $parent_file = 'getmecooking_options';
	 return $parent_file;
}

function gmc_main() {
	require_once('recipe-template-main.php');
}

function gmc_head() {
//  if (function_exists('wp_tiny_mce')) {
//    wp_tiny_mce();
//  }
//  remove_all_filters('mce_external_plugins');
}

function gmc_admin_head() {
//  if (function_exists('wp_tiny_mce')) {
//    wp_tiny_mce();
//  }
//  remove_all_filters('mce_external_plugins');
}

function gmc_admin_init() {
	//if($_POST['gmc_save'] == 'Y') {
	  //gmc_save();
  //}
}

function gmc_after_setup_theme() {
if ( !function_exists('post-thumbnails') && function_exists('add_theme_support') ) {
  add_theme_support('post-thumbnails');
  }
}

function gmc_admin_body_class($bclass) {
//  error_log(print_r($bclass, 1));
  
  if (gmc_is_recipe_admin_page()) {
	return $bclass." gmc-recipe-edit";
  }
  
  return $bclass;
}

function gmc_init() {
  register_post_type('gmc_recipe', 
	array(  'labels' => array(
			'name' => __( 'Recipes' ),
			'singular_name' => __( 'Recipe'),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Recipe' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Recipe' ),
			'new_item' => __( 'New Recipe' ),
			'view' => __( 'View Recipe' ),
			'view_item' => __( 'View Recipe' ),
			'search_items' => __( 'Search Recipes' ),
			'not_found' => __( 'No Recipes found' ),
			'not_found_in_trash' => __( 'No Recipes found in Trash' ),
			'parent' => __( 'Parent Recipe' ), // !!!
			'parent_item_colon' => __('Parent Recipe: ') // !!!
		  ),
		  //'menu_position' => 5.999,
      'menu_icon' => gmc_plugin_url().'/images/icon-admin-menu.png',
		  'publicly_queryable' => true,
		  'show_ui' => true,
		  'exclude_from_search' => true,
		  'capability_type' => 'page',
		  'hierarchical' => false,
		  'rewrite' => array('slug' => 'recipe'),
		  'query_var' => true,
		  'supports' => array('title',
							  'editor',
							  //'excerpt',
							  //'trackbacks',
							  //'custom-fields',
							  //'comments',
							  //'revisions',
							  'thumbnail'
							  //'author',
							  //'page-attributes'
							  )) );

  register_post_type('gmc_recipestep', 
	array(  'labels' => array(
			'name' => __( 'Recipe Steps' ),
			'singular_name' => __( 'Step'),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Recipe Step' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Recipe Step' ),
			'new_item' => __( 'New Recipe Step' ),
			'view' => __( 'View Recipe Step' ),
			'view_item' => __( 'View Recipe Step' ),
			'search_items' => __( 'Search Recipe Steps' ),
			'not_found' => __( 'No Recipe Steps found' ),
			'not_found_in_trash' => __( 'No Recipe Steps found in Trash' )
		  ),
		  'publicly_queryable' => false,
//          'menu_position' => 7,
		  'show_ui' => false,
		  'show_in_menu' => false,
		  'show_in_nav_menus' => false,
		  'exclude_from_search' => true,
		  'capability_type' => 'page',
		  'hierarchical' => false,
		  'rewrite' => false,
		  'query_var' => true,
		  'supports' => array('title',
							  'editor',
							  //'excerpt',
							  //'trackbacks',
							  //'custom-fields',
							  //'comments'
							  //'revisions',
							  'thumbnail'
							  //'author',
							  //'page-attributes'
							  )
			));

  register_post_type('gmc_recipeingredient', 
	array(  'labels' => array(
			'name' => __( 'Recipe Ingredients' ),
			'singular_name' => __( 'Recipe Ingredient'),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Recipe Ingredient' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Recipe Ingredient' ),
			'new_item' => __( 'New Recipe Ingredient' ),
			'view' => __( 'View Recipe Ingredient' ),
			'view_item' => __( 'View Recipe Ingredient' ),
			'search_items' => __( 'Search Recipe Ingredients' ),
			'not_found' => __( 'No Recipe Ingredients found' ),
			'not_found_in_trash' => __( 'No Recipe Ingredients found in Trash' )
		  ),
		  'publicly_queryable' => false,
//          'menu_position' => 7,
		  'show_ui' => false,
		  'show_in_menu' => false,
		  'show_in_nav_menus' => false,
		  'exclude_from_search' => true,
		  'capability_type' => 'page',
		  'hierarchical' => false,
		  'rewrite' => false,
		  'query_var' => true,
		  'supports' => array('title',
							  'editor',
							  //'excerpt',
							  //'trackbacks',
							  //'custom-fields',
							  //'comments'
							  //'revisions',
							  'thumbnail'
							  //'author',
							  //'page-attributes'
							  )
			));
  
  register_taxonomy('gmc_allergy', 'gmc_recipe', 
  array(
      'labels' => array( 
        'name' => _x( 'Allergies', 'taxonomy general name' ), 
        'singular_name' => _x( 'Allergy', 'taxonomy singular name' ),
        'popular_items' => __( 'Popular Allergies' ),
        'search_items' => __( 'Search Allergies' ), 
        'all_items' => __( 'All Allergies' ), 
        'parent_item' => __( 'Parent Allergy' ), 
        'parent_item_colon' => __( 'Parent Allergy:' ),
        'edit_item' => __( 'Edit Allergy' ), 
        'update_item' => __( 'Update Allergy' ), 
        'add_new_item' => __( 'Add New Allergy' ), 
        'new_item_name' => __( 'New Allergy Name' ), 
        'menu_name' => __( 'Allergies' ), 
      ),
      'rewrite' => array( 
        'slug' => 'allergies'
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false
    )
  );
  
  register_taxonomy('gmc_course', 'gmc_recipe', 
    array(
      'labels' => array( 
        'name' => _x( 'Courses', 'taxonomy general name' ), 
        'singular_name' => _x( 'Course', 'taxonomy singular name' ),
        'popular_items' => __( 'Popular Courses' ),
        'search_items' => __( 'Search Courses' ), 
        'all_items' => __( 'All Courses' ), 
        'parent_item' => __( 'Parent Course' ), 
        'parent_item_colon' => __( 'Parent Course:' ), 
        'edit_item' => __( 'Edit Course' ), 
        'update_item' => __( 'Update Course' ), 
        'add_new_item' => __( 'Add New Course' ), 
        'new_item_name' => __( 'New Course Name' ), 
        'menu_name' => __( 'Courses' ),       
      ),
      'rewrite' => array( 
        'slug' => 'courses',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false
    )
  );
  
  register_taxonomy('gmc_dietary', 'gmc_recipe', 
    array(
      'labels' => array( 
        'name' => _x( 'Dietaries', 'taxonomy general name' ), 
        'singular_name' => _x( 'Dietary', 'taxonomy singular name' ),
        'popular_items' => __( 'Popular Dietaries' ),
        'search_items' => __( 'Search Dietaries' ), 
        'all_items' => __( 'All Dietaries' ), 
        'parent_item' => __( 'Parent Dietary' ), 
        'parent_item_colon' => __( 'Parent Dietary:' ), 
        'edit_item' => __( 'Edit Dietary' ), 
        'update_item' => __( 'Update Dietary' ), 
        'add_new_item' => __( 'Add New Dietary' ), 
        'new_item_name' => __( 'New Dietary Name' ), 
        'menu_name' => __( 'Dietaries' ), 
      ),
      'rewrite' => array( 
        'slug' => 'dietaries',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false
    )
  );
  
  register_taxonomy('gmc_misc', 'gmc_recipe', 
    array(
      'labels' => array( 
        'name' => _x( 'Miscs', 'taxonomy general name' ), 
        'singular_name' => _x( 'Misc', 'taxonomy singular name' ),
        'popular_items' => __( 'Popular Miscs' ),
        'search_items' => __( 'Search Miscs' ), 
        'all_items' => __( 'All Miscs' ), 
        'parent_item' => __( 'Parent Misc' ), 
        'parent_item_colon' => __( 'Parent Misc:' ), 
        'edit_item' => __( 'Edit Misc' ), 
        'update_item' => __( 'Update Misc' ), 
        'add_new_item' => __( 'Add New Misc' ), 
        'new_item_name' => __( 'New Misc Name' ), 
        'menu_name' => __( 'Miscs' ), 
      ),
      'rewrite' => array( 
        'slug' => 'miscs',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false
    )
  );
  
  register_taxonomy('gmc_occasion', 'gmc_recipe', 
    array(
      'labels' => array( 
        'name' => _x( 'Occasions', 'taxonomy general name' ), 
        'singular_name' => _x( 'Occasion', 'taxonomy singular name' ),
        'popular_items' => __( 'Popular Occasions' ),
        'search_items' => __( 'Search Occasions' ), 
        'all_items' => __( 'All Occasions' ), 
        'parent_item' => __( 'Parent Occasion' ), 
        'parent_item_colon' => __( 'Parent Occasion:' ), 
        'edit_item' => __( 'Edit Occasion' ), 
        'update_item' => __( 'Update Occasion' ), 
        'add_new_item' => __( 'Add New Occasion' ), 
        'new_item_name' => __( 'New Occasion Name' ), 
        'menu_name' => __( 'Occasions' ), 
      ),
      'rewrite' => array( 
        'slug' => 'occasions',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false
    )
  );
  
  register_taxonomy('gmc_region', 'gmc_recipe', 
    array(
      'labels' => array( 
        'name' => _x( 'Regions', 'taxonomy general name' ), 
        'singular_name' => _x( 'Region', 'taxonomy singular name' ),
        'popular_items' => __( 'Popular Regions' ),
        'search_items' => __( 'Search Regions' ), 
        'all_items' => __( 'All Regions' ), 
        'parent_item' => __( 'Parent Region' ), 
        'parent_item_colon' => __( 'Parent Region:' ), 
        'edit_item' => __( 'Edit Region' ), 
        'update_item' => __( 'Update Region' ), 
        'add_new_item' => __( 'Add New Region' ), 
        'new_item_name' => __( 'New Region Name' ), 
        'menu_name' => __( 'Regions' ), 
      ),
      'rewrite' => array( 
        'slug' => 'regions',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false
    )
  );
  
  flush_rewrite_rules(false);
  
  if (!gmc_is_recipe_admin_page()) {
    gmc_add_recipe_button();
  }
  
  gmc_update_old_version();
}

function gmc_activate()
{
  global $wpdb;
  $recipe_count = $wpdb->get_var($wpdb->prepare( "SELECT COUNT(ID) FROM $wpdb->posts WHERE post_type= 'gmc_recipe' OR post_type = 'recipe'"));
  
  if ($recipe_count == 0)
  {
    populate_taxonomies();
    
    if(!get_option("gmc_version"))
    {
      add_option("gmc_version", GMC_VERSION, '', 'no');
    }
  }
}

function gmc_update_old_version() {
  if (!get_option("gmc_version") || get_option("gmc_version") < 1.12)
  {
    populate_taxonomies();
    
    //convert data to taxonomy
    $post_key = 'gmc-recopt-region';
    $regions = gmc_get_post_meta_unknown_id($post_key);
  
    foreach ($regions as $region)
    {
      wp_set_post_terms($region->post_id, $region->meta_value, 'gmc_region');
      delete_post_meta($region->post_id, $post_key);
    }
    
    gmc_convert_to_taxonomy('gmc-recopt-when', 'gmc_course');
    gmc_convert_to_taxonomy('gmc-recopt-occasion', 'gmc_occasion');
    gmc_convert_to_taxonomy('gmc-recopt-allergies', 'gmc_allergy');
    gmc_convert_to_taxonomy('gmc-recopt-dietary', 'gmc_dietary');
    gmc_convert_to_taxonomy('gmc-recopt-other', 'gmc_misc');
    
    global $wpdb;
    $wpdb->query("UPDATE $wpdb->posts SET post_type = 'gmc_recipe'	WHERE post_type = 'recipe'");
    $wpdb->query("UPDATE $wpdb->posts SET post_type = 'gmc_recipestep'	WHERE post_type = 'recipestep'");
    $wpdb->query("UPDATE $wpdb->posts SET post_type = 'gmc_recipeingredient'	WHERE post_type = 'recipeingredient'");
  }
  
  if(!get_option("gmc_version"))
  {
    add_option("gmc_version", GMC_VERSION, '', 'no');
  }
  else
  {
    update_option("gmc_version", GMC_VERSION);
  }
}

function gmc_convert_to_taxonomy($post_key, $taxonomy) {
  $posts = gmc_get_post_meta_unknown_id($post_key);
  foreach ($posts as $post)
  {
    $values = (array)unserialize(get_post_meta($post->post_id,$post_key,true));
    wp_set_post_terms($post->post_id, $values, $taxonomy);      
    
    delete_post_meta($post->post_id, $post_key);
  }
}

function gmc_is_recipe_admin_page() {
  global $pagenow;
  if ($pagenow == 'post.php') {
	if (isset($_GET['post'])) {
		$post_id = (int) $_GET['post'];
	} elseif ( isset($_POST['post_ID']) ) {
		$post_id = (int) $_POST['post_ID'];
	} else {
		$post_id = 0;
	  }
	  
	  if ($post_id) {
		$p=get_post($post_id);
		if ($p->post_type=="gmc_recipe") {
		return true;
	  }
	}
  } else if ($pagenow == 'post-new.php') {
	if ($_GET['post_type']=="gmc_recipe") {
	  return true;
	}
  } elseif ($pagenow=="admin.php" && $_GET['page']=="getmecooking_options") {
	return true;
  }

  return false;
}

function gmc_add_recipe_button() {
  if ((current_user_can('edit_posts') || current_user_can('edit_pages')) && get_user_option('rich_editing') == 'true') {
	add_filter('mce_external_plugins', 'gmc_add_recipe_tinymce_plugin');
	add_filter('mce_buttons', 'gmc_register_recipe_button');
  }
}

function gmc_add_recipe_tinymce_plugin($plugin_array) {
   $plugin_array['gmcrecipe'] = gmc_plugin_url().'/js/recipe-tinymce-plugin.js';
   
   return $plugin_array;
}

function gmc_register_recipe_button($buttons) {
   array_push($buttons, "|", "gmcrecipe");
   return $buttons;
}


function gmc_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

function gmc_get_object_terms($terms, $object_ids, $taxonomies, $args) {
  global $wpdb;

  foreach ($terms as $singleterm) {
	$rels = $wpdb->get_row("SELECT tr.term_taxonomy_id, tr.meta FROM $wpdb->term_relationships AS tr WHERE tr.term_taxonomy_id = ".$singleterm->term_taxonomy_id." AND tr.object_id = ".$singleterm->object_id);
	if ($rels) {
	  $singleterm->meta=$rels->meta;
	}
  }

//  error_log(print_r($terms,1));

  return $terms;
}
/*
function gmc_remove_meta_boxes() {
  $post_types=get_post_types('','names'); 
  foreach ($post_types as $post_type ) {
	remove_meta_box("postimagediv", $post_type, "side");
  }
}
*/
function gmc_draw_postthumbnail_box($p) {

  echo "<div class='gmc-post-thumbnail' id='gmc-post-thumbnail-".$p->ID."' >";
  echo "<div class='gmc-upload-button' id='gmc-upload-button-".$p->ID."' ></div>";
  //echo '<input class="gmc-upload-cancel" id="gmc-upload-cancel-'.$p->ID.'" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" />';
  echo "<div class='gmc-upload-progress' id='gmc-upload-progress-".$p->ID."'>&nbsp;</div>";
  echo "<div class='gmc-upload-thumbnail' id='gmc-upload-thumbnail-".$p->ID."'>";
  echo get_the_post_thumbnail($p->ID, "medium");
  echo "</div>";
  echo "</div>";
}

function gmc_postthumbnail_box() {
  global $post;

  echo "<p>Select a photo - the images will be resized for you. ";
  echo '<span class="gmc-tooltip"><img src="' . gmc_plugin_url().'/images/help.png" alt="Help" /><b><em></em>The size of the main recipe image is determined by <strong>Dashboard | Settings | Media</strong> (thumbnail image = Medium size, full size image = Large size)</b></span></label></p>';
  echo "<div class='gmc-post-thumbnail' id='gmc-post-thumbnail-".$post->ID."' >";
  echo "<div class='gmc-upload-button' id='gmc-upload-button-".$post->ID."' ></div>";
  //echo '<input class="gmc-upload-cancel" id="gmc-upload-cancel-'.$post->ID.'" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" />';
  echo "<div class='gmc-upload-progress' id='gmc-upload-progress-".$post->ID."'>&nbsp;</div>";
  echo "<div class='gmc-upload-thumbnail' id='gmc-upload-thumbnail-".$post->ID."'>";
  the_post_thumbnail("medium");
  echo "</div>";
  echo "</div>";
}

function gmc_add_meta_boxes() {
//	remove_meta_box('postimagediv', 'gmc_recipe', 'side');
//  add_meta_box('postimagediv', __('Photograph of finished Recipe'), 'post_thumbnail_meta_box', 'gmc_recipe', 'normal');
  add_meta_box('gmc-post-thumbnail', __( 'Photograph of the Finished Recipe', 'recipe-template' ), 'gmc_postthumbnail_box', 'gmc_recipe', 'normal');
  add_meta_box('gmc-recipe-main', __( 'Recipe Information', 'recipe-template' ), 'gmc_mainrecipe_box', 'gmc_recipe', 'normal');
  

//	remove_meta_box('ingredientdiv', 'gmc_recipe', 'side'); 

}

function gmc_get_post_thumb_src($id) {
  $thumburl="";
  $thumbid=get_post_thumbnail_id($id);
  if ($thumbid) {
	$thumb=wp_get_attachment_image_src($thumbid, "full");
	$thumburl=$thumb[0];
  }
  
  return $thumburl;
}

function gmc_send_xml($url, $params = null) {
  $cparams = array(
	'http' => array(
	  'method' => "POST",
	  'ignore_errors' => true,
	  'header' => array('Content-Type: text/xml')
	)
  );
  if ($params !== null) {
	$cparams['http']['content'] = $params;
  }

  $context = stream_context_create($cparams);
  $fp = fopen($url, 'rb', false, $context);
  if (!$fp) {
	$res = false;
  } else {
	// If you're trying to troubleshoot problems, try uncommenting the
	// next two lines; it will show you the HTTP response headers across
	// all the redirects:
	//$meta = stream_get_meta_data($fp);
	//var_dump($meta['wrapper_data']);
	$res = stream_get_contents($fp);
  }

  if ($res === false) {
	throw new Exception("$verb $url failed: $php_errormsg");
  }
/*
  switch ($format) {
	case 'xml':
	  $r = simplexml_load_string($res);
	  if ($r === null) {
		throw new Exception("failed to decode $res as xml");
	  }
	  return $r;
  }
*/
  return $res;
}

function gmc_send_xml_curl($url, $xml) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);

  // For xml, change the content-type.
  curl_setopt ($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml; charset="utf-8"'));

  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
//  if(CurlHelper::checkHttpsURL($url)) { 
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//  }

  // Send to remote and return data to caller.
  $result = curl_exec($ch);
  
  try {
	if (curl_errno($ch) ) {
	  libxml_use_internal_errors(true);
	  $sxe = simplexml_load_string($xml);
	  if (!$sxe) {
		foreach(libxml_get_errors() as $error) {
		  $message .= "\t" . $error->message;
		}
	  }
	
	  $message .= "\t" . $xml;      
	  mail('contact@getmecooking.com', 'GMC WordPress error', $message);
	} 
  }
  catch(Exception $e) {}
  
  curl_close($ch);
  return $result;
}

function gmc_get_recipe_xml($recipe, $gmcid="0") {

  if (empty($gmcid)) {
	$gmcid="0";
  }

  $steps=get_posts('post_status=publish&post_type=gmc_recipestep&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$recipe->ID);
  $ingredients=get_posts('post_status=publish&post_type=gmc_recipeingredient&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$recipe->ID);

  $xml=new SimpleXMLElement('<Recipe xmlns="http://www.getmecooking.com/recipeservice/submitrecipe" />');

//  $xml->addAttribute('version', '2.0');

//  $xml=new SimpleXMLElement('<Recipe/>', null, false, "http://www.getmecooking.com/recipeservice/submitrecipe", false);
//  $xrecipe=$xml->addChild('recipe');

  // generic data
//  if (!empty($gmcid)) {
//    $xml->addChild('Id', $gmcid);
//  }

  if (get_post_meta($recipe->ID, "gmc-source-name", true))
  {
	$xml->addChild('Author', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-source-name", true))));
  }
  
  if (get_post_meta($recipe->ID, "gmc-source-url", true))
  {
	$xml->addChild('AuthorUrl', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-source-url", true))));
  }

  if (get_post_meta($recipe->ID, "gmc-cooking-time-hours", true))
  {
	$xml->addChild('CookHour', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-cooking-time-hours", true))));
  }
  
  if (get_post_meta($recipe->ID, "gmc-cooking-time-mins", true))
  {
	$xml->addChild('CookMinute', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-cooking-time-mins", true))));
  }
  
  $xml->addChild('Description', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-description", true))));

  $xml->addChild('Id', $gmcid);

  $xmealinfo=$xml->addChild('MealInformation');
  $pars=wp_get_object_terms($recipe->ID, 'gmc_course');
  if ($pars) {
	foreach($pars as $par) {
	  $xmealinfo->addChild('Meal',htmlspecialchars(utf8_encode($par->name)));
	}
  }

  $xmiscs=$xml->addChild('Miscs');
  $pars=wp_get_object_terms($recipe->ID, 'gmc_misc');
  if ($pars) {
	foreach($pars as $par) {
	  $xmiscs->addChild('Misc',htmlspecialchars(utf8_encode($par->name)));
	}
  }
  
  $xml->addChild('Note', htmlspecialchars(utf8_encode($recipe->post_content)));
  
  $xoccasions=$xml->addChild('Occasions');
  $pars=wp_get_object_terms($recipe->ID, 'gmc_occasion');
  if ($pars) {
	foreach($pars as $par) {
	  $xoccasions->addChild('Occasion',htmlspecialchars(utf8_encode($par->name)));
	}
  }
  
  $gmc_opt_out = get_option("gmc-hide-recipes");
  $xml->addChild('OptOut',$gmc_opt_out);
  
  $xoptingredients=$xml->addChild('OptionalIngredients');
  
  $xml->addChild('Photo', htmlspecialchars(utf8_encode(gmc_get_post_thumb_src($recipe->ID))));
  $xml->addChild('PostUrl', htmlspecialchars(utf8_encode(get_permalink($recipe->ID))));
  
  if (get_post_meta($recipe->ID, "gmc-prep-time-hours", true))
  {  
	$xml->addChild('PrepHour', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-prep-time-hours", true))));
  }
  
  if (get_post_meta($recipe->ID, "gmc-prep-time-mins", true))
  {  
	$xml->addChild('PrepMinute', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-prep-time-mins", true))));
  }
  
  $regions = wp_get_object_terms($recipe->ID, 'gmc_region');
  $region = "";
  
  if(!empty($regions)){
    if(!is_wp_error($regions)){
      $region = $regions[0]->name;
    }
	}
  
  $xml->addChild('Region', htmlspecialchars(utf8_encode($region)));
  $xreqingredients=$xml->addChild('RequiredIngredients');
  $xml->addChild('Servings', htmlspecialchars(utf8_encode(get_post_meta($recipe->ID, "gmc-nr-servings", true))));
  $xsteps=$xml->addChild('Steps');
  $xml->addChild('Title', htmlspecialchars(utf8_encode($recipe->post_title)));

  $gmcusername=get_option("gmc-username");
  $xml->addChild('UserName',htmlspecialchars(utf8_encode($gmcusername)));
  
  // ingredients
  foreach($ingredients as $ingredient) {
	$opt=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true);
	
	if ($opt=="Y") {
	  $xi=$xoptingredients->addChild('Ingredient');
	} else {
	  $xi=$xreqingredients->addChild('Ingredient');
	}

	$xi->addChild('AdditionalNote',htmlspecialchars(utf8_encode($ingredient->post_content)));
	$xi->addChild('GroupName',htmlspecialchars(utf8_encode(get_post_meta($ingredient->ID,'gmc-ingredientgroup',true))));
	$xi->addChild('Measurement',htmlspecialchars(utf8_encode(get_post_meta($ingredient->ID,'gmc-ingredientmeasurement',true))));
	$xi->addChild('Name',htmlspecialchars(utf8_encode($ingredient->post_title)));
	
	if (get_post_meta($ingredient->ID,'gmc-ingredientquantity',true))
	{
		$xi->addChild('Quantity',htmlspecialchars(utf8_encode(get_post_meta($ingredient->ID,'gmc-ingredientquantity',true))));
	}
  }

  // steps  
  foreach($steps as $step) {
	$xs=$xsteps->addChild('Step');
	
	$thumbid=get_post_thumbnail_id($step->ID);
	if ($thumbid)
	{
	  $thumbnail = get_post($thumbid);
	  $xs->addChild('AltText',htmlspecialchars(utf8_encode($thumbnail->post_title)));
	}    
	
	$xs->addChild('Description',htmlspecialchars(utf8_encode($step->post_content)));
	$xs->addChild('Photo',htmlspecialchars(utf8_encode(gmc_get_post_thumb_src($step->ID))));
  }

  $result=$xml->asXML();

  //error_log($result);

  return $result;
}

function gmc_mainrecipe_box($post, $metabox) {
  global $post;
?>

<div id="recipe-data" class="gmc-tabs">
  <div class="gmc-tabs-nav">
	<ul>
	  <li><a href="#params">Recipe Details</a></li>
	  <li><a href="#ingredients">Recipe Ingredients</a></li>
	  <li><a href="#steps">Recipe Steps</a></li>
	  <li><a href="#gmc-desc">Recipe Description</a></li>
	  <li><a href="#gmc-note">Recipe Note</a></li>
	  <li><a href="#transfer">GetMeCooking User Details</a></li>
	</ul>
  </div>
  <div class="gmc-tabs-panel">
	<div id="params">	
	  <?php require_once("recipe-template-edit-params.php"); ?>
	</div>      
	<div id="ingredients">
	  <?php

		echo '<div id="gmc-ingredientslistbox">'."\n";

	echo '<p class="howto">Drag and drop the ingredients to change their order</p>';

	echo '<div id="gmc-ingredientslist">'."\n";
		
	$ingredients=get_posts('post_status=publish&post_type=gmc_recipeingredient&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID);
	
	$i=1;
	foreach($ingredients as $ingredient){
	  echo '<div id="gmc-ingredients-ingredient-'.$i.'" class="gmc-singleingredient postbox " >'."\n";
	  echo '<div class="handlediv" title="Click to toggle"><br /></div><h3 class="gmc-hndle">Ingredient <span class="gmc-ingredientnumber">'.$i.'</span></h3>'."\n";
	  echo '<div class="inside">'."\n";

	  require("recipe-template-edit-ingredient.php");

	  echo "</div></div>\n";
	  $i++;
		}
	
	echo '<div id="gmc-ingredients-ingredient-'.$i.'" class="gmc-singleingredient postbox " >'."\n";
	echo '<div class="handlediv" title="Click to toggle"><br /></div><h3 class="gmc-hndle">Ingredient <span class="gmc-ingredientnumber">'.$i.'</span><span class="deleteReminder"> - Leave this empty if there are no more ingredients to add.</span></h3>'."\n";
	echo '<div class="inside">'."\n";

	$ingredient = null;
	$gmcaddnew = true;
	require("recipe-template-edit-ingredient.php");

	echo "</div></div>\n";  
	
		echo '</div></div>';
	  ?>
	</div>
	<div id="steps">
	  <?php
		$steps=get_posts('post_status=publish&post_type=gmc_recipestep&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID);

		echo '<div id="gmc-stepslistbox">'."\n";		

		echo '<div id="gmc-stepslist">'."\n";
		$i=1;
		foreach ($steps as $step) {
	  echo '<div id="gmc-steps-step-'.$i.'" class="gmc-singlestep postbox " >'."\n";
	  echo '<div class="handlediv" title="Click to toggle"><br /></div><h3 class="gmc-hndle">Step <span class="gmc-stepnumber">'.$i.'</span></h3>'."\n";
	  echo '<div class="inside">'."\n";

	  echo "<input type='hidden' name='stepid[]' value='".$step->ID."' />"."\n";

	  echo "<label class='gmc-admin-label gmc-admin-step-label'><strong>Step Description:</strong></label>"."\n";
	  echo '<div class="gmc-stepdesc-box">'."\n";
	  echo "<textarea class='gmc-admin-fullline autoResize' name='stepdescription[]'>".$step->post_content."</textarea>"."\n";
	  echo '</div>'."\n";
	  echo '<div class="gmc-stepthumb-box">'."\n";
	  gmc_draw_postthumbnail_box($step);
	  echo '</div>'."\n";
	  echo '<label class="gmc-admin-label gmc-admin-step-label"><strong>Alt text (optional - only used if you have added a photograph): </strong>';
	  echo '<span class="gmc-tooltip"><img src="' . gmc_plugin_url().'/images/help.png" alt="Help" /><b><em></em>How would you describe the photograph if you could not see it? (e.g. Muffin mixture poured into a muffin tray)</b></span></label>';
	  
	  $thumbid=get_post_thumbnail_id($step->ID);
	  $alttext = '';
	  if ($thumbid > 0)
	  {
		$thumbnail = get_post($thumbid);
		$alttext = $thumbnail->post_title;
	  }
	  echo '<input type="text" class="gmc-admin-alt-text-input" name="gmc-step-alt-text[]" value="'.$alttext.'"/>';
	  echo '<div style="clear:both"></div>';
	  echo '<a id="gmc-step-to-delete-'.$step->ID.'" class="gmc-delete-step" href="#">Delete step</a>';
	  echo '</div></div>'."\n";
	  
	  $i++;
		}

	echo '<div id="gmc-steps-step-'.$i.'" class="gmc-singlestep postbox " >'."\n";
	echo '<div class="handlediv" title="Click to toggle"><br /></div><h3 class="gmc-hndle">Step <span class="gmc-stepnumber">'.$i.'</span><span class="deleteReminder"> - Leave this empty if there are no more steps to add.</span></h3>'."\n";
	echo '<div class="inside">'."\n";

	echo '<input type="hidden" name="stepid[]" value="" />'."\n";

	echo "<label class='gmc-admin-label gmc-admin-step-label'><strong>Step Description:</strong></label>"."\n";
	echo '<div class="gmc-stepdesc-box">'."\n";
	echo '<textarea id="gmc-admin-new-step-'.$i.'" class="gmc-admin-fullline autoResize" name="stepdescription[]"></textarea>'."\n";
	echo '</div>'."\n";
	echo '<div class="gmc-stepthumb-box">'."\n";
	echo 'You can add a photograph once you save/update the recipe';
	// gmc_draw_postthumbnail_box($step);
	echo '</div>'."\n";
	//echo '<label class="gmc-admin-label gmc-admin-step-label"><strong>Alt text (optional - only used if you have added a photograph):</strong><p>How would you describe the photograph if you could not see it? (e.g. Muffin mixture poured into a muffin tray)</p></label>';
	
	// $thumbid=get_post_thumbnail_id($step->ID);
	// $alttext = '';
	// if ($thumbid > 0)
	// {
	  // $thumbnail = get_post($thumbid);
	  // $alttext = $thumbnail->post_title;
	// }
	//echo '<input type="text" class="gmc-admin-alt-text-input" name="gmc-step-alt-text[]" value=""/>';
	echo '<div style="clear:both"></div>';    
	echo '</div></div>'."\n";       
	
		echo '</div>'."\n";
		echo '</div>'."\n";
	  ?>  
	</div>

	<div id="gmc-desc">
	  <p>The description is a 1 - 2 line summary that is used by search engines and <a href="http://www.getmecooking.com">GetMeCooking</a>. This will not be visible on your blog post.</p>
	  <textarea id="gmc-description" class="gmc-admin-fullline" rows="5" name="gmc-description"><?php echo get_post_meta($post->ID,"gmc-description",true); ?></textarea>
	</div>
	
	<div id="gmc-note">
	  <?php 
		$note_position = get_option('gmc-note-position') == '' ? 'before' : 'after';
		$note_link = "<a href='".get_bloginfo('url')."/wp-admin/admin.php?page=getmecooking_options"."'>$note_position</a>";
	  ?>
	  <p id="gmc-note-desc">Anything you type here will appear <?php echo $note_link; ?> the recipe steps.</p>
	</div>
	
	<div id="transfer">
	  <?php
		$gmcid=get_post_meta($post->ID,"gmc-id",true); 
		$gmcusername=get_option("gmc-username");
		
		if (empty($gmcusername)) {
		echo "<p>You are currently using this plugin as a guest user. To get more functionality, please <a href='".get_bloginfo('url')."/wp-admin/admin.php?page=getmecooking_options"."'>enter your GetMeCooking details</a>.</p>";
		} else {
		echo "<p>You have told us that your GetMeCooking username is <strong>".$gmcusername."</strong>.<br/>";
		echo "<p>You can <a href='".get_bloginfo('url')."/wp-admin/admin.php?page=getmecooking_options"."'>change your details here</a>.</p>";
		} 
		
		echo "<p>";
		if (get_option('gmc-hide-recipes'))  
		echo "You have opted out of send this recipe to GetMeCooking. (<a href='".get_bloginfo('url')."/wp-admin/admin.php?page=getmecooking_options#gmc-share-the-love"."'>I've changed my mind, I want my recipes to appear on GetMeCooking</a>)";
		else
		{
		echo "You have opted in to send this recipe to GetMeCooking.";
		if (empty($gmcusername))
		  echo ' Once approved by the staff it will appear on <a href="http://www.getmecooking.com/recipes">www.getmecooking.com</a>.';      
		else
		  echo ' Once approved by the staff it will appear on <a href="http://www.getmecooking.com/user/' . strtolower($gmcusername) . '">http://www.getmecooking.com/user/' . strtolower($gmcusername) . '</a>';
		}
		echo "</p>";
	
    echo '<strong>Note:</strong> Recipes go through an approval process before appearing on <a href="http://www.getmecooking.com">www.getmecooking.com</a>. It must have a good quality photograph and full recipe information. For more information please see <a href="http://www.getmecooking.com/recipe-template-info#faqMissingRecipesGMC">the FAQ</a>.';
    
		echo "<p>";
		if (is_numeric($gmcid)) {
		echo 'This recipe has been sent to GetMeCooking.';
		} else {
		echo "This recipe hasn't been sent to GetMeCooking yet.";
		}
		echo "</p>";
        
    echo '<input type="hidden" name="gmc_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	  ?>
	</div>
  </div>  
</div>

<?php  
}

function gmc_set_term_relationship_meta($object_id, $term_taxonomy_id, $meta) {
  global $wpdb;

  $wpdb->update($wpdb->term_relationships,array('meta'=>serialize($meta)),array("object_id" => $object_id, "term_taxonomy_id" => $term_taxonomy_id));
}

function gmc_save_settings() {
  if($_POST["gmc-settings-save"]!= "Y") {
	return;
  }
  
  // CSS
  updateOrDeleteOption("gmc-overridecss", $_POST["gmc-overridecss"]);
  
  if(!empty($_POST["gmc-shortcodecss"]))
  {
	update_option("gmc-shortcodecss", $_POST["gmc-shortcodecss"]);
  }
  
  if(!empty($_POST["gmc_resetcss"]))
  {
	delete_option("gmc-shortcodecss");
	delete_option("gmc-overridecss");
  }
  
  // GMC account
  if(empty($_POST["gmc-hide-recipes"]))
  {
	update_option("gmc-hide-recipes", 'Y');
  } else
  {
	delete_option("gmc-hide-recipes");
  }
  
  if(empty($_POST["gmc-hide-powered-by"]))
  {
	update_option("gmc-hide-powered-by", 'Y');
  } else
  {
	delete_option("gmc-hide-powered-by");
  }
  
  if(empty($_POST["gmc-hide-links"]))
  {
	update_option("gmc-hide-links", 'Y');
  } else
  {
	delete_option("gmc-hide-links");
  }  
  
  updateOrDeleteOption("gmc-label-step", $_POST["gmc-label-step"]);  
  updateOrDeleteOption("gmc-label-step-position", $_POST["gmc-label-step-position"]);
  
  $photo_position = $_POST["gmc-step-photo-position"];
  
  if(empty($photo_position))
	$photo_position = 0;
  
  update_option("gmc-step-photo-position", $photo_position);
  
  updateOrDeleteOption("gmc-note-position", $_POST["gmc-note-position"]);  
  updateOrDeleteOption("gmc-background-colour", $_POST["gmc-background-colour"]);  
  updateOrDeleteOption("gmc-border-colour", $_POST["gmc-border-colour"]);
  
  if(!empty($_POST["gmc-border-style"]) && $_POST["gmc-border-style"] != 'none')
  {
	update_option("gmc-border-style", $_POST["gmc-border-style"]);
  } else
  {
	delete_option("gmc-border-style");
  }
  
  if(!empty($_POST["gmc-border-width"]) && $_POST["gmc-border-width"] != 'none')
  {
	update_option("gmc-border-width", $_POST["gmc-border-width"]);
  } else
  {
	delete_option("gmc-border-width");
  }
  
  updateOrDeleteOption("gmc-label-serves", $_POST["gmc-label-serves"]);  
  updateOrDeleteOption("gmc-label-prep-time", $_POST["gmc-label-prep-time"]);  
  updateOrDeleteOption("gmc-label-cook-time", $_POST["gmc-label-cook-time"]);  
  updateOrDeleteOption("gmc-label-total-time", $_POST["gmc-label-total-time"]);  
  updateOrDeleteOption("gmc-label-meal-type", $_POST["gmc-label-meal-type"]);  
  updateOrDeleteOption("gmc-label-allergy", $_POST["gmc-label-allergy"]);  
  updateOrDeleteOption("gmc-label-occasion", $_POST["gmc-label-occasion"]);  
  updateOrDeleteOption("gmc-label-dietary", $_POST["gmc-label-dietary"]);  
  updateOrDeleteOption("gmc-label-misc", $_POST["gmc-label-misc"]);  
  updateOrDeleteOption("gmc-label-region", $_POST["gmc-label-region"]);  
  updateOrDeleteOption("gmc-label-source-author", $_POST["gmc-label-source-author"]);  
  updateOrDeleteOption("gmc-label-source-book", $_POST["gmc-label-source-book"]);
  updateOrDeleteOption("gmc-label-source-mag", $_POST["gmc-label-source-mag"]);
  updateOrDeleteOption("gmc-label-source-website", $_POST["gmc-label-source-website"]);  
  updateOrDeleteOption("gmc-label-ingredients", $_POST["gmc-label-ingredients"]);  
  updateOrDeleteOption("gmc-label-directions", $_POST["gmc-label-directions"]);  
  updateOrDeleteOption("gmc-label-note", $_POST["gmc-label-note"]);
  
  if(!empty($_POST["gmc-username"])) {
	$username = $_POST["gmc-username"];
		
	if (!preg_match("/^[\w\-_]+$/", $username))
	{
	  echo "<div class='updated'><p><strong>";
	  _e('Your username can only contain letters, numbers, hyphens (dashes) and underscores, please check you are using the correct username.' );
	  echo "</strong></p></div>";
	  return;
	}
  }
  
	updateOrDeleteOption("gmc-username", $_POST["gmc-username"]);
  
  echo "<div class='updated'><p><strong>";
  _e('Options saved.' );
  echo "</strong></p></div>";
}

function updateOrDeleteOption($key, $value) {
  if(!empty($value)) {
	update_option($key, $value);
  } else {
	delete_option($key);
  }
}

function updateOrDeleteMeta($id, $key, $value) {
  if(!empty($value)) {
	update_post_meta($id, $key, $value);
  } else {
	delete_post_meta($id, $key);
  }
}

function gmc_save_recipe_to_db($post_ID, $post) {
  // generic params
  updateOrDeleteMeta($post_ID, "gmc-nr-servings", $_POST['gmc-nr-servings']);  
  updateOrDeleteMeta($post_ID, "gmc-prep-time-hours", $_POST['gmc-prep-time-hours']);  
  updateOrDeleteMeta($post_ID, "gmc-prep-time-mins", $_POST['gmc-prep-time-mins']);
  updateOrDeleteMeta($post_ID, "gmc-cooking-time-hours", $_POST['gmc-cooking-time-hours']);  
  updateOrDeleteMeta($post_ID, "gmc-cooking-time-mins", $_POST['gmc-cooking-time-mins']);
  
  $source_type = $_POST['gmc-source-type'];
  if (!empty($source_type)) {
	update_post_meta($post_ID, "gmc-source-type", $source_type);
	if ($source_type == "Author") {
	  if (!empty($_POST['gmc-source-author-name'])) {
		update_post_meta($post_ID, "gmc-source-name", $_POST['gmc-source-author-name']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-name");
		delete_post_meta($post_ID, "gmc-source-type");
	  }
	  if (!empty($_POST['gmc-source-author-url'])) {
		update_post_meta($post_ID, "gmc-source-url", $_POST['gmc-source-author-url']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-url");
	  }
	}
	else if ($source_type == "Book") {
	  if (!empty($_POST['gmc-source-book-name'])) {
		update_post_meta($post_ID, "gmc-source-name", $_POST['gmc-source-book-name']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-name");
		delete_post_meta($post_ID, "gmc-source-type");
	  }
	  if (!empty($_POST['gmc-source-book-url'])) {
		update_post_meta($post_ID, "gmc-source-url", $_POST['gmc-source-book-url']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-url");        
	  }
	}
	else if ($source_type == "Magazine") {
	  if (!empty($_POST['gmc-source-mag-name'])) {
		update_post_meta($post_ID, "gmc-source-name", $_POST['gmc-source-mag-name']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-name");
		delete_post_meta($post_ID, "gmc-source-type");
	  }
	  if (!empty($_POST['gmc-source-mag-url'])) {
		update_post_meta($post_ID, "gmc-source-url", $_POST['gmc-source-mag-url']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-url");        
	  }
	}
	else {
	  if (!empty($_POST['gmc-source-website-name'])) {
		update_post_meta($post_ID, "gmc-source-name", $_POST['gmc-source-website-name']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-name");
		delete_post_meta($post_ID, "gmc-source-type");
	  }
	  if (!empty($_POST['gmc-source-website-url'])) {
		update_post_meta($post_ID, "gmc-source-url", $_POST['gmc-source-website-url']);
	  }
	  else
	  {
		delete_post_meta($post_ID, "gmc-source-url");        
	  }
	}
  }
  else
  {
	delete_post_meta($post_ID, "gmc-source-type");
  delete_post_meta($post_ID, "gmc-source-name");
  delete_post_meta($post_ID, "gmc-source-url");
  }
  
  // generic optional params
  
  //region can be from drop down list or custom textbox value
  $region = $_POST['gmc-recopt-region'];
  
  if (!empty($_POST['gmc-use-custom-region']) && !empty($_POST['gmc-custom-region'])) {
	update_post_meta($post_ID, "gmc-use-custom-region", 'Y');
	$region = $_POST['gmc-custom-region'];
  }
  else
  {
	delete_post_meta($post_ID, "gmc-use-custom-region");
  }
  
  wp_set_post_terms($post_ID, $region, 'gmc_region');
  wp_set_post_terms($post_ID, $_POST['gmc-recopt-when'], 'gmc_course');
  wp_set_post_terms($post_ID, $_POST['gmc-recopt-occasion'], 'gmc_occasion');
  wp_set_post_terms($post_ID, $_POST['gmc-recopt-allergies'], 'gmc_allergy');
  wp_set_post_terms($post_ID, $_POST['gmc-recopt-dietary'], 'gmc_dietary');
  wp_set_post_terms($post_ID, $_POST['gmc-recopt-other'], 'gmc_misc');

  //steps
  if (isset($_POST['stepid'])) {
	$i=1;

	$step_to_delete = $_POST['gmc_step_to_delete'];
	
	foreach($_POST['stepid'] as $key => $stepid) {
	  $my_post=array();
	  $my_post['menu_order']=$i;

	  if ($_POST['steptitle'][$key]) {
		$my_post['post_title']=$_POST['steptitle'][$key];
	  }
	  if ($_POST['stepdescription'][$key]) {
		$my_post['post_content']=$_POST['stepdescription'][$key];
	  }  
	  
	  if ($stepid=="" || $stepid=="0") {
      if(!empty($_POST['stepdescription'][$key]))
      {
        $my_post['post_type'] = 'gmc_recipestep';
        $my_post['post_parent'] = $post_ID;
        $my_post['post_status'] = 'publish';
        $my_post['post_author'] = $current_user->ID;
      
        wp_insert_post($my_post);
      }
	  }    
	  else if (!empty($step_to_delete) && $step_to_delete == $stepid) {
	  //Unattach any previous photo associated to this recipe step
		$atts=get_posts('post_type=attachment&post_status=inherit&post_parent='.$step_to_delete);
		
		gmc_unattach_photo($atts, $post_ID);
		
		wp_delete_post($step_to_delete,true);
	  }
	  else
	  {
		$my_post['ID']=$stepid;
	  
		wp_update_post($my_post);
		$thumbid = get_post_thumbnail_id($stepid);
		
		if ($thumbid > 0)
		{
		  $thumbnail = get_post($thumbid);
		  if(!empty($_POST['gmc-step-alt-text'][$key]))
		  {            
		  $thumbnail->post_title = $_POST['gmc-step-alt-text'][$key];
		  }
		  else
		  {
		  $thumbnail->post_title = '';
		  }
		  
		  wp_update_post($thumbnail);
		}
	  }
	  $i++;
	}
  }

  // ingredients
  if (isset($_POST['gmc-recipeingredientid'])) {

	$i=1;

	foreach($_POST['gmc-recipeingredientid'] as $key => $ingredientid) {

	  $my_post=array();
	  $my_post['menu_order']=$_POST['gmc-recipeingredientorder'][$key];
	  $my_post['post_type'] = 'gmc_recipeingredient';
	  $my_post['post_parent'] = $post_ID;
	  $my_post['post_status'] = 'publish';
	  $my_post['post_author'] = $current_user->ID;

	  if ($_POST['gmc-ingredientname'][$key]) {
		$my_post['post_title']=$_POST['gmc-ingredientname'][$key];
	  }
	  if ($_POST['gmc-ingredientnote'][$key]) {
		$my_post['post_content']=$_POST['gmc-ingredientnote'][$key];
	  }

	  $deleting=false;
	  $ingredient_to_delete = $_POST['gmc_ingredient_to_delete'];
	  $newingredientid = 0;
	  
	  if (intval($ingredientid) == 0) {      
      if (!empty($my_post['post_title']))
      {
        $newingredientid=wp_insert_post($my_post);
        
        if ($newingredientid) {
          $iid=$newingredientid;
        }
      }
	  }
	  else if (!empty($ingredient_to_delete) && $ingredient_to_delete == $ingredientid) {
		wp_delete_post($ingredient_to_delete,true);
		$deleting=true;
	  }
	  else {
		//update
		$my_post['ID']=$ingredientid;
	  
		wp_update_post($my_post);
		$iid=$ingredientid;
	  }

      if (!$deleting && !empty($_POST['gmc-ingredientname'][$key])) {
        updateOrDeleteMeta($iid, "gmc-ingredientquantity", $_POST['gmc-ingredientquantity'][$key]);

		//measurement can be from drop down list or custom textbox value
		$measurement = $_POST['gmc-ingredientmeasurement'][$key];
		
		if (!empty($_POST['gmc-use-custom-measurement'][$key]) && !empty($_POST['gmc-custom-measurement'][$key])) {
		  update_post_meta($iid, "gmc-use-custom-measurement", 'Y');
		  $measurement = $_POST['gmc-custom-measurement'][$key];
		}
		else
		{
		  delete_post_meta($iid, "gmc-use-custom-measurement");
		}
		
		updateOrDeleteMeta($iid, "gmc-ingredientmeasurement", $measurement);
		
		updateOrDeleteMeta($iid, "gmc-ingredientgroup", $_POST['gmc-ingredientgroup'][$key]);
		
		//error_log(print_r($_POST['gmc-ingredientoptional'],1));
        
		if ($_POST['gmc-ingredientoptional'] && (in_array($ingredientid,$_POST['gmc-ingredientoptional']))) {
		  //error_log($_POST['gmc-ingredientoptional'][$key]);
		  update_post_meta($iid, "gmc-ingredientoptional", "Y");
		} else {
		  delete_post_meta($iid, "gmc-ingredientoptional");
		}
	  }

	  $i++;
	}
  }

  //description
  updateOrDeleteMeta($post_ID, "gmc-description", $_POST['gmc-description']);
}

function gmc_save_recipe_to_gmc($post_ID, $post) {
  if ($post->post_status=="publish") {
	//error_log("+++++ RECIPE PUBLISH");
	$gmcid=get_post_meta($post_ID,"gmc-id",true);

	try {	  

	  //$result=gmc_send_xml(GMC_URL, gmc_get_recipe_xml($post,$gmcid));
	  $result=gmc_send_xml_curl(GMC_URL, gmc_get_recipe_xml($post,$gmcid));
	  //error_log("SAVING");

	} catch (Exception $e) {
	  echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

	$xresult=simplexml_load_string($result);
	$gmcid=(int)$xresult['id'];

//      if (!empty($gmcid)) {
	  update_post_meta($post_ID,"gmc-id",$gmcid);
//      }
  }

}

function gmc_save_recipe($post_ID, $post) {
  if( $parent_id = wp_is_post_revision($post_ID) ) {
    $post_ID = $parent_id;
  }
  
  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // Check permissions
  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_ID ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_ID ) )
        return;
  }

  if ($post->post_type=='gmc_recipe') {
    // verify this came from the our screen and with proper authorization, because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['gmc_noncename'], plugin_basename( __FILE__ ) ) )
      return;
      
	gmc_save_recipe_to_db($post_ID, $post);

	// now send to GMC
	gmc_save_recipe_to_gmc($post_ID, $post);
  }
}

function gmc_get_post_meta_unknown_id($meta_key)
{
  global $wpdb;
  return $wpdb->get_results( $wpdb->prepare("SELECT post_id, meta_value
	FROM {$wpdb->postmeta} as postmeta
	WHERE postmeta.meta_key = '%s'
  ", $meta_key));
}

function gmc_get_post_id($meta_key)
{
  global $wpdb;
  return $wpdb->get_col( $wpdb->prepare( "
	SELECT post_id
	FROM {$wpdb->postmeta} as postmeta
	WHERE postmeta.meta_key = '%s'
  ", $meta_key));
}

function gmc_get_post_meta_values($meta_key)
{
  global $wpdb;
  return $wpdb->get_col( $wpdb->prepare( "
	SELECT meta_value
	FROM {$wpdb->postmeta} as postmeta
	WHERE postmeta.meta_key = '%s'
  ", $meta_key));
}

function gmc_get_post_count_for_recipe($meta_value)
{
  global $wpdb;
  return $wpdb->get_var($wpdb->prepare( "SELECT COUNT(meta_id) FROM $wpdb->postmeta WHERE meta_key= 'gmc_local_id' AND meta_value = '%s'", $meta_value) );
}

function gmc_option_list($options, $selected, $onlyvalues = false) {
  $result="";

  foreach ($options as $key => $option) {
	if ($onlyvalues) {
	  $result.="<option value='".$option."' ".($option==$selected ? "selected='selected'" : "").">".$option."</option>";
	} else {
	  $result.="<option value='".$key."' ".($key==$selected ? "selected='selected'" : "").">".$option."</option>";
	}
  }
  
  return $result;
}

function gmc_print_styles() {
  if (is_admin()) {
	return;
  }

  $overridecss=get_option('gmc-overridecss');
  $gmccss=get_option('gmc-shortcodecss');

  if (empty($overridecss)) {
	wp_register_style('recipe-template', gmc_plugin_url().'/css/recipe-template.css', false, GMC_VERSION);
	wp_enqueue_style( 'recipe-template');
  } else {
	echo "<style type='text/css'>\n";
	echo stripslashes($gmccss);
	echo "</style>\n";
  }
}

function gmc_admin_print_styles() {
  if (!gmc_is_recipe_admin_page()) {
	return;
  }
  
  wp_register_style('jquery.alerts', gmc_plugin_url().'/css/jquery.alerts.css');
  wp_enqueue_style( 'jquery.alerts');

  wp_register_style('chosen', gmc_plugin_url().'/css/chosen.css');
  wp_enqueue_style( 'chosen');
  
  wp_register_style('codemirror', gmc_plugin_url().'/css/codemirror.css');
  wp_enqueue_style( 'codemirror');
  
  wp_register_style('codemirrordefault', gmc_plugin_url().'/css/codemirrordefault.css');
  wp_enqueue_style( 'codemirrordefault');
	
  wp_register_style('jquery.miniColors', gmc_plugin_url().'/css/jquery.miniColors.css');
  wp_enqueue_style( 'jquery.miniColors');
	
  wp_enqueue_style('thickbox');

  global $pagenow;
  if ($pagenow == 'media-upload.php') {
	if (isset($_REQUEST['post_id'])) {
	  $p=get_post($_REQUEST['post_id']);
	  
	  if ($p->post_type!="gmc_recipe") {
		return;
	  }
	}
  }

  wp_register_style('recipe-template-admin', gmc_plugin_url().'/css/recipe-template-admin.css', false, GMC_VERSION);
  wp_enqueue_style( 'recipe-template-admin');
}

function gmc_enqueue_scripts() {
  if (is_admin()) {
	return;
  }
  
  //TODO need them in both places, some pages dont call here when they should etc
  wp_enqueue_script('thickbox');  
  wp_enqueue_script('recipe-template',gmc_plugin_url().'/js/recipe-template.js',array('thickbox'),GMC_VERSION,true);
}

function gmc_admin_enqueue_scripts() {
  if (!gmc_is_recipe_admin_page()) {
	wp_enqueue_script('thickbox');	
	wp_enqueue_script('recipe-template',gmc_plugin_url().'/js/recipe-template.js',array('thickbox'),GMC_VERSION,true);	
	return;
  }
  
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-sortable');
  wp_enqueue_script('jquery-ui-tabs');

  wp_enqueue_script('chosen.jquery.min',gmc_plugin_url().'/js/chosen.jquery.min.js');
  wp_enqueue_script('jquery.alerts',gmc_plugin_url().'/js/jquery.alerts.min.js');
  wp_enqueue_script('jquery.miniColors',gmc_plugin_url().'/js/jquery.miniColors.min.js');
  wp_enqueue_script('thickbox');

  wp_enqueue_script('codemirror', gmc_plugin_url().'/js/codemirror.js','1.0',true);
  wp_enqueue_script('codemirrorcss', gmc_plugin_url().'/js/css.js','1.0',true);
  
  wp_enqueue_script('autoresize.jquery', gmc_plugin_url().'/js/autoresize.jquery.min.js','1.0',true);

  // this way we can override tb_remove() :)
  wp_enqueue_script('recipe-template-admin',gmc_plugin_url().'/js/recipe-template-admin.js',array('thickbox','codemirror','codemirrorcss'),GMC_VERSION,true);

  wp_enqueue_script('swfupload');
  wp_enqueue_script('swfupload-queue', array('swfupload'));
  
  wp_enqueue_script('gmc-swfupload-fileprogress', gmc_plugin_url().'/js/recipe-template-fileprogress.js', array('swfupload'),GMC_VERSION,true);
  wp_enqueue_script('gmc-swfupload-handlers', gmc_plugin_url().'/js/recipe-template-handlers.js', array( 'gmc-swfupload-fileprogress'),GMC_VERSION,true);

  wp_enqueue_script('gmc-ajax-request', gmc_plugin_url().'/js/recipe-template-ajax.js', array( 'jquery', 'swfupload', 'swfupload-queue', 'gmc-swfupload-handlers' ),GMC_VERSION,true);

  global $post;
  wp_localize_script('gmc-ajax-request', 'GMCAjax', array('postID' => $post->ID,
															'ajaxurl' => admin_url( 'admin-ajax.php' ),
															'jsurl' => gmc_plugin_url().'/js/',
															'uploadimageurl' => includes_url( 'images/upload.png' ),
															'swfurl' => includes_url( 'js/swfupload/swfupload.swf' ),
															'nonce' => wp_create_nonce( 'gmc-nonce' )
															));
}

function gmc_show_recipe($id, $showtitle=true) {
  global $post;
  $tmppost=$post;

  $post=get_post($id);
  setup_postdata($post);

  ob_start();

//  echo "<pre>\n";
//  echo htmlentities(gmc_get_recipe_xml($post));
//  echo "</pre>\n";

  global $gmcCssPrint;
  $gmcCssPrint = get_option('gmc-overridecss');

  require_once "recipe-template-shortcode.php";

  $output=ob_get_contents();
  ob_end_clean();

  $post=$tmppost;
  setup_postdata($post);
  
  return $output;
}

function gmc_recipe_shortcode($atts, $content=null) {
  $id=$atts[0];
  
  if (empty($id)) {
  // get from postmeta
  } else {
	$output=gmc_show_recipe($id);
  }

  return $output;
}

function gmc_the_content($content) {
  global $post, $gmc_skip_content;

  if ($post->post_type=='gmc_recipe' && !$gmc_skip_content) {
	remove_filter('the_content', 'gmc_the_content', 10);

	$content=gmc_show_recipe($post->ID, false);

	add_filter('the_content', 'gmc_the_content', 10);
  }

  return $content;
}

/*
  helper function: displays a select dropdown
*/

function gmc_select_helper($name,$options,$selected = '',$params = '') {
  $return = '<select name="'.$name.'" id="'.$name.'"';
  if(is_array($params)) {
	foreach($params as $key=>$value) {
		$return.= ' '.$key.'="'.$value.'"';
	}
  } else {
	  $return.= $params;
  }
  $return.= '>';
  foreach($options as $key=>$value) {
	  $return.='<option value="'.$value.'"'.($selected != $value ? '' : ' selected="selected"').'>'.$key.'</option>';
  }

  return $return.'</select>';
}

function gmc_insert_recipe_dialog() {
  echo "<div id='gmc-choose-recipe' style='display: none;'>\n";
  $r=get_posts('post_status=publish&post_type=gmc_recipe&nopaging=1&orderby=menu_order&order=ASC');  

  if ($r) {
	$recipes=array();
	foreach($r as $rec) {
	  $recipes[$rec->post_title]=$rec->ID;
	}

	echo "<p class='howto'>Choose the recipe you'd like to display in this post.</p>";
	
	echo "<p><label class='gmc-admin-label inline'><span>Recipe:</span></label>";
	echo gmc_select_helper('gmc-insert-recipe-list', $recipes);
	echo "</p>";
	echo "<p class='submitbox'>";
	submit_button( __('Insert Recipe'), 'primary', 'gmc-insert-recipe-button', false, array('tabindex' => 100, 'class'=>"button-primary gmc-admin-button left"));
	
  } else {
	echo "<p class='howto'>Once you have added a recipe by using the Recipes menu on the left sidebar (below the Posts menu) you can come back here and insert that recipe into your post.</p>";
  }

//  echo '<a href="#" class="button-primary gmc-admin-button left" name="gmc-insert-recipe" id="gmc-insert-recipe-button">Insert Recipe</a>';
  echo "</p></div>\n";
}

function gmc_add_edit_attachment($post_ID) {
  $photo=get_post($post_ID);
  $recipestep=get_post($photo->post_parent);

  if ($recipestep->post_type=="gmc_recipestep") {
	//error_log("Insert attachment: ".$post_ID." ".$photo->post_parent);

	set_post_thumbnail($photo->post_parent, $post_ID);

	//Unattach any previous photo associated to this recipe step
	$atts=get_posts('post_type=attachment&post_status=inherit&post_parent='.$photo->post_parent);
	
	gmc_unattach_photo($atts, $post_ID);
  }
}

function gmc_unattach_photo($atts, $post_ID) {
  foreach($atts as $att) {
	if ($att->ID!=$post_ID) {
	  //error_log(print_r($att,1));
	  $thumbnail = get_post($att->ID);
	  $thumbnail->post_parent = 0;
	  wp_update_post($thumbnail);
	  //wp_delete_attachment($att->ID, true);
	}
  }
}

function gmc_media_upload_tabs($tabs) {
/*
	$_default_tabs = array(
		'type' => __('From Computer'), // handler action suffix => tab text
		'type_url' => __('From URL'),
		'gallery' => __('Gallery'),
		'library' => __('Media Library')
	);
*/

  //if (isset($_REQUEST['post_id'])) {
	//$p=get_post($_REQUEST['post_id']);
	//error_log(print_r($p,1));

	//if ($p->post_type=='gmc_recipe' || $p->post_type=='gmc_recipestep' || $p->post_type=='gmc_recipeingredient') {
//      unset($tabs['library']);
	//}
  //}

	return $tabs;
}

function gmc_admin_footer() {
}

function gmc_enter_title_here($title, $post) {
  if ($post->post_type=="gmc_recipe") {
	$title="Recipe Title";
  }
  
  return $title;
}

// function gmc_the_editor_content($content) {
  // global $post;
  
  // // if ($post->post_type=="gmc_recipe" && empty($content)) {
	// // $content="Enter a brief description of your recipe here (delete this text)";
  // // }

  // // //error_log($content);

  // return $content;
// }

function gmc_admin_post_thumbnail_html($content) {
//  error_log($content);

  global $post;
  
  if ($post->post_type=="gmc_recipe") {
	$content=preg_replace('/Set featured image/','Set photograph of finished Recipe', $content);
	$content=preg_replace('/Remove featured image/','Remove photograph of finished Recipe', $content);
  }

  return $content;
}

function gmc_plugin_action_links($links, $file) {
//  static $this_plugin;

//  if (!$this_plugin) {
//    $this_plugin = plugin_basename(__FILE__);
//  }

  if (basename($file)=='recipe-template.php') {
	$settings_link = '<a href="'.admin_url("admin.php?page=getmecooking_options").'">Settings</a>';
	array_unshift($links, $settings_link);
  }

  return $links;
}

function gmc_attachment_fields_to_edit($form_fields, $p) {

//  error_log(print_r($form_fields, 1));

  if (!empty($p->post_parent)) {
	$parent=get_post($p->post_parent);

	if ($parent->post_type=='gmc_recipe' || $parent->post_type=='gmc_recipestep' || $parent->post_type=='gmc_recipeingredient') {
	  unset($form_fields['post_excerpt']);
	  unset($form_fields['post_content']);
//      unset($form_fields['url']);
	  unset($form_fields['align']);
	  unset($form_fields['image-size']);
//  		$form_fields['buttons'] = array( 'tr' => "\t\t<tr class='submit'><td></td><td class='savesend'>$send $thumbnail $delete</td></tr>\n" );
	}
  }

  return $form_fields;
}

function gmc_redirect_post_location($location, $post_id) {
//  error_log(print_r($_POST, 1));

  if (!empty($_POST['gmc_selected_tab'])) {
	$location.= '&gmc-tab='. $_POST['gmc_selected_tab'];
  }

  if (isset($_POST['save_add_step'])) {
	$location.="&gmc-add=step#gmc-addstep";
//    error_log("1");
  }
  else if (isset($_POST['save_add_ingredient'])) {
	$location.="&gmc-add=ingredient#gmc-addingredient";
//    error_log("2");
  }

  return $location;
}

function gmc_ajax_upload() {
  $nonce = $_REQUEST['nonce'];

// todo - why doesnt it work?
//  if ( ! wp_verify_nonce( $nonce, 'onecpt-nonce' ) ) {
//    die( 'How did you get here?');
//  }

  $post_id = $_REQUEST['post_id'];

  // tricky...
  $file_handler="Filedata";

  // check to make sure its a successful upload
  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
 
  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');
 
  //Get the current alt text as it is overwritten when the new file is uploaded
  $step=get_post($post_id);

  $atts=get_posts('post_type=attachment&post_status=inherit&post_parent='.$post_id);
  
  $original_alt_text = '';
	foreach($atts as $att) {
	  $original_alt_text = $att->post_title;
	  break;
	}
  
  $attach_id = media_handle_upload( $file_handler, $post_id );
  
  if (is_object($attach_id) && ($attach_id instanceof WP_Error)) {
	$attach_id=0;
  }
 
  if ($attach_id) {
	// for further onecpt_ajax_get_images calls
	update_post_meta($post_id,'_thumbnail_id',$attach_id);
  
	$photo=get_post($attach_id);
	
	$photo->post_title = $original_alt_text;
	
	wp_update_post($photo);
  }

  echo get_the_post_thumbnail($post_id, "medium");

  exit;
}

function gmc_total_time($prepHour, $prepMinute, $cookHour, $cookMinute) {
  $hour = $prepHour + $cookHour;

  $minute = $prepMinute + $cookMinute;
  
  return gmc_time($hour, $minute);
}

function gmc_time($hour, $minute)
{
  $hours = "";
  $minutes = "";

  $dblHour = (int)$hour;
  $dblMinutes = (int)$minute;

  if ($hour == 0 && $minute == 0)
  {
	return "None";
  }
  else
  {
	$partMinutes;

	if ($dblMinutes >= 60)
	{
  
	  $partMinutes = $dblMinutes % 60;
	  $dblHour .= $dblMinutes / 60;
	  $dblMinutes = $partMinutes;
	}

	if ($dblHour == 1)
	{
	  $hours = "1 hour";
	}
	else if ($dblHour > 1)
	{
	  $hours .= intval($dblHour) . " hours";
	}

	if ($dblMinutes == 1)
	{
	  $minutes .= "1 minute";
	}
	else if ($dblMinutes > 1)
	{
	  $minutes .= intval($dblMinutes) . " minutes";
	}
  }

  if ($dblHour == 0)
  {
	return $minutes;
  }

  if ($dblMinutes == 0)
  {
	return $hours;
  }

  return $hours . ", " . $minutes;
}

function search_engine_total_time($prepHour, $prepMinute, $cookHour, $cookMinute)
{
	$hour = $prepHour + $cookHour;

	$minute = $prepMinute + $cookMinute;

	return search_engine_time($hour, $minute);
}
		
function search_engine_time($hour, $minute)
{
	$hours = '';
	$minutes = '';

	$dblHour = (int)$hour;
	$dblMinutes = (int)$minute;

	if ($hour == 0 && $minute == 0)
	{
		return '';
	}
	else
	{
		$partMinutes;

		if ($dblMinutes >= 60)
		{
			$partMinutes = $dblMinutes % 60;
			$dblHour .= floor($dblMinutes / 60);
			$dblMinutes = $partMinutes;
		}

		if ($dblHour == 1)
		{
			$hours = "1H";
		}
		else if ($dblHour > 1)
		{
			$hours .= $dblHour . "H";
		}

		if ($dblMinutes == 1)
		{
			$minutes .= "1M";
		}
		else if ($dblMinutes > 1)
		{
			$minutes .= $dblMinutes . "M";
		}
	}

	if ($dblHour == 0)
	{
		return "PT" . $minutes;
	}

	if ($dblMinutes == 0)
	{
		return "PT" . $hours;
	}

	return "PT" . $hours . $minutes;
}

function print_ingredient_description($ingredient)
{
  $quantity = get_post_meta($ingredient->ID, "gmc-ingredientquantity", true);
  $measurement = get_post_meta($ingredient->ID,'gmc-ingredientmeasurement',true);
  $title = $ingredient->post_title;
  $description = $ingredient->post_content;
  $output = $quantity;
  if(!empty($measurement))
  {
	switch ($measurement)
	{
	  case 'bunch':
	  case 'pinch':
		if ($quantity > 1)
		  $measurement .= 'es';
		break;
	  case 'imperial fl oz':
	  case 'usa fl oz':	  
		$measurement = 'fl oz';
		break;
	  case 'imperial pint':
	  case 'usa pint':
    case 'usa pint weight':
    case 'imperial pint weight':
		$measurement = 'pint';
		break;
	  case 'g':
	  case 'kg':
	  case 'ml':
	  case 'l':
	  case 'oz':
	  case 'lb':	  
	  case 'small':
	  case 'medium':
	  case 'large':
		break;
	  default:
    if ($quantity > 1)
    {
      $last = $measurement[strlen($measurement)-1];
      
      if($last != "s")
      $measurement .= 's';
    }
	}
  
	if ($measurement == 'g' || $measurement == 'kg' || $measurement == 'ml' || $measurement == 'l' || $measurement == 'oz' || $measurement == 'lb' || $measurement == 'fl oz')
	  $output .= "$measurement $title";
	else
	  $output .= " $measurement $title";
  }
  else if($quantity > 0)
	$output .= " $title";
  else
	$output .= $title;

  if($description)
	$output .= " ($description)";
	
  return $output;
}

function gmc_recipe_filter_link($filter, $has_photo, $category)
{
  if(get_option('gmc-hide-links'))
	return $filter;

  $username = get_option("gmc-username");
  $filterText = $filter;
	
  if($username && $has_photo)
  {
	if ($filterText == 'Worldwide')
	{
	  $filter = "username=$username";
	}
	else
	{
	  $filter .= "&username=$username";
	}
  }
  
  if ($filterText != 'Worldwide')
  {
	return '<a href="http://www.getmecooking.com/recipes?'.$category.'='.$filter. '">'.$filterText.'</a>';
  }
  else
  {
	if($username)
	{
	  return '<a href="http://www.getmecooking.com/recipes?'.$filter.'">'.$filterText.'</a>';
	}
	else
	{
	  return '<a href="http://www.getmecooking.com/recipes">'.$filterText.'</a>';
	}
  }
}

function gmc_distinct_group_names($recipe_id)
{
  global $wpdb;
  $result = $wpdb->get_col( $wpdb->prepare( "
	SELECT DISTINCT meta_value
	FROM {$wpdb->postmeta} as postmeta
	WHERE postmeta.post_id IN
	(SELECT ID FROM {$wpdb->posts} as posts WHERE posts.post_parent = '%s')    
	AND postmeta.meta_key = 'gmc-ingredientgroup'
  ", $recipe_id));
  
  return $result;
}

function gmc_label_step($step_id)
{
	switch (get_option('gmc-label-step'))
	{
	  case '0':
		return "Step $step_id";
		break;
	  case '1':
		return "Step $step_id.";
		break;
	  case '2':
		return "step $step_id";
		break;
	  case '3':
		return "step $step_id.";
		break;
	  case '4':
		return "$step_id.";
		break;
	  case '5':
		return $step_id;
		break;
	  case '6':
		return;
		break;
	  default:
		return "Step $step_id";
	}
}

function gmc_label_step_class($step_id)
{
  switch (get_option('gmc-label-step'))
	{
	  case '0':
	  case '1':
	  case '2':
	  case '3':
		return 'gmc-step-list-title-wide';
		break;
	  case '4':
	  case '5':
		return 'gmc-step-list-title';
	  case '6':
		return;
		break;
	  default:
		return 'gmc-step-list-title-wide';
	}
}

function gmc_recipe_main_style()
{
  $output = '';
  if (get_option('gmc-background-colour'))
	$output .= 'background-color:' . get_option('gmc-background-colour') . ';';
  
  if (get_option('gmc-border-colour'))
	$output .= ' border-color:' . get_option('gmc-border-colour') . ';';
	
  if (get_option('gmc-border-style'))
	$output .= 'border-style:' . get_option('gmc-border-style') . ';';
	
  if (get_option('gmc-border-width'))
	$output .= 'border-width:' . get_option('gmc-border-width') . ';';
	
  return $output;
}

function gmc_exclude_recipe_category($query)
{
	return $query = " AND t.name != 'gmc-recipe'";
}

function gmc_create_author_link($author, $author_url) {
  if (strpos($author_url, 'http://') !== 0)
	$author_url = 'http://' . $author_url;
	
  return '<a href="' . $author_url . '">' . $author . '</a>';
}

function in_array_field($needle, $needle_field, $haystack, $strict = false) { 
    if ($strict) { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field === $needle) 
                return true; 
    } 
    else { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field == $needle) 
                return true; 
    } 
    return false; 
} 
?>