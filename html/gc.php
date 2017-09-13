<?php
$title = " Airport Lounge Vouchers | Buy Gift Cards | Travel Gift Vouchers";
$titleName = "Select MUrgency eGift Cards";
$metaDesc = "Gift the comfort of Airport Assistance Services to your loved ones with access to airport lounge, Meet & Greet, baggage handling, assistance for elderly & more. Buy eGift Card.";
require_once 'header_inner.php';
?>
<div class="row">

</div>
<div class="row service_text_bg_color padding-left">
    <div class="container " style="margin-top: 100px;">
        <fieldset>
            <legend>MURGENCY GIFT CARDS</legend>
            <div class="giftcard-from">
                <div class="row">
                    <div class="container">
                        <div class="col-lg-8 col-lg-offset-1">
                            <?php if (count($error) > 0) { ?>
                                <div class="alert alert-danger">
                                    <ul style="list-style: none;">
                                        <?php for ($i = 0; $i < count($error); $i++) { ?>
                                            <li><?= $error[$i]; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <form action="" method="post" class="gc_form">
                    <div>
                        <p class="gc_title">GIVE A GIFT OF AIRPORT ASSISTANCE</p>
                        <p class="gc_subtitle">Customize your eGift Card</p>

                        <div class="cart_count btn btn-card btn-small"><a
                                href="viewgiftcart"><?= (isset($_SESSION["content"])) ? "View Cart(" . count($_SESSION["content"]) . ")" : "Cart(0)"; ?></a>
                        </div>
                    </div>
                    <h5>1. Choose a design.</h5>
                    <div class="in-wrapper">
                        <div class="row">
                            <div class="col-md-12 gc_pt10">

                                <div class="col-md-4" id="default_image">
                                    <img class="gc-img-selected gc-img_blank" src="">
                                    <span class="gc_span">Selected Image</span>
                                </div>
                                <div class="col-md-2 gift_image_res">
                                    <img class="gc-img" src="giftcard/giftcard_1.jpg">
                                </div>
                                <div class="col-md-2 gift_image_res">
                                    <img class="gc-img" src="giftcard/giftcard_4.jpg">
                                </div>
                                <div class="col-md-2 gift_image_res">
                                    <img class="gc-img" src="giftcard/giftcard_3.jpg">
                                </div>
                                <div class="col-md-2 gift_image_res">
                                    <button class="file-upload btn-card btn-small">
                                        <input type="file" class="file-input" name="image" id="image">Upload Image
                                    </button>
                                    <input type="hidden" name="hiddenImage" value="" id="hiddenImage">
                                    <div style="color: red;" id="img_error"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <h5>2. Write a note to go with your gift card.</h5>
                    <div class="in-wrapper">
                        <div class="row gc_pt10">
                            <div class="col-md-7">
                                <textarea class="input-md form-control place_holder" rows="7"
                                          placeholder="Add a message"
                                          maxlength="400" name="message" id="message" accept=""
                                          data-validation="required"
                                          data-validation-error-msg-required="You must enter message"></textarea>
                                </textarea>
                            </div>
                            <div class="col-md-5">
                                <div class="message_div">
                                    <p>Personalize your gift card with a message</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5>3. Select an amount to give.</h5>
                    <div class="in-wrapper">

                        <div class="select-amount">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-1 select-dollar">
                            <!--<span class="amount25_span">
                            <button id="amount-25" class="btn btn-card btn-small btn-border btn-amount amount" type="button"
                                    value="25">$25
                            </button></span>--->
                            <span class="amount_span">
                            <button id="amount-50" class="btn btn-card btn-small btn-border btn-amount amount" type="button"
                                    value="50">$50
                            </button></span>
                            <span class="amount_span">
                            <button id="amount-100" class="btn btn-card btn-small btn-border btn-amount  amount" type="button"
                                    value="100">$100
                            </button></span>
                            <span class="amount200_span">
                            <button id="amount-200" class="btn btn-card btn-small btn-border btn-amount amount" type="button"
                                    value="200">$200
                            </button></span>
                                </div>
                                <div class="col-md-4 select-amt"
                            <span class="selected_amount">
                            $ <input type="text" name="giftAmount" class="input-sm place_holder" placeholder="Enter up to $500"
                                   accept="" data-validation="required"
                                   data-validation-error-msg-required="You must select or enter amount" id="giftAmount">
                            <div id="amountError" style="color: #a94442;"></div>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-md-offset-1">
                            <ul>
                                <!--<li class="amount_li">Enter an amount between $25 - $500 USD.</li>-->
                                <li class="amount_li"> You can add multiple personalized cards to your cart up to a
                                    total of $500 USD.
                                </li>
                                <li class="amount_li">Amount that would exceed the maximum cart total are not
                                    available.
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            <br>
            <div class="in-wrapper center">
                <div class="row gc_pt10">
                    <div class="col-md-2 col-md-offset-4">
                        <input type="submit" class="btn btn-card btn-medium" value="Add To Cart"
                               name="addToCart" id="addToCart"/></div>
                    <div class="col-md-2 gift_mt-10">
                        <input type="submit" class="btn btn-card btn-medium" name="checkOut"
                               value="Check Out" id="checkOut"/>
                    </div>
                </div>
            </div>
            </form>
        </fieldset>
    </div>

</div>
</div>


<? require_once('giftcard-footer.php'); ?>
<script type="text/javascript">
    $(function () {
        $.validate();
    });
</script>
<script type="text/javascript">
    $(".amount").click(function () {
        $("#giftAmount").val($(this).attr('value'));
    });
    $("#giftAmount").change(function () {
        var giftAmount = $("#giftAmount").val();
        if (giftAmount >=25 && giftAmount<=500) {
            $("#amountError").html("");
            $('#checkOut').prop('disabled', false);
            $("#addToCart").prop("disabled",false);
            
            
        }else{
            $("#amountError").html("Enter an amount  up to $500.");
            $('#checkOut').prop('disabled', true);
            $("#addToCart").prop("disabled",true);
        }
    });

    $("#image").change(function () {
        var data = new FormData();
        jQuery.each(jQuery('#image')[0].files, function (i, file) {
            data.append('file-' + i, file);
        });
        jQuery.ajax({
            url: 'upload.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                $("#img_error").hide();
                var obj = jQuery.parseJSON(data);
                if (obj.error == false) {
                    $('#default_image > img').each(function () {
                        $(this).attr('src', "giftcard/" + obj.value);
                        $("#hiddenImage").val(obj.value);
                    });
                } else {
                    $("#img_error").show();
                    $("#img_error").html(obj.value);
                }
            }
        });

    });
    $(".gc-img").click(function () {
        var url = $(this).attr('src');
        var splitURL = url.split("/");
        $('#default_image > img').each(function () {
            $(this).attr('src', url);
            $("#hiddenImage").val(splitURL[1]);
        });


    });
</script>