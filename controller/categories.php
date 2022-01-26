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

$places_categories = get_all_places_categories($connect);

$places_categories_total = number_places_categories($connect);

require '../views/categories.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>