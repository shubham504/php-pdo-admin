<?php include('inc/config.php');
if(isset($_POST['submit'])){
$page_title=$_POST['page_title'];
$page_content=stripslashes($_POST['page_content']);

try {
$statement = $conn->prepare("UPDATE  how_it_work SET  title=:a, content=:c   where id=:x" ) ;
$statement->execute(array(
     ":a" => "$page_title",
	":c" => "$page_content",
	
        ":x" =>1  

    
	
));

header("location:how_it_work.php");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
}
?>