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

$offers = get_all_offers($connect);
 if (empty($offers)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$offers_total = number_offers($connect);

require '../views/offers.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>