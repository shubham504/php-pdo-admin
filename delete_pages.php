<?php include('inc/header.php'); 

    $stmt = $conn->prepare("DELETE FROM pages WHERE id= :a");
   $stmt->bindParam(':a', $_GET['page_id']);
 
    if($stmt->execute()){
      header('location:pages.php');
    }
    else{
		echo "try again";
	}

?>