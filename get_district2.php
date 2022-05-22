<?php
    include('mysql.php');
    $pro_name=$_POST['pro_name'];
    $sel=mysqli_query($con,"select d.dis_name from district as d,province as p where d.pro_id=p.pro_id and p.pro_name='$pro_name'");
?>
<option value=''>ເລືອກເມືອງ......</option>
<?php
    while($dis=mysqli_fetch_array($sel)){
?>
<option value="<?php echo $dis['dis_name']?>"><?php echo $dis['dis_name']?></option>
<?php
    }
?>
