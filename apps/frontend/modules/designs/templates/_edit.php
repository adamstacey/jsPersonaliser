<div class="form-container">
	<form id="form_edit" method="post" action="<?php echo url_for($object['module_name'].'/edit'); ?>">
		<div class="errors hide" id="errors_edit"></div>
		<div class="form">
			<table class="form" cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td class="information" width="1"><img title="Enter a title for the development." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="title"><span class="asterix">*</span> Title</label></td>
					<td><input type="text" size="40" name="title" id="title" value="<?php echo $item->getTitle(); ?>" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter a description of the development." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="description"><span class="asterix">*</span> Description</label></td>
					<td><textarea cols="60" name="description" id="description"><?php echo $item->getDescription(); ?></textarea></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter a website address for the development." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="website"><span class="asterix">*</span> Website Address</label></td>
					<td><input type="text" size="40" name="website" id="website" value="<?php echo $item->getWebsite(); ?>" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter an estimated time in years that the development will take to construct." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="construction_time"><span class="asterix">*</span> Construction Time (years)</label></td>
					<td><input type="text" size="2" name="construction_time" id="construction_time" value="<?php echo $item->getConstructionTime(); ?>" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Select a date when the construction of the development is due to be completed." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="completion_date"><span class="asterix">*</span> Estimated Completion Date</label></td>
					<td><input type="text" size="10" name="completion_date" id="completion_date" value="<?php echo date("d/m/Y", strtotime($item->getCompletionDate())); ?>" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter a location for the development. eg, Pronta Preta Beach, Sal, Cape Verde" class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="location"><span class="asterix">*</span> Location</label></td>
					<td><input type="text" size="50" name="location" id="location" value="<?php echo $item->getLocation(); ?>" /></td>
				</tr>
			</table>
			<input type="hidden" id="id" name="id" value="<?php echo $item->getId(); ?>" />
			<a class="delete-button right margin-left-10" href="<?php echo url_for($object['module_name'].'/index'); ?>">Cancel</a>
			<input type="submit" class="add-button button-small" value="Save" />
		</div>
		<div id="tabs" class="margin-top-10">
			<ul>
				<li><a href="#phases_development_<?php echo $item->getId(); ?>">Phases</a></li>
				<li><a href="#floors_development_<?php echo $item->getId(); ?>">Floors</a></li>
				<li><a href="#blocks_development_<?php echo $item->getId(); ?>">Blocks</a></li>
				<li><a href="#property_statuses_development_<?php echo $item->getId(); ?>">Property Statuses</a></li>
				<li><a href="#property_types_development_<?php echo $item->getId(); ?>">Property Types</a></li>
				<li><a href="#properties_development_<?php echo $item->getId(); ?>">Properties</a></li>
			</ul>
			<div id="phases_development_<?php echo $item->getId(); ?>"></div>
			<div id="floors_development_<?php echo $item->getId(); ?>"></div>
			<div id="blocks_development_<?php echo $item->getId(); ?>"></div>
			<div id="property_statuses_development_<?php echo $item->getId(); ?>"></div>
			<div id="property_types_development_<?php echo $item->getId(); ?>"></div>
			<div id="properties_development_<?php echo $item->getId(); ?>"></div>
		</div>
	</form>
</div>
<?php include_partial('editScript', array('development' => $development, 'object' => $object, 'item' => $item)); ?>