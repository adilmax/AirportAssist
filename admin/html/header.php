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
    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/social-share-kit.css">
    <link rel="stylesheet" href="css/jquery.timepicker.min.css">
    <link rel="stylesheet" href="css/bootstrap-formhelpers.min.css">


</head>
<?
$report = "";
$reportcolor = 'style="color:white;"';
$commentValue = "";
$commentcolor = 'style="color:white;"';
$blog = "";
$blogcolor = 'style="color:white;"';
switch ($title) {
    case "Airport Request Report":
        $report = 'style="background-color: #c3262f;"';
        $reportcolor = 'style="color:white;"';
        break;
    case "Comment List":
        $commentValue = 'style="background-color: #c3262f;"';
        $commentcolor = 'style="color:white;"';
        break;
    case "Create New Blog":
        $blog = 'style="background-color: #c3262f;"';
        $blogcolor = 'style="color:white;"';
        break;
}
?>
<body>
<nav role="navigation" class="navbar navbar-fixed-top" style="background-color:rgba(54,73,88,0.9);">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://<?= $_SERVER['SERVER_NAME']; ?>" class="navbar-brand white title_size"><img
                        src="image/MU Alpha logoFinal-01.png" style="width:55px;margin-top: -13px;"
                        class="img-responsive top" alt="Airport Assistance" title="airportassistance_logo"></a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($_SESSION['userName'] == "Airport") { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?php echo $blogcolor; ?>>Blog<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="blogpost">Create Blog</a></li>
                            <li><a href="bloglist">Blogs List</a></li>
                        </ul>
                    </li>
                    <li <?= $blog ?>><a href="logout.php" <?= $blogcolor ?>>Logout(<?= $_SESSION['user']['name']; ?>)</a></li>
                <?php } 
				else if ($_SESSION['userName'] == 'manjula' || $_SESSION['userName'] == 'anand') { 
				?>
                    <li <?= $report ?>><a href="requestreport" <?= $reportcolor ?>>All Request</a></li>
                    <li <?= $blog ?>><a href="logout.php" <?= $blogcolor ?>>Logout(<?= $_SESSION['user']['name']; ?>)</a>
                <?php } 
				else { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?php echo $blogcolor; ?>>Service Requests<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li <?= $report ?>><a href="requestreport">All Request</a></li>
                            <li <?= $commentValue ?>><a href="ghrequestreport">Groud Handling</a></li>
                        </ul>
                    </li>
                    <li <?= $commentValue ?>><a href="verifycomment" <?= $commentcolor ?>>View Comments</a></li>
                    <li <?= $commentValue ?>><a href="giftcardreport" <?= $commentcolor ?>>Gift Card</a></li>
                    <li <?= $commentValue ?>><a href="corporatetravelagentdetails" <?= $commentcolor ?>>Agent/Corporate Details</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?php echo $blogcolor; ?>>Blog<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="blogpost">Create Blog</a></li>
                            <li><a href="bloglist">Blogs List</a></li>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" <?php echo $blogcolor; ?>>Settings<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li <?= $report ?>><a href="vendorlist">Vendor List</a></li>
                            <li <?= $commentValue ?>><a href="paymentmode">Payment Mode</a></li>
                        </ul>
                    </li>
                    <li <?= $blog ?>><a href="logout.php" <?= $blogcolor ?>>Logout(<?= $_SESSION['user']['name']; ?>)</a></li>
                <?php } ?>
            </ul>

        </div>
    </div>
</nav>
    