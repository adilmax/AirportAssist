<?php
/**
 * Created by PhpStorm.
 * User: Adil
 * Date: 3/22/2017
 * Time: 11:37 AM
 */

$title = "India Airport Service Request List";
require_once('header.php');?>
<div class="container-fluid" style="margin-top: 80px;">
    <?php if($deleteStatus){?>
        <div class="alert alert-success">Request Deleted Successfully.</div>
    <?php } ?>
    <fieldset>
        <legend>Request List</legend>
        <div>
            <div class="success" style="width:20px;height:20px;float:left;background-color: #dff0d8;"></div>
            <div style="padding: 5px;font-size:12px;">Payment Success</div>
        </div>
        <div>
            <div class="info" style="width:20px;height:20px;float:left;background-color: #d9edf7;"></div>
            <div style="padding: 5px;font-size:12px;">Admin Approved</div>
        </div>
        <div>
            <div style="width:20px;height:20px;float:left;background-color: #f5f5f5;"></div>
            <div style="padding:  5px;font-size:12px;">Pending Request</div>
        </div>
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Service Code</th>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Service</th>
                    <th>Amount(USD)</th>
                    <th>India Service</th>
                    <th>Origin</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Destination</th>
                    <th>Form Name</th>
                    <th>Domain Name</th>
                    <th>Created Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <? if(count($allRequest)> 0){ ?>
                    <? $c = 0;for($i=0;$i<count($allRequest);$i++){
                        $class="";
                        if($allRequest[$i]->status==1){
                            $class = "active" ;
                        }else if($allRequest[$i]->status==2){
                            $class = "info" ;
                        }else if($allRequest[$i]->status==3){
                            $class = "success" ;
                        }
                        ?>
                        <tr class="<?=$class;?>">
                            <th scope="row"><?=++$c;?></th>
                            <td><a href="indiaservicereportdetails?d=<?=$allRequest[$i]->getObjectId();?>"><?=$allRequest[$i]->getObjectId();?></a></td>
                            <td><?=  ucwords(strtolower($allRequest[$i]->firstName." " .$allRequest[$i]->lastName));?></td>
                            <td><?=$allRequest[$i]->email;?></td>
                           <td><?=($allRequest[$i]->serviceType !="")?$flightType[$allRequest[$i]->flightType]:"-";?></td>
                            <td><?=number_format($allRequest[$i]->totalAmount,2);?></td>
                            <td><?=$allRequest[$i]->indiaServices;?></td>
                            <td><?=$allRequest[$i]->originAirport;?></td>
                            <td><?=$allRequest[$i]->arrivalAirport;?></td>
                            <td><?=$allRequest[$i]->departureAirport;?></td>
                            <td><?=($allRequest[$i]->destinationAirport != "")?$allRequest[$i]->destinationAirport:"-";?></td>
                            <td><?=($allRequest[$i]->formName !="")?$allRequest[$i]->formName : "-";?></td>
                            <td><?=$allRequest[$i]->domainName;?></td>
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
    </fieldset>
    <form action="" method="post" id="blog" class="form-horizontal">
        <input type="hidden" name="page" value="<?= $page;?>" id="page">
        <? if($count > 100){?>
            <div >
                <? if(count($allRequest)==100){?><input type="submit" name="next" value="Next >>" onclick="changePageValue('next')" id="next" class="btn btn-default register_button"><? } ?>
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
