<?php

class myUser extends sfBasicSecurityUser
{
	
	/**
	 * this is the recommended way of writing the sfUser
	 * session variables as it makes them more visible
	 *
	 *
	 *
	 * @package    BMW
	 * @subpackage myUser
	 * @author     john m howitt
	 *
	 */
	
	// template
	//		public function getXx()
	//			{
	//			return $this->getAttribute('xx');
	//			}
	//		public function setXx($xx)
	//			{
	//			return $this->setAttribute('xx', $xx);
	//			}	
	
	/*
		in a template you get the values back like this
		$sf_user->getXx();
		$sf_user->setXx($value);
		
		in an action thus
		
		$this->getUser()->getXx();
		$this->getUser()->setXx($value);
	*/
	
	// template
			public function getDealerid()
				{
				return $this->getAttribute('dealerid');
				}
			public function setDealerid($xx)
				{
				return $this->setAttribute('dealerid', $xx);
				}	
}
