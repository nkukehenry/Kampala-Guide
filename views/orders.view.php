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
                            <h4>Orders</h4>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="block bg-trans table-block mb-4">

                            <div class="row">
                                <div class="table-responsive">
<table id="dataTable1" class="display table table-striped" data-table="data-table">
                                        <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Item Ordered</th>
                                        <th>Customer</th>
                                        <th>Price</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                            <tfoot>
            <tr>
                                        <th>Reference</th>
                                        <th>Item Ordered</th>
                                        <th>Customer</th>
                                        <th>Price</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
            </tr>
        </tfoot>

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
<td>
                <a onclick="alertdelete_<?php echo $order['order_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #34495e;"><i class="fa fa-trash-o"></i></a>
                    <script type="text/javascript">
  function alertdelete_<?php echo $order['order_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_order.php?id=<?php echo $order['order_id']; ?>" });}
  </script>
                </td>

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