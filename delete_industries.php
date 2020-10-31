<?php include('inc/header.php'); 
    $stmt = $conn->prepare("DELETE FROM domain_industries WHERE id= :a");
   $stmt->bindParam(':a', $_GET['i_id']);
   
    // insert a row
    if($stmt->execute()){
      header('location:domain_industries.php');
    }
    else{
		echo "try again";
	}

?>