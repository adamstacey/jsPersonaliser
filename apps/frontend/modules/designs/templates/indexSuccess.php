<div class="main-content-header"></div>
<div class="main-content">
	<?php include_partial('global/loading'); ?>
	<h1 class="green"><?php echo $object['plural_name']; ?></h1>
	<p><?php echo $object['description']; ?></p>
	<div class="form-container">
		<div id="developments_container"></div>
	</div>
</div>
<div class="main-content-footer"></div>
<?php include_partial('indexScript', array('object' => $object)); ?>