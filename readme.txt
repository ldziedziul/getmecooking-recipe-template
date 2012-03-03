=== Plugin Name ===
Contributors: GetMeCooking
Donate link: http://www.getmecooking.com/recipe-template-info#donate
Tags: recipes, recipe, cooking, food, recipe template, getmecooking
Requires at least: 3.0
Tested up to: 3.3
Stable tag: trunk

For food bloggers. Display one or more recipes per page in an easy to read format with print, recipe search, custom layout, SEO and other features.

== Description ==

The Recipe Template plugin makes it quick and easy for you to:

* Add recipes to your blog
* Personalise the colours, heading descriptions and layout of recipes
* Add Search Engine Optimisation

Your visitors will be able to:

* Print just the recipe (not the whole blog post, which might be several pages)
* Click on photographs to see larger versions
* Filter and search for recipes (requires an optional link to [GetMeCooking](http://www.getmecooking.com))
 
A video overview and more information is [available here](http://www.getmecooking.com/recipe-template)

== Installation ==

1. Upload the folder `GetMeCooking Recipe Template` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the plugin through the 'Settings' menu labelled 'GetMeCooking Recipe Template'

For information on how to use the plugin, please [go here](http://www.getmecooking.com/recipe-template-info#how-to-use).

== Frequently Asked Questions ==

= Can I change the layout of the recipe? =

Yes, there are simple options to customise many aspects of the recipe. Don't like the recipe step photo on the right? POW! One click and it's on the left.

= Can visitors print just the recipe? =

They sure can, each recipe has its own print link.

= Does this plugin take care of Search Engine Optimisation (SEO)? =

Don't worry about the search engine bots, we speak their language.

= Can I add more than 1 recipe to a blog post? =

Yes. You can add as many recipes as you like. An example of this being useful is if your child has attended a school fete and you have cooked more than one recipe

= Can the same recipe exist on more than one blog post? =

Yes. And if you make changes to the recipe, the changes will be updated in all of your blog posts

= Can I edit recipes after I have posted them on my blog? =

Yes - just edit the recipe. No need to do anything in the blog post

= Do I need to type in ALL the information? =

Everything is optional and headings will only appear if you have typed in the relevant information. If you want the recipe to appear on GetMeCooking then we do need a photo of the finished recipe.

= So how do I use your plugin? =

Come sit closer little Timmy, [I'll tell you all about it](http://www.getmecooking.com/recipe-template-info#how-to-use).

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