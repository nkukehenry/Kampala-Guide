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
	
$places_categories_total = number_places_categories($connect);
$places_types_total = number_places_types($connect);
$news_categories_total = number_newscategories($connect);
$offers_categories_total = number_offers_categories($connect);
$offers_total = number_offers($connect);
$news_total = number_news($connect);
$places_total = number_places($connect);
$orders_total = number_orders($connect);

/*$places = get_places($siteConfig['items_per_page'], $connect);
 if (empty($places)){
     $errors .='<div class="alert alert-warning">No data found</div>';
}
*/

$places = get_places($connect);
$offers = get_offers($connect);
$news = get_news($connect);
$orders = get_orders($connect);
$currency = $siteConfig['currency'];

$sales_perday = get_total_sales_day($connect);
$sales_permonth = get_total_sales_month($connect);
$sales_peryear = get_total_sales_year($connect);

$earnings_perday = get_total_earnings_day($connect);
$earnings_permonth = get_total_earnings_month($connect);
$earnings_peryear = get_total_earnings_year($connect);

require '../views/home.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>