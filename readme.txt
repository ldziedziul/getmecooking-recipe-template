=== Plugin Name ===
Contributors: GetMeCooking
Donate link: http://www.getmecooking.com/recipe-template-info#donate
Tags: recipes, recipe, cooking, food, recipe template, recipe seo, recipe view, getmecooking
Requires at least: 3.0
Tested up to: 3.9
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress recipe plugin for food bloggers. Display one or more recipes per page with print, recipe search, custom layout, SEO and other features.

== Description ==

This WordPress recipe plugin makes it quick and easy for you to:

* Add many recipes to a blog post, or the same recipe in many posts
* Specify if the recipe is relevant for food allergies and intolerances
* Personalise the colours, heading descriptions and layout of recipes
* Search Engine Optimised

Your visitors will be able to:

* Print just the recipe, not the whole blog post. Choose with all photos, just main photo or just text
* Click on photographs to see larger versions
* Filter and search for recipes (requires an optional link to [GetMeCooking](http://www.getmecooking.com))

The premium version gives you more features:

* Recipe index page - list all of your recipes on any page or blog post with a choice of different layout options
* Show recipes by category - display a list of categories (allergies, courses, etc.) on any page or blog post. Click on a category to display a list of relevant recipes
* Display fresh content - display up to 10 of your your most recently added recipes on any page or blog post
* Advanced management - see which recipes you have added to a blog post, multiple blog posts, or not yet added
* In-blog linking of recipes - recipes link to posts on your blog instead of linking to [GetMeCooking](http://www.getmecooking.com)
* Language support for Danish, Dutch, English, French, German, Italian, Portuguese, Russian, Romanian, Swedish
 
A video overview and more information is [available here](https://www.getmecooking.com/wordpress-recipe-plugin)

== Installation ==

1. Upload the folder `GetMeCooking Recipe Template` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the plugin through the 'Settings' menu labelled 'GetMeCooking Recipe Template'

For information on how to use the plugin, please [go here](http://www.getmecooking.com/recipe-template-info#how-to-use).

== Frequently Asked Questions ==

= Can I change the layout of the recipe? =

Yes, there are simple options to customise many aspects of the recipe. Don't like the recipe step photo on the right? POW! One click and it's on the left.

= Can visitors print just the recipe? =

They sure can, each recipe has its own print link. Print just the recipe, not the whole blog post. Choose with all photos, just main photo or just text.

= Does this WordPress recipe plugin take care of Search Engine Optimisation (SEO)? =

Don't worry about the search engine bots, we speak their language.

= Can I add more than 1 recipe to a blog post? =

Yes. You can add as many recipes as you like. An example of this being useful is if your child has attended a school fete and you have cooked more than one recipe

= Can the same recipe exist on more than one blog post? =

Yes. And if you make changes to the recipe, the changes will be updated in all of your blog posts

= Can I edit recipes after I have posted them on my blog? =

Yes - just edit the recipe. No need to do anything in the blog post

= Do I need to type in ALL the information? =

Everything is optional and headings will only appear if you have typed in the relevant information. If you want the recipe to appear on GetMeCooking then we do need a photo of the finished recipe.

= So how do I use your WordPress recipe plugin? =

Come sit closer little Timmy and [watch the video](https://www.getmecooking.com/wordpress-recipe-plugin) or [read about it](http://www.getmecooking.com/recipe-template-info#installingThePlugin).

= Which languages does it support? =

Dutch, English, Italian, Portuguese, Russian.

== Screenshots ==

1. A chocolate chip muffin recipe embedded within your blog post, yum!
2. The recipe edit page
3. Add / edit the ingredients
4. Add / edit the recipe steps
5. Add the recipe tag to a blog post and that's where it shall appear
6. Gain exposure and more visitors by signing up to GetMeCooking
7. Customise the recipe template with these simple options
8. Geek out and customise the recipe template as much as you want

== Changelog ==
= 1.31 =
* Hidden the preview button until you press the save button to get around the double ingredient / steps bug

= 1.30 =
* WordPress 3.9 fixes

= 1.29 =
* Fixed bug where ingredients would be deleted if no steps had been entered

= 1.28 =
* Fixed bug where ingredients would be deleted if no steps had been entered

= 1.27 =
* Added a null check for some loops
* Changed user permissions to be based on 'post' and not 'page'

= 1.26 =
* If the recipe name is the same as the blog post title and the option is ticked to hide it, it is now shown when printed.
* Putting a recipe in the trash section correctly updates the count
* Updated chosen
* Fixed duplicate post bug
* Hide the article header image if you go directly to the recipe
* Corrected the prep/cooking time used by search engines

= 1.25 =
* Fixed a JavaScript bug caused by WordPress 3.6

= 1.24 =
* Added conversion chart
* Improved CSS
* Added label for recipe steps / ingredients
* Improved update gmc_update_old_version
* Trimmed input
* Fixed gmc_recipe_filter_link
* Corrected use of flush_rewrite_rules

= 1.23 =
* Only the recipe title that matches the blog post is hidden when the option is enabled
* Adding an apostrophe to a custom heading no longer adds a backslash
* Preview changes button now shows again, WordPress 3.4 broke this

= 1.22 =
* Replaced upload photo buttons with built-in WordPress uploader
* Added option to hide recipe title if it's the same as the blog post title
* Can change the heading for the word 'step' which is used for each step
* Occassions werent being shown in blog posts

= 1.21 =
* 1.20 had removed the upload/insert button from the add post page

= 1.20 =
* Added option when clicking images to show them in a popup rather than a blank page
* Re-added ability to set status / visibility of a recipe. Needed for new archive shortcode in premium plugin
* Removed option to drag / drop recipe steps as causing mac bug to not add photos

= 1.19 =
* Added option to say your theme is narrow, this changes the layout and puts the recipe summary information below the main photo rather than try to squeeze it to the right
* If there is no main photo, the narrow theme css is used so the summary text will no longer be bunched up
* Can now delete photos from steps
* Can now re-order recipe steps apart from in IE9
* The print icon / print text did not line up on all themes, should do now
* Renamed [recipe 1] to [gmc_recipe 1] to prevent possible conflicts with other plugins/themes
* Added a sample recipe for new installations
* Added a help tab on the add recipe page
* Fixed a bug when using a custom course type where the slug was different from the name

= 1.18 =
* We were receiving error logging emails which broke the plugin directory guidelines

= 1.17 =
* Reworded some text
* Added support for premium version

= 1.16 =
* The initial allergies etc. were not being added to the database

= 1.15 =
* Introduced a bug in last version where choosing drop down list options on admin page would not have desired output
* New ingredients had grey text, fixed to be black
* Removed the tag cloud on admin allergy etc. page
* Corrected text layout when some steps had photos and others did not

= 1.14 =
* Can now group recipe steps e.g. For the cake base, For the cake topping...
* Improved layout for adding a recipe
* Prep / cook time labels now only show if they have been filled in
* Insert recipe dialog now orders recipes by alphabetical
* Fixed ability to press update recipe more than once at a time which caused duplicate ingredients/steps
* Fixed deleting an ingredient note, it was not working

= 1.13 =
* Fixed bug where only 1 recipe per post was showing

= 1.12 =
* Can now add your own allergies, courses, dietary requirements etc
* No longer lower case the note text
* Improved the menu structure

= 1.11 =
* Moved recipe admin menu position to prevent conflicts with other plugins
* Encode xml values when sent to getmecooking.com to prevent errors
* Added GetMeCooking logo to recipe menu

= 1.10 =
* Some users are not seeing 1.09 in the auto update

= 1.09 =
* Bugfixes to support WordPress 3.3

= 1.08 =
* The ingredient note and step text boxes were not increasing in size
* The featured image box was no longer showing
* Printing style was wrong if custom css was enabled

= 1.07 =
* Improved the process of adding ingredients and steps
* Improved printing - choose to print with or without photos
* Added validation to the username field

= 1.06 =
* Added support for US / Imperial measurements
* Added more default measurement options
* Citing a source (author / book etc) no longer requires a URL
* Added source magazine

= 1.05 =
* Fixed custom themes, the plugin was hiding the featured image box and other sidebar boxes

= 1.04 =
* Added missing CSS to hide recipe title if it's the same as the blog post
* Fixed bug where other plugins would insert things after the note.
* Fixed ingredient group label bug in blog post. Some were showing when there were no ingredients.
* Fixed the note label, it was always showing even if you had no note.

= 1.03 =
* Labels were showing when they did not need to

= 1.02 =
* Fixed a plural bug with pounds and ounces
* Added a recipe note option
* Added an option to reference the original author / book / website
* Now hide the recipe title if it is the same as the blog post title
* Removed the recipe from showing in search results as it already shows your blog post

= 1.01 =
* Recipes were not being sent to GetMeCooking if you were opted in

= 1.0 =
* First release

== Upgrade Notice ==
= 1.23=
* Added max-width: 80%; to h2.gmc-recipe-title

= 1.19=
* Lots of CSS changes, best off resetting and re-adding your changes if still needed

= 1.16=
* Removed padding-left from .gmc_list_title
* Added padding-left:10px;padding-right:10px; to table.gmc_recipe_list img

= 1.15 =
* Added .gmc-print-area img {  padding-right: 5px }
* ul.gmc_no_list_item { list-style: none; margin-left: 0 }
* .gmc_list_title { padding-left: 10px; vertical-align: middle }
* table.gmc_recipe_list, table.gmc_recipe_list td { border: none }
* table.gmc_recipe_list img { text-align: right }

= 1.14 =
* Added td.gmc-group-list-title. Please see changes on line 87 and 91-99

= 1.07 =
* Please reset the CSS back to default in the GetMeCooking settings page due to lots of changes

= 1.06 =
* Any ingredient which was pounds or ounces will need re-selecting if you edit those recipes again.

= 1.02 =
* If you have typed in a description, you will need to move it from the 'note' tab.
* You will need to reselect the ingredient measurement type if you used 'pounds' or 'ounces' prior to running this version
* If you have ticked 'use your own CSS' then you will want to add '.gmc-img-right' with 'float: right' and 'gmc-web-hidden' with 'display: none'. Within @media print you need to add '.gmc-web-hidden' with 'display: block !important'

= 1.0 =
First release