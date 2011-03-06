<?php slot('breadcrumbs'); ?>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3"><a href="<?php echo url_for('content/dashboard'); ?>">Dashboard</a></span>
  	</span>
  </span>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3">Settings</span>
  	</span>
  </span>
<?php end_slot(); ?>
<div class="warning-message message-box confirmation-delete hide">
	<a class="crud-button close-confirmation-delete" href="Javascript:void(0);">Cancel</a>
	<a id="delete" class="delete-button" href="Javascript:void(0);">Confirm Delete</a>
	<h3>Are you sure you want to delete?</h3>
	<p>This will permanently delete this record and cannot be un-done.</p>
	<br class="clear" />
</div>
<div class="article">
	<a class="add-button header-button" href="<?php echo url_for('settings/add'); ?>">Add</a>
	<h1>Settings</h1>
	<p>The Agent Sales Toolkit is managed by a number of settings that you can manage. You can add, edit or delete settings.</p>
</div>
<div class="article hide" id="loading">
	<img class="left no-margin-bottom" src="/images/loading/ajax-transparent-loading.gif" alt="ajax-transparent-loading" width="16" height="16" />
	<p class="no-margin-bottom"><strong>Loading&hellip;</strong></p>
</div>
<div class="article"><?php include_partial('settings/listView', array('settings' => $settings)); ?></div>
<div class="article last-article">
	<p class="required-message"><?php echo count($settings); ?> record<?php echo ((count($settings) > 1)?'s':''); ?> found.</p>
</div>