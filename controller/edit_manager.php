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
	header ('Location: ./error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = cleardata($_POST['name']);
	$id = cleardata($_POST['id']);
	$username = $_POST['username'];
	$password = $_POST['password'];

$statment = $connect->prepare(
	'UPDATE managers SET name = :name, username = :username, password = :password WHERE id = :id'
	);

$statment->execute(array(

		':name' => $name,
		':username' => $username,
		':password' => $password,
		':id' => $id

		));

header('Location:' . SITE_URL . '/controller/managers.php');

} else{

$id_manager = id_manager($_GET['id']);
    
if(empty($id_manager)){
	header('Location: ./home.php');
	}

$manager = get_manager_per_id($connect, $id_manager);
    
    if (!$manager){
    header('Location: ./home.php');
}

$manager = $manager['0'];

}

require '../views/edit.manager.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>