<?php
$title = "add payment mode";
require_once('header.php'); ?>
<div class="row service_text_bg_color">
	<div class="container" style="margin-top: 80px;">
    <fieldset>
        <legend>Add Payment Mode</legend>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="" class="control-label col-md-3">Payment Title</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="paymentTitle" name="paymentTitle" placeholder="Payment Title" data-validation="required" data-validation-error-msg-required="You must enter Payment Title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" name="addPaymentMode" id="addPaymentMode" class="btn btn-success" value="Add Payment Mode">
                    </div>
                </div>
            </form>
    </fieldset>
	</div>
</div>

<? require_once('footer.php'); ?>

<script>
    $(document).ready(function () {
		
		$.validate();

    });
</script>