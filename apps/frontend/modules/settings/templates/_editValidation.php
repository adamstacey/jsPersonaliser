<script type="text/javascript">
	$(document).ready(function() {
		// Check the setting key
		$("#setting_key").blur(function()
		{
			$("#setting_key_status").html("");
			if ($("#setting_key").val() != $("#current_setting_key").val())
			{
				$("#setting_key_status").load("/settings/ajaxCheckSettingKey", {setting_key: $("#setting_key").val()}, function() {
					if ($("#setting_key_exists").val() > 0)
					{
						$("#setting_key").val("");
						$("#setting_key").addClass("error");
					}
				});
			}
		});
		// Strip illegal characters from the key
		$("#setting_key").keyup(function() { 
    		$(this).val($(this).val().replace(/[^A-Za-z0-9\_\-]/g,'').toLowerCase());
		});
		// Validate the form
		$("#form_edit").validate({
			errorLabelContainer: $("#errors_edit"),
			rules: {
				title: "required",
				setting_key: "required",
				setting_value: "required"
			},
			messages: {
				title: "Please enter a title.",
				setting_key: "Please enter a unique key.",
				setting_value: "Please enter a value."
			},
			wrapper: "p"
		});
	});
</script>