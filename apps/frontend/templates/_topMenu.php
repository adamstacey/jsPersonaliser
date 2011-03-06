<?php
  $module = $sf_context->getModuleName();
  $action = $sf_context->getActionName();
?>
<div id="top_menu">
	<a<?php echo (($module == 'content') && ($action == 'index')?' class="current"':''); ?> href="<?php echo url_for('content/index'); ?>">Home</a>
	<a<?php echo (($module == 'content') && ($action == 'dashboard')?' class="current"':''); ?> href="<?php echo url_for('content/dashboard'); ?>">Dashboard</a>
	<a<?php echo (($module == 'content') && ($action == 'aboutUs')?' class="current"':''); ?> href="<?php echo url_for('content/aboutUs'); ?>">About Us</a>
	<a<?php echo (($module == 'content') && ($action == 'contactUs')?' class="current last"':' class="last"'); ?> href="<?php echo url_for('content/contactUs'); ?>">Contact Us</a>
</div>