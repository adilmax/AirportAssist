<?php
require_once 'class/Encrypttools.php';
require_once 'config.inc.php';
require_once 'class/classGiftCard.php';

$encryptObj = new airportEncrypt\EncryptTools;
$giftCardModel = new airportAssGiftCard\giftCard;

$cartCount = count($_SESSION['content']);
$totalAmount = 0;
$totalOfferAmount =0;
$percentageValue = 10;
for($i=0;$i<$cartCount;$i++){
     $totalAmount +=   $_SESSION['content'][$i]['amount'];
    $amount = $_SESSION['content'][$i]['amount'];
    $percentage = (10/100)*($_SESSION['content'][$i]['amount']);
    $offerAmount = $amount - $percentage;
    $totalOfferAmount +=  $offerAmount;
}
$email = $_SESSION['senderEmail'];
$successStatus = false;
$currency = "usd";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
        // Stores errors:
        $errors = array();	
        // Need a payment token:
        if (isset($_POST['stripeToken'])) {
            $token = $_POST['stripeToken'];

            // Check for a duplicate submission, just in case:
            // Uses sessions, you could use a cookie instead.
            if (isset($_SESSION['token']) && ($_SESSION['token'] == $token)) {
                    $errors['token'] = 'You have apparently resubmitted the form. Please do not do that.';
            } else { // New submission.
                    $_SESSION['token'] = $token;
            }		

        } else {
            $errors['token'] = 'The order cannot be processed. Please make sure you have JavaScript enabled and try again.';
        }
        // Set the order amount somehow:
        $amount = $totalOfferAmount  * 100; // $20, in cents

        // Validate other form data!

        // If no errors, process the order:
        if (empty($errors)) {

            // create the charge on Stripe's servers - this will charge the user's card
            try {
                //$email = $result->email;
                // Include the Stripe library:
                require_once('lib/Stripe.php');

                // set your secret key: remember to change this to your live secret key in production
                // see your keys here https://manage.stripe.com/account
                Stripe::setApiKey(STRIPE_PRIVATE_KEY);

                // Charge the order:
                $charge = Stripe_Charge::create(array(
                        "amount" => $amount, // amount in cents, again
                        "currency" => $currency,
                        "card" => $token,
                        "description" => $email
                        )
                );

                // Check that it was paid:
                if ($charge->paid == true) {
                    $couponCode = $giftCardModel->addCartToTable($_SESSION['content'],$_SESSION['senderEmail'],$_SESSION['senderName'],$charge->id,$percentageValue); 
                    // echo "<pre>";
                    // print_r($couponCode);
                    // echo "</pre>";
                  
                   		 unset($_SESSION['content']);
                         unset($_SESSION['senderEmail']);
                         unset($_SESSION['senderName']);

                         $couponValue = $encryptObj->encrypt($couponCode);
                        header("Location:sendgift?t=$couponValue");
                   
                } else { // Charge was not paid!	
                        $error['error'] = '<h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
                }

            } catch (Stripe_CardError $e) {
                // Card was declined.
                $e_json = $e->getJsonBody();
                $err = $e_json['error'];
                $errors['stripe'] = $err['message'];
            } catch (Stripe_ApiConnectionError $e) {
                // Network problem, perhaps try again.
                
            } catch (Stripe_InvalidRequestError $e) {
                // You screwed up in your programming. Shouldn't happen!
            } catch (Stripe_ApiError $e) {
                // Stripe's servers are down!
            } catch (Stripe_CardError $e) {
                // Something else that's not the customer's fault.
            }

        } // A user form submission error occurred, handled below.

    } // Form submission.
    include_once 'html/giftcardpayment.php';

