<?php
$title = "Update Payment Mode";
require_once('header.php'); ?>
<div class="row service_text_bg_color">
    <div class="container" style="margin-top: 80px;">
    <fieldset>
        <legend>Update Payment Mode</legend>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="paymentModeTitle" class="control-label col-md-4">Payment Mode Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="paymentTitle" name="paymentTitle"
								data-validation="required" data-validation-error-msg-required="You must enter Payment Title"
                               placeholder="Payment Title"
                               value="<?= (isset($response->paymentTitle) ? ucwords($response->paymentTitle) : ""); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <input type="submit" name="updatePaymentMode" id="updatePaymentMode" class="btn btn-success" value="Update Payment Mode">
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