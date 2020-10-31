<?php include('inc/header.php'); ?>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(".seller-state-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>
  <script type="text/javascript" >
        $(function() {

            $(".delbutton").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to delete this domain? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "delete_domain.php", //URL to the delete php script
                        data : info,
                        success : function() {
							alert("Domain Deleted Permanently");
                        }
                    });
                    $(this).parents("tr").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
 </script>
  <script type="text/javascript" >
        $(function() {

            $(".reject").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to Reject this domain?")) {
                    $.ajax({
                        type : "POST",
                        url : "reject_domain.php", //URL to the delete php script
                        data : info,
                        success : function() {
							alert("Domain rejected");
                        }
                    });
                    $(this).parents("tr").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
 </script>
  <script type="text/javascript" >
        $(function() {

            $(".undo").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to Make this domain Back to pending?")) {
                    $.ajax({
                        type : "POST",
                        url : "revertt_domain.php", //URL to the delete php script
                        data : info,
                        success : function() {
							alert("Now this domain is pending");
                        }
                    });
                    $(this).parents("tr").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
 </script>
<style>

.tabs-menu {
    height: 30px;
    float: left;
    clear: both;
}

.seller-state-menu li {
   
}

.seller-state-menu li.current {
  
    border-bottom: 2px solid #441196;
    
}

div#tabs-container {
    margin-top: 20px;
}

.tab {
   
    float: left;
    margin-bottom: 20px;
    width: 100%;
}

.tab-content {
    width: 100%;
    padding: 20px;
    display: none;
}

#tab-1 {
 display: block;   
}
ul.seller-state-menu li {
    float: left;
    display: inline-block;
    padding: 5px 15px;
    /* color: #000; */
}
</style>

        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Domains</h2>
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       <div id="tabs-container">
    <ul class="seller-state-menu">
        <li class="current"><a href="#tab-1" class="state-menu">Pending</a></li>
        <li><a href="#tab-2" class="state-menu">Approved</a></li>
        <li><a href="#tab-3" class="state-menu">Listed</a></li>
        <li><a href="#tab-4" class="state-menu">Sold</a></li>
		<li><a href="#tab-5" class="state-menu">Rejected</a></li>
    </ul>
          
        </div>
							<div class="tab">
						<div id="tab-1" class="tab-content">
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Domain Name</th>
                                    <th>Apply Coupan</th>
									<th>Submitted On</th>
                                    <th>Submitted by</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php   $stmtg = $conn->prepare("SELECT * from domains where domain_status=:p order by id ASC ");
$stmtg->execute(array(':p'=>'pending'));
$stmtg->execute();
$result = $stmtg->fetchAll();
$i=1;
foreach($result as $rowg){
?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $rowg['domain_name']; ?></td>
                                    
                                    <td><?php echo $rowg['coupan_apply']; ?></td>
									<td><?php echo $rowg['date'];?></td>
									<td>
									<?php   $stmtu = $conn->prepare("SELECT * from sellers where id=:current");
$stmtu->execute(array(':current'=> $rowg['added_by']));
$stmtu->execute();
$resultu = $stmtu->fetchAll();

foreach($resultu as $rowu){ echo $rowu['email'];}?>
									</td>
									<td> <a href="approve_domain.php?domain=<?php echo $rowg['id'];?>"><i class="fa fa-edit" title="Edit and approve"></i> </a> &nbsp;&nbsp; <a href="#" class="reject" title="Reject" id="<?php echo $rowg['id'];?>"><i class="fa fa-ban" title="Reject"></i> </a>&nbsp;&nbsp;<a href="#" class="delbutton" title="Delete" id="<?php echo $rowg['id'];?>"> <i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>
                                </tr>
								
							<?php  $i++; }  ?>
	
                                
                            </tbody>
                        </table>
</div>
				<div id="tab-2" class="tab-content">
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Domain Name</th>
                                    <th>Price</th>
									<th>Submitted On</th>
									<th>Approved On</th>
                                    <th>Submitted by</th>
									
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php   $stmtg = $conn->prepare("SELECT * from domains where domain_status=:p order by id ASC ");
$stmtg->execute(array(':p'=>'approved'));
$stmtg->execute();
$result = $stmtg->fetchAll();
$i=1;
foreach($result as $rowg){
?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $rowg['domain_name']; ?></td>
                                    
                                    <td>$<?php echo $rowg['price']; ?></td>
									<td><?php echo $rowg['date'];?></td>
									<td><?php echo $rowg['approved_on'];?></td>
									<td>
									<?php   $stmtu = $conn->prepare("SELECT * from sellers where id=:current");
$stmtu->execute(array(':current'=> $rowg['added_by']));
$stmtu->execute();
$resultu = $stmtu->fetchAll();

foreach($resultu as $rowu){ echo $rowu['email'];}?>
									</td>
									<td> <a href="approve_domain.php?domain=<?php echo $rowg['id'];?>"><i class="fa fa-edit" title="Edit and approve"></i> </a> &nbsp;&nbsp; <a href="#" class="reject" title="Reject" id="<?php echo $rowg['id'];?>"><i class="fa fa-ban" title="Reject"></i> </a>&nbsp;&nbsp;<a href="#" class="delbutton" title="Delete" id="<?php echo $rowg['id'];?>"> <i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>
                                </tr>
								
							<?php  $i++; }  ?>
	
                                
                            </tbody>
                        </table>
</div>
				<div id="tab-3" class="tab-content">
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Domain Name</th>
                                    <th>Apply Coupan</th>
									<th>Submitted On</th>
                                    <th>Submitted by</th>
									<th>Domain Status</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php   $stmtg = $conn->prepare("SELECT * from domains order by id ASC ");

$stmtg->execute();
$result = $stmtg->fetchAll();
$i=1;
foreach($result as $rowg){
?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $rowg['domain_name']; ?></td>
                                    
                                    <td><?php echo $rowg['coupan_apply']; ?></td>
									<td><?php echo $rowg['date'];?></td>
									<td>
									<?php   $stmtu = $conn->prepare("SELECT * from sellers where id=:current");
$stmtu->execute(array(':current'=> $rowg['added_by']));
$stmtu->execute();
$resultu = $stmtu->fetchAll();

foreach($resultu as $rowu){ echo $rowu['email'];}?>
									</td>
									<td> <?php echo $rowg['domain_status'];?></td> </tr>
								
							<?php  $i++; }  ?>
	
                                
                            </tbody>
                        </table>
</div>
				<div id="tab-4" class="tab-content">
							<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Domain Name</th>
                                    <th>Price</th>
									<th>Submitted On</th>
									<th>Sold On</th>
                                    <th>Submitted by</th>
									
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php   $stmtg = $conn->prepare("SELECT * from domains where domain_status=:p order by id ASC ");
$stmtg->execute(array(':p'=>'sold'));
$stmtg->execute();
$result = $stmtg->fetchAll();
$i=1;
foreach($result as $rowg){
?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $rowg['domain_name']; ?></td>
                                    
                                    <td>$<?php echo $rowg['price']; ?></td>
									<td><?php echo $rowg['date'];?></td>
									<td><?php echo $rowg['sold_on'];?></td>
									<td>
									<?php   $stmtu = $conn->prepare("SELECT * from sellers where id=:current");
$stmtu->execute(array(':current'=> $rowg['added_by']));
$stmtu->execute();
$resultu = $stmtu->fetchAll();

foreach($resultu as $rowu){ echo $rowu['email'];}?>
									</td>
									<td> <a href="#">View Details</td>
                                </tr>
								
							<?php  $i++; }  ?>
	
                                
                            </tbody>
                        </table>
</div>
				<div id="tab-5" class="tab-content">
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Domain Name</th>
                                    <th>Apply Coupan</th>
									<th>Submitted On</th>
									<th>Rejected On</th>
                                    <th>Submitted by</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php   $stmtg = $conn->prepare("SELECT * from domains where domain_status=:p order by id ASC ");
$stmtg->execute(array(':p'=>'rejected'));
$stmtg->execute();
$result = $stmtg->fetchAll();
$i=1;
foreach($result as $rowg){
?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $rowg['domain_name']; ?></td>
                                    
                                    <td><?php echo $rowg['coupan_apply']; ?></td>
									<td><?php echo $rowg['date'];?></td>
									<td><?php echo $rowg['rejected_on'];?></td>
									<td>
									<?php   $stmtu = $conn->prepare("SELECT * from sellers where id=:current");
$stmtu->execute(array(':current'=> $rowg['added_by']));
$stmtu->execute();
$resultu = $stmtu->fetchAll();

foreach($resultu as $rowu){ echo $rowu['email'];}?>
									</td>
									<td> <a href="#" class="undo" title="Revert to Pending" id="<?php echo $rowg['id'];?>"><i class="fa fa-undo" title="Revert to Pending"></i> </a>&nbsp;&nbsp;<a href="#" class="delbutton" title="Delete" id="<?php echo $rowg['id'];?>"> <i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>
                                </tr>
								
							<?php  $i++; }  ?>
	
                                
                            </tbody>
                        </table>
</div>
			
</div>
<!--  tab close-->
                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr>


              

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
		 

		 
		 
        
  <?php include('inc/footer.php'); ?>