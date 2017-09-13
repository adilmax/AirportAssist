<?php

/* 
 *class wich deals with FAQ table..
 * Created By : Manoj Velyalan
 * Created On : 31/ 03/2016
 */

namespace airportAssFAQ;

class faq{
    // function will return all the list of FAQ
    
    
    public function getAllFAQ(){
        $query = new \Parse\ParseQuery("AirportAssist_Faq");       
        $query->equalTo('status', true);    
        $query->ascending('priority');
        $result = $query->find();
        for($i=0;$i<count($result);$i++){
            $data[$result[$i]->category][] = [$result[$i]->question,$result[$i]->answer];           
        }
        return $data;
    }
}

