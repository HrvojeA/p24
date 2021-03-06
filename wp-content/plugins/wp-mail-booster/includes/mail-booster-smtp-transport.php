<?php
if(!defined("ABSPATH")) exit; // Exit if accessed directly
class mail_booster_smtp_transport
{
	public $configuration_settings;
	public function __construct()
	{
		$obj_mb_config_provider = new mail_booster_configuration_provider();
		$this->configuration_settings = $obj_mb_config_provider->get_configuration_settings();
	}

	// This function is used to create mail engine for sending emails.
	public function initiate_mail_engine_mail_booster()
	{
		require_once "mail-booster-zend-engine.php";
		return new mail_booster_zend_engine($this);
	}

	// This function is used to create zend mail transport.
	public function initiate_zendmail_transport_mail_booster($fake_hostname, $fake_config)
	{
		$obj_mb_configure_transport = new mail_booster_configure_transport();
		if($this->configuration_settings["auth_type"] == "oauth2")
		{
			$config = $obj_mb_configure_transport->configure_oauth_transport();
		}
		else
		{
			$config = $obj_mb_configure_transport->configure_plain_transport();
		}
		return new mail_booster_Zend_Mail_Transport_Smtp($this->configuration_settings["hostname"],$config);
	}
}
?>
