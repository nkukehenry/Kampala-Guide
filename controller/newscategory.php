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

$news_categories = get_all_newscategories($connect);
 if (empty($news_categories)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$news_categories_total = number_newscategories($connect);

require '../views/newscategory.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>