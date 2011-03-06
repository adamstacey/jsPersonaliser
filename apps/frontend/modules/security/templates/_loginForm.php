<?php if (!$sf_user->isAuthenticated()) { ?>
	<h2 class="right-column-header-green">Secure Login</h2>
	<div class="right-column">
		<p>In order to access the Agent Sales Toolkit you need login.</p>
		<p>Please login below.</p>
		<div class="errors" id="errors_login"></div>
		<div class="form">
			<form id="form_login" method="post" action="<?php echo url_for('security/login'); ?>">
				<label for="email_address">Email Address <span class="asterix">*</span></label>
				<div class="field">
					<input class="width-218" type="text" name="email_address" id="email_address" value="" autocomplete="off" />
				</div>
				<label for="password">Password <span class="asterix">*</span></label>
				<div class="field">
					<input class="width-218" type="password" name="password" id="password" value="" autocomplete="off" />
				</div>
				<input type="submit" class="button" value="Login" />
				<div class="clear"></div>
			</form>
			<?php include_partial('security/loginValidation'); ?>
		</div>
		<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
		<p class="no-margin"><a href="<?php echo url_for('security/forgottenYourPassword'); ?>">Forgotten your password?</a><br /><a href="<?php echo url_for('security/register'); ?>">Not registered?</a></p>
	</div>
	<div class="right-column-footer"></div>
<?php } else { ?>
	<h2 class="right-column-header-green">Your Account</h2>
	<div class="right-column">
		<p>Welcome to the Agent Sales Toolkit.</p>
		<p class="no-margin"><a href="<?php echo url_for('content/dashboard'); ?>">Dashboard</a><br /><a href="<?php echo url_for('users/yourAccount'); ?>">Your Account</a><br /><a onclick="Javascript:window.open('http://agenttrg/software.php','software','location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=980,height=700');" href="Javascript:void(0);">Software</a></p>
	</div>
	<div class="right-column-footer"></div>
<?php } ?>