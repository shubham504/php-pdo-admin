<?php include('inc/header.php'); ?>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<style>
form#form .input-group {
    width: 100%;
	padding: 14px;
}

.fr-element.fr-view  {
        height: 200px;
}


</style>
<div id="page-wrapper" >
          <div id="page-inner">
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
					
						<?php   
						$d_id=$_GET['domain'];
						$stmtd = $conn->prepare("SELECT * from domains where id=:i ");
$stmtd->execute(array(':i'=>$d_id));
$stmtd->execute();
$resultd = $stmtd->fetchAll();

foreach($resultd as $rowd){
?>
<div class="mainmy">
<div class="custom">
 <b>Seller Comment: </b><?php echo $rowd['comment'];?>
 </div>
 <div class="custom">
 <b>Domain Status: </b><?php echo $rowd['domain_status'];?>
 </div>
 <div class="custom">
 <b>Listing Payment : </b>
 
 <?php
if($rowd['listing_payment']==1){ echo "Payment made now on sale";}
else{
	echo "Payment not made yet";
}
?>
 </div>
 <div class="custom">
 <b>Seller want apply coupan: </b><?php echo $rowd['coupan_apply'];?>
 </div>
 <div class="custom">
 <a href="#" class="btn btn-primary">View Seller Profile</a>
 </div>
 </div>
						<form id="form" name="form" action="approve.php" method="post" enctype="multipart/form-data" >
				<input type="hidden" id ='prod_id'  style="width:100%; " />
							<div class="input-group">
							Domain Name
							  <input type="text" class="form-control" id="domain_name" required value="<?php echo $rowd['domain_name'];?>" placeholder="Page Title" name="domain_name"/>
							<input type="hidden" class="form-control" id="domain_id" required value="<?php echo $rowd['id'];?>" placeholder="Page Title" name="domain_id"/>
							
							</div>
							<div class="input-group">
							Choose Domain Industry
							<select name="industry" class="form-control" required>
							<?php   $stmtu = $conn->prepare("SELECT industry_name from domain_industries");
$stmtu->execute();
$resultu = $stmtu->fetchAll();

foreach($resultu as $rowu){ echo "<option value=".$rowu['industry_name'].">".$rowu['industry_name']."</option>";
}?>
							 
							 </select>
							  
							</div>
<div class="input-group">
							Make this Logo as featured.
							  <input type="checkbox" class="" id="main_logo" value="1"  name="feature" />

							</div>











							<div class="input-group"><?php if(rowd['logo'] != ''){ ?>
								<img src="../uploads/<?php echo $rowd['logo']; ?>" width=100px>
							<?php }?>
							Main Logo
							  <input type="file" class="form-control" id="main_logo"  name="main_logo" />
<input type="hidden" id="main_logo" name="old_image" value="<?php echo $rowd['logo']; ?>">
							</div>
							<div class="input-group">
							Price for this ($ dont use currency sign)
							  <input type="number" class="form-control" id="price" value="<?php echo $rowd['price'];?>" name="price" required />
							</div>
							<div class="input-group">
							Keywords (Seprate by comma)
							  <input type="text" class="form-control" id="tags"  name="tags" <?php echo $rowd['tags'];?> />
							</div>
							
							<div class="input-group">
							What you offer
							 <textarea  id="froala-editor" name="what_you_offer" placeholder="what you offer"> <?php echo $rowd['what_you_offer'];?></textarea>
							</div>
							<div class="input-group">
							Ideas for this domain
							 <textarea  id="froala-editor" name="idea" placeholder="idea"><?php echo $rowd['idea'];?> </textarea>
							</div>
							<div class="input-group">
							Description
							 <textarea  id="froala-editor" name="description" placeholder="description"> <?php echo $rowd['description'];?> </textarea>
							</div>
							<div class="input-group">
Images upto 5<br>


<?php if(rowd['image1'] != ''){ ?>
								<img src="../uploads/<?php echo $rowd['image1']; ?>" width=100px>
							<?php }?>
<?php if(rowd['image2'] != ''){ ?>
								<img src="../uploads/<?php echo $rowd['image2']; ?>" width=100px>
							<?php }?>
<?php if(rowd['image3'] != ''){ ?>
								<img src="../uploads/<?php echo $rowd['image3']; ?>" width=100px>
							<?php }?>
<?php if(rowd['image4'] != ''){ ?>
								<img src="../uploads/<?php echo $rowd['image4']; ?>" width=100px>
							<?php }?>
<?php if(rowd['image5'] != ''){ ?>
								<img src="../uploads/<?php echo $rowd['image5']; ?>" width=100px>
							<?php }?>
							

							 <input type="file" name="image1">
<input type="hidden" id="main_logo" name="old_image1" value="<?php echo $rowd['image1']; ?>"> 
							 <input type="file" name="image2">
<input type="hidden" id="main_logo" name="old_image2" value="<?php echo $rowd['image2']; ?>"> 
							 <input type="file" name="image3">
<input type="hidden" id="main_logo" name="old_image3" value="<?php echo $rowd['image3']; ?>">
							 <input type="file" name="image4">
<input type="hidden" id="main_logo" name="old_image4" value="<?php echo $rowd['image4']; ?>"> 
							 <input type="file" name="image5">
<input type="hidden" id="main_logo" name="old_image5" value="<?php echo $rowd['image5']; ?>">
							</div>
							<div class="input-group">
							Coupan Code 
							  <input type="text" class="" id="coupan_code"  name="coupan_code" value="<?php echo $rowd['coupan_code'];?>" />
							 Discount Price (in $) <input type="number" class="" id="discount"  name="discount" value="<?php echo $rowd['value'];?>" />
							
							
							</div>
							<div class="input-group">
							  
							  <input type='submit' name='saverecords'  value ='Update and Approve this domain' />
							</div>
				</form>
						
<?php } ?>			

                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr>


              

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
		 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script>
$(function() {
  $('textarea#froala-editor').froalaEditor()
});
</script>
		 
		 
        
<?php //include('inc/footer.php'); ?>
