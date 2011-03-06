<h2>Dealers for <?php echo $user->getFirstName().' '.$user->getLastName(); ?></h2>
<h4>Current Dealers Assigned</h4>
<div class="dialog-loading hide" id="loading_sort_dealers_current">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
<div id="pager_dealers_current" class="pager">
	<form>
		<img src="/images/pagination/first.png" class="first"/>
		<img src="/images/pagination/prev.png" class="prev"/>
		<div class="pagedisplay"></div>
		<img src="/images/pagination/next.png" class="next"/>
		<img src="/images/pagination/last.png" class="last"/>
		<select class="pagesize ui-widget-content ui-corner-all">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
			<option value="999999">All</option>
		</select>
		<div class="page-size">Records per Page:</div>
		<img class="filter-clear" id="filter_clear_dealers_current" src="/images/icons/cross.png" title="Clear the search filter" alt="Clear Search Filter" />
		<input id="filter_dealers_current" value="" maxlength="30" class="filter text ui-widget-content ui-corner-all" type="text" />
		<div class="filter-search">Search:</div>
		<br class="clear" />
	</form>
	<br class="clear" />
</div>
<table id="dealers_current" class="crud" width="100%" border="0" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th align="left" class="nowrap">Dealer</th>
			<th align="right" class="nowrap" width="1">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($user->getCurrentDealers()) > 0) { ?>
			<?php foreach ($user->getCurrentDealers() as $dealer) { ?>
				<tr>
					<td align="left" class="nowrap"><strong><?php echo ($dealer->getName()?$dealer->getName():'&nbsp;'); ?></strong></td>
					<td align="right" width="1" class="nowrap">
						<a rel="<?php echo $dealer->getId(); ?>" class="action-delete" href="Javascript:void(0);"><img src="/images/buttons/button-small-delete.png" alt="Delete" width="69" height="26" /></a>
					</td>
				</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td align="left" colspan="3">No dealers have been assigned to this user. Please add them below.</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<div class="spacer"></div>
<h4>Available Dealers</h4>
<div class="dialog-loading hide" id="loading_sort_dealers_available">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
<div id="pager_dealers_available" class="pager">
	<form>
		<img src="/images/pagination/first.png" class="first"/>
		<img src="/images/pagination/prev.png" class="prev"/>
		<div class="pagedisplay"></div>
		<img src="/images/pagination/next.png" class="next"/>
		<img src="/images/pagination/last.png" class="last"/>
		<select class="pagesize ui-widget-content ui-corner-all">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
			<option value="999999">All</option>
		</select>
		<div class="page-size">Records per Page:</div>
		<img class="filter-clear" id="filter_clear_bodyshops_available" src="/images/icons/cross.png" title="Clear the search filter" alt="Clear Search Filter" />
		<input id="filter_dealers_available" value="" maxlength="30" class="filter text ui-widget-content ui-corner-all" type="text" />
		<div class="filter-search">Search:</div>
		<br class="clear" />
	</form>
	<br class="clear" />
</div>
<table id="dealers_available" class="crud" width="100%" border="0" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th align="left" class="nowrap">Dealer</th>
			<th align="right" class="nowrap" width="1">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($user->getAvailableDealers()) > 0) { ?>
			<?php foreach ($user->getAvailableDealers() as $dealer) { ?>
				<tr>
					<td align="left" class="nowrap"><strong><?php echo ($dealer->getName()?$dealer->getName():'&nbsp;'); ?></strong></td>
					<td align="center" width="1" class="nowrap">
						<a rel="<?php echo $dealer->getId(); ?>" class="action-add" href="Javascript:void(0);"><img src="/images/buttons/button-small-add.png" alt="Add" width="53" height="26" /></a>
					</td>
				</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td align="left" colspan="3">There are no available dealers you can assign to this user.</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user->getId(); ?>" />
<script type="text/javascript" defer="defer">
	$(document).ready(function()
	{
		// Set the table pagination, filtering and sorting
    	$("#dealers_current")
	    	.tablesorter(
	    	{
	    		widgets: ['zebra'],
	    		headers:
	    		{
	    			1:
	    			{
	    				sorter: false
	    			}
	    		}
	    	})
	    	.tablesorterPager(
	    	{
	    		container: $("#pager_dealers_current")
	    	})
	    	.tablesorterFilter(
	    	{
	    		filterContainer: $("#filter_dealers_current"),
	        	filterClearContainer: $("#filter_clear_dealers_current"),
	        	filterColumns: [0],
	        	filterCaseSensitive: false
			});
		    $("#dealers").bind("sortStart",function() { 
			    $("#loading_sort_dealers_current").show(); 
		    }).bind("sortEnd",function() {
		    	$("#loading_sort_dealers_current").hide(); 
		    });
			// Set the table pagination, filtering and sorting
    		$("#dealers_available")
	    	.tablesorter(
	    	{
	    		widgets: ['zebra'],
	    		headers:
	    		{
	    			1:
	    			{
	    				sorter: false
	    			}
	    		}
	    	})
	    	.tablesorterPager(
	    	{
	    		container: $("#pager_dealers_available")
	    	})
	    	.tablesorterFilter(
	    	{
	    		filterContainer: $("#filter_dealers_available"),
	        	filterClearContainer: $("#filter_clear_dealers_available"),
	        	filterColumns: [0],
	        	filterCaseSensitive: false
	      	});
   			$("#dealers").bind("sortStart",function() { 
	    		$("#loading_sort_dealers_available").show(); 
		    }).bind("sortEnd",function() {
      			$("#loading_sort_dealers_available").hide(); 
		    });
		    // Reset the pagingation when a sort is performed
		    $("table.crud .header").click(function() {
		    	$(".pager .first").click();
		    });
		    // Reset the actions when the table list changes
		    $(".pager .first, .pager .prev, .pager .next, .pager .last, .filter, .pagesize").bind("click keyup change", function()
		    { 
			    // Add
				$(".action-add").click(function()
				{
					$.ajax({
						type: 'POST',
						url: '/users/ajaxAddDealer',
						dataType: 'html',
						data:
						{
							user_id: $("#user_id").val(),
							bodyshop_id: $(this).attr("rel")
						},
						success: function()
						{
							$("#content_dealers").hide();
							$("#loading_dealers").show();
							$("#content_dealers").load("/users/ajaxLoadDealers", {id: $("#user_id").val()}, function()
							{
								$("#loading_dealers").hide();
								$("#content_dealers").fadeIn();
							});
						}
					});
				});
				// Delete
				$(".action-delete").click(function()
				{
					$.ajax({
						type: 'POST',
						url: '/users/ajaxDeleteDealer',
						dataType: 'html',
						data:
						{
							user_id: $("#user_id").val(),
							dealer_id: $(this).attr("rel")
						},
						success: function()
						{
							$("#content_dealers").hide();
							$("#loading_dealers").show();
							$("#content_dealers").load("/users/ajaxLoadDealers", {id: $("#user_id").val()}, function()
							{
								$("#loading_dealers").hide();
								$("#content_dealers").fadeIn();
							});
						}
					});
				}); 
   		 	});
			// Add
			$(".action-add").click(function()
			{
				$.ajax({
					type: 'POST',
					url: '/users/ajaxAddDealer',
					dataType: 'html',
					data:
					{
						user_id: $("#user_id").val(),
						dealer_id: $(this).attr("rel")
					},
					success: function()
					{
						$("#content_dealers").hide();
						$("#loading_dealers").show();
						$("#content_dealers").load("/users/ajaxLoadDealers", {id: $("#user_id").val()}, function()
						{
							$("#loading_dealers").hide();
							$("#content_dealers").fadeIn();
						});
					}
				});
			});
			// Delete
			$(".action-delete").click(function()
			{
				$.ajax({
					type: 'POST',
					url: '/users/ajaxDeleteDealer',
					dataType: 'html',
					data:
					{
						user_id: $("#user_id").val(),
						dealer_id: $(this).attr("rel")
					},
					success: function()
					{
						$("#content_dealers").hide();
						$("#loading_dealers").show();
						$("#content_dealers").load("/users/ajaxLoadDealers", {id: $("#user_id").val()}, function()
						{
							$("#loading_dealers").hide();
							$("#content_dealers").fadeIn();
						});
					}
				});
			});
		});
</script>