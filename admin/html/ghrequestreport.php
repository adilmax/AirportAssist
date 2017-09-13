<?php
$title = "Ground Handling Service Request List";
require_once('header.php');?>
    <div class="container-fluid" style="margin-top: 80px;">
        <?php if($deleteStatus){?>
            <div class="alert alert-success">Request Deleted Successfully.</div>
        <?php } ?>
        <fieldset>
            <legend>Ground Handling Request List</legend>
           
            <div class="table-responsive" style="font-size:13px;">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Code</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Phone</th>
                        <th>Company Name</th>
                        <th>Form Name</th>
                        <th>Created Time</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    <? $c = 0;for($i=0;$i<count($allRequest);$i++){
                       ?>
                        <tr class="<?=$class;?>">
                            <th scope="row"><?=++$c;?></th>
                            <td><a href="ghadminpage?d=<?=$allRequest[$i]->getObjectId();?>"><?=$allRequest[$i]->getObjectId();?></a></td>
                            <td><?=  ucwords(strtolower($allRequest[$i]->fname." " .$allRequest[$i]->lname));?></td>
                            <td><?=$allRequest[$i]->email;?></td>
                            <td><?=$allRequest[$i]->mobileNumber;?></td>
                            <td><?=$allRequest[$i]->cname;?></td>
                            <td><?=$allRequest[$i]->formName;?></td>
                            <td><?=$allRequest[$i]->getCreatedAt()->format('d-M-Y');?></td>
                            <td><a href="?id=<?=$allRequest[$i]->getObjectId();?>&d=1" class="button-form">Delete</a></td>
                        </tr>
                    <?}?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
<? require_once('footer.php');?>