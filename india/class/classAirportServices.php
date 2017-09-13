<?php

namespace airportServices;
require_once 'classParseSettings.php';

class services{

	public function quickContact($data){
	$object = new \Parse\ParseObject("Airport_UserDetails");
	$domainName = $_SERVER['SERVER_NAME'];
	$quickForm = 'index page Quick Form';
	$object->set('domainName',$domainName);
        $object->set('firstName',$data['firstName']);
        $object->set('lastName',$data['lastName']);
        $object->set('email', $data['email']);
        $object->set('originAirport', $data['quickOrigin']);
        $object->set('formName', $quickForm);
        try{
        	$object->save();
        	return $object->getObjectId();
        }catch(ParseException $ex){
        	return false;
        }
	}

	public function arrivalServices($data){
	$object = new \Parse\ParseObject("Airport_UserDetails");
	$domainName = $_SERVER['SERVER_NAME'];
	$arrivalServices = 'Arrival services form';
	$object->set('domainName',$domainName);
        $object->set('firstName',$data['arrivalName']);
        $object->set('email', $data['arrivalEmail']);
        $object->set('originAirport', $data['arrivalOriginAirport']);
        $object->set('arrivalAirport', $data['arrivalAirport']);
        $object->set('arrivalTime', $data['arrivalTime']);
        $object->set('flightNumber', $data['flightNumber']);
        $object->set('indiaServices', $data['arrivalService']);
        $object->set('formName', $arrivalServices);
        try{
        	$object->save();
        	return $object->getObjectId();
        }catch(ParseException $ex){
        	return false;
        }
	}
	
	public function departureServices($data){
        $serviceListObject = new \Parse\ParseObject("AirportServiceType",'HiYpSfhlpN');
	$object = new \Parse\ParseObject("Airport_UserDetails");
	$domainName = $_SERVER['SERVER_NAME'];
	$departureServices = 'Departure Services Form';
	$object->set('domainName',$domainName);
	$object->set('firstName',$data['departureName']);
        $object->set('email', $data['departureEmail']);
        $object->set('departureAirport', $data['departureAirport']);
        $object->set('destinationAirport', $data['destinationAirport']);
        $object->set('departureTime', $data['departureTime']);
        $object->set('departureFlightNumber', $data['departureFlightNumber']);
        $object->set('indiaServices', $data['departureService']);
        $object->set('formName', $departureServices);
        try{
        	$object->save();
        	return $object->getObjectId();
        }catch(ParseException $ex){
        		return false;
        	}
        }
	
	public function transitServices($data){
	$object = new \Parse\ParseObject("Airport_UserDetails");
	$domainName = $_SERVER['SERVER_NAME'];
	$transitServices = 'Transit services form';
	$object->set('domainName', $domainName);
        $object->set('firstName',$data['transitName']);
        $object->set('email', $data['transitEmail']);
        $object->set('originAirport', $data['transitOriginAirport']);
        $object->set('arrivalAirport', $data['transitArrivalAirport']);
        $object->set('arrivalTime', $data['transitArrivalTime']);
        $object->set('transitFlightNumber',$data['transitFlightNumber']);
        $object->set('departureAirport', $data['transitDepartureAirport']);
        $object->set('destinationAirport', $data['transitDestinationAirport']);
        $object->set('departureTime', $data['transitDepartureTime']);
        $object->set('departureFlightNumber', $data['transitDepartureFlightNumber']);
        $object->set('indiaServices', $data['transitService']);
        $object->set('formName', $transitServices);
        try{
        	$object->save();
        	return $object->getObjectId();
        }catch(ParseException $ex){
        	return false;
        }
	}

public function limousineServices($data){
	$object = new \Parse\ParseObject("Airport_UserDetails");
	$domainName = $_SERVER['SERVER_NAME'];
	$limousineServices = 'Limousine services form';
	$object->set('domainName', $domainName);
        $object->set('firstName',$data['limousineName']);
        $object->set('lastName',$data['limousineLastName']);
        $object->set('email', $data['limousineEmail']);
        $object->set('arrivalTime', $data['limousineArrivalTime']);
        $object->set('IsPickUp', ($data['IsPickUp']=="true")?true:false);
        $object->set('originAirport', $data['limousineOriginAirport']);
        $object->set('flightNumber', $data['limousineFlightNumber']);
        if($data['IsPickUp'] =='pickupAddress'){
            $object->set('pickUpOrDropAddress',$data['limousinePickUpOrDropAddress']);
        }
        if ($data['IsPickUp'] == 'dropAddress'){
            $object->set('pickUpOrDropAddress',$data['limousinePickUpOrDropAddresses']);
        }

        $object->set('indiaServices', $data['limousineService']);
        $object->set('formName', $limousineServices);
         try{
        	$object->save();
        	return $object->getObjectId();
        }catch(ParseException $ex){
        	return false;
        }

	}
    public function sendMailToAdmin($quickContact,$email){
        $subject = 'Airport Assistance Enquiry';
        //$to = "a.ansari@murgency.com";
        $to = "s.markose@murgency.com,m.velyalan@murgency.com";
        $sentmessage = "New Enquiry has been submitted with the reference number <b>$quickContact.</b> ";
        // $to = "s.mather@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplateforadmin.html"));

        $fileContent2 = str_replace("[message]", $sentmessage , $fileContent);
        fclose($myfile);
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($to, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
    }

	public function sendMailToAdminDeparture($departureServices,$email){
        $subject = 'Airport Assistance Enquiry';
        //$to = "a.ansari@murgency.com";
        $to = "s.markose@murgency.com,m.velyalan@murgency.com";
        $sentmessage = "New Enquiry has been submitted with the reference number <b>$departureServices.</b> ";
       // $to = "s.mather@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplateforadmin.html"));
       
        $fileContent2 = str_replace("[message]", $sentmessage , $fileContent);
        fclose($myfile);
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($to, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
    }
    public function sendMailToAdminArrival($arrivalServices,$email){
        $subject = 'Airport Assistance Enquiry';
        //$to = "a.ansari@murgency.com";
        $to = "s.markose@murgency.com,m.velyalan@murgency.com";
        $sentmessage = "New Enquiry has been submitted with the reference number <b>$arrivalServices.</b> ";
        // $to = "s.mather@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplateforadmin.html"));

        $fileContent2 = str_replace("[message]", $sentmessage , $fileContent);
        fclose($myfile);
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($to, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
    }
    public function sendMailToAdminTransit($transitServices,$email){
        $subject = 'Airport Assistance Enquiry';
        //$to = "a.ansari@murgency.com";
        $to = "s.markose@murgency.com,m.velyalan@murgency.com";
        $sentmessage = "New Enquiry has been submitted with the reference number <b>$transitServices.</b> ";
        // $to = "s.mather@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplateforadmin.html"));

        $fileContent2 = str_replace("[message]", $sentmessage , $fileContent);
        fclose($myfile);
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($to, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
    }
    public function sendMailToAdminLimousine($limousineServices,$email){
        $subject = 'Airport Assistance Enquiry';
        //$to = "a.ansari@murgency.com";
        $to = "s.markose@murgency.com,m.velyalan@murgency.com";
        $sentmessage = "New Enquiry has been submitted with the reference number <b>$limousineServices.</b> ";
        // $to = "s.mather@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("emailtemplateforadmin.html"));

        $fileContent2 = str_replace("[message]", $sentmessage , $fileContent);
        fclose($myfile);
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($to, $subject, $fileContent2, $headers)){
            return true;
        }else{
            return false;
        }
    }

    public function sendMailToUser($email,$name){
        $subject = 'Your enquiry to MUrgency Airport Assistance';
        $message = "Thank you for your enquiry. We are totally committed to providing the best airport assistance in all major airports across the world. 
                                We will get back to you shortly.";
        
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
}