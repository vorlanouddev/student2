<?php
	$con=mysqli_connect('localhost','root','','students')or die('can not connection database');
	mysqli_query($con,"SET NAMES UTF8");

	date_default_timezone_set("Asia/bangkok");
    $time=date("Y-m-d H:i:s");
    $month=date("M");
    $Month=date("Month");
    $month1=date("m");
    $nextyear=date("Y")+1;
    $curyear=date("Y");
    $lastyear=date("Y")-1;
    $r_part=$curyear.'-'.$nextyear;
?>
