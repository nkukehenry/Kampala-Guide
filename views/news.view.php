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
                            <h4>Posts</h4>
                        </div>
                    </div>

                    <div class="col-12" style="text-align: right;padding-right: 20px;">
                        <a class="btn btn-outline-dark" href="<?php echo SITE_URL ?>/controller/new_news.php">
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
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Id</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($news as $news): ?>
            <tr>
              <td><?php echo $news['news_id']; ?></td>
                <td width="50px"><img src="../images/<?php echo $news['news_image']; ?>" style="width: 100%; height: 40px; padding: 2px; border: 1px solid #eee;"></td>
                <td><?php echo $news['news_title']; ?></td>
                <td><?php echo $news['category_name']; ?></td>
                <td><?php echo $news['news_status']; ?></td>
                <td><?php echo fecha($news['news_date']); ?></td>
                <td>
                <a href="../controller/edit_news.php?id=<?php echo $news['news_id']; ?>" style="font-size: 14px;color: #34495e;"><i class="fa fa-cog"></i></a>
          <a onclick="alertdelete_<?php echo $news['news_id']; ?>();" style="cursor: pointer;font-size: 14px;color: #34495e;"><i class="fa fa-trash-o"></i></a>
              <script type="text/javascript">
  function alertdelete_<?php echo $news['news_id']; ?>() {
  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_news.php?id=<?php echo $news['news_id']; ?>" });}
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