<h2>Roles for <?php echo $user->getFirstName().' '.$user->getLastName(); ?></h2>
<h4>Current Roles Assigned</h4>
<div class="dialog-loading hide" id="loading_sort_user_roles_current">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
<div id="pager_user_roles_current" class="pager">
	<form>
		<img src="/images/pagination/first.png" class="first"/>
		<img src="/images/pagination/prev.png" class="prev"/>
		<div class="pagedisplay"></div>
		<img src="/images/pagination/next.png" class="next"/>
		<img src="/images/pagination/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
			<option value="999999">All</option>
		</select>
		<div class="page-size">Records per Page:</div>
		<img class="filter-clear" id="filter_clear_user_roles_current" src="/images/icons/cross.png" title="Clear the search filter" alt="Clear Search Filter" />
		<input id="filter_user_roles_current" value="" maxlength="30" class="filter text ui-widget-content ui-corner-all" type="text" />
		<div class="filter-search">Search:</div>
		<br class="clear" />
	</form>
	<br class="clear" />
</div>
<table id="user_roles_current" class="crud" width="100%" border="0" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th align="left" class="nowrap">Role</th>
			<th align="center" class="nowrap">Description</th>
			<th align="right" class="nowrap" width="1">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($user->getCurrentUserRoles()) > 0) { ?>
			<?php foreach ($user->getCurrentUserRoles() as $user_role) { ?>
				<tr>
					<td align="left" class="nowrap"><strong><?php echo ($user_role->getName()?$user_role->getName():'&nbsp;'); ?></strong></td>
					<td align="center"><?php echo ($user_role->getDescription()?$user_role->getDescription():'&nbsp;'); ?></td>
					<td align="right" width="1" class="nowrap">
						<a rel="<?php echo $user_role->getId(); ?>" class="action-delete" href="Javascript:void(0);"><img src="/images/buttons/button-small-delete.png" alt="Delete" width="69" height="26" /></a>
					</td>
				</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td align="left" colspan="3">No roles have been assigned to this user. Please add them below.</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<div class="spacer"></div>
<h4>Available Roles</h4>
<div class="dialog-loading hide" id="loading_sort_user_roles_available">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
<div id="pager_user_roles_available" class="pager">
	<form>
		<img src="/images/pagination/first.png" class="first"/>
		<img src="/images/pagination/prev.png" class="prev"/>
		<div class="pagedisplay"></div>
		<img src="/images/pagination/next.png" class="next"/>
		<img src="/images/pagination/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
			<option value="999999">All</option>
		</select>
		<div class="page-size">Records per Page:</div>
		<img class="filter-clear" id="filter_clear_user_roles_available" src="/images/icons/cross.png" title="Clear the search filter" alt="Clear Search Filter" />
		<input id="filter_user_roles_available" value="" maxlength="30" class="filter text ui-widget-content ui-corner-all" type="text" />
		<div class="filter-search">Search:</div>
		<br class="clear" />
	</form>
	<br class="clear" />
</div>
<table id="user_roles_available" class="crud" width="100%" border="0" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th align="left" class="nowrap">Role</th>
			<th align="center" class="nowrap">Description</th>
			<th align="right" class="nowrap" width="1">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($user->getAvailableUserRoles()) > 0) { ?>
			<?php foreach ($user->getAvailableUserRoles() as $user_role) { ?>
				<tr>
					<td align="left" class="nowrap"><strong><?php echo ($user_role->getName()?$user_role->getName():'&nbsp;'); ?></strong></td>
					<td align="center"><?php echo ($user_role->getDescription()?$user_role->getDescription():'&nbsp;'); ?></td>
					<td align="right" width="1" class="nowrap">
						<a rel="<?php echo $user_role->getId(); ?>" class="action-add" href="Javascript:void(0);"><img src="/images/buttons/button-small-add.png" alt="Add" width="53" height="26" /></a>
					</td>
				</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td align="left" colspan="3">There are no available roles you can assign to this user.</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user->getId(); ?>" />
<script type="text/javascript" defer="defer">
	$(document).ready(function()
	{
		// Set the table pagination, filtering and sorting
    $("#user_roles_current")
    	.tablesorter(
    	{
    		widgets: ['zebra'],
    		headers:
    		{
    			2:
    			{
    				sorter: false
    			}
    		}
    	})
    	.tablesorterPager(
    	{
    		container: $("#pager_user_roles_current")
    	})
    	.tablesorterFilter(
    	{
    		filterContainer: $("#filter_user_roles_current"),
        filterClearContainer: $("#filter_clear_user_roles_current"),
        filterColumns: [0, 1],
        filterCaseSensitive: false
      });
    $("#user_roles").bind("sortStart",function() { 
	    $("#loading_sort_user_roles_current").show(); 
    }).bind("sortEnd",function() {
      $("#loading_sort_user_roles_current").hide(); 
    });
		// Set the table pagination, filtering and sorting
    $("#user_roles_available")
    	.tablesorter(
    	{
    		widgets: ['zebra'],
    		headers:
    		{
    			2:
    			{
    				sorter: false
    			}
    		}
    	})
    	.tablesorterPager(
    	{
    		container: $("#pager_user_roles_available")
    	})
    	.tablesorterFilter(
    	{
    		filterContainer: $("#filter_user_roles_available"),
        filterClearContainer: $("#filter_clear_user_roles_available"),
        filterColumns: [0, 1],
        filterCaseSensitive: false
      });
    $("#user_roles").bind("sortStart",function() { 
	    $("#loading_sort_user_roles_available").show(); 
    }).bind("sortEnd",function() {
      $("#loading_sort_user_roles_available").hide(); 
    });
    // Reset the pagingation when a sort is performed
    $("table.crud .header").click(function() {
    	$(".pager .first").click();
    });
    // Reset the actions when the table list changes
    $(".pager .first, .pager .prev, .pager .next, .pager .last, .filter, .pagesize").bind("click keyup change", function()
    { 
	    // Add a user role
			$(".action-add").click(function()
			{
				$.ajax({
					type: 'POST',
					url: '/users/ajaxAddUserRole',
					dataType: 'html',
					data:
					{
						user_id: $("#user_id").val(),
						user_role_id: $(this).attr("rel")
					},
					success: function()
					{
						$("#content_roles").hide();
						$("#loading_roles").show();
						$("#content_roles").load("/users/ajaxLoadUserRoles", {user_id: $("#dialog_id").val()}, function()
						{
							$("#loading_roles").hide();
							$("#content_roles").fadeIn();
						});
					}
				});
			});
			// Delete a user role
			$(".action-delete").click(function()
			{
				$.ajax({
					type: 'POST',
					url: '/users/ajaxDeleteUserRole',
					dataType: 'html',
					data:
					{
						user_id: $("#user_id").val(),
						user_role_id: $(this).attr("rel")
					},
					success: function()
					{
						$("#content_roles").hide();
						$("#loading_roles").show();
						$("#content_roles").load("/users/ajaxLoadUserRoles", {user_id: $("#dialog_id").val()}, function()
						{
							$("#loading_roles").hide();
							$("#content_roles").fadeIn();
						});
					}
				});
			}); 
    });
		// Add a user role
		$(".action-add").click(function()
		{
			$.ajax({
				type: 'POST',
				url: '/users/ajaxAddUserRole',
				dataType: 'html',
				data:
				{
					user_id: $("#user_id").val(),
					user_role_id: $(this).attr("rel")
				},
				success: function()
				{
					$("#content_roles").hide();
					$("#loading_roles").show();
					$("#content_roles").load("/users/ajaxLoadUserRoles", {user_id: $("#dialog_id").val()}, function()
					{
						$("#loading_roles").hide();
						$("#content_roles").fadeIn();
					});
				}
			});
		});
		// Delete a user role
		$(".action-delete").click(function()
		{
			$.ajax({
				type: 'POST',
				url: '/users/ajaxDeleteUserRole',
				dataType: 'html',
				data:
				{
					user_id: $("#user_id").val(),
					user_role_id: $(this).attr("rel")
				},
				success: function()
				{
					$("#content_roles").hide();
					$("#loading_roles").show();
					$("#content_roles").load("/users/ajaxLoadUserRoles", {user_id: $("#dialog_id").val()}, function()
					{
						$("#loading_roles").hide();
						$("#content_roles").fadeIn();
					});
				}
			});
		});
	});
</script>