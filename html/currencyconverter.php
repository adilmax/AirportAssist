<?php
$title = "Currency Converter";
$source = "test";
$class = "flight-body-background";

require_once 'html/header_inner.php';
//----------------------------------------------------
?>

	<!-- html part starts -->
	<div class="currency-converter-header">
		<h4 id="currencyHeading">Currency Converter</h4>
	</div>
	<section class="currency-converter-wrapper">
		<form>
			<div class="row form-group">
				<div class="col-md-6 col-xs-6">
					<input type="number" name="currencyFromInputBox" class="form-control" id="currencyFromInputBox" value="1">
				</div>
				<div class="col-md-6 col-xs-6">
					<select name="currencyFromSelectBox" class="form-control" id="currencyFromSelectBox">
						<? for ($i = 0; $i < count($allCurrency); $i++) { ?>
							<?php if ($allCurrency[$i]["currency"] == "USD") { ?>
								<option selected
										value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
							<?php } ?>
							<option value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
						<? } ?>

						<option value="USD">US Dollar</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6 col-xs-6">
					<input type="number" name="currencyToInputBox" class="form-control" id="currencyToInputBox">
				</div>
				<div class="col-md-6 col-xs-6">
					<select name="currencyToSelectBox" class="form-control" id="currencyToSelectBox">
						<? for ($i = 0; $i < count($allCurrency); $i++) { ?>
							<?php if ($allCurrency[$i]["currency"] == "EUR") { ?>
								<option selected
										value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
							<?php } ?>
							<option value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
						<? } ?>
					</select>
				</div><!-- 
				<div class="col-md-12">
					<button type="button" class="btn btn-danger btn-block" name="currencyconverterbutton" id="currencyconverterbutton">CONVERT</button>
				</div> -->
			</div>
		</form>
	</section>
<?
//----------------------------------------------------
require_once 'html/footer-flight.php';
?>

<script type="text/javascript">
    $(document).ready(function () {

        $.validate();

		var amount = $('#currencyFromInputBox').val();
        var from = $('#currencyFromSelectBox').val();
        var to = $('#currencyToSelectBox').val();

        var data = {
            'amount': amount,
            'from': from,
            'to': to
        };

        $.ajax({
            url: "currencyajax.php",
            type: 'post',
            data: data,

            success: function (result) {
                $('#currencyToInputBox').val(result);
                $('#currencyFromInputBox').val(1);
                return false;
            }
        });

		$("#currencyFromInputBox").on("input", function(){
			getBottomCurrencyValues();
		});

		$("#currencyFromSelectBox").change(function(){
			getBottomCurrencyValues();
		});


		$("#currencyToInputBox").on("input", function(){
			getTopCurrencyValues();
		});

		$("#currencyToSelectBox").change(function(){
			getTopCurrencyValues();
		});


	});

	function currencyCompare() {
        var from = document.getElementById("currencyFromSelectBox").value;
        var to = document.getElementById("currencyToSelectBox").value;

        if (from === to) {
            $("#currencyCompareError").show();
        } else {
            $("#currencyCompareError").hide();
        }

    }


	function getBottomCurrencyValues()
	{
		currencyCompare();

		var amount = $('#currencyFromInputBox').val();
		var from = $('#currencyFromSelectBox').val();
		var to = $('#currencyToSelectBox').val();


		if ($('#currencyFromInputBox').val() == "" || isNaN(amount))
		{
//			var data = {
//				'amount': 1,
//				'from': from,
//				'to': to
//			};
//
//			$.ajax({
//
//				url: "currencyajax.php",
//				type: 'post',
//				data: data,
//
//				success: function (result) {
//					$('#currencyToInputBox').val(result);
//					$('#currencyFromInputBox').val(1);
//					return false;
//				}
//			});
			$('#currencyToInputBox').val(0);


		}
		else {

			var data = {
				'amount': amount,
				'from': from,
				'to': to
			};


			$.ajax({

				url: "currencyajax.php",
				type: 'post',
				data: data,

				success: function (result) {
					var finalResult = result.replace(/,/g, '');
					$("#currencyToInputBox").val(finalResult);
					// console.log(result);
				}


			});

		}

	}

	function getTopCurrencyValues() {


        currencyCompare();

        var bottomAmount = $('#currencyToInputBox').val();
        var from = $('#currencyToSelectBox').val();
        var to = $('#currencyFromSelectBox').val();


        var data = {
            'amount': bottomAmount,
            'from': from,
            'to': to
        };


        $.ajax({

            url: "currencyajax.php",
            type: 'post',
            data: data,

            success: function (result) {
                var finalResult = result.replace(/,/g, '');
                $("#currencyFromInputBox").val(finalResult);
                // console.log(result);
            }


        });

    }
</script>