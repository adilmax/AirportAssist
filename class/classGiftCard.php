<?php

namespace  airportAssGiftCard;
require_once 'class/classParseSettings.php';



class giftCard
{

    public function addCartToTable($content,$email,$name,$chargeId,$percentage)
    {

        for($i=0;$i<count($content);$i++){
             $object = new \Parse\ParseObject("GiftCard");
             $file = $this->uploadFile($content[$i]['image']);
             $object->set('image', $file);
             $object->set('message',$content[$i]['message']);
             $object->set('amount',(int)$content[$i]['amount']);
             $object->set('senderEmail',$email);
             $object->set('senderName',$name);
             $object->set('paymentId',$chargeId);
            $object->set('offerValue',(int)$percentage);
             $object->set('paymentStatus',true);
             $object->save();
             $data[] = $object->getObjectId();
        }
        return $data;

    }
 public function fetchGiftCard($objectId){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->containedIn('objectId',$objectId);
        $query->notEqualTo('isSendMail',true);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    public function deleteCard($objectID){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->equalTo("objectId", $objectID);
        $result = $query->find();
        if(count($result)>0){
            $object = $result[0];
            $object->set("status",false);
            $object->save();
            return true;
        }else{
            return false;
        }
    }

    public function moveUploadFile($file){
        $errorNumber  = 0;
        $target_dir = "giftcard/";
        $target_file = $target_dir . basename($file["file-0"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image

        $check = getimagesize($file["file-0"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error =  "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($file["file-0"]["size"] > 500000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
             $data["error"] = true;
             $data['value'] = $error;
             return $data;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["file-0"]["tmp_name"], $target_file)) {
                $data["error"] = false;
                $data['value'] = $file["file-0"]["name"];
                return $data;
            } else {
                $errorNumber = 4;//echo "Sorry, there was an error uploading your file.";
                $data["error"] = true;
                $data['value'] = "Sorry, there was an error uploading your file.";
                return $data;
            }
        }
    }
    public function addToCard($content){
        $_SESSION['content'][] = $content;
    }
    public function uploadFile($filename){
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = "giftcard.".$ext;
        $fileContent = file_get_contents(htmlspecialchars("giftcard/".$filename),"rb");
        $file = \Parse\ParseFile::createFromData($fileContent,$newFilename);
        if($file->save()){
            return $file;
        }else{
            return false;
        }
    }

    public function sendMailToAdmin($refNumber,$email){
        $subject = 'New order for Gift Card';
        $to = "s.markose@murgency.com,m.velyalan@murgency.com,m.miyazi@murgency.com ";
        $sentmessage = "New Oder for Gift Card has been Submitted <b>$refNumber.</b> ";

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
    public function sendMailToSender($senderName,$senderEmail, $receiverEmail){
        $subject = 'Your EGift Card Sent Successfully';
        
        $myfile = fopen("sendergiftmail.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("sendergiftmail.html"));

        $fileContent2 = str_replace("[SenderName]", $senderName , $fileContent);
        $fileContent3 = str_replace("[recipientEmail]", $receiverEmail , $fileContent2);
        fclose($myfile);
        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags($receiverEmail) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($senderEmail, $subject, $fileContent3, $headers)){
            return true;
        }else{
            return false;
        }
    }
    public function sendMailToUser($senderName,$receiverName,$email,$coupanCode,$image,$message,$amount){
        $subject = "$senderName has sent you an eGift Card.";
        $myfile = fopen("giftemailtouser.html", "r") or die("Unable to open file!");
        $fileContent =  fread($myfile,filesize("giftemailtouser.html"));
        $fileContent1 = str_replace("[senderName]", $senderName , $fileContent);
        $fileContent2 = str_replace("[message]", $message , $fileContent1);
        $fileContent3 = str_replace("[url]", $image , $fileContent2);
        $fileContent4 = str_replace("[couponCode]", $coupanCode , $fileContent3);
        $fileContent5 = str_replace("[amount]", $amount , $fileContent4);
        $fileContent6 = str_replace("[receiverName]", $receiverName , $fileContent5);
        
        
        fclose($myfile);

        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>". "\r\n";
        $headers .= "Reply-To: ". strip_tags("MUAirportAssist@MUrgency.com") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($email, $subject, $fileContent6, $headers)){
            return true;
        }else{
            return false;
        }

    }

    public function updateReceiverInfo($data, $couponCode){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->equalTo('objectId',$couponCode);
        $query->descending("createdAt");
        $results = $query->find();
        if(count($results)>0){
            $object = $results[0];
            $object->set('receiverName',$data['receiverName']);
            $object->set('receiverEmail',$data['receiverEmail']);
            $object->set('isSendMail',true);
            $object->save();
            $this->sendMailToUser(ucwords($object->senderName),ucwords($object->receiverName),$object->receiverEmail,$object->getObjectId(),$object->image->getURL(),$object->message,$object->amount);
            $this->sendMailToAdmin($object->getObjectId(), $object->senderEmail);
            $this->sendMailToSender(ucwords($object->senderName),$object->senderEmail, $object->receiverEmail);
            return true;
        }else {
            return false;
        }
    }
    public function updateReceiverName($couponCode,$rname){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->equalTo('objectId',$couponCode);
        $query->descending("createdAt");
        $results = $query->find();
        if(count($results)>0){
            $object = $results[0];
            $object->set('receiverName',$rname);
            $object->save();
            return $object;
        }else{
            return false;
        }
    }
    public function getDetails($couponCode){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->equalTo('objectId', $couponCode);
        $results = $query->find();
        if(count($results)>0){
            return $results[0];
        }else{
            return false;
        }
    }
    public function getSenderName($objectId){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->equalTo('objectId', $objectId);
        $results = $query->find();
        return $results[0]->senderName;
    }
    public function getAmount($objectId){
        $query = new \Parse\ParseQuery("GiftCard");
        $query->equalTo('objectId', $objectId);
        $results = $query->find();
        if(count($results)>0){
           $totalAmount = $results[0]->amount;
           $consumedAmount = $this->getConsumedAmount($results[0]);
           $availableAmount = $totalAmount-$consumedAmount;
           return $availableAmount;
        }else{
            return false;
        }
    }


   public function getConsumedAmount($object)
   { 
        $amount = 0;
        $query = new \Parse\ParseQuery("GiftCardPayments");
        $query->equalTo('couponCode',$object);
        $results = $query->find();
        for ($i=0; $i < count($results) ; $i++) { 
            $amount += $results[$i]->amount; 
        }
        return $amount;
   }

    public function addAmount($data){
        $object = new \Parse\ParseObject("GiftCardPayments");
        $object->set('amount',$data['amount']);
        $object->set('couponCode',$data['cardCode']);
        try{
         $object->save();
         return true;
         } catch (ParseException $ex) {  
         return false;
         }
     }


}