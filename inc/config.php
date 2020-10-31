<?php
session_start();
$servername = "localhost";
$username = "valtfglg_domains";
$password = "valtfglg_domains@2017";
$site_url="http://valtifest.org/test/domains";
try {
    $conn = new PDO("mysql:host=$servername;dbname=valtfglg_domains", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>