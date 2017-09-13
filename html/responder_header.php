<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Organization">
<head>
    <meta itemprop="name" content="MUrgency Airport Assistance">
<meta itemprop="description" content="Offers wide range of personalized airport assistance services worldwide, including meet and greet, fast track, VIP or any special need both pre-scheduled and in emergencies.">
<meta itemprop="image" content="http://www.emergencyairportassistance.com/image/fb_logo_image.png">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title><?=$title?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta property="fb:app_id" content="1617274408512337" /> 
<link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap-social.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/jquery.timepicker.min.css"> 
<link rel="stylesheet" href="css/bootstrap-formhelpers.min.css" >
<link rel="stylesheet" href="css/intlTelInput.css">
<link rel="stylesheet" href="css/bootstrap-dropdown-checkbox.css">

<link rel="alternate" hreflang="en" href="http://<?=$_SERVER['SERVER_NAME'];?>" />
<? include_once("analytic.php") ?>
</head>
<?
$shareTitle = "Offers wide range of personalized airport assistance services worldwide, including meet and greet, fast track, VIP or any special need both pre-scheduled and in emergencies.";
$shareUrl = "https://www.murgencyairportassistance.com";
$shareVia = "MUrgencyAirportAssistance";
$home = '';
$homecolor = 'style="color:white;"';
$signin = '';
$signincolor = 'style="color:white;"';
switch ($title) {
    case "Home":
        $home = 'style="background-color: #c3262f;"';
        $homecolor = 'style="color:white;"';
        break;
    case "Login":
        $signin = 'style="background-color: #c3262f;"';
        $signincolor = 'style="color:white;"';
        break;
}
?>
<body>
        
    <nav role="navigation" class="navbar navbar-fixed-top"  style="background-color:rgba(54,73,88,0.9);">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header" >
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="http://<?=$_SERVER['SERVER_NAME'];?>" class="navbar-brand white title_size"><img src="image/MU Alpha logoFinal-01.png" style="width:55px;margin-top: -13px;" class="img-responsive top" alt="Airport Assistance" title="airportassistance_logo"></a>
            </div>
            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right mobile_nav_color" style="padding-right:30px;">
                    <li <?=$home?>><a href="http://<?=$_SERVER['SERVER_NAME'];?>" <?=$homecolor?>>Home</a></li>
                     <?php              
                        $currentUser = Parse\ParseUser::getCurrentUser();                  
                        if(!is_object($currentUser)){?>
                            <li <?=$signin;?>><a href="login" <?=$signincolor;?>>Login</a></li>                                           
                        <?}else{?>
                            <li <?=$signin;?>><a href="logout" <?=$signincolor;?>>Logout</a></li>  
                        <?}?>
                    <!--<li>
                                                 
                        <div class="share vertical clearfix show_others" style="margin-top: 3px;"> 
                            <a href="" class="preview" style="background-color:transparent !important;border-bottom: none;"><i class="fa fa-share-alt" ></i></a> 
                                <div class="open"> 
                                    <a href=""><i class="fa fa-facebook" id="sharer"></i></a> 
                                    <a href="#"><i class="fa fa-twitter" id="twittersharer"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" id="linkedinshare"></i></a>                                    
                                    <a href="#"onclick="return googleplusbtn('https://www.MUrgencyairportassistance.com/#')"><i class="fa fa-google-plus"></i></a> 
                                    <a href="#" id="pinresthare"><i class="fa fa-pinterest"></i></a>
                                </div> 
                            </div> 
                       
                    </li>-->
                </ul>

            </div>
        </div>
    </nav>
    