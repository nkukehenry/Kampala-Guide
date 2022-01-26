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

$id_place = cleardata($_GET['id']);

if(!$id_place){
	header('Location: ./home.php');
}

$statement = $connect->prepare('DELETE FROM places WHERE place_id = :place_id');
$statement->execute(array('place_id' => $id_place));

$statement = $connect->prepare('DELETE FROM gallery WHERE place_id = :place_id;');
$statement->execute(array('place_id' => $id_place));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else {
		header('Location: ./login.php');		
		}


?>