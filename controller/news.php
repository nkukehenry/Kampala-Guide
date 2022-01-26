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

$news = get_all_news($connect);
 if (empty($news)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$news_total = number_news($connect);

require '../views/news.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>