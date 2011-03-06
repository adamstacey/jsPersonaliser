<div id="pager" class="pager">
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
		<div class="page-size">Show:</div>
		<img class="filter-clear" id="filter_clear" width="18" height="18" src="/images/icons/error-small.png" title="Clear the search filter" alt="Clear Search Filter" />
		<input id="filter" value="" maxlength="30" class="filter" type="text" />
		<div class="filter-search">Search:</div>
		<br class="clear" />
	</form>
	<br class="clear" />
</div>
<table id="settings" class="crud" cellpadding="0" cellspacing="0" width="100%" border="0">
	<thead>
		<tr>
			<th class="center">&nbsp;</th>
			<th class="center">Title</th>
			<th class="center">Key</th>
			<th class="center">Value</th>
			<th colspan="2">&nbsp;</th>
		</tr>
	</thead>
	<?php if (count($settings) > 0) { ?>
		<tbody>
			<?php foreach ($settings as $setting) { ?>
				<tr id="<?php echo $setting->getId(); ?>">
					<td class="center"><a title="<?php echo $setting->getDescription(); ?>" href="Javascript:void(0);"><img src="/images/icons/information-small.png" alt="" width="16" height="16" /></a></td>
					<td class="center"><a href="<?php echo url_for('settings/edit?id='.$setting->getId()); ?>"><?php echo $setting->getTitle(); ?></a></td>
					<td class="center"><?php echo $setting->getSettingKey(); ?></td>
					<td class="center"><?php echo $setting->getSettingValue(); ?></td>
					<td class="center">
						<a class="delete-button action-delete" rel="<?php echo $setting->getId(); ?>" href="Javascript:void(0);">Delete</a>
						<a class="crud-button" href="<?php echo url_for('settings/edit?id='.$setting->getId()); ?>">Edit</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	<?php } else { ?>
		<tbody>
			<tr>
				<td colspan="5">There are no settings.</td>
			</tr>
		</tbody>
	<?php } ?>
</table>
<input type="hidden" name="action_id" id="action_id" value="" />
<?php include_partial('settings/listScript'); ?>