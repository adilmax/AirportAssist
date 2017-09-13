<?php
namespace airportAssTravelAgent;
require_once 'classParseSettings.php';
require_once 'class/classCommonFunction.php';

class travelAgent{
        public function travelAgentSignUp($data,$contactNumber,$codeWithOutPlus){
        $airportTravelAgent = new \Parse\ParseUser();
        $accountTypeObject = new \Parse\ParseObject("Responder_Type","aiXsoMOQkV");
        $airportTravelAgent->set('isHidden',false);
        $airportTravelAgent->set('isAgent',true);
        $airportTravelAgent->set("agencyName",  htmlspecialchars(strip_tags($data['agencyName'])));
//        $airportTravelAgent->set("iata",  htmlspecialchars(strip_tags($data['iata'])));
        $airportTravelAgent->set("firstName",  htmlspecialchars(strip_tags($data['firstName'])));
        $airportTravelAgent->set("lastName",  htmlspecialchars(strip_tags($data['lastName'])));
        $airportTravelAgent->set("username", strtolower(htmlspecialchars(strip_tags($data['email']))));
        $airportTravelAgent->set("password", htmlspecialchars($data['password']));
        $airportTravelAgent->set("email", strtolower(htmlspecialchars(strip_tags($data['email']))));
        $airportTravelAgent->set("contactNumber",$contactNumber);
        $airportTravelAgent->set("countryCode",$codeWithOutPlus);
        $airportTravelAgent->set("accountType", "aiXsoMOQkV");       
        $airportTravelAgent->set("accountTypeObject",$accountTypeObject);
        $airportTravelAgent->set("status",true);
        
        try {
            $airportTravelAgent->signUp();
             return $airportTravelAgent->getObjectId();
        } catch (ParseException $ex) {
            // Show the error message somewhere and let the user try again.
           // echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
            return false;
        }
        
    }
public function sendMailToUser($email,$name){
        $subject = 'Your interest in joining the MUrgency Network';
        $message = "Thank you for your interest in joining the MUrgency Airport Travel Agents Network."
                . " One of our associates will connect with you shortly via email.";
        
        $myfile = fopen("emailtemplate.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplate.html"));
        $fileContent1 = str_replace("[name]", $name , $fileContent);
        $fileContent2 = str_replace("[message]", $message , $fileContent1);
        fclose($myfile);
        
        $headers = "From: MUrgency Airport Assistance - <MUAirportAssist@MUrgency.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags("MUAirportAssist@MUrgency.com") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($email, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
        
    }
    
    
    public function sendMailToTravelUser($email,$name,$code){
        $subject = 'Your interest in joining the MUrgency Network';
        $code= "TA-".$code;
        
        $myfile = fopen("travelagentmail.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("travelagentmail.html"));
        $fileContent1 = str_replace("[agentName]", $name , $fileContent);
        $fileContent2 = str_replace("[code]", $code , $fileContent1);
        fclose($myfile);
        
        $headers = "From: MUrgency Airport Assistance - <MUAirportAssist@MUrgency.com>". "\r\n";
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