<div class="form">
	<div class="errors" id="errors_add"></div>
	<form id="form_add" method="post" action="<?php echo url_for('settings/add'); ?>">
		<label for="title">Title <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="40" name="title" id="title" value="" />
		</div>
		<label for="setting_key">Key <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="30" name="setting_key" id="setting_key" value="" />
			<div id="setting_key_status"></div>
		</div>
		<label for="setting_value">Value <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="50" name="setting_value" id="setting_value" value="" />
		</div>
		<label for="description">Description</label>
		<div class="field">
			<textarea rows="6" cols="80" name="description" id="description"></textarea>
		</div>
		<input type="submit" class="button-small" value="Save" />
	</form>
	<?php include_partial('settings/addValidation'); ?>
</div>