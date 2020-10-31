<?php require_once('inc/config.php');
$data = array();
  $product  = trim($_POST["industry_name"]);
  $category = $_FILES["file_name"]["name"];
  
  $date    = date("d-m-Y");
move_uploaded_file($_FILES['file_name']['tmp_name'],"../industries-icon/".$category);
// prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO domain_industries(industry_name, industry_icon, publish_date)
    VALUES (:product, :category , :date)");
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':date', $date);
    // insert a row
    if($stmt->execute()){
      header("location:domain_industries.php");
    }
else{
 $data['error'] = "error: Invalid details";
 }
 echo json_encode($data);
 exit();


?>
	

	
	