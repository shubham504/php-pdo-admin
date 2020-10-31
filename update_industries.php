<?php include('inc/header.php'); 
if(isset($_POST['saverecords'])){
$ind = trim($_POST['industry_name']);
  $icon  = $_FILES['file_name']['name'];
  $date  = date('d-m-Y');
  move_uploaded_file($_FILES['file_name']['tmp_name'],"../uploads/".$icon);
// prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE domain_industries set  industry_name = :a , industry_icon = :b , publish_date = :c where id = :id");
    $stmt->bindParam(':a', $ind);
    $stmt->bindParam(':b', $icon);
	$stmt->bindParam(':c', $date);
	$stmt->bindParam(':id', $_GET['i_id']);
   
    // insert a row
    if($stmt->execute()){
      echo "record updated.";
    }
    else{
		echo "try again";
	}
}
?>
<style>
</style>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Frequently asked questions</h2>
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
						
						<h5>update FAQ</h5>
						<?php $stmt = $conn->prepare("SELECT * FROM domain_industries WHERE id = :filmID");
$stmt->bindParam(':filmID', $_GET['i_id'], PDO::PARAM_INT); 
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
  ?>
						<form id="form" name="form" enctype="multipart/form-data" method="post">
				<input type="hidden" id ='prod_id' value='' />
							<div class="input-group">
							  
							  <input type="text" class="form-control"  value="<?php echo $row['industry_name'];?>" name="industry_name"/>
							</div>
							
							<div class="input-group">
							  icon
							  <input type="file" class="form-control"  name="file_name"/>
							</div>
							<div class="input-group">
							  
							  <input type='submit' name='saverecords'  value ='update Records' />
							</div>
				</form>
<?php }?>
				
						
						

                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr>


              

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
		 
		 
		 
		 
		 
		 
		 

		 
		 
        
  <?php include('inc/footer.php'); ?>