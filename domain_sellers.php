<?php include('inc/header.php'); ?>

<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Sellers</h2>
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Email</th>
                                    <th>Full Name</th>
                                    <th>Member Since</th>
									<th>Phone</th>
									<th>Account Active ?</th>
									<th>Profile</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
$sth = $conn->prepare("SELECT * from sellers order by id ASC");
$sth->execute();
$i=1;
$result = $sth->fetchAll(); 
   foreach($result as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
									<td><?php echo $row['created']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
									
                                    <td><?php echo $row['active']; ?></td>
                                   
									<td><a href="view_profile.php?seller_id=<?php echo $row['id']; ?>" class="btn btn-primary">View Profile</a></td>
                                </tr>
								
							<?php $i++; }  ?>
 	
                                
                            </tbody>
                        </table>
					
						
						

                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr>


              

            </div>
            </div>
         
		 
		 
        
<?php include('inc/footer.php'); ?>
