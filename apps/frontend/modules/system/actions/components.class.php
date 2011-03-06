<?php
/**
 * content actions.
 *
 * @package    Agent Sales Toolkit
 * @subpackage system
 * @author     Adam Stacey
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class systemComponents extends sfComponents
{
	// Browser check 
  	public function executeBrowserCheck(sfWebRequest $request)
  	{
  		$module = $this->getRequestParameter('module');
  		$action = $this->getRequestParameter('action');
  		// Check if we are not already on the upgrade browser page
		if (!(($module == 'system') && ($action == 'upgradeBrowser')))
		{
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched))
			{
		    	$browser_version = $matched[1];
			    $browser = 'IE';
			} elseif (preg_match('|Opera ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
			    $browser_version = $matched[1];
		    	$browser = 'Opera';
			} elseif(preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
		        $browser_version = $matched[1];
		        $browser = 'Firefox';
			} elseif(preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
		        $browser_version = $matched[1];
		        $browser = 'Safari';
			} else {
		    	$browser_version = 0;
		    	$browser = 'other';
			}
			if (($browser == 'IE') && ($browser_version < 7))
			{
				$this->getController()->redirect(url_for('system/upgradeBrowser'), true); 
			}
		}
  	}
  	
  	// Check if Javascript is enabled 
  	public function executeJavascriptCheck(sfWebRequest $request)
  	{
  		
  	}
  	
  	// Enable Javascript 
  	public function executeEnableJavascript(sfWebRequest $request)
  	{
  		
  	}
}
