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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js" type="text/javascript"></script>
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
		<div id="loading"><img src="/images/loading/loading.gif" alt="Loading..." border="0" /><br />Loading...</div>
		<div id="page" class="hide">
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
				<p>Copyright &copy; <?php echo date("Y"); ?> Web Illumination Limited</p>
			</div>
		</div>
	  	<!--[if lt IE 7 ]>
	    	<script src="/js/png-fix.js"></script>
	    	<script>DD_belatedPNG.fix('.png-fix');</script>
	  	<![endif]-->
	  	<?php include_component('system', 'javascriptCheck'); ?>
	</body>
</html>