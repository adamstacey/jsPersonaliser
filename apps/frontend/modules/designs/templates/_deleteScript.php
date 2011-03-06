<script type="text/javascript">
	$(document).ready(function() {		
		<?php // Delete a record ?>
		$(".action-delete").click(function() {
			$("#<?php echo $object['id_name']; ?> table.crud tr").removeClass("delete");
			$("tr#"+$(this).attr("rel")).addClass("delete");
			$("#delete").attr("rel", $(this).attr("rel"));
			$(".confirmation-delete").fadeIn();
		});
		
		<?php // Cancel deletion ?>
		$(".close-confirmation-delete").click(function() {
			$(".confirmation-delete").fadeOut();
			$("#<?php echo $object['id_name']; ?> table.crud tr").removeClass("delete");
			$("#delete").attr("rel", "");
		});
		
		<?php // Delete ?>
		$("#delete").click(function() {
			$("#loading").show();
			$.ajax({
				type: 'POST',
				url: '<?php echo url_for($object['module_name'].'/ajaxDelete'); ?>',
				dataType: 'html',
				data:
				{
					id: $(this).attr("rel")
				},
				success: function(data) {
					$("#<?php echo $object['id_name']; ?>").hide();
					$("#developments_container").load("<?php echo url_for($object['module_name'].'/ajaxList'); ?>", { }, function() {
						$(".confirmation-delete").fadeOut();
						$("#<?php echo $object['id_name']; ?> table.crud tr").removeClass("delete");
						$(this).attr("rel", "");
						$("#<?php echo $object['id_name']; ?>").fadeIn();
						$("#loading").hide();
					});
				}
			});
		});
	});	
</script>