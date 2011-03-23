<?php
/*
  Plugin Name: MSMC - Redirect After Comment
  Plugin URI: http://www.1mauirealestate.com/tech-updates/wordpress-plugin-redirect-after-comment.html
  Description: Redirects commenters to defined URL after comment submission
  Author: Josh Sommers
  Version: 1.1
  Author URI: http://www.mainstreetmarketingcommunity.com
 */

/*  Copyright 2011  Josh Sommers  (Email : citricguy@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/* Installation and Removal */
register_activation_hook(__FILE__, 'MSMC_redirect_install');
register_deactivation_hook(__FILE__, 'MSMC_redirect_remove');

function MSMC_redirect_install() {
    add_option("MSMC_redirect_settings", array("redirect_to" => "http://" . $_SERVER['HTTP_HOST'], "enabled" => ''), '', 'yes');
}

function MSMC_redirect_remove() {
    delete_option('MSMC_redirect_settings');
}

/* Redirect Code */
$settings = get_option('MSMC_redirect_settings');
if ($settings['enabled'] != '') {
    add_action('comment_post_redirect', 'msmc_do_comment_redirect');
}

function msmc_do_comment_redirect() {
    $settings = get_option('MSMC_redirect_settings');
    return $settings['redirect_to'];
}

/* Administration */
add_action('admin_menu', 'my_first_admin_menu');

function my_first_admin_menu() {
    add_options_page('MSMC Comment Redirect Options', 'Comment Redirect', 'manage_options', 'msmc-comment-redirect', 'msmc_comment_redirect_plugin_page');
}

function msmc_comment_redirect_plugin_page() {
    $settings = get_option('MSMC_redirect_settings');

    if ($_REQUEST['action']) {
        // Defaults
        $update_array = array("redirect_to" => "http://" . $_SERVER['HTTP_HOST'], "enabled" => '');
        $do_update = TRUE;
        // Enable Plugin
        if (isset($_REQUEST['MSMC_redirect_enabled'])) {
            $update_array['enabled'] = ' checked="checked" ';
            $settings['enabled'] = ' checked="checked" ';
        } else {
            $settings['enabled'] = '';
        }

        // Set Redirect URL
        if (isset($_REQUEST['MSMC_redirect_location'])) {
            // Requires PHP 5.2.0 or newer
            if (filter_var($_REQUEST['MSMC_redirect_location'], FILTER_VALIDATE_URL)) {
                $update_array['redirect_to'] = $_REQUEST['MSMC_redirect_location'];
                $settings['redirect_to'] = $_REQUEST['MSMC_redirect_location'];
            } else {
                $do_update = FALSE;
                $settings['redirect_to'] = $_REQUEST['MSMC_redirect_location'];
                $result_notice = '<div style="height: 20px; width: 500px; background-color: #FF6699; padding: 10px; font-weight: bold;" >Please Fix The Errors Below</div>';
                $show_url_warning = '<span style="color: red;">Please Enter A Valid URL</span><br />';
            }
        }

        // Update Settings
        if ($do_update) {
            update_option('MSMC_redirect_settings', $update_array);
            $result_notice = '<div style="height: 20px; width: 500px; background-color: #FFFBCC; padding: 10px; font-weight: bold;" >Updated Successfully</div>';
        }
    }
?>
    <div class="wrap">
        <h2>MSMC - Redirect After Comment</h2>
    <?php echo $result_notice; ?>
    <form method="post" action="" id="feedflare-settings">
        <?php //wp_nonce_field('update-options');  ?>
        <br />
        <input type="checkbox" name="MSMC_redirect_enabled" value="checked" <?php echo $settings['enabled']; ?> /> <strong>Enable This Plugin</strong><br /><br />
        <strong>Enter Redirect URL:</strong><br />
        <span style="font-style: italic; color: #B2B2B2;">This is where users will be redirected after commenting.</span><br />
        <?php echo $show_url_warning; ?>
        <input type="text" name="MSMC_redirect_location" size="60" id="MSMC_redirect_location"
               value="<?php echo $settings['redirect_to']; ?>" /><br />
        <p>(ex. http://www.example.com/)</p>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="MSMC_redirect_settings" />
        <p>
            <input type="submit" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>
<?php
    }
?>