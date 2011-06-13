=== Plugin Name ===
Contributors: citricguy
Donate link: http://www.1mauirealestate.com/tech-updates/wordpress-plugin-redirect-after-comment.html
Tags: comments, redirect, tellafriend, plugin
Requires at least: 2.8
Tested up to: 3.1.3
Stable tag: 2.0.1

Redirects commenters to a predefined URL after comment submission.

== Description ==

The "Redirect After Comment" plugin allows you to automatically redirect your users to a predefined page after they leave a comment on your WordPress blog.

Usage is simple.  Once the plugin has been installed you will need to configure where your commenters should be redirected.

In the WordPress control panel, on the left hand side of the admin panel look in the ‘settings’ section for the heading titled ‘Comment Redirect.’

In the settings you will see two fields:

The first field is the "Enable Plugin?" option.  The plugin is not functional until you check this box.  This allows you to quickly enable and disable this plugin while you’re working on the page you plan to send commenters.

The second field is titled "Enter Redirect URL."  Here is where you will enter the full URL to where you want to send users once they have successfully submitted a comment on your blog.  For example, if you wanted to send all of your commenters to example.com you would simply enter http://www.example.com/ in the box.

You can also enter "[last]" in the "Enter Redirect URL" box to send users back to the page they originally commented from.

If you already have a page on your site that you would like to send users to, simply copy and paste that URL into the "Enter Redirect URL" field.

Ideas for redirects:
1. A "Tell-a-friend" page.
2. A survey.
3. Your Facebook FanPage/Profile
4. A Sales Page or A Special Offer

*Note: PHP 5.2.0 or greater required for URL verification.*

== Installation ==

1. Upload `msmc_redirect.php` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Configure settings in control panel.

== Frequently Asked Questions ==

= How can I help? =

Contact me at citricguy@gmail.com

== Screenshots ==

1. Plugin Options

== Changelog ==

= 2.1.0  =
* Fixed license
* Added the ability to redirect users back to the page they originally commented from. (Using "[last]" in the URL field.)
* Fixed HTTP vs HTTPS detection while using [last]
* No longer force lower case url's (sorry IIS uers)
* As always, please report any bugs directly to citricguy@gmail.com!  Mahalo!

= 2.0.1  =
* Readme.txt updates

= 2.0  =
* Added Internationalization Support

= 1.1 =
* License and Readme.txt edits.  No Feature Updates

= 1.0 =
* Initial Release

== Upgrade Notice ==

= 2.0 =
* Still need language files.

= 1.1 =
* No feature changes. Update not required.

= 1.0 =
* Initial Release

== Other Information ==

The MSMC - Redirect After Comment plugin was developed by Josh Sommers, and is provided with out warranty under the GPLv3 License. More info and other plugins at: http://www.1mauirealestate.com/tech-updates/wordpress-plugin-redirect-after-comment.html

Josh Sommers  (email : citricguy@gmail.com)

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA