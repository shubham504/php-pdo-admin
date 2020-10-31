<?php

  require_once('config.php');

  $product  = trim($_POST["product_name"]);
  $category = trim($_POST["category"]);
  $date  = date("d-m-Y");
// prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE domain_industries set product_name = :product, price = :price , category = :category where id = :id");
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':id', $prod_id);
    // insert a row
    if($stmt->execute()){
      $result =1;
    }
    echo $result;
    $dbconn = null;