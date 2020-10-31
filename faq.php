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
                        <h2>Frequently asked questions</h2>
                    </div>
                </div>
               
                <hr>
                
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
						<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Question</th>
                                    <th>Answers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
$sth = $conn->prepare("SELECT * from faq order by id ASC");
$sth->execute();
/* Fetch all of rows in the result set */
$result = $sth->fetchAll();
  /* FetchAll foreach with edit and delete using Ajax */
  if($sth->rowCount()):
  $i=1;
  
   foreach($result as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['question']; ?></td>
                                    <td><?php echo $row['answers']; ?></td>
                                   
									<td><a   class='editbtn' href= "update_faq.php?f_id=<?php echo $row['id']; ?>">Edit</a>&nbsp;|&nbsp;<a class='delbtn'  href="delete_faq.php?f_id=<?php echo $row['id']; ?>">Delete</a></td>
                                </tr>
								
							<?php $i++; }  ?>
  <?php endif;  ?>	
                                
                            </tbody>
                        </table>
						<h5>Add new FAQ</h5>
						
						<form id="form" name="form" action="add_faq.php" method="post">
				<input type="hidden" id ='prod_id'  style="width:100%; " />
							<div class="input-group">
							  <input type="text" class="form-control" id="product_name" placeholder="Quation" name="Quation"/>
							</div>
							
							<div class="input-group">
							 <textarea  id="froala-editor" name="answers" placeholder="answers"> </textarea>
							</div>
							<div class="input-group">
							  
							  <input type='submit' name='saverecords'  value ='Add Records' />
							</div>
				</form>
						
						

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