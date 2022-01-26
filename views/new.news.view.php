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
                            <h4>New Post</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="form-row">
              
              <div class="form-group col-md-12">
                
                <label>Name</label>
                <input class="form-control" value="" name="news_title" type="text" required="">

                <label>Description</label>

                <textarea type="text" class="form-control" name="news_description" id="news_description" required=""></textarea>

                      <label class="control-label">Category</label>
   <select class="custom-select form-control" name="news_category" required="">
    <?php foreach($news_categories_lists as $news_categories_list): ?>
   <option value="<?php echo $news_categories_list['news_category_id']; ?>"><?php echo $news_categories_list['news_category_name']; ?></option>
    <?php endforeach; ?>
   </select>


   <label>Status</label>

   <select class="custom-select form-control" name="news_status" required="">
   <option value="" selected>- Select -</option>
   <option value="Published">Published</option>
   <option value="Draft">Draft</option>
   </select>




   <label>Featured Image:</label><br/>
   
   <div class="input-file-container">  
    <input class="input-file" name="news_image" id="my-file" type="file">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>850 x 450 Pixels</b> </span>


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

<script>
CKEDITOR.replace( 'news_description' );
</script>
