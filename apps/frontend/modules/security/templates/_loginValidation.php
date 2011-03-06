<script type="text/javascript">
	$(document).ready(function(){
		$("#form_login").validate({
			errorLabelContainer: $("#errors_login"),
			rules: {
				email_address: {
					required: true,
					email: true
				},
				password: "required"
			},
			messages: {
				email_address: {
					required: "Please enter an email address.",
					email: "The email address you entered is not a valid email address."
				},
				password: "Please enter your password."
			},
			wrapper: "p"
		});
	});
</script>