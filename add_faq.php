<?php

  require_once('config.php');
if(isset($_POST['saverecords'])){
  $quation  = trim($_POST["Quation"]);
  $answers = trim($_POST["answers"]);
  

// prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO faq(question, answers)
    VALUES (:q , :a)");
    $stmt->bindParam(':q', $quation);
    $stmt->bindParam(':a', $answers);
    
    // insert a row
    if($stmt->execute()){
      header('location:faq.php');
}}
	?>
