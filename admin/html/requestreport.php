<?php
$title = "Airport Service Request List";
require_once('header.php'); ?>
<div class="container-fluid" style="margin-top: 80px;">
    <?php if ($deleteStatus) { ?>
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

 <!-- filter -->
            <form method="post" class="form-inline">
                <div class="col-xs-2"></div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Search by First Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Search by Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Search by Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" name="mobile" placeholder="Search by Mobile">
                    </div>
                  </div>
                    <input type="submit" name="search" id="search" class="btn btn-primary" value="SEARCH" >
                </div>
            </form>
        <br><hr>
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Service Code</th>
                    <th>Network Id</th>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Mobile Number</th>
                    <th>Service</th>
                    <th>Origin</th>
                    <th>Arrival</th>
                    <th>Arrival Time</th>
                    <th>Amount(USD)</th>
                    <th>Campaign Name</th>
                    <th>Form Name</th>
                    <th>Call Back</th>
					<th>Repeating Customer</th>
                    <th>Domain Name</th>
                    <th>Comment</th>

                    <th>Created Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <? if (count($allRequest) > 0) { ?>
                    <? $c = 0;
                    for ($i = 0; $i < count($allRequest); $i++) {
                        $class = "";
                        if ($allRequest[$i]->status == 1) {
                            $class = "active";
                        } else if ($allRequest[$i]->status == 2) {
                            $class = "info";
                        } else if ($allRequest[$i]->status == 3) {
                            $class = "success";
                        }
                        ?>
                        <tr class="<?= $class; ?>">
                            <th scope="row"><?= ++$c; ?></th>
                            <td>
                                <a href="adminpage?d=<?= $allRequest[$i]->getObjectId(); ?>"><?= $allRequest[$i]->getObjectId(); ?></a>
                            </td>
                            <td><?php
                                if ($allRequest[$i]->agentOrCorporateID != "") {
//                                    $allRequest[$i]->agentOrCorporateID->fetch();
                                    echo "<a id='agentOrCorporateID' data-toggle=\"modal\" data-target=\"#myModal\">" . $allRequest[$i]->agentOrCorporateID->getObjectId() . "</a>";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                            <td><?= ucwords(strtolower($allRequest[$i]->firstName . " " . $allRequest[$i]->lastName)); ?></td>
                            <td><?= $allRequest[$i]->email; ?></td>
                            <td><?= $allRequest[$i]->mobile; ?></td>
                            <td><?= ($allRequest[$i]->flightType != "") ? $flightType[$allRequest[$i]->flightType] : "-"; ?></td>
                            <td><?= $allRequest[$i]->originAirport; ?></td>
                            <td><?= $allRequest[$i]->arrivalAirport; ?></td>
                            <td><?= $allRequest[$i]->arrivalTime; ?></td>
                            <td><?= number_format($allRequest[$i]->totalAmount, 2); ?></td>
                            <td><?= $allRequest[$i]->campaignName; ?></td>
                            <td><?= $allRequest[$i]->formName; ?></td>
                            <td><?= $allRequest[$i]->callBack; ?></td>
							<td><?= ($allRequest[$i]->isRepeatCustomer==true) ? 'Yes' : 'No'; ?></td>
                            <td><?= $allRequest[$i]->domainName; ?></td>
                            <td><?= $allRequest[$i]->comment; ?></td>
                            <td><?= $allRequest[$i]->getCreatedAt()->format('d-M-Y'); ?></td>
                            <td><a href="?id=<?= $allRequest[$i]->getObjectId(); ?>&d=1" class="button-form">Delete</a>
                            </td>
                        </tr>
                    <? } ?>
                <? } else { ?>
                    <div>No Information..</div>
                <? } ?>
                </tbody>
            </table>
        </div>
    </fieldset>
    <form action="" method="post" id="blog" class="form-horizontal">
        <input type="hidden" name="page" value="<?= $page; ?>" id="page">
        <? if ($count > 100) { ?>
            <div>
                <? if (count($allRequest) == 100) { ?><input type="submit" name="next" value="Next >>"
                                                             onclick="changePageValue('next')" id="next"
                                                             class="btn btn-default register_button"><? } ?>
                <? if ($page > 1) { ?><input type="submit" name="prev" value="<< Previous"
                                             onclick="changePageValue('prev')" id="prev"
                                             class="btn btn-default register_button previous_button"><? } ?>
            </div>
        <? } ?>
    </form>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Murgency Network user Details</h4>
            </div>
            <div class="modal-body">
                <? if (count($allRequest) > 0) { ?>
                    <? $c = 0;
                    for ($i = 0; $i < count($allRequest); $i++) {
                        ?>
                        <?php
                        if ($allRequest[$i]->agentOrCorporateID != "") {
                            $allRequest[$i]->agentOrCorporateID->fetch();
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Object ID :</span>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $allRequest[$i]->agentOrCorporateID->getObjectId(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Type :
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if ($allRequest[$i]->agentOrCorporateID->isCorporate == true) {
                                        echo "Corporate";
                                    } else if ($allRequest[$i]->agentOrCorporateID->isAgent == true) {
                                        echo "Agency";
                                    } else {
                                        echo "-";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Name : </span>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if ($allRequest[$i]->agentOrCorporateID->isCorporate == true) {
                                        echo $allRequest[$i]->agentOrCorporateID->companyName;
                                    } else if ($allRequest[$i]->agentOrCorporateID->isAgent == true) {
                                        echo $allRequest[$i]->agentOrCorporateID->agencyName;
                                    } else {
                                        echo "-";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Email ID :</span>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $allRequest[$i]->agentOrCorporateID->email; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    Mobile :
                                </div>
                                <div class="col-md-6">
                                    <?php echo $allRequest[$i]->agentOrCorporateID->contactNumber; ?>
                                </div>
                            </div>

                        <?php }
                        ?>
                    <? } ?>
                <? } else { ?>
                    <div>No Information..</div>
                <? } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<? require_once('footer.php'); ?>
<script type="text/javascript">
    function changePageValue(type) {
        // alert(type);
        varNextValue = document.getElementById('page').value;
        if (type === "next") {
            varNextValue++;
        }
        if (type === "prev") {
            varNextValue--;
        }
        document.getElementById('page').value = varNextValue;
        //alert(document.getElementById('page').value);
    }

//function myFunction() {
//    $("#firstName").on("keyup", function() {
//    var value = $(this).val();
//
//    $("table tr").each(function(index) {
//        if (index !== 0) {
//
//            $allRequest = $(this);
//
//            var id = $allRequest.find("td:first").text();
//
//            if (id.indexOf(value) !== 0) {
//                $allRequest.hide();
//            }
//            else {
//                $allRequest.show();
//            }
//        }
//      });
//   });
//}


</script>
