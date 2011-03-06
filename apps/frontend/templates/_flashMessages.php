<?php if ($sf_user->hasFlash('success')) { ?>
  	<div id="success_message" class="message-box close-message-box">
  		<a class="close-message-box" href="Javascript:void(0);"><img class="right" src="/images/icons/close-small.png" border="0" alt="Close" width="14" height="14" /></a>
  		<h3>SUCCESS!</h3>  
    	<p><?php echo $sf_user->getFlash('success'); ?></p>
  	</div>
<?php } ?>
<?php if ($sf_user->hasFlash('warning')) { ?>
	<div id="warning_message" class="message-box close-message-box">
  		<a class="close-message-box" href="Javascript:void(0);"><img class="right" src="/images/icons/close-small.png" border="0" alt="Close" width="14" height="14" /></a>
  		<h3>WARNING!</h3>  
    	<p><?php echo $sf_user->getFlash('warning'); ?></p>
	</div>
<?php } ?>
<?php if ($sf_user->hasFlash('error')) { ?>
	<div id="error_message" class="message-box close-message-box">
  		<a class="close-message-box" href="Javascript:void(0);"><img class="right" src="/images/icons/close-small.png" border="0" alt="Close" width="14" height="14" /></a>
  		<h3>ERROR!</h3>  
    	<p><?php echo $sf_user->getFlash('error'); ?></p>
  	</div>
<?php } ?>
<?php if ($sf_user->hasFlash('success') || $sf_user->hasFlash('warning') || $sf_user->hasFlash('error')) { ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".close-message-box").click(function() {
				$(".message-box").fadeOut();
			});
			window.setTimeout(function() {
			    $("#error_message, #warning_message, #success_message").fadeOut();
			}, 5000);
		});
	</script>
<?php } ?>