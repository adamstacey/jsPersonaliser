<div class="form">
	<div class="errors" id="errors_update_your_details"></div>
	<form id="form_update_your_details" method="post" action="<?php echo url_for('security/updateYourDetails'); ?>">
		<label for="first_name">First Name <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="40" name="first_name" id="first_name" value="<?php echo $user->getFirstName(); ?>" />
		</div>
		<label for="last_name">Last Name <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="40" name="last_name" id="last_name" value="<?php echo $user->getLastName(); ?>" />
		</div>
		<label for="email_address">Email Address <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="50" name="email_address" id="email_address" value="<?php echo $user->getEmailAddress(); ?>" />
			<input type="hidden" name="current_email_address" id="current_email_address" value="<?php echo $user->getEmailAddress(); ?>" />
			<div id="email_address_status"></div>
		</div>
		<label for="telephone">Telephone Number <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="30" name="telephone" id="telephone" value="<?php echo $user->getTelephone(); ?>" />
		</div>
		<label for="email_address">Job Title</label>
		<div class="field">
			<input type="text" size="40" name="job_title" id="job_title" value="<?php echo $user->getJobTitle(); ?>" />
		</div>
		<input type="submit" class="button-small" value="Save" />
	</form>
	<?php include_partial('security/updateYourDetailsValidation'); ?>
</div>