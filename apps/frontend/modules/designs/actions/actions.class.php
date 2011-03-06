<?php
/**
 * developments actions.
 *
 * @package    Agent Sales Toolkit
 * @subpackage developments
 * @author     Adam Stacey
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class developmentsActions extends sfActions
{
	// Constructor
	public function preExecute() 
	{ 
		$this->developments = Doctrine_Core::getTable('Development')->getDevelopments();
		$object = array();
		$object['single_name'] = 'Development';
		$object['plural_name'] = 'Developments';
		$object['class_name'] = 'development';
		$object['id_name'] = 'developments';
		$object['module_name'] = 'developments';
		$object['table_name'] = 'Development';
		$object['description'] = 'A development is the construction project containing all the properties available. Here you can add, edit and delete developments.';
		$this->object = $object;
	}
	
	// Index
	public function executeIndex()
	{
		$this->getResponse()->setTitle($this->object['plural_name'].' - Agent Sales Toolkit - The Resort Group PLC');
  		return sfView::SUCCESS;
	}
	
	// Add
	public function executeAdd()
	{
		$this->getResponse()->setTitle('Add New '.$this->object['single_name'].' - Agent Sales Toolkit - The Resort Group PLC');
		
		// A post has been made
	  	if ($this->getRequest()->getMethod() == sfRequest::POST)
	  	{    	
	    	// Get the submitted details
			$title = trim($this->getRequestParameter('title'));
			$description = trim($this->getRequestParameter('description'));
			$website = strtolower(trim($this->getRequestParameter('website')));
			$construction_time = trim($this->getRequestParameter('construction_time'));
			$completion_date_parts = explode('/', trim($this->getRequestParameter('completion_date')));
			$completion_date = $completion_date_parts[2].'-'.$completion_date_parts[1].'-'.$completion_date_parts[0];
			$location = trim($this->getRequestParameter('location'));
			$time_stamp = date("Y-m-d H:i:s");
			
			// Update the display order
			Doctrine::getTable($this->object['table_name'])->addItem(1);
			
			// Add to database
			$item = new Development();
			$item->setTitle($title);
			$item->setDescription($description);
			$item->setWebsite($website);
			$item->setConstructionTime($construction_time);
			$item->setCompletionDate($completion_date);
			$item->setLocation($location);
			$item->setDisplayOrder(1);
			$item->setCreatedAt($time_stamp);
			$item->setUpdatedAt($time_stamp);
			$item->save();
			
			$item->save();			
			apc_store($this->object['class_name'].'_'.$item->getId(), $item);
	
	    	$this->getUser()->setFlash('success', 'The '.$this->object['single_name'].' "'.$item->getTitle().'" was successfully added.');
			return $this->redirect($this->object['module_name'].'/edit?id='.$item->getId());
  		}
		
  		return sfView::SUCCESS;
	}
	
	// Edit
	public function executeEdit()
	{
		$item = Doctrine::getTable($this->object['table_name'])->getItem($this->getRequestParameter('id'));
    	if (!$item)
		{				
			$this->getUser()->setFlash('error', 'Sorry, the '.$this->object['single_name'].' could not be found.');
			return $this->redirect($this->object['module_name'].'/index');
		}
		
		$this->getResponse()->setTitle($item->getTitle().' - Agent Sales Toolkit - The Resort Group PLC');
		
		// A post has been made
	  	if ($this->getRequest()->getMethod() == sfRequest::POST)
	  	{    	
	    	// Get the submitted details
	  		$title = trim($this->getRequestParameter('title'));
			$description = trim($this->getRequestParameter('description'));
			$website = strtolower(trim($this->getRequestParameter('website')));
			$construction_time = trim($this->getRequestParameter('construction_time'));
			$completion_date_parts = explode('/', trim($this->getRequestParameter('completion_date')));
			$completion_date = $completion_date_parts[2].'-'.$completion_date_parts[1].'-'.$completion_date_parts[0];
			$location = trim($this->getRequestParameter('location'));
			$time_stamp = date("Y-m-d H:i:s");
			
			// Update database
			$item->setTitle($title);
			$item->setDescription($description);
			$item->setWebsite($website);
			$item->setConstructionTime($construction_time);
			$item->setCompletionDate($completion_date);
			$item->setLocation($location);
			$item->setUpdatedAt($time_stamp);
			$item->save();
			
			$item->save();			
			apc_store($this->object['class_name'].'_'.$item->getId(), $item);
	
	    	$this->getUser()->setFlash('success', 'The '.$this->object['single_name'].' "'.$item->getTitle().'" was successfully updated.');
			return $this->redirect($this->object['module_name'].'/edit?id='.$item->getId());
  		}
		
		$this->item = $item;
  		return sfView::SUCCESS;
	}
		
	// Delete
	public function executeAjaxDelete()
	{
		// Get the item to delete
		$item = Doctrine::getTable($this->object['table_name'])->getItem($this->getRequestParameter('id'));
		if (!$item)
		{				
			return $this->renderText('0');
		}
								
		// Update the order
		Doctrine::getTable($this->object['table_name'])->deleteItem($item->getDisplayOrder(), $item->getId());
				
		// Delete the item
		apc_delete($this->object['class_name'].'_'.$item->getId());
		
		// Delete
		$item->deletePhases();
		$item->deleteFloors();
		$item->deleteBlocks();
		$item->deletePropertyTypes();
		$item->deletePropertyStatuses();
		$item->deleteProperties();
		$item->delete();
		
		return $this->renderText('1');
	}
		
	// Move down
	public function executeAjaxMoveDown()
	{
		// Get the item to move
		$item = Doctrine::getTable($this->object['table_name'])->getItem($this->getRequestParameter('id'));
		if (!$item)
		{				
			return $this->renderText('0');
		}
								
		// Update the order
		Doctrine::getTable($this->object['table_name'])->moveDown($item->getDisplayOrder(), $item->getId());
		
		// Update
		$item->setDisplayOrder($item->getDisplayOrder() + 1);
 		$item->save();
 		apc_store($this->object['class_name'].'_'.$item->getId(), $item);
		
		return $this->renderText('1');
	}
	
	// Move up
	public function executeAjaxMoveUp()
	{
		// Get the item to move
		$item = Doctrine::getTable($this->object['table_name'])->getItem($this->getRequestParameter('id'));
		if (!$item)
		{				
			return $this->renderText('0');
		}
								
		// Update the order
		Doctrine::getTable($this->object['table_name'])->moveUp($item->getDisplayOrder(), $item->getId());
		
		// Update
		$item->setDisplayOrder($item->getDisplayOrder() - 1);
 		$item->save();
 		apc_store($this->object['class_name'].'_'.$item->getId(), $item);
		
		return $this->renderText('1');
	}
	
	// View developments
  	public function executeAjaxList()
  	{
    	$this->items = $this->developments;
    	return sfView::SUCCESS;
  	}
  	
}