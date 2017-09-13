<footer style="margin-bottom: 10px;" id="footer">
    <div class="row stamp-color padding-left">
        <div class="container" >

        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="media" >
        <span class="media-left">
            <img  src="image/stamp.png" class="img-circle img-responsive" alt="stamp" title="stamp" style="width:150px;"/>          
        </span>
        <div class="media-body">
            <h2 class="media-heading white stamp-top">We Ensure Swift, Smooth and Safe Passage Through Airports</h2>
        </div>
        </div>
        </div>-->
        <div class="col-lg-2 col-md-2 col-xs-4">
            <img  src="image/stamp.png" class="img-responsive img-circle" alt="Airport Assistance" title="stamp"/>               
        </div>
            <div class="col-lg-10 col-md-10 col-xs-8">
                <h2 class="xs-font white stamp-top">We Ensure Swift, Smooth And Safe Passage Through Airports</h2>
            </div>

        </div>   
    </div> 
    <div class="row" style="margin:25px 0px 20px 0px;">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <a href="https://www.murgencyairportassistance.com/" target="_blank"><img src="image/MU-logo-tag-line-right.png" class="img-responsive center-block"  alt="Airport Assistance" title="Murgency Airport Assistance logo"/></a>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
           </div>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-4"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 image-padding" >
                    <a href="https://www.facebook.com/MUAirportAssist/" class=" text-center pull-left" target="_blank"><img class="img-responsive img-rounded" alt="Airport Assistance" title="facebook_icon" src="image/icons/FacebookDesat.png" style="width:30px;padding-right:2px;" onmouseover="hover(this,'FacebookColor.png');" onmouseout="unhover(this,'FacebookDesat.png');"></a>
                    <a href="https://plus.google.com/s/MUAirportAssist/top" class=" text-center pull-left" target="_blank"><img class="img-responsive img-rounded" alt="Airport Assistance" title="googleplus_icon" src="image/icons/GoogleDesat.png" style="width:30px;padding-right:2px;" onmouseover="hover(this,'GoogleColor.png');" onmouseout="unhover(this,'GoogleDesat.png');"></a>
                    <a href=" https://www.instagram.com/muairportassist/" class="text-center pull-left" target="_blank"><img class="img-responsive img-rounded" alt="Airport Assistance" title="instagram_icon" src="image/icons/InstagramDesat.png" style="width:30px;padding-right:2px;" onmouseover="hover(this,'InstagramColor.png');" onmouseout="unhover(this,'InstagramDesat.png');"></a>
                    <a href=" https://www.pinterest.com/muairportas0334/" class=" text-center pull-left" target="_blank"><img class="img-responsive img-rounded" alt="Airport Assistance" title="pinterest_icon" src="image/icons/PinterstDesat.png" style="width:30px;padding-right:2px;" onmouseover="hover(this,'PinterstColor.png');" onmouseout="unhover(this,'PinterstDesat.png');"></a>
                    <a href="https://twitter.com/MUAirportAssist" class=" text-center" target="_blank"><img class="img-responsive img-rounded" alt="twitter_icon" title="Airport Assistance" src="image/icons/TwitterDesat.png" style="width:30px;padding-right:2px;" onmouseover="hover(this,'TwitterColor.png');" onmouseout="unhover(this,'TwitterDesat.png');"></a>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <div class="text-center xs_footer" style="font-size: 10px;">MUAirportAssist@MUrgency.com</div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <div class="text-center xs_footer" style="color: #c8c7cf;font-size: 10px;">© Copyright <?=date("Y");?> MUrgency Inc.</div>
                 </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            </div>
        </div> 
    </div>    
</footer>
    </body>  
</html>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery-ui.js"></script>
<script src="js/validation.js"></script>
<script type="text/javascript" src="js/jquery.timepicker.min.js"></script>
<script src="js/bootstrap-formhelpers.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('.nav');
   var offset = startchange.offset();
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $('.navbar').css('background-color', 'rgba(54,73,88,0.9)');
       } else {
          $('.navbar').css('background-color', 'transparent');
       }
   });
});
jQuery(function($){
        $("#sharer").click(function(){
            var feed = 'https://www.facebook.com/dialog/feed?app_id=1617274408512337';
           // var url = encodeURIComponent(location.href);
            var url = "http://MUrgencyairportassistance.com/";
            var description = "Offers wide range of personalized airport assistance services worldwide, including meet and greet, fast track, VIP or any special need both pre-scheduled and in emergencies.";
            var name = "MUrgency Airport Assistance"
            feed += '&link=' + url + '&redirect_uri=http://www.MUrgencyairportassistance.com/close.html&display=popup&name='+ name +'&description= '+ description;
            feed +='&picture=http://www.emergencyairportassistance.com/image/fb_logo_image.png';
            window.open(feed, 'sharer', 'width=640,height=480');
        });
        });
function hover(element,imageName) {
    element.setAttribute('src', 'image/icons/'+imageName);
}
function unhover(element,imageName) {
    element.setAttribute('src', 'image/icons/'+imageName);
}
</script>
<script type="text/javascript">
$("#twittersharer").click(function(){
   
    var url = "https://twitter.com/share?url=https://www.murgencyairportassistance.com&hashtags=Airport Assistance\n\
    &text=MUrgency Airport Assistance offers wide range of airport assistance services including meet and greet, fast track, VIP or any special need";
    var otherOptions = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=500, height=500, top=100, left=200';
       
    window.open(url,'',otherOptions);
    });
    
   $("#linkedinshare").click(function(){
    var url = "https://www.murgencyairportassistance.com/linkedin.html";   
    var otherOptions = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=500, height=500, top=100, left=200';     
    window.open(url,'',otherOptions);
    });
   $("#pinresthare").click(function(){
    var url = "http://pinterest.com/pin/create/button/?url=https://www.murgencyairportassistance.com&media=http://www.emergencyairportassistance.com/image/fb_logo_image.png&description=MUrgency Airport Assistance offers wide range of personalized airport assistance services worldwide, including meet and greet, fast track, VIP or any special need both pre-scheduled and in emergencies.";   
    var otherOptions = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=500, height=500, top=100, left=200';     
    window.open(url,'',otherOptions);
    }); 
function googleplusbtn(url) {
  sharelink = "https://plus.google.com/share?url="+url;
  newwindow=window.open(sharelink,'name','height=400,width=600');
  if (window.focus) {newwindow.focus()}                                                                                                                                
  return false;
}  
     
</script>   