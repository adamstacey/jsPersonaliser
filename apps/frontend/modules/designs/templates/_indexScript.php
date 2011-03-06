<script type="text/javascript">
	$(document).ready(function() {
		// Load
		$("#loading").show();
		$("#developments_container").load("<?php echo url_for($object['module_name'].'/ajaxList'); ?>", { }, function() {
			$("#loading").hide();
		});
	});	
</script>