<div class="form">
	<div class="errors" id="errors_forgotten_your_password"></div>
	<form id="form_forgotten_your_password" method="post" action="<?php echo url_for('security/forgottenYourPassword'); ?>">
		<label for="email_address">Email Address <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="50" name="email_address" id="email_address" value="" />
		</div>
		<input type="submit" class="button-medium" value="Reset Password" />
	</form>
	<?php include_partial('security/forgottenYourPasswordValidation'); ?>
</div>