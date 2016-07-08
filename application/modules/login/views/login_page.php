<link rel="stylesheet" href="<?php echo base_url().'assets/css/login/login_page.css';?>" />
<div class="login-page-container">
	<div id="login-p-header">
		<h2 id="login-text-header">Login to your account.</h2>
	</div>
	<div id="login-p-body">
		<div id="login-notif">
		</div>
		<div id="login-content-holder">
			<div id="login-field-icon"><img src="<?php echo base_url();?>assets/images/icons/ic_username.png" height="100%" width="100%"/></div>
			<div id="login-textfield"><input type="text" id="username" class="textfield" placeholder="Username"/> </div>
		</div>
		
		<div id="login-content-holder">
			<div id="login-field-icon"><img src="<?php echo base_url();?>assets/images/icons/ic_password.png" height="100%" width="100%"/></div>
			<div id="login-textfield"><input type="password" id="password" class="textfield" placeholder="********"/> </div>
		</div>
	</div>
	<div id="login-p-footer">
		<div id="login-button">
			<input type="button" class="button" id="login-account" value="Submit"/>
		</div>
		<div id="forget-password">
			<p>Forget your password?</p>
		</div>

	</div>
</div>