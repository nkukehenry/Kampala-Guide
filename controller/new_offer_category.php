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
	$offer_category_name = cleardata($_POST['offer_category_name']);

	$offer_category_image = $_FILES['offer_category_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["offer_category_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$offer_category_image_upload = '../' . $siteConfig['images_folder'];

	move_uploaded_file($offer_category_image, $offer_category_image_upload . 'offercat_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO offers_categories (offer_category_id,offer_category_name,offer_category_image) VALUES (null, :offer_category_name, :offer_category_image)'
		);

	$statment->execute(array(
		':offer_category_name' => $offer_category_name,
		':offer_category_image' => 'offercat_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/offers_categories.php');

}

require '../views/new.offer_category.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>