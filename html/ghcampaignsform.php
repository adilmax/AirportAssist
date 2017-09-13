<?
$title = "Campaign form – Ground Handling |Ramp Services |Aircraft maintenance | Crew assistance";
$metaDesc = "All ground handling services including aircraft maintenance, VIP Passenger service, Cargo services undertaken globally. Just fill up a simple form to book your now";
require_once 'html/header_inner.php';

?>

<div class="row service_text_bg_color padding-left">
    <div class="container " style="margin-top: 120px;">
        <fieldset>
            <legend>GROUND HANDLING FORM</legend>
        </fieldset>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="col-md-8 col-md-offset-1 pd-b-30">
                    <? if (count($error) > 0) { ?>
                        <ul class="list-group">
                            <? for ($i = 0; $i < count($error); $i++) { ?>
                                <li class="list-group-item list-group-item-danger noborder"><?= $error[$i]; ?></li>
                            <? } ?>
                        </ul>
                    <? } ?>
                    <? if ($status) { ?>
                        <div class="alert alert-success">
                            Your information has been saved successfully.
                        </div>
                    <? } ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullName" id="fullName"
                                   placeholder="Name"
                                   value="<?= (isset($data['fullName'])) ? $data['fullName'] : ""; ?>" accept=""
                                   data-validation="required"
                                   data-validation-error-msg-required="You must enter a Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                   value="<?= (isset($data['email'])) ? $data['email'] : ""; ?>" accept=""
                                   data-validation="required email"
                                   data-validation-error-msg-required="You must enter a Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="aircraftOrginAirport"
                                   id="aircraftOrginAirport"
                                   placeholder="Airport Service Needed"
                                   value="<?= (isset($data['aircraftOrginAirport'])) ? $data['aircraftOrginAirport'] : ""; ?>"
                                   accept="" data-validation="required"
                                   data-validation-error-msg-required="You must enter a Airport Service Needed">
                        </div>
                        <div class="row">
                            <div class="col-md-4 pd-l">
                                <div class="form-group">
                                    <div class="flag">
                                        <input type='tel' name="countryCodes" id="countryCodes"
                                               class="flag-input form-control country-code"
                                               type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8 nopadding">
                                <div class="form-group">
                                    <input type="tel" name="phone" id="phone" placeholder="Phone"
                                           class=" form-control"
                                           value="<?= (isset($data['phone'])) ? $data['phone'] : ""; ?>" accept=""
                                           data-validation="required  number length"
                                           data-validation-length="8-15"
                                           data-validation-error-msg-length="Minimum length should be 8"
                                           data-validation-error-msg-required="You must enter phone number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="submit"
                                   class="btn btn-default register_button request-sub">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<? require_once 'html/footer_inner.php'; ?>

<script type="text/javascript">
            $.validate();

    $('#aircraftOrginAirport').autocomplete({source: 'airportsearch.php', minLength: 1});

    $.get("http://ipinfo.io", function (response) {
        countryName = response.country;
        $("#countryCodes").intlTelInput({
            preferredCountries: [countryName.toLowerCase()],
        });
    }, "jsonp");

</script>