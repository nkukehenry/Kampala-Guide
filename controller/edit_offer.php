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

	$offer_id = cleardata($_POST['offer_id']);
	$offer_title = cleardata($_POST['offer_title']);
	$offer_oldprice = cleardata($_POST['offer_oldprice']);
	$offer_price = cleardata($_POST['offer_price']);
	$offer_description = $_POST['offer_description'];
	$offer_category = $_POST['offer_category'];
	$offer_featured = $_POST['offer_featured'];
	$offer_terms = $_POST['offer_terms'];
	$offer_image_save = $_POST['offer_image_save'];
	$offer_image = $_FILES['offer_image'];

	if (empty($offer_image['name'])) {
		$offer_image = $offer_image_save;
	} else{
			$imagefile = explode(".", $_FILES["offer_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$offer_image_upload = '../' . $siteConfig['images_folder'];
		move_uploaded_file($_FILES['offer_image']['tmp_name'], $offer_image_upload . 'offer_' . $renamefile);
		$offer_image = 'offer_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE offers SET offer_title = :offer_title, offer_oldprice = :offer_oldprice, offer_price = :offer_price, offer_description = :offer_description, offer_category = :offer_category, offer_featured = :offer_featured, offer_terms = :offer_terms, offer_image = :offer_image WHERE offer_id = :offer_id'
	);

$statment->execute(array(

		':offer_title' => $offer_title,
		':offer_oldprice' => $offer_oldprice,
		':offer_price' => $offer_price,
		':offer_description' => $offer_description,
		':offer_category' => $offer_category,
		':offer_featured' => $offer_featured,
		':offer_terms' => $offer_terms,
		':offer_image' => $offer_image,
		':offer_id' => $offer_id

		));

header('Location:' . SITE_URL . '/controller/offers.php');

} else{

$id_offer = id_offer($_GET['id']);
    
if(empty($id_offer)){
	header('Location: ./home.php');
	}

$offer = get_offer_per_id($connect, $id_offer);
    
    if (!$offer){
    header('Location: ./home.php');
}

$offer = $offer['0'];

}

$places_lists = get_all_places($connect);
$offers_categories_lists = get_offers_categories($connect);

require '../views/edit.offer.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ./login.php');		
		}


?>