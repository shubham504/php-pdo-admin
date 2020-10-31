<?php include('inc/header.php'); ?>
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
                        <h2>How it work</h2>
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
						<?php 
$var='1';
$stmt = $conn->prepare("SELECT * FROM how_it_work WHERE id = :filmID");
$stmt->bindParam(':filmID', $var, PDO::PARAM_INT); 
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
						
				?>		
				<form id="form" name="form" action="add_how_it_work.php" method="post" enctype="multipart/form-data">
					
							<div class="input-group">
							  <input type="text" class="form-control" id="product_name" value="<?php echo $row['title'];?>" placeholder="Page Title" name="page_title"/>
							</div>
							
							
							
							<div class="input-group">
							 <textarea  id="froala-editor" name="page_content" placeholder="page_content"><?php echo $row['content'];?> </textarea>
							</div>
							
							
							
							
							<div class="input-group">
							  
							  <input type="submit" name="submit" class="btn btn-danger btn-lg btn-block" value="Update">
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
