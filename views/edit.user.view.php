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
                            <h4>Edit User</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">

              <div class="form-group col-md-12">

   <input type="hidden" value="<?php echo $user['user_id']; ?>" name="user_id">
   <label>First Name</label>
   <input type="text" value="<?php echo $user['user_firstname']; ?>" placeholder="" name="user_firstname" class="form-control" required="">

   <label>Last Name</label>
   <input type="text" value="<?php echo $user['user_lastname']; ?>" placeholder="" name="user_lastname" class="form-control" required="">

   <label>Email</label>
   <input type="text" value="<?php echo $user['user_email']; ?>" placeholder="" name="user_email" class="form-control" required="">

   <label>Phone</label>
   <input type="text" value="<?php echo $user['user_phone']; ?>" placeholder="" name="user_phone" class="form-control" required="">

   <label>Password</label>
   <input type="text" value="<?php echo $user['user_password']; ?>" placeholder="" name="user_password" class="form-control" required="">


     <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                                <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>
                                
    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_user.php?id=<?php echo $user['user_id']; ?>" });}
   </script>

</div>


</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
