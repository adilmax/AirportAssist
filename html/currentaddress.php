<?php

$title = "Current Address";
require_once('responder_header.php');
?>

<!--<div class="row">
    <div class="middle_image">
        <div></div>
    </div>
</div> -->
<div class="row margin-registration">
    <div class="container-fluid registration_main_contant_bgcolor"  >
        <div class="col-lg-2 col-md-2 col-xs-12 nopadding">
            <?php require_once('sidebar.php');?>
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 registration_right_contant_bgcolor">
        <? include("html/progressbar.php");?>
        <form action="" method="post" class="form-horizontal form_top" enctype="multipart/form-data">
            <fieldset class="padding-fieldset">
                <legend>Current Address </legend> 
                <div class="form-group">
                    <? if($status){?>
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?=$message;?>
                        </div>
                    <? }?>
                    <?                    
                    if(count($error)>0){?>
                        <ul class="list-group">
                            <?for($i=0;$i<count($error);$i++){?>
                                <li class="list-group-item list-group-item-danger noborder" ><?=$error[$i];?></li>
                            <?}?>
                        </ul>
                    <?}?>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Address:<span class="asteric">*</span> </div>
                    <div class="col-lg-6">
                        <textarea class="form-control field_color place_holder" id="address" placeholder="Address" name="address" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter address"><?= $address;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Country:<span class="asteric">*</span></div>
                    <div class="col-lg-6">
                        <select name="country" id="country" class="form-control field_color place_holder" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must select country">
                            <option value="" selected="">Select Value </option>
                           <?php foreach($countryList as $key=>$value){?>
                           <option value="<?=$key;?>" <?=($country != "")?(($country == $key)?"selected":""):"";?>><?=$value;?></option>
                           <?php } ?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">State:<span class="asteric">*</span></div>
                    <div class="col-lg-6">
                        <select name="state" id="state" class="form-control field_color place_holder" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must select state" >
                           <option value="">Select Value </option>
                           <?php foreach($state as $key=>$value){?>
                           <option value="<?=$key;?>" <?=($stateCode != "")?(($stateCode == $key)?"selected":""):"";?>><?=$value;?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-1"><div class="loader loader-margin" id="loading"></div></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">City:<span class="asteric">*</span></div>
                    <div class="col-lg-6">
                        <select name="city" id="city" class="form-control field_color place_holder" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must select city">
                           <option value="">Select Value </option>
                           <?php foreach($city as $key=>$value){?>
                           <option value="<?=$key;?>" <?=($cityCode != "")?(($cityCode == $key)?"selected":""):"";?>><?=$value;?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-1"><div class="loader loader-margin" id="loading2"></div></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Pin / Zip Code:<span class="asteric">*</span></div>
                    <div class=" col-lg-6">
                        <input type="text" class="form-control field_color place_holder" id="pinCode" value="<?= $pinCode;?>" placeholder="Pin / Zip Code" name="pinCode"  
                                data-validation="required length" 
                                data-validation-length="4-50"  
                                data-validation-error-msg-length="Minimum length should be 4"
                                data-validation-error-msg-required="You must enter a Pin / Zip code">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>ID Info </legend>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Government Issued ID Number:<span class="asteric">*</span></div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control field_color place_holder" id="idNumber" placeholder="ID Number" name="idNumber"  value="<?=$idNo;?>" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter ID number">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">ID Expiry Date: </div>
                    <div class="col-lg-6 date_bgcolor">  
                        <input type="text"  name="expDate"  id="expDate" class="form-control date_bgcolor field_color place_holder" placeholder="Choose Date" value="<?=$idExpDate;?>">
                    </div>                       
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Type of ID:</div>
                    <div class="col-lg-6">
                        <select name="idtype" class="form-control field_color place_holder" id="idtype">
                            <option value="" >Select Value </option>
                            <? foreach($typeOfId as $key=>$value){?>
                                <option value="<?= $key;?>" <?=($idType != "")?(($idType == $key)?"selected":""):"";?>><?= $value;?></option>
                            <? }?>
                        </select>                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Front Image:</div>
                    <div class="col-lg-6">
                        <input type="file" class="field_size small" id="front_image" name="front_image" />
                        <div id="front_image_error" class="dispaly_none" style="color:#a94442;"></div>
                        <div class="small">Note:Please upload image with type:JPG/PNG/PDF.Total size of files 500KB.</div>
                        <?php if($frontImageStatus){?>
                        <a href="<?= $frontImageUrl;?>" target="_blank" class="small"> View Attached File</a>
                        <?php }?>                       
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-lg-4 control-label ">Back Image:</div>
                    <div class="col-lg-6">
                        <input type="file" class="field_size small" id="back_image" name="back_image"  />
                        <div id="back_image_error" class="dispaly_none" style="color:#a94442;"></div>
                        <div class="small"> Note:Please upload image with type:JPG/PNG/PDF.Total size of files 500KB.</div>                       
                        <?php if($backImageStatus){?>
                        <a href="<?= $backImageUrl;?>" target="_blank" class="small"> View Attached File</a>
                        <?php } ?>
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
    //validation
    $(function() {
       $.validate();   
    }); 
    //to populate state list
    $(function () {
        $('#country').change( function() {
       $("#loading").show();
        var country = $('#country').val();
        $('#state').find('option').remove();
        $('#state').append($('<option>', { value : '' }).text('select state')); 
        $('#city').find('option').remove();
        $('#city').append($('<option>', { value : '' }).text('select city')); 
        $.post("placetitle.php",{country:country},function(data){
        var dataArray = jQuery.parseJSON(data)
        $('#state').find('option:not(:first)').remove();
        $.each(dataArray, function(key, value) {   
        $('#state').append($('<option>', { value : key }).text(value)); 

          });
          $("#loading").hide();
        });
    });
    //to populate city list
    $('#state').change( function() {
        $("#loading2").show();
        var state = $('#state').val();         
        $('#city').find('option').remove();
        $('#city').append($('<option>', { value : '' }).text('select city')); 
        $.post("placetitle.php",{country:state},function(data){
        var dataArray = jQuery.parseJSON(data)
        $('#city').find('option:not(:first)').remove();
        $.each(dataArray, function(key, value) {   
        $('#city').append($('<option>', { value : key }).text(value)); 

          });
          $("#loading2").hide();
        });
    });
          
      
    });
//expiry date => date picker
  $(function() {
       
        var start = new Date();
        start.setDate(start.getDate());
        start.setFullYear(start.getFullYear());
        $('#expDate').datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: start       
    });
    });
    

//limiting file upload (size and type)....
 $("document").ready(function(){    
    $("#front_image").change(function() {
        $("#front_image_error").html("");
        var fileInput = $('#front_image');
        var image = $("#front_image").val();
        var fileType = image.split('.').pop().toUpperCase();
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG" || fileType === "PDF"){
                var fileSize = Math.round(fileInput.get(0).files[0].size/1024);
                if(fileSize >500){
                    $("#front_image_error").html("Maximum file size you can upload is 500KB.");
                    $("#front_image_error").show();
                    $('#submit').attr('disabled','disabled');
                    return false; 
                }else{
                    $('#submit').removeAttr('disabled');
                    return true;                 
                }                         
            }else{               
                $("#front_image_error").html("File type supported png, jpg and pdf.");
                $("#front_image_error").show();
                $('#submit').attr('disabled','disabled');
                return false;  
           }        
        }    
    });
    
    $("#back_image").change(function() {
        $("#back_image_error").html("");
        var fileInput = $('#back_image');
        var image = $("#back_image").val();
        var fileType = image.split('.').pop().toUpperCase();
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG" || fileType === "PDF"){
                var fileSize = Math.round(fileInput.get(0).files[0].size/1024);
                if(fileSize >500){
                    $("#back_image_error").html("Maximum file size you can upload is 500KB.");
                    $("#back_image_error").show();
                    $('#submit').attr('disabled','disabled');
                    return false; 
                }else{
                    $('#submit').removeAttr('disabled');
                    return true;                 
                }                         
            }else{               
                $("#back_image_error").html("File type supported png, jpg and pdf.");
                $("#back_image_error").show();
                $('#submit').attr('disabled','disabled');
                return false;  
           }        
        }    
    });  
});
$(function() {
    setTimeout(function() {
        $("#success-alert").hide('blind', {}, 500);
        <? if($status){?>
        $(location).attr('href', 'workexperience');
        <? } ?>
    }, 2000);
});
</script>