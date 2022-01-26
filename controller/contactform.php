<?php 

	include '../admin/config.php';
	include 'data_config.php';
	include "class.phpmailer.php";
	include "class.smtp.php";

    //Get settings
    $email_address = $emailConfig['address'];
    $email_password = $emailConfig['password'];
    $email_name = $emailConfig['name'];
    $smtp_host = $emailConfig['smtp_host'];
    $smtp_port = $emailConfig['smtp_port'];
    $smtp_encrypt = $emailConfig['smtp_encrypt'];

$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);

$name = $obj['name'];
 
$email = $obj['email'];
 
$message = $obj['message'];

?>

<?php

if( !empty($name)  && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message) ){

try {


$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = 'New Message';
$address_to = $email_address;
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
$phpmailer->Body .="<p><b>Name: </b>".$name."</p>";
$phpmailer->Body .="<p><b>Email: </b>".$email."</p>";
$phpmailer->Body .="<p><b>Message: </b>".$message."</p>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

$SuccefullyMSG = 'true';
 
$SuccefullyMSGJson = json_encode($SuccefullyMSG);
 
echo $SuccefullyMSGJson; 

}else{

$EmptyMSG = 'false';
 
$EmptyMSGJson = json_encode($EmptyMSG);
 
echo $EmptyMSGJson; 

}

?>