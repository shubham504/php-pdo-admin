<?php include("inc/config.php");?>
<?php
		$id=$_POST['id'];
$date=date('d-m-Y');		
$stmt = $conn->prepare("update domains set domain_status=:p, date=:date where id=:d ");
$stmt->execute(array(':p'=>'pending',':date'=>$date ,':d' => $id));


?>