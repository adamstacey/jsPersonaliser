<script type="text/javascript">
	$(document).ready(function() {		
						
		<?php // Move down ?>
		$(".action-move-down").click(function() {
			$("#loading").show();
			$.ajax({
				type: 'POST',
				url: '<?php echo url_for($object['module_name'].'/ajaxMoveDown'); ?>',
				dataType: 'html',
				data:
				{
					id: $(this).attr("rel")
				},
				success: function(data) {
					$("#<?php echo $object['id_name']; ?>").hide();
					$("#developments_container").load("<?php echo url_for($object['module_name'].'/ajaxList'); ?>", {id: <?php echo $item->getId(); ?>}, function() {
						$("#<?php echo $object['id_name']; ?>").fadeIn();
						$("#loading").hide();
					});
				}
			});
		});
		
		<?php // Move up ?>
		$(".action-move-up").click(function() {
			$("#loading").show();
			$.ajax({
				type: 'POST',
				url: '<?php echo url_for($object['module_name'].'/ajaxMoveUp'); ?>',
				dataType: 'html',
				data:
				{
					id: $(this).attr("rel")
				},
				success: function(data) {
					$("#<?php echo $object['id_name']; ?>").hide();
					$("#developments_container").load("<?php echo url_for($object['module_name'].'/ajaxList'); ?>", {id: <?php echo $item->getId(); ?>}, function() {
						$("#<?php echo $object['id_name']; ?>").fadeIn();
						$("#loading").hide();
					});
				}
			});
		});
		
		<?php // Set the table pagination, filtering and sorting ?>
	    $("#<?php echo $object['id_name']; ?>")
	    	.tablesorter(
	    	{
	    		headers:
	    		{
	    			0:
	    			{
	    				sorter: false
	    			},
	    			4:
	    			{
	    				sorter: false
	    			},
	    			5:
	    			{
	    				sorter: false
	    			},
	    			6:
	    			{
	    				sorter: false
	    			}
	    		}
	    	})
	    	.tablesorterPager(
	    	{
	    		container: $("#pager")
	    	})
	    	.tablesorterFilter(
	    	{
	    		filterContainer: $("#filter"),
		        filterClearContainer: $("#filter_clear"),
	    	    filterColumns: [1, 2, 3],
	        	filterCaseSensitive: false
	      	});
		$("#<?php echo $object['id_name']; ?>").bind("sortStart", function() { 
	    	$("#loading").show(); 
	    }).bind("sortEnd", function() {
		  $("#loading").hide(); 
		});
	});	
</script>