<div class="main-content-header"></div>
<div class="main-content">
	<h1 class="green"><?php echo $item->getTitle(); ?></h1>
	<p>To update this <?php echo $object['single_name']; ?> please update the information in the form below and click the "Save" button.</p>
	<?php include_partial('edit', array('item' => $item, 'object' => $object)); ?>
	<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
</div>
<div class="main-content-footer"></div>