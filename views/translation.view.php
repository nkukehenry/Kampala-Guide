<?php require'sidebar.view.php'; ?>

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        <?php require'navbar.view.php'; ?>

        <!--Main Content-->

<style type="text/css">
  .form-control{margin-bottom: 8px}
</style>

<div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Strings</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">
      

<div class="tabs is-boxed">
<ul>
            <li class="tab is-active" onclick="openTab(event,'strings')"><a >Strings</a></li>
            <li class="tab" onclick="openTab(event,'aboutus')"><a >About Us</a></li>
            <li class="tab" onclick="openTab(event,'terms')"><a >Terms of Service</a></li>
            <li class="tab" onclick="openTab(event,'privacy')"><a >Privacy Policy</a></li>
          </ul>
</div>

<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<div id="strings" class="content-tab" >


<input type="text" value="<?php echo $strings['st_1']; ?>" name="st_1" class="form-control">
<input type="text" value="<?php echo $strings['st_2']; ?>" name="st_2" class="form-control">
<input type="text" value="<?php echo $strings['st_3']; ?>" name="st_3" class="form-control">
<input type="text" value="<?php echo $strings['st_4']; ?>" name="st_4" class="form-control">
<input type="text" value="<?php echo $strings['st_5']; ?>" name="st_5" class="form-control">
<input type="text" value="<?php echo $strings['st_6']; ?>" name="st_6" class="form-control">
<input type="text" value="<?php echo $strings['st_7']; ?>" name="st_7" class="form-control">
<input type="text" value="<?php echo $strings['st_8']; ?>" name="st_8" class="form-control">
<input type="text" value="<?php echo $strings['st_9']; ?>" name="st_9" class="form-control">
<input type="text" value="<?php echo $strings['st_10']; ?>" name="st_10" class="form-control">
<input type="text" value="<?php echo $strings['st_11']; ?>" name="st_11" class="form-control">
<input type="text" value="<?php echo $strings['st_12']; ?>" name="st_12" class="form-control">
<input type="text" value="<?php echo $strings['st_13']; ?>" name="st_13" class="form-control">
<input type="text" value="<?php echo $strings['st_14']; ?>" name="st_14" class="form-control">
<input type="text" value="<?php echo $strings['st_15']; ?>" name="st_15" class="form-control">
<input type="text" value="<?php echo $strings['st_16']; ?>" name="st_16" class="form-control">
<input type="text" value="<?php echo $strings['st_17']; ?>" name="st_17" class="form-control">
<input type="text" value="<?php echo $strings['st_18']; ?>" name="st_18" class="form-control">
<input type="text" value="<?php echo $strings['st_19']; ?>" name="st_19" class="form-control">
<input type="text" value="<?php echo $strings['st_20']; ?>" name="st_20" class="form-control">
<input type="text" value="<?php echo $strings['st_21']; ?>" name="st_21" class="form-control">
<input type="text" value="<?php echo $strings['st_22']; ?>" name="st_22" class="form-control">
<input type="text" value="<?php echo $strings['st_23']; ?>" name="st_23" class="form-control">
<input type="text" value="<?php echo $strings['st_24']; ?>" name="st_24" class="form-control">
<input type="text" value="<?php echo $strings['st_25']; ?>" name="st_25" class="form-control">
<input type="text" value="<?php echo $strings['st_26']; ?>" name="st_26" class="form-control">
<input type="text" value="<?php echo $strings['st_27']; ?>" name="st_27" class="form-control">
<input type="text" value="<?php echo $strings['st_28']; ?>" name="st_28" class="form-control">
<input type="text" value="<?php echo $strings['st_29']; ?>" name="st_29" class="form-control">
<input type="text" value="<?php echo $strings['st_30']; ?>" name="st_30" class="form-control">
<input type="text" value="<?php echo $strings['st_31']; ?>" name="st_31" class="form-control">
<input type="text" value="<?php echo $strings['st_32']; ?>" name="st_32" class="form-control">
<input type="text" value="<?php echo $strings['st_33']; ?>" name="st_33" class="form-control">
<input type="text" value="<?php echo $strings['st_37']; ?>" name="st_37" class="form-control">
<input type="text" value="<?php echo $strings['st_38']; ?>" name="st_38" class="form-control">
<input type="text" value="<?php echo $strings['st_39']; ?>" name="st_39" class="form-control">
<input type="text" value="<?php echo $strings['st_40']; ?>" name="st_40" class="form-control">
<input type="text" value="<?php echo $strings['st_41']; ?>" name="st_41" class="form-control">

</div>


<div id="aboutus" class="content-tab" style="display:none">
     <textarea type="text" class="form-control" name="st_36" id="textarea3"><?php echo $strings['st_36']; ?></textarea>
  </div>


<div id="terms" class="content-tab" style="display:none">
     <textarea type="text" class="form-control" name="st_35" id="textarea2"><?php echo $strings['st_35']; ?></textarea>
  </div>


<div id="privacy" class="content-tab" style="display:none">
<textarea type="text" class="form-control" name="st_34" id="textarea1"><?php echo $strings['st_34']; ?></textarea>   
  
  </div>
<hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>
</section>

<script> CKEDITOR.replace( 'textarea1' ); </script>
<script> CKEDITOR.replace( 'textarea2' ); </script>
<script> CKEDITOR.replace( 'textarea3' ); </script>

<script type="text/javascript">
  function openTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("content-tab");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" is-active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " is-active";
}
</script>