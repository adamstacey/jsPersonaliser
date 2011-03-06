<?php
/**
 * settings actions.
 *
 * @package    Agent Sales Toolkit
 * @subpackage settings
 * @author     Adam Stacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class settingsActions extends sfActions
{
	// Index
	public function executeIndex(sfWebRequest $request)
	{
  		$this->settings = Doctrine_Core::getTable('Setting')->getSettings();
  		return sfView::SUCCESS;
	}
	
	// Add
	public function executeAdd(sfWebRequest $request)
	{
		// A user has attempted to save
	  	if ($this->getRequest()->getMethod() == sfRequest::POST)
	  	{
	  		// Get the submitted details
			$title = trim($this->getRequestParameter('title'));
			$setting_key = trim($this->getRequestParameter('setting_key'));
			$setting_value = trim($this->getRequestParameter('setting_value'));
			$description = trim($this->getRequestParameter('description'));
			$time_stamp = date("Y-m-d H:i:s");
			
			// Add to database
			$setting = new Setting();
			$setting->setTitle($title);
			$setting->setSettingKey($setting_key);
			$setting->setSettingValue($setting_value);
			$setting->setDescription($description);
			$setting->setCreatedAt($time_stamp);
			$setting->setUpdatedAt($time_stamp);
			$setting->save();
			
 			$this->getUser()->setFlash('success', 'The setting '.$title.' has been successfully added.');
			return $this->redirect('settings/index');
	  	}
	  	
  		return sfView::SUCCESS;
	}
	
	// Edit
	public function executeEdit(sfWebRequest $request)
	{
		$setting = Doctrine_Core::getTable('Setting')->find($this->getRequestParameter('id'));
		if (!$setting)
		{				
			$this->getUser()->setFlash('error', 'Sorry, the setting could not be found.');
			return $this->redirect('settings/index');
		}
		
		// A user has attempted to save
	  	if ($this->getRequest()->getMethod() == sfRequest::POST)
	  	{
	  		// Get the submitted details
			$title = trim($this->getRequestParameter('title'));
			$setting_key = trim($this->getRequestParameter('setting_key'));
			$setting_value = trim($this->getRequestParameter('setting_value'));
			$description = trim($this->getRequestParameter('description'));
			$time_stamp = date("Y-m-d H:i:s");
			
			// Update database
			$setting->setTitle($title);
			$setting->setSettingKey($setting_key);
			$setting->setSettingValue($setting_value);
			$setting->setDescription($description);
			$setting->setUpdatedAt($time_stamp);
			$setting->save();
			
			$this->getUser()->setFlash('success', 'The setting '.$title.' has been successfully updated.');
			return $this->redirect('settings/index');
	  	}
	  	
		$this->setting = $setting;
  		return sfView::SUCCESS;
	}
	
	// Check if a setting key exists
  	public function executeAjaxCheckSettingKey()
  	{
    	$setting_key = trim(strtolower($this->getRequestParameter('setting_key')));
    	$setting_key_exists = Doctrine::getTable('Setting')->doesSettingKeyExist($setting_key);
    	if ($setting_key_exists)
    	{
    		return $this->renderText('<img class="left no-margin-bottom" width="24" height="24" alt="Unavailable" src="/images/icons/error-small.png" /><p class="error">Sorry, the settings key <strong>"'.$setting_key.'"</strong> already exists. Please try another one.</p><input type="hidden" name="setting_key_exists" id="setting_key_exists" value="1" />');
    	}
    	return $this->renderText('<img class="left no-margin-bottom" width="24" height="24" alt="Available" src="/images/icons/success-small.png" /><p class="success">The settings key <strong>"'.$setting_key.'"</strong> is available.</p><input type="hidden" name="setting_key_exists" id="setting_key_exists" value="0" />');
  	}
	
	// Delete
	public function executeDelete()
	{
		// Get the setting to delete
		$setting = Doctrine::getTable('Setting')->find($this->getRequestParameter('id'));
		if (!$setting)
		{				
			$this->getUser()->setFlash('error', 'Sorry, the setting could not be found.');
			return $this->redirect('settings/index');
		}
		
		// Get the title
		$title = $setting->getTitle();
		
		// Delete the setting
		$setting->delete();
		
		$this->getUser()->setFlash('success', 'The setting '.$title.' has been successfully deleted.');
		return $this->redirect('settings/index');
	}
}