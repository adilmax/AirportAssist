<? $title = "MUrgency Airport Assistance – Contact Us";
$titleName = "Contact Us";
$metaDesc = "Get in touch with our airport assistance experts through email or phone here";
require_once('html/header.php');
$_SESSION['captcha'] = simple_php_captcha();
?>
<div class="row">
    <div class="middle_image contact-subpage"><div></div></div>
</div> 
<div class="row service_text_bg_color padding-left">
    <div class="container " style="margin-top: 80px;">
        <form action="" method="post" class="form-horizontal form_top" >
            <fieldset>
                <legend>CONTACT US</legend>                
                <? if($status){?>
                    <div class="alert alert-success col-sm-12 col-lg-12" role="alert">
                        Your message has been sent successfully.
                    </div>
                <? } ?>
                <? if(count($error)>0){?>
                    <div class="alert alert-danger col-sm-12 col-lg-12" role="alert">
                        <? for($i = 0;$i<count($error);$i++){
                            echo $error[$i];echo"<br>";
                        }?>
                    </div>
                 <? } ?>
                <div class="col-sm-12 col-lg-12">
                    <div class="form-group" style="margin-top:40px;">
                        <label class="col-lg-1 control-label" for="name">Name</label>
                        <div class= "col-lg-8"><input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"
                            data-validation="required" 
                            data-validation-error-msg-required="You must enter a name"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-1 control-label" for="email">Email</label>
                       <div class="col-lg-8 "><input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" 
                            data-validation="required email" 
                            data-validation-error-msg-required="You must enter an Email">
                       </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-lg-1 control-label" for="subject">Subject</label>
                        <div class="col-lg-8 "><input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject"
                            data-validation="required" 
                            data-validation-error-msg-required="You must enter a subject"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-1 control-label" for="message">Message</label>
                        <div class="col-lg-8">
                           <textarea class="form-control select_text_color" rows="3" id="message" name="message" placeholder="Message" style="resize: vertical;"
                            data-validation="required" 
                            data-validation-error-msg-required="You must enter a message"></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-1 control-label" for="captcha"></label>
                        <div class="col-lg-8">
                            <img src="<?=$_SESSION['captcha']['image_src'];?>" style="padding-bottom: 15px;">
                            <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter the letters as they are shown in the image"
                            data-validation="required" 
                            data-validation-error-msg-required="Verification code incorrect">
                            <span class="help-block error" id="code" style="color: #a94442;display: none;">Verification code incorrect</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-8">
                            <input type="submit" class="btn btn-default register_button" name="contact" value="Submit" id="submit"> 
                        </div>
                    </div> 
                </div>
               
            </fieldset>
        </form>
        
       
    </div>
</div>
 <section id="locations"><!-- / Loactions-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-3 ">
                <figure><img src="image/MU Alpha logoFinal-01.png" alt="" style="width:55px;"></figure>
                <p class="first-child">Head Quarters</p>
                <article id="address-section">
                <div class="address-wrap">
                    <strong>SAN FRANCISCO</strong>
                    <p>MUrgency</br>901 Mission Street</br>Suite 105, Impact Hub - D5</br>
San Francisco, CA, 94103 </br>United States of America.</p>
                </div>
                    <span class="mail" >MUAirportAssist@MUrgency.com</span>
                    
                    <a href="" class="num"> + 971 50 462 7611</a><br>
                    <a href="" class="num"> + 91 742 009 4877</a>
                </article>
            </div>
            <div class="col-md-9 rit-wrap">
                <div class="col-md-12">
                    <div class="col-md-4 col-sm-4">
                        <article id="address-section">
                            <div class="address-wrap">
                                <strong>New York</strong>
                                <p>183, Madison Ave,</br> Suite 1405 </br>
            New York, NY, 10016-4501</br>United States of America</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <article id="address-section">
                            <div class="address-wrap">
                                <strong>London</strong>
                                <p>
            Impact Investment Partners</br>16, Hanover Square</br>London, W1S 1HT</br>United Kingdom</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <article id="address-section">
                            <div class="address-wrap">
                                <strong>Dubai</strong>
                                <p>
            Oud Metha Offices, </br>Suite 204, Oud Metha Area,</br> Dubai Health Care City</br>Dubai PO Box: 119631</br>UAE</p>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-md-12 ad-section">
                    <div class="col-md-4 col-sm-4">
                        <article id="address-section">
                            <div class="address-wrap">
                                <strong>Mumbai</strong>
                                <p>Atur House, 2nd Floor</br>
            Dr. Annie Beasant Road, Worli Naka, Mumbai</br>Maharashtra, 400018</br>India</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <article id="address-section">
                            <div class="address-wrap">
                                <strong>Singapore</strong>
                                <p>
            10 UBI Crescent,</br> Suite 02-82</br>UBI Techpark</br>Singapore 408564</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <article id="address-section">
                            <div class="address-wrap">
                                <strong>Hong Kong</strong>
                                <p>
           Apece Plaza, Suite 2102</br>49 Hoi Yuen Road,</br>Kwun Tong, Kowloon</br> Hong Kong</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /. Locations-->  
<? require_once('footer.php');?>
<script type="text/javascript">
   $(function() {
        $.validate();
   });
   $("#submit").click(function (){
      var code = "<?php echo $_SESSION['captcha']['code'];?>";
      var code1 = $("#captcha").val();
      if(code === code1){
          $("#code").hide();
          return true;
          
      }else{
          $("#code").show();
          $("#captcha").css("border-color","rgb(185, 74, 72)")
          return false;
      }
   });
</script>