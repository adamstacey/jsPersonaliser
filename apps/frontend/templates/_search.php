<div id="search_box_container">
	<div id="search_form_container">
		<form method="post" action="#">
			<div id="search_box">
				<button value="Search" type="submit" class="action-search"></button>
				<input type="text" id="search" name="search" maxlength="20" alt="Search..." size="20" value="Search..." autocomplete="off" />
				<button value="Reset" type="reset" class="action-reset-search "></button>
			</div>	
		</form>
		<div style="width: 280px;" class="resultbox"></div>
	</div>
</div>
<script type="text/javascript" defer="defer">
	$(document).ready(function() {
		$("#search").blur(function() {
			if ($(this).val() == '')
			{
				$(this).val('Search...');
			}
		});
		$("#search").focus(function() {
			if ($(this).val() == 'Search...')
			{
				$(this).val('');
			}
		});
	});
</script>