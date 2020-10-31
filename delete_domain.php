<?php include("inc/config.php");?>
<?php
		$id=$_POST['id'];		  
$stmt = $conn->prepare("delete from domains where id=:d ");
$stmt->execute(array(':d' => $id));


?>