<div class="dialog-loading hide" id="loading_sort">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
<div id="pager" class="pager">
	<form>
		<img src="/images/pagination/first.png" class="first"/>
		<img src="/images/pagination/prev.png" class="prev"/>
		<div class="pagedisplay"></div>
		<img src="/images/pagination/next.png" class="next"/>
		<img src="/images/pagination/last.png" class="last"/>
		<a class="action-add" href="Javascript:void(0);"><img src="/images/buttons/button-small-add.png" alt="Add" width="53" height="26" /></a>
		<select class="pagesize ui-widget-content ui-corner-all">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
			<option value="999999">All</option>
		</select>
		<div class="page-size">Records per Page:</div>
		<img class="filter-clear" id="filter_clear" src="/images/icons/cross.png" title="Clear the search filter" alt="Clear Search Filter" />
		<input id="filter" value="" maxlength="30" class="filter text ui-widget-content ui-corner-all" type="text" />
		<div class="filter-search">Search:</div>
		<br class="clear" />
	</form>
	<br class="clear" />
</div>
<table id="user" class="crud" width="100%" border="0" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th align="center" width="1" class="nowrap">&nbsp;</th>
  			<th align="center" class="nowrap">Name</th>
  			<th align="center" class="nowrap">Email</th>
  			<th align="center" class="nowrap">Telephone Number</th>
  			<th align="right" width="1" class="nowrap">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($users) > 0) { ?>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td align="center" width="1"><img rel="<?php echo $user->getId(); ?>" class="action-change-status" src="/images/icons/status-<?php echo ($user->getActive()?'tick':'cross'); ?>.png" alt="Status" title="Change the status of the user" width="14" height="14" /></td>
					<td align="center"><?php echo (($user->getFirstName() && $user->getLastName())?$user->getFirstName().'&nbsp;'.$user->getLastName():'&nbsp;'); ?></td>
					<td align="center"><a rel="<?php echo $user->getId(); ?>" class="action-edit" href="Javascript:void(0);"><?php echo ($user->getEmailAddress()?'<a href="mailto:'.$user->getEmailAddress().'">'.$user->getEmailAddress().'</a>':'&nbsp;'); ?></a></td>
					<td align="center"><?php echo (($user->getPhone())?$user->getPhone():'&nbsp;'); ?></td>
					<td align="right" nowrap="nowrap">
						<a title="Edit the user" rel="<?php echo $user->getId(); ?>" class="action-edit" href="Javascript:void(0);"><img src="/images/buttons/button-small-edit.png" alt="Edit" border="0" width="52" height="26" /></a>
						<a title="Manage the roles of this user" rel="<?php echo $user->getId(); ?>" class="action-roles" href="Javascript:void(0);"><img src="/images/buttons/button-small-roles.png" alt="Roles" border="0" width="64" height="26" /></a>
						<a title="Manage this users dealers" rel="<?php echo $user->getId(); ?>" class="action-dealers" href="Javascript:void(0);"><img src="/images/buttons/button-small-dealers.png" alt="Dealers" border="0" width="79" height="26" /></a>
						<a title="Manage this users bodyshops" rel="<?php echo $user->getId(); ?>" class="action-bodyshops" href="Javascript:void(0);"><img src="/images/buttons/button-small-bodyshops.png" alt="Bodyshops" border="0" width="100" height="26" /></a>
						<a title="Delete this user" rel="<?php echo $user->getId(); ?>" class="action-delete" href="Javascript:void(0);"><img src="/images/buttons/button-small-delete.png" alt="Delete" border="0" width="69" height="26" /></a>
					</td>
				</tr>
			<?php } ?>
		<?php } else { ?>
			<tr>
				<td colspan="6" align="left">There are no available users.</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript" defer="defer">
	$(document).ready(function()
	{
		// Set the table pagination, filtering and sorting
		$("#user").tablesorter(
		{
			widgets: ['zebra'],
			headers:
			{
				0:
				{
					sorter: false
    			},
    			4:
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
	        filterColumns: [0, 1, 2],
	        filterCaseSensitive: false
      	});
		$("#user").bind("sortStart",function() { 
    		$("#loading_sort").show(); 
    	}).bind("sortEnd",function() {
  			$("#loading_sort").hide(); 
	    });
	    // Reset the pagingation when a sort is performed
	    $("table.crud .header").click(function() {
	    	$(".pager .first").click();
	    });
	    // Reset the actions when the table list changes
	    $(".pager .first, .pager .prev, .pager .next, .pager .last, .filter, .pagesize, .header").bind("click keyup change", function()
	    {
    		$(".action-add").click(function()
			{
				$("#dialog_add").dialog('open');
			});
    		$(".action-edit").click(function()
			{
				$("#dialog_id").val($(this).attr("rel"));
				$("#dialog_edit").dialog('open');
			});
			$(".action-view").click(function()
			{
				$("#dialog_id").val($(this).attr("rel"));
				$("#view").dialog('open');
			});
			$(".action-delete").click(function()
			{
				$("#dialog_id").val($(this).attr("rel"));
				$("#dialog_delete").dialog('open');
			});
			$(".action-dealers").click(function()
			{
				$("#dialog_id").val($(this).attr("rel"));
				$("#dialog_dealers").dialog("open");
			});
			$(".action-bodyshops").click(function()
			{
				$("#dialog_id").val($(this).attr("rel"));
				$("#dialog_bodyshops").dialog("open");
			});
			$(".action-roles").click(function()
			{
				$("#dialog_id").val($(this).attr("rel"));
				$("#dialog_roles").dialog('open');
			});
		});
		$(".action-change-status").click(function()
		{
			$("#dialog_id").val($(this).attr("rel"));
			if ($(this).attr("src") == "/images/icons/status-cross.png")
			{
				$(this).attr("src", "/images/icons/status-tick.png");
				$.ajax({
					type: 'POST',
					url: '/users/ajaxChangeStatus',
					dataType: 'html',
					data:
					{
						user_id: $("#dialog_id").val(),
						status: 1
					}
				});
			} else {
				$(this).attr("src", "/images/icons/status-cross.png");
				$.ajax({
					type: 'POST',
					url: '/users/ajaxChangeStatus',
					dataType: 'html',
					data:
					{
						user_id: $("#dialog_id").val(),
						status: 0
					}
				});
			}
		});
		// Add a user
		$("#dialog_add").dialog({
			bgiframe: true,
			autoOpen: false,
			width: 500,
			height: 600,
			modal: true,
			draggable: false,
			resizable: false,
			open: function() {
				$("#content_add").hide();
				$("#loading_add").show();
				$("#content_add").load("/users/ajaxLoadAddUser", { }, function()
				{
					$("#loading_add").hide();
					$("#content_add").fadeIn();
				});
				// Fix position bug for IE
				if ($.browser.msie && ($.browser.version < 8))
				{
					$("#dialog_add").focus();
					$(window).scrollTop($(window).scrollTop() - 60);
				}
			},
			close: function() {
				$("#content_add").html("");
			},
			buttons: {
				'Cancel': function() {
					$(this).dialog("close");
				},
				'Add': function() {
					$("#form_add").submit();
				}
			}
		});
		$(".action-add").click(function()
		{
			$("#dialog_add").dialog('open');
		});
		// View or edit a user
		$("#dialog_edit").dialog({
			bgiframe: true,
			autoOpen: false,
			width: 500,
			height: 500,
			modal: true,
			draggable: false,
			resizable: false,
			open: function() {
				$("#content_edit").hide();
				$("#loading_edit").show();
				$("#content_edit").load("/users/ajaxLoadUser", {id: $("#dialog_id").val()}, function()
				{
					$("#loading_edit").hide();
					$("#content_edit").fadeIn();
				});
				// Fix position bug for IE
				if ($.browser.msie && ($.browser.version < 8))
				{
					$("#dialog_edit").focus();
					$(window).scrollTop($(window).scrollTop() - 60);
				}
			},
			close: function() {
				$("#content_edit").html("");
			},
			buttons: {
				'Cancel': function() {
					$(this).dialog("close");
				},
				'Save': function() {
					$("#form_edit").submit();
				}
			}
		});
		$(".action-edit").click(function()
		{
			$("#dialog_id").val($(this).attr("rel"));
			$("#dialog_edit").dialog('open');
		});
		// Delete a user
		$("#dialog_delete").dialog({
			bgiframe: true,
			autoOpen: false,
			width: 420,
			height: 190,
			modal: true,
			draggable: false,
			resizable: false,
			open: function() {
				// Fix position bug for IE
				if ($.browser.msie && ($.browser.version < 8))
				{
					$("#dialog_edit").focus();
					$(window).scrollTop($(window).scrollTop() - 60);
				}
			},
			buttons: {
				'Cancel': function() {
					$(this).dialog("close");
				},
				'Delete': function() {
					window.location = '/users/delete/user/'+$("#dialog_id").val();
				}
			}
		});
		$(".action-delete").click(function()
		{
			$("#dialog_id").val($(this).attr("rel"));
			$("#dialog_delete").dialog('open');
		});
		// View dealers
		$("#dialog_dealers").dialog({
			bgiframe: true,
			autoOpen: false,
			width: 900,
			height: 600,
			modal: true,
			draggable: false,
			resizable: false,
			open: function() {
				$("#content_dealers").hide();
				$("#loading_dealers").show();
				$("#content_dealers").load("/users/ajaxLoadDealers", {id: $("#dialog_id").val()}, function()
				{
					$("#loading_dealers").hide();
					$("#content_dealers").fadeIn();
				});
				// Fix position bug for IE
				if ($.browser.msie && ($.browser.version < 8))
				{
					$("#dialog_dealers").focus();
					$(window).scrollTop($(window).scrollTop() - 60);
				}
			},
			close: function() {
				$("#content_dealers").html("");
			},
			buttons: {
				'Cancel': function() {
					$(this).dialog("close");
				}
			}
		});
		$(".action-dealers").click(function()
		{
			$("#dialog_id").val($(this).attr("rel"));
			$("#dialog_dealers").dialog("open");
		});
		// View bodyshops
		$("#dialog_bodyshops").dialog({
			bgiframe: true,
			autoOpen: false,
			width: 900,
			height: 600,
			modal: true,
			draggable: false,
			resizable: false,
			open: function() {
				$("#content_bodyshops").hide();
				$("#loading_bodyshops").show();
				$("#content_bodyshops").load("/users/ajaxLoadBodyshops", {id: $("#dialog_id").val()}, function()
				{
					$("#loading_bodyshops").hide();
					$("#content_bodyshops").fadeIn();
				});
				// Fix position bug for IE
				if ($.browser.msie && ($.browser.version < 8))
				{
					$("#dialog_bodyshops").focus();
					$(window).scrollTop($(window).scrollTop() - 60);
				}
			},
			close: function() {
				$("#content_bodyshops").html("");
			},
			buttons: {
				'Cancel': function() {
					$(this).dialog("close");
				}
			}
		});
		$(".action-bodyshops").click(function()
		{
			$("#dialog_id").val($(this).attr("rel"));
			$("#dialog_bodyshops").dialog("open");
		});
		// Manage roles
		$("#dialog_roles").dialog({
			bgiframe: true,
			autoOpen: false,
			width: 900,
			height: 600,
			modal: true,
			draggable: false,
			resizable: false,
			open: function() {
				$("#content_roles").hide();
				$("#loading_roles").show();
				$("#content_roles").load("/users/ajaxLoadUserRoles", {user_id: $("#dialog_id").val()}, function()
				{
					$("#loading_roles").hide();
					$("#content_roles").fadeIn();
				});
				// Fix position bug for IE
				if ($.browser.msie && ($.browser.version < 8))
				{
					$("#dialog_roles").focus();
					$(window).scrollTop($(window).scrollTop() - 60);
				}
			},
			close: function() {
				$("#content_roles").html("");
			},
			buttons: {
				'Cancel': function() {
					$(this).dialog("close");
				}
			}
		});
		$(".action-roles").click(function()
		{
			$("#dialog_id").val($(this).attr("rel"));
			$("#dialog_roles").dialog('open');
		});
	});
</script>