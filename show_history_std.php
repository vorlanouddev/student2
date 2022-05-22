<?php
	include "mysql.php";
	
	$gener=$_POST['gener'];
	$sel=mysqli_query($con,"select part from up_room where gener='$gener' group by part");
?>
<option value="">ເລືອກສົກຮຽນ.....</option>
<?php
	while($part=mysqli_fetch_array($sel)){
		echo "<option value='$part[0]'>$part[0]</option>";
	}
	
?>
