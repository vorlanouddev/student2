<?php
include('mysql.php');
$miss_id=$_GET['miss_id'];
$class_id=$_GET['class_id'];


$delete=mysqli_query($con,"delete from tb_miss where miss_id='$miss_id'");
if($delete){

	echo "<script>alert('ລຶບຂໍ້ມູນສຳເລັດ');location='view_miss.php?class_id=$class_id';</script>";
	

}
else{
	
	echo "<script>alert('ລຶບຂໍ້ມູນບໍ່ສຳເລັດ');location='view_miss.php?class_id=$class_id';</script>";

}


?>
