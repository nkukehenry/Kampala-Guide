<?php
	
	include 'dbconfig.php';

    //Get strings
    $stringResult = $db->query("SELECT * FROM strings");
    $stringRow = $stringResult->fetch_assoc();
    $st_paymentcanceled = $stringRow['st_15'];
    $st_hasbeencanceled = $stringRow['st_16'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,700" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="../dist/bulma.min.css">

<title><?php echo $st_paymentcanceled; ?></title>

</head>
<body>

<section class="hero is-fullheight">

  <div class="hero-body">
    <div class="container" style="text-align: center;">

<i class="icon ion-md-close-circle-outline" style="font-size: 6rem;color: #f90d0d"></i>
<h1 style="margin-top: 10px;    font-size: 2rem;"><?php echo $st_paymentcanceled; ?></h1>
<p style="margin-bottom: 20px"><?php echo $st_hasbeencanceled; ?></p>
    </div>
  </div>

</section>

  </body>

</html>