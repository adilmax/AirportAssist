<?php
$title = "Gift Card Request List";
require_once('header.php');?>
 <div class="container-fluid" style="margin-top: 80px;">   
    <?php if($deleteStatus){?>
        <div class="alert alert-success">Request Deleted Successfully.</div>
    <?php } ?>
    <fieldset>
    <div class="ghadminpage_wrapper">
        <legend>Gift Card List</legend>
       
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead> 
                    <tr> 
                        <th>#</th>
                        <th>Gift Card Code</th>
                        <th>Sender Name</th> 
                        <th>Sender Email</th>
                        <th>Reciever Name</th> 
                        <th>Reciever Email</th>
                        <th>Payment ID</th>
                        <th>Amount(USD)</th>
                        <th>Discount (%)</th>
                        <th>Totle Amount Paid</th>
                        <th>Created Time</th>
                        <th>Delete</th>
                    </tr> 
                </thead> 
                <tbody>
                <? if(count($allRequest)> 0){ ?>
                <? $c = 0;for($i=0;$i<count($allRequest);$i++){
                        $offerAmount = $allRequest[$i]->amount;
                        if($allRequest[$i]->offerValue != ""){
                          $percentage =   ($allRequest[$i]->offerValue/100)*$allRequest[$i]->amount;
                            $offerAmount = $allRequest[$i]->amount - $percentage;
                        }
                        ?>
                        <tr class="<?=$class;?>">
                            <th scope="row"><?=++$c;?></th>
                            <td><a href="giftcarddetails?d=<?=$allRequest[$i]->getObjectId();?>"><?=$allRequest[$i]->getObjectId();?></a></td>
                            <td><?=  ucwords(strtolower($allRequest[$i]->senderName));?></td>
                            <td><?=$allRequest[$i]->senderEmail;?></td>
                            <td><?=  ucwords(strtolower($allRequest[$i]->receiverName));?></td>
                            <td><?=$allRequest[$i]->receiverEmail;?></td>
                            <td><?=$allRequest[$i]->paymentId;?></td> 
                            <td><?=number_format($allRequest[$i]->amount);?></td>
                            <td><?=($allRequest[$i]->offerValue != "")?$allRequest[$i]->offerValue:"-"; ?></td>
                            <td><?=$offerAmount; ?></td>
                            <td><?=$allRequest[$i]->getCreatedAt()->format('d-M-Y');?></td> 
                            <td><a href="?id=<?=$allRequest[$i]->getObjectId();?>&d=1" class="button-form">Delete</a></td>
                        </tr> 
                    <?}?>
                <? } else {?>
                    <div>No Information..</div>
                <? }?>
                </tbody> 
            </table>
        </div>
        </div> 
    </fieldset>
     <form action="" method="post" id="blog" class="form-horizontal">
         <input type="hidden" name="page" value="<?= $page;?>" id="page">
         <? if($count > 10){?>
             <div >
                 <? if(count($allRequest)==10){?><input type="submit" name="next" value="Next >>" onclick="changePageValue('next')" id="next" class="btn btn-default register_button"><? } ?>
                 <? if($page > 1) {?><input type="submit" name="prev" value="<< Previous" onclick="changePageValue('prev')" id="prev" class="btn btn-default register_button previous_button"><? } ?>
             </div>
         <? } ?>
     </form>
</div>        
<? require_once('footer.php');?>
<script type="text/javascript">
    function changePageValue(type){
       // alert(type);
        varNextValue = document.getElementById('page').value;
        if(type === "next"){
            varNextValue++;
        }
        if(type === "prev"){
            varNextValue--;
        }
        document.getElementById('page').value = varNextValue;
        //alert(document.getElementById('page').value);
    }
</script>
