<?php 
		include 'mysql.php';
		session_start();
            $s_id=$_GET['s_id'];
             $s_num=$_GET['s_num'];
              $s_gender=$_GET['s_gender'];
             $s_fname=$_GET['s_fname'];
             $s_lname=$_GET['s_lname'];
             $s_dob=$_GET['s_dob'];
             $vill_name=$_GET['vill_name'];
             $dis_name=$_GET['dis_name'];
             $pro_name=$_GET['pro_name'];
             $s_tel=$_GET['s_tel'];
             $national=$_GET['national'];
             $trib=$_GET['trib'];
             $plash=$_GET['plash'];
             $class_id=$_GET['class_id'];
            $part=$_GET['part'];
             $s_status=$_GET['s_status'];
             $s_remark=$_GET['s_remark'];
             $user=$_SESSION['fname'];
             $gener=$_GET['gener'];

            $insert_std=mysqli_query($con,"insert into student  values('$s_id','$s_num','$s_gender','$s_fname','$s_lname','$s_dob','$vill_name','$dis_name',
              '$pro_name', '$s_tel', '$national', '$trib','$plash','$s_status', '$s_remark',
               '$user','$time')");
                if($insert_std){
                  $insert_up=mysqli_query($con,"insert into up_room values('','$s_id','$class_id','$gener','$part','','$user','$time')");
                  if($insert_up){
                  echo "
                  <script>
                      alert('ບັນທືກສຳເລັດ');
                      location='add_father.php?s_id=$s_id && class_id=$class_id';
                  </script>
                  ";
                }
                 else{ echo 'error room';
                  //  echo "
                  // <script>
                  //     alert('insert up_roomm error');
                  //     location='add_students.php?class_id=$class_id';
                  // </script>
                  // "; 
                 } 
                }
                else{
                echo 'error save';
                  // echo "
                  // <script>
                  //     alert('ບໍ່ສາມາດບັນທຶກໄດ້');
                  //     location='add_students.php?class_id=$class_id';
                  // </script>
                  // "; 
                }
 ?>