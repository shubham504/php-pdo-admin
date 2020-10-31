<?php include('inc/config.php');
if(isset($_POST['submit'])){
 $lo=$_FILES['logo_image']['name'];
$fb=$_POST['facebook_link'];
$pi=$_POST['pinterest_link'];
$li=$_POST['linkedin_link'];
$tw=$_POST['twitter_link'];
$in=$_POST['instagram_link'];
$copy=$_POST['copyright_text'];
$ologo=$_POST['old_logo_image'];
if($lo!=''){
$newlogo=rand(0,10000)."_".$lo;
$target_dir = "../images/";
$target_file = $target_dir . basename($newlogo);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["logo_image"]["tmp_name"], $target_file);
  
}
else{
	$newlogo=$ologo;
}
try {
$statement = $conn->prepare("UPDATE  theme_option SET logo=:a, facebook=:b, pinterest=:c, linkedin=:d, twitter=:f, instagram=:g, copyright=:h WHERE id=:i" ) ;
$statement->execute(array(
    "a" => "$newlogo",
    "b" => "$fb",
    "c" => "$pi",
	"d" => "$li",
    "f" => "$tw",
    "g" => "$in",
	"h" => "$copy",
	"i" => "1"
));

header("location:theme_option.php");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
}
?>