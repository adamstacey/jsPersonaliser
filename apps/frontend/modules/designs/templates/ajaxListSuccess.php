<?php // Delete confirmation ?>
<?php include_partial('delete', array('object' => $object, 'items' => $items)); ?>

<?php // List pagination ?>
<div id="pager" class="pager">
	<form>
		<a class="add-button right margin-left-10" href="<?php echo url_for($object['module_name'].'/add'); ?>">Add New <?php echo $object['single_name']; ?></a>
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
	</form>
</div>
<table id="<?php echo $object['id_name']; ?>" class="crud" cellpadding="0" cellspacing="0" width="100%" border="0">
	<thead>
		<tr>
			<th width="1" class="information">&nbsp;</th>
			<th class="align-center">Development</th>
			<th class="align-center">Location</th>
			<th class="align-center">Completion Date</th>
			<th width="1" class="information">&nbsp;</th>
			<th width="1" class="information">&nbsp;</th>
			<th width="1" class="information">&nbsp;</th>
		</tr>
	</thead>
	<?php if (count($items) > 0) { ?>
		<tbody>
			<?php foreach ($items as $item) { ?>
				<tr id="<?php echo $item->getId(); ?>">
					<td width="1" class="information"><img title="<?php echo $item->getDescription(); ?>" class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="align-center"><a href="<?php echo url_for($object['module_name'].'/edit?id='.$item->getId()); ?>"><?php echo $item->getTitle(); ?></a></td>
					<td class="align-center"><?php echo $item->getLocation(); ?></td>
					<td class="align-center"><?php echo date("d/m/Y", strtotime($item->getCompletionDate())); ?></td>
					<td class="align-center">
						<?php if ($item->getDisplayOrder() > 1) { ?><img rel="<?php echo $item->getId(); ?>" class="link action-move-up" src="/images/icons/up-arrow.gif" alt="Up" width="16" height="16" /><?php } else { ?>&nbsp;<?php } ?>
					</td>
					<td class="align-center">
						<?php if ($item->getDisplayOrder() < count($items)) { ?><img rel="<?php echo $item->getId(); ?>" class="link action-move-down" src="/images/icons/down-arrow.gif" alt="Down" width="16" height="16" /><?php } else { ?>&nbsp;<?php } ?>
					</td>
					<td width="1" class="align-center">
						<table class="buttons" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td><a class="crud-button" href="<?php echo url_for($object['module_name'].'/edit?id='.$item->getId()); ?>">Edit</a></td>
								<td><a rel="<?php echo $item->getId(); ?>" class="action-delete delete-button" href="Javascript:void(0);">Delete</a></td>
							</tr>
						</table>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	<?php } else { ?>
		<tbody>
			<tr>
				<td colspan="7">There are no <?php echo strtolower($object['plural_name']); ?>.</td>
			</tr>
		</tbody>
	<?php } ?>
</table>
<?php if (count($items) > 0) { ?><p class="required-message margin-top-10 no-margin-bottom"><?php echo count($items); ?> <?php echo ((count($items) > 1)?strtolower($object['plural_name']):strtolower($object['single_name'])); ?> found.</p><?php } ?>
<?php include_partial('ajaxListScript', array('item' => $item, 'object' => $object)); ?>