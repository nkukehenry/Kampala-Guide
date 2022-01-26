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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = cleardata($_POST['name']);
	$username = cleardata($_POST['username']);
	$password = cleardata($_POST['password']);

	$statment = $connect->prepare(
		'INSERT INTO managers (id,name,username,password) VALUES (null, :name, :username, :password)'
		);

	$statment->execute(array(
		':name' => $name,
		':username' => $username,
		':password' => $password
		));

	header('Location:' . SITE_URL . '/controller/managers.php');

}

require '../views/new.manager.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>