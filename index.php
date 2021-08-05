<?php
include('config/config.php');
include('header.php'); 
if(isset($_GET['action']) AND $_GET['action']=='delete')
{
	$id=base64_decode($_GET['stu_no']);
	$array=array(
				"STUDENT_NO"=>$id
				);
	$delete=$STUD->delete("STUDENT",$array);
	if($delete){
		echo "<script>alert('Successfully Deleted!')</script>";
		echo "<script>window.location.href='.'</script>";
	}else{
		echo "<script>alert('Failed to Delete, Try Again!')</script>";
		echo "<script>window.location.href='.'</script>";
	}
}
?>
<div class="container">
  <h3>List of Students <a href="add.php" class="btn btn-info pull-right" role="button">Add Student</a></h3>
  <table class="table table-bordered">
    <thead>
      <tr>
      	<th>Sr.no</th>
        <th>Student No</th>
        <th>Student Name</th>
        <th>DOB</th>
        <th>DOJ</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php $data=$STUD->select("STUDENT");
    	$i=1;
		while ($row = $data->fetch_assoc()) {
			// 
		?>
      <tr>
      	<td><?=$i++;?></td>
        <td><?= $row['STUDENT_NO'];?></td>
        <td><?= $row['STUDENT_NAME'];?></td>
        <td><?= $row['STUDENT_DOB'];?></td>
        <td><?= $row['STUDENT_DOJ'];?></td>
        <td><a href="edit.php?stu_no=<?=base64_encode($row['STUDENT_NO']);?>" class="btn btn-primary btn-xs">Edit</a> <a href="?action=delete&stu_no=<?=base64_encode($row['STUDENT_NO']);?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs">Delete</a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
</div>


<?php include('footer.php'); ?>