<div class="information ui-corner-all">
	<div class="information-content"><p>Please enter the information in the form below and click on the "Save" button to save your changes &amp; create a new user.</p></div>
	<br class="clear" />
</div>
<div class="dialog-form ui-corner-bottom">
	<form action="/users/add" id="form_add" method="post">
		<label>Password <span class="asterix">*</span></label>
    	<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
    	<label>Confirm Password <span class="asterix">*</span></label>
    	<input type="password" name="confirm_password" id="confirm_password" value="" class="text ui-widget-content ui-corner-all" />
		<label>First Name <span class="asterix">*</span></label>
		<input type="text" name="first_name" id="first_name" value="" class="text ui-widget-content ui-corner-all" />
		<label>Last Name <span class="asterix">*</span></label>
		<input type="text" name="last_name" id="last_name" value="" class="text ui-widget-content ui-corner-all" />
		<label>Email Address <span class="asterix">*</span></label>
		<input type="text" name="email_address" id="email_address" value="" class="text ui-widget-content ui-corner-all" />
		<div id="email_address_status"></div>
		<label>Telephone Number</label>
		<input type="text" name="telephone_number" id="telephone_number" value="" class="text ui-widget-content ui-corner-all" />
		<label>Notes</label>
		<textarea name="notes" id="notes" class="text ui-widget-content ui-corner-all"></textarea>
	    <div class="required">Fields marked with an asterix (<span class="asterix">*</span>) are required.</div>
    	<br class="clear" />
  	</form>
</div>
<script type="text/javascript" defer="defer">
	$(document).ready(function()
	{
		// Check the email address
		$("#email_address").blur(function()
		{
			$("#email_address_status").html("");
			$("#email_address_status").load("/users/ajaxCheckEmailAddress", {email_address: $("#email_address").val()}, function() {
				if ($("#email_address_exists").val() > 0)
				{
					$("#email_address").val("");
					$("#email_address").addClass("error");
				}
			});
		});
		$("#form_add").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				email_address: {
					required: true,
					email: true
				},
				password: "required",
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
				password: "Please enter a password.",
				confirm_password: {
					equalTo: "The confirmation password you entered did not match the password you entered."
				}
			},
			wrapper: ""
		});
	});
</script>