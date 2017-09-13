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
    public function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;// invalid emailaddress
        }else{
            return true;
        }
    }
    public function validateFile($type){
        $error = [];        
        if (($type == "image/gif") || 
            ($type == "image/jpeg") || 
            ($type == "image/png") || 
            ($type == "image/pjpeg")||
            ($type == "application/pdf")) {
        }else{
            $error[] = "Not a valid file";
        }
        return $error;
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
    
    
}