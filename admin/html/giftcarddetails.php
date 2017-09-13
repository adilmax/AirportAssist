<? $title = "Gift Card Request Details";
$titleName = "Gift Card Request Details";
require_once('header.php');?>

<div class="row service_text_bg_color">
    <div class="container " style="margin-top: 80px;">
<form action="" method="post" class="form-horizontal form_top" >
    <? if($status){?>
        <div class="alert alert-danger" role="alert">
           Sorry.. Not a valid confirmation code.
        </div>
    <? } ?>
    <? if($userDetails != false):
    $offerAmount = $userDetails->amount;
    if($userDetails->offerValue != ""){
        $percentage =   ($userDetails->offerValue/100)*$userDetails->amount;
        $offerAmount =$userDetails->amount - $percentage;
    }
    ?>
    <fieldset>
    <div class="ghadminpage_wrapper">
      <legend>Gift Card Details</legend>
    <div class="form-group">
            <label class="col-sm-3 control-label">Sender Name:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->senderName?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Email:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->senderEmail?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Receiver Name:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->receiverName?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Receiver Email:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->receiverEmail?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Payment Id:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->paymentId?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Amount:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->amount?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Percentage:</label>
            <div class="col-sm-9 label_top"><?=($userDetails->offerValue != "")?$userDetails->offerValue:"-";?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Amount Paid:</label>
            <div class="col-sm-9 label_top"><?= $offerAmount?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Message:</label>
            <div class="col-sm-9 label_top"><?=$userDetails->message?></div>
        </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Payment Status:</label>
            <div class="col-sm-9 label_top"><?=($userDetails->paymentStatus)?"<div class='success_box'>Paid</div>":"<div class='pending_box'>Pending</div>";?></div>
        </div>
      </div>
    <? endif; ?>       
    
  </form>
</div>
</div>
</div>
<? require_once('footer.php');?>
 
  
       