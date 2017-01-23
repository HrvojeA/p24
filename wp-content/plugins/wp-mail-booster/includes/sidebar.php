<?php
/**
* This file is used for displaying sidebar menus.
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
		?>
		<div class="page-sidebar-wrapper-tech-banker">
			<div class="page-sidebar-tech-banker navbar-collapse collapse">
				<div class="sidebar-menu-tech-banker">
					<ul class="page-sidebar-menu-tech-banker" data-slide-speed="200">
						<div class="sidebar-search-wrapper" style="padding:20px;text-align:center">
							<a class="plugin-logo" href="<?php echo tech_banker_beta_url; ?>" target="_blank">
								<img src="<?php echo plugins_url("assets/global/img/mail-booster-logo.png",dirname(__FILE__));?>">
							</a>
						</div>
						<li id="ux_mb_li_email_configuration">
							<a href="admin.php?page=mail_booster_email_configuration">
								<i class="icon-custom-envelope-open"></i>
								<span class="title">
									<?php echo $mb_email_configuration; ?>
								</span>
							</a>
						</li>
						<li id="ux_mb_li_test_email">
							<a href="admin.php?page=mail_booster_test_email">
								<i class="icon-custom-envelope"></i>
								<span class="title">
									<?php echo $mb_test_email; ?>
								</span>
							</a>
						</li>
						<li id="ux_mb_li_email_logs">
							<a href="admin.php?page=mail_booster_email_logs">
								<i class="icon-custom-note"></i>
								<span class="title">
									<?php echo $mb_email_logs; ?>
								</span>
								<span class=badge>Pro</span>
							</a>
						</li>
						<li id="ux_mb_li_settings">
							<a href="admin.php?page=mail_booster_settings">
								<i class="icon-custom-paper-clip"></i>
								<span class="title">
									<?php echo $mb_settings; ?>
								</span>
							</a>
						</li>
						<li id="ux_mb_li_roles_and_capabilities">
							<a href="admin.php?page=mail_booster_roles_and_capabilities">
								<i class="icon-custom-user"></i>
								<span class="title">
									<?php echo $mb_roles_and_capabilities; ?>
								</span>
								<span class=badge>Pro</span>
							</a>
						</li>
						<li id="ux_mb_li_feedbacks">
							<a href="admin.php?page=mail_booster_feedbacks">
								<i class="icon-custom-star"></i>
								<span class="title">
									<?php echo $mb_feedbacks; ?>
								</span>
							</a>
						</li>
						<li id="ux_mb_li_system_information">
							<a href="admin.php?page=mail_booster_system_information">
								<i class="icon-custom-screen-desktop"></i>
								<span class="title">
									<?php echo $mb_system_information; ?>
								</span>
							</a>
						</li>
						<li id="ux_mb_li_error_logs">
							<a href="admin.php?page=mail_booster_error_logs">
								<i class="icon-custom-shield"></i>
								<span class="title">
									<?php echo $mb_error_logs; ?>
								</span>
							</a>
						</li>
						<li id="ux_li_premium_editions">
							<a href="admin.php?page=mail_booster_premium_editions">
								<i class="icon-custom-briefcase"></i>
								<span class="title">
									<?php echo $mb_premium_edition_label; ?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="page-content-wrapper">
			<div class="page-content">
				<a href="http://beta.tech-banker.com/products/mail-booster/" target="_blank">
					<img src="<?php echo plugins_url("assets/global/img/mail-booster-banner.png",dirname(__FILE__));?>" title="Mail Booster" style="width: 100%;">
				</a>
				<div class="row">
					<div class="col-md-4">
						<a href="http://beta.tech-banker.com/products/mail-booster/" target="_blank">
							<img  title="Find out More!" src="<?php echo plugins_url("assets/global/img/mail-booster-features-button.png",dirname(__FILE__));?>" style="width: 100%;">
						</a>
					</div>
					<div class="col-md-4">
						<a href="http://beta.tech-banker.com/products/mail-booster/user-guide/" target="_blank">
							<img  title="Need Help?" src="<?php echo plugins_url("assets/global/img/mail-booster-user-guide-button.png",dirname(__FILE__));?>" style="width:100%;">
						</a>
					</div>
					<div class="col-md-4">
						<a href="http://beta.tech-banker.com/products/mail-booster/demos/" target="_blank">
							<img title="Find out How it works?" src="<?php echo plugins_url("assets/global/img/mail-booster-demos-button.png",dirname(__FILE__));?>" style="width: 100%;">
						</a>
					</div>
				</div>
	<?php
	}
}
?>
