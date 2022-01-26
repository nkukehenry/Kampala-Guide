<?php

if(isset($_GET["email"])){
    if(!empty($_GET["email"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT orders.*,offers.offer_image,offers.offer_title FROM orders,offers WHERE orders.offer_id = offers.offer_id AND orders.user_email='".$_GET["email"]."' ORDER BY order_date DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$orders = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$order_id = $row['order_id'];
    $offer_id = $row['offer_id'];
    $user_email = $row['user_email'];
    $order_txn = $row['order_txn'];
    $order_gross = $row['order_gross'];
    $order_cc = $row['order_cc'];
    $order_status = $row['order_status'];
    $order_platform = $row['order_platform'];
    $order_date = $row['order_date'];
    $offer_image = $row['offer_image'];
    $offer_title = $row['offer_title'];

$time = strtotime($order_date);
$newDateFormat = date("d/m/y", $time);

    $orders[] = array(
    	'id'=> $id++,
    	'order_id'=> $order_id,
        'offer_id'=> $offer_id,
        'user_email'=> $user_email,
        'order_txn'=> $order_txn,
        'order_gross'=> $order_gross,
        'order_cc'=> $order_cc,
        'order_status'=> $order_status,
        'order_platform'=> $order_platform,
        'order_date'=> $newDateFormat,
        'offer_image'=> $offer_image,
        'offer_title'=> html_entity_decode($offer_title),
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($orders);
print ($json_string)

?>

<?php

}}

?>

<?php

if(isset($_GET["id"])){
    if(!empty($_GET["id"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT orders.*,offers.offer_image,offers.offer_title FROM orders,offers WHERE orders.offer_id = offers.offer_id AND orders.order_id='".$_GET["id"]."' LIMIT 1";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$orders = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $order_id = $row['order_id'];
    $offer_id = $row['offer_id'];
    $user_email = $row['user_email'];
    $order_txn = $row['order_txn'];
    $order_gross = $row['order_gross'];
    $order_cc = $row['order_cc'];
    $order_status = $row['order_status'];
    $order_platform = $row['order_platform'];
    $order_date = $row['order_date'];
    $offer_image = $row['offer_image'];
    $offer_title = $row['offer_title'];

$time = strtotime($order_date);
$newDateFormat = date("d/m/y", $time);

    $orders[] = array(
        'id'=> $id++,
        'order_id'=> $order_id,
        'offer_id'=> $offer_id,
        'user_email'=> $user_email,
        'order_txn'=> $order_txn,
        'order_gross'=> $order_gross,
        'order_cc'=> $order_cc,
        'order_status'=> $order_status,
        'order_platform'=> $order_platform,
        'order_date'=> $newDateFormat,
        'offer_image'=> $offer_image,
        'offer_title'=> html_entity_decode($offer_title),
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($orders);
print ($json_string)

?>

<?php

}}

?>
