<?php
/**
* This file is used for creating sidebar menu.
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
	$access_granted = false;
	foreach($user_role_permission as $permission)
	{
		if(current_user_can($permission))
		{
			$access_granted = true;
			break;
		}
	}
	if(!$access_granted)
	{
		return;
	}
	else
	{
		$flag = 0;

		$role_capabilities = $wpdb->get_var
		(
			$wpdb->prepare
			(
				"SELECT meta_value from ".mail_booster_meta()."
				WHERE meta_key = %s",
				"roles_and_capabilities"
			)
		);

		$roles_and_capabilities_unserialized_data = unserialize($role_capabilities);
		$capabilities = explode(",",$roles_and_capabilities_unserialized_data["roles_and_capabilities"]);

		if(is_super_admin())
		{
			$mb_role = "administrator";
		}
		else
		{
			$mb_role = check_user_roles_mail_booster($current_user);
		}
		switch($mb_role)
		{
			case "administrator":
				$privileges = "administrator_privileges";
				$flag = $capabilities[0];
			break;

			case "author":
				$privileges = "author_privileges";
				$flag = $capabilities[1];
			break;

			case "editor":
				$privileges = "editor_privileges";
				$flag = $capabilities[2];
			break;

			case "contributor":
				$privileges = "contributor_privileges";
				$flag = $capabilities[3];
			break;

			case "subscriber":
				$privileges = "subscriber_privileges";
				$flag = $capabilities[4];
			break;

			default:
				$privileges = "other_roles_privileges";
				$flag = $capabilities[5];
			break;
		}

		foreach($roles_and_capabilities_unserialized_data as $key=>$value)
		{
			if($privileges == $key)
			{
				$privileges_value = $value;
				break;
			}
		}

		$full_control = explode(",",$privileges_value);
		if(!defined("full_control")) define("full_control","$full_control[0]");
		if(!defined("email_configuration_mail_booster")) define("email_configuration_mail_booster","$full_control[1]");
		if(!defined("email_logs_mail_booster")) define("email_logs_mail_booster","$full_control[2]");
		if(!defined("settings_mail_booster")) define("settings_mail_booster","$full_control[3]");
		if(!defined("roles_and_capabilities_mail_booster")) define("roles_and_capabilities_mail_booster","$full_control[4]");
		if(!defined("system_information_mail_booster")) define("system_information_mail_booster","$full_control[5]");
		if(!defined("error_logs_mail_booster")) define("error_logs_mail_booster","$full_control[6]");
		if($flag == "1")
		{
			global $wp_version;


			add_menu_page($wp_mail_booster,$wp_mail_booster,"read","mail_booster_email_configuration","",plugins_url("assets/global/img/icon.png",dirname(__FILE__)));
			add_submenu_page("mail_booster_email_configuration",$mb_email_configuration,$mb_email_configuration,"read","mail_booster_email_configuration","mail_booster_email_configuration");
			add_submenu_page("mail_booster_email_configuration",$mb_test_email,$mb_test_email,"read","mail_booster_test_email","mail_booster_test_email");
			add_submenu_page("mail_booster_email_configuration",$mb_email_logs,$mb_email_logs,"read","mail_booster_email_logs","mail_booster_email_logs");
			add_submenu_page("mail_booster_email_configuration",$mb_settings,$mb_settings,"read","mail_booster_settings","mail_booster_settings");
			add_submenu_page("mail_booster_email_configuration",$mb_roles_and_capabilities,$mb_roles_and_capabilities,"read","mail_booster_roles_and_capabilities","mail_booster_roles_and_capabilities");
			add_submenu_page("mail_booster_email_configuration",$mb_feedbacks,$mb_feedbacks,"read","mail_booster_feedbacks","mail_booster_feedbacks");
			add_submenu_page("mail_booster_email_configuration",$mb_system_information,$mb_system_information,"read","mail_booster_system_information","mail_booster_system_information");
			add_submenu_page("mail_booster_email_configuration",$mb_error_logs,$mb_error_logs,"read","mail_booster_error_logs","mail_booster_error_logs");
			add_submenu_page("mail_booster_email_configuration",$mb_premium_edition_label,$mb_premium_edition_label,"read","mail_booster_premium_editions","mail_booster_premium_editions");

		}

		/*
	Function Name: mail_booster_error_logs
	Parameters: No
	Description: This function is used for creating mail_booster_error_logs menu.
	Created On: 17-01-2017 12:27
	Created By: Tech Banker Team
	*/

	if(!function_exists("mail_booster_error_logs"))
	{
		function mail_booster_error_logs()
		{
			global $wpdb;
			$user_role_permission = get_users_capabilities_mail_booster();
			if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
			{
				include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
			}
			if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
			{
				include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
			}
			if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
			{
				include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
			}
			if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
			{
				include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
			}
			if(file_exists(MAIL_BOOSTER_DIR_PATH."views/error-logs/error-logs.php"))
			{
				include_once MAIL_BOOSTER_DIR_PATH."views/error-logs/error-logs.php";
			}
			if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
			{
				include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
			}
		}
	}

		/*
		Function Name: mail_booster_email_configuration
		Parameters: No
		Description: This function is used to create mb_email_configuration menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_email_configuration"))
		{
			function mail_booster_email_configuration()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/email-configuration/email-configuration.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/email-configuration/email-configuration.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mail_booster_test_email
		Parameters: No
		Description: This function is used to create mail_booster_test_email menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_test_email"))
		{
			function mail_booster_test_email()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/test-email/test-email.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/test-email/test-email.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mail_booster_email_logs
		Parameters: No
		Description: This function is used to create mb_email_logs menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_email_logs"))
		{
			function mail_booster_email_logs()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/email-logs/email-logs.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/email-logs/email-logs.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mail_booster_settings
		Parameters: No
		Description: This function is used to create mb_settings menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_settings"))
		{
			function mail_booster_settings()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/settings/settings.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/settings/settings.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}


		/*
		Function Name: mail_booster_roles_and_capabilities
		Parameters: No
		Description: This function is used to create mb_roles_and_capabilities menu.
		Created On: 15-06-2016 12:59
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_roles_and_capabilities"))
		{
			function mail_booster_roles_and_capabilities()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/roles-and-capabilities/roles-and-capabilities.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/roles-and-capabilities/roles-and-capabilities.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mail_booster_feedbacks
		Parameters: No
		Description: This function is used to create mb_feedbacks menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_feedbacks"))
		{
			function mail_booster_feedbacks()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/feedbacks/feedbacks.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/feedbacks/feedbacks.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mail_booster_system_information
		Parameters: No
		Description: This function is used to create mb_system_information menu.
		Created On: 15-06-2016 02:29
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_system_information"))
		{
			function mail_booster_system_information()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/system-information/system-information.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/system-information/system-information.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}
		/*
		Function Name: mail_booster_premium_editions
		Parameter: No
		Description: This Function is used for Premium Editions
		Created On: 13-08-2016 09:41
		Created By: Tech Banker Team
		*/

		if(!function_exists("mail_booster_premium_editions"))
		{
			function mail_booster_premium_editions()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_booster();
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BOOSTER_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."views/premium-editions/premium-editions.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."views/premium-editions/premium-editions.php";
				}
				if(file_exists(MAIL_BOOSTER_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BOOSTER_DIR_PATH."includes/footer.php";
				}
			}
		}
	}
}
?>
