<?php slot('breadcrumbs'); ?>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3"><a href="<?php echo url_for('content/dashboard'); ?>">Dashboard</a></span>
  	</span>
  </span>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3"><a href="<?php echo url_for('settings/index'); ?>">Settings</a></span>
  	</span>
  </span>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3">Add New Setting</span>
  	</span>
  </span>
<?php end_slot(); ?>
<div class="article">
	<a class="delete-button header-button" href="<?php echo url_for('settings/index'); ?>">Cancel</a>
	<h1>Add New Setting</h1>
	<p>To add a new setting please fill in the form below and click the "Save" button.</p>
</div>
<div class="article"><?php include_partial('settings/addForm'); ?></div>
<div class="article last-article">
	<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
</div>