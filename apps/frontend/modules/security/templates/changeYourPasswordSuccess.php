<?php slot('breadcrumbs'); ?>
  <span class="box-1">
  	<span class="box-2">
  		<span class="current box-3">Change Your Password</span>
  	</span>
  </span>
<?php end_slot(); ?>
<div class="article">
	<h1>Change Your Password</h1>
	<p>If you would like to change your password please use the form below and click the "Save" button.</p>
	<p>We have listed some suggestions below to help you make your password as secure as possible:</p>
	<ul>
		<li>use both upper and lower case letters</li>
		<li>include one or more numerical digits</li>
		<li>include one or more special characters, e.g. @, #, $ etc.</li>
		<li>try not to use words found in a dictionary or use any of your own personal information</li>
		<li>try not to use passwords that match the format of calendar dates, registration numbers, telephone numbers, or other common numbers</li>
	</ul>
</div>
<div class="article"><?php include_partial('security/changeYourPasswordForm'); ?></div>
<div class="article last-article">
	<p class="required-message">All fields marked by an asterix (<span class="asterix">*</span>) are required.</p>
</div>