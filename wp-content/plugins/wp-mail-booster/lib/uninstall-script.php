<?php
/**
* This file contains code for remove tables and options at uninstall.
*
* @author  Tech Banker
* @package wp-mail-booster/lib
* @version 2.0
*/

if(!defined("ABSPATH")) exit; // Exit if accessed directly
if(!is_user_logged_in())
{
	return;
}
else
{
	if(!current_user_can("manage_options"))
	{
		return;
	}
	else
	{
		// Drop Tables
		if(count($wpdb->get_var("SHOW TABLES LIKE '" . mail_booster_meta() . "'")) != 0 && count($wpdb->get_var("SHOW TABLES LIKE '" . mail_booster() . "'")) != 0)
		{
			global $wpdb;
			$settings_remove_tables = $wpdb->get_var
			(
				$wpdb->prepare
				(
					"SELECT meta_value FROM ".mail_booster_meta()."
					WHERE meta_key = %s",
					"settings"
				)
			);
			$settings_remove_tables_unserialize = unserialize($settings_remove_tables);

			if($settings_remove_tables_unserialize["remove_tables_at_uninstall"] == "enable")
			{
				$wpdb->query("DROP TABLE " .mail_booster());
				$wpdb->query("DROP TABLE ".mail_booster_meta());

				// Delete options
				delete_option("mail-booster-version-number");
			}

			// Unschedule schedulers
			if(wp_next_scheduled("automatic_updates_mail_booster"))
			{
				wp_clear_scheduled_hook("automatic_updates_mail_booster");
			}
		}
	}
}
?>
