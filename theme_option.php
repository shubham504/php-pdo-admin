<?php include('inc/header.php'); ?>

<div id="page-wrapper">
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Theme Options</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr>
<div class="row">
<?php
							 $sth = $conn->prepare("SELECT *  FROM theme_option");
$sth->execute();
$result = $sth->fetchAll();
 foreach($result as $row){ 
  ?>

<form method="post" action="add_theme_option.php" enctype="multipart/form-data">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							
						  
<img src='<?php echo $site_url."/images/". $row["logo"]; ?>' style="width: 90px;"/>
	 

	<div class="input-group
	  <span class="input-group-addon">Logo</span>
	  <input type="file" class="form-control" name="logo_image">
	  
	</div>
	<div class="input-group">
	 
	  <input type="hidden"  style="dispaly:none;" class="form-control" name="old_logo_image" value="<?php echo $row['logo']; ?>">
	  
	</div>
	<br>
	<h4>Social Links</h4>
	<div class="input-group">
	  <span class="input-group-addon">Facebook</span>
	  <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
	  <input type="text" class="form-control" name="facebook_link" value="<?php echo $row['facebook']; ?>">
	  
	</div>
	<br>

	<div class="input-group">
	  <span class="input-group-addon">Pinterest</span>
	  <span class="input-group-addon"><i class="fa fa-pinterest-square"></i></span>
	  <input type="text" class="form-control" name="pinterest_link" value="<?php echo $row['pinterest']; ?>">
	  
	</div>
	<br>

	<div class="input-group">
	  <span class="input-group-addon">Linkedin</span>
	  <span class="input-group-addon"><i class="fa fa-linkedin-square"></i></span>
	  <input type="text" class="form-control" name="linkedin_link" value="<?php echo $row['linkedin']; ?>">
	  
	</div>
	<br>

	<div class="input-group">
	  <span class="input-group-addon">Twitter</span>
	  <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
	  <input type="text" class="form-control" name="twitter_link" value="<?php echo $row['twitter']; ?>">
	  
	</div>
	<br>

	<div class="input-group">
	  <span class="input-group-addon">Instagram</span>
	  <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
	  <input type="text" class="form-control" name="instagram_link" value="<?php echo $row['instagram']; ?>">
	  
	</div>
	<br>
	
	<br>

	<div class="input-group">
	  <span class="input-group-addon">Copyright text</span>
	  <span class="input-group-addon"></span>
	  <input type="text" class="form-control" name="copyright_text" value="<?php echo $row['copyright']; ?>">
	  
	</div>
		<hr>
			
                        <input type="submit" name="submit" class="btn btn-danger btn-lg btn-block" value="Update">
	 
				</div>
                   
 </form>                   
 <?php } ?>
</div>
               
                
                
                <!-- /. ROW  -->
                


                
                <!-- /. ROW  -->
                <hr>
                  <div class="row">
                    
                </div>
                <!-- /. ROW  -->

            </div>
            </div>







<?php include('inc/footer.php'); ?>