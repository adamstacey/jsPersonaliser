<?php
/**
 * security actions.
 *
 * @package    BMW
 * @subpackage security
 * @author     Adam Stacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class securityActions extends sfActions
{
	// Index
	public function executeIndex(sfWebRequest $request)
	{
		// Redirect the user to the login page
	    return $this->redirect('security/login');
	}
	
  	// Login
  	public function executeLogin(sfWebRequest $request)
  	{	
  		// Check if the user is already logged in
    	if ($this->getUser()->isAuthenticated())
  		{
  			return $this->redirect('content/index');
  		}
  		
  		// Set the page title
		$this->getResponse()->setTitle('Secure Login - Agent Sales Toolkit - The Resort Group PLC');
  		
	  	// A user has attempted to login
	  	if ($this->getRequest()->getMethod() == sfRequest::POST)
	  	{
			// Clear session variables before executing the login
			$this->getUser()->getAttributeHolder()->clear();
			$this->getUser()->setAuthenticated(false);
			$this->getUser()->clearCredentials();

			// Get the submitted details
			$email_address = strtolower(trim($this->getRequestParameter('email_address')));
			$password = trim($this->getRequestParameter('password'));
			$md5_password = md5($password);
			
			// Check if the user exists
			$q = Doctrine_Query::create()->from('User u');
 			$q->where('u.email_address = ?', $email_address);
 			$user = $q->fetchOne();
			if(!$user)
    		{
   				$this->getUser()->setFlash('error', "Your email address was not found. Please try again.");
   				return $this->redirect('security/login');
    		} else {
				// Check if password matches
    			if ($user->getPassword() != $md5_password)
    			{
        			$this->getUser()->setFlash('error', 'Your password was incorrect. Please try again.');
        			return $this->redirect('security/login');
				} else {
					// Check if account is active
					if (!$user->getActive())
	    			{
	        			$this->getUser()->setFlash('error', 'Your account has not been activated. Please contact support for further assistance.');
	        			return $this->redirect('security/login');
					} else {
						// Add the roles as credentials
						$user_roles = $user->getUserRoles();
						if (count($user_roles) > 0)
						{
							foreach ($user_roles as $user_role)
							{
								$this->getUser()->addCredential($user_role);
							}
						} else {
							$this->getUser()->setFlash('error', 'You have an account, but you have not yet been assigned a role. Please contact support for further assistance.');
							return $this->redirect('security/login');
						}
						$this->getUser()->setAttribute('user_roles', ucwords(str_replace('_', ' ', implode(', ', $user_roles))));
						
						// Save the user details and load their credentials
						$this->getUser()->setAuthenticated(true);
						$this->getUser()->setAttribute('user_id', $user->getId());
						$this->getUser()->setAttribute('name', $user->getFirstName().' '.$user->getLastName());
						$this->getUser()->setAttribute('user', $user);
						
						// Update the user last login time
						$user->setLastLoggedIn(date("Y-m-d H:i:s"));
						$user->save();
	
						$this->getUser()->setFlash('success', 'You have successfully logged in.');
						return $this->redirect('content/dashboard');
					}
				}
			}
		}
    	return sfView::SUCCESS;
	}
	
	// Forgotten your password
	public function executeForgottenYourPassword()
	{	
		// Set the page title
		$this->getResponse()->setTitle('Forgotten your password? - Agent Sales Toolkit - The Resort Group PLC');
		
		// A user has attempted to request a new password
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			// Get the submitted details
			$email_address = strtolower(trim($this->getRequestParameter('email_address')));
			
			// Get the user
			$user = Doctrine_Core::getTable('User')->getUserFromEmail($email_address);
			if (!$user)
			{				
				$this->getUser()->setFlash('error', 'Your email address was not found. Please try again.');
				return $this->redirect('security/login');
			}
			
			// Reset the password
			$password = substr(md5(date("dmYhis")), 5, 6);
			$md5_password = md5($password);
			$user->setPassword($md5_password);
			$user->save();
			
			// Send the email
			$message = Swift_Message::newInstance();
			$message->setContentType("text/html");
			$message->setFrom(array('noreply@theresortgroupplc.com' => 'Agent Sales Toolkit'));
			$message->setTo($email_address);
			$message->setSubject('Password Recovery for Agent Sales Toolkit');
 			$message->setBody($this->getPartial('security/forgottenYourPasswordEmail', array('user' => $user, 'password' => $password)));
			$this->getMailer()->send($message);

			$this->getUser()->setFlash('success', "A new password has been successfully sent to your email address.");
			return $this->redirect('security/login');
		}	
		return sfView::SUCCESS;
	}
	
	// Update your details
	public function executeUpdateYourDetails()
	{	
		// Check if the session is authenticated
		if (!$this->getUser()->isAuthenticated())
		{
			$this->getUser()->setFlash('error', "You need to login before you can access that page.");
			return $this->redirect('security/login');
		}
		
		// Get the user
		$user = Doctrine_Core::getTable('User')->find($this->getUser()->getAttribute('user_id'));
		if (!$user)
		{
			$this->getUser()->setFlash('error', "Sorry, we were unable to find your details.");
			return $this->redirect('content/index');
		}
		
		// Set the page title
		$this->getResponse()->setTitle('Update Your Details - Agent Sales Toolkit - The Resort Group PLC');
		
		// A user has attempted to update their details
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			// Get the submitted details
			$first_name = ucwords(trim($this->getRequestParameter('first_name')));
			$last_name = ucwords(trim($this->getRequestParameter('last_name')));
			$email_address = strtolower(trim($this->getRequestParameter('email_address')));
			$telephone = trim($this->getRequestParameter('telephone'));
			$job_title = trim($this->getRequestParameter('job_title'));
			
			// Update the user
			$user->setFirstName($first_name);
			$user->setLastName($last_name);
			$user->setEmailAddress($email_address);
			$user->setTelephone($telephone);
			$user->setJobTitle($job_title);
			$user->save();
			
			// Reset the session name
			$this->getUser()->setAttribute('name', $user->getFirstName().' '.$user->getLastName());

			$this->getUser()->setFlash('success', "Your details have been successfully updated.");
			return $this->redirect('security/updateYourDetails');
		}
		
		$this->user = $user;
		return sfView::SUCCESS;
	}
	
	// Change your password
	public function executeChangeYourPassword()
	{	
		// Check if the session is authenticated
		if (!$this->getUser()->isAuthenticated())
		{
			$this->getUser()->setFlash('error', "You need to login before you can access that page.");
			return $this->redirect('security/login');
		}
		
		// Set the page title
		$this->getResponse()->setTitle('Change Your Password - Agent Sales Toolkit - The Resort Group PLC');
		
		// A user has attempted to update their details
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			// Get the user
			$user = Doctrine_Core::getTable('User')->find($this->getUser()->getAttribute('user_id'));
			if (!$user)
			{
				$this->getUser()->setFlash('error', "Sorry, we were unable to find your details.");
				return $this->redirect('content/index');
			}
			
			// Get the submitted details
			$password = trim($this->getRequestParameter('password'));
			$md5_password = md5($password);
			
			// Update the user
			$user->setPassword($md5_password);
			$user->save();
			
			$this->getUser()->setFlash('success', "Your password has been successfully updated.");
			return $this->redirect('security/changeYourPassword');
		}
		
		return sfView::SUCCESS;
	}
	
	// Logout
	public function executeLogout(sfWebRequest $request)
	{
		// Clear the users details and credentials
		$this->getUser()->setAuthenticated(false);
		$this->getUser()->clearCredentials();
		$this->getUser()->getAttributeHolder()->clear();
		$this->getUser()->setFlash('success', 'You have successfully logged out.');
		return $this->redirect('security/login');  
	}
}
