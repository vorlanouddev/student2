
<div class="modal-body">
    <form action="" method="POST">
        <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
        <h2>ຟອມບັນທຶກການເລື່ອນຫ້ອງ</h2>
        <hr>
        <label for="">ຊື່ຫ້ອງ</label>
        <select name="s_id" id="" class="form-control">
            <option value="">ເລືອກຫ້ອງ</option>
            <?php 
                include 'mysql.php';
                $sub=mysqli_query($con,"select*from class_room");
                while($su=mysqli_fetch_array($sub)){
                    echo "<option value='$su[0]'>$su[2]</option>";
                }
             ?>
        </select>
        <label for="">ຫຼ້ນ</label>
        <input type="text" name="" class="form-control">
        <label for="">ພາກຮຽນ I</label>
        <input type="text" name="" class="form-control">
        <label for="">ພາກຮຽນ II</label>
        <input type="text" name="" class="form-control">
    </div>
    <hr>
    <button type="submit" class="btn btn-red btn-sm"><i class="fa fa-check"></i> ບັນທຶກ</button>
    <button type="reset" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-check"></i> ບັນທຶກ</button>
</form>
</div>
</div>