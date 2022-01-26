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
                            <h4>Edit Place</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<div class="form-row">
              
              <div class="form-group col-md-12">

                  <input type="hidden" value="<?php echo $place['place_id']; ?>" name="place_id">
                
                <label>Name</label>
                <input class="form-control" value="<?php echo $place['place_name']; ?>" name="place_name" type="text">

                <label>Description</label>

                <textarea type="text" class="form-control" name="place_description" id="place_description" required><?php echo $place['place_description']; ?></textarea>

                <label>Address</label>
                <input class="form-control" value="<?php echo $place['place_address']; ?>" name="place_address" id="address" type="text">

               </div>

               <div class="form-group col-md-6">
                                        <label>Latitude: <a href="https://www.latlong.net/" target="_blank">find coordinates </a></label>
      <input type="text" value="<?php echo $place['place_latitude']; ?>" class="form-control" id="latitude" name="place_latitude" required="">
                                        
              </div>

                                    <div class="form-group col-md-6">
                                        <label>Longitude: <a href="https://www.latlong.net/" target="_blank">find coordinates </a></label>
      <input type="text" value="<?php echo $place['place_longitude']; ?>" class="form-control" id="longitude" name="place_longitude" required="">
                                        
              </div>


                   <div class="form-group col-md-6">
                                        <label>Hours</label>
                                        <input class="form-control" value="<?php echo $place['place_hours']; ?>" name="place_hours" type="text">
                   </div>


                   <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" value="<?php echo $place['place_phone']; ?>" name="place_phone" type="text">
                   </div>


                   <div class="form-group col-md-6">
                                        <label>Website</label>
                                        <input class="form-control" value="<?php echo $place['place_website']; ?>" name="place_website" type="text">
                   </div>


                   <div class="form-group col-md-6">
                                        <label>Audience</label>
                                        <input class="form-control" value="<?php echo $place['place_audience']; ?>" name="place_audience" type="text">
                   </div>


                   <div class="form-group col-md-6">
                                        <script type="text/javascript">
$(document).ready(function()
{
 $(".place_category").change(function()
 {
  var cat_id=$(this).val();
  var dataString = 'cat_id='+ cat_id;
 
  $.ajax
  ({
   type: "POST",
   url: "get_types.php",
   data: dataString,
   cache: false,
   success: function(html)
   {
      $(".place_type").html(html);
   } 
   });
  });
 
});
</script>
      <label>Category</label>
   <select class="custom-select form-control place_category" name="place_category" required="">
   <option value="<?php echo $place['place_category']; ?>" selected="selected"><?php echo $place['category_name']; ?></option>
    <?php foreach($places_categories_lists as $places_categories_list): ?>
   <option value="<?php echo $places_categories_list['place_category_id']; ?>"><?php echo $places_categories_list['place_category_name']; ?></option>
    <?php endforeach; ?>
   </select>

                   </div>

                   <div class="form-group col-md-6">
                                        <label>Type</label>
                                        
                                           <select class="custom-select form-control place_type" name="place_type" required="">
  <option value="<?php echo $place['place_type']; ?>" selected="selected"><?php echo $place['type_name']; ?></option>
   </select>
                   </div>


              <div class="form-group col-md-12">
                                        <label>Featured: <a href="#"><?php echo $place['place_featured']; ?></a></label>


   <select class="custom-select form-control" name="place_featured" required="">
   <option value="<?php echo $place['place_featured']; ?>" selected>- Select -</option>
   <option value="Yes">Yes</option>
   <option value="No">No</option>
   </select>

               </div>

              <div class="form-group col-md-12">


   <label>Featured Image: <a href="<?php echo SITE_URL ?>/images/<?php echo $place['place_image']; ?>" data-lightbox="image-1">Preview</a></label><br/>
   
   <input type="hidden" value="<?php echo $place['place_image']; ?>" name="place_image_save">
   <div class="input-file-container">  
    <input class="input-file" name="place_image" id="my-file" type="file">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
  </div>
  <p class="file-return"></p>
   <br/>
   <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>850 x 450 Pixels</b> </span>

  </div>
              <div class="form-group col-md-12">

  <label>Gallery (Max. 8)</label>

   <div class="gallery">
   <?php foreach($gallery as $gallery_image): ?>
    <div class="image">
     <div class="badge-container" style="background:url(<?php echo SITE_URL ?>/images/<?php echo $gallery_image['image_name']; ?>);">
    <a onclick="alertdelete<?php echo $gallery_image['image_id']; ?>();">
    <div class="badge_gallery badge-red"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div></a>
     </div>

         <script type="text/javascript">
   function alertdelete<?php echo $gallery_image['image_id']; ?>() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this image!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_gallery_image.php?id=<?php echo $gallery_image['image_id']; ?>" });}
   </script>
  <?php endforeach; ?>
   </div>

  <input name="files" class="input-file" type="file">



  <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                                <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>

                                    <script type="text/javascript">
   function alertdelete() {
   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo SITE_URL ?>/controller/delete_place.php?id=<?php echo $place['place_id']; ?>" });}
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

<script type="text/javascript">
  document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
</script>

<script>
CKEDITOR.replace( 'place_description' );
</script>