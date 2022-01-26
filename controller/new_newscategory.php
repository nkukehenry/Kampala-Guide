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
	$news_category_name = cleardata($_POST['news_category_name']);

	$news_category_image = $_FILES['news_category_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["news_category_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$news_category_image_upload = '../' . $siteConfig['images_folder'];

	move_uploaded_file($news_category_image, $news_category_image_upload . 'postcat_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO news_categories (news_category_id,news_category_name,news_category_image) VALUES (null, :news_category_name, :news_category_image)'
		);

	$statment->execute(array(
		':news_category_name' => $news_category_name,
		':news_category_image' => 'postcat_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/newscategory.php');

}

require '../views/new.newscategory.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>