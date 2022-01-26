<?php

 include('dbconfig.php');

$currency = $siteConfig['currency'];
$year = $_REQUEST['year'];

error_reporting(0);

 if($year=="allTime"){
  
  $stmt=$DB_con->prepare('SELECT DISTINCT YEAR(order_date) AS td1, ROUND(SUM(order_gross),2) AS td2, COUNT(order_id) AS td3, (SELECT ROUND(SUM(order_gross),2) FROM orders) AS total, (SELECT COUNT(order_id) FROM orders) AS sales FROM orders GROUP BY YEAR(order_date)');
  $stmt->execute();
  
 }else{
  
  $stmt=$DB_con->prepare("SELECT MONTHNAME(order_date) AS td1, ROUND(SUM(order_gross),2) AS td2, COUNT(order_id) AS td3, (SELECT ROUND(SUM(order_gross),2) FROM orders WHERE YEAR(order_date)=:year) AS total, (SELECT COUNT(order_id) FROM orders WHERE YEAR(order_date)=:year) AS sales FROM orders WHERE YEAR(order_date)=:year GROUP BY MONTH(order_date)");
  $stmt->execute(array(':year'=>$year));
 }
 
 ?>
 <?php
 if($stmt->rowCount() > 0){
  
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   extract($row);
 
   ?>
      <tr>
                                      <td class="name"><?php echo $td1; ?></td>
                                      <td class="name"><?php echo $td3; ?></td>
                                      <td class="name"><?php echo $currency; ?><?php echo $td2; ?></td>
      </tr>

   <?php  
  }
  
 }else{
  
  ?>

      <tr>
                                      <td class="name"><?php echo $td1; ?></td>
                                      <td class="name"><?php echo $td3; ?></td>
                                      <td class="name"><?php echo $currency; ?><?php echo $td2; ?></td>

      </tr>

        <?php  
 }
 
 ?>
      <tr>
                                      <th class="name">Total</th>
                                      <th class="name"><?php echo $sales; ?></th>
                                      <th class="name"><?php echo $currency; ?><?php echo $total; ?></th>
      </tr>
