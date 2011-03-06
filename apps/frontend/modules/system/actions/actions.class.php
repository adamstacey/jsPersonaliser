<?php
/**
 * system actions.
 *
 * @package    Agent Sales Toolkit
 * @subpackage system
 * @author     Adam Stacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class systemActions extends sfActions
{
	// Index 
  	public function executeIndex(sfWebRequest $request)
  	{
  		// Redirect the user to the 404 page
	    return $this->redirect('system/404');
  	}
  	
  	// 404
  	public function execute404(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Page not Found (404 Error) - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Access denied
  	public function executeAccessDenied(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Access Denied - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Disabled
  	public function executeDisabled(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Page Disabled - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Upgrade browser
  	public function executeUpgradeBrowser(sfWebRequest $request)
  	{
  		$this->setLayout(false);
    	return sfView::SUCCESS;
  	}
}
