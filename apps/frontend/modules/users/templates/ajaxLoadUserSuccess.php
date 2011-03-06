<div class="information ui-corner-all">
	<div class="information-content"><p>Please edit the information in the form below and click on the "Save" button to update the new user.</p></div>
	<br class="clear" />
</div>
<div class="dialog-form ui-corner-bottom">
	<form action="/users/edit" id="form_edit" method="post">		
		<label>Password</label>
    	<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
    	<label>Confirm Password</label>
    	<input type="password" name="confirm_password" id="confirm_password" value="" class="text ui-widget-content ui-corner-all" />
		<label>First Name <span class="asterix">*</span></label>
		<input type="text" name="first_name" id="first_name" value="<?php echo $user->getFirstName(); ?>" class="text ui-widget-content ui-corner-all" />
		<label>Last Name <span class="asterix">*</span></label>
		<input type="text" name="last_name" id="last_name" value="<?php echo $user->getLastName(); ?>" class="text ui-widget-content ui-corner-all" />
		<label>Email Address <span class="asterix">*</span></label>
		<input type="text" name="email_address" id="email_address" value="<?php echo $user->getEmailAddress() ?>" class="text ui-widget-content ui-corner-all" />
		<input type="hidden" name="current_email_address" id="current_email_address" value="<?php echo $user->getEmailAddress(); ?>" />
		<div id="email_address_status"></div>
		<label>Telephone Number</label>
		<input type="text" name="phone" id="phone" value="<?php echo $user->getPhone(); ?>" class="text ui-widget-content ui-corner-all" />
		<?php if ($sf_user->hasCredential('administrator')) { ?>
			<label>Notes</label>
			<textarea name="notes" id="notes" class="text ui-widget-content ui-corner-all"><?php echo $user->getNotes(); ?></textarea>
		<?php } else { ?>
			<input type="hidden" name="notes" id="notes" value="<?php echo $user->getNotes(); ?>" />
		<?php } ?>
	    <div class="required">Fields marked with an asterix (<span class="asterix">*</span>) are required.</div>
    	<br class="clear" />
		<input type="hidden" name="id" id="id" value="<?php echo $user->getId(); ?>" />
		<input type="hidden" name="return_url" id="return_url" value="<?php echo $return_url; ?>" />
  	</form>
</div>
<script type="text/javascript" defer="defer">
	$(document).ready(function()
	{
		// Check the username
		$("#email_address").blur(function()
		{
			$("#email_address_status").html("");
			if ($("#email_address").val() != $("#current_email_address").val())
			{
				$("#email_address_status").load("/users/ajaxCheckEmailAddress", {email_address: $("#email_address").val()}, function() {
					if ($("#email_address_exists").val() > 0)
					{
						$("#email_address").val("");
						$("#email_address").addClass("error");
					}
				});
			}
		});
		$("#form_edit").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				email_address: {
					required: true,
					email: true
				},
				confirm_password: {
					equalTo: "#password"
				}
			},
			messages: {
				first_name: "Please enter a first name.",
				last_name: "Please enter a last name.",
				email_address: {
					required: "Please enter an email address.",
					email: "The email address you entered is not a valid email address."
				},
				confirm_password: {
					equalTo: "The confirmation password you entered did not match the password you entered."
				}
			},
			wrapper: ""
		});
	});
</script>
