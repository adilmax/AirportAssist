<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
    <meta itemprop="name" content="MUrgency Airport Assistance">
    <meta itemprop="description"
          content="Offers wide range of personalized airport assistance services worldwide, including meet and greet, fast track, VIP or any special need both pre-scheduled and in emergencies.">
    <meta itemprop="image" content="http://www.emergencyairportassistance.com/image/fb_logo_image.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <?php
    // if (isset($discriptionValue)) {
    //     if ($discriptionValue == null) {
    //         $discriptionValue = "Ground handling services for charters worldwide. We provide professional ramp services, aircraft maintenance, Crew & Passenger  Services,  Cargo Services along with  Passenger assistance at airport for VIP, Fast Track, Meet & Greet and any other Special Assistance. Also provide Airport Transfer, Immigration Assistance, Baggage Assistance, Airport Lounge, Marhaba, Pearl Assist, Fast Track, Airport Concierge, Wheelchair Assistance, Priority Lass, Check-in, Boarding Pass, Seat Change, Pranaam, Platinum, Gold, Silver, Limousine, Taxi, Rental Car, Private Transfer, Shuttle, Lounge Access service in airports worldwide, both pre scheduled and in emergencies. We’ll make sure you’re well looked after in every airport across the world be it in America, Europe, Asia, Africa, Middle East, South East Asia, Latin America or South America. We cover New York, London, Paris, Dubai, Abu Dhabi, Singapore, Hong Kong, Beijing, Shanghai & Tokyo amongst others. We provide special services to elderly, seniors, disabled, non English speaking persons, VIP, CEO, Private Jet, Celebrities, Sports Stars.";
    //     }
    // } else {
    //     $discriptionValue = "Ground handling services for charters worldwide. We provide professional ramp services, aircraft maintenance, Crew & Passenger  Services,  Cargo Services along with  Passenger assistance at airport for VIP, Fast Track, Meet & Greet and any other Special Assistance. Also provide Airport Transfer, Immigration Assistance, Baggage Assistance, Airport Lounge, Marhaba, Pearl Assist, Fast Track, Airport Concierge, Wheelchair Assistance, Priority Lass, Check-in, Boarding Pass, Seat Change, Pranaam, Platinum, Gold, Silver, Limousine, Taxi, Rental Car, Private Transfer, Shuttle, Lounge Access service in airports worldwide, both pre scheduled and in emergencies. We’ll make sure you’re well looked after in every airport across the world be it in America, Europe, Asia, Africa, Middle East, South East Asia, Latin America or South America. We cover New York, London, Paris, Dubai, Abu Dhabi, Singapore, Hong Kong, Beijing, Shanghai & Tokyo amongst others. We provide special services to elderly, seniors, disabled, non English speaking persons, VIP, CEO, Private Jet, Celebrities, Sports Stars.";
    // }

    ?>
    <meta name="description" content="<?= $metaDesc; ?>">
    <meta name="keywords"
          content="Ground Handling Services , Ramp Services,Ground Handling Services , Ramp Services , Cargo Services, airport assistance, meet and greet, VIP, Executive, Corporate, Crew & Passenger services,Special Assistance,Ground Equipment, aircraft hospitality Services">

    <meta property="fb:app_id" content="1617274408512337"/>
    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="css/bootstrap-formhelpers.min.css">
    <link rel="stylesheet" href="css/intlTelInput.css">
    <link rel="stylesheet" href="css/bootstrap-dropdown-checkbox.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="alternate" hreflang="en" href="http://<?= $_SERVER['SERVER_NAME']; ?>"/>
    <? include_once("analytic.php") ?>
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq)return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq)f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1067364606643550');
        fbq('track', "PageView");
    </script>
</head>
<?
$shareTitle = "Offers wide range of personalized airport assistance services worldwide, including meet and greet, fast track, VIP or any special need both pre-scheduled and in emergencies.";
$shareUrl = "https://www.murgencyairportassistance.com";
$shareVia = "MUrgencyAirportAssistance";
$home = '';
$homecolor = 'style="color:white;"';
$payment = "";
$paymentcolor = 'style="color:white;"';
$faq = "";
$faqcolor = 'style="color:white;"';
$airport = "";
$airportColour = 'style="color:white;"';
$contactus = "";
$contactusColour = 'style="color:white;"';
$ourservices = "";
$ourservicescolor = 'style="color:white;"';
$assistant = 'style="background-color: #c3262f;"';
$assistantColor = 'style="color:white;"';
$login = "";
$logincolor = 'style="color:white;"';
$blogs = "";
$blogColour = 'style="color:white;"';
switch ($title) {
    case "Home":
        $home = 'style="background-color: #c3262f;"';
        $homecolor = 'style="color:white;"';
        break;
    case "Payment":
        $payment = 'style="background-color: #c3262f;"';
        $paymentcolor = 'style="color:white;"';
        break;
    case "FAQ":
        $faq = 'style="background-color: #c3262f;"';
        $faqcolor = 'style="color:white;"';
        break;
    case "Airports Served":
        $airport = 'style="background-color: #c3262f;"';
        $airportColour = 'style="color:white;"';
        break;
    case "Contact Us":
        $contactus = 'style="background-color: #c3262f;"';
        $contactusColour = 'style="color:white;"';
        break;
    case "Our Services":
        $contactus = 'style="background-color: #c3262f;"';
        $contactusColour = 'style="color:white;"';
        break;
    case "Blog":
        $blogs = 'style="background-color: #c3262f;"';
        $blogColour = 'style="color:white;"';
        break;
}
?>
<body>

<nav role="navigation" class="navbar navbar-fixed-top" style="background-color:rgba(54,73,88,0.9);">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!--        <div class="container">-->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="http://<?= $_SERVER['SERVER_NAME']; ?>" class="navbar-brand white title_size"><img
                src="image/MU Alpha logoFinal-01.png" style="width:55px;margin-top: -13px;" class="img-responsive top"
                alt="Airport Assistance" title="airportassistance_logo"></a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right mobile_nav_color" style="padding-right:30px;">
            <li <?= $home ?>><a href="http://<?= $_SERVER['SERVER_NAME']; ?>" <?= $homecolor ?>>Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?= $ourservicescolor ?>>Our Services <span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="https://www.murgencyairportassistance.com/ourservices" <?= $ourservicescolor ?>>Airport
                            Assistance</a></li>
                    <li><a href="http://www.murgencyairportassistance.com/groundhandlingservices" class="white">
                            Aircraft Ground Handling</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?= $assistantColor; ?>>Request Service <span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://<?= $_SERVER['SERVER_NAME']; ?>/#service_request_form" class="white"> Airport
                            Assistance</a></li>
                    <li><a href="http://www.murgencyairportassistance.com/groundhandling" class="white"> Aircraft Ground
                            Handling</a></li>
                </ul>
            </li>
            <li <?= $airport ?>><a href="https://www.murgencyairportassistance.com/airportserved" <?= $airportColour ?>>Airports
                    Served</a></li>

            <li <?= $faq ?>><a href="https://www.murgencyairportassistance.com/faq" <?= $faqcolor ?>>FAQs</a></li>
            <li><a href="https://www.murgencyairportassistance.com/traveltips" <?= $blogColour ?>>Blog</a></li>
            <!-- <? if ($serverName == "murgencyairportassistance.com") { ?>
            <? } ?>
            <? if ($isCity) { ?>
                <li><a href="https://en.wikipedia.org/wiki/Changzhou_Benniu_Airport" class="white">Airport Info</a></li>
            <? } ?> -->

            <li <?= $contactus ?>><a href="https://www.murgencyairportassistance.com/contact" <?= $contactusColour ?>>Contact
                    Us</a></li>
            <li <?= $login ?> style="margin-right: 10px;"><a href="login" <?= $logincolor ?>>Sign In</a></li>
            <li class="dropdown" <?= $assistant; ?>>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?= $assistantColor; ?>>Work With Us <span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://www.murgencyairportassistance.com/corporateregistration"
                           class="white">Corporate</a></li>
                    <li><a href="http://www.murgencyairportassistance.com/travelagent" class="white">Travel Agent</a>
                    </li>
                    <li><a href="http://www.murgencyairportassistance.com/registration" class="white">Join As Airport
                            Assistance</a></li>
                </ul>
            </li>
            <li style="margin-right: 40px;margin-left: 10px;">
                <div class="share vertical clearfix show_others">
                    <a href="" class="preview" style="background-color:transparent !important;border-bottom: none;"><i
                            class="fa fa-share-alt"></i></a>
                    <div class="open">
                        <a href=""><i class="fa fa-facebook" id="sharer"></i></a>
                        <a href="#"><i class="fa fa-twitter" id="twittersharer"></i></a>
                        <a href="#"><i class="fa fa-linkedin" id="linkedinshare"></i></a>
                        <a href="#" onclick="return googleplusbtn('https://www.MUrgencyairportassistance.com/#')"><i
                                class="fa fa-google-plus"></i></a>
                        <a href="#" id="pinresthare"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </li>

        </ul>

        <!--            </div>-->

</nav>
    