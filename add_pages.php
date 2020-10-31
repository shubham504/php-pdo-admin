<?php require_once('inc/config.php');
if(isset($_POST['saverecords'])){
  $page_t  = trim($_POST["page_title"]);
  $page_c = trim($_POST["page_content"]);
  
// prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO pages(title, content)
    VALUES (:t , :c)");
    $stmt->bindParam(':t', $page_t);
    $stmt->bindParam(':c', $page_c);
    
    // insert a row
    if($stmt->execute()){
      header('location:pages.php');
}}
	?>
