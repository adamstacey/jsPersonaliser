<?php
/**
 * designs actions.
 *
 * @package    Designer
 * @subpackage designs
 * @author     Adam Stacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class designsActions extends sfActions
{
	// Constructor
	public function preExecute() 
	{ 
		
	}
	
	// Index
	public function executeIndex()
	{
		$this->getResponse()->setTitle('Stationery Designer');
  		return sfView::SUCCESS;
	}
	  	
}