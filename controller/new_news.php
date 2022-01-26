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
	$news_title = cleardata($_POST['news_title']);
	$news_description = $_POST['news_description'];
	$news_category = $_POST['news_category'];
	$news_status = $_POST['news_status'];
	$news_image = $_FILES['news_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["news_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$news_image_upload = '../' . $siteConfig['images_folder'];

	move_uploaded_file($news_image, $news_image_upload . 'post_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO news (news_id,news_title,news_description,news_category,news_status,news_image) VALUES (null, :news_title, :news_description, :news_category, :news_status, :news_image)'
		);

	$statment->execute(array(
		':news_title' => $news_title,
		':news_description' => $news_description,
		':news_category' => $news_category,
		':news_status' => $news_status,
		':news_image' => 'post_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/news.php');

}

$news_categories_lists = get_news_categories($connect);

require '../views/new.news.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>