
<?php
	include('mysql.php');
	session_start();
	$user=$_POST['username'];
	$pass=$_POST['password'];

	$sel=mysqli_query($con,"select userid,gender,fname,lname,status from view_user where user='$user' and pass='$pass'");
	$count=mysqli_num_rows($sel);
	if($count=='1'){

	$row=mysqli_fetch_array($sel);
	if($row['status']=='admin'){
		$_SESSION['userid']=$row['userid'];
		$_SESSION['gender']=$row['gender'];
		$_SESSION['fname']=$row['fname'];
    $_SESSION['lname']=$row['lname'];

		$_SESSION['authuser']=1;
		header('location:index.php');
	}

        elseif($row['status']=='user'){
            $_SESSION['userid']=$row['userid'];
            $_SESSION['gender']=$row['gender'];
            $_SESSION['fname']=$row['fname'];
        $_SESSION['lname']=$row['lname'];

      		$_SESSION['authuser']=1;
      		header('location:index.php');
	}


	else{
    echo "
    <script>
        alert('ທ່ານຖືກຍົກເລິກສິດແລ້ວ');
        location='login.php';
  </script>
    ";
	}
}
else{
  echo "
   <script>
  alert('ຊື່ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');
  location='login.php';
 </script>  ";
}

 ?>
