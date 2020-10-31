<?php include('inc/header.php'); 
if(isset($_POST['saverecords'])){
$que = trim($_POST["Quation"]);
  $ans  = trim($_POST["answers"]);
// prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE faq set  question = :a , answers = :b where id = :id");
    $stmt->bindParam(':a', $que);
    $stmt->bindParam(':b', $ans);
	$stmt->bindParam(':id', $_GET['f_id']);
   
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
						<?php $stmt = $conn->prepare("SELECT * FROM faq WHERE id = :filmID");
$stmt->bindParam(':filmID', $_GET['f_id'], PDO::PARAM_INT); 
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
  ?>
						<form id="form" name="form" action="#" method="post">
				<input type="hidden" id ='prod_id'  style="width:100%; " >
							<div class="input-group">
							  <input type="text" class="form-control" id="product_name" value="<?php echo $row['question'];?>" name="Quation"/>
							</div>
							
							<div class="input-group">
							 <textarea name="answers" placeholder="answers"><?php echo $row['answers'];?> </textarea>
							</div>
							<div class="input-group">
							  
							  <input type='submit' name='saverecords'  value ='Update Records' />
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