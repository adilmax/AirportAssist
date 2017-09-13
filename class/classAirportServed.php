<?php
namespace airportServed;
require_once 'classParseSettings.php';


class airportServed{
    public function getAirportCountry(){    
        $data = [];
        $query = new \Parse\ParseQuery("AirportServed");
        $query->addAscending("Country");
        $query->limit(1000);
        $results = $query->find();
        $country = "";
        for($i=0;$i<count($results);$i++){
            if($country != $results[$i]->Country){
                $country = $results[$i]->Country;
               $data[] = $results[$i]->Country;
            }
        }
        return $data;
    }
    public function getAirportServed($countryName){   
        $data = [];
        $query = new \Parse\ParseQuery("AirportServed");
        if($countryName != ""){
            $query->equalTo("Country",$countryName);
        }
        $query->addAscending("Country");
        $query->limit(1000);
        $results = $query->find();
        $country = "";
        for($i=0;$i<count($results);$i++){
            if($country != $results[$i]->Country){
                $country = $results[$i]->Country;
            }
            $data[$country][] = $results[$i]->airportName;
        }
        return $data;
    }
    public function countryList(){
      // $data = [];
        $query = new \Parse\ParseQuery("AirportServed");
        $query->ascending("Country");
        $query->limit(1000);
        $results = $query->find();       
         for($i=0;$i<count($results);$i++){            
            $data[] = $results[$i]->Country;
        }    
        return array_unique($data);
       
        
    }
}
