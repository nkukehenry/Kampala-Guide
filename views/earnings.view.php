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

<style type="text/css">
    th{
    color: var(--dark-color) !important;
    font-weight: bold !important;
    font-size: 14px !important;
    }
</style>
                
</div>
<div class="row">
<div class="col-12 col-sm-6 col-md-8 col-lg-8">
                        <div class="block table-block mb-4" style="min-height: 361px">
                          <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Item Sales Earnings</h5>
                                <div class="ml-auto w-25">
                                    <select class="custom-select form-rounded form-control input-sm" id="getSales">
                                           <option value="allTime" selected>All Time</option>
   <?php foreach($total_sales as $sale): ?>
    <option value="<?php echo $sale['year']; ?>"><?php echo $sale['year']; ?></option>
   <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                                <div class="table-responsive text-no-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                    <tr>
                                        <th width="300px">Date</th>
                                        <th width="300px">Item Sales Count</th>
                                        <th width="300px">Earnings</th>
                                    </tr>
 
                                    </thead>
 <tbody class="text-middle" id="display">
                                   
</tbody>
                                    </table>
                                </div>
                       </div>
                    </div> 

<div class="col-12 col-sm-6 col-md-4 col-lg-4">
<div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Latest Orders</h5>
                                <div class="graph-pills graph-home">
                            </div>
                            </div>
                            <div>
                                <div class="table-responsive text-no-wrap">
                                    <table class="table">
                                      <thead>
                                    <tr>
                                        <th width="300px">Id</th>
                                        <th width="300px">Item Ordered</th>
                                        <th width="300px">Amount</th>
                                    </tr>
 
                                    </thead>
                                        <tbody class="text-middle">
        <?php
$i = 1;
foreach ($orders as $order) { ?>

                                        <tr>
                                            <td class="name"><?php echo $order['order_id']; ?></td>
                                            <td class="status"><a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $order['offer_id']; ?>" id="getOffer" class="view-details" >View Details</a></td>
                                            <td class="price" style="text-transform: uppercase;text-align: right;"><?php echo $order['order_gross']; ?> <?php echo $order['order_cc']; ?></td>
                                        </tr>
<?php
    if ($i++ == 5) break;
}
?>

                                        </tbody>
                                    </table>


                          <a class="btn btn-info btn-round btn-block" href="../controller/orders.php" style="margin-top: 10px;">View All</a>
                            </div>

                        </div></div>
                        </div>
</div>
</div>

</div>
</div>
</div>
</section>

<script type="text/javascript">
$(document).ready(function()
{  
 function getAll(){
  
  $.ajax
  ({
   url: '../controller/sales.php',
   data: 'year=allTime',
   cache: false,
   success: function(r)
   {
    $("#display").html(r);
   }
  });   
 }
 
 getAll();
 
 $("#getSales").change(function()
 {    
  var id = $(this).find(":selected").val();
  var dataString = 'year='+ id;
    
  $.ajax
  ({
   url: '../controller/sales.php',
   data: dataString,
   cache: false,
   success: function(r)
   {
    $("#display").html(r);
   } 
  });
 })
});
</script>

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