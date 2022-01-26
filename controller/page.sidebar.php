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
require '../views/header.view.php';
require '../views/navbar.view.php';    
require '../views/page.sidebar.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');	
		}


?>