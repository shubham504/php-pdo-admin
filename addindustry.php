<?php include('config.php'); 

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

    if (empty($_POST['name'])){
        $errors['name'] = 'Name is required.';

	}
    if (empty($_POST['file']['name']))
	{$errors['file'] = 'icon is required.';
	}
    if ( ! empty($errors)) {

        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
		
		try {
			$date= date("d-m-Y");
			$newlogo=rand(0,10000)."_".$_POST['file']['name'];
$statement = $conn->prepare("INSERT INTO  domain_industry (industry_name, 	industry_icon, publish_date) VALUES (a:,b:,c:)" ) ;
$statement->execute(array(
    "a" => "$_POST['name']",
    "b" => "$newlogo",
    "c" => "$date"
));
move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/".$newlogo)

        $data['success'] = true;
        $data['message'] = 'Success!';
}
catch(PDOException $e) {
    echo $e->getMessage();
}

	
    }

    echo json_encode($data);

?>