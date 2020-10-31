<?php include('inc/header.php'); 
require_once('config.php');

    $stmt = $conn->prepare("DELETE FROM footer_logo WHERE id= :a");
   $stmt->bindParam(':a', $_GET['logo_id']);
   
    // insert a row
    if($stmt->execute()){
      header('location:footer_logo.php');
    }
    else{
		echo "try again";
	}

?>