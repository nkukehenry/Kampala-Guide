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
                            <h4>New Manager</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">

              <div class="form-group col-md-12">

   <label>Name</label>
   <input type="text" value="" placeholder="" name="name" class="form-control" required="">

   <label>Username</label>
   <input type="text" value="" placeholder="" name="username" class="form-control" required="">

   <label>Password</label>
   <input type="text" value="" placeholder="" name="password" class="form-control" required="">


     <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>

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
