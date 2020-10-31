<?php include("inc/config.php");?>
<?php
if(isset($_POST['saverecords'])){
		$id=$_POST['domain_id'];
		$domain_name=$_POST['domain_name'];
		$industry=$_POST['industry'];
$feature=$_POST['feature'];
		$main_logo=$_FILES['main_logo']['name'];

         $old_image=$_POST['old_image'];
		$price=$_POST['price'];
		$tags=$_POST['tags'];
		$what_you_offer=stripslashes($_POST['what_you_offer']);
		$idea=stripslashes($_POST['idea']);
		$description=stripslashes($_POST['description']);
		$image1=$_FILES['image1']['name'];
		$image2=$_FILES['image2']['name'];
		$image3=$_FILES['image3']['name'];
		$image4=$_FILES['image4']['name'];
		$image5=$_FILES['image5']['name'];
		
		$old_image1=$_POST['old_image1'];
		$old_image2=$_POST['old_image2'];
		$old_image3=$_POST['old_image3'];
		$old_image3=$_POST['old_image3'];
		$old_image5=$_POST['old_image5'];
		
		

		if($main_logo=='')
			{
			$main_logo_n=$old_image;
			}	else{
		$rand=rand(444,5555555555555555555);
		$main_logo_n=$rand.'_'.$main_logo;
		move_uploaded_file($_FILES['main_logo']['tmp_name'],"../uploads/".$main_logo_n);
		   }
		   
		   
		 if($image1=='')
			{
			$image1_n=$old_image1;
			}	else{
		$rand=rand(444,5555555555555555555);
		$image1_n=$rand.'_'.$image1;
		move_uploaded_file($_FILES['image1']['tmp_name'],"../uploads/".$image1_n);
		   } 
		   if($image2=='')
			{
			$image2_n=$old_image2;
			}	else{
		$rand=rand(444,5555555555555555555);
		$image2_n=$rand.'_'.$image1;
		move_uploaded_file($_FILES['image2']['tmp_name'],"../uploads/".$image2_n);
		   } 
		   if($image3=='')
			{
			$image3_n=$old_image3;
			}	else{
		$rand=rand(444,5555555555555555555);
		$image3_n=$rand.'_'.$image1;
		move_uploaded_file($_FILES['image3']['tmp_name'],"../uploads/".$image3_n);
		   } 
		   if($image4=='')
			{
			$image4_n=$old_image4;
			}	else{
		$rand=rand(444,5555555555555555555);
		$image4_n=$rand.'_'.$image1;
		move_uploaded_file($_FILES['image4']['tmp_name'],"../uploads/".$image4_n);
		   } 
		   if($image5=='')
			{
			$image5_n=$old_image5;
			}	else{
		$rand=rand(444,5555555555555555555);
		$image5_n=$rand.'_'.$image1;
		move_uploaded_file($_FILES['image5']['tmp_name'],"../uploads/".$image5_n);
		   } 
		   
		   
		   
		   
		$coupan_code=$_POST['coupan_code'];
		$discount=$_POST['discount'];
		$date=date('d-m-Y');		
		$stmt = $conn->prepare("update domains set domain_name=:a, domain_status=:b, price=:c, tags=:d, what_you_offer=:e, idea=:f,
        description=:g, logo=:h, image1=:i, image2=:j, image3=:k, image4=:l, image5=:m,coupan_code=:n,value=:o, listing_payment=:p,approved_on=:q, featured=:x where id=:r ");
		$success=$stmt->execute(array(
		':a'=>$domain_name ,':b'=>'approved' ,':c'=>$price ,':d'=>$tags ,':e'=>$what_you_offer ,
		':f'=>$idea ,':g'=>$description ,':h'=>$main_logo_n ,':i'=>$image1_n ,':j'=>$image2_n ,
		':k'=>$image3_n ,':l'=>$image4_n ,':m'=>$image5_n ,':n'=>$coupan_code ,':o'=>$discount ,
		':p'=>'0' ,':q'=>$date ,':x'=>$feature,
		':r' => $id));
		if($success){
			echo"<script>alert('Domain details Updated')</script>";
			echo"<script>location.href='approve_domain.php?domain=$id'</script>";
		}
}
?>