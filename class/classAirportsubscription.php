<?php

namespace airportSubscribe;
require_once 'class/classParseSettings.php';


class subscribe{
    
    
    public function addSubscribe($email){

        //echo $email;
        $emailStatus = $this->isEmailIDExcist($email);
        if($emailStatus){
            $object = new \Parse\ParseObject("AirportSubscribe");
            $object->set('email',$email);
            try {
                $object->save();
                return 1;
            } catch (ParseException $ex) {  
                return 3;
            } 
        }else{
            return 2;
        }
    }
    
    public function isEmailIDExcist($email){
        $query = new \Parse\ParseQuery("AirportSubscribe");
        $query->equalTo("email", $email);
        $count = $query->count();
        if($count == 0){
            return true;
        }else{
            return false;
        }
    }
    
}