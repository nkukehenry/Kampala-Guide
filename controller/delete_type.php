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

$id_type = cleardata($_GET['id']);

if(!$id_type){
	header('Location: ./home.php');
}

$statement = $connect->prepare('DELETE FROM places_types WHERE place_type_id = :place_type_id');
$statement->execute(array('place_type_id' => $id_type));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
		header('Location: ./login.php');		
		}


?>