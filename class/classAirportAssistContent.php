<?php
/*
 * class file which w deal with airport assist content table
 * Created By : Manoj Velyalan
 * Created On : 31/03/2016
 */

namespace airportAssContent;

class airportAssistContent{
    /*
     * function which will return all the content..
     */
    
    public function getAllContent($type){
        $query = new \Parse\ParseQuery("AirportAssist_Content");
        $query->equalTo('type', $type);
        $query->equalTo('status', true);
        $query->ascending('priority');
        $result = $query->find();
        return $result;
    }
    public function getAllServiceList(){
        $query = new \Parse\ParseQuery("AirportAssist_ServiceList");       
        $query->equalTo('status', true);      
        $result = $query->find();
        return $result;
    }
}