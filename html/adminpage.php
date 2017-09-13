<? $title = "Admin";
$titleName = "Admin";
require_once('header.php');?>
<div class="middle_image"></div> 
<div class="row service_text_bg_color">
    <div class="container " style="margin-top: 80px;">
<form action="" method="post" class="form-horizontal form_top" >
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label" for="originAirport">Service Request Code</label>
                         <div class="col-sm-9 "><input type="text" class="form-control" name="confirmation" id="confirmation" placeholder="Enter Service Request Code"
                               data-validation="required" 
                               data-validation-error-msg-required="You must enter a Confirmation Code"></div>
                    </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <input type="submit" class="btn btn-default register_button" name="conCode" value="Submit"> 
        </div>
      </div>  
    </fieldset>     
    
    <? if($status){?>
        <div class="alert alert-danger" role="alert">
           Sorry.. Not a valid confirmation code.
        </div>
    <? } ?>
    <? if($userDetails != false):?>
    <fieldset>
      <legend>User Details</legend>
      <div class="form-group" style="margin-top: 40px;">
            <label class="col-sm-3 control-label">Domain Name:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->domainName?></div>
        </div>
      <div class="form-group" style="margin-top: 40px;">
            <label class="col-sm-3 control-label">Origin Airport:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->originAirport?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Arrival Airport:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->arrivalAirport?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Flight Type:</label>
            <div class="col-sm-9 label_top"><?=$flightType[$userDetails->flightType]?></div>
        </div>
      <? if($userDetails->flightType == 3){?>
        <div class="form-group">
              <label class="col-sm-3 control-label">Transit Flight Number:</label>
              <div class="col-sm-9 label_top"><?=$userDetails->transitFlightNumber?></div>
        </div>
      <? }?>
    <div class="form-group">
            <label class="col-sm-3 control-label">Flight Number:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->flightNumber?></div>
    </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Adults:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->adult?></div>
    </div>
      <div class="form-group">
            <label class="col-sm-3 control-label">Children:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->children?></div>
    </div>
      <div class="form-group">
            <label class="col-sm-3 control-label">Infants:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->infants?></div>
    </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Class Of Travel:</label>
            <div class="col-sm-9 label_top"><?=($userDetails->classOfTravel != "")?$classOfTravel[$userDetails->classOfTravel]:"-";?></div>
    </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Arrival Date & Time:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->arrivalTime?></div>
        </div>
   
    <div class="form-group">
            <label class="col-sm-3 control-label">Service Type:</label>
            <div class="col-sm-9 label_top"><?$userDetails->service->fetch();$userDetails->service->serviceType->fetch();echo $userDetails->service->serviceType->title;?></div>
       </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Service:</label>
            <div class="col-sm-9 label_top"><?echo $userDetails->service->title?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Full Name:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->title.". ".$userDetails->firstName." ".$userDetails->lastName?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Email:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->email?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Mobile Number:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->mobile?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Message:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->message?></div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label">Payment Status:</label>
            <div class="col-sm-9 label_top"><?=($userDetails->paymentStatus)?"<div class='success_box'>Paid</div>":"<div class='pending_box'>Pending</div>";?></div>
        </div>
      <?if($userDetails->paymentStatus):?>
      <div class="form-group">
            <label class="col-sm-3 control-label">Transaction ID:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->transactionID;?></div>
        </div>
      <? endif ;?>
      <div class="form-group">
            <label class="col-sm-3 control-label">Total Amount(<?=($userDetails->currency !="")?strtoupper($userDetails->currency->currencyCode):"";?>) </label>          
            <div class="col-sm-7 label_top">    <input type="text" class="form-control" name="totalAmount" id="totalAmount" placeholder="Enter Total Amount" value="<?=($userDetails->totalAmount!="")?$userDetails->totalAmount:""?>"></div> 
        </div>
      <div class="form-group">
            <label class="col-sm-3 control-label">Advance Amount(<?=($userDetails->currency !="")?strtoupper($userDetails->currency->currencyCode):"";?>) </label>          
            <div class="col-sm-7 label_top">    <input type="text" class="form-control" name="advanceAmount" id="advanceAmount" placeholder="Enter Advance Amount" value="<?=($userDetails->advanceAmount!="")?$userDetails->advanceAmount:""?>"></div> 
       </div>
      <div class="form-group">
          <div class="col-sm-3 control-label"> <input type="button" class="btn btn-default register_button" id="amountButton" value="Update">
           
      </div>
            
      </div>
        
     <input type="hidden" name="conCode" id="conCode" value="<?= $conCode;?>">
    </fieldset>
        
<? endif; ?>       
    
  </form>
</div>
</div>
<? require_once('footer.php');?>
<script type="text/javascript">
   $(function() {
       $.validate();
       $("#amountButton").click(function(){
           $("#amountButton").val('Updating..');
           var conCode = $("#conCode").val();
           var amount = $("#totalAmount").val();
           var advanceAmount = $("#advanceAmount").val();
           $.post("updateamount.php",{amount:amount,conCode:conCode,advance:advanceAmount},function(data){
               if(data){
                   $("#amountButton").val('Updated');
               }else{
                   alert("sorry something went wrong. Please try after some time.")
               }
           });
       });
   });
  </script> 
  
       