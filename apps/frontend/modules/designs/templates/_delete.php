<div class="internal-form-bottom confirmation-delete hide">
	<div class="warning-message message-box confirmation-delete no-margin">
		<a class="crud-button close-confirmation-delete right no-margin-bottom" href="Javascript:void(0);">Cancel</a>
		<a id="delete" rel="" class="delete-button right no-margin-bottom" href="Javascript:void(0);">Confirm Delete</a>
		<h3>Are you sure you want to delete?</h3>
		<p>This will permanently delete this <?php echo strtolower($object['single_name']); ?> and cannot be un-done.</p>
	</div>
</div>
<?php include_partial('deleteScript', array('object' => $object, 'items' => $items)); ?>