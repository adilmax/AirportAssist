<?php $title = "Personal Info";
require_once('responder_header.php');
?>
<div class="row" style="margin-top: 50px;">
     <div class="container-fluid registration_main_contant_bgcolor">
        <div class="col-lg-2 col-md-2 col-xs-12 nopadding">
                <?php require_once('html/sidebar.php');?>
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 registration_right_contant_bgcolor" >
            <? include("html/progressbar.php");?>
            <form action="generalinfo" method="post" class="form-horizontal form_top" enctype="multipart/form-data">    
                <? if($status){?>
                <div class="alert alert-success" id="success-alert">
                   
                    <?=$message;?>
                </div>
                <? }?>
                <?  if(count($error)>0){?>
                    <ul class="list-group">
                        <?for($i=0;$i<count($error);$i++){?>
                            <li class="list-group-item list-group-item-danger noborder" ><?=$error[$i];?></li>
                        <?}?>
                    </ul>
                <?}?>
                <fieldset style="padding: 20px 0px 50px 0px;">
                    <legend>General Information Form</legend> 
                
                    <div class="form-group">
                       <div class="col-lg-4 control-label">First Name:  <span class="asteric">*</span></div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="firstName" placeholder="First Name" name="firstName" accept=""data-validation="required" 
                                   data-validation-error-msg-required="You must enter first name" value="<?= $firstName;?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Last Name:  <span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="lastName" placeholder="Last Name" name="lastName" accept="" data-validation="required" 
                                   data-validation-error-msg-required="You must enter last name" value="<?= $lastName;?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Middle Name: </div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="middleName"  placeholder="Middle Name" name="middleName"  value="<?= $middleName;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Language Known:  <span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <select id="language" multiple="multiple" name="language[]" class="form-control field_color place_holder" accept="" data-validation="required" 
                            data-validation-error-msg-required="You must select Language">
                                <? foreach($languages as $key=>$value){?>
                                <option value="<?=$key;?>" 
                                        <? if(count($languagesArray)>0){
                                            foreach($languagesArray as $val){
                                                if($val == $key){?>
                                                    selected
                                                <?}
                                            }
                                        }
                                        ?>
                                        ><?=$value;?></option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Mobile Number:  <span class="asteric">*</span></div>
                        <div class="col-lg-6">                            
                            <input type="tel" id="phone" class="form-control field_color place_holder" name="phone" placeholder="Mobile Number" data-validation="required  length" data-validation-length="8-15"  
                            data-validation-error-msg-length="Minimum length should be 8"
                            data-validation-error-msg-required="You must enter a Mobile Number" accept="" data-validation="required" 
                             value="<?=preg_replace("/^00/", "+",$phone);?>" readonly>                            
                        </div>
                    </div>                    
                    <div class="form-group">
                       <div class="col-lg-4 control-label ">Gender:  <span class="asteric">*</span></div>
                       <div class="col-lg-6">    
                           <input type="radio"  name="gender" id="gender" value="0" <?= ($gender == false)?"checked":"";?>> Male
                           <input type="radio"  name="gender" id="gender" value="1" <?= ($gender == true)?"checked":"";?>> Female 
                       </div>                           
                    </div>     
                    <div class="form-group">
                       <div class="col-lg-4 control-label ">Date of Birth:  <span class="asteric">*</span></div>
                       <div class="col-lg-6 date_bgcolor">  
                           <input type="text"  name="dateOfBirth"  id="dateOfBirth" placeholder="Date of Birth" class="form-control date_bgcolor field_color place_holder" accept="" data-validation="required" 
                                  data-validation-error-msg-required="You must select date" value="<?= $dateOfBirth;?>">
                       </div>                       
                    </div> 
                    <div class="form-group">
                    <div  class="col-lg-4 control-label ">Upload Photo:</div>
                       <div class="col-lg-6">    
                            
                            <input type="file" class="upload pdf small " name="photo" id="photo" >
                            <div id="image_error" class="dispaly_none" style="color:red;"></div>
                            <div class="small">Note:Please upload image with type:JPG/PNG.</div>
                            <? if($profileImageStatus){?>
                            <a href="<?= $profileImageUrl;?>" target="_blank" class="small"> View Attached File</a>
                            <? }else{ ?>No file<? } ?>
                        </div> 
                    </div>
                    <div class="form-group">
                       <div class="col-lg-4 control-label">Nationality:  <span class="asteric">*</span></div>
                       <div class="col-lg-6">  
                           <select name="nationality" id="nationality" class="form-control field_color place_holder" accept="" data-validation="required" 
                            data-validation-error-msg-required="You must select nationality">
                               <option value="" selected="selected">Select Value </option>       
                               <? foreach($countryList as $key=>$value){?>
                                <option value="<?= $key ?>" <?= ($countryListIndex != "")?(($countryListIndex == $key)?"selected":""):"";?>><?= $value ?></option>
                               <? }?>                          
                           </select>
                        </div>                       
                    </div>
                    <div class="form-group">
                       <div class="col-lg-4 control-label">Physical Ability to Lift Luggage:</div>
                       <div class="col-lg-6">  
                           <select name="luggageLift" id="luggageLift"  class="form-control field_color place_holder">
                               <option value="" selected="selected">Select Value </option>       
                               <? foreach($luggage as $key=>$value){?>
                                <option value="<?= $key ?>" <?= ($luggageIndex != "")?(($luggageIndex == $key)?"selected":""):"";?>><?= $value ?></option>
                               <? }?>                          
                           </select>
                        </div>                       
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <input type="submit" class="btn btn-default register_button" name="submit" value="Submit" id="submit">
                    </div>
                </div>               
            </form>
        </div>    
    </div>
</div>
<?php require_once('responder_footer.php');?>
<script type="text/javascript">
   
  $(function() {
       $.validate();
       $('#language').multiselect({
                includeSelectAllOption: false,
                nonSelectedText:"Select Language(s)"
        });
        var start = new Date();
        start.setFullYear(start.getFullYear() - 100);        
        
        var end = new Date();
        end.setDate(end.getDate() - 1);
        end.setFullYear(end.getFullYear());      
        
        $('#dateOfBirth').datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: start,
            maxDate: end,
            yearRange: start.getFullYear() + ':' + end.getFullYear()
        });
    });

 $("document").ready(function(){    
    $("#photo").change(function() {        
        var image = $("#photo").val();
        var fileType = image.split('.').pop().toUpperCase();    
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG"){
                $("#image_error").hide();
                $('#submit').removeAttr('disabled');
                }else{
                $("#image_error").html("File type supported png, jpg");
                $("#image_error").show();
                $('#submit').attr('disabled','disabled');
                
           }        
        }    
    });
});
$(function() {
    setTimeout(function() {
        $("#success-alert").hide('blind', {}, 500);
        <? if($status && $type=0){?>
        $(location).attr('href', 'currentaddress');
        <? } ?>
    }, 2000);
});
</script>