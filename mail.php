 <? $subject = 'Airport Assistance Enquiry';
        //$to = "contactus@murgency.com";
       // $to = "s.markose@murgency.com ";
        $email = "manojvelyalan@gmail.com";
        $sentmessage = "New Enquiry has been submitted with the reference number 345345345. ";
        $to = "m.velyalan@murgency.com";
        $headers = "From: " . strip_tags("contact@emergencyairportassistance.com") . "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($to, $subject, $sentmessage, $headers)){
            echo "true";
        }else{
            echo "false";
        }
        
        
        $subject = 'Airport Assistance Enquiry';
        $email = "response@murgency.com";
        $headers = "From: MUrgency - One Global Emergency Response Network <$email>". "\r\n";
        $headers .= "Reply-To: ". $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to, $subject, $message, $headers);
        ?>

