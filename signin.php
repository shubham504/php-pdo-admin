<?php require_once "inc/config.php";
$error  = array();
	$res    = array();
	$success = "";

		if(empty($_POST['username']))
		{
			$error[] = "username field is required";	
		}
	
		if(empty($_POST['password']))
		{
			$error[] = "Password field is required";	
		}
		

		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
	    $statement = $conn->prepare("select * from admin_users where username = :a AND password = :b" );
        $statement->execute(array(':a' => $_POST['username'],':b'=> md5($_POST['password'])));
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($row)>0)
		{
		
		  $_SESSION['admin_id'] = $row[0]['uid'];
		  $resp['redirect']    = "index.html";
		  $resp['status']      = true;	
		  echo json_encode($resp);
		  exit;	
		}
		else
		{
		   $error[] = "Email and password does not match";
		  $resp['msg']    = $error;
		  $resp['status']      = false;	
		  echo json_encode($resp);
		  exit;	
		} 

?>