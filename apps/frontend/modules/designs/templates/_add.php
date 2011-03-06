<div class="form-container">
	<div class="form">
		<div class="errors hide" id="errors_add"></div>
		<form id="form_add" method="post" action="<?php echo url_for($object['module_name'].'/add'); ?>">
			<table class="form" cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td class="information" width="1"><img title="Enter a title for the development." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="title"><span class="asterix">*</span> Title</label></td>
					<td><input type="text" size="40" name="title" id="title" value="" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter a description of the development." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="description"><span class="asterix">*</span> Description</label></td>
					<td><textarea cols="60" name="description" id="description"></textarea></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter a website address for the development." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="website"><span class="asterix">*</span> Website Address</label></td>
					<td><input type="text" size="40" name="website" id="website" value="http://" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter an estimated time in years that the development will take to construct." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="construction_time"><span class="asterix">*</span> Construction Time (years)</label></td>
					<td><input type="text" size="2" name="construction_time" id="construction_time" value="" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Select a date when the construction of the development is due to be completed." class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="completion_date"><span class="asterix">*</span> Estimated Completion Date</label></td>
					<td><input type="text" size="10" name="completion_date" id="completion_date" value="" /></td>
				</tr>
				<tr>
					<td class="information" width="1"><img title="Enter a location for the development. eg, Pronta Preta Beach, Sal, Cape Verde" class="link" src="/images/icons/information-small.png" alt="" width="16" height="16" /></td>
					<td class="label"><label for="location"><span class="asterix">*</span> Location</label></td>
					<td><input type="text" size="50" name="location" id="location" value="" /></td>
				</tr>
			</table>
			<a class="delete-button right margin-left-10" href="<?php echo url_for($object['module_name'].'/index'); ?>">Cancel</a>
			<input type="submit" class="add-button button-small" value="Save" />
		</form>
	</div>
</div>
<?php include_partial('addScript', array('object' => $object)); ?>