﻿<?php
/**
* This file is used for translation strings.
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
		// Disclaimers
		$message_premium_edition = __("This feature is available only in Premium Editions! <br> Kindly Purchase to unlock it!", "wp-mail-booster");

		//wizard
		$mb_wizard_basic_info = __("Basic Info","wp-mail-booster");
		$mb_wizard_account_setup = __("Account Setup","wp-mail-booster");
		$mb_wizard_confirm = __("Confirm","wp-mail-booster");

		// Menus
		$wp_mail_booster = __("Mail Booster","wp-mail-booster");
		$mb_email_configuration = __("Email Configuration","wp-mail-booster");
		$mb_email_logs = __("Email Logs","wp-mail-booster");
		$mb_email_log_details = __("Email Log Details","wp-mail-booster");
		$mb_settings = __("Plugin Settings","wp-mail-booster");
		$mb_feedbacks = __("Feedbacks","wp-mail-booster");
		$mb_roles_and_capabilities = __("Roles & Capabilities","wp-mail-booster");
		$mb_system_information = __("System Information","wp-mail-booster");

		// Footer
		$mb_success = __("Success!","wp-mail-booster");
		$mb_update_email_configuration = __("Email Configuration has been updated Successfully","wp-mail-booster");
		$mb_update_feedbacks = __("Your Feedback has been sent Successfully","wp-mail-booster");
		$mb_language_translate_request = __("Your request email has been sent Successfully","wp-mail-booster");
		$mb_update_roles_and_capabilities = __("Roles & Capabilities have been updated Successfully","wp-mail-booster");
		$mb_test_email_sent = __("Test Email was sent Successfully!","wp-mail-booster");
		$mb_test_email_not_send = __("Test Email was not sent!","wp-mail-booster");
		$mb_update_settings = __("Plugin Settings have been updated Successfully","wp-mail-booster");
		$mb_choose_action = __("Please choose an Action from Dropdown!","wp-mail-booster");
		$mb_choose_record_to_delete = __("Please choose at least 1 record to delete!","wp-mail-booster");
		$mb_confirm_bulk_delete = __("Are you sure you want to delete Email Logs?","wp-mail-booster");
		$mb_bulk_delete_email_logs =__("Selected Logs have been deleted Successfully","wp-mail-booster");
		$mb_confirm_single_delete = __("Are you sure you want to delete Email Log?","wp-mail-booster");
		$mb_delete_log = __("Email Log has been deleted Successfully","wp-mail-booster");
		$oauth_not_supported = __("The OAuth is not supported by providing SMTP Host, kindly provide username and password","wp-mail-booster");
		$mb_invalid_secret_key = __("Invalid Secret Key. Please rectify and try again!","wp-mail-booster");
		$mb_premium_edition_label = __("Premium Editions","wp-mail-booster");

		// Common Variables
		$mb_mail_booster_title = __("Mail Booster","wp-mail-booster");
		$mb_status_sent = __("Sent","wp-mail-booster");
		$mb_status_not_sent = __("Not Sent","wp-mail-booster");
		$mb_important_disclaimer = __("Important Disclaimer!","wp-mail-booster");
		$mb_user_access_message = __("You don't have Sufficient Access to this Page. Kindly contact the Administrator for more Privileges","wp-mail-booster");
		$mb_enable = __("Enable","wp-mail-booster");
		$mb_disable = __("Disable","wp-mail-booster");
		$mb_override = __("Override","wp-mail-booster");
		$mb_dont_override = __("Don't Override","wp-mail-booster");
		$mb_save_changes = __("Save Settings","wp-mail-booster");
		$mb_subject = __("Subject","wp-mail-booster");
		$mb_next_step = __("Next Step","wp-mail-booster");
		$mb_previous_step = __("Previous Step","wp-mail-booster");
		$mb_settings_link = __("Settings","wp-mail-booster");
		$mb_not_available = __("Not available","wp-mail-booster");
		$mb_contact_to_host = __("The following php extensions are not found on your server or are currently disabled. These might create few problems in configuring Mail Booster. Please contact your WebHost to setup these extensions on your server.","wp-mail-booster");

		// Email Configuration
		$mb_email_configuration_cc_label = __("Cc","wp-mail-booster");
		$mb_email_configuration_bcc_label = __("Bcc","wp-mail-booster");
		$mb_email_configuration_cc_email_address_tooltip = __("Please provide valid Cc Email Address","wp-mail-booster");
		$mb_email_configuration_bcc_email_address_tooltip = __("Please provide valid Bcc Email Address","wp-mail-booster");
		$mb_email_configuration_cc_email_placeholder = __("Please provide Cc Email","wp-mail-booster");
		$mb_email_configuration_bcc_email_placeholder = __("Please provide Bcc Email","wp-mail-booster");
		$mb_email_configuration_mailer_settings_tab = __("Mailer Settings", "wp-mail-booster");
		$mb_email_configuration_from_name = __("From Name","wp-mail-booster");
		$mb_email_configuration_from_name_tooltip = __("From Name is the inbox field that tells your recipient who sent the messages. If you would like to override the pre-configured From Name, then you would need to insert the name in the inbox field", "wp-mail-booster");
		$mb_email_configuration_from_name_placeholder = __("Please provide From Name", "wp-mail-booster");
		$mb_email_configuration_from_email = __("From Email","wp-mail-booster");
		$mb_email_address_tooltip = __("From Email is the inbox field that tells your recipient from which Email Address the messages are coming. If you would like to override the pre-configured From Email, then you would need to insert an Email Address in the inbox field", "wp-mail-booster");
		$mb_email_configuration_from_email_placeholder = __("Please provide From Email Address", "wp-mail-booster");
		$mb_email_configuration_mailer_type = __("Mailer Type","wp-mail-booster");
		$mb_email_configuration_mailer_type_tooltip = __("This field provides you an ability to choose a specific option for Mailer Type. If you would like to send an Email via SMTP mailer, you would need to select Send Email via SMTP from the drop down or you could use PHP mail () Function", "wp-mail-booster");
		$mb_email_configuration_send_email_via_smtp = __("Send Email via SMTP","wp-mail-booster");
		$mb_email_configuration_use_php_mail_function = __("Use The PHP mail() Function","wp-mail-booster");
		$mb_email_configuration_smtp_host = __("SMTP Host","wp-mail-booster");
		$mb_email_configuration_smtp_host_tooltip = __("If you would like to send an Email via different host, you would need to insert that specific host name like smtp.gmail.com in the inbox field", "wp-mail-booster");
		$mb_email_configuration_smtp_host_placeholder = __("Please provide SMTP Host", "wp-mail-booster");
		$mb_email_configuration_smtp_port = __("SMTP Port","wp-mail-booster");
		$mb_email_configuration_smtp_port_tooltip = __("This inbox field is specified to provide a valid SMTP Port for authentication", "wp-mail-booster");
		$mb_email_configuration_smtp_port_placeholder = __("Please provide SMTP Port", "wp-mail-booster");
		$mb_email_configuration_encryption = __("Encryption","wp-mail-booster");
		$mb_email_configuration_encryption_tooltip = __("It provides you an ability to choose a specific option for Encryption. If you would like to send an Email with TLS encryption, you would need to select Use TLS Encryption from the drop down or you could use SSL Encryption. For that you would need to select Use SSL Encryption from the drop down. If you would like to send an Email without encryption, you would need to select No Encryption from the drop down", "wp-mail-booster");
		$mb_email_configuration_no_encryption = __("No Encryption","wp-mail-booster");
		$mb_email_configuration_use_ssl_encryption = __("Use SSL Encryption","wp-mail-booster");
		$mb_email_configuration_use_tls_encryption = __("Use TLS Encryption","wp-mail-booster");
		$mb_email_configuration_authentication = __("Authentication","wp-mail-booster");
		$mb_email_configuration_authentication_tooltip = __("This inbox field allows you to choose an appropriate option for authentication. It provides you the Two-way authentication factor; If you would like to authenticate yourself via Username and Password, you would need to select Use Username and Password from the drop down. You can also authenticate by an OAuth 2.0 protocol, which requires Client Id and Secret Key, for that you would need to select Use OAuth (Client ID and Secret Key) from the drop down. You can easily get Client Id and Secret Key from respective SMTP Server Developers section", "wp-mail-booster");
		$mb_email_configuration_use_smtp_authentication = __("Use SMTP Authentication","wp-mail-booster");
		$mb_email_configuration_donot_use_authentication = __("Don't Use SMTP Authentication","wp-mail-booster");
		$mb_email_configuration_test_email_address = __("Test Email Address","wp-mail-booster");
		$mb_email_configuration_test_email_address_tooltip = __("In this field, you would need to provide a valid Email Address in the inbox field on which you would like to receive Test email", "wp-mail-booster");
		$mb_email_configuration_test_email_address_placeholder = __("Please provide Test Email Address", "wp-mail-booster");
		$mb_email_configuration_subject_test_tooltip = __("In this field, you would need to provide a subject for Test Email", "wp-mail-booster");
		$mb_email_configuration_subject_test_placeholder = __("Please provide Subject", "wp-mail-booster");
		$mb_email_configuration_content = __("Email Content","wp-mail-booster");
		$mb_email_configuration_content_tooltip = __("In this field, you would need to provide the content for Test Email", "wp-mail-booster");
		$mb_email_configuration_send_test_email = __("Send Test Email", "wp-mail-booster");
		$mb_email_configuration_smtp_debugging_output = __("SMTP Debugging Output", "wp-mail-booster");
		$mb_email_configuration_send_test_email_textarea = __("Checking your settings", "wp-mail-booster");
		$mb_email_configuration_result = __("Result", "wp-mail-booster");
		$mb_email_configuration_send_another_test_email = __("Send Another Test Email", "wp-mail-booster");
		$mb_email_configuration_enable_from_name = __("From Name Configuration","wp-mail-booster");
		$mb_email_configuration_enable_from_name_tooltip = __("If you would like to override the pre-configured name which will be used while sending Emails, then you would need to choose Override from the drop down and vice-versa","wp-mail-booster");
		$mb_email_configuration_enable_from_email = __("From Email Configuration","wp-mail-booster");
		$mb_email_configuration_enable_from_email_tooltip = __("If you would like to override your pre-configured Email Address which will be used while sending Emails, then you would need to choose Override from the drop down and vice-versa","wp-mail-booster");
		$mb_email_configuration_username = __("Username","wp-mail-booster");
		$mb_email_configuration_username_tooltip = __("In this field, you would need to provide a username to authenticate your SMTP details","wp-mail-booster");
		$mb_email_configuration_username_placeholder = __("Please provide username","wp-mail-booster");
		$mb_email_configuration_password = __("Password","wp-mail-booster");
		$mb_email_configuration_password_tooltip = __("In this field, you would need to provide a password to authenticate your SMTP details","wp-mail-booster");
		$mb_email_configuration_password_placeholder = __("Please provide password","wp-mail-booster");
		$mb_email_configuration_redirect_uri = __("Redirect URI","wp-mail-booster");
		$mb_email_configuration_redirect_uri_tooltip = __("Please copy this Redirect URI and Paste into Redirect URI field when creating your app","wp-mail-booster");
		$mb_email_configuration_use_oauth = __("Use OAuth (Client Id and Secret Key required)","wp-mail-booster");
		$mb_email_configuration_use_plain_authentication = __("Plain Authentication","wp-mail-booster");
		$mb_email_configuration_cram_md5 = __("Cram-MD5","wp-mail-booster");
		$mb_email_configuration_login = __("Login","wp-mail-booster");
		$mb_email_configuration_client_id = __("Client Id","wp-mail-booster");
		$mb_email_configuration_client_secret = __("Secret Key","wp-mail-booster");
		$mb_email_configuration_client_id_tooltip = __("Please provide valid Client Id issued by your SMTP Host","wp-mail-booster");
		$mb_email_configuration_client_secret_tooltip = __("Please provide valid Secret Key issued by your SMTP Host","wp-mail-booster");
		$mb_email_configuration_client_id_placeholder = __("Please provide Client Id","wp-mail-booster");
		$mb_email_configuration_client_secret_placeholder = __("Please provide Secret Key","wp-mail-booster");
		$mb_email_configuration_tick_for_sent_mail = __("Yes, automatically send a Test Email upon clicking on the Next Step Button to verify settings","wp-mail-booster");
		$mb_email_configuration_email_address = __("Email Address","wp-mail-booster");
		$mb_email_configuration_email_address_tooltip = __("In this field, you would need to add a valid Email Address in the inbox field from which you would like to send Emails","wp-mail-booster");
		$mb_email_configuration_email_address_placeholder = __("Please provide valid Email Address","wp-mail-booster");
		$mb_email_configuration_reply_to = __("Reply To","wp-mail-booster");
		$mb_email_configuration_reply_to_tooltip = __("In this field, you would need to add a valid Email Address that is automatically inserted into the Reply To field when a user replies to an email message","wp-mail-booster");
		$mb_email_configuration_reply_to_placeholder = __("Please provide Reply To Email Address","wp-mail-booster");
		$mb_email_configuration_get_google_credentials = __("Get Google Client Id and Secret Key","wp-mail-booster");
		$mb_email_configuration_get_microsoft_credentials = __("Get Microsoft Client Id and Secret Key","wp-mail-booster");
		$mb_email_configuration_get_yahoo_credentials = __("Get Yahoo Client Id and Secret Key","wp-mail-booster");

		// Email Logs
		$mb_start_date_title = __("Start Date","wp-mail-booster");
		$mb_start_date_placeholder = __("Please provide Start Date","wp-mail-booster");
		$mb_start_date_tooltip = __("This field shows starting date of Email Logs","wp-mail-booster");
		$mb_end_date_title = __("End Date","wp-mail-booster");
		$mb_end_date_placeholder = __("Please provide End Date","wp-mail-booster");
		$mb_end_date_tooltip = __("This field shows ending date of Email Logs","wp-mail-booster");
		$mb_submit = __("Submit","wp-mail-booster");
		$mb_email_logs_bulk_action = __("Bulk Action","wp-mail-booster");
		$mb_email_logs_delete = __("Delete","wp-mail-booster");
		$mb_email_logs_apply = __("Apply","wp-mail-booster");
		$mb_email_logs_email_to = __("Email To","wp-mail-booster");
		$mb_email_logs_actions = __("Action","wp-mail-booster");
		$mb_email_logs_show_details = __("Show Details","wp-mail-booster");
		$mb_email_logs_email_details = __("Email Details","wp-mail-booster");
		$mb_email_debugging_output = __("Email Debugging output","wp-mail-booster");
		$mb_email_logs_close = __("Close","wp-mail-booster");
		$mb_email_logs_debugging_output = __("Debugging Output","wp-mail-booster");
		$mb_email_logs_show_outputs = __("Show Debugging Output","wp-mail-booster");
		$mb_email_sent_to = __("Email Sent To","wp-mail-booster");
		$mb_date_time = __("Date/Time","wp-mail-booster");
		$mb_email_logs_status = __("Status","wp-mail-booster");
		$mb_from = __("From","wp-mail-booster");
		$mb_back_to_email_logs = __("Back to Email Logs","wp-mail-booster");

		// Settings
		$mb_settings_automatic_plugin_update = __("Automatic Plugin Updates", "wp-mail-booster");
		$mb_settings_automatic_plugin_update_tooltip = __("Please choose a specific option whether to allow Automatic Plugin Updates", "wp-mail-booster");
		$mb_settings_debug_mode = __("Debug Mode","wp-mail-booster");
		$mb_settings_debug_mode_tooltip = __("Please choose a specific option for Debug Mode","wp-mail-booster");
		$mb_remove_tables_title = __("Remove Tables at Uninstall","wp-mail-booster");
		$mb_remove_tables_tooltip = __("Please choose a specific option whether to allow Remove Tables at Uninstall","wp-mail-booster");
		$mb_monitoring_email_log_title = __("Monitoring Email Logs","wp-mail-booster");
		$mb_monitoring_email_log_tooltip = __("This field is used to allow Email Logs to monitor or not","wp-mail-booster");

		// Roles and Capabilities
		$mb_roles_capabilities_show_menu = __("Show Mail Booster Menu","wp-mail-booster");
		$mb_roles_capabilities_show_menu_tooltip = __("Please choose a specific role who can see Sidebar Menu","wp-mail-booster");
		$mb_roles_capabilities_administrator = __("Administrator","wp-mail-booster");
		$mb_roles_capabilities_author = __("Author","wp-mail-booster");
		$mb_roles_capabilities_editor = __("Editor","wp-mail-booster");
		$mb_roles_capabilities_contributor = __("Contributor","wp-mail-booster");
		$mb_roles_capabilities_subscriber = __("Subscriber","wp-mail-booster");
		$mb_roles_capabilities_others = __("Others","wp-mail-booster");
		$mb_roles_capabilities_topbar_menu = __("Show Mail Booster Top Bar Menu","wp-mail-booster");
		$mb_roles_capabilities_topbar_menu_tooltip = __("Please choose a specific option from Mail Booster Top Bar Menu", "wp-mail-booster");
		$mb_roles_capabilities_administrator_role =  __("An Administrator Role can do the following ","wp-mail-booster");
		$mb_roles_capabilities_administrator_role_tooltip = __("Please choose specific page available for the Administrator Access", "wp-mail-booster");
		$mb_roles_capabilities_full_control = __("Full Control","wp-mail-booster");
		$mb_roles_capabilities_author_role = __("An Author Role can do the following ","wp-mail-booster");
		$mb_roles_capabilities_author_role_tooltip = __("Please choose specific page available for Author Access", "wp-mail-booster");
		$mb_roles_capabilities_editor_role = __("An Editor Role can do the following ","wp-mail-booster");
		$mb_roles_capabilities_editor_role_tooltip = __("Please choose specific page available for Editor Access", "wp-mail-booster");
		$mb_roles_capabilities_contributor_role = __("A Contributor Role can do the following ","wp-mail-booster");
		$mb_roles_capabilities_contributor_role_tooltip = __("Please choose specific page available for Contributor Access", "wp-mail-booster");
		$mb_roles_capabilities_other_role = __("Other Roles can do the following ","wp-mail-booster");
		$mb_roles_capabilities_other_role_tooltip = __("Please choose specific page available for Others Role Access", "wp-mail-booster");
		$mb_roles_capabilities_other_roles_capabilities = __("Please tick the appropriate capabilities for security purposes ","wp-mail-booster");
		$mb_roles_capabilities_other_roles_capabilities_tooltip = __("Only users with these capabilities can access Mail Booster", "wp-mail-booster");
		$mb_roles_capabilities_subscriber_role = __("A Subscriber Role can do the following","wp-mail-booster");
		$mb_roles_capabilities_subscriber_role_tooltip = __("Please choose specific page available for Subscriber Access", "wp-mail-booster");

		// Feedbacks
		$mb_feedbacks_thank_you = __("Thank You!","wp-mail-booster");
		$mb_feedbacks_suggest_some_features = __("Kindly fill in the below form, if you would like to suggest some features which are not in the Plugin","wp-mail-booster");
		$mb_feedbacks_suggestion_complaint = __("If you also have any suggestion/complaint, you can use the same form below","wp-mail-booster");
		$mb_feedbacks_write_us_on = __("You can also write us on","wp-mail-booster");
		$mb_feedbacks_your_name = __("Your Name","wp-mail-booster");
		$mb_feedbacks_your_name_tooltip = __("Please provide your Name which will be sent along with your Feedback","wp-mail-booster");
		$mb_feedbacks_your_name_placeholder = __("Please provide your Name","wp-mail-booster");
		$mb_feedbacks_your_email = __("Your Email","wp-mail-booster");
		$mb_feedbacks_your_email_tooltip = __("Please provide your Email Address which will be sent along with your Feedback","wp-mail-booster");
		$mb_feedbacks_your_email_placeholder = __("Please provide your Email Address","wp-mail-booster");
		$mb_feedbacks_tooltip = __("Please provide your Feedback which will be sent along","wp-mail-booster");
		$mb_feedbacks_placeholder = __("Please provide your Feedback","wp-mail-booster");
		$mb_feedbacks_send_feedback = __("Send Feedback","wp-mail-booster");

		// Test Email
		$mb_test_email_sending_test_email = __("Sending Test Email to","wp-mail-booster");
		$mb_test_email_status = __("Email Status","wp-mail-booster");
		$mb_test_email = __("Test Email", "wp-mail-booster");

		// error log
		$mb_error_logs = __("Error Logs","wp-mail-booster");
		$mb_error_logs_output = __("Output","wp-mail-booster");
		$mb_error_logs_download = __("Download Error Logs","wp-mail-booster");
		$mb_error_logs_clear = __("Clear Error Logs","wp-mail-booster");
		$mb_error_logs_output_tooltip = __("In this field,you would be able to see all PHP Errors","wp-mail-booster");
		$mb_clear_error_logs_success = __("Error logs has been cleared Successfully","wp-mail-booster");
	}
}
?>
