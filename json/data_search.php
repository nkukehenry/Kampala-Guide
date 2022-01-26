<?php

if(isset($_GET["query"])){

 //error_reporting(0);


header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");


$sql = "SELECT place_id AS id, place_image AS image, place_name AS title, 'place' AS type,place_description AS description FROM places WHERE place_name LIKE '%" . $_GET["query"]."%'";
$sql2 = "SELECT offer_id AS id, offer_image AS image, offer_title AS title, 'offer' AS type, offer_description AS description FROM offers WHERE offer_title LIKE '%" . $_GET["query"] . "%'";


mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die('Unable to run Query');

$data = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$id    = $row['id'];
    $title = $row['title'];
    $image = $row['image'];
    $type  = $row['type'];
    $desc  = $row['description'];

    $data[] = array(
        'id'=> $id,
        'title'=> html_entity_decode($title),
        'image'=> $image,
        'type'=> $type,
        'description'=>$desc
    	);

}


if($result2 = mysqli_query($connection, $sql2)){

    while($row2 = mysqli_fetch_array($result2)) 
    {   
        $id    = $row2['id'];
        $title = $row2['title'];
        $image = $row2['image'];
        $type  = $row2['type'];
        $desc  = $row2['description'];

        $data[] = array(
        'id'=> $id,
        'title'=> html_entity_decode($title),
        'image'=> $image,
        'type'=> $type,
        'description'=>$desc
        );
    }

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = (count($data)>0)?$data:[];

echo json_encode($json_string);


} else {


$EmptyMSG = [];
 
$EmptyMSGJson = json_encode($EmptyMSG);
 
echo $EmptyMSGJson; 

}

?>
