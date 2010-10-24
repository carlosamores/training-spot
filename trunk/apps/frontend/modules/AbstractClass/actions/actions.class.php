<?php

require_once dirname(__FILE__).'/../lib/AbstractClassGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/AbstractClassGeneratorHelper.class.php';

/**
 * AbstractClass actions.
 *
 * @package    sf_sandbox
 * @subpackage AbstractClass
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AbstractClassActions extends autoAbstractClassActions
{
	    public function executeClasses(sfWebRequest $request) {
	    	$place = $request->getParameter('place');
	    	
	    	if (! $place)
	    		$place = "Pileta Chica";
	    		 
	    	$place = Doctrine::getTable('Place')-> findOneByPlaceName($place); 
	    	$this->place = $place;   
	    	$this->places = Doctrine_Core::getTable('Place')->findAll();
	    	$this->all_classes = Doctrine_Core::getTable('AbstractClass')->getClassesForPlace($place);
	    }
	    
	    public function executeGetClassInfo(sfWebRequest $request) {
	    	//solo atiendo por ajax
	    	if (!$request->isXmlHttpRequest())
	    	   return "";
	    	   
	    	   
	    	$class_id = $request->getParameter('id');
			if (!$class_id)
				return "";
		    	
	    	$class = Doctrine_Core::getTable('AbstractClass')->find($class_id);
	    	
	    	$json_class = array("id"=>$request->getParameter('id'));
	    	$json_class["startTime"] = $class->getStartTime();
	    	$json_class["endTime"] = $class->getEndTime();
	    	$json_class["day"] = $class->getDayOfTheWeek();
	    	
	    	$coaches = array();
	    	foreach($class->getCoaches() as $coach) 
	    		$coaches[$coach->getId()] = $coach->__toString();
	    	
	    	$json_class["coaches"] = $coaches;
		    $json_class["place"] = $class->getPlace()->__toString();
		    $json_class["class_type"] = $class->getClassType()->__toString();

		 	
		 	return $this->renderText(json_encode($json_class));
  
	    }
	    
}
