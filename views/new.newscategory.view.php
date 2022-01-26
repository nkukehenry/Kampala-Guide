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
                            <h4>New Posts Category</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">
              
              <div class="form-group col-md-12">

                <label>Name</label>
   <input type="text" placeholder="" name="news_category_name" class="form-control" required="">

               </div>

              <div class="form-group col-md-12">


   <label>Image:</label><br/>
   
   <div class="input-file-container">  
    <input class="input-file" name="news_category_image" id="my-file" type="file" required="">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>250 x 250 Pixels</b> </span>

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