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

	$place_type_name = cleardata($_POST['place_type_name']);
	$place_type_category = cleardata($_POST['place_type_category']);
	$place_type_id = cleardata($_POST['place_type_id']);
	$place_type_image_save = $_POST['place_type_image_save'];
	$place_type_image = $_FILES['place_type_image'];

	if (empty($place_type_image['name'])) {
		$place_type_image = $place_type_image_save;
	} else{
			$imagefile = explode(".", $_FILES["place_type_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$place_type_image_upload = '../' . $siteConfig['images_folder'];
		move_uploaded_file($_FILES['place_type_image']['tmp_name'], $place_type_image_upload . 'type_' . $renamefile);
		$place_type_image = 'type_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE places_types SET place_type_name = :place_type_name, place_type_category = :place_type_category, place_type_image = :place_type_image WHERE place_type_id = :place_type_id'
	);

$statment->execute(array(

		':place_type_name' => $place_type_name,
		':place_type_category' => $place_type_category,
		':place_type_image' => $place_type_image,
		':place_type_id' => $place_type_id

		));

header('Location:' . SITE_URL . '/controller/types.php');

} else{

$id_type = id_type($_GET['id']);
    
if(empty($id_type)){
	header('Location: ./home.php');
	}

$type = get_type_per_id($connect, $id_type);
    
    if (!$type){
    header('Location: ./home.php');
}

$type = $type['0'];

}

$places_categories_lists = get_places_categories($connect);

require '../views/edit.type.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>