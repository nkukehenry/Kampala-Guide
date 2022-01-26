<?php

if ( !empty($_GET["id_offer"]) && !empty($_GET["email_user"]) ) {

    include 'dbconfig.php';

    $email_user = $_GET['email_user'];
    $id_offer = intval($_GET['id_offer']);

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $st_securecheckout = $stringRow['st_2'];
    $st_paynow = $stringRow['st_23'];
    $st_37 = $stringRow['st_37'];
    $st_38 = $stringRow['st_38'];
    $st_39 = $stringRow['st_39'];
    $st_40 = $stringRow['st_40'];
    $st_41 = $stringRow['st_41'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="../dist/bulma.min.css">
<link rel="stylesheet" href="style.css">

<title>Stripe</title>

<style type="text/css">
    .box{background: #fff, border-radius: 10px;}
    .hero-body{padding: 1rem 1.5rem;}
    .table th { font-size: 14px; padding: 10px 0; }
    .table td { font-size: 14px; padding: 10px 0;}
    .ladda-button{background: #00d44f !important; border-radius: 50px; padding: 14px 35px;}
    .pay{text-align: center;}
    .order{display: block; margin-left: auto; margin-right: auto; text-align: center; margin-bottom: 13px; font-size: 20px; font-weight: bold;}
    .input{margin-bottom: 10px;}
    .logo{display: block; margin-left: auto; margin-right: auto; margin-bottom: 20px; max-width: 95px;}
</style>

</head>
<body>

<section class="hero is-fullheight">

  <div class="hero-body">
    <div class="container">

<img src="../../assets/files/stripe.png" class="logo">

<form id="paymentFrm" action="submit.php" method="POST">
                
                <input type="text" hidden="true" name="offer_id" value="<?php echo $id_offer ?>">
                <input type="text" hidden="true" name="email_user" value="<?php echo $email_user ?>">

                <div class="field-row">
                    <label><?php echo $st_37 ?></label> <span
                        id="card-holder-name-info" class="info"></span><br>
                    <input type="text" autocomplete="off" name="name"
                        class="demoInputBox">
                </div>
                <div class="field-row">
                    <label><?php echo $st_38 ?></label> <span id="email-info"
                        class="info"></span><br> <input type="email" autocomplete="off" name="email" class="demoInputBox">
                </div>
                <div class="field-row">
                    <label><?php echo $st_39 ?></label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="number" autocomplete="off" name="card_num"
                        class="card-number demoInputBox">
                </div>

                <div class="field-row">
                    <div class="contact-row column-right">
                        <label><?php echo $st_40 ?></label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="exp_month"
                            class="card-expiry-month demoSelectBox" required="">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="exp_year"
                            class="card-expiry-year demoSelectBox" required="">

                            <?php

                            $base_year = date('Y');
                            $end_year = $base_year + 11;

                            for( $i = $base_year; $i <= $end_year; $i++)
                            {   
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }

                            ?>

                        </select>
                    </div>
                    <div class="contact-row cvv-box">
                        <label><?php echo $st_41 ?></label> <span id="cvv-info"
                            class="info"></span><br> <input type="number"
                            name="cvc"
                            class="card-cvc demoInputBox cvv-input" autocomplete="off">
                    </div>
                </div>
                <div>

                    <button type="submit" id="payBtn" class="btnAction"><?php echo $st_paynow; ?></button>

            </form>

            <!-- display errors returned by createToken -->
<span class="payment-errors"></span>

            <p style="font-size: 13px; color: #9E9E9E; margin-top: 10px;display: block;text-align: center;"><?php echo $st_securecheckout; ?> Stripe <i class="icon ion-md-lock"></i></p>

    </div>
  </div>

</section>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../dist/parsley.js" type="text/javascript"></script>

    <script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey(<?php echo "'".$stripeConfig['publishable_key']."'" ?>);

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>

<script type="text/javascript">
$(function () {
  $('#paymentFrm').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>
  </body>

</html>


<?php

}

?>