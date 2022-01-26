<?php

if(isset($_GET["string"])){
    if(!empty($_GET["string"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT offers.*,offers_categories.offer_category_name AS category_name FROM offers,offers_categories WHERE offers.offer_category = offers_categories.offer_category_id AND offers.offer_title LIKE '%".$_GET["string"]."%' ORDER BY offer_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$offers = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$offer_id = $row['offer_id'];
    $offer_title = $row['offer_title'];
    $offer_oldprice = $row['offer_oldprice'];
    $offer_price = $row['offer_price'];
    $offer_description = $row['offer_description'];
    $offer_category = $row['offer_category'];
    $offer_terms = $row['offer_terms'];
    $offer_featured = $row['offer_featured'];
    $offer_image = $row['offer_image'];
    $category_name = $row['category_name'];

    $save = $offer_oldprice - $offer_price;

    $offers[] = array(
        'id'=> $id++,
        'offer_id'=> $offer_id,
        'offer_title'=> html_entity_decode($offer_title),
        'offer_oldprice'=> $offer_oldprice,
        'offer_price'=> $offer_price,
        'offer_description'=> $offer_description,
        'offer_category'=> $offer_category,
        'offer_terms'=> $offer_terms,
        'offer_featured'=> $offer_featured,
        'offer_image'=> $offer_image,
        'category_name'=> html_entity_decode($category_name),
        'save'=> $save,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($offers);
print ($json_string)

?>

<?php

}}

?>

<?php

    if(empty($_GET["string"])){

?>

<?php


$EmptyMSG = 'false';
 
$EmptyMSGJson = json_encode($EmptyMSG);
 
echo $EmptyMSGJson; 

?>


<?php

}

?>
