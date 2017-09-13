<?php
namespace airportAssResponder;
require_once 'classParseSettings.php';
require_once 'class/classCommonFunction.php';

class responder{
    
   
    public  function getActiveCountry(){
        $query = new \Parse\ParseQuery("Country");
        $query->equalTo("Root", "0");
        $query->notEqualTo("Title", 'All');
        $query->ascending("Title");
       
        $query->limit(300);
        $results = $query->find(); 
        $country = [];
        for ($i = 0; $i < count($results); $i++) { 
            $object = $results[$i];
            $country[$object->ID] = $object->Title;
        }
        return $country;
        
    }
    public function getPlaceTitle($id){
        
        $query = new \Parse\ParseQuery("Country");
        $query->equalTo('Root', $id);
        $query->ascending("Title");
        $query->limit(300);
        $results = $query->find(); 
        $placeTitle = [];
        for ($i = 0; $i < count($results); $i++) { 
            $object = $results[$i];
            $placeTitle[$object->ID] = $object->Title;
        }
        
        return $placeTitle;
    }
    public function checkMobile($mobileNumber){
        $query = new \Parse\ParseQuery("_User");
        $query->equalTo("contactNumber", $mobileNumber);
        $result = $query->find();
        if(count($result)== 0){
            return true;
        }else{
            return false;
        }
    }
    public function getAllLanguages(){
        $query = new \Parse\ParseQuery("AirportLanguages");
        $query->ascending("priority");
        $results = $query->find(); 
        for ($i = 0; $i < count($results); $i++) { 
            $object = $results[$i];
            $language[$object->getObjectId()] = $object->language;
        }
        return $language;
    }
    public function responderSignUp($data,$contactNumber,$codeWithOutPlus){        
        $airportResponder = new \Parse\ParseUser();
        $accountTypeObject = new \Parse\ParseObject("Responder_Type","h5aZwJe0nn");
        $airportResponder->set('isHidden',false);
        $airportResponder->set('isAirportResponder',true);
        $airportResponder->set("username", strtolower(htmlspecialchars(strip_tags($data['email']))));
        $airportResponder->set("password", htmlspecialchars($data['password']));
        $airportResponder->set("email", strtolower(htmlspecialchars(strip_tags($data['email']))));
        $airportResponder->set("contactNumber",$contactNumber);
        $airportResponder->set("countryCode",$codeWithOutPlus);
        $airportResponder->set("firstName",  htmlspecialchars(strip_tags($data['firstName'])));
        $airportResponder->set("lastName",  htmlspecialchars(strip_tags($data['lastName']))); 
        $airportResponder->set("accountType", "h5aZwJe0nn");       
        $airportResponder->set("accountTypeObject",$accountTypeObject);
        $airportResponder->set("status",false);
        
        try {
            $airportResponder->signUp();
            return true;
        } catch (ParseException $ex) {
            // Show the error message somewhere and let the user try again.
           // echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
            return false;
        }
        
    }
    public function signUP($username,$password){
        $user = \Parse\ParseUser::logIn($username, $password);
        $currentUser = \Parse\ParseUser::getCurrentUser();
        if($currentUser->accountType == "h5aZwJe0nn"){
            return true;
        }else{
            \Parse\ParseUser::logOut();
            return false;
        }
    }
    
    public function addBackInfo($data, $currentUser){
        
        $commonFunction  = new \murCommon\CommonFunction;
       
        if($currentUser->backgroundInfo != ''){
            $airportBackInfo = $currentUser->backgroundInfo;
        }else{
            $airportBackInfo = $commonFunction->createUserFieldObject($currentUser, "backgroundInfo", "Background_Info");            
        }                
        if($_FILES['front_image']["name"]!=""){
            $frontIdImage = $commonFunction->processFile($_FILES['front_image']);
            $airportBackInfo->set('frontIdCopy',$frontIdImage);       
        }else{
            $frontIdImage = true;
        }
        if($_FILES['back_image']["name"]!=""){
            $backIdImage = $commonFunction->processFile($_FILES['back_image']);
            $airportBackInfo->set('backIdCopy',$backIdImage);       
        }else{
            $backIdImage = true;
        }
        
        if($backIdImage != false || $frontIdImage != false){
            $airportBackInfo->set('address1',$data['address']);
            $airportBackInfo->set('country',$data['country']);
            $airportBackInfo->set('state',$data['state']);
            $airportBackInfo->set('city',$data['city']);
            $airportBackInfo->set('zipCode',$data['pinCode']);
            $airportBackInfo->set('idNo',$data['idNumber']);

            if(isset($data['expDate'])){
                if($data['expDate'] != ""){
                    $expDate = new \DateTime($data['expDate']);
                    $airportBackInfo->set('idExpireDate',$expDate);
                }
            } 

            $airportBackInfo->set('idDetails',$data['idtype']);

            try {
                $airportBackInfo->save();
                return true;
            } catch (ParseException $ex) {  
               return false;
            }
        }else{
            return false;
        }       
    }
    
     public function addReference($data, $currentUser){ 
        $commonFunction  = new \murCommon\CommonFunction;
        if($currentUser->references != ''){
            $object = $currentUser->references;
        }else{
            $object = $commonFunction->createUserFieldObject($currentUser, "references", "References");            
        }
        
        $object->set('refName',$data['reftName']);
        $object->set('title',$data['designation']);
        $object->set('email',$data['email']);
        $object->set('organization',$data['comName']);
        $object->set('refPhone',$data['mobNumber']);      
        
        $object->set('refName1',$data['reftName1']);
        $object->set('title1',$data['designation1']);
        $object->set('email1',$data['email1']);
        $object->set('organization1',$data['comName1']);
        $object->set('refPhone1',$data['mobNumber1']);  
        
        try {
            $object->save();
            return true;
        } catch (ParseException $ex) {  
           return false;
        }
    }
    public function addWorkEducation($data, $currentUser){
        $commonModel = new \murCommon\CommonFunction;
        
        if($currentUser->airportWorkEducation != ''){
            $object = $currentUser->airportWorkEducation;
        }else{
            $object = $commonModel->createUserFieldObject($currentUser, "airportWorkEducation", "AirportWorkEducation");            
        }   
            if($_FILES['front_image']["name"]!=""){
                $frontImage = $commonModel->processFile($_FILES['front_image']);
                $object->set('airportIDFront',$frontImage);       
            }else{
                $frontImage = true;
            }
            
            if($_FILES['back_image']["name"]!=""){
                $backImage = $commonModel->processFile($_FILES['back_image']);
                $object->set('airportIDBack',$backImage);       
            }else{
                $backImage = true;
            }
            
            if($_FILES['eduCertificate']["name"]!=""){
                $imageEduCertificate = $commonModel->processFile($_FILES['eduCertificate']);
                $object->set('eduCertificate',$imageEduCertificate);       
            }else{
                $imageEduCertificate = true;
            }
            if($_FILES['expCertificate']["name"]!=""){
                $imageExpCertificate = $commonModel->processFile($_FILES['expCertificate']);
                $object->set('expCertificate',$imageExpCertificate);       
            }else{
                $imageExpCertificate = true;
            }
            
            if($imageExpCertificate != false || $imageEduCertificate != false || $backImage != false || $frontImage != false){
             $object->set('educationLevel',$data['educationLevel']);
             $object->set('otherEdu',$data['otherEdu']);
             $object->set('educationField',$data['educationField']);
             $object->set('addQualification',$data['addQualification']);
             $object->set('occupation',$data['occupation']);
             $object->set('airWorkExp', (bool)$data['conditionExp']);
             $object->set('expAirName',$data['expAirName']);
             $object->set('designation',$data['designation']);
             $object->set('yearExp',(int)$data['yearExp']);
            if(isset($data['joinDate'])){
                if($data['joinDate'] != ""){
                    $joinDate = new \DateTime($data['joinDate']);
                    $object->set('joinDate',$joinDate);
                }
            }
             $object->set('crptrained',(bool)$data['crptrained']);
             $object->set('clearance', (bool)$data['condition']);
             $object->set('airportName',$data['airportName']);
              try {
                $object->save();
                return true;
            } catch (ParseException $ex) {  
                return false;
            }
        }  
    
    }
    public function addGeneralInfo($data, $currentUser) {
        $commonModel = new \murCommon\CommonFunction;
        
        if($currentUser->responderInfo != ''){
            $object = $currentUser->responderInfo;
        }else{
            $object = $commonModel->createUserFieldObject($currentUser, "responderInfo", "General_Info");            
        }         
        
        if($_FILES['photo']["name"]!=""){
            $imagePhoto = $commonModel->processFile($_FILES['photo']);
            $currentUser->set('profileImage',$imagePhoto);       
        }else{
            $imagePhoto = true;
        }

        if($imagePhoto != false){
            $currentUser->set('firstName',$data['firstName']);
            $currentUser->set('lastName',$data['lastName']);
            $currentUser->set('middleName',$data['middleName']);
            $currentUser->save();
                    
            $object->set('gender',($data['gender'])?true:false);
            $object->set('dateOfBirth',$data['dateOfBirth']);
            $object->set('luggage',$data['luggageLift']);
            $object->set('nationality',(int)$data['nationality']);
            
            if(count($data['language']) > 0){
                $object->setArray('language',$data['language']);
            }
            
            try{
               
                $object->save();
                return true;
            } catch (ParseException $ex) {  
                return false;
            }
        }
    }
    public function resetPassword($email){
        $query = new \Parse\ParseQuery("_User");
        $query->equalTo("email", $email);
        //$query->equalTo("accountType","h5aZwJe0nn");
        $results = $query->count();
        if($results > 0){  
        try {
                \Parse\ParseUser::requestPasswordReset($email);
                return true;
            } catch (ParseException $ex) {
                return false;
            }
        }else{
            return false;
        }
    }
    
}


