<script type="text/javascript">
	$(document).ready(function(){
		$("#form_change_your_password").validate({
			errorLabelContainer: $("#errors_change_your_password"),
			rules: {
				password: {
					required: true
				},
				confirm_password: {
					required: true,
					equalTo: "#password"
				}
			},
			messages: {
				password: {
					required: "Please enter a new password."
				},
				confirm_password: {
					required: "Please confirm your password.",
					equalTo: "Your confirmation password does not match your new password."
				}
			},
			wrapper: "p"
		});
	});
</script>