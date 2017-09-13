<?
// Every page needs the configuration file:
// Uses sessions to test for duplicate submissions:

require_once 'config.inc.php';
require_once 'class/classUser.php';
require_once 'class/Encrypttools.php';
require_once 'class/classValidation.php';

$validationObject = new airportAssValidation\inputValidation;
$userModel = new airportAssUser\user;
$encrptModel = new airportEncrypt\EncryptTools;
$successStatus = false;
$result = false;
// Check for a form submission:
$details = [];
$source = "";
if(isset($_GET['s'])){
    $source = $_GET['s'];
}
if (isset($_GET['t'])) {
    $details = $encrptModel->decrypt($_GET['t']);
    if ($details != "") {
        $totalAmount = $details['amount'];
        $email = $details['email'];
        $conCode = $details['requestId'];
        $cardCode = $details['cardCode'];
        $currency = "usd";
        $amount = $details['amountPaid'] * 100;
        $cardAmount = $details['cardAmount'];
        $result = true;
    } else {
        $result = false;
    }
}
if ($result != false) {
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
        //$amount = $result->advanceAmount * 100; // $20, in cents

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
                    $userModel->updatePaymentStatus($conCode, $charge->id, $cardCode, $cardAmount);
                    $successStatus = '<div class="alert alert-success"><h4>Payment Success!</h4>Your payment process has been completed successfully. Please note the transaction id for future reference( ' . $charge->id . ')</div>';

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
    $serverNameValue = $_SERVER['SERVER_NAME'];
    $serverName = str_replace("www.", "", $serverNameValue);
    $isCity = $validationObject->isCityDomain($serverName);
    $airportInfoUrl = "";
    $formatName = $validationObject->FormatName($serverName);
    if ($formatName != false) {
        $domainName = $formatName['domainName'];
        $titleValue = $formatName['titleName'];
    } else {
        $domainName = $serverName;
        $titleValue = $serverName;
    }
    $_SESSION['title'] = $titleValue;
    require_once './html/carddetails.php';
} else {
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}

?>

