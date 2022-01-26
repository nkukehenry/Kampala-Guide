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

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 

$id_newscategory = cleardata($_GET['id']);

if(!$id_newscategory){
	header('Location: ./home.php');
}

$statement = $connect->prepare('DELETE FROM news_categories WHERE news_category_id = :news_category_id');
$statement->execute(array('news_category_id' => $id_newscategory));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
		header('Location: ./login.php');		
		}


?>