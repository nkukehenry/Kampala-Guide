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
	$place_category_name = cleardata($_POST['place_category_name']);

	$place_category_image = $_FILES['place_category_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["place_category_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$place_category_image_upload = '../' . $siteConfig['images_folder'];

	move_uploaded_file($place_category_image, $place_category_image_upload . 'placecat_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO places_categories (place_category_id,place_category_name,place_category_image) VALUES (null, :place_category_name, :place_category_image)'
		);

	$statment->execute(array(
		':place_category_name' => $place_category_name,
		':place_category_image' => 'placecat_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/categories.php');

}

require '../views/new.category.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>