<?php require'sidebar.view.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <?php require'navbar.view.php'; ?>

        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Sections</h4>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $places_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Places</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $places_categories_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Place Categories</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $places_types_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Place Types</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $news_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">News</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $news_categories_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">News Categories</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $offers_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Offers</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $offers_categories_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Offers Categories</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $orders_total; ?></div>
                            <i class="fa fa-angle-right i-icon"></i>
                            <p class="label">Orders</p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="section-title">
                            <h4>Summary</h4>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Places</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/places.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach($places as $place): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $place['place_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $place['place_name']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_place.php?id=<?php echo $place['place_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $place['place_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $place['place_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_place.php?id=<?php echo $place['place_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>  

                <div class="col-12 col-md-6 col-lg-6">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">News</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/news.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>
                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                        <?php foreach($news as $new): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $new['news_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $new['news_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_news.php?id=<?php echo $new['news_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $new['news_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $new['news_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_news.php?id=<?php echo $new['news_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>  


                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Offers</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/offers.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>

                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                        <tbody class="text-middle">
                                            <?php foreach($offers as $offer): ?>
                                        <tr>
                                            <td class="product">
                                                <img class="product-img" src="../images/<?php echo $offer['offer_image']; ?>">
                                            </td>
                                            <td class="name"><span class="span-title"><?php echo $offer['offer_title']; ?></span></td>
                                            <td class="price price-td-home"><a href="../controller/edit_offer.php?id=<?php echo $offer['offer_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $offer['offer_id']; ?>();"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $offer['offer_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_offer.php?id=<?php echo $offer['offer_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div>   

<div class="col-12">
                        <div class="section-title">
                            <h4>Earnings</h4>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="block counter-block mb-4">
                            <p class="label" style="margin: 0 0 7px 0">Today</p>
                            
                            <div class="value">
                            <small style="vertical-align: super; font-size: 60%; color: var(--dark-color); font-weight: 700"><?php echo $currency; ?></small>
                            <?php echo number_format($earnings_perday, 2) ?>                                
                                
                            </div>
                            <i class="dripicons-graph-bar i-icon"></i>
                            <p class="label"><?php echo $sales_perday; ?> Sales</p>
                        </div>
                    </div>

                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="block counter-block mb-4">
                            <p class="label" style="margin: 0 0 7px 0">This Month</p>

                            <div class="value">
                            <small style="vertical-align: super; font-size: 60%; color: var(--dark-color); font-weight: 700"><?php echo $currency; ?></small>
                            <?php echo number_format($earnings_permonth, 2) ?>
                            </div>
                            <i class="dripicons-graph-bar i-icon"></i>
                            <p class="label"><?php echo $sales_permonth; ?> Sales</p>
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-md-4 scol-lg-4">
                        <div class="block counter-block mb-4">
                            <p class="label" style="margin: 0 0 7px 0">This Year</p>

                            <div class="value">
                            <small style="vertical-align: super; font-size: 60%; color: var(--dark-color); font-weight: 700"><?php echo $currency; ?></small>
                            <?php echo number_format($earnings_peryear, 2) ?>
                            </div>
                            <i class="dripicons-graph-bar i-icon"></i>
                            <p class="label"><?php echo $sales_peryear; ?> Sales</p>
                        </div>
                    </div>



<div class="col-12 col-md-12 col-lg-12">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Order History</h5>
                                <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/orders.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>

                                    </li>
                                </ul>
                            </div>
                            </div>

                    <div>
                                <div class="table-responsive text-no-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Item Ordered</th>
                                        <th>Customer</th>
                                        <th>Price</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>

                                    <tbody class="text-middle">
                                            <?php foreach($orders as $order): ?>

                                        <tr>
                                            <td class="name"><?php echo $order['order_txn']; ?></td>
                                            <td class="name"><a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $order['offer_id']; ?>" id="getOffer" class="view-details" >View Details</a></td>
                                            <td class="name" style="text-transform: none;"><span class="span-title"><?php echo $order['user_email']; ?></span></td>
                                            <td class="name" style="text-transform: UPPERCASE;"><?php echo $currency; ?><?php echo number_format($order['order_gross'], 2); ?></td>
                                            <td class="name">
                                                <?php 

                                                if ($order['order_platform'] == 'PayPal') {
                                    echo "<img style='max-width: 45px;' src='../assets/files/paypal.png'>";
                                                }elseif ($order['order_platform'] == 'Stripe') {
                                    echo "<img style='max-width: 45px;' src='../assets/files/stripe.png'>";
                                                }

                                                 ?></td>
                                            <td class="name"><?php echo fecha($order['order_date']); ?></td>
                                            <td class="status success"><span class="completed-pay"><?php echo $order['order_status']; ?></span></td>

                                        </tr>

                            <script type="text/javascript">
  function alertdelete_<?php echo $order['order_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "../controller/delete_order.php?id=<?php echo $order['order_id']; ?>" });}
  </script>
  
                            <?php endforeach; ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       </div>
                    </div> 
                    
                </div>
   
            </div>
        </div>
    </div>

</section>

<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 

                 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-primary close" data-dismiss="modal" style="font-size: 24px;">&times;</button>
        <h4 class="modal-title" style="font-size: 16px;">Details</h4>
      </div>
      <div class="modal-body">
        <div id="modal-loader" style="display: none; text-align: center;">
                           </div>
                                                   
                           <div id="dynamic-content"></div>
      </div>
    </div>

              </div>
       </div> 

<script>
$(document).ready(function(){
    
    $(document).on('click', '#getOffer', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');
        
        $('#dynamic-content').html('');
        $('#modal-loader').show();
        
        $.ajax({
            url: 'get_offer.php',
            type: 'POST',
            data: 'id='+uid,
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);  
            $('#dynamic-content').html('');    
            $('#dynamic-content').html(data);
            $('#modal-loader').hide(); 
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
        
    });
    
});

</script>