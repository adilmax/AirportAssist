<?php
namespace airportAssArabHealthCampaign;
require_once 'classParseSettings.php';


class arabHealth{

	public function arabHealthCampaign($data,$campaignName){
		$object = new \Parse\ParseObject("Airport_UserDetails");
		$formName = "Arab_Health_Campaign_Form";
        $object->set('formName',$formName); 
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName',$domainName);
        $object->set('firstName',$data['firstName']);
        $object->set('email',$data['email']);
        $object->set('mobile', $data['mobile']);
        if($campaignName != ""){
          $object->set('campaignName',$campaignName);
          } 
	    try {
            $object->save();
            return true;
        } catch (ParseException $ex) {  
            return false;
        }
   }
}