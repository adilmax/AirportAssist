<?php
$title = "Corporate And Travel Agent Request List";
require_once('header.php');?>
 <div class="container-fluid corp-travel-top">   
    <fieldset>
        <legend>Request List</legend>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div>
                        <div class="success corporate-color"></div>
                        <div class="corporate">Corporate</div>
                    </div>
                    <div>
                        <div class="info travelagent-color" ></div>
                        <div class="travel-agent">Travel Agent</div>
                    </div>
                    <div>
                        <div class="responder-color"></div>
                        <div class="corporate">Responders</div>
                    </div>
                </div>    
                    <div class="col-md-4 nopadding">   
                        <form method="post" action="corporatetravelagentdetails">
                         <div class="form-group">
                            <select class="form-group form-control" name="type" id="type">
                                <option value="">Select value</option>
                                <?php foreach($typeList as $key=>$value){?>
                                <option value="<?=$key?>" ><?=$value;?></option>
                                <?php } ?>
                            </select> 
                        </div>
                    </div>
                            <div class=" col-md-1">
                                <button type="submit" class="btn btn-primary" id="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                  </div>
            </div>
         <br />
     
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead> 
                    <tr> 
                        <th>#</th>
                        <th>Object ID</th>
                        <th>Email ID</th>
                        <th>Agent/Company/Responder Name</th> 
                        <th>Mobile Number</th> 
                        <th>Type</th>
                        <th>Date</th>
                        
                    </tr> 
                </thead> 
                <tbody> 
                        <? $c = 0;for($i=0;$i<count($allRequest);$i++){
                        $class="";
                          if($allRequest[$i]->isCorporate==true){
                            $name = $allRequest[$i]->companyName;
                            $type = "Corporate";
                           $class = "success" ;
                        }else if($allRequest[$i]->isAgent==true){
                            $name = $allRequest[$i]->agencyName;
                            $type = "Agency";
                            $class = "info" ;
                        }else if($allRequest[$i]->isAirportResponder==true){
                            $name = $allRequest[$i]->firstName." ".$allRequest[$i]->lastName;
                            $type = "Responder";
                            $class = "active" ;
                        }
                        
                        
                        ?>
                            

                        <tr class="<?=$class;?>">
                            <th scope="row"><?=++$c;?></th>
                            <td><?=$allRequest[$i]->getObjectId();?></td>
                            <td><?=$allRequest[$i]->email;?></td>
                            <td><?=$name;?></td>
                            <td><?=$allRequest[$i]->contactNumber;?></td>
                            <td><?=$type;?></td> 
                            <td><?=$allRequest[$i]->getCreatedAt()->format('d-M-Y');?></td> 
                        </tr>
                    <?}?>
                </tbody> 
            </table>
        </div>
    </fieldset>    
</div>        
<? require_once('footer.php');?>