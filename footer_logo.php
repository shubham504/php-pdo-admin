<?php include('inc/header.php'); ?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(function() {
	//----- OPEN
	$('[data-popup-open]').on('click', function(e)  {
		var targeted_popup_class = jQuery(this).attr('data-popup-open');
		$('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

		e.preventDefault();
	});

	//----- CLOSE
	$('[data-popup-close]').on('click', function(e)  {
		var targeted_popup_class = jQuery(this).attr('data-popup-close');
		$('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

		e.preventDefault();
	});
});
</script>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Footer Logo</h2>
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h5>  <button class="btn" data-popup-open="popup-1" href="#">Add New</button></h5>
							
							<!-- The Modal -->
							<div class="main">
							<div id="signin-response" class=""></div>
		

		<div class="popup" data-popup="popup-1">
			<div class="popup-inner">
				<h5>Add Footer Text</h5>

				<form id="form" name="form" method="post" enctype="multipart/form-data" action="add_footer_logo.php">
				<input type="hidden" id ='prod_id' value='' />
							<div class="input-group">
							  
							  <input type="text" class="form-control"  placeholder="logo title" name="logo_name"/>
							</div>
							
							<div class="input-group">
							  icon
							  <input type="file" class="form-control"  placeholder="logo" name="file_name"/>
							</div>
							<div class="input-group">
							  <button type="submit" id='saverecords' >Add logo</button>
							  
							</div>
				</form>
							
							
							
				<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
							
			</div>
		</div>


	</div>

							 
                        
						
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Footer Name</th>
                                    <th>Footer Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							$sth = $conn->prepare("SELECT * FROM footer_logo order by id ASC");
$sth->execute();
/* Fetch all of rows in the result set */
$result = $sth->fetchAll();
  /* FetchAll foreach with edit and delete using Ajax */
  if($sth->rowCount()):
    $i=1;
   foreach($result as $row){ 
  ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['logo_footer_title']; ?></td>
                                    <td><img src="<?php echo '../uploads/'.$row['logo_footer_image']; ?> " style="width: 50px;"></td>
									<td><a class='delbtn'  href="delete_footer_logo.php?logo_id=<?php echo $row['id']; ?>">Delete</a></td>
                                </tr>
								
							<?php  $i++; }  ?>
  <?php endif;  ?>	
                                
                            </tbody>
                        </table>

                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr>


              

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
		 

		 
		 
        
  <?php include('inc/footer.php'); ?>