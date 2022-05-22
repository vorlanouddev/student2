<?php
    include('mysql.php');
    $dis_name=$_POST['dis_name'];
    $sel=mysqli_query($con,"select * from view_address where dis_name='$dis_name'");
?>
<option value=''>ເລືອກບ້ານ......</option>
<?php
    while($vill=mysqli_fetch_array($sel)){
?>
<option value="<?php echo $vill['vill_name']?>"><?php echo $vill['vill_name']?></option>
<?php
    }
?>
