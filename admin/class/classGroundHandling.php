<?php
namespace airportAssGroundHandling;
require_once 'classParseSettings.php';

class groundHandling
{

    public function getAllGhRequest($fromDate, $toDate, $page){

        $query = new \Parse\ParseQuery("GroundHandling");
        $query->notEqualTo("isDelete", true);
        $skip = ($page -1) * 100;
        if($fromDate != ''){
            $query->greaterThanOrEqualTo('createdAt',array("__type"=>"Date","iso"=>date('Y-m-d\Th:i:s',$fromDate)));
        }
        if($toDate != ''){
            $query->lessThanOrEqualTo('createdAt',array("__type"=>"Date","iso"=>date('Y-m-d\Th:i:s',$toDate)));
        }
        $query->skip($skip);
        $query->limit(1000);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    public function getAllRequestCount($fromDate, $toDate){
        $query = new \Parse\ParseQuery("GroundHandling");
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
    public function deleteRequest($objectID){
        $object = new \Parse\ParseObject("GroundHandling",$objectID);
        $object->set('isDelete',true);
        $object->save();
        return true;
    }
    public function getDetails($conCode){
        $query = new \Parse\ParseQuery("GroundHandling");
        $query->equalTo('objectId', $conCode);
        $results = $query->find();
        if(count($results)>0){
            return $results[0];
        }else{
            return false;
        }
    }
}