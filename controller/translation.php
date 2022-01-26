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
	$st_1 = $_POST['st_1'];
	$st_2 = $_POST['st_2'];
	$st_3 = $_POST['st_3'];
	$st_4 = $_POST['st_4'];
	$st_5 = $_POST['st_5'];
	$st_6 = $_POST['st_6'];
	$st_7 = $_POST['st_7'];
	$st_8 = $_POST['st_8'];
	$st_9 = $_POST['st_9'];
	$st_10 = $_POST['st_10'];
	$st_11 = $_POST['st_11'];
	$st_12 = $_POST['st_12'];
	$st_13 = $_POST['st_13'];
	$st_14 = $_POST['st_14'];
	$st_15 = $_POST['st_15'];
	$st_16 = $_POST['st_16'];
	$st_17 = $_POST['st_17'];
	$st_18 = $_POST['st_18'];
	$st_19 = $_POST['st_19'];
	$st_20 = $_POST['st_20'];
	$st_21 = $_POST['st_21'];
	$st_22 = $_POST['st_22'];
	$st_23 = $_POST['st_23'];
	$st_24 = $_POST['st_24'];
	$st_25 = $_POST['st_25'];
	$st_26 = $_POST['st_26'];
	$st_27 = $_POST['st_27'];
	$st_28 = $_POST['st_28'];
	$st_29 = $_POST['st_29'];
	$st_30 = $_POST['st_30'];
	$st_31 = $_POST['st_31'];
	$st_32 = $_POST['st_32'];
	$st_33 = $_POST['st_33'];
	$st_34 = $_POST['st_34'];
	$st_35 = $_POST['st_35'];
	$st_36 = $_POST['st_36'];
	$st_37 = $_POST['st_37'];
	$st_38 = $_POST['st_38'];
	$st_39 = $_POST['st_39'];
	$st_40 = $_POST['st_40'];
	$st_41 = $_POST['st_41'];

$statment = $connect->prepare(
	'UPDATE strings SET
	st_1 = :st_1,
	st_2 = :st_2,
	st_3 = :st_3,
	st_4 = :st_4,
	st_5 = :st_5,
	st_6 = :st_6,
	st_7 = :st_7,
	st_8 = :st_8,
	st_9 = :st_9,
	st_10 = :st_10,
	st_11 = :st_11,
	st_12 = :st_12,
	st_13 = :st_13,
	st_14 = :st_14,
	st_15 = :st_15,
	st_16 = :st_16,
	st_17 = :st_17,
	st_18 = :st_18,
	st_19 = :st_19,
	st_20 = :st_20,
	st_21 = :st_21,
	st_22 = :st_22,
	st_23 = :st_23,
	st_24 = :st_24,
	st_25 = :st_25,
	st_26 = :st_26,
	st_27 = :st_27,
	st_28 = :st_28,
	st_29 = :st_29,
	st_30 = :st_30,
	st_31 = :st_31,
	st_32 = :st_32,
	st_33 = :st_33,
	st_34 = :st_34,
	st_35 = :st_35,
	st_36 = :st_36,
	st_37 = :st_37,
	st_38 = :st_38,
	st_39 = :st_39,
	st_40 = :st_40,
	st_41 = :st_41
	');

	$statment->execute(array(
		':st_1' => $st_1,
		':st_2' => $st_2,
		':st_3' => $st_3,
		':st_4' => $st_4,
		':st_5' => $st_5,
		':st_6' => $st_6,
		':st_7' => $st_7,
		':st_8' => $st_8,
		':st_9' => $st_9,
		':st_10' => $st_10,
		':st_11' => $st_11,
		':st_12' => $st_12,
		':st_13' => $st_13,
		':st_14' => $st_14,
		':st_15' => $st_15,
		':st_16' => $st_16,
		':st_17' => $st_17,
		':st_18' => $st_18,
		':st_19' => $st_19,
		':st_20' => $st_20,
		':st_21' => $st_21,
		':st_22' => $st_22,
		':st_23' => $st_23,
		':st_24' => $st_24,
		':st_25' => $st_25,
		':st_26' => $st_26,
		':st_27' => $st_27,
		':st_28' => $st_28,
		':st_29' => $st_29,
		':st_30' => $st_30,
		':st_31' => $st_31,
		':st_32' => $st_32,
		':st_33' => $st_33,
		':st_34' => $st_34,
		':st_35' => $st_35,
		':st_36' => $st_36,
		':st_37' => $st_37,
		':st_38' => $st_38,
		':st_39' => $st_39,
		':st_40' => $st_40,
		':st_41' => $st_41
		));

	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$strings = get_all_strings($connect);

$strings = $strings['0'];

}

require '../views/translation.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>