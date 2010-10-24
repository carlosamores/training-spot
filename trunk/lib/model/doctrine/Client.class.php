<?php

/**
 * Client
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Client extends BaseClient
{

	private function getLastDateOf($something) {

		  $q = Doctrine_Query::create()
	  	    ->select("MAX(date) as date")
    		->from($something)
    		->where('client_id = ?', $this->getId());
    	
    		$result = $q->fetchOne();
    		return ($result['date'])?$result["date"]:" SIN DATOS " ;
		
	}
	public function getLastMedicalRevisionDate() {
		return $this->getLastDateOf("MedicalRevision");
	}
	public function getLastMembershipFeeDate() {
		return $this->getLastDateOf("MembershipFee");	
	}
}
