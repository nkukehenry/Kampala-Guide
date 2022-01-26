<?php
include 'dbconfig.php';
include "../../controller/class.phpmailer.php";
include "../../controller/class.smtp.php";

    //Get settings
    $email_address = $emailConfig['address'];
    $email_password = $emailConfig['password'];
    $email_name = $emailConfig['name'];
    $smtp_host = $emailConfig['smtp_host'];
    $smtp_port = $emailConfig['smtp_port'];
    $smtp_encrypt = $emailConfig['smtp_encrypt'];

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $st_paymentauthorized = $stringRow['st_8'];
    $st_securecheckout = $stringRow['st_2'];
    $st_completed = $stringRow['st_10'];
    $st_thanksorder = $stringRow['st_9'];
    $st_yourstansactionid = $stringRow['st_11'];
    $st_subjectpayment = $stringRow['st_18'];
    $st_thankyoufororder = $stringRow['st_21'];
    $st_thisemailcontains = $stringRow['st_22'];
    $st_referenceid = $stringRow['st_24'];
    $st_ordertotal = $stringRow['st_25'];
    $st_wehopetosee = $stringRow['st_26'];
    $st_product = $stringRow['st_29'];
    $currency = $stringRow['st_1'];

//Get payment information from PayPal
$offer_id = $_GET['item_number']; 
$offer_title = $_GET['item_name']; 
$user_email = $_GET['cm'];
$order_txn = $_GET['tx'];
$order_gross = $_GET['amt'];
$order_cc = $_GET['cc'];
$order_status = $_GET['st'];

//Get product price from database
$productResult = $db->query("SELECT * FROM offers WHERE offer_id = ".$offer_id);
$productRow = $productResult->fetch_assoc();
$productPrice = $productRow['offer_price'];
$productTitle = $productRow['offer_title'];

if(!empty($order_txn) && $order_gross == $productPrice){
	//Check if payment data exists with the same TXN ID.
    $prevPaymentResult = $db->query("SELECT order_id FROM orders WHERE order_txn = '".$order_txn."'");

    if($prevPaymentResult->num_rows > 0){
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $last_insert_id = $paymentRow['order_id'];
    }else{
        //Insert tansaction data into the database
        $insert = $db->query("INSERT INTO orders(order_date,offer_id,user_email,order_txn,order_gross,order_cc,order_status,order_platform) VALUES(CURRENT_TIMESTAMP,'".$offer_id."','".$user_email."','".$order_txn."','".$order_gross."','".$order_cc."','".$order_status."','PayPal')");
        $last_insert_id = $db->insert_id;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="../dist/bulma.min.css">

<title><?php echo $st_paymentauthorized; ?></title>
<style type="text/css">
    .box{background: #fff, border-radius: 10px;}
    .table th { font-size: 14px; padding: 10px 0; }
    .table td { font-size: 14px; padding: 10px 0;}
</style>
</head>
<body>

<section class="hero is-fullheight">

  <div class="hero-body">
    <div class="container" style="text-align: center;">

<i class="icon ion-md-checkmark-circle-outline" style="font-size: 6rem;color: #23d160"></i>
<h1 style="margin-top: 10px;    font-size: 2rem;"><?php echo $st_thanksorder; ?></h1>
<p style="margin-bottom: 20px"><?php echo $st_completed; ?></p>

  </div>
  </div>

</section>

  </body>

</html>


<?php

try {


$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = $st_subjectpayment;
$address_to = $user_email;
$from_name = $email_name;
$phpmailer = new PHPMailer();

$phpmailer->Username = $email_user;
$phpmailer->Password = $email_pass; 

$phpmailer->SMTPSecure = $encrypt;
$phpmailer->Host = $host;
$phpmailer->Port = $port;
$phpmailer->IsSMTP();
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to);

$phpmailer->Subject = $the_subject;		
$phpmailer->Body .="<h2 style='color: #333333; border-bottom: 1px solid #dddddd; padding-bottom: 8px;'>".$st_thankyoufororder."</h2>"; 
$phpmailer->Body .= "<p style='color:#333333;'>".$st_thisemailcontains."</p>";
$phpmailer->Body .="<div style='border: 1px solid #dddddd; background: #fbfbfb; padding: 5px 20px; border-radius: 5px; display: inline-block;'>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_product." </b>".$offer_title."</p>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_referenceid." </b>".$order_txn."</p>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_ordertotal." </b>".$order_gross." ".$currency."</p>";
$phpmailer->Body .="</div>";
$phpmailer->Body .="<p>".$st_wehopetosee."</p>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

}else{ ?>

	<h1>Something Wrong !</h1>

<?php } ?>