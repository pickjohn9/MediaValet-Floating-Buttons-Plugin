# [Floating Buttons for MediaValet](https://www.mediavalet.com/)

Contributors: MediaValet<br>
Company Website: https://www.mediavalet.com/ <br>
Tags: buttons, font awesome, custom image<br>
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
Note: Now icons are to be uploaded by the User as transparent PNGs sized at 115 x 115px. Option to swap between PNGs and font awesome will are in the backlog.
<br>
By default, the plugin will display two icons, one that links to MediaValet's Request a Demo page, the other to MediaValet's ROI Calculator page.

### Plugin's Current State:

*   A backend has been integrated to the WordPress admin panel labeled  "Floating Button Options". As of now this allows you to change the label, color, icon image, and link for the first TWO icons, any additional icons need to be coded using the built PHP functions in the `mv-floating-buttons.php` file.
*   As of now, adding additional icons must be done through the `mv-floating-buttons.php` file. Modifications can be made directly into the `displayButtons()` function. The function injects HTML through the `echo` statement, the class tag for building an icon is named `floatButton`.
*   To add an additional icons, use the function `constructButton()`, and input your buttons, link, color, label, and image filepath as parameters.
*   This plugin comes with a JQuery integration setup for toggle click events.



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

### 1.2.0
* Integrated plugin options to the WordPress admin panel labeled  "Floating Button Options". Allows the ability to change the label, color, icon image, and link for the first TWO icons without modifying the plugin PHP files.

### 1.1.0
* Integrated JQuery click events for toggling the on screen icons
* Corrected Mobile issues - Icons now hide on devices that 600px or smaller
* Corrected Issue with FireFox and Safari alignments

### 1.0.0
* Initial build of the plugin.
* Includes two icons automatically linked to the Request a Demo and ROI Calculator pages


## Developers Notes

### Important Files
* `mv-floating-buttons.php` - Contains plugin functions and core code for building a floating icon
* `class-mv-floating-buttons-public.php` - Used for enqueuing Custom CSS files, Font Awesome Integration , and JavaScript integration to the Frontend
* `mv-floating-buttons-public.css` - For styling the floating buttons
* `mv-floating-buttons-public.js` - For including custom JavaScript
* `mv-floating-buttons-admin.css` - For styling the plugin options page on the WordPress admin
* `mv-floating-buttons-admin.js` - For jQuery integrations in the plugin options page, such as the color wheel and image upload option.

### Functions
* `displayButtons()` - Prints the floating buttons onto page
* `constructButton()` - Returns an HTML string that assembles a fully icons built, constructed via the parameters provided. Use this to create additional icons.   
* `wp_footer()` - required by WordPress theme template, plugin injects button structure through this function

### Classes
* `floatButton` - container for constructing a button. Contains both the icon and text
* `float-text` - container for the text label for a button
* `float-icon` - container for PNG or font awesome icon


### Author  Description

This plugin was written specifically for MediaValet's new website, the choice of a plugin is for easy installation when the new website is launched, without the need of a developer. As of now, the plugin options are limited to two icons across all pages. Further modifications such as styling or functional changes or additions require coding modifications.
