<?php

if ( !empty($_GET["id_offer"]) && !empty($_GET["email_user"]) ) {

    include 'dbconfig.php';

    //Get info of offer
    $id_offer = intval($_GET['id_offer']);
    $offerResult = $db->query("SELECT * FROM offers WHERE offer_id = '".$_GET["id_offer"]."'");
    $offerRow = $offerResult->fetch_assoc();
    $offer_id = $offerRow['offer_id'];
    $offer_oldprice = $offerRow['offer_oldprice'];
    $offer_price = $offerRow['offer_price'];
    $offer_title = $offerRow['offer_title'];
    $offer_image = $offerRow['offer_image'];


    $idPaypal = $paypalConfig['email'];
    $currencyPaypal = $paypalConfig['currency'];
    $urlPaypal = $paypalConfig['url'];
    $cancelPaypal = SITE_URL . '/payment/paypal/cancel.php';
    $successPaypal = SITE_URL . '/payment/paypal/success.php';

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $currency = $stringRow['st_1'];
    $st_securecheckout = $stringRow['st_2'];
    $st_orderdetails = $stringRow['st_3'];
    $st_regularprice = $stringRow['st_4'];
    $st_yousave = $stringRow['st_5'];
    $st_total = $stringRow['st_6'];
    $st_id = $stringRow['st_7'];
    $st_paynow = $stringRow['st_23'];



$disount = $offer_oldprice - $offer_price;


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="../dist/ladda.min.css">
<link rel="stylesheet" href="../dist/bulma.min.css">

<title><?php echo $offer_title; ?></title>

<style type="text/css">
    .box{background: #fff, border-radius: 10px;}
    .hero-body{padding: 1rem 1.5rem;}
    .table th { font-size: 14px; padding: 10px 0; }
    .table td { font-size: 14px; padding: 10px 0;}
    .order{display: block; margin-left: auto; margin-right: auto; text-align: center; margin-bottom: 13px; font-size: 20px; font-weight: bold;}
        .ladda-button{background: #00d44f !important; border-radius: 50px; padding: 14px 35px;}
    .button-pay{text-align: center; padding-top: 20px;}
</style>

</head>
<body>

<section class="hero is-fullheight">

  <div class="hero-body">
    <div class="container">

      <div class="box">


  <figure class="media-left">
    <p class="image is-720x240">
      <img src="../../images/<?php echo $offer_image; ?>" style="border-radius: 10px">
    </p>
  </figure>
<p style="margin-bottom: 15px;margin-top: 15px">
        <strong style="font-size: 14px;"><?php echo $offer_title; ?></strong>
        <br>
        <div class="tags has-addons">
        <span class="tag"><?php echo $st_yousave; ?></span>
        <span class="tag is-success"><?php echo $disount; ?> <?php echo $currency; ?></span>
        </div>
      </p>

<table class="table is-fullwidth">
  <tbody>
    <tr>
      <th><?php echo $st_regularprice; ?></th>
      <td><?php echo $offer_oldprice; ?> <?php echo $currency; ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $st_total; ?></th>
      <td><?php echo $offer_price; ?> <?php echo $currency; ?>
      </td>
    </tr>
      </tbody>
</table>
      </div>

    <form action="<?php echo $urlPaypal; ?>" method="post" id="PayForm">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $idPaypal; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="custom" value="<?php echo $_GET['email_user']; ?>">
        <input type="hidden" name="item_name" value="<?php echo $offer_title; ?>">
        <input type="hidden" name="item_number" value="<?php echo $offer_id; ?>">
        <input type="hidden" name="amount" value="<?php echo $offer_price; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currencyPaypal; ?>">
        <input type='hidden' name='no_shipping' value='1'>
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $cancelPaypal; ?>'>
        <input type='hidden' name='return' value='<?php echo $successPaypal; ?>'>
        
    </form>


      <section class="button-pay">
                <button class="ladda-button" data-color="blue" data-style="slide-up" type="Submit" form="PayForm"><?php echo $st_paynow; ?></button>
    <p style="font-size: 13px; color: #9E9E9E; margin-top: 10px;"><?php echo $st_securecheckout; ?> PayPal <i class="icon ion-md-lock"></i></p>
            
            </section>
            
    </div>
  </div>

</section>

        <script src="../dist/spin.min.js"></script>
        <script src="../dist/ladda.min.js"></script>

        <script>
            Ladda.bind( '.button-pay button', { timeout: 20000 } );
            Ladda.bind( '.progress-demo button', {
                callback: function( instance ) {
                    var progress = 0;
                    var interval = setInterval( function() {
                        progress = Math.min( progress + Math.random() * 0.1, 1 );
                        instance.setProgress( progress );

                        if( progress === 1 ) {
                            instance.stop();
                            clearInterval( interval );
                        }
                    }, 200 );
                }
            } );

        </script>

  </body>

</html>

<?php

}

?>