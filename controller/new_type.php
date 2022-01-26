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
	$place_type_name = cleardata($_POST['place_type_name']);
	$place_type_category = cleardata($_POST['place_type_category']);

	$place_type_image = $_FILES['place_type_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["place_type_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$place_type_image_upload = '../' . $siteConfig['images_folder'];

	move_uploaded_file($place_type_image, $place_type_image_upload . 'type_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO places_types (place_type_id,place_type_name,place_type_category,place_type_image) VALUES (null, :place_type_name, :place_type_category, :place_type_image)'
		);

	$statment->execute(array(
		':place_type_name' => $place_type_name,
		':place_type_category' => $place_type_category,
		':place_type_image' => 'type_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/types.php');

}

$places_categories_lists = get_places_categories($connect);

require '../views/new.type.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>