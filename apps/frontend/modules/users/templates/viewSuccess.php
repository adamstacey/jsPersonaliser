<h1>Users</h1>
<div class="information ui-corner-all">
	<div class="information-content">
		<p>Manage the users that can access the Bodyshop Information Portal.<br />You can add, update and remove users as well as assign them to dealers and manage their access roles.</p>
	</div>
	<br class="clear" />
</div>
<div>
	<div id="users">
		<div class="dialog-loading" id="loading_results">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
	</div>
	<div class="spacer"></div>
</div>
<br class="clear" />
<div class="dialog-loading" id="loading_data">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
<!-- Add -->
<div id="dialog_add" class="hide" title="Add">
	<div class="dialog-loading" id="loading_add">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
	<div id="content_add"></div>
</div>
<!-- Edit -->
<div id="dialog_edit" class="hide" title="Edit">
	<div class="dialog-loading" id="loading_edit">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
	<div id="content_edit"></div>
</div>
<!-- Delete -->
<div id="dialog_delete" class="hide" title="Confirm Delete">
	<div id="content_delete"><img class="left" src="/images/icon-warning.png" alt="Warning" width="50" height="45" />Are you sure you want to delete this user? All information relating to this user will be removed.</div>
</div>
<!-- Dealers -->
<div id="dialog_dealers" class="hide" title="Dealers">
	<div class="dialog-loading" id="loading_dealers">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
	<div id="content_dealers"></div>
</div>
<!-- Bodyshops -->
<div id="dialog_bodyshops" class="hide" title="Bodyshops">
	<div class="dialog-loading" id="loading_bodyshops">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
	<div id="content_bodyshops"></div>
</div>
<!-- Roles -->
<div id="dialog_roles" class="hide" title="Roles">
	<div class="dialog-loading" id="loading_roles">Please wait. Loading&hellip;<br /><img src="/images/transparent-loading.gif" alt="Loading..." border="0" /></div>
	<div id="content_roles"></div>
</div>
<input type="hidden" name="dialog_id" id="dialog_id" value="" />
<script type="text/javascript" defer="defer">
	$(document).ready(function()
	{
		$("#tabs").tabs();
		$("#users").hide();
		$("#loading_data").show();
		$("#users").load("/users/ajaxLoadUsers", { }, function()
		{
			$("#loading_data").hide();
			$("#users").fadeIn();
		});
	});
</script>