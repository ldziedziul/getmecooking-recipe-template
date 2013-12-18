<?php
$gmc_skip_content=false;

function gmc_plugin_url() {
  return WP_PLUGIN_URL.'/'.basename(dirname(__FILE__));
} 

function gmc_plugin_filepath() {
  return plugin_dir_path(__FILE__);
}

function gmc_sample_recipe() {
  $main_recipe = array(
     'post_title' => 'Chocolate chip muffins - example recipe',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_type' => 'gmc_recipe'
  );

  $recipe_id = wp_insert_post($main_recipe);

  $ingredient = array(
     'post_title' => 'self-raising flour',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 1,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 175);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'g');

  $ingredient = array(
     'post_title' => 'margarine',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 2,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 50);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'g');

  $ingredient = array(
     'post_title' => 'caster sugar',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 3,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 50);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'g');

  $ingredient = array(
     'post_title' => 'eggs',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 4,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 2);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'medium');

  $ingredient = array(
     'post_title' => 'milk',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 5,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 4);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'tablespoon');

  $ingredient = array(
     'post_title' => 'vanilla extract',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 6,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 1);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'teaspoon');

  $ingredient = array(
     'post_title' => 'chocolate',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 7,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientquantity', 200);
  add_post_meta($ingredient_id, 'gmc-ingredientmeasurement', 'g');

  $ingredient = array(
     'post_content' => 'a sprinkling for a crunchy top',
     'post_title' => 'sugar',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 8,
     'post_type' => 'gmc_recipeingredient'
  );

  $ingredient_id = wp_insert_post($ingredient);
  add_post_meta($ingredient_id, 'gmc-ingredientoptional', 'Y');

  $step = array(
     'post_content' => 'Place the flour and caster sugar into a bowl and create a well in the middle for the other ingredients. 

Mix the eggs, vanilla extract, milk and margarine and then pour it into the bowl with the dry ingredients. 

Mix well until it is lump free and then break the chocolate into small pieces and add them.',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 1,
     'post_type' => 'gmc_recipestep'
  );

  wp_insert_post($step);

  $step = array(
     'post_content' => 'Pour the muffin mixture into a muffin tin filling each mould up to two thirds full. 

Place a block of chocolate into the middle of each muffin. Then sprinkle some sugar over the top of each.',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 2,
     'post_type' => 'gmc_recipestep'
  );

  wp_insert_post($step);

  $step = array(
     'post_content' => 'Cook for around 20 minutes in a preheated oven at 200ºC / 390ºF / gas mark 5. After 18 minutes or so check to see if they are cooked enough. 

Insert a knife into one of the muffins and if no mixture is on the knife then they are cooked! 

Allow to cool for at least 5 minutes before eating.',
     'post_status' => 'publish',
     'post_author' => 1,
     'post_parent' => $recipe_id,
     'menu_order' => 3,
     'post_type' => 'gmc_recipestep'
  );

  wp_insert_post($step);

  add_post_meta($recipe_id, 'gmc-nr-servings', '4-6');
  add_post_meta($recipe_id, 'gmc-prep-time-mins', '10');
  add_post_meta($recipe_id, 'gmc-cooking-time-mins', '20');
  add_post_meta($recipe_id, 'gmc-description', 'Slightly crunchy on the outside at the top and soft in the middle.');
  wp_set_post_terms($recipe_id, array(__('Dessert', 'gmc'), __('Snack', 'gmc')), 'gmc_course');
  wp_set_post_terms($recipe_id, array(__('Egg', 'gmc'), __('Milk', 'gmc'), __('Soy', 'gmc'), __('Tree Nuts', 'gmc'), __('Wheat', 'gmc')), 'gmc_allergy');
  wp_set_post_terms($recipe_id, array(__('Child Friendly', 'gmc'), __('Serve Cold', 'gmc')), 'gmc_misc');
  wp_set_post_terms($recipe_id, __('European', 'gmc'), 'gmc_region');

  setNewTaxonomyCountToZero($recipe_id, 'Dessert', 'course');
  setNewTaxonomyCountToZero($recipe_id, 'Snack', 'course');
  setNewTaxonomyCountToZero($recipe_id, 'Egg', 'allergy');
  setNewTaxonomyCountToZero($recipe_id, 'Milk', 'allergy');
  setNewTaxonomyCountToZero($recipe_id, 'Soy', 'allergy');
  setNewTaxonomyCountToZero($recipe_id, 'Tree Nuts', 'allergy');
  setNewTaxonomyCountToZero($recipe_id, 'Wheat', 'allergy');
  setNewTaxonomyCountToZero($recipe_id, 'Child Friendly', 'misc');
  setNewTaxonomyCountToZero($recipe_id, 'Serve Cold', 'misc');
  setNewTaxonomyCountToZero($recipe_id, 'European', 'region');
}

function populate_taxonomies() {
  if(get_option("gmc_populated_taxonomies"))
  {
    return;
  }

  wp_insert_term(__('Egg', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Fish', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Milk', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Peanuts', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Shellfish', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Soy', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Tree Nuts', 'gmc'), 'gmc_allergy');
  wp_insert_term(__('Wheat', 'gmc'), 'gmc_allergy');
  
  wp_insert_term(__('Appetizer', 'gmc'), 'gmc_course');
  wp_insert_term(__('Beverage', 'gmc'), 'gmc_course');
  wp_insert_term(__('Bread', 'gmc'), 'gmc_course');
  wp_insert_term(__('Breakfast', 'gmc'), 'gmc_course');
  wp_insert_term(__('Condiment', 'gmc'), 'gmc_course');
  wp_insert_term(__('Dessert', 'gmc'), 'gmc_course');
  wp_insert_term(__('Lunch', 'gmc'), 'gmc_course');
  wp_insert_term(__('Main Dish', 'gmc'), 'gmc_course');
  wp_insert_term(__('Salad', 'gmc'), 'gmc_course');
  wp_insert_term(__('Side Dish', 'gmc'), 'gmc_course');
  wp_insert_term(__('Snack', 'gmc'), 'gmc_course');
  wp_insert_term(__('Soup', 'gmc'), 'gmc_course');
  wp_insert_term(__('Starter', 'gmc'), 'gmc_course');
  
  wp_insert_term(__('Diabetic', 'gmc'), 'gmc_dietary');
  wp_insert_term(__('Gluten Free', 'gmc'), 'gmc_dietary');
  wp_insert_term(__('Vegan', 'gmc'), 'gmc_dietary');
  wp_insert_term(__('Vegetarian', 'gmc'), 'gmc_dietary');
  
  wp_insert_term(__('Child Friendly', 'gmc'), 'gmc_misc');
  wp_insert_term(__('Freezable', 'gmc'), 'gmc_misc');
  wp_insert_term(__('Gourmet', 'gmc'), 'gmc_misc');
  wp_insert_term(__('Pre-preparable', 'gmc'), 'gmc_misc');
  wp_insert_term(__('Serve Cold', 'gmc'), 'gmc_misc');
  wp_insert_term(__('Serve Hot', 'gmc'), 'gmc_misc');
  
  wp_insert_term(__('Barbecue', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Birthday Party', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Casual Party', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Christmas', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Easter', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Formal Party', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Halloween', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Valentines day', 'gmc'), 'gmc_occasion');
  wp_insert_term(__('Thanksgiving', 'gmc'), 'gmc_occasion');

  gmc_sample_recipe();

  add_option("gmc_populated_taxonomies", 'true', '', 'no');
}

function gmc_menu() {
  add_menu_page(__('GetMeCooking Settings', 'gmc'), __('GetMeCooking Settings', 'gmc'),'edit_others_posts', 'getmecooking_options', 'gmc_main', gmc_plugin_url().'/images/icon-admin-menu.png');
  add_submenu_page('getmecooking_options', __('GetMeCooking Settings', 'gmc'), __('General Settings', 'gmc'), 'activate_plugins', 'getmecooking_options', 'gmc_main');
  add_submenu_page('getmecooking_options', 'GetMeCooking allergies', __('Allergies', 'gmc'), 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_allergy&post_type=gmc_recipe');  
  add_submenu_page('getmecooking_options', 'GetMeCooking courses', __('Courses', 'gmc'), 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_course&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking dietaries', __('Dietaries', 'gmc'), 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_dietary&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking miscs', __('Miscs', 'gmc'), 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_misc&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking occasions', __('Occasions', 'gmc'), 'edit_others_posts', 'edit-tags.php?taxonomy=gmc_occasion&post_type=gmc_recipe');
  add_submenu_page('getmecooking_options', 'GetMeCooking tour', __('Take a tour', 'gmc'), 'edit_others_posts', 'edit.php?post_type=gmc_recipe#guider=second');
  //If the premium plugin isn't installed, show:
  //add_submenu_page('getmecooking_options', 'GetMeCooking tour', __('Go Premium', 'gmc'), 'edit_others_posts', 'edit.php?post_type=gmc_recipe');
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
			'name' => __('Recipes', 'gmc'),
			'singular_name' => __('Recipe', 'gmc'),
			'add_new_item' => __( 'Add New Recipe', 'gmc'),
			'edit' => __( 'Edit', 'gmc'),
			'edit_item' => __( 'Edit Recipe', 'gmc'),
			'new_item' => __( 'New Recipe', 'gmc'),
			'view' => __( 'View Recipe', 'gmc'),
			'view_item' => __( 'View Recipe', 'gmc'),
			'search_items' => __( 'Search Recipes', 'gmc'),
			'not_found' => __( 'No Recipes found', 'gmc'),
			'not_found_in_trash' => __( 'No Recipes found in Trash', 'gmc')
		  ),
      'menu_icon' => gmc_plugin_url().'/images/icon-admin-menu.png',
      'public' => true,
		  'publicly_queryable' => true,
      'show_in_nav_menus' => false,
		  'show_ui' => true,
		  'exclude_from_search' => true,
		  'hierarchical' => false,
		  'rewrite' => array('slug' => 'recipe'),
		  'query_var' => true,
		  'supports' => array('title',
							  'editor',
							  'thumbnail'
							  ),
       'taxonomies' => array('post_tag')
       ) );

  register_post_type('gmc_recipestep', 
	array(
      'labels' => array(
      'name' => __('Recipe steps', 'gmc')
      ),
		  'publicly_queryable' => false,
		  'show_ui' => false,
		  'show_in_menu' => false,
		  'show_in_nav_menus' => false,
		  'exclude_from_search' => true,
		  'hierarchical' => false,
		  'rewrite' => false,
		  'query_var' => true,
		  'supports' => array('title',
							  'editor',
							  'thumbnail'
							  )
			));

  register_post_type('gmc_recipeingredient', 
	 array(
      'labels' => array(
      'name' => __('Recipe ingredients', 'gmc')
      ),
		  'publicly_queryable' => false,
		  'show_ui' => false,
		  'show_in_menu' => false,
		  'show_in_nav_menus' => false,
		  'exclude_from_search' => true,
		  'hierarchical' => false,
		  'rewrite' => false,
		  'query_var' => true,
		  'supports' => array('title',
							  'editor',
							  'thumbnail'
							  )
			));
  
  register_taxonomy('gmc_allergy', 'gmc_recipe', 
  array(
      'labels' => array( 
        'name' => __( 'Allergies', 'gmc' ), 
        'singular_name' => __( 'Allergy', 'gmc' ),
        'popular_items' => NULL,
        'search_items' => __( 'Search Allergies', 'gmc' ), 
        'all_items' => __( 'All Allergies', 'gmc' ),
        'edit_item' => __( 'Edit Allergy', 'gmc' ), 
        'update_item' => __( 'Update Allergy', 'gmc' ), 
        'add_new_item' => __( 'Add New Allergy', 'gmc' ), 
        'new_item_name' => __( 'New Allergy Name', 'gmc' ), 
        'menu_name' => __( 'Allergies', 'gmc' ), 
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
        'name' => __( 'Courses', 'gmc' ), 
        'singular_name' => __( 'Course', 'gmc' ),
        'popular_items' => NULL,
        'search_items' => __( 'Search Courses', 'gmc' ), 
        'all_items' => __( 'All Courses', 'gmc' ),
        'edit_item' => __( 'Edit Course', 'gmc' ), 
        'update_item' => __( 'Update Course', 'gmc' ), 
        'add_new_item' => __( 'Add New Course', 'gmc' ), 
        'new_item_name' => __( 'New Course Name', 'gmc' ), 
        'menu_name' => __( 'Courses', 'gmc' ),
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
        'name' => __( 'Dietaries', 'gmc' ), 
        'singular_name' => __( 'Dietary', 'gmc'),
        'popular_items' => NULL,
        'search_items' => __( 'Search Dietaries', 'gmc' ), 
        'all_items' => __( 'All Dietaries', 'gmc' ),
        'edit_item' => __( 'Edit Dietary', 'gmc' ), 
        'update_item' => __( 'Update Dietary', 'gmc' ), 
        'add_new_item' => __( 'Add New Dietary', 'gmc' ), 
        'new_item_name' => __( 'New Dietary Name', 'gmc' ), 
        'menu_name' => __( 'Dietaries', 'gmc' ), 
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
        'name' => __( 'Miscs', 'gmc'), 
        'singular_name' => __( 'Misc', 'gmc'),
        'popular_items' => NULL,
        'search_items' => __( 'Search Miscs', 'gmc'), 
        'all_items' => __( 'All Miscs', 'gmc'),
        'edit_item' => __( 'Edit Misc', 'gmc'), 
        'update_item' => __( 'Update Misc', 'gmc'), 
        'add_new_item' => __( 'Add New Misc', 'gmc'), 
        'new_item_name' => __( 'New Misc Name', 'gmc'), 
        'menu_name' => __( 'Miscs', 'gmc'),
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
        'name' => __( 'Occasions', 'gmc'), 
        'singular_name' => __( 'Occasion', 'gmc'),
        'popular_items' => NULL,
        'search_items' => __( 'Search Occasions', 'gmc'), 
        'all_items' => __( 'All Occasions', 'gmc'), 
        'edit_item' => __( 'Edit Occasion', 'gmc'), 
        'update_item' => __( 'Update Occasion', 'gmc'), 
        'add_new_item' => __( 'Add New Occasion', 'gmc'), 
        'new_item_name' => __( 'New Occasion Name', 'gmc'), 
        'menu_name' => __( 'Occasions', 'gmc'), 
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
        'name' => __( 'Regions', 'gmc'), 
        'singular_name' => __( 'Region', 'gmc'),
        'popular_items' => NULL,
        'search_items' => __( 'Search Regions', 'gmc'), 
        'all_items' => __( 'All Regions', 'gmc'),
        'edit_item' => __( 'Edit Region', 'gmc'), 
        'update_item' => __( 'Update Region', 'gmc'), 
        'add_new_item' => __( 'Add New Region', 'gmc'), 
        'new_item_name' => __( 'New Region Name', 'gmc'),
        'menu_name' => __( 'Regions', 'gmc'),
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
  
  register_taxonomy('allergy', 'gmc_recipe', 
  array(
    'rewrite' => array( 
      'slug' => 'allergies',
      'with_front' => false
    ), 
    'show_in_nav_menus' => false,
    'show_ui' => false,
    'show_tagcloud' => false,
    'update_count_callback' => '_update_post_term_count'
  )
  );
    
  register_taxonomy('course', 'gmc_recipe', 
    array(
      'rewrite' => array( 
        'slug' => 'courses',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false,
      'update_count_callback' => '_update_post_term_count'
    )
  );

  register_taxonomy('dietary', 'gmc_recipe', 
    array(
      'rewrite' => array( 
        'slug' => 'dietaries',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false,
      'update_count_callback' => '_update_post_term_count'
    )
  );

  register_taxonomy('misc', 'gmc_recipe', 
    array(
      'rewrite' => array( 
        'slug' => 'miscs',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false,
      'update_count_callback' => '_update_post_term_count'
    )
  );

  register_taxonomy('occasion', 'gmc_recipe', 
    array(
      'rewrite' => array( 
        'slug' => 'occasions',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false,
      'update_count_callback' => '_update_post_term_count'
    )
  );

  register_taxonomy('region', 'gmc_recipe', 
    array(
      'rewrite' => array( 
        'slug' => 'regions',
        'with_front' => false
      ), 
      'show_in_nav_menus' => false,
      'show_ui' => false,
      'show_tagcloud' => false,
      'update_count_callback' => '_update_post_term_count'
    )
  );
  
  if (!gmc_is_recipe_admin_page()) {
    gmc_add_recipe_button();
  }

  if(!get_option("gmc_premium_files") && file_exists(GMC_PREMIUM_FILES))
  {
    $theme_path = get_theme_root().DIRECTORY_SEPARATOR.get_template();
    $theme_path = str_replace('/', DIRECTORY_SEPARATOR, $theme_path);

    gmc_copy_to_premium('taxonomy-allergy.php', $theme_path);
    gmc_copy_to_premium('taxonomy-course.php', $theme_path);
    gmc_copy_to_premium('taxonomy-dietary.php', $theme_path);
    gmc_copy_to_premium('taxonomy-misc.php', $theme_path);
    gmc_copy_to_premium('taxonomy-occasion.php', $theme_path);
    gmc_copy_to_premium('taxonomy-region.php', $theme_path);

    add_option("gmc_premium_files", 'true', '', 'no');
    add_option('gmc_local_taxonomy', 'Y');
  }
  
  $file_name = plugin_dir_path(__FILE__) . 'css' . DIRECTORY_SEPARATOR . 'recipe-template-custom.css';

  if (get_option("gmc-overridecss") == "Y" && !file_exists($file_name))
  {
    $file_handle = fopen($file_name, 'w');
    fwrite($file_handle, get_option("gmc-shortcodecss"));
    fclose($file_handle);
  }
  
  populate_taxonomies();

  gmc_update_old_version();
}

function gmc_copy_to_premium($file, $theme_path)
{
  copy(dirname( dirname(__FILE__) ) . DIRECTORY_SEPARATOR . 'getmecooking-recipe-template-premium' . DIRECTORY_SEPARATOR . $file, $theme_path . DIRECTORY_SEPARATOR . $file);
}

function gmc_activate()
{
  gmc_init();
  flush_rewrite_rules();
  add_option('gmc_do_activation_redirect', true);
}

function gmc_deactivate()
{
  flush_rewrite_rules();
}

function gmc_activate_redirect() {
    if (get_option('gmc_do_activation_redirect', false)) {
        delete_option('gmc_do_activation_redirect');

        $redirect = 'admin.php?page=getmecooking_options#guider=first';

        wp_redirect($redirect);
    }
}

function gmc_update_old_version() {
  if(!get_option("gmc_version"))
  {
    add_option("gmc_version", GMC_VERSION, '', 'no');
    add_option("gmc_initial_version", GMC_VERSION, '', 'no');
  }
  else
  {
    if (get_option("gmc_version") <= 1.11)
    {    
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
      $wpdb->query("UPDATE $wpdb->posts SET post_type = 'gmc_recipe'  WHERE post_type = 'recipe'");
      $wpdb->query("UPDATE $wpdb->posts SET post_type = 'gmc_recipestep'  WHERE post_type = 'recipestep'");
      $wpdb->query("UPDATE $wpdb->posts SET post_type = 'gmc_recipeingredient'  WHERE post_type = 'recipeingredient'");
    }

    if (get_option("gmc_version") <= 1.18)
    {
      add_option("gmc-widecss", 'Y');

      //correct term_taxonomy data
      global $wpdb;
      $sql = $wpdb->prepare("SELECT tax.term_id, taxonomy, name, slug
        FROM {$wpdb->term_taxonomy} tax
        INNER JOIN {$wpdb->terms} term
        ON tax.term_id = term.term_id
        WHERE 
        taxonomy IN('allergy', 'course', 'dietary' 'misc', 'occasion')
      ");

      foreach ($wpdb->get_results($sql) as $key => $row)
      {
        if (!term_exists((int)$row->term_id, "gmc_" . $row->taxonomy))
        {
          wp_insert_term($row->name, "gmc_" . $row->taxonomy,
              array(
                'slug' => $row->slug
              )
            );
        }
      }
    }
    if (get_option("gmc_version") <= 1.19)
    {
      //Go through all posts and update [recipe x] to [gmc_recipe x]
      global $wpdb;
      $wpdb->query("UPDATE {$wpdb->posts} SET post_content = replace(post_content, '[recipe', '[gmc_recipe') WHERE post_type = 'page' OR post_type = 'post'");

      if(get_option('gmc_order') && strpos('region', get_option('gmc_order')) === false)
      {
        update_option("gmc_order", get_option('gmc_order') . ',region');
      }
    }
    if (get_option("gmc_version") <= 1.21)
    {
      global $wpdb;
      $wpdb->query("UPDATE {$wpdb->postmeta} SET meta_value = 'l' WHERE meta_value = 'litre' AND meta_key = 'gmc-ingredientmeasurement'");
      
      wp_insert_term(__('Easter', 'gmc'), 'gmc_occasion');
      wp_insert_term(__('Valentines day', 'gmc'), 'gmc_occasion');

      if (get_option('gmc-label-step'))
      {
        switch (get_option('gmc-label-step'))
        {
          case '2':
            update_option('gmc-label-step', 0);
          break;
          case '3':
            update_option('gmc-label-step', 1);
          break;
          case '4':
            update_option('gmc-label-step', 2);
          break;
          case '5':
            update_option('gmc-label-step', 3);
          break;
          case '6':
            update_option('gmc-label-step', 4);
          break;
          default:
        }      
      }
    }
    if (get_option("gmc_version") <= 1.23 && get_option("gmc_premium_files"))
    {
      switch (get_locale())
      {
        case 'da_DK':
        case 'de_DE':
        case 'it_IT':
        case 'nl_NL':
        case 'pt_PT':
        case 'ru_RU':
          gmc_update_language_term('African', 'gmc_region');
          gmc_update_language_term('American', 'gmc_region');
          gmc_update_language_term('Asian', 'gmc_region');
          gmc_update_language_term('European', 'gmc_region');
          gmc_update_language_term('Oceanian', 'gmc_region');
          gmc_update_language_term('South American', 'gmc_region');
          gmc_update_language_term('British', 'gmc_region');
          gmc_update_language_term('Canadian', 'gmc_region');
          gmc_update_language_term('Chinese', 'gmc_region');
          gmc_update_language_term('Croatian', 'gmc_region');
          gmc_update_language_term('French', 'gmc_region');
          gmc_update_language_term('German', 'gmc_region');
          gmc_update_language_term('Greek', 'gmc_region');
          gmc_update_language_term('Indian', 'gmc_region');
          gmc_update_language_term('Indonesian', 'gmc_region');
          gmc_update_language_term('Irish', 'gmc_region');
          gmc_update_language_term('Italian', 'gmc_region');
          gmc_update_language_term('Jamaican', 'gmc_region');
          gmc_update_language_term('Japanese', 'gmc_region');
          gmc_update_language_term('Lebanese', 'gmc_region');
          gmc_update_language_term('Malaysian', 'gmc_region');
          gmc_update_language_term('Spanish', 'gmc_region');
          gmc_update_language_term('Swedish', 'gmc_region');
          gmc_update_language_term('Thai', 'gmc_region');
          gmc_update_language_term('Turkish', 'gmc_region');
          gmc_update_language_term('Vietnamese', 'gmc_region');
          break;
        default:
          break;
      }
    }
    if (get_option("gmc_version") <= 1.26 && get_option("gmc_premium_files"))
    {
      if (!get_option('gmc_local_taxonomy'))
      {
        add_option('gmc_local_taxonomy', 'Y');
      }
    }
    
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
  	} 
    elseif ( isset($_POST['post_ID']) ) {
  		$post_id = (int) $_POST['post_ID'];
  	} 
    else {
  		$post_id = 0;
    }
	  
	  if ($post_id) {
		  $p=get_post($post_id);
  		
      if ($p->post_type=="gmc_recipe") {
  		  return true;
  	  }
    }
  }
  else if ($pagenow == 'post-new.php') {
  	if ($_GET['post_type']=="gmc_recipe") {
  	  return true;
  	}
  } 
  elseif ($pagenow=="admin.php" && ($_GET['page']=="getmecooking_options" || $_GET['page']=="gmc_premium_options")) {
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

function gmc_step_thumbnail_box($post) {
  $thumbnail_id = get_post_thumbnail_id($post->ID);
  echo '<input type="hidden" id="gmcStepThumbnail-'.$post->ID.'" name="gmcStepThumbnail-'.$post->ID.'" value="' . $thumbnail_id . '" />';

  $has_step_thumbnail = '';

  if (empty($thumbnail_id))
  {
    $has_step_thumbnail = ' style="display:none"';
  }


  echo '<input id="gmcUploadStepButton-'.$post->ID.'" type="button" value="' . __('Add photograph', 'gmc') . '" /> <a id="gmcRemoveStepThumbnail-'.$post->ID.'" class="removeStepThumbnail" href="#"'.$has_step_thumbnail.'>' . __('Remove photograph', 'gmc') . '</a>';
  echo '<div id="gmcStepThumbnailPreview-'.$post->ID.'">';
  echo get_the_post_thumbnail($post->ID, "medium");
  echo '</div>';
}

function gmc_main_photo_thumbnail_box() {
  global $post;

  echo '<p>' . __('Choose a large photo - it will be resized for you into a clickable thumbnail.', 'gmc') . ' ';
  echo '<img class="gmc-tooltip" src="' . gmc_plugin_url().'/images/help.png" alt="'. __('Help', 'gmc') .'" title="'. __('The size of the main recipe image is determined by <strong>Dashboard | Settings | Media</strong> (thumbnail image = Medium size, full size image = Large size)', 'gmc') .'" /></label></p>';
  echo '<input type="hidden" id="gmcMainImage" name="gmcMainImage" value="' . get_post_thumbnail_id() . '" />';
  echo '<input id="gmcUploadImageButton" type="button" value="' . __('Add photograph', 'gmc') . '" /> <a id="gmcRemoveMainImage" href="#">' . __('Remove photograph', 'gmc') . '</a>';
  echo '<div id="gmcMainThumbnailPreview">';
  the_post_thumbnail("medium");
  echo '</div>';
}

function gmc_add_meta_boxes() {
  add_meta_box('gmc-post-thumbnail', __( 'Photograph of the Finished Recipe', 'gmc' ), 'gmc_main_photo_thumbnail_box', 'gmc_recipe', 'normal');
  add_meta_box('gmc-recipe-main', __( 'Recipe Information', 'gmc' ), 'gmc_mainrecipe_box', 'gmc_recipe', 'normal');
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
	 $res = stream_get_contents($fp);
  }

  if ($res === false) {
	throw new Exception("$verb $url failed: $php_errormsg");
  }

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

  // Send to remote and return data to caller.
  $result = curl_exec($ch);

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

  if (get_post_meta($recipe->ID, "gmc-source-name", true))
  {
	$xml->addChild('Author', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-source-name", true)));
  }
  
  if (get_post_meta($recipe->ID, "gmc-source-url", true))
  {
	$xml->addChild('AuthorUrl', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-source-url", true)));
  }

  if (get_post_meta($recipe->ID, "gmc-cooking-time-hours", true))
  {
	$xml->addChild('CookHour', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-cooking-time-hours", true)));
  }
  
  if (get_post_meta($recipe->ID, "gmc-cooking-time-mins", true))
  {
	$xml->addChild('CookMinute', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-cooking-time-mins", true)));
  }
  
  $xml->addChild('Description', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-description", true)));

  $xml->addChild('Id', $gmcid);

  $xmealinfo=$xml->addChild('MealInformation');
  $pars=wp_get_object_terms($recipe->ID, 'gmc_course');
  if ($pars) {
	foreach($pars as $par) {
	  $xmealinfo->addChild('Meal',gmc_xml_safe_data($par->name));
	}
  }

  $xmiscs=$xml->addChild('Miscs');
  $pars=wp_get_object_terms($recipe->ID, 'gmc_misc');
  if ($pars) {
	foreach($pars as $par) {
	  $xmiscs->addChild('Misc',gmc_xml_safe_data($par->name));
	}
  }
  
  $xml->addChild('Note', gmc_xml_safe_data($recipe->post_content));
  
  $xoccasions=$xml->addChild('Occasions');
  $pars=wp_get_object_terms($recipe->ID, 'gmc_occasion');
  if ($pars) {
	foreach($pars as $par) {
	  $xoccasions->addChild('Occasion',gmc_xml_safe_data($par->name));
	}
  }
  
  $gmc_opt_out = get_option("gmc-hide-recipes");
  $xml->addChild('OptOut',$gmc_opt_out);
  
  $xoptingredients=$xml->addChild('OptionalIngredients');
  
  $xml->addChild('Photo', gmc_xml_safe_data(gmc_get_post_thumb_src($recipe->ID)));
  $xml->addChild('PostUrl', gmc_xml_safe_data(get_permalink($recipe->ID)));
  
  if (get_post_meta($recipe->ID, "gmc-prep-time-hours", true))
  {  
	$xml->addChild('PrepHour', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-prep-time-hours", true)));
  }
  
  if (get_post_meta($recipe->ID, "gmc-prep-time-mins", true))
  {  
	$xml->addChild('PrepMinute', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-prep-time-mins", true)));
  }
  
  $regions = wp_get_object_terms($recipe->ID, 'gmc_region');
  $region = "";
  
  if(!empty($regions)){
    if(!is_wp_error($regions)){
      $region = $regions[0]->name;
    }
	}
  
  $xml->addChild('Region', gmc_xml_safe_data($region));
  $xreqingredients=$xml->addChild('RequiredIngredients');
  $xml->addChild('Servings', gmc_xml_safe_data(get_post_meta($recipe->ID, "gmc-nr-servings", true)));
  $xsteps=$xml->addChild('Steps');
  $xml->addChild('Title', gmc_xml_safe_data($recipe->post_title));

  $gmcusername=get_option("gmc-username");
  $xml->addChild('UserName',gmc_xml_safe_data($gmcusername));
  
  // ingredients
  foreach($ingredients as $ingredient) {
	$opt=get_post_meta($ingredient->ID, "gmc-ingredientoptional", true);
	
	if ($opt=="Y") {
	  $xi=$xoptingredients->addChild('Ingredient');
	} else {
	  $xi=$xreqingredients->addChild('Ingredient');
	}

	$xi->addChild('AdditionalNote',gmc_xml_safe_data($ingredient->post_content));
	$xi->addChild('GroupName',gmc_xml_safe_data(get_post_meta($ingredient->ID,'gmc-ingredientgroup',true)));
	$xi->addChild('Measurement',gmc_xml_safe_data(get_post_meta($ingredient->ID,'gmc-ingredientmeasurement',true)));
	$xi->addChild('Name',gmc_xml_safe_data($ingredient->post_title));
	
	if (get_post_meta($ingredient->ID,'gmc-ingredientquantity',true))
	{
		$xi->addChild('Quantity',gmc_xml_safe_data(get_post_meta($ingredient->ID,'gmc-ingredientquantity',true)));
	}
  }

  // steps  
  foreach($steps as $step) {
    $xs=$xsteps->addChild('Step');
    
    $image_id = get_post_meta($step->ID, '_thumbnail_id', true);

    if ($image_id > 0)
    {
      $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

      if (count($alt))
      {
        $xs->addChild('AltText',gmc_xml_safe_data($alt));
      }

      $xs->addChild('Title',gmc_xml_safe_data(get_post($image_id)->post_title));
    }

    $xs->addChild('Description',gmc_xml_safe_data($step->post_content));
    $xs->addChild('Photo',gmc_xml_safe_data(gmc_get_post_thumb_src($step->ID)));
    $xs->addChild('GroupName',gmc_xml_safe_data(get_post_meta($step->ID,'gmc_stepgroup',true)));
  }

  $result=$xml->asXML();

  //error_log($result);

  return $result;
}

function gmc_xml_safe_data($content) {
  return htmlspecialchars($content, ENT_NOQUOTES, 'UTF-8');
}

function gmc_mainrecipe_box($post, $metabox) {
  global $post;
?>

<div id="recipe-data" class="gmc-tabs">
  <div class="gmc-tabs-nav">
	<ul>	  
	  <li><a href="#ingredients"><?php _e('Recipe Ingredients', 'gmc'); ?></a></li>
	  <li><a href="#steps"><?php _e('Recipe Steps', 'gmc'); ?></a></li>
      <li><a href="#params"><?php _e('Recipe Details', 'gmc'); ?></a></li>
	  <li><a href="#gmc-desc"><?php _e('Recipe Summary', 'gmc'); ?></a></li>
	  <li><a href="#gmc-note"><?php _e('Recipe Note', 'gmc'); ?></a></li>
      <li><a href="#gmc-nutrition"><?php _e('Nutrition', 'gmc'); ?></a></li>
	  <li><a href="#transfer"><?php _e('GetMeCooking User Details', 'gmc'); ?></a></li>
      <li><a href="#help"><?php _e('Help / FAQ', 'gmc'); ?></a></li>
	</ul>
  </div>
  <div class="gmc-tabs-panel">
  	<div id="params">	
  	  <?php require_once("recipe-template-edit-params.php"); ?>
  	</div>      
  	<div id="ingredients">
      <div id="gmc-ingredientslistbox">
        <p class="howto"><?php __('Drag and drop the ingredients to change their order', 'gmc');?></p>
  	  <?php
      $ingredients=get_posts('post_status=publish&post_type=gmc_recipeingredient&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID);
  	
    echo '<p>Tip: You can use the "TAB" key on your keyboard to quickly move between fields. Or "SHIFT + TAB" to move back.</p>';
  	$i=1;
    echo '<table id="ingredientsTable">
    <thead>
      <tr>      
        <th></th>
        <th>' 
          . __('Quantity', 'gmc') . '
            <img class="gmc-tooltip" src="'.gmc_plugin_url().'/images/help.png" alt="'. __('Help', 'gmc').'" title="'.__("e.g. 1 or 1.5 or 1/2 or 1-1/2", 'gmc').'" />
        </th>
        <th>' 
          . __('Measurement', 'gmc') . '
            <img class="gmc-tooltip" src="'.gmc_plugin_url().'/images/help.png" alt="'. __('Help', 'gmc').'" title="'.__("Select the drop-down and start typing. The measurement will appear if it's available.<br /><br />Or select 'measurement not listed?' to add your own.", 'gmc').'" />
        </th>
        <th>' . __('Ingredient', 'gmc') . '</th>
        <th>' . __('Note', 'gmc') . '</th>
        <th>' 
          . __('Group', 'gmc') . '
            <img class="gmc-tooltip" src="'.gmc_plugin_url().'/images/help.png" alt="'. __('Help', 'gmc').'" title="'.__("Ingredients can be placed into groups such as '<strong>Cake base</strong>', '<strong>Cake filling</strong>' and '<strong>Cake topping</strong>'.", 'gmc').'<br/><br/>'.__('Grouping makes it easy for your visitors to see which ingredients are for which part of the recipe.', 'gmc').'" />          
        </th>
        <th colspan="2">'
          . __('Optional?', 'gmc') . '
            <img class="gmc-tooltip" src="'.gmc_plugin_url().'/images/help.png" alt="'. __('Help', 'gmc').'" title="'.__("Tick the box to flag the ingredient as optional.<br/><br/>Optional ingredients are displayed in a separate list.", 'gmc').'" />                  
        </th>
      </tr>
    </thead>
    <tbody class="sortable">';
    
    $gmc_add_new = false;

  foreach($ingredients as $ingredient){
	  require("recipe-template-edit-ingredient.php");
	  $i++;
  }
  	
  	$ingredient = null;
    $gmc_add_new = true;
  	require("recipe-template-edit-ingredient.php");

  echo '</tbody></table>';
  	  ?>
    </div>
	</div>
	<div id="steps">
	  <?php
		$steps=get_posts('post_status=publish&post_type=gmc_recipestep&nopaging=1&orderby=menu_order&order=ASC&post_parent='.$post->ID);

  		echo '<div id="gmc-stepslist">'."\n";		

      echo '<div id="recipeEditFloatMenu">';
        echo '<table id="conversionTable">';
          echo '<thead>';
            echo '<tr>';
              echo '<td class="conversionTemp">Temperature chart</td>';
              echo '<td class="conversionLength">Length</td>';
              echo '<td class="conversionQuart">Quarts</td>';
            echo '</tr>';
          echo '</thead>';
          echo '<tr>';
            echo '<td class="conversionTemp">110°C / 230°F</td>';
            echo '<td class="conversionLength">0.5cm (0.25")</td>';
            echo '<td class="conversionQuart"></td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">120°C / 250°F / Gas Mark ½</td>';
            echo '<td class="conversionLength">1.5cm (0.5")</td>';
            echo '<td class="conversionQuart">0.5 litres (0.5 quart)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">140°C / 275°F / Gas Mark 1</td>';
            echo '<td class="conversionLength">2.5cm (1")</td>';
            echo '<td class="conversionQuart">1.1 litres (1 quart)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">150°C / 300°F / Gas Mark 2</td>';
            echo '<td class="conversionLength">5cm (2")</td>';
            echo '<td class="conversionQuart">2.3 litres (2 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">160°C / 325°F / Gas Mark 3</td>';
            echo '<td class="conversionLength">8cm (3")</td>';
            echo '<td class="conversionQuart">3.4 litres (3 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">180ºC / 350ºF / Gas Mark 4</td>';
            echo '<td class="conversionLength">10cm (4")</td>';
            echo '<td class="conversionQuart">4.5 litres (4 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">190°C / 375°F / Gas Mark 5</td>';
            echo '<td class="conversionLength">13cm (5")</td>';
            echo '<td class="conversionQuart">5.7 litres (5 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">200°C / 400°F / Gas Mark 6</td>';
            echo '<td class="conversionLength">15cm (6")</td>';
            echo '<td class="conversionQuart">6.8 litres (6 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">220°C / 425°F / Gas Mark 7</td>';
            echo '<td class="conversionLength">18cm (7")</td>';
            echo '<td class="conversionQuart">8 litres (7 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">230°C / 450°F / Gas Mark 8</td>';
            echo '<td class="conversionLength">20cm (8")</td>';
            echo '<td class="conversionQuart">9 litres (8 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">240°C / 475°F / Gas Mark 9</td>';
            echo '<td class="conversionLength">23cm (9")</td>';
            echo '<td class="conversionQuart">10.2 litres (9 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp">260°C / 500°F / Gas Mark 10</td>';
            echo '<td class="conversionLength">25cm (10")</td>';
            echo '<td class="conversionQuart">11.4 litres (10 quarts)</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp"></td>';
            echo '<td class="conversionLength">28cm (11")</td>';
            echo '<td class="conversionQuart"></td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp"></td>';
            echo '<td class="conversionLength">31cm (12")</td>';
            echo '<td class="conversionQuart"></td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp"></td>';
            echo '<td class="conversionLength">33cm (13")</td>';
            echo '<td class="conversionQuart"></td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp"></td>';
            echo '<td class="conversionLength">36cm (14")</td>';
            echo '<td class="conversionQuart"></td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td class="conversionTemp"></td>';
            echo '<td class="conversionLength">38cm (15")</td>';
            echo '<td class="conversionQuart"></td>';
          echo '</tr>';
          echo '<tfoot>';
            echo '<tr>';
              echo '<td><a href="http://www.getmecooking.com/measurements">View more measurements</a></td>';
              echo '<td></td>';
              echo '<td>All values are approximate</td>';
            echo '</tr>';
          echo '</tfoot>';
        echo '</table>';
      echo '<a id="gmcToggleConversionChart" href="#">Show conversion chart</a>';
      echo '</div>';

  		$i=1;
  		foreach ($steps as $step) {
  	  echo '<div id="gmc-steps-step-'.$i.'" class="gmc-singlestep postbox" >'."\n";
  	  echo '<div class="handlediv" title="'.__('Click to toggle', 'gmc').'"><br /></div><h3 class="gmc-hndle">'.__('Step', 'gmc').' <span class="gmc-stepnumber">'.$i;
      echo '<a id="gmc-step-to-delete-'.$step->ID.'" class="gmc-delete-step" href="#"><img alt="'.__("Delete this step", "gmc").'" height="16" src="'. gmc_plugin_url() . '/images/delete.png" title="'. __('Delete this step', 'gmc').'" width="16" /></a>';
      echo '</span></h3>'."\n";    

  	  echo '<div class="inside">'."\n";

  	  echo "<input type='hidden' name='stepid[]' value='".$step->ID."' />"."\n";

	  echo "<label class='gmc-admin-label gmc-admin-step-label'><strong>".__('Step description', 'gmc')."</strong></label>"."\n";
	  echo '<div class="gmc-stepdesc-box">'."\n";
	  echo "<textarea class='gmc-admin-fullline autoResize' name='stepdescription[]'>".$step->post_content."</textarea>"."\n";
	  echo '</div>'."\n";
    
	  echo '<div class="gmc-stepthumb-box">'."\n";
	  gmc_step_thumbnail_box($step);
	  echo '</div>'."\n";
    
    echo '<label class="gmc-admin-label gmc-admin-step-label"><strong>'.__('Step group', 'gmc').'</strong> 
    <img class="gmc-tooltip" src="'. gmc_plugin_url().'/images/help.png" alt="'.__('Help', 'gmc').'" title="'.__("Steps can be placed into groups such as '<strong>Cake base</strong>', '<strong>Cake filling</strong>' and '<strong>Cake topping</strong>'.<br/><br/>Grouping makes it easy for your visitors to see which steps are for which part of the recipe.", 'gmc').'" /></label>'."\n";    
    echo '<div class="gmc-stepdesc-box">'."\n";
	  echo "<input type='text' class='gmc-admin-halfline' name='gmc-stepgroup[]' value='".get_post_meta($step->ID, 'gmc_stepgroup', true)."' />\n";
	  echo '</div>'."\n";	  
	  
	  $thumbid=get_post_thumbnail_id($step->ID);
	  $alttext = '';
	  if ($thumbid > 0)
	  {
		$thumbnail = get_post($thumbid);
		$alttext = $thumbnail->post_title;
	  }
    
	  echo '<input type="hidden" class="gmc-admin-alt-text-input" name="gmc-step-alt-text[]" value="'.$alttext.'"/>';    
	  echo '<div style="clear:both"></div>';	  
	  echo '</div></div>'."\n";
	  
	  $i++;
		}

  	echo '<div id="gmc-steps-step-'.$i.'" class="gmc-singlestep postbox " >'."\n";
  	echo '<div class="handlediv" title="'.__('Click to toggle', 'gmc').'"><br /></div><h3 class="gmc-hndle">'.__('Step', 'gmc').' <span class="gmc-stepnumber">'.$i.'</span><span class="deleteReminder"> - '.__('Leave this empty if there are no more steps to add.', 'gmc').'</span></h3>'."\n";
  	echo '<div class="inside">'."\n";

  	echo '<input type="hidden" name="stepid[]" value="" />'."\n";

  	echo "<label class='gmc-admin-label gmc-admin-step-label'><strong>".__('Step Description', 'gmc')."</strong></label>"."\n";
  	echo '<div class="gmc-stepdesc-box">'."\n";
  	echo '<textarea id="gmc-admin-new-step-'.$i.'" class="gmc-admin-fullline autoResize" name="stepdescription[]"></textarea>'."\n";
  	echo '</div>'."\n";
  	echo '<div class="gmc-stepthumb-box">'."\n";
  	_e('You can add a photograph once you save/update the recipe', 'gmc');	
  	echo '</div>'."\n";
  	
    echo '<label class="gmc-admin-label gmc-admin-step-label"><strong>'.__('Step group', 'gmc').'</strong>
    <img class="gmc-tooltip" src="'. gmc_plugin_url().'/images/help.png" alt="'.__('Help', 'gmc').'" title="'.__("Steps can be placed into groups such as '<strong>Cake base</strong>', '<strong>Cake filling</strong>' and '<strong>Cake topping</strong>'.<br/>Grouping makes it easy for your visitors to see which steps are for which part of the recipe.", 'gmc').'" /></label>'."\n";    
    echo '<div class="gmc-stepdesc-box">'."\n";
    echo "<input type='text' class='gmc-admin-halfline' name='gmc-stepgroup[]' value='' />\n";
    echo '</div>'."\n";
    
  	echo '<div style="clear:both"></div>';    
  	echo '</div></div>'."\n";       
  	
  	echo '</div>'."\n";
  	  ?>  
  	</div>

	<div id="gmc-desc">
	  <?php echo '<p>' . __('The description is a 1 - 2 line summary that is used by search engines and <a href="http://www.getmecooking.com">GetMeCooking</a>.', 'gmc') . '</p>';
    if (is_gmc_premium_active())
    { 
      echo '<p>' . __('If you choose the appropriate layout then this text may appear on a recipe listing page too.', 'gmc') . '</p>';
    }
    else
    {
      echo '<p>' . sprintf(__('If you have the <a href="%s">premium plugin</a> and choose the appropriate layout then this text may appear on a recipe listing page too.', 'gmc'), 'http://www.getmecooking.com/wordpress-recipe-plugin') . '</p>';
    } ?>
	  <textarea id="gmc-description" class="gmc-admin-fullline" rows="5" name="gmc-description"><?php echo get_post_meta($post->ID,"gmc-description",true); ?></textarea>
	</div>
	
	<div id="gmc-note">
	  <?php 
		$note_position = '';
    if (get_option('gmc-note-position') == '')
    {
      $note_position = __('Anything you type here will appear <a href="%s">before</a> the recipe steps.', 'gmc');
    }
    else
    {
      $note_position = __('Anything you type here will appear <a href="%s">after</a> the recipe steps.', 'gmc');
    }

		$note_link = home_url()."/wp-admin/admin.php?page=getmecooking_options#layout-options";
	  ?>
    <p><?php printf($note_position, $note_link); ?></p>
    <p id="gmc-note-desc"><?php _e("Recommend some changes to put a twist on the recipe or things to look out for that could ruin the recipe e.g. don't let the mixture boil", 'gmc');?></p>
	</div>
	
  <div id="gmc-nutrition">
    <?php require("recipe-template-nutrition.php"); ?>
  </div>

	<div id="transfer">
	  <?php
		$gmcid=get_post_meta($post->ID,"gmc-id",true); 
		$gmcusername=get_option("gmc-username");
    $details_url = home_url()."/wp-admin/admin.php?page=getmecooking_options";

  		if (empty($gmcusername)) {
  		  printf( __('<p>You are currently using this plugin as a guest user. To get more functionality, please <a href="%s">enter your GetMeCooking details</a>.</p>', 'gmc'), $details_url);
  		} else {
        printf( __('<p>You have told us that your GetMeCooking username is <strong>%s</strong>.<br/>', 'gmc'), $gmcusername);
    		printf( __('<p>You can <a href="%s">change your details here</a></p>', 'gmc'), $details_url);
  		} 
  		
  		echo "<p>";
  		if (get_option('gmc-hide-recipes')) {
        $share_the_love = home_url().'/wp-admin/admin.php?page=getmecooking_options#gmc-share-the-love';
  		  printf( __('You have opted out of sending this recipe to GetMeCooking. (<a href="%s">I\'ve changed my mind, I want my recipes to appear on GetMeCooking</a>)', 'gmc'), $share_the_love);
      }
  		else
  		{
        _e('You have opted in to send this recipe to GetMeCooking.', 'gmc');
        echo ' ';
        if (empty($gmcusername)) {
          _e('Once approved by the staff it will appear on <a href="http://www.getmecooking.com/recipes">www.getmecooking.com</a>.', 'gmc');
        }
        else {
          $user_profile_url = 'http://www.getmecooking.com/user/' . strtolower($gmcusername);
          printf( __('Once approved by the staff it will appear on <a href="%s">%s</a>', 'gmc'), $user_profile_url, $user_profile_url);
        }
      }
  		echo "</p>";
      _e('<strong>Note:</strong> Recipes go through an approval process before appearing on <a href="http://www.getmecooking.com">www.getmecooking.com</a>. It must have a good quality photograph and full recipe information. For more information please see <a href="http://www.getmecooking.com/recipe-template-info#faqMissingRecipesGMC">the FAQ</a>.', 'gmc');
      
  		echo "<p>";
  		if (is_numeric($gmcid)) {
        _e('This recipe has been sent to GetMeCooking.', 'gmc');
  		} else {
        _e("This recipe hasn't been sent to GetMeCooking yet.", 'gmc');
  		}
  		echo "</p>";
          
      echo '<input type="hidden" name="gmc_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
  	  ?>
  	</div>
    <div id="help">
      <?php _e('<p>Have you looked at the <a href="http://www.getmecooking.com/recipe-template-info#faq">Recipe Template FAQ page</a> recently?</p>', 'gmc');?>
      <iframe width="853" height="480" src="http://www.youtube.com/embed/xNW1ZyzfNFk?rel=0" frameborder="0" allowfullscreen></iframe>
      <p />
      <iframe width="853" height="480" src="http://www.youtube.com/embed/dP6cPzJISs4?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>  
</div>

<?php  
}

function gmc_save_settings() {
  if(empty($_POST["gmc-settings-save"]) || $_POST["gmc-settings-save"]!= "Y") {
	return;
  }
  
  // CSS
  updateOrDeleteOption("gmc-overridecss", $_POST["gmc-overridecss"]);
  
  if ($_POST["gmc-overridecss"] == "Y")
  {
    $file_name = plugin_dir_path(__FILE__) . 'css' . DIRECTORY_SEPARATOR . 'recipe-template-custom.css';
    $file_handle = fopen($file_name, 'w') or die(__("Unable to create custom CSS file. Please make sure the CSS directory has write permissions", 'gmc'));
    fwrite($file_handle, $_POST["gmc-shortcodecss"]);
    fclose($file_handle);
  }

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
  
  updateOrDeleteOption("gmc-widecss", $_POST["gmc-widecss"]);
  updateOrDeleteOption("gmc-img-popup", $_POST["gmc-img-popup"]);
  updateOrDeleteOption("gmc-hide-title", $_POST["gmc-hide-title"]);
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
  updateOrDeleteOption("gmc-label-step-text", $_POST["gmc-label-step-text"]);
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
	update_option($key, stripslashes($value));
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
  global $wpdb;
  
  //if on post-new, delete all steps and ingredients incase they pressed preview. Fixes duplicate steps/ingredients bug
  $deleteSteps = true;

  foreach($_POST['stepid'] as $key => $stepId) {
    if(!empty($stepId))
    {
      $deleteSteps = false;
      break;
    }
  }

  if ($deleteSteps) {
    $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE post_id = $post_ID");

    $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_parent = $post_ID && post_type = 'gmc_recipestep'");
  }

  $deleteIngredients = true;

  foreach($_POST['gmc-recipeingredientid'] as $key => $ingredientId) {
    if(!empty($stepId))
    {
      $deleteIngredients = false;
      break;
    }
  }

  if ($deleteIngredients) {
    $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE post_id = $post_ID");

    $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_parent = $post_ID && post_type = 'gmc_recipeingredient'");
  }

  if (empty($_POST['gmcMainImage']))
  {
    $wpdb->query("UPDATE {$wpdb->posts} SET post_parent = 0 where post_type = 'attachment' AND post_parent = $post_ID");
  }

  updateOrDeleteMeta($post_ID, "_thumbnail_id", $_POST['gmcMainImage']);

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
	$region = trim($_POST['gmc-custom-region']);
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

  //Need to create the corresponding non gmc term taxonomy for those that do not add recipes in posts  
  setNewTaxonomyCountToZero($post_ID, $region, 'region');

  foreach((array)$_POST['gmc-recopt-when'] as $key => $course) {
    setNewTaxonomyCountToZero($post_ID, $course, 'course');
  }

  foreach((array)$_POST['gmc-recopt-occasion'] as $key => $occasion) {
    setNewTaxonomyCountToZero($post_ID, $occasion, 'occasion');
  }

  foreach((array)$_POST['gmc-recopt-allergies'] as $key => $allergy) {
    setNewTaxonomyCountToZero($post_ID, $allergy, 'allergy');
  }

  foreach((array)$_POST['gmc-recopt-dietary'] as $key => $dietary) {
    setNewTaxonomyCountToZero($post_ID, $dietary, 'dietary');
  }

  foreach((array)$_POST['gmc-recopt-other'] as $key => $misc) {
    setNewTaxonomyCountToZero($post_ID, $misc, 'misc');
  }

  $current_user = wp_get_current_user();

  //steps
  if (isset($_POST['stepid'])) {
  	$i=1;

  	$step_to_delete = $_POST['gmc_step_to_delete'];
  	
  	foreach($_POST['stepid'] as $key => $stepid) {
  	  $my_post=array();
  	  $my_post['menu_order']=$i;  	  
  		$my_post['post_title']=$_POST['post_title'] . ' ' . __('step','gmc');
  	  
  	  if ($_POST['stepdescription'][$key]) {
  		$my_post['post_content']=$_POST['stepdescription'][$key];
  	  }
  	  
  	  if (empty($stepid)) {
        if(!empty($_POST['stepdescription'][$key]))
        {
          $my_post['post_type'] = 'gmc_recipestep';
          $my_post['post_parent'] = $post_ID;
          $my_post['post_status'] = 'publish';
          $my_post['post_author'] = $current_user->ID;
        
          $stepid = wp_insert_post($my_post);
          
          if(!empty($_POST['gmc-stepgroup'][$key]))
          {
            update_post_meta($stepid, 'gmc_stepgroup', $_POST['gmc-stepgroup'][$key]);
          }
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
    	  
        if(!empty($_POST['gmc-stepgroup'][$key]))
        {
          update_post_meta($stepid, 'gmc_stepgroup', $_POST['gmc-stepgroup'][$key]);
        }
        else
        {
          delete_post_meta($stepid, 'gmc_stepgroup');
        }
        
    		wp_update_post($my_post);

        updateOrDeleteMeta($stepid, "_thumbnail_id", $_POST['gmcStepThumbnail-'.$stepid]);

        if (empty($_POST['gmcStepThumbnail-'.$stepid]))
        {
          global $wpdb;
          $wpdb->query("UPDATE {$wpdb->posts} SET post_parent = 0 where post_type = 'attachment' AND post_parent = $stepid");
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

	  if (!empty($_POST['gmc-ingredientname'][$key]) && stripslashes($_POST['gmc-ingredientname'][$key]) != __("e.g. 'onion' or 'cheese'", 'gmc')) {
      $my_post['post_title']=trim($_POST['gmc-ingredientname'][$key]);
	  }

	  if (!empty($_POST['gmc-ingredientnote'][$key]) && stripslashes($_POST['gmc-ingredientnote'][$key]) != __("e.g. 'finely chopped' or 'freshly grated'", 'gmc')) {
      $my_post['post_content']=trim($_POST['gmc-ingredientnote'][$key]);
	  }
    else {
      $my_post['post_content'] = "";
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

    if (!$deleting && !empty($my_post['post_title'])) {
      if (stripslashes($_POST['gmc-ingredientquantity'][$key]) != 'e.g. 1')
      {
        updateOrDeleteMeta($iid, "gmc-ingredientquantity", trim($_POST['gmc-ingredientquantity'][$key]));
      }
      else
      {
        delete_post_meta($iid, "gmc-ingredientquantity");
      }

      //measurement can be from drop down list or custom textbox value
      $measurement = $_POST['gmc-ingredientmeasurement'][$key];
      
      if (!empty($_POST['gmc-use-custom-measurement'][$key]) && !empty($_POST['gmc-custom-measurement'][$key])) {
        update_post_meta($iid, "gmc-use-custom-measurement", 'Y');
        $measurement = trim($_POST['gmc-custom-measurement'][$key]);
      }
      else
      {
        delete_post_meta($iid, "gmc-use-custom-measurement");
      }
      
      updateOrDeleteMeta($iid, "gmc-ingredientmeasurement", $measurement);
      
      updateOrDeleteMeta($iid, "gmc-ingredientgroup", trim($_POST['gmc-ingredientgroup'][$key]));
      
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
  if (stripslashes($_POST['gmc-description']) != __('e.g. These muffins have a crunchy top with a crumbly inside where you taste the subtle hint of lemon.', 'gmc'))
  {
    updateOrDeleteMeta($post_ID, 'gmc-description', trim($_POST['gmc-description']));
  }
  else
  {
    delete_post_meta($post_ID, 'gmc-description');
  }
  
  if (is_gmc_premium_active())
  {
    gmc_save_premium_recipe_to_db($post_ID, $post);
  }

  $recipe_id = $post_ID;
  $recipe_count = gmc_get_post_and_page_count_for_recipe($recipe_id);

  gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_allergy', 'allergy');
  gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_course', 'course');
  gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_dietary', 'dietary');
  gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_misc', 'misc');
  gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_occasion', 'occasion');
  gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_region', 'region');
}

function setNewTaxonomyCountToZero($post_ID, $term_value, $taxonomy)
{
  if (term_exists($term_value, $taxonomy) == 0)
  {
    global $wpdb;
    
    wp_set_post_terms($post_ID, $term_value, $taxonomy);

    $term = get_term_by('name', $term_value, $taxonomy);

    $term_taxonomy_id = $term->term_taxonomy_id;

    $count = 0;

    do_action( 'edit_term_taxonomy', $term_taxonomy_id, $taxonomy);
    $wpdb->update( $wpdb->term_taxonomy, compact( 'count' ), array( 'term_taxonomy_id' => $term_taxonomy_id ) );
    do_action( 'edited_term_taxonomy', $term_taxonomy_id, $taxonomy);
  }
}

function gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, $recipe_category, $post_category)
{
  $terms = wp_get_object_terms($recipe_id, $recipe_category);

  $term_result = array();

  if($recipe_count > 0) {
    if ($terms)
    {
      foreach ($terms as $term)
      {
          array_push($term_result, $term->name);
      }
    }
    
    $post_ids = gmc_get_post_and_page_ids_for_recipe_id($recipe_id);
        
    foreach ($post_ids as $id)
    {
      $recipes = gmc_get_recipe_ids_for_post_and_page($id);

      if (count($recipes) > 1)
      {
        foreach ($recipes as $recipe_id)
        {
          $terms = wp_get_object_terms($recipe_id, $recipe_category);
          foreach ($terms as $term)
          {
            if (!in_array($term->name, $term_result))
            {
              array_push($term_result, $term->name);
            }
          }
        }
      }
     
      foreach ($term_result as $term_item) {
        if (!term_exists($term_item, $post_category)) //if "gmc_course" exists but "course" doesnt, create "course"
        {
          $old_term = get_term_by('name', $term_item, $recipe_category); //get the term details for "gmc_course"

          wp_insert_term($old_term->name, $post_category,
            array(
              'slug' => $old_term->slug
            )
          );
        }
      }

      wp_set_object_terms($id, $term_result, $post_category);

      gmc_update_term_taxonomy_count($term_result, $post_category);
    }
  }
}

function gmc_get_post_and_page_ids_for_recipe_id($meta_value)
{
  global $wpdb;
  return $wpdb->get_col( $wpdb->prepare( "
	SELECT post_id
	FROM {$wpdb->postmeta} 
	WHERE (meta_key = 'gmc_local_id' OR meta_key = 'gmc_local_page_id') AND meta_value = '%s'
  ", $meta_value));
}

function gmc_get_recipe_ids_for_post_and_page($post_id)
{
  global $wpdb;
  return $wpdb->get_col( $wpdb->prepare( "
	SELECT meta_value
	FROM {$wpdb->postmeta} 
	WHERE (meta_key = 'gmc_local_id' OR meta_key = 'gmc_local_page_id') AND post_id = %d
  ", $post_id));
}

function gmc_get_recipe_count_for_post($post_id)
{
  global $wpdb;
  return $wpdb->get_var($wpdb->prepare( "SELECT COUNT(meta_id) FROM $wpdb->postmeta WHERE meta_key= 'gmc_local_id' AND post_id = %d", $post_id) );
}

function gmc_update_term_taxonomy_count($term_result, $taxonomy)
{
  global $wpdb;

	foreach ($term_result as $term_item) {
    $term = get_term_by('name', $term_item, $taxonomy);

    $term_taxonomy_id = $term->term_taxonomy_id;

    $count = $wpdb->get_var( $wpdb->prepare( "
      SELECT COUNT(DISTINCT p.ID) FROM {$wpdb->posts} AS p
      INNER JOIN {$wpdb->term_relationships} AS r
      ON p.ID = r.object_id
      INNER JOIN {$wpdb->postmeta} AS m
      ON m.meta_value = p.ID
      WHERE (meta_key = 'gmc_local_id' OR meta_key = 'gmc_local_page_id')
      AND p.post_type='gmc_recipe' AND p.post_status = 'publish'
      AND ((SELECT post_status FROM {$wpdb->posts} WHERE ID = m.post_id) = 'publish')
      AND post_id IN (
        SELECT DISTINCT object_id FROM {$wpdb->term_relationships} WHERE term_taxonomy_id = %d
      )
      AND r.term_taxonomy_id IN
      (
        SELECT term_taxonomy_id FROM {$wpdb->term_taxonomy} WHERE term_id = %d AND taxonomy = %s
      )
    ", $term_taxonomy_id, $term->term_id, "gmc_$taxonomy"));

		do_action( 'edit_term_taxonomy', $term_taxonomy_id, $taxonomy );
		$wpdb->update( $wpdb->term_taxonomy, compact( 'count' ), array( 'term_taxonomy_id' => $term_taxonomy_id ) );
		do_action( 'edited_term_taxonomy', $term_taxonomy_id, $taxonomy );
	}
}

function gmc_update_term_taxonomy_count_raw($term_result, $taxonomy)
{
  global $wpdb;

  foreach ($term_result as $term_item) {
    $term = get_term_by('name', $term_item, $taxonomy);

    $term_taxonomy_id = $term->term_taxonomy_id;

    $count = $wpdb->get_var( $wpdb->prepare( "
      SELECT COUNT(DISTINCT p.ID) FROM {$wpdb->posts} AS p
      INNER JOIN {$wpdb->term_relationships} AS r
      ON p.ID = r.object_id
      INNER JOIN {$wpdb->postmeta} AS m
      ON m.meta_value = p.ID
      WHERE (meta_key = 'gmc_local_id' OR meta_key = 'gmc_local_page_id')
      AND (p.post_type='post' OR p.post_type = 'page') AND p.post_status = 'publish'
      AND ((SELECT post_status FROM {$wpdb->posts} WHERE ID = m.post_id) = 'publish')
      AND post_id IN (
        SELECT DISTINCT object_id FROM {$wpdb->term_relationships} WHERE term_taxonomy_id = %d
      )
      AND r.term_taxonomy_id IN
      (
        SELECT term_taxonomy_id FROM {$wpdb->term_taxonomy} WHERE term_id = %d AND taxonomy = %s
      )
    ", $term_taxonomy_id, $term->term_id, "$taxonomy"));

    do_action( 'edit_term_taxonomy', $term_taxonomy_id, $taxonomy );
    $wpdb->update( $wpdb->term_taxonomy, compact( 'count' ), array( 'term_taxonomy_id' => $term_taxonomy_id ) );
    do_action( 'edited_term_taxonomy', $term_taxonomy_id, $taxonomy );
  }
}

function gmc_save_recipe_to_gmc($post_ID, $post) {
  if ($post->post_status=="publish") {
	//error_log("+++++ RECIPE PUBLISH");
	$gmcid=get_post_meta($post_ID,"gmc-id",true);

	try {
	  $result=gmc_send_xml_curl(GMC_URL, gmc_get_recipe_xml($post,$gmcid));
	  //error_log("SAVING");

	} catch (Exception $e) {
	  echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

	$xresult=simplexml_load_string($result);
	$gmcid=(int)$xresult['id'];


	  update_post_meta($post_ID,"gmc-id",$gmcid);
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
  if ('page' == $_POST['post_type'] ) 
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
  else if ($post->post_type=='post') {
    gmc_update_post($post_ID, $post->post_content, 'gmc_local_id');
  }
  else if ($post->post_type=='page') {
    gmc_update_post($post_ID, $post->post_content, 'gmc_local_page_id');
  }
}

function gmc_update_post($post_ID, $post_content, $post_type) {
  $needle = '[gmc_recipe \d+]';
  $result = preg_match_all($needle, $post_content, $matches);
  
  $recipes_in_post = get_post_meta($post_ID, $post_type);
  
  $allergy_result = array();
  $course_result = array();
  $dietary_result = array();
  $misc_result = array();
  $occasion_result = array();
  $region_result = array();
  
  if ($result)
  {
    foreach ($matches[0] as $recipe_id) {
      $recipe_id = substr($recipe_id, 11);

      $allergy_result = gmc_populate_term_result($recipe_id, 'gmc_allergy', $allergy_result);
      $course_result = gmc_populate_term_result($recipe_id, 'gmc_course', $course_result);
      $dietary_result = gmc_populate_term_result($recipe_id, 'gmc_dietary', $dietary_result);
      $misc_result = gmc_populate_term_result($recipe_id, 'gmc_misc', $misc_result);
      $occasion_result = gmc_populate_term_result($recipe_id, 'gmc_occasion', $occasion_result);
      $region_result = gmc_populate_term_result($recipe_id, 'gmc_region', $region_result);

      if (!in_array($recipe_id, $recipes_in_post)) {
        add_post_meta($post_ID, $post_type, $recipe_id);
      }
      else {
        $key = array_search($recipe_id, $recipes_in_post);
        unset($recipes_in_post[$key]);
      }
    }
  }

  $recipes_removed = array();
  //anything left was in the blog post but is no longer
  foreach ($recipes_in_post as $recipe_id) {
    delete_post_meta($post_ID, $post_type, $recipe_id);
    array_push($recipes_removed, $recipe_id);
  }

  gmc_update_post_taxonomy_terms($post_ID, $allergy_result, 'allergy', $recipes_removed);
  gmc_update_post_taxonomy_terms($post_ID, $course_result, 'course', $recipes_removed);
  gmc_update_post_taxonomy_terms($post_ID, $dietary_result, 'dietary', $recipes_removed);
  gmc_update_post_taxonomy_terms($post_ID, $misc_result, 'misc', $recipes_removed);
  gmc_update_post_taxonomy_terms($post_ID, $occasion_result, 'occasion', $recipes_removed);
  gmc_update_post_taxonomy_terms($post_ID, $region_result, 'region', $recipes_removed);
}

function gmc_trash_post($post_ID)
{
  if (get_post($post_ID)->post_type == 'gmc_recipe')
  {
    $recipes_in_post = gmc_get_posts_and_pages_for_recipe($post_ID);

    foreach ($recipes_in_post as $recipe_in_post_id) {
      gmc_update_trash_post($recipe_in_post_id);
    }

    gmc_update_trash_post($post_ID);
  }
  else
  {
    $needle = '[gmc_recipe \d+]';
    $result = preg_match_all($needle, get_post($post_ID)->post_content, $matches);
    $recipes_in_post = get_post_meta($post_ID, 'gmc_local_id');

    foreach ($recipes_in_post as $recipe_id) {
      $recipe_id = substr($recipe_id, 11);

      gmc_update_trash_post($recipe_id);      
    }
  }
}

function gmc_get_posts_and_pages_for_recipe($post_ID)
{
  global $wpdb;

  return $wpdb->get_results($wpdb->prepare( "SELECT ID FROM $wpdb->postmeta AS m INNER JOIN $wpdb->posts AS p ON m.post_id = p.ID WHERE meta_key = 'gmc_local_id' AND meta_value = '%s' AND p.post_status = 'publish'", $post_ID));
}

function gmc_update_trash_post($recipe_id)
{
    $recipe_count = gmc_get_post_and_page_count_for_recipe($recipe_id);
    
    $recipe_count = $recipe_count -1;

    if ($recipe_count > 0)
    {
      gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_allergy', 'allergy');
      gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_course', 'course');
      gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_dietary', 'dietary');
      gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_misc', 'misc');
      gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_occasion', 'occasion');
      gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_region', 'region');
    }
    else
    {
      gmc_update_term_taxonomy_count(wp_get_object_terms($recipe_id, 'gmc_allergy'), 'allergy');
      gmc_update_term_taxonomy_count(wp_get_object_terms($recipe_id, 'gmc_course'), 'course');
      gmc_update_term_taxonomy_count(wp_get_object_terms($recipe_id, 'gmc_dietary'), 'dietary');
      gmc_update_term_taxonomy_count(wp_get_object_terms($recipe_id, 'gmc_misc'), 'misc');
      gmc_update_term_taxonomy_count(wp_get_object_terms($recipe_id, 'gmc_occasion'), 'occasion');
      gmc_update_term_taxonomy_count(wp_get_object_terms($recipe_id, 'gmc_region'), 'region');

      gmc_update_term_taxonomy_count_raw(wp_get_object_terms($recipe_id, 'allergy'), 'allergy');
      gmc_update_term_taxonomy_count_raw(wp_get_object_terms($recipe_id, 'course'), 'course');
      gmc_update_term_taxonomy_count_raw(wp_get_object_terms($recipe_id, 'dietary'), 'dietary');
      gmc_update_term_taxonomy_count_raw(wp_get_object_terms($recipe_id, 'misc'), 'misc');
      gmc_update_term_taxonomy_count_raw(wp_get_object_terms($recipe_id, 'occasion'), 'occasion');
      gmc_update_term_taxonomy_count_raw(wp_get_object_terms($recipe_id, 'region'), 'region');
    }
}

// $needle = '[gmc_recipe \d+]';
//     $result = preg_match_all($needle, get_post($post_ID)->post_content, $matches);
//     $recipes_in_post = get_post_meta($post_ID, 'gmc_local_id');

//     if ($result)
//     {
//       foreach ($recipes_in_post as $recipe_id) {
//         $recipe_id = substr($recipe_id, 11);
//         $recipe_count = gmc_get_post_and_page_count_for_recipe($recipe_id);
//         $recipe_count = $recipe_count -1;

//         gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_allergy', 'allergy');
//         gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_course', 'course');
//         gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_dietary', 'dietary');
//         gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_misc', 'misc');
//         gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_occasion', 'occasion');
//         gmc_update_recipe_taxonomy_terms($recipe_id, $recipe_count, 'gmc_region', 'region');
//       }
//     }

function gmc_untrash_post($post_ID)
{
  //TODO
}

function gmc_update_post_taxonomy_terms($post_ID, $result, $post_category, $recipes_removed = NULL)
{
  foreach ($result as $term_item) {
    if (!term_exists($term_item, $post_category)) //if "gmc_course" exists but "course" doesnt, create "course"
    {
      $old_term = get_term_by('name', $term_item, "gmc_$post_category"); //get the term details for "gmc_course"

      wp_insert_term($old_term->name, $post_category,
        array(
          'slug' => $old_term->slug
        )
      );
    }
  }

  wp_set_object_terms($post_ID, $result, $post_category);

  //If the recipe tag has been removed from this post but is in use elsewhere then the count will be wrong without getting the other posts result  
   if (!empty($recipes_removed))
   {
     foreach ($recipes_removed as $recipe_id) {
        $new_result = gmc_populate_term_result($recipe_id, "gmc_$post_category", array());
       
        gmc_update_term_taxonomy_count($new_result, $post_category);
      }
    }
    else
    {
      gmc_update_term_taxonomy_count($result, $post_category);
    }
}

function gmc_populate_term_result($recipe_id, $recipe_category, $result)
{
  $terms = wp_get_object_terms($recipe_id, $recipe_category);

  if($terms) {
    foreach ($terms as $term)
    {
      array_push($result, $term->name);
    }
  }
  
  return $result;
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

function gmc_get_post_meta_values_with_post_id($post_id, $meta_key)
{
  global $wpdb;
  return $wpdb->get_col( $wpdb->prepare( "
	SELECT meta_value
	FROM {$wpdb->postmeta} as postmeta
	WHERE post_id = %d 
  AND postmeta.meta_key = '%s' LIMIT 1
  ", $post_id, $meta_key));
}

function gmc_get_post_count_for_recipe($meta_value)
{
  global $wpdb;
  return $wpdb->get_var($wpdb->prepare( "SELECT COUNT(meta_id) FROM $wpdb->postmeta AS m
    INNER JOIN $wpdb->posts AS p ON m.post_id = p.ID
    INNER JOIN $wpdb->posts AS pr ON m.meta_value = pr.ID
    WHERE meta_key = 'gmc_local_id' AND meta_value = '%s' AND p.post_status = 'publish' AND pr.post_status = 'publish'", $meta_value) );
}

function gmc_get_page_count_for_recipe($meta_value)
{
  global $wpdb;
  return $wpdb->get_var($wpdb->prepare( "SELECT COUNT(meta_id) FROM $wpdb->postmeta AS m 
    INNER JOIN $wpdb->posts AS p ON m.post_id = p.ID 
    INNER JOIN $wpdb->posts AS pr ON m.meta_value = pr.ID
    WHERE meta_key = 'gmc_local_page_id' AND meta_value = '%s' AND p.post_status = 'publish' AND pr.post_status = 'publish'", $meta_value) );

}

function gmc_get_post_and_page_count_for_recipe($meta_value)
{
  global $wpdb;
  return $wpdb->get_var($wpdb->prepare( "SELECT COUNT(meta_id) FROM $wpdb->postmeta AS m 
    INNER JOIN $wpdb->posts AS p ON m.post_id = p.ID 
    INNER JOIN $wpdb->posts AS pr ON m.meta_value = pr.ID
    WHERE (meta_key= 'gmc_local_id' OR meta_key = 'gmc_local_page_id') AND meta_value = '%s' AND p.post_status = 'publish' AND pr.post_status = 'publish'", $meta_value) );
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

function gmc_enqueue_scripts() {
  wp_enqueue_script('jquery');

  $load_thickbox = get_option('gmc-img-popup');

  if ($load_thickbox)
  {
    wp_enqueue_script('thickbox');
  }
  
  wp_enqueue_script('recipe-template',gmc_plugin_url().'/js/recipe-template.js',array('jquery'),GMC_VERSION,true);

  if ($load_thickbox)
  {
    wp_enqueue_style('thickbox');
  }

  $overridecss=get_option('gmc-overridecss');
  $gmccss=get_option('gmc-shortcodecss');

  if (empty($overridecss)) {
  wp_register_style('recipe-template', gmc_plugin_url().'/css/recipe-template.css', false, GMC_VERSION);
  } else {
  wp_register_style('recipe-template', gmc_plugin_url().'/css/recipe-template-custom.css', false, GMC_VERSION);
  }
  wp_enqueue_style( 'recipe-template');
}

function gmc_admin_enqueue_scripts() {
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-sortable');
  wp_enqueue_script('jquery-ui-tabs');

  wp_enqueue_script('jquery.tools.min',gmc_plugin_url().'/js/jquery.tools.min.js');
  wp_enqueue_script('chosen.jquery.min',gmc_plugin_url().'/js/chosen.jquery.min.js');
  wp_enqueue_script('jquery.alerts',gmc_plugin_url().'/js/jquery.alerts.min.js');
  wp_enqueue_script('jquery.miniColors',gmc_plugin_url().'/js/jquery.miniColors.min.js');
  wp_enqueue_script('guiders',gmc_plugin_url().'/js/guiders-1.2.8.js');
  wp_enqueue_script('media-upload');

  wp_enqueue_script('codemirror', gmc_plugin_url().'/js/codemirror.js',GMC_VERSION,true);
  wp_enqueue_script('codemirrorcss', gmc_plugin_url().'/js/css.js',GMC_VERSION,true);
  
  wp_enqueue_script('autoresize.jquery', gmc_plugin_url().'/js/autoresize.jquery.min.js',GMC_VERSION,true);
  
  wp_enqueue_script('gmc-file-upload', gmc_plugin_url().'/js/gmc-file-upload.js', array('jquery','media-upload'),GMC_VERSION,true);
  wp_enqueue_script('recipe-template-admin',gmc_plugin_url().'/js/recipe-template-admin.js',array('codemirror','codemirrorcss'),GMC_VERSION,true);
  
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

  wp_register_style('guiders', gmc_plugin_url().'/css/guiders-1.2.8.css');
  wp_enqueue_style( 'guiders');

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

function gmc_show_recipe($id) {
  global $post;
  $tmppost=$post;

  $post=get_post($id);
  setup_postdata($post);

  ob_start();

  $gmc_narrow_css = get_option('gmc-widecss') ? '' : '-narrow';
  $has_step_image = false;
  $gmc_img_popup = get_option('gmc-img-popup');
  $gmc_hide_title = get_option('gmc-hide-title');

  require "recipe-template-shortcode.php";

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

	$content=gmc_show_recipe($post->ID);

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
  $r=get_posts('post_status=publish&post_type=gmc_recipe&nopaging=1&orderby=title&order=ASC');  

  if ($r) {
  	$recipes=array();
  	foreach($r as $rec) {
  	  $recipes[$rec->post_title]=$rec->ID;
  	}

  	echo '<p class="howto">' . __('Choose the recipe you would like to display in this post.', 'gmc') .'</p>';
  	
  	echo '<p><label class="gmc-admin-label inline">' . __('Recipe', 'gmc') . '</label>';
  	echo gmc_select_helper('gmc-insert-recipe-list', $recipes);
  	echo "</p>";
  	submit_button( __('Insert Recipe', 'gmc'), 'primary', 'gmc-insert-recipe-button', false, array('tabindex' => 100, 'class'=>"button-primary gmc-admin-button left"));  	
  } else {
	 echo '<p class="howto">'. __('Once you have added a recipe by using the Recipes menu on the left sidebar (below the Posts menu) you can come back here and insert that recipe into your post.', 'gmc') .'</p>';
  }

  if (is_gmc_premium_active())
  {
    echo '<ul class="hidden gmcPremiumFeature">';
    echo '<li class="howto">' . __('Or add a list of recipes.', 'gmc') .'</li>';
    echo '<li><a id="gmc-all-recipes" href="#">'. __('All recipes') . '</a></li>';
    echo '<li><a id="gmc-latest-recipes" href="#">'. __('Latest recipes') . '</a></li>';
    echo '<li><a id="gmc-latest-recipes-slideshow" href="#">'. __('Latest recipes slideshow') . '</a></li>';
    echo '<li><a id="gmc-recipe-categories" href="#">'. __('Recipe categories') . '</a></li>';
    echo '</ul>';
  }
  else
  {
    echo '<p class="howto">' . sprintf(__('If you have the <a href="%s">premium version</a> of this plugin you can see which recipes have already been posted and much more.', 'gmc'), 'http://www.getmecooking.com/wordpress-recipe-plugin') . '</p>';
  }
  echo "</div>\n";
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

function gmc_enter_title_here($title, $post) {
  if ($post->post_type=="gmc_recipe") {
    $title= __('Recipe Title', 'gmc');
  }
  
  return $title;
}

function gmc_admin_post_thumbnail_html($content) {
//  error_log($content);

  global $post;
  
  if ($post->post_type=="gmc_recipe") {
	$content=preg_replace('/Set featured image/','Set photograph of finished Recipe', $content); //TODO not used?
	$content=preg_replace('/Remove featured image/','Remove photograph of finished Recipe', $content);
  }

  return $content;
}

function gmc_plugin_action_links($links, $file) {
  if (basename($file)=='recipe-template.php') {
	$settings_link = '<a href="'.admin_url("admin.php?page=getmecooking_options").'">'. __('Settings', 'gmc') .'</a>';
	array_unshift($links, $settings_link);
  }

  return $links;
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
    return __('None', 'gmc');
  }
  else
  {
    $partMinutes;

    if ($dblMinutes >= 60)
    {
      $partMinutes = $dblMinutes % 60;
      $dblHour += $dblMinutes / 60;
      $dblMinutes = $partMinutes;
    }

    if ($dblHour == 1)
    {
      $hours = '1 ' . __('hour', 'gmc');
    }
    else if ($dblHour > 1)
    {
      $hours .= intval($dblHour) . ' ' . __('hours', 'gmc');
    }

    if ($dblMinutes == 1)
    {
      $minutes .= '1 ' . __('minute', 'gmc');
    }
    else if ($dblMinutes > 1)
    {
      $minutes .= intval($dblMinutes) . ' ' . __('minutes', 'gmc');
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
			$dblHour = $dblHour + floor($dblMinutes / 60);
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
    case 'bag':
      $measurement = gmc_pluralise(__('Bag', 'gmc'), __('bags', 'gmc'), $quantity);
    break;
	  case 'bunch':
      $measurement = gmc_pluralise(__('Bunch', 'gmc'), __('bunches', 'gmc'), $quantity);
    break;
    case 'bottle':
      $measurement = gmc_pluralise(__('Bottle', 'gmc'), __('bottles', 'gmc'), $quantity);
    break;
    case 'box':
      $measurement = gmc_pluralise(__('Box', 'gmc'), __('boxes', 'gmc'), $quantity);
    break;
    case 'bulb':
      $measurement = gmc_pluralise(__('Bulb', 'gmc'), __('bulbs', 'gmc'), $quantity);
    break;
    case 'can':
      $measurement = gmc_pluralise(__('Can', 'gmc'), __('cans', 'gmc'), $quantity);
    break;
    case 'carton':
      $measurement = gmc_pluralise(__('Carton', 'gmc'), __('cartons', 'gmc'), $quantity);
    break;    
    case 'clove':
      $measurement = gmc_pluralise(__('Clove', 'gmc'), __('cloves', 'gmc'), $quantity);
    break;
    case 'cube':
      $measurement = gmc_pluralise(__('Cube', 'gmc'), __('cubes', 'gmc'), $quantity);
    break;
    case 'cup':
      $measurement = gmc_pluralise(__('Cup', 'gmc'), __('cups', 'gmc'), $quantity);
    break;
    case 'dash':
      $measurement = gmc_pluralise(__('Dash', 'gmc'), __('dashes', 'gmc'), $quantity);
    break;
    case 'drizzle':
      $measurement = __($measurement, 'gmc');
    break;
    case 'drop':
      $measurement = gmc_pluralise(__('Drop', 'gmc'), __('drops', 'gmc'), $quantity);
    break;
    case 'glass':
      $measurement = gmc_pluralise(__('Glass', 'gmc'), __('glasses', 'gmc'), $quantity);
    break;
    case 'handful':
      $measurement = gmc_pluralise(__('Handful', 'gmc'), __('handfuls', 'gmc'), $quantity);
    break;
    case 'head':
      $measurement = gmc_pluralise(__('Head', 'gmc'), __('heads', 'gmc'), $quantity);
    break;
    case 'inch':
      $measurement = '"';
    break;
    case 'jar':
      $measurement = gmc_pluralise(__('Jar', 'gmc'), __('jars', 'gmc'), $quantity);
    break;
    case 'knob':
      $measurement = gmc_pluralise(__('Knob', 'gmc'), __('knobs', 'gmc'), $quantity);
    break;
    case 'leaf':
      $measurement = gmc_pluralise(__('Leaf', 'gmc'), __('leaves', 'gmc'), $quantity);
    break;
    case 'packet':
      $measurement = gmc_pluralise(__('Packet', 'gmc'), __('packets', 'gmc'), $quantity);
    break;
    case 'piece':
      $measurement = gmc_pluralise(__('Piece', 'gmc'), __('pieces', 'gmc'), $quantity);
    break;
	  case 'pinch':
		  $measurement = gmc_pluralise(__('Pinch', 'gmc'), __('pinches', 'gmc'), $quantity);
		break;
    case 'rib':
      $measurement = gmc_pluralise(__('Rib', 'gmc'), __('ribs', 'gmc'), $quantity);
    break;
    case 'scoop':
      $measurement = gmc_pluralise(__('Scoop', 'gmc'), __('scoops', 'gmc'), $quantity);
    break;
    case 'sheet':
      $measurement = gmc_pluralise(__('Sheet', 'gmc'), __('sheets', 'gmc'), $quantity);
    break;
    case 'shot':
      $measurement = gmc_pluralise(__('Shot', 'gmc'), __('shots', 'gmc'), $quantity);
    break;
    case 'splash':
      $measurement = gmc_pluralise(__('Splash', 'gmc'), __('splashes', 'gmc'), $quantity);
    break;
    case 'sprinkle':
      $measurement = gmc_pluralise(__('Sprinkle', 'gmc'), __('sprinkles', 'gmc'), $quantity);
    break;
    case 'sprig':
      $measurement = gmc_pluralise(__('Sprig', 'gmc'), __('sprigs', 'gmc'), $quantity);
    break;
    case 'stalk':
      $measurement = gmc_pluralise(__('Stalk', 'gmc'), __('stalks', 'gmc'), $quantity);
    break;
    case 'stick':
      $measurement = gmc_pluralise(__('Stick', 'gmc'), __('sticks', 'gmc'), $quantity);
    break;
    case 'tablespoon':
      $measurement = gmc_pluralise(__('Tablespoon', 'gmc'), __('tablespoons', 'gmc'), $quantity);
    break;
    case 'heaped tablespoon':
      $measurement = gmc_pluralise(__($measurement, 'gmc'), __('heaped tablespoons', 'gmc'), $quantity);
    break;
    case 'teaspoon':
      $measurement = gmc_pluralise(__('Teaspoon', 'gmc'), __('teaspoons', 'gmc'), $quantity);
    break;
    case 'heaped teaspoon':
      $measurement = gmc_pluralise(__($measurement, 'gmc'), __('heaped teaspoons', 'gmc'), $quantity);
    break;
    case 'tin':
      $measurement = gmc_pluralise(__('Tin', 'gmc'), __('tins', 'gmc'), $quantity);
    break;
    case 'tub':
      $measurement = gmc_pluralise(__('Tub', 'gmc'), __('tubs', 'gmc'), $quantity);
    break;
    case 'tube':
      $measurement = gmc_pluralise(__('Tube', 'gmc'), __('tubes', 'gmc'), $quantity);
    break;
    case 'wedge':
      $measurement = gmc_pluralise(__('Wedge', 'gmc'), __('wedges', 'gmc'), $quantity);
    break;
	  case 'imperial fl oz':
	  case 'usa fl oz':	  
		  $measurement = __('fl oz', 'gmc');
		break;
	  case 'imperial pint':
	  case 'usa pint':
    case 'usa pint weight':
    case 'imperial pint weight':
		  $measurement = gmc_pluralise(__('Pint', 'gmc'), __('pints', 'gmc'), $quantity);
		break;
    case 'imperial quart':
    case 'usa dry quart':
    case 'usa liquid quart':
      $measurement = gmc_pluralise(__('Quart', 'gmc'), __('quarts', 'gmc'), $quantity);
    break;
    case 'juice':
      $measurement = gmc_pluralise(__('Juice', 'gmc'), __('juices', 'gmc'), $quantity);
    break;
    case 'thin slice':
      $measurement = gmc_pluralise(__($measurement, 'gmc'), __('thin slices', 'gmc'), $quantity);
    break;
    case 'medium slice':
      $measurement = gmc_pluralise(__($measurement, 'gmc'), __('medium slices', 'gmc'), $quantity);
    break;
    case 'thick slice':
      $measurement = gmc_pluralise(__($measurement, 'gmc'), __('thick slices', 'gmc'), $quantity);
    break;
	  default:
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

function gmc_pluralise($singular, $plural, $quantity)
{
  if ($quantity > 1)
  {
    return $plural;
  }

  if ($gmc_language == 'de_DE')
  {
    return $singular;
  }

  return strtolower($singular);
}

function gmc_recipe_filter_link($filter, $has_photo, $category)
{
  if (get_option('gmc_local_taxonomy') == 'Y')
  {
    if (get_option('gmc_archived_results') == 'Y')
    {
      $term_link = get_term_link($filter->slug, $filter->taxonomy);
      return '<a href="' . str_replace('gmc_', '', $term_link) . '">' . $filter->name . '</a>, ';
    }

    $term_link = get_term_link($filter);
    return '<a href="' . $term_link . '">' . $filter->name . '</a>, ';
  }
  else
  {
    if(get_option('gmc-hide-links'))
      return $filter->name . ', ';

    $username = get_option("gmc-username");

    $filterQuery = $filter->name;
    
    if($username && $has_photo)
    {
      $filterQuery = $filter->name . "&username=$username";
    }

    return '<a href="http://www.getmecooking.com/recipes?'.$category.'='.$filterQuery. '">'.$filter->name.'</a>, ';
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
  $step_text = __('Step', 'gmc');

  if (get_option('gmc-label-step-text'))
  {
    $step_text = get_option('gmc-label-step-text');
  }

	switch (get_option('gmc-label-step'))
	{
	  case '1':
    return "$step_text $step_id.";
		break;
	  case '2':
		return "$step_id.";
		break;
	  case '3':
		return $step_id;
		break;
	  case '4':    
		return;
		break;
	  default:
		return "$step_text $step_id";
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

function gmc_all_posts_from_earliest_usage($wpdb, $post_type)
{
  return $wpdb->prepare("SELECT ID, post_content
    FROM {$wpdb->posts}
    WHERE 
    post_status = 'publish' AND post_type = '$post_type'
    AND post_modified > (
      SELECT post_modified from {$wpdb->posts} WHERE ID = (SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = 'gmc-id' ORDER BY post_id ASC LIMIT 1)
    )
  ");
}

function gmc_attachment_fields_to_edit($form_fields, $post)
{
  $post_id = !empty( $_GET['post_id'] ) ? (int) $_GET['post_id'] : 0;
  $post_type = get_post_type($post_id);
  $attachment_parent_id = !empty($post->post_parent) ? $post->post_parent : 0;
  $attachment_post_type = get_post_type($attachment_parent_id);
  $library_tab = ( isset($_GET['tab']) && 'library' == $_GET['tab']) ? true : false;
  $is_gmc_post = false;

  if ($post_type == 'gmc_recipe' || $attachment_post_type == 'gmc_recipe' || $post_type == 'gmc_recipestep' || $attachment_post_type == 'gmc_recipestep')
  {
    $is_gmc_post = true;
  }

  if((!$library_tab || isset($_GET['post_type'])) && $is_gmc_post && substr( $post->post_mime_type, 0, 5 ) == 'image'){
    unset( $form_fields['post_excerpt'] );
    unset( $form_fields['post_content'] );
    unset( $form_fields['url'] );
    unset( $form_fields['image_url'] );
    unset( $form_fields['align'] );

    $form_fields['buttons'] = array(
        'label' => '',
        'value' => '',
        'input' => 'html'
    );

    $filename = basename( $post->guid );
    $attachment_id = $post->ID;
    $use_this_image = '<input type="submit" name="send['.$attachment_id.']" id="send['.$attachment_id.']" class="button wp-image-'.$attachment_id.'" value="'.__("Use This Image", "gmc").'">';

    if ( current_user_can( 'delete_post', $attachment_id ) ) {
        if ( !EMPTY_TRASH_DAYS ) {
            $form_fields['buttons']['html'] = $use_this_image . "<a href='" . wp_nonce_url( "post.php?action=delete&amp;post=$attachment_id", 'delete-attachment_' . $attachment_id ) . "' id='del[$attachment_id]' class='delete'>" . __( 'Delete Permanently' ) . '</a>';
        } elseif ( !MEDIA_TRASH ) {
            $form_fields['buttons']['html'] = $use_this_image . "<a href='#' class='del-link' onclick=\"document.getElementById('del_attachment_$attachment_id').style.display='block';return false;\">" . __( 'Delete' ) . "</a>
                     <div id='del_attachment_$attachment_id' class='del-attachment' style='display:none;'>" . sprintf( __( 'You are about to delete <strong>%s</strong>.' ), $filename ) . "
                     <a href='" . wp_nonce_url( "post.php?action=delete&amp;post=$attachment_id", 'delete-attachment_' . $attachment_id ) . "' id='del[$attachment_id]' class='button'>" . __( 'Continue' ) . "</a>
                     <a href='#' class='button' onclick=\"this.parentNode.style.display='none';return false;\">" . __( 'Cancel' ) . "</a>
                     </div>";
        } else {
            $form_fields['buttons']['html'] = $use_this_image . "<a href='" . wp_nonce_url( "post.php?action=trash&amp;post=$attachment_id", 'trash-attachment_' . $attachment_id ) . "' id='del[$attachment_id]' class='delete'>" . __( 'Move to Trash' ) . "</a><a href='" . wp_nonce_url( "post.php?action=untrash&amp;post=$attachment_id", 'untrash-attachment_' . $attachment_id ) . "' id='undo[$attachment_id]' class='undo hidden'>" . __( 'Undo' ) . "</a>";
        }
    }
    else {
        $form_fields['buttons']['html'] = '';
    }    
  }

  return $form_fields;
}

function gmc_remove_media_tabs($tabs)
{
  if (isset($_REQUEST['post_type'])) {
    $post_type = $_REQUEST['post_type'];
    
    if ($post_type == 'gmc_recipe' || $post_type == 'gmc_recipestep')
    {
      unset($tabs['gallery']);
    }
  }
  return $tabs;
}

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function is_gmc_premium_active()
{
  return is_plugin_active('getmecooking-recipe-template-premium/recipe-template-premium.php');
}

function is_gmc_premium_active_front_end()
{
  return in_array('getmecooking-recipe-template-premium/recipe-template-premium.php', (array)get_option('active_plugins', array()));
}

function current_page_url() {
  $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
  if ($_SERVER["SERVER_PORT"] != "80")
  {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } 
  else 
  {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  
  return $pageURL;
}
?>