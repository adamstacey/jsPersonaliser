<?php include_component('system', 'browserCheck'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
  		<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    	<?php include_http_metas(); ?>
	    <?php include_metas(); ?>
    	<meta name="author" content="Oxygen Digital" />
 		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
	    <?php include_title(); ?>
    	<link rel="shortcut icon" href="/favicon.ico" />
	    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    	<?php include_stylesheets(); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.8/jquery-ui.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" type="text/javascript"></script>
		<script src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script> 
		<script type="text/javascript" src="/js/ckeditor/adapters/jquery.js"></script>
	    <?php include_javascripts(); ?>
	    <!--[if (IE)]><!--> 
			<style type="text/css" media="screen"> 
				@font-face {
				  font-family: "Fontin Sans";
				  src: url(/fonts/fontin-sans.eot);
				  font-weight: 400;									
				}
			</style> 
		<!--<![endif]--> 
	  	<!--[if !(IE)]><!--> 
			<style type="text/css" media="screen"> 
				@font-face {
				  font-family: "Fontin Sans";
				  src: url(/fonts/fontin-sans.ttf);
				  font-weight: 400;
				}
			</style> 
		<!--<![endif]-->
  	</head>
  	<!--[if lt IE 7 ]>
		<body class="ie6">
	<![endif]-->
	<!--[if IE 7 ]>
		<body class="ie7">
	<![endif]-->
	<!--[if IE 8 ]>
		<body class="ie8">
	<![endif]-->
	<!--[if IE 9 ]>
		<body class="ie9">
	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
		<body>
	<!--<![endif]-->
		<div id="page">
			<div id="header">
				<a title="Home" href="<?php echo url_for('content/index'); ?>" class="png-fix"><img id="logo" src="/images/the-resort-group-logo.png" alt="The Resort Group PLC" width="110" height="98" /></a>
				<div id="motto">Agent Sales Toolkit</div>
				<div id="date"><?php echo date("l, d F Y"); ?></div>
			</div>
			<div id="top_menu_container">
				<?php include_partial('global/topMenu'); ?>
				<?php include_partial('global/search'); ?>
			</div>
			<?php if ($sf_user->hasFlash('success')) { ?>
				<div class="close-message" id="success_message">
			  		<a class="close-message" href="Javascript:void(0);"><img class="right" src="/images/buttons/small-close.png" border="0" alt="Close" width="15" height="15" /></a>
			  		<h3>SUCCESS!</h3>  
			    	<p><?php echo html_entity_decode($sf_user->getFlash('success')); ?></p>
			  </div>
			<?php } ?>
			<?php if ($sf_user->hasFlash('warning')) { ?>
				<div class="close-message" id="warning_message">
					<a class="close-message" href="Javascript:void(0);"><img class="right" src="/images/buttons/small-close.png" border="0" alt="Close" width="15" height="15" /></a>
			  		<h3>WARNING!</h3>  
			    	<p><?php echo html_entity_decode($sf_user->getFlash('warning')); ?></p>
				</div>
			<?php } ?>
			<?php if ($sf_user->hasFlash('error')) { ?>
			 	<div class="close-message" id="error_message">
			 		<a class="close-message" href="Javascript:void(0);"><img class="right" src="/images/buttons/small-close.png" border="0" alt="Close" width="15" height="15" /></a>
			  		<h3>ERROR!</h3>
			    	<p><?php echo html_entity_decode($sf_user->getFlash('error')); ?></p>
				</div>
			<?php } ?>
			<div id="main_content"><?php echo $sf_data->getRaw('sf_content'); ?></div>
			<div class="clear"></div>
			<div id="footer">
				<p><a href="<?php echo url_for('content/termsAndConditions'); ?>">Terms and Conditions</a> | <a href="<?php echo url_for('content/privacyPolicy'); ?>">Privacy Policy</a></p>
				<p>The Resort Group PLC, 12a Melbourne Business Court, Millennium Way, Pride Park, Derby DE24 8LZ<br />Tel: +44 (0)1332 387 818 | Fax: +44 (0)1332 613 611 | Email: <script type="text/javascript">eval(unescape('%76%61%72%20%73%3D%27%61%6D%6C%69%6F%74%65%3A%71%6E%69%75%69%72%73%65%74%40%65%68%65%72%6F%73%74%72%72%67%75%6F%70%70%63%6C%63%2E%6D%6F%27%3B%76%61%72%20%72%3D%27%27%3B%66%6F%72%28%76%61%72%20%69%3D%30%3B%69%3C%73%2E%6C%65%6E%67%74%68%3B%69%2B%2B%2C%69%2B%2B%29%7B%72%3D%72%2B%73%2E%73%75%62%73%74%72%69%6E%67%28%69%2B%31%2C%69%2B%32%29%2B%73%2E%73%75%62%73%74%72%69%6E%67%28%69%2C%69%2B%31%29%7D%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%27%3C%61%20%68%72%65%66%3D%22%27%2B%72%2B%27%22%3E%65%6E%71%75%69%72%69%65%73%40%74%68%65%72%65%73%6F%72%74%67%72%6F%75%70%70%6C%63%2E%63%6F%6D%3C%2F%61%3E%27%29%3B'));</script></p>
				<p>Copyright &copy; <?php echo date("Y"); ?> The Resort Group PLC</p>
			</div>
		</div>
		<?php include_partial('global/dashboardQuickMenu'); ?>
		<?php include_component('system', 'enableJavascript'); ?>
	  	<!--[if lt IE 7 ]>
	    	<script src="/js/png-fix.js"></script>
	    	<script>DD_belatedPNG.fix('.png-fix');</script>
	  	<![endif]-->
	  	<?php include_component('system', 'javascriptCheck'); ?>
	  	<script type="text/javascript" src="/js/scripts.js"></script>
	</body>
</html>