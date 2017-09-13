<?
$title = "Airport Services – Frequently Asked Questions";
$titleName = "FAQ";
$content = "ARAB answers FAQ (Frequently Asked Questions) in regard to Departure, Arrival, Transfer / Transit & Lounge Services offered across 500+ Airports around the world (North America, South America, Africa, Europe, Asia and Australasia – Oceania)`";
$metaDesc ="Got questions related to Airport assistance or ground handling service? Check out our FAQs here";
require_once 'header.php';
?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1067364606643550'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1067364606643550&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->


<div class="arabhealth_landing_banner">
	<h2>Special Offers For<br>Arab health attendees</h2>
	<h3>Get Amazing Deals For Airport Services<br>At Dubai Starting As Low As $30.</h3>
	<a href="index.php#service_request_form">Book Now</a>
	<img class="main_arabHealth_banner img-responsive" src="image/arabhealth_banner_image.jpg" alt="">
</div>
<!-- content -->
<div class="ArabHealth_campaign_content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center AB_content_heading">
					Take the stress out of your work trip and focus on growing your business.
				</h2>
			</div>
			<div class="col-md-12">
				<h4 class="text-center AB_content">
					We offer professional and personalized services to passenger at arrival , departure and during transit at Dubai Airports Meet and Greet,<br>
					Lounge access,Fast Track airport formalities , Baggage help, Transfer to and from the hotel or venue - we will have all<br>
					your needs taken care.
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- services wrapper -->
<div class="Ab_servicesWrapper">
	<div class="container">
		<div class="row downContainer">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4 ABServices_Image">
						<img src="image/i7.png" alt="">
						<h4 class="text-center">Meet & Greet</h4>
					</div>
					<div class="col-md-4 ABServices_Image">
						<img src="image/i2.png" alt="">
						<h4 class="text-center">VIP Service</h4>
					</div>
					<div class="col-md-4 ABServices_Image">
						<img src="image/i3.png" alt="">
						<h4 class="text-center">Transportation</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 ABServices_Image">
						<img src="image/i6.png" alt="">
						<h4 class="text-center">Fast Track Clearance</h4>
					</div>
					<div class="col-md-4 ABServices_Image">
						<img src="image/i8.png" alt="">
						<h4 class="text-center">Lounge Access</h4>
					</div>
					<div class="col-md-4 ABServices_Image">
						<img src="image/i1.png" alt="">
						<h4 class="text-center">Porter Service</h4>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-12">
						<a href="index.php#service_request_form" class="AB_requestService_button">Request Service</a>
					</div>
					<div class="col-md-12 AB_Form">
					<?if($status){?>
						<div class="alert alert-success">Successfully saved your information. One of our executives will contact you soon.</div>
					<?}?>
						<form action="" method="post">
							<div class="row AB_Form_padding">
								<label for="" class="col-md-3">Name</label>
								<input class="col-md-9" type="text" id="firstName" name="firstName" value="" data-validation="required" 
                            data-validation-error-msg-required="You must enter a Name" />
							</div>
							<div class="row AB_Form_padding">
								<label for="" class="col-md-3">Email</label>
								<input class="col-md-9" type="email" id="email" name="email" value="" data-validation="required" 
                            data-validation-error-msg-required="You must enter an Email" >
							</div>
							<div class="row AB_Form_padding">
								<label for="" class="col-md-3">Phone</label>
								<input class="col-md-9" type="tel" id="mobile" name="mobile" value="" data-validation="required" 
                            data-validation-error-msg-required="You must enter a Phone Number" >
							</div>
							<div class="row AB_Form_padding">
								<input type="submit" name="submit" class="btn btn-danger AB_submit" value="submit" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br>
<br>
<br>

<?php
	require_once 'footer.php';
?>

<script type="text/javascript">
	$(function() {
       $.validate();
   });

</script>