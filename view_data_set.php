
<?php include 'pugin_css.php'; ?>
<?php include 'menu.php'; ?>
<style>
    hr{
        margin-top: -2px;
    }
    .input{
        border:hidden;
        border:1px solid white!important;
        background-color: white;
        width: 100%;
        margin-bottom: 1%;
    }
</style>
<div class="review-tab-pro-inner">
    <ul id="myTab3" class="tab-review-design">
        <li class="active"><a href="#student"><i class="fa fa-user" aria-hidden="true"></i> ຂໍ້ມູນນັກຮຽນ</a></li>
        <li><a href="#father"><i class="fa fa-angle-double-right" aria-hidden="true"></i> ຂໍ້ມູນພໍ່</a></li>
        <li><a href="#mother"><i class="fa fa-angle-double-right" aria-hidden="true"></i> ຂໍ້ມູນແມ່</a></li>

    </ul>
    <?php 
        include 'mysql.php';
        @$s_id=$_REQUEST['s_id'];
        $sel_std=mysqli_query($con,"select*from view_student where s_id='$s_id'");
        $std=mysqli_fetch_array($sel_std);
     ?>
    <div id="myTabContent" class="tab-content custom-product-edit">
        <div class="product-tab-list tab-pane fade active in" id="student">
            <div class="row">
            <form action="" method="post">
               <div class="col-md-4" style="text-align: center">
                   <img src="img/user_null.png" alt="" width="150px" height="150px" class="img-circle">
                   <hr style="width:50%;margin-left: 25%;margin-top: 15px">
                   <b align="center">ເລກປະຈຳຕົວ</b>
                   <br>
                    <b><?php echo $std['s_num']; ?></b>
                   <hr>
                   <a href="edit_student.php?s_id=<?=$std['s_id']?>" class="btn btn-red btn-sm" title="ຄລິກເພື່ອແກ້ໄຂຂໍ້ມູນ"><i class="fa fa-edit"></i></a>
                   <a href="?delt=<?=$std['s_id']?>" class="btn btn-default btn-sm" title="ຄລິກເພື່ອລົບຂໍ້ມູນ"><i class="fa fa-remove"></i></a>
               </div>
               <?php  
                  if(isset($_GET['delt'])){
                    $delt=$_GET['delt'];
                    $emty=mysqli_query($con,"update student set s_status='ອອກ' where s_id='$delt'");
                    if($emty){
                      echo "<script>alert('ລຶບຂໍ້ມູນສຳເລັດ');location='students.php';</script>";
                    }else{
                      echo "<script>alert('ລຶບຂໍ້ມູນບໍ່ສຳເລັດ');location='students.php';</script>";
                    }
                  }
                ?>
               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                   <label for="">ຊື່ ແລະ ນາມສະກຸນ:</label>
                    <input type="text" class="input" name="s_fname" value="<?php  echo $std['s_gender'].' '.$std['s_fname'].' '.$std['s_lname'] ?>" style="background-color: white!important" required>
                   <hr>
               </div>
               <div class="col-md-4">
                   <label for="">ວັນເດືອນປີເກີດ:</label><br><?php echo $std['s_dob']; ?><hr>
                   <label for="">ບ້ານ:</label><br><?php echo $std['s_vill_name']; ?><hr>
                   <label for="">ເມືອງ:</label><br><?php echo $std['s_dis_name']; ?><hr>
                   <label for="">ແຂວງ:</label><br><?php echo $std['s_pro_name']; ?><hr>
                    <label for="">ເບີໂທ: </label><br><?php echo $std['s_tel']; ?><hr>
               </div>
               <div class="col-md-4">
                    <label for="">ສັນຊາດ: </label><br><?php echo $std['national']; ?><hr>
                    <label for="">ຊົ້ນເຜົ່າ: </label><br><?php echo $std['trib']; ?><hr>
                    <label for="">ສາສະໜາ: </label><br><?php echo $std['plash']; ?><hr>
                    <label for="">ສະຖານະ: </label><br><?php echo $std['s_status']; ?><hr>
                    <label for="">ໝາຍເຫດ: </label><br><?php echo $std['s_remark']; ?><hr>
               </div>
            </div>
        </div>
        <div class="product-tab-list tab-pane fade" id="father">
            <div class="row">
               <div class="col-md-4" style="text-align: center">
                   <img src="img/user_null.png" alt="" width="150px" height="150px" class="img-circle">
                   <hr style="width:50%;margin-left: 25%;margin-top: 15px">
                   <!-- <b align="center">ເລກປະຈຳຕົວ</b><hr> -->
                   <a href="edit_father.php?f_id=<?=$std['f_id']?>" title='ຄລິກເພື່ອແກ້ໄຂຂໍ້ມູນ' class="btn btn-red btn-sm"><i class="fa fa-edit"></i></a>
               </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                   <label for="">ຊື່ ແລະ ນາມສະກຸນ:</label><br><?php  echo 'ທ້າວ'.' '.$std['f_fname'].' '.$std['f_lname'] ?><hr>
               </div>
               <div class="col-md-4">
                   <label for="">ວັນເດືອນປີເກີດ:</label><br><?php echo $std['f_dob']; ?><hr>
                   <label for="">ບ້ານ:</label><br><?php echo $std['f_vill_name']; ?><hr>
                   <label for="">ເມືອງ:</label><br><?php echo $std['f_dis_name']; ?><hr>
                   <label for="">ແຂວງ:</label><br><?php echo $std['f_pro_name']; ?><hr>
               </div>
               <div class="col-md-4">
                    <label for="">ອາຊີບ</label><br><?php echo $std['f_job']; ?><hr>
                    <label for="">ເບີໂທ: </label><br><?php echo $std['f_tel']; ?><hr>
                    <label for="">ໝາຍເຫດ: </label><br><?php echo $std['f_remark']; ?><hr>
               </div>
            </div>
        </div>
        <div class="product-tab-list tab-pane fade" id="mother">
            <div class="row">
                <div class="col-md-4" style="text-align: center">
                   <img src="img/user_null.png" alt="" width="150px" height="150px" class="img-circle">
                   
                   <hr style="width:50%;margin-left: 25%;margin-top: 15px;">
                   <!-- <b align="center">ເລກປະຈຳຕົວ</b><hr> -->
                   <a href="edit_mother.php?m_id=<?=$std['m_id']?>" title='ຄລິກເພື່ອແກ້ໄຂຂໍ້ມູນ' class="btn btn-red btn-sm"><i class="fa fa-edit"></i></a>
               </div>

               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                   <label for="">ຊື່ ແລະ ນາມສະກຸນ:</label><br><?php  echo 'ນາງ'.' '.$std['m_fname'].' '.$std['m_lname']; ?><hr>
               </div>
               <div class="col-md-4">
                   <label for="">ວັນເດືອນປີເກີດ:</label><br><?php echo $std['m_dob']; ?><hr>
                   <label>ບ້ານ:</label><br><?php echo $std['m_vill_name']; ?><hr>
                   <label>ເມືອງ:</label><br><?php echo $std['m_dis_name']; ?><hr>
                   <label>ແຂວງ:</label><br><?php echo $std['m_pro_name']; ?><hr>
               </div>
               <div class="col-md-4">
                    <label>ອາຊີບ</label><br><?php echo $std['m_job']; ?><hr>
                    <label>ເບີໂທ: </label><br><?php echo $std['m_tel']; ?><hr>
                    <label>ໝາຍເຫດ: </label><br><?php echo $std['m_remark']; ?><hr>
               </div>
            </div>
        </div>

</form>
<div class="modal fade " id="show_data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-body" id="show_content">
                
            </div>
        </div>
    </div>
</div>

<!-- edit data -->
<div class="modal fade " id="show-edit-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
               <div class="modal-header">
                <button type="button" class="btn btn-sm btn-red view_st" st_id="<?php echo $std['s_id'];?>" >ຍ້ອນກັບ</button>
                <h4 class="modal-title">ແກ້ໄຂຂໍ້ມູນນັກຮຽນ</h4>
            </div>
            <div class="modal-body" id="edit-content">
                
            </div>
            
        </div>
    </div>
</div>
        <?php include 'Pugin_JS.php' ?>
        <script>
            $(function(){

            $('.view_st').click(function(){
            var st_id=$(this).attr('st_id');
            $.ajax({
                url:'view_student.php',
                type:'POST',
                data:{st_id:st_id},
                success:function(show){
                    $('#show_content').html(show);
                    $('#show_data').modal('show');

                }
            });
        });
});
        </script>

