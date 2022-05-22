<?php
    include 'mysql.php';
    $gen=$_POST['gener'];
    // $sel_up=mysqli_query($con,"select max(gener)from up_room");
    // $up=mysqli_fetch_array($sel_up);
    echo $gen+1;
?>