<?php include("inc/config.php");?>
<?php
		$id=$_POST['id'];
$date=date('d-m-Y');		
$stmt = $conn->prepare("update domains set domain_status=:r, rejected_on=:date where id=:d ");
$stmt->execute(array(':r'=>'rejected',':date'=>$date ,':d' => $id));


?>