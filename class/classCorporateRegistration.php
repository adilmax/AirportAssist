<?php
namespace airportAssCorporateRegistration;
require_once 'classParseSettings.php';
require_once 'class/classCommonFunction.php';

class corporateRegistration {
    public function corporateSignUp($data,$contactNumber,$codeWithOutPlus){        
        $airportCorporate = new \Parse\ParseUser();
        $accountTypeObject = new \Parse\ParseObject("Responder_Type","tDB8LDzrjw");
        $airportCorporate->set('isHidden',false);
        $airportCorporate->set('isCorporate',true);
        $airportCorporate->set("companyName",  htmlspecialchars(strip_tags($data['companyName'])));     
        $airportCorporate->set("companyID",  htmlspecialchars(strip_tags($data['corporateId'])));
        $airportCorporate->set("username", strtolower(htmlspecialchars(strip_tags($data['email']))));
        $airportCorporate->set("password", htmlspecialchars($data['password']));
        $airportCorporate->set("email", strtolower(htmlspecialchars(strip_tags($data['email']))));
        $airportCorporate->set("contactNumber",$contactNumber);
        $airportCorporate->set("countryCode",$codeWithOutPlus);
        $airportCorporate->set("firstName",  htmlspecialchars(strip_tags($data['contactPerson'])));
        $airportCorporate->set("lastName",  htmlspecialchars(strip_tags($data['lastName']))); 
        $airportCorporate->set("accountType", "tDB8LDzrjw");       
        $airportCorporate->set("accountTypeObject",$accountTypeObject);
        $airportCorporate->set("status",true);
        
        try {
            $airportCorporate->signUp();
            return $airportCorporate->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
        
    }
public function sendMailToUser($email,$name){
        $subject = 'Your interest in joining the MUrgency Network';
        $message = "Thank you for your interest in joining the MUrgency Airport Assistant Network. "
                . "One of our associates will connect with you shortly via email.";
        
        $myfile = fopen("emailtemplate.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplate.html"));
        $fileContent1 = str_replace("[name]", $name , $fileContent);
        $fileContent2 = str_replace("[message]", $message , $fileContent1);
        fclose($myfile);
        
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags("MUAirportAssist@MUrgency.com") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($email, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
        
    }

        public function sendMailToCorporateUser($email, $fullName, $code){
        $subject = 'Your interest in joining the MUrgency Network';
        $code= "CO-".$code;
        $myfile = fopen("corporatemail.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("corporatemail.html"));
        $fileContent1 = str_replace("[companyName]", $fullName, $fileContent);
        $fileContent2 = str_replace("[code]", $code , $fileContent1);
        fclose($myfile);
        
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags("MUAirportAssist@MUrgency.com") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($email, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
        
    }
}
