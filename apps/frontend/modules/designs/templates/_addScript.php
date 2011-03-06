<script type="text/javascript">
	$(document).ready(function() {
		<?php // Date picker ?>
		$("#completion_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd/mm/yy"
		});
		
		<?php // Only allow numbers for the construction time ?>
		$("#construction_time").keyup(function() { 
    		$(this).val($(this).val().replace(/[^0-9]/g,''));
		});
		
		<?php // Validate the add form ?>
		var validator = $("#form_add").validate({
			errorLabelContainer: $("#errors_add"),
			rules: {
				title: "required",
				description: "required",
				website: {
					required: true,
					url: true
				},
				construction_time: "required",
				completion_date: "required",
				location: "required"
			},
			messages: {
				title: "Please enter a title for the development.",
				description: "Please enter a description for the development.",
				website: {
					required: "Please enter a website address for the development.",
					url: "Please enter a valid website address (make sure you include http://)."
				},
				construction_time: "Please enter the estimated time in years that the development will take to complete.",
				completion_date: "Please select a date when the construction of the development is due to be completed.",
				location: "Please enter a location for the development. eg, Pronta Preta Beach, Sal, Cape Verde"
			},
			wrapper: "p"
		});
				
	});	
</script>