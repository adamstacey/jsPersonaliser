<?php
/**
 * content actions.
 *
 * @package    BMW
 * @subpackage content
 * @author     Adam Stacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
	// Index 
  	public function executeIndex(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// About us
  	public function executeAboutUs(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('About The Resort Group PLC - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Contact us
  	public function executeContactUs(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Contact The Resort Group PLC - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Privacy policy
  	public function executePrivacyPolicy(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Privacy Policy - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Terms and conditions
  	public function executeTermsAndConditions(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Terms and Conditions - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
  	
  	// Dashboard
  	public function executeDashboard(sfWebRequest $request)
  	{
  		$this->getResponse()->setTitle('Your Dashboard - Agent Sales Toolkit - The Resort Group PLC');
    	return sfView::SUCCESS;
  	}
}
