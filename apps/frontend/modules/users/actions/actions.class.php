<?php
/**
 * users actions.
 *
 * @package    BMW
 * @subpackage users
 * @author     Steve Durr
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class usersActions extends sfActions
{
	// Index
	public function executeIndex(sfWebRequest $request)
	{
  	$this->redirect('users/view');
	}
	
	// View
	public function executeView(sfWebRequest $request)
	{	
		if (!$this->getUser()->hasCredential('administrator')) { $this->forward('content', 'accessDenied'); }
		return sfView::SUCCESS;
	}
	
	// Change the status of a user
	public function executeAjaxChangeStatus()
	{
		// Get the posted data
		$user_id = $this->getRequestParameter('user_id');
		$status = $this->getRequestParameter('status');
		  
		// Get the user
  		$user = Doctrine::getTable('User')->find($user_id);
  		if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		  
		$user->setActive($status);
		$user->save();
			
  		return $this->renderText('1');
	}
	// Load user
	public function executeAjaxLoadUser()
  	{
  		// Get the posted data
	 	$user_id = $this->getRequestParameter('id');
	 	$return_url = $this->getRequestParameter('return_url');

	 	// Get the user
  		$user = Doctrine::getTable('User')->find($user_id);
  		if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
  		$this->user = $user;
  		$this->return_url = $return_url;
   		return sfView::SUCCESS;
  	}
  	// Edit a user
  	public function executeEdit()
	{
	  	// A user has updated
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			// Get the submitted details
			$return_url = $this->getRequestParameter('return_url');
			$user_id = $this->getRequestParameter('id');
			$first_name = trim($this->getRequestParameter('first_name'));
			$last_name = trim($this->getRequestParameter('last_name'));
			$email_address = strtolower(trim($this->getRequestParameter('email_address')));
			$phone = trim($this->getRequestParameter('phone'));
			$password = trim($this->getRequestParameter('password'));
			if ($password)
			{
				$md5_password = md5($password);
			}
			$notes = trim($this->getRequestParameter('notes'));
			// Get the user
			$user = Doctrine::getTable('User')->find($user_id);
			if (!$user)
			{				
				$this->getUser()->setFlash('error', 'There was a problem saving. The user could not be found.');
				return $this->redirect('/users/view');
			}
			
			$user->setFirstName($first_name);
			$user->setLastName($last_name);
			$user->setEmailAddress($email_address);
			$user->setPhone($phone);
			if ($md5_password)
			{
				$user->setPassword($md5_password);
			}
			$user->setNotes($notes);
			$user->save();
			
			$this->getUser()->setFlash('success', 'The user "'.$first_name.' '.$last_name.'" was successfully saved.');
			if ($return_url)
			{
				return $this->redirect($return_url);
			} else {
				return $this->redirect('/users/view');
			}
		}
	  	return $this->redirect('/users/view');
  	}
  	// Load users
  	public function executeAjaxLoadUsers()
  	{
		$this->users = Doctrine_Core::getTable('User')->getUsers();
    	return sfView::SUCCESS;
  	}
  	// Load the user roles
	public function executeAjaxLoadUserRoles()
	{
		// Get the posted data
		$user_id = $this->getRequestParameter('user_id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Get the user roles
		$this->user = $user;
		  
	    return sfView::SUCCESS;
	}
	// Add a user role
	public function executeAjaxAddUserRole()
  	{
  		// Get the posted data
	  	$user_id = $this->getRequestParameter('user_id');
	  	$user_role_id = $this->getRequestParameter('user_role_id');
	  	// Get the user
  		$user = Doctrine::getTable('User')->find($user_id);
  		if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Add
		$user->addUserRole($user_role_id);
		return $this->renderText('1');
  	}
  	// Delete a user role
  	public function executeAjaxDeleteUserRole()
  	{
  		// Get the posted data
	  	$user_id = $this->getRequestParameter('user_id');
	  	$user_role_id = $this->getRequestParameter('user_role_id');
	  	// Get the user
  		$user = Doctrine::getTable('User')->find($user_id);
  		if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Delete
		$user->deleteUserRole($user_role_id);
		return $this->renderText('1');
  	}
  	// Load the add user dialog
  	public function executeAjaxLoadAddUser()
  	{
    	return sfView::SUCCESS;
  	}
  	// Check an email address
  	public function executeAjaxCheckEmailAddress()
  	{
    	$email_address = trim(strtolower($this->getRequestParameter('email_address')));
    	$email_address_exists = Doctrine::getTable('User')->doesEmailAddressExist($email_address);
    	if ($email_address_exists)
    	{
    		return $this->renderText('<img class="left no-margin-bottom" width="24" height="24" alt="Unavailable" src="/images/icons/error-small.png" /><p class="error">Sorry, the email address <strong>"'.$email_address.'"</strong> already exists. Please try another one.</p><input type="hidden" name="email_address_exists" id="email_address_exists" value="1" />');
    	}
    	return $this->renderText('<img class="left no-margin-bottom" width="24" height="24" alt="Available" src="/images/icons/success-small.png" /><p class="success">The email address <strong>"'.$email_address.'"</strong> is available.</p><input type="hidden" name="email_address_exists" id="email_address_exists" value="0" />');
  	}
  	// Change a users bodyshop
  	public function executeAjaxChangeBodyshop()
  	{
  		$bodyshop_id = $this->getRequestParameter('bodyshop_id');
  		if ($bodyshop_id)
  		{
  			$this->getUser()->setAttribute('current_bodyshop', $bodyshop_id);
  		}
  		return sfView::NONE;
  	}
  	// Add a new user
  	public function executeAdd()
  	{
  		// A user has been added
	  	if ($this->getRequest()->getMethod() == sfRequest::POST)
	  	{
			// Get the submitted details
			$first_name = trim($this->getRequestParameter('first_name'));
			$last_name = trim($this->getRequestParameter('last_name'));
			$email_address = strtolower(trim($this->getRequestParameter('email_address')));
			$phone = trim($this->getRequestParameter('phone'));
			$password = trim($this->getRequestParameter('password'));
			$md5_password = md5($password);
			$notes = trim($this->getRequestParameter('notes'));
			
			// Add new user
			$user = new User();
			$user->setFirstName($first_name);
			$user->setLastName($last_name);
			$user->setEmailAddress($email_address);
			$user->setPhone($phone);
			if ($md5_password)
			{
				$user->setPassword($md5_password);
			}
			$user->setNotes($notes);
			$user->save();
						
			$this->getUser()->setFlash('success', 'The user "'.$first_name.' '.$last_name.'" has been added.');
			return $this->redirect('/users/view');
		}
  		return $this->redirect('/users/view');
	}
	// Delete a user
	public function executeDelete()
	{
		// Get the submitted details
		$user_id = $this->getRequestParameter('user');
			
		// Get the user
		$user = Doctrine::getTable('User')->find($user_id);
		if (!$user)
		{				
			$this->getUser()->setFlash('error', 'There was a problem deleting. The user could not be found.');
			return $this->redirect('/users/view');
		}
			
		$name = $user->getFirstName().' '.$user->getLastName();
			
		// Delete any user roles
		$user->deleteUserRoles();
		
		// Delete any bodyshops
		$user->deleteBodyshops();
		
		// Delete any dealers
		$user->deleteBodyshops();
		
		// Delete the user
		$user->delete();
				
		$this->getUser()->setFlash('success', 'The user "'.$name.'" has been successfully deleted.');
	  	
	  	return $this->redirect('/users/view');
	}
	// Load the bodyshops
	public function executeAjaxLoadBodyshops()
	{
	  	// Get the posted data
		$user_id = $this->getRequestParameter('id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}	
		// Get the user roles
		$this->user = $user;
		  
	    return sfView::SUCCESS;
	}
	// Add a bodyshop
	public function executeAjaxAddBodyshop()
	{
		// Get the posted data
		$user_id = $this->getRequestParameter('user_id');
		$bodyshop_id = $this->getRequestParameter('bodyshop_id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Add
		$user->addBodyshop($bodyshop_id);
		return $this->renderText('1');
	}
	// Delete a bodyshop
	public function executeAjaxDeleteBodyshop()
	{
		// Get the posted data
		$user_id = $this->getRequestParameter('user_id');
		$bodyshop_id = $this->getRequestParameter('bodyshop_id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Delete
		$user->deleteBodyshop($bodyshop_id);
		return $this->renderText('1');
	}
	// Load the dealers
	public function executeAjaxLoadDealers()
	{
	  	// Get the posted data
		$user_id = $this->getRequestParameter('id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}	
		// Get the dealers
		$this->user = $user;
		  
	    return sfView::SUCCESS;
	}
	// Add a dealer
	public function executeAjaxAddDealer()
	{
		// Get the posted data
		$user_id = $this->getRequestParameter('user_id');
		$dealer_id = $this->getRequestParameter('dealer_id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Add
		$user->addDealer($dealer_id);
		return $this->renderText('1');
	}
	// Delete a dealer
	public function executeAjaxDeleteDealer()
	{
		// Get the posted data
		$user_id = $this->getRequestParameter('user_id');
		$dealer_id = $this->getRequestParameter('dealer_id');
		// Get the user
	  	$user = Doctrine::getTable('User')->find($user_id);
	  	if (!$user)
		{
			return $this->renderText('<p><strong class="error">ERROR:</strong> Cannot find the user.</p>');
		}
		// Delete
		$user->deleteDealer($dealer_id);
		return $this->renderText('1');
	}
}