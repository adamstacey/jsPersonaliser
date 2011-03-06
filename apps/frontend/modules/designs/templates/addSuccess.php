<div class="main-content-header"></div>
<div class="main-content">
	<h1 class="green">Add New <?php echo $object['single_name']; ?></h1>
	<p>To add a new <?php echo $object['single_name']; ?> please fill in the form below and click the "Save" button.</p>
	<?php include_partial('add', array('development' => $development, 'object' => $object)); ?>
	<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
</div>
<div class="main-content-footer"></div>