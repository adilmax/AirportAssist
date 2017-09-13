<?php
namespace  airportAssGiftCard;
require_once 'class/classParseSettings.php';



class giftCard
{
	public function getAllRequest($fromDate, $toDate, $page){
        
        $query = new \Parse\ParseQuery("GiftCard");   
        $query->notEqualTo("isDelete", true);
         $skip = ($page -1) * 10;
        if($fromDate != ''){
            $query->greaterThanOrEqualTo('createdAt',array("__type"=>"Date","iso"=>date('Y-m-d\Th:i:s',$fromDate)));
        }
        if($toDate != ''){
            $query->lessThanOrEqualTo('createdAt',array("__type"=>"Date","iso"=>date('Y-m-d\Th:i:s',$toDate)));
        }
        $query->skip($skip);
        $query->limit(10);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    public function getAllRequestCount($fromDate, $toDate){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->notEqualTo("isDelete", true);
        if($fromDate != ''){
            $query->greaterThanOrEqualTo('createdAt',array("__type"=>"Date","iso"=>date('Y-m-d\Th:i:s',$fromDate)));
        }
        if($toDate != ''){
            $query->lessThanOrEqualTo('createdAt',array("__type"=>"Date","iso"=>date('Y-m-d\Th:i:s',$toDate)));
        }
        $query->descending("createdAt");
        return $query->count();
    }
   public function getDetails($objectID){
        $object = new \Parse\ParseObject("GiftCard",$objectID);
        $object->fetch();       
        return $object; 
    }


     public function deleteRequest($objectID){
        $object = new \Parse\ParseObject("GiftCard",$objectID);
        $object->set('isDelete',true);
        $object->save();
        return true;
    }
}