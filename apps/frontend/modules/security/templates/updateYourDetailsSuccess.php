<?php slot('breadcrumbs'); ?>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3">Update Your Details</span>
  	</span>
  </span>
<?php end_slot(); ?>
<div class="article">
	<h1>Update Your Details</h1>
	<p>If you would like to update any of the details we have for you please update the form below and click the "Save" button.</p>
</div>
<div class="article"><?php include_partial('security/updateYourDetailsForm', array('user' => $user)); ?></div>
<div class="article last-article">
	<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
</div>