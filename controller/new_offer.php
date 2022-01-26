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
	
	$offer_title = cleardata($_POST['offer_title']);
	$offer_description = $_POST['offer_description'];
	$offer_price = $_POST['offer_price'];
	$offer_oldprice = $_POST['offer_oldprice'];
	$offer_category = $_POST['offer_category'];
	$offer_featured = $_POST['offer_featured'];
	$offer_terms = $_POST['offer_terms'];

	$offer_image = $_FILES['offer_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["offer_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$offer_image_upload = '../' . $siteConfig['images_folder'];

	move_uploaded_file($offer_image, $offer_image_upload . 'offer_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO offers (offer_id,offer_title,offer_description,offer_price,offer_oldprice,offer_category, offer_featured,offer_terms,offer_image) VALUES (null, :offer_title, :offer_description, :offer_price, :offer_oldprice, :offer_category, :offer_featured, :offer_terms, :offer_image)'
		);

	$statment->execute(array(

		':offer_title' => $offer_title,
		':offer_description' => $offer_description,
		':offer_price' => $offer_price,
		':offer_oldprice' => $offer_oldprice,
		':offer_category' => $offer_category,
		':offer_featured' => $offer_featured,
		':offer_terms' => $offer_terms,
		':offer_image' => 'offer_' . $renamefile
		));

header('Location:' . SITE_URL . '/controller/offers.php');


}

$offers_categories_lists = get_offers_categories($connect);
$places_lists = get_all_places($connect);

require '../views/new.offer.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>