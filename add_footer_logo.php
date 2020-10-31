<?php

  require_once('config.php');
$data = array();
  $product  = trim($_POST["logo_name"]);
  $category = $_FILES["file_name"]["name"];
  
  
move_uploaded_file($_FILES['file_name']['tmp_name'],"../uploads/".$category);
// prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO footer_logo(logo_footer_title, logo_footer_image)
    VALUES (:a, :b )");
    $stmt->bindParam(':a', $product);
    $stmt->bindParam(':b', $category);
    // insert a row
    if($stmt->execute()){
      header("location:footer_logo.php");
    }
else{
 $data['error'] = "error: Invalid details";
 }
 echo json_encode($data);
 exit();


?>
	