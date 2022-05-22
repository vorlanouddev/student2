<?php
	include 'mysql.php';
session_start();
 $miss_id=$_POST['miss_id'];
 $class_id=$_POST['class_id'];
 $sub_id=$_POST['sub_id'];
  $hours=$_POST['hours'];
  $reason=$_POST['reason'];
  
  $user=$_SESSION['fname'];

      $update=mysqli_query($con,"update tb_miss set sub_id='$sub_id',miss_hours='$hours',miss_reason='$reason',user='$user',time='$time' where miss_id='$miss_id'");
      if($update){
		
   echo "<script>alert('ແກ້ໄຂສຳເລັດ');location='view_miss.php?class_id=$class_id';</script>";
      }
      else{
echo "<script>alert('ບໍ່ສາມາດແກ້ໄຂໄດ້');location='view_miss.php?class_id=$class_id';</script>";
      }
    

?>
