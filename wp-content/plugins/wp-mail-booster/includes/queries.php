<?php
/**
* This file is used for fetching data from database.
*
* @author  Tech Banker
* @package wp-mail-booster/includes
* @version 2.0
*/
if(!defined("ABSPATH")) exit;// Exit if accessed directly
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
		if(!function_exists("get_mail_booster_log_data_unserialize"))
		{
			function get_mail_booster_log_data_unserialize($data,$start_date,$end_date)
			{
				$array_details = array();
				foreach($data as $raw_row)
				{
					$unserialize_data = unserialize($raw_row->meta_value);
					$unserialize_data["id"] = $raw_row->id;
					$unserialize_data["meta_id"] = $raw_row->meta_id;
					if($unserialize_data["timestamp"] >=$start_date && $unserialize_data["timestamp"] <= $end_date)
					array_push($array_details,$unserialize_data);
				}
				return $array_details;
			}
		}
		if(!function_exists("get_mail_booster_meta_value"))
		{
			function get_mail_booster_meta_value($meta_key)
			{
				global $wpdb;
				$meta_value = $wpdb->get_var
				(
					$wpdb->prepare
					(
						"SELECT meta_value FROM ".mail_booster_meta().
						" WHERE meta_key=%s",
						$meta_key
					)
				);
				return unserialize($meta_value);
			}
		}
		if(function_exists("get_loaded_extensions"))
		{
			$all_extensions = get_loaded_extensions();
			$required_extensions = array("openssl","sockets","zlib","mcrypt","iconv");
			$extension_not_found = array();
			foreach($required_extensions as $extension)
			{
				if(!in_array($extension,$all_extensions))
				{
				 array_push($extension_not_found,$extension);
				}
			}
		}

		if(isset($_GET["page"]))
		{
			switch(esc_attr($_GET["page"]))
			{
				case "mail_booster_roles_and_capabilities":
					$details_roles_capabilities = get_mail_booster_meta_value("roles_and_capabilities");
					$other_roles_array = $details_roles_capabilities["capabilities"];
				break;

				case "mail_booster_settings":
					$settings_data_array = get_mail_booster_meta_value("settings");
				break;

				case "mail_booster_email_logs":
					$end_date = time() + 86400;
					$start_date = $end_date - 864000;
					$email_logs_data = $wpdb->get_results
					(
						$wpdb->prepare
						(
							"SELECT * FROM ".mail_booster_meta()."
							WHERE meta_key = %s ORDER BY id DESC",
							"email_logs"
						)
					);
					$unserialized_email_logs_data = get_mail_booster_log_data_unserialize($email_logs_data,$start_date,$end_date);
				break;

				case "mail_booster_email_configuration":

					$email_configuration_array = get_mail_booster_meta_value("email_configuration");
					if(!empty($_REQUEST["access_token"]))
					{
						$code = esc_attr($_REQUEST["access_token"]);
						$update_email_configuration_data = get_option("update_email_configuration");
						$mail_booster_auth_host = new mail_booster_auth_host($update_email_configuration_data);
						if($update_email_configuration_data["hostname"] == "smtp.gmail.com")
						{
							$test_secret_key_error = $mail_booster_auth_host->google_authentication_token($code);
							if(isset($test_secret_key_error->error))
							{
								$test_secret_key_error = $test_secret_key_error->error_description;
								break;
							}
						}
						elseif(in_array($update_email_configuration_data["hostname"],$mail_booster_auth_host->yahoo_domains))
						{
							$test_secret_key_error = $mail_booster_auth_host->yahoo_authentication_token($code);
							if(isset($test_secret_key_error->error))
							{
								$test_secret_key_error = $test_secret_key_error->error_description;
								break;
							}
						}
						else
						{
							$test_secret_key_error = $mail_booster_auth_host->microsoft_authentication_token($code);
							if(isset($test_secret_key_error->error))
							{
								$test_secret_key_error = $test_secret_key_error->error_description;
								break;
							}
						}
						$obj_dbHelper_mail_booster = new dbHelper_mail_booster();

						$update_email_configuration_array = array();
						$where = array();
						$where["meta_key"] = "email_configuration";
						$update_email_configuration_array["meta_value"] = serialize($update_email_configuration_data);
						$obj_dbHelper_mail_booster->updateCommand(mail_booster_meta(),$update_email_configuration_array,$where);
						if($update_email_configuration_data["automatic_mail"] == 1)
						{
							$automatically_send_mail = "true";
						}
						else
						{
							$automatically_not_send_mail = "true";
						}
					}
				break;
			}
		}
	}
}
?>