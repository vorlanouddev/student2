
    <?php
        include 'mysql.php';
        $s_id=$_POST['s_id'];
        $students=mysqli_query($con,"select*from student where s_id='$s_id'");
        $std=mysqli_fetch_array($students);
     ?>
    <form action="" method="POST">
        
        <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
        <label for="">ຊື່ນັກຮຽນ</label>
        <select name="s_id" id="" class="form-control">
            <option value="<?php echo $std['s_id'] ?>"><?php echo $std['s_fname'].' '.$std['s_lname'] ?></option>
            <?php 
                include 'mysql.php';
                $sub=mysqli_query($con,"select*from student");
                while($su=mysqli_fetch_array($sub)){
                    echo "<option value='$su[0]'>$su[2] $su[3] $su[4]</option>";
                }
             ?>
        </select>
        <label for="">ສະຖານະ</label>
        <select name="s_status" id="" class="form-control">
        <option value="<?php echo $std['s_status'] ?>"><?php echo $std['s_status'] ?></option>
           <option value="ເຂົ້າ">ເຂົ້າ</option>
           <option value="ຍ້າຍ">ຍ້າຍ</option>
        </select>
    </div>
    <div class="modal-footer">
        <button class="btn btn-red btn-sm" name="recy"> ບັນທຶກ</button>
        <a data-dismiss="modal" class="btn btn-default btn-sm" href="#"> ຍົກເລີກ</a>
    </div>
</form>
<?php 
    if(isset($_POST['$recy'])){
        $s_id=$_POST['s_id'];
        $s_status=$_POST['s_status'];
        $updatenew=mysqli_query($con,"update student set s_status='$s_status' where s_id='$s_id'");
        if($updatenew){
            echo "<script>location='recycle.php'></script>";
        }else{
            echo "<script>location='recycle.php'></script>";
        }

    }
 ?>