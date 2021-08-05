<?php
include('config/config.php');
include('header.php'); 
if(isset($_GET['stu_no']))
{
	$id=base64_decode($_GET['stu_no']);
	$where=array("STUDENT_NO"=>$id);
	$data=$STUD->select("STUDENT",$where);
	$row = $data->fetch_assoc();
}
else{
	echo "<script>window.location.href='.'</script>";
}
if(isset($_POST['update']))
{
	$array=array(
				"STUDENT_NAME"=>$_POST['STUDENT_NAME'],
				"STUDENT_DOB"=>$_POST['STUDENT_DOB'],
				"STUDENT_DOJ"=>$_POST['STUDENT_DOJ']
				);
	$where=array("STUDENT_NO"=>$id);
	$update=$STUD->update("STUDENT",$array,$where);
	if($update){
		echo "<script>alert('Student Successfully Updated!')</script>";
		echo "<script>window.location.href='.'</script>";
	}else{
		$error="Failed to update, Try Again!";
	}
}
?>
<div class="container">
	
  	<div class="row">
  		<div class="col-md-6 col-md-offset-3 border">
  			<h2>Edit Student <a href="." class="btn btn-info pull-right" role="button">Back</a></h2>
  			<?php if(isset($error)){ ?>
  				<div class="alert alert-danger alert-dismissible">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Failed!</strong> <?=$error;?>
				</div>
  			<?php } ?>
  			<form method="POST">
			    <div class="form-group">
			      <label for="STUDENT_NAME">STUDENT NAME:</label>
			      <input type="text" class="form-control" id="STUDENT_NAME" placeholder="ENTER STUDENT NAME" name="STUDENT_NAME" value="<?=$row['STUDENT_NAME']?>">
			    </div>
			    <div class="form-group">
			    	<label for="STUDENT_DOB">STUDENT DOB:</label>
			      <div class='input-group date' id='datetimepicker1'>      
				      <input type="text" class="form-control" id="STUDENT_DOB" placeholder="ENTER STUDENT DOB" name="STUDENT_DOB" value="<?=$row['STUDENT_DOB']?>">
		               <span class="input-group-addon">
		               <span class="glyphicon glyphicon-calendar"></span>
		               </span>
		            </div>
			    </div>

			    <div class="form-group">
			      <label for="STUDENT_DOJ">STUDENT DOJ:</label>
			      <div class='input-group date' id='datetimepicker1'>      
				      <input type="text" class="form-control" id="STUDENT_DOJ" placeholder="ENTER STUDENT DOJ" name="STUDENT_DOJ" value="<?=$row['STUDENT_DOJ']?>">
		               <span class="input-group-addon">
		               <span class="glyphicon glyphicon-calendar"></span>
		               </span>
		            </div>
			    </div>
			    <button type="submit" name="update" class="btn btn-info">Update</button>
			  </form>
  		</div>
  	</div>
</div>
<?php include('footer.php'); ?>
