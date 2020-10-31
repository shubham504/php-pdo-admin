<?php include('inc/config.php');
if(isset($_POST['submit'])){
$page_title=$_POST['page_title'];
$lo=$_FILES['featured_image']['name'];
$lo_old=$_POST['featured_image_old'];
$page_content=stripslashes($_POST['page_content']);
$page_content_1=stripslashes($_POST['page_content_1']);
$page_content_2=stripslashes($_POST['page_content_2']);
$page_content_3=stripslashes($_POST['page_content_3']);




if($lo!=''){
$newlogo=rand(0,10000)."_".$lo;
$target_dir = "../uploads/";
$target_file = $target_dir . basename($newlogo);

move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
  
}
else{
$newlogo=$lo_old;
}

try {
$statement = $conn->prepare("UPDATE  sell_domains SET title=:a, content=:c ,featured=:b , content1=:p , content2=:q ,content3=:r where id=:x" ) ;
$statement->execute(array(
     ":a" => "$page_title",
	":c" => "$page_content",
	":b" => "$newlogo",
	":p" => "$page_content_1",
	":q" => "$page_content_2",
	":r" => "$page_content_3",
        ":x" =>1  

    
	
));

header("location:sell_domain.php");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
}
?>