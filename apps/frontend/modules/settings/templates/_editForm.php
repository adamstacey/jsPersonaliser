<div class="form">
	<div class="errors" id="errors_edit"></div>
	<form id="form_edit" method="post" action="<?php echo url_for('settings/edit?id='.$setting->getId()); ?>">
		<label for="title">Title <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="40" name="title" id="title" value="<?php echo $setting->getTitle(); ?>" />
		</div>
		<label for="setting_key">Key <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="30" name="setting_key" id="setting_key" value="<?php echo $setting->getSettingKey(); ?>" />
			<input type="hidden" name="current_setting_key" id="current_setting_key" value="<?php echo $setting->getSettingKey(); ?>" />
			<div id="setting_key_status"></div>
		</div>
		<label for="setting_value">Value <span class="asterix">*</span></label>
		<div class="field">
			<input type="text" size="50" name="setting_value" id="setting_value" value="<?php echo $setting->getSettingValue(); ?>" />
		</div>
		<label for="description">Description</label>
		<div class="field">
			<textarea rows="6" cols="70" name="description" id="description"><?php echo $setting->getDescription(); ?></textarea>
		</div>
		<input type="submit" class="button-small" value="Save" />
	</form>
	<?php include_partial('settings/editValidation'); ?>
</div>