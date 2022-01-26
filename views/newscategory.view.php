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
                            <h4>News Categories</h4>
                        </div>
                    </div>

                    <div class="col-12" style="text-align: right;padding-right: 20px;">
                        <a class="btn btn-outline-dark" href="<?php echo SITE_URL ?>/controller/new_newscategory.php">
                        <i class="fa fa-plus add-new-i"></i> Add New
                        </a>
                    </div>

                    <div class="col-12">
                        <div class="block bg-trans table-block mb-4">

                            <div class="row">
                                <div class="table-responsive">
<table id="dataTable1" class="display table table-striped" data-table="data-table">
    <thead>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($news_categories as $newscategory): ?>
            <tr>
              <td><?php echo $newscategory['news_category_id']; ?></td>
                <td width="40px" align="center"><img src="../images/<?php echo $newscategory['news_category_image']; ?>" style="width: 40px; height: 40px; padding: 2px;"></td>
                <td><?php echo $newscategory['news_category_name']; ?></td>
                <td>
                <a href="../controller/edit_newscategory.php?id=<?php echo $newscategory['news_category_id']; ?>" style="font-size: 14px;color: #34495e;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $newscategory['news_category_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #34495e;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $newscategory['news_category_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_newscategory.php?id=<?php echo $newscategory['news_category_id']; ?>" });}
  </script>
          </td>
            </tr>
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