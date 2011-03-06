<div class="form">
	<div class="errors" id="errors_change_your_password"></div>
	<form id="form_change_your_password" method="post" action="<?php echo url_for('security/changeYourPassword'); ?>">
		<label for="password">Password <span class="asterix">*</span></label>
		<div class="field">
			<input type="password" size="30" name="password" id="password" value="" autocomplete="off" />
		</div>
		<label for="confirm_password">Confirm Password <span class="asterix">*</span></label>
		<div class="field">
			<input type="password" size="30" name="confirm_password" id="confirm_password" value="" autocomplete="off" />
		</div>
		<input type="submit" class="button-small" value="Save" />
	</form>
	<?php include_partial('security/changeYourPasswordValidation'); ?>
</div>