<?php
$title = "Payment Mode";
require_once('header.php'); ?>
<div class="container-fluid" style="margin-top: 80px;">
	<?php if ($deleteStatus) { ?>
        <div class="alert alert-success">Vendor Deleted Successfully.</div>
    <?php } ?>

	<?php if (isset($result)) {
			if ( isset($result) && $result==true) { ?>
				<div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo "Payment Mode ".$resultText." Successfuly!!"; ?>
				</div>
			<?php } else if (isset($result) && $result == false) { ?>
				<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo "Something went wrong. Payment Mode Not ".$resultText.""; ?>
				</div>
			<?php } 
		} ?>
    <fieldset>
        <legend>Payment Mode</legend>
        <form method="post" class="form-inline" action="paymentmode.php" id="searchForm">
            <div class="col-xs-2"></div>
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" id="paymentModeCode" name="paymentModeCode" placeholder="Payment Mode Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <input type="text" class="form-control" id="paymentTitle" name="paymentTitle" placeholder="Payment Title">
                    </div>
                </div>
                <input type="submit" name="search" id="search" class="btn btn-danger" value="SEARCH">
				 &nbsp;&nbsp;<a href="addpaymentmode" class="btn btn-danger">Create New Payment Mode</a>
            </div>
        </form>
        <br>
        <hr>
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Payment Mode Code</th>
                    <th>Payment Title</th>
                    <th>delete</th>
                </tr>
                </thead>
                <?php for ($i = 0; $i < count($paymentModeList); $i++) { ?>
                    <tr>
                        <td>
                            <?php echo $i + 1; ?>
                        </td>
                        <td>
                            <a href="editpaymentmode.php?paymentModeId=<?= $paymentModeList[$i]->getObjectId(); ?>">
                                <?php echo $paymentModeList[$i]->getObjectId(); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo ucwords($paymentModeList[$i]->paymentTitle); ?>
                        </td>
                        <td>
                            <a href="javascript: deletePaymentmode('<?= $paymentModeList[$i]->getObjectId(); ?>')">delete</a>
                        </td>
                    </tr>
                <?php } ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>

<? require_once('footer.php'); ?>

<script type="text/javascript">
	$(document).ready(function(){

	});
	
	function deletePaymentmode(objId)
	{
		var r = confirm("Are you sure?");
		if (r == true)
		{
			window.location = window.location.href+"?paymentModeId="+objId+"&d=1";
		}
	}

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

</script>
