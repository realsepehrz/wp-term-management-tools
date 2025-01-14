=== Term Management Tools ===
Contributors: theMikeD, scribu, realsepehrz  
Tags: admin, category, tag, term, taxonomy, hierarchy, organize, manage, merge, change, parent, child  
Requires at least: 4.2  
Tested up to: 6.7.1  
Stable tag: 2.0.2  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
Requires PHP: 7.1  

Allows you to merge terms, move terms between taxonomies, and set term parents, individually or in bulk. WPML is supported when changing taxonomies.

== Description ==

**Please note this plugin requires at least PHP 7.1.**

**realsepehrz note:**  
I utilized AI models such as Copilot and Deepseek to assist in reviewing and writing code. Please use the provided code at your own discretion, as I cannot be held responsible for any consequences arising from its use. Please note that the code may not be fully stable or secure, and it is recommended to thoroughly test and review it before implementation.

If you need to reorganize your tags and categories, this plugin will make it easier for you. It adds three new options to the Bulk Actions dropdown on term management pages:

* **Merge** - Combine two or more terms into one.
* **Set Parent** - Set the parent for one or more terms (for hierarchical taxonomies).
* **Change Taxonomy** - Convert terms from one taxonomy to another.

It works with tags, categories, and [custom taxonomies](http://codex.wordpress.org/Custom_Taxonomies).

== Usage ==

1. Go to the taxonomy page containing terms you want to modify. For example, for categories, go to `WP-Admin → Posts → Categories`.
2. Select the terms you want to reorganize.
3. Find the Bulk Actions dropdown, and select the task you'd like to perform.
4. Disco.

== WPML ==

[WPML](https://wpml.org)-translated terms are partially supported. Currently, only the "Change Taxonomy" task is WPML-aware. If a term with translations is moved to a new taxonomy, its translations are moved as well, and the translation relationships are preserved.

> **Note:** Currently, only the "Change Taxonomy" task is WPML-aware.

Work on the WPML component was sponsored by the [Rainforest Alliance](https://www.rainforest-alliance.org/).

== Support ==

Limited support is handled in the forum created for this purpose (see the [support](https://wordpress.org/support/plugin/term-management-tools/) tab on wp.org).

Find a problem? Fixes can be submitted on [GitHub](https://github.com/theMikeD/wp-term-management-tools).

== Installation ==

Either use the WordPress Plugin Installer (Dashboard → Plugins → Add New, then search for "term management tools"), or manually as follows:

1. Upload the entire `wp-term-management-tools` folder to your `/wp-content/plugins/` directory.
2. **Do not** change the name of the `wp-term-management-tools` folder.
3. Activate the plugin through the 'Plugins' menu in the WordPress Dashboard.

**Note for WordPress Multisite users:**

* Install the plugin in your `/plugins/` directory (do not install in the `/mu-plugins/` directory).
* In order for this plugin to be visible to Site Admins, the plugin has to be activated for each blog by the Network Admin.

== Upgrading from a previous version ==

Use the upgrade link in the Dashboard (Dashboard → Updates) to upgrade this plugin.

== Notes ==

The initial version of this plugin was by [scribu](http://scribu.net/), with contributions from others. See the full code history on [GitHub](https://github.com/theMikeD/wp-term-management-tools).

== Screenshots ==

1. **Set Parent option.** In this case, the term "New EN" will be set as a child of "Parent One EN".
2. **Merge option.** Here, the two selected terms will be merged into a new term named "Merged." In addition, because both source terms share the same parent term ("Parent One EN"), the new term will also have "Parent One EN" as its parent term.
3. **Change Taxonomy option.** Here, the "Parent One EN" category will be sent to the custom taxonomy "Hierarchical" (which I added for the sake of testing). A few other things to note here:
   - The two child terms will also be moved.
   - Because the target taxonomy is also hierarchical, the parent-child relationships will be preserved.
   - If there are any WPML translations of these terms, they will also be moved, and the translations will be maintained.

== Changelog ==

= 2.0.2 =
* Added security improvements, including direct access prevention and sanitization.
* Added a text that warns users to refresh after adding a new term due to the list not being updated.
* Updated contributors list.

= 2.0.1 =
* **FIX:** A WPML translation that only exists in a single site non-primary language was not being migrated correctly.

= 2.0.0 =
* Under new management by @theMikeD :)
* Full code refactoring.
* Inline documentation.
* [User documentation](https://www.codenamemiked.com/plugins/term-management-tools).
* Clean PHPCS using WordPress-Extra.
* Unit/integration tests, all of which pass.
* Term cache clearing now actually works.
* For the taxonomy change option, only public taxonomies are listed.
* For the taxonomy change option, WPML-translated terms are also moved.
* For the term merge option, if all terms to be merged have the same parent term, the merged term will also have that parent term.
* For the term parent option, if one of the supplied terms is also the term selected to be the parent, no terms are adjusted.
* New filter: `term_management_tools_changed_taxonomy__terms_as_supplied`.
* New filter: `term_management_tools_changed_taxonomy__terms_and_child_terms`.
* New filter: `term_management_tools_changed_taxonomy__reset_parent_for`.

= 1.1.4 =
* Improved taxonomy cache cleaning. Props Mustafa Uysal.
* Added 'term_management_tools_term_changed_taxonomy' action hook. Props Daniel Bachhuber.
* Fixed redirection for taxonomies attached to custom post types. Props Thomas Bartels.
* Added Japanese translation. Props mt8.

= 1.1.3 =
* Preserve term hierarchy when switching taxonomies. Props Chris Caller.

= 1.1.2 =
* Added 'term_management_tools_term_merged' action hook. Props Amit Gupta.

= 1.1.1 =
* Fixed error notices.
* Added Persian translation.

= 1.1 =
* Added 'Change taxonomy' action.

= 1.0 =
* Initial release.
* [More info](http://scribu.net/wordpress/term-management-tools/tmt-1-0.html).
