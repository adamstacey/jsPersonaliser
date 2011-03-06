<?php include_partial('global/emailHeader'); ?>
<p>Dear <?php echo $user->getFirstName(); ?></p>
<p>You have requested a new password for your account. Please visit the <a href="<?php echo url_for('security/login'); ?>">login page</a> and use the following login details:</p>
<p><strong>Email Address:</strong> <?php echo $user->getEmailAddress(); ?><br /><strong>Password:</strong> <?php echo $password; ?></p>
<p>Please remember to update your password to something more memorable once you have logged in by updating your details.</p>
<?php include_partial('global/emailFooter'); ?>