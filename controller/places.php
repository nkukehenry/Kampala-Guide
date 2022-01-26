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

$places = get_all_places($connect);

$places_total = number_places($connect);

require '../views/places.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>