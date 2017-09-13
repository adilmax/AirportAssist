<?php
/*
 * Validation class...
 * All input validation contained this class..
 */
namespace airportAssValidation;
class inputValidation{
    
    //function used for checking input field is empty or not..
    public function checkEmpty($data , $notRequired = [])
    {
        $error = [];
        foreach($data as $key=>$value){
           if($value != 'jobLocation'){
            $splittedValue = ucfirst(join(preg_split('/(?=[A-Z])/',$key), " " ));
            if(htmlspecialchars($value == '' && !in_array($key, $notRequired))){
                $error[] = 'Please enter '.$splittedValue;
            }
           }
        }
        return $error;
    }
    public function checkRequiredValue($data , $required){
        $error = [];
        foreach($required as $key=>$value){
            if(isset($data[$key])){
                if($data[$key] == ''){               
                    $error[] = 'Please enter '.$value;
                }
            }else{
                $error[] = 'Please enter '.$value;
            }
        }
        return $error;
    }
    
    public function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;// invalid emailaddress
        }else{
            return true;
        }
    }
    
    public function validateDocFile($type){
        //echo $type;
        $error = [];
        if(($type == "application/msword")||
            ($type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){             
        }else{
            $error[] = "Not a valid file";
        }
        return $error;
    }
    public function isCityDomain($serverName){
        $domain = ['emergencyairportassistance.com',"murgencyairportassistance.com"];
        if(in_array(strtolower($serverName),$domain)){
            return false;
        }else{
            return true;
        }
        
    }
    
    public function FormatName($serverName){
        $data = [];
        $word = "airportassistance.com";
        $otherAirport = ["AirportAssistanceCenter",
                            "AirportAssistanceForChildren",				
                            "AirportAssistanceFordisabled",				
                            "AirportAssistanceForelderly",				
                            "AirportAssistanceForFirstTimeFlyer",				
                            "AirportAssistanceForMinors",			
                            "AirportAssistanceForNonEnglishSpeakers",
                            "AirportAssistanceForSeniors",				
                            "AirportAssistanceForVip",			
                            "AirportAssistanceService"];
        if(strpos(strtolower($serverName), $word)){
            $value = str_replace($word, "", strtolower($serverName));
            $data['domainName'] = ucfirst($value."AirportAssistance.com");        
            $data['titleName'] = ucfirst($value." Airport Assistance");
        }else{
            for($i=0;$i<count($otherAirport);$i++){
             if(strtolower($serverName) === strtolower($otherAirport[$i])){                   
                    $pieces = preg_split('/(?=[A-Z])/',$otherAirport[$i]);
                    $value = "";
                    for($i=1;$i<count($pieces);$i++){
                        $value = $value." ".$pieces[$i];
                    }
                    $data['domainName'] = $otherAirport[$i]."com" ;
                    $data['titleName'] = $value;
                    break;
                }
            }
           				
        }
        if(count($data)>0){
            return $data;
        }else{
            return false;
        }
    }
    public function airportServedName($serverName){
        $data = [];
        $word = "airportassistance.com";       
        if(strpos(strtolower($serverName), $word)){
            $value = str_replace($word, "", strtolower($serverName));                   
            $data['titleName'] = ucfirst($value." Airport");
        }			
        if(count($data)>0){
            return $data;
        }else{
            return false;
        }  
    }
    public function checkMobileNumber($mobileNumber){
        $query = new \Parse\ParseQuery("_User");
        $query->equalTo("contactNumber", $mobileNumber);
        $count = $query->count();
        if($count == 0){
            return true;
        }else{
            return false;
        } 
    }
    public function emailExcist($email){
        $query = new \Parse\ParseQuery("_User");
        $query->equalTo("username", $email);
        $count = $query->count();
        if($count == 0){
            return true;
        }else{
            return false;
        } 
    }
    public function checkRequiredValueWithoutLabel($data , $required, $label){
        $error = [];
        foreach($required as $key=>$value){
            if(isset($data[$value])){
                if($data[$value] == ''){               
                    $error[] = 'Please enter '.$label[$value];
                }
            }else{
                $error[] = 'Please enter '.$label[$value];
            }
        }
        return $error;
    }

 public function validateFile($type){
        $error = [];        
        if (($type == "image/jpeg") || 
            ($type == "image/png") || 
            ($type == "image/pjpeg")||
            ($type == "application/pdf")) {
        }else{
            $error[] = "Not a valid file";
        }
        return $error;
    }
    public function validateImage($type){
        $error = [];        
        if (($type == "image/jpeg") || 
            ($type == "image/png") || 
            ($type == "image/pjpeg")){
            
        }else{
            $error[] = "Not a valid file";
        }
        return $error;
    }
    public function giftAmount($giftAmount)
    {
        $error = [];
        if ($giftAmount > 500) {
            $error[] = "Total amount should be less than $500";
        }
        return $error;
    }
}