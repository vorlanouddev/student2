<?php
    include('mysql.php');
    $pro_id=$_POST['pro_id'];
    $sel=mysqli_query($con,"select * from district where pro_id='$pro_id'");
?>
<option value=''>ເລືອກເມືອງ......</option>
<?php
    while($dis=mysqli_fetch_array($sel)){
?>
<option value="<?php echo $dis['dis_id']?>"><?php echo $dis['dis_name']?></option>
<?php
    }
?>