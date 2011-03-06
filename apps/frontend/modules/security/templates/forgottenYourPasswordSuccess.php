<?php slot('breadcrumbs'); ?>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3">Forgotten your password?</span>
  	</span>
  </span>
<?php end_slot(); ?>
<div class="article">
	<h1>Forgotten your password?</h1>
	<p>If you have forgotten your password don't worry! We can email you a new password.</p>
	<p>Enter the email address you have registered with us and click the "Reset Password" button.</p>
	<p>A new password will be emailed to you automatically.</p>
</div>
<div class="article"><?php include_partial('security/forgottenYourPasswordForm'); ?></div>
<div class="article last-article">
	<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
</div>