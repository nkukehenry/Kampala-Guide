<?php

//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){

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

    //Get info of offer
    $email_user_1 = $_POST['email_user'];
    $offer_id = $_POST['offer_id'];
    $offerResult = $db->query("SELECT * FROM offers WHERE offer_id = '".$_POST["offer_id"]."'");
    $offerRow = $offerResult->fetch_assoc();
    $offer_id = $offerRow['offer_id'];
    $offer_price = $offerRow['offer_price'];
    $offer_title = $offerRow['offer_title'];

    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    
    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => $stripeConfig['secret_key'],
      "publishable_key" => $stripeConfig['publishable_key']
    );
    
    \Stripe\Stripe::setApiKey($stripeConfig['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
    
    //item information
    $itemName = $offer_title;
    $itemNumber = $offer_id;
    $itemPrice = $offer_price * 100;
    $currency = $stripeConfig['currency'];
    $orderID = "ITEMID". $offer_id;
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'description' => $itemName
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'] / 100;
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $id = $chargeJson['id'];
        
        //include database config file
        include_once 'dbconfig.php';
        
        //if order inserted successfully
        if($status == 'succeeded'){

                //insert tansaction data into the database
        $sql = "INSERT INTO orders(offer_id,user_email,order_txn,order_gross,order_cc,order_status,order_platform,order_date) VALUES('".$offer_id."','".$email_user_1."','".$id."','".$amount."','".$currency."','Completed','Stripe',CURRENT_TIME)";
        $insert = $db->query($sql);

try {


$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = $st_subjectpayment;
$address_to = $email_user_1;
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
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_referenceid." </b>".$id."</p>";
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_ordertotal." </b>".$amount." ".$currency."</p>";
$phpmailer->Body .="</div>";
$phpmailer->Body .="<p>".$st_wehopetosee."</p>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

header('Location: success.php');
  
  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}


            
        }else{
            header('Location: error.php');
        }
    }else{
        header('Location: error.php');
    }
}else{
    $statusMsg = "Form submission error";
}

//show success or error message
echo $statusMsg;