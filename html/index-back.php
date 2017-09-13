<? 
require_once('header.php');?>
    <form action="" method="post">
        
        <div class="row">
            <? if($status){?>
        <div class="alert alert-success" role="alert">
            Your request has been placed successfully.
        </div><? } ?>
             <? if(count($error)){?>
        <div class="alert alert-danger" role="alert">
            <?php for($i = 0;$i<count($error);$i++){
                            echo $error[$i];echo"<br>";
                }?>
        </div><? } ?>
            <div class="col-sm-9 col-md-7 col-lg-5">
                <div class="form-group">
                    <label for="originAirport">Origin Airport</label>
                    <input type="text" value ="<?=($data['originAirport']!="")?$data['originAirport']:"";?>" class="form-control" name="originAirport" id="originAirport" placeholder="Enter Airport Name or Code"
                           data-validation="required" 
                            data-validation-error-msg-required="You must enter an Orgin Airport"
                    >
                </div>
                <div class="form-group">
                  <label for="arrivalAirport">Arrival Airport</label>
                  <input type="text" value ="<?=($data['arrivalAirport']!="")?$data['arrivalAirport']:"";?>" class="form-control" name="arrivalAirport" id="arrivalAirport" placeholder="Enter Airport Name or Code"
                    accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter an Arrival Airport"
                  >
                </div>
                
                <div class="form-group">
                    <label for="flightType">Flight Type</label>
                   <select class="form-control" name="flightType" id="flightType" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must select Flight Type">
                       <option value="">[Select Flight Type]</option>
                       <? foreach($flightType as $key=>$value):?>
                        <option value="<?=$key?>" <?=($data['flightType']!="")?"selected":"";?>><?=$value?></option>
                        <? endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                   <label for="flightNumber">Flight Number</label>
                   <input type="text" value ="<?=($data['flightNumber']!="")?$data['flightNumber']:"";?>"class="form-control" name= "flightNumber" id="flightNumber" placeholder="Enter Fight Number" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter Flight Number">
                </div>
                <div class="form-group">
                    <label for="arrivalTime">Arrival Date & Time</label>
                     <div class='input-group date' id='datetimepicker1'>
                         <input type='text' class="form-control" accept=""data-validation="required" value ="<?=($data['arrivalTime']!="")?$data['arrivalTime']:"";?>"
                                 name="arrivalTime" id ="arrivalTime"
                    data-validation-error-msg-required="You must enter an Arrival Date & Time"/>
                         <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                     </div> 
                 </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <select class="form-control" name="service" id="service" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must select Service">
                        <option value="">[Select Service]</option>
                        <? foreach($services as $key=>$value):?>
                        <option value="<?=$key?>" <?=($data['service']!="")?"selected":"";?>><?=$value?></option>
                        <? endforeach;?>
                    </select>
                </div>            
            </div>  
            <div class="col-sm-9 col-md-7 col-lg-5">
                <div class="form-group">
                  <label for="title">Title</label>
                  <select class="form-control" name="title" id="title" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter a Title">
                      <option value="">[Select Title]</option>
                      <? foreach($title as $key=>$value):?>
                      <option value="<?=$key?>" <?=($data['title']!="")?"selected":"";?>><?=$key?></option>
                      <? endforeach;?>                    
                  </select>
                </div>
                <div class="form-group">
                    <label for="title">First Name</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter a First Name" value ="<?=($data['firstName']!="")?$data['firstName']:"";?>">
                </div>
                <div class="form-group">
                   <label for="title">Last Name</label>
                   <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" accept=""data-validation="required" 
                    data-validation-error-msg-required="You must enter a Last Name" value ="<?=($data['lastName']!="")?$data['lastName']:"";?>">
               </div>
                <div class="form-group">
                   <label for="title">Email</label>
                   <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" data-validation="required email" 
                                           data-validation-error-msg-required="You must enter an Email" value ="<?=($data['email']!="")?$data['email']:"";?>">
                </div>
                <div class="form-group">
                    <label for="title">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Country Code - Mobile Number" data-validation="required number length" 
                           data-validation-length="8-15"  
                           data-validation-error-msg-length="Minimum length should be 8"
                           data-validation-error-msg-required="You must enter a Mobile Number" value ="<?=($data['mobile']!="")?$data['mobile']:"";?>">
                </div>
                 <div class="form-group">
                    <label for="title">Message</label>
                    <textarea class="form-control" rows="3" id="message" name="message"><?=($data['message']!="")?$data['message']:"";?></textarea>
                </div>
                <input type="submit" class="btn btn-default" name="details" value="Submit">          
            </div>  
        </div>
    </form>

<? 
require_once('footer.php');?>
    <script type="text/javascript">
   $(function() {
       $.validate();
    $('#arrivalAirport').autocomplete ({source:'airportsearch.php', minLength:1});
    $('#originAirport').autocomplete ({source:'airportsearch.php', minLength:1});
    $("#datetimepicker1").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left"
    });
    }); 
</script>  