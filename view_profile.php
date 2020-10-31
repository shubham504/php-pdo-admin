<?php include('inc/header.php'); ?>

<div id="page-wrapper">
          <div id="page-inner">

<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
						
						   <?php 
$id=$_GET['seller_id'];
$stmt1 = $conn->prepare("SELECT * FROM sellers where id=:x ");
$stmt1->execute( array(':x' => $id ));
$result = $stmt1->fetchAll();
foreach($result as $rowg){
?>
					<div class="col-md-4"><?php if($rowg['profile']!='')  {?>
<img src="../uploads/<?php echo $rowg['profile']?>" style="
    width: 133px;
    border-radius: 50%;
"><?php } ?><br>
<?php echo $rowg['fullname']?><br>
Member since <?php echo $rowg['created']?>

 </div>     
	<div class="col-md-4">	
<p>	Display name: <?php echo $rowg['display_name']?></p>
<p>	Email: <?php echo $rowg['email']?></p>
<p>	Phone no.: <?php echo $rowg['phone']?></p>
<p>	Last updated: <?php echo $rowg['last_updated']?></p>






</div>					
                                                              

<?php } ?>								
								
								
						
			

					</div>
                
				</div>
</div>

			</div>
</div>






<?php include('inc/footer.php'); ?>