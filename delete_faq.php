<?php include('inc/header.php'); 
require_once('config.php');

    $stmt = $conn->prepare("DELETE FROM faq WHERE id= :a");
   $stmt->bindParam(':a', $_GET['f_id']);
   
    // insert a row
    if($stmt->execute()){
      header('location:faq.php');
    }
    else{
		echo "try again";
	}

?>