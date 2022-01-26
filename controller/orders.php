<?php

/*--------------------*/
// App Name: Valencia City Guide
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
require '../views/header.view.php';
require '../views/navbar.view.php';    

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	}

$orders = get_all_orders($connect);
 if (empty($orders)){
     $errors .='<div class="alert alert-warning">No orders found</div>';
}

$currency = get_settings($connect);

$sales_perday = get_total_sales_day($connect);
$sales_permonth = get_total_sales_month($connect);
$sales_peryear = get_total_sales_year($connect);
$currency = $siteConfig['currency'];


$earnings_perday = get_total_earnings_day($connect);
$earnings_permonth = get_total_earnings_month($connect);
$earnings_peryear = get_total_earnings_year($connect);

require '../views/orders.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>