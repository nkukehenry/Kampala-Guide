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
                            <h4>New Offer</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">

<div class="form-group col-md-12">

   <label class="control-label">Title</label>
   <input type="text" value="" placeholder="" name="offer_title" class="form-control" required="">

      <label class="control-label">Description</label>
   <textarea type="text" class="form-control" name="offer_description" id="offer_description" required></textarea>

      <div class="row">
   <div class="col-sm-6">



   <label class="control-label">Price</label>
   <input type="text" value="" placeholder="" name="offer_price" class="form-control" required="">

   </div>

   <div class="col-sm-6">

   <label class="control-label">Old Price</label>
   <input type="text" value="" placeholder="" name="offer_oldprice" class="form-control" required="">

   </div>
   </div>

   <div class="row">
   <div class="col-sm-6">



    <label class="control-label">Category</label>
   <select class="custom-select form-control" name="offer_category" required>
    <?php foreach($offers_categories_lists as $offers_categories_list): ?>
   <option value="<?php echo $offers_categories_list['offer_category_id']; ?>"><?php echo $offers_categories_list['offer_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

   </div>

   <div class="col-sm-6">

<label>Featured:</label>


   <select class="custom-select form-control" name="offer_featured" required="">
   <option value="" selected>- Select -</option>
   <option value="Yes">Yes</option>
   <option value="No">No</option>
   </select>
   
   </div>
   </div>





  <label class="control-label">Terms</label>
   <textarea type="text" class="form-control" name="offer_terms" id="offer_terms" required></textarea>

   <label>Featured Image:</label><br/>
   
   <div class="input-file-container">  
    <input class="input-file" name="offer_image" id="my-file" type="file">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>850 x 450 Pixels</b> </span>

  <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                                


</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<script>
CKEDITOR.replace( 'offer_description' );
CKEDITOR.replace( 'offer_terms' );
</script>