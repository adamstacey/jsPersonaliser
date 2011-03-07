<script type="text/javascript">
	// Delete a record
	$(".action-delete").click(function() {
		$("table.crud tr").removeClass("delete");
		$("tr#"+$(this).attr("rel")).addClass("delete");
		$("#delete").attr("href", "/settings/delete/id/"+$(this).attr("rel"));
		$(".confirmation-delete").fadeIn();
		$("#action_id").val($(this).attr("rel"));
	});
	
	// Confirm deletion
	$(".close-confirmation-delete").click(function() {
		$(".confirmation-delete").fadeOut();
		$("table.crud tr").removeClass("delete");
		$("#action_id").val("");
		$("#delete").attr("href", "Javascript:void(0);");
	});
		
	// Set the table pagination, filtering and sorting
    $("#settings")
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
    			}
    		},
    		sortList: [[1, 0]]
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
    	$("#settings").bind("sortStart", function() { 
	    	$("#loading").show(); 
	    }).bind("sortEnd", function() {
    	  $("#loading").hide(); 
    	});
</script>