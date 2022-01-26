<?php
		 
	require_once 'dbconfig.php';
  $currency = $siteConfig['currency'];

	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$query = "SELECT offers.*,offers_categories.offer_category_name AS category_name FROM offers,offers_categories WHERE offers.offer_category = offers_categories.offer_category_id AND offers.offer_id=:id";
		$stmt = $DB_con->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>

<div class="card-box">
  <div style="background: url(../images/<?php echo $offer_image; ?>); height: 120px;border-top-left-radius: 6px; border-top-right-radius: 6px; background-position: center; background-size: cover;"></div>
  <div class="card-box-body">
    <h4 class="card-box-title"><span>ID <?php echo $offer_id; ?></span><br/> <?php echo $offer_title; ?></h4>
    <div class="panel panel-default">
  <table class="table table-sm table-bordered">
    <tbody>
      <tr style="text-align: left;font-size: 14px;">
        <td><b>Category</b></td>
        <td><?php echo $category_name; ?></td>
      </tr>

            <tr style="text-align: left;font-size: 14px;">
        <td><b>Discount Price</b></td>
        <td><?php echo $currency; ?><?php echo $offer_price; ?></td>
      </tr>

            <tr style="text-align: left;font-size: 14px;">
        <td><b>Original Price</b></td>
        <td><?php echo $currency; ?><?php echo $offer_oldprice; ?></td>
      </tr>

    </tbody>
  </table>
</div>
    
  </div>
</div>

			
		<?php				
	}