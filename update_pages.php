<?php include('inc/header.php');
$title=$_GET['page_id'];
if(isset($_POST['saverecords'])){
$ti=$_POST['page_title'];
$co=$_POST['page_content'];
$stmt = $conn->prepare("UPDATE pages set  title = :a , content = :b where id = :x");
    $stmt->bindParam(':a', $ti);
    $stmt->bindParam(':b', $co);
    $stmt->bindParam(':x', $title);
$stmt->execute();
}

 ?>




 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<style>
form#form .input-group {
    width: 100%;
	padding: 14px;
}

.fr-element.fr-view  {
        height: 200px;
}


</style>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
						
                          
<?php 
$title=$_GET['page_id'];
$stmt1 = $conn->prepare("SELECT * FROM pages WHERE id=:x ");
$stmt1->execute(array(':x' => $title));
$result = $stmt1->fetchAll();
foreach($result as $rowg){
?>						
						<form id="form" name="form" action="#" method="post">
				<input type="hidden" id ='prod_id'  style="width:100%; " />
							<div class="input-group">
							  <input type="text" class="form-control" id="product_name" value="<?php echo $rowg['title']?>" name="page_title"/>
							</div>
							
							<div class="input-group">
							 <textarea  id="froala-editor" name="page_content"> <?php echo $rowg['content']?> </textarea>
							</div>
							<div class="input-group">
							  
							  <input type='submit' name='saverecords'  value ='Save' />
							</div>
				</form>
	<?php } ?>					
						

                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr>


              

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
		 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script>
$(function() {
  $('textarea#froala-editor').froalaEditor()
});
</script>
		 
		 
        
<?php //include('inc/footer.php'); ?>
