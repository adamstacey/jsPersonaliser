<script type="text/javascript">
	$(document).ready(function(){
		$("#form_forgotten_your_password").validate({
			errorLabelContainer: $("#errors_forgotten_your_password"),
			rules: {
				email_address: {
					required: true,
					email: true
				}
			},
			messages: {
				email_address: {
					required: "Please enter an email address.",
					email: "The email address you entered is not a valid email address."
				}
			},
			wrapper: "p"
		});
	});
</script>