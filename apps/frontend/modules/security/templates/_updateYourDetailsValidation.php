<script type="text/javascript">
	$(document).ready(function() {
		// Check the email address
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
		$("#form_update_your_details").validate({
			errorLabelContainer: $("#errors_update_your_details"),
			rules: {
				first_name: "required",
				last_name: "required",
				email_address: {
					required: true,
					email: true
				},
				telephone: "required"
			},
			messages: {
				first_name: "Please enter your first name.",
				last_name: "Please enter your last name.",
				email_address: {
					required: "Please enter an email address.",
					email: "The email address you entered is not a valid email address."
				},
				telephone: "Please enter your telephone number."
			},
			wrapper: "p"
		});
	});
</script>