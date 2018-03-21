# [Floating Buttons for MediaValet](https://www.mediavalet.com/)

Contributors: MediaValet<br>
Donate link: https://www.mediavalet.com/ <br>
Tags: buttons, font awesome<br>
Requires at least: 3.0.1<br>
Tested up to: 4.9.4<br>
Stable tag: 4.3<br>
License: GPLv2 or later<br>
License URI: http://www.gnu.org/licenses/gpl-2.0.html<br>
<br>
Simple Frontend plugin to display floating button icons on the left side of MediaValet's website.

## Description

Media Valet's Floating Buttons is a simple front end plugin created specifically for displaying floating icons on the lefthand side of MediaValet's website. The plugin includes an integration with Font Awesome 4.7, used for the icons. This serves a dual purpose of font awesome icon integrations throughout the rest of the WordPress website. No shortcodes are currently implemented, icons will need to be rendered via HTML, for a full list visit: https://fontawesome.com/icons <br>
<br>
By default, the plugin will display two icons, one that links to MediaValet's Request a Demo page, the other to MediaValet's ROI Calculator page.

### Plugin's Current State:

*   The current version of the plugin does not allow any modifications of the icons through WordPress Admin Panel. All icon modifications must be done
*   As of now, adding additional icons must be done through the `mv-floating-buttons.php` file. Modifications can be made directly into the `displayButtons()` function. The function injects HTML through the `echo` statement, the class tag for building an icon is named `floatButton`.
*   This plugin comes with a JQuery integration setup for use with the intent of a future integration of toggling the icons based on click events.
*   A backend integration is intended for future development, functions are included for adding a "WordPress Custom Post Type", that will be used as Icons.


## Installation

Note: It is required that your theme uses the `wp_footer()` function in its template.

### WordPress Installation

1. Download the plugin package as a ".zip".
2. Login to MediaValet's WordPress Dashboard.
3. In the "Plugins" page, click "Add New"
4. "Upload Plugin" and upload the ".zip" file.
5. Activate the plugin "Media Valet Floating Buttons" from the plugin list.
6. The two default icons should automatically appear if the `wp_footer()` function is included in your theme template


### FTP Installation

1. Upload `mv-floating-buttons.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php wp_footer()?>` function in your template if not automatically included



## Changelog

### 1.0.0
* Initial build of the plugin.
* Includes two icons automatically linked to the Request a Demo and ROI Calculator pages


## Developers Notes

### Important Files:
* `mv-floating-buttons.php` - Contains plugin functions and core code for building a floating ICON
* `class-mv-floating-buttons-public.php` - Used for enqueuing Custom CSS files, Font Awesome Integration , and JavaScript integration to the Frontend
* `mv-floating-buttons-public.css` - For styling the floating buttons
* `mv-floating-buttons-public.js` - For including custom JavaScript

### Functions
* `displayButtons()` - Prints the floating buttons onto page
* `wp_footer()` - required by WordPress theme template, plugin injects button structure through this function

### Classes
* `floatButton` - container for constructing a button. Contains both the icon and text
* `float-text` - contains text for an icon
* `float-icon` - contains font awesome icon
* `fb-btn#` - Replace # with the button number, used for directly targeting CSS changes


### Author  Description

This plugin was written specifically for MediaValet's new website, the choice of a plugin is for easy installation when the new website is launched, without the need of a developer. As of now, further modifications such as styling or functional changes or additions require coding modifications. However this plugin package includes integrations for JS additions and an "admin" structure implementations with the intent for additional updates for allowing WordPress authors to modify the floating icons in the future.
