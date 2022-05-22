<?php
if(isset($_POST['save_miss'])){
  $sub_id=$_POST['sub_id'];
  $miss_hours=$_POST['miss_hours'];
  $reason=$_POST['reason'];
  $user=$_SESSION['fname'];
if(!empty($_POST['s_id'])){
    foreach($_POST['s_id'] as $s_id)
    {
      $insert=mysqli_query($con,"insert into tb_miss value('','$s_id','$sub_id','$time','$miss_hours','$reason','$user','$time')");
      if($insert){
    echo "<script>alert('ບັນທຶກໝາຍຂາດສໍໍຳເລັດ');location='up_room.php';</script>";
      }
      else{
        echo "<script>alert('ບັນທຶກໝາຍຂາດບໍ່ສຳເລັດ');location='up_room.php';</script>";
      }
    }
  }
  else{
    echo "error";
  }
}