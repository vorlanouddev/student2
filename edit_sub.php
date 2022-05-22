<?php
include('mysql.php');
error_reporting(~E_NOTICE);

session_start();
if($_SESSION['authuser']!=1){
    header('location:Login.php');
}
else{
    ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Students Management</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
      ============================================ -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
      <?php include 'pugin_css.php' ?>
      <style>
      .form-control{margin-bottom: 2%!important}
  </style>
</head>
<?php 
    include 'mysql.php';
    $edit=$_GET['edit'];
    $sql=mysqli_query($con,"select*from view_sub where sub_id='$edit'");
    $edt=mysqli_fetch_array($sql);
 ?>
<body>
    <?php include 'menu.php' ?>
    <div class="mailbox-view-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="hpanel responsive-mg-b-30">
                        <div class="panel-body">
                            <div class="dropdown custonfile">
                                <a class="dropdown-toggle btn btn-primary btn-block">
                                    <i class="fa fa-th"></i> ຟອມແກ້ໄຂວິຊາ
                                </a>
                            </div><br>
                            <form action="" method="POST">
                                <?php 
                                    $sub_id1=$_REQUEST['sub_id'];
                                    $sel_up=mysqli_query($con,"select*from view_sub where sub_id='$sub_id1'");
                                    $sub=mysqli_fetch_array($sel_up);
                                 ?>

                            <input type="hidden" name="sub_id" value="<?=$sub['sub_id'] ?>">
                             <label>ຊື່ຄູ-ອາຈານ</label>
                                <select name="teach_id" id="" class="form-control">
                                    <option value="<?=$sub['teach_id'] ?>"><?=$sub['teach_fname']?></option>
                                    <?php 
                                        include 'mysql.php';
                                        $echo=mysqli_query($con,"select*from teacher");
                                        while($tch=mysqli_fetch_array($echo)){
                                            echo "<option value='$tch[0]'>$tch[1]</option>";
                                        }
                                     ?>
                                    
                                </select>
                             <label>ຊື່ວິຊາ</label>
                             <input type="text" name="sub_name" class="form-control" value="<?php echo $sub['sub_name'] ?>" required>
                             <label>ໝາຍເຫດ</label>
                             <input type="text" name="sub_remark" class="form-control" value="<?php echo $sub['sub_remark'] ?>" >
                             <hr>
                             <button type="submit" name="update" class="btn btn-red btn-sm"><i class="fa fa-check"></i> ແກ້ໄຂ</button>
                         </div>
                     </form>
                 </div>
                 <?php 
               
                 if(isset($_POST['update'])){
                    $sub_id=$_POST['sub_id'];
                    $teach_id=$_POST['teach_id'];
                    $sub_name=$_POST['sub_name'];
                    $sub_remark=$_POST['sub_remark'];
                    $user=$_SESSION['fname'];
                    $update=mysqli_query($con,"UPDATE SUBJECT SET teach_id='$teach_id',sub_name='$sub_name',sub_remark='$sub_remark',user='$user' where sub_id='$sub_id'");
                    if($update){
                        echo "<script>alert('ແກ້ໄຂສຳເລັດ');location='subjects.php';</script>";
                    }else{
                        echo "<script>alert('ແກ້ໄຂບໍ່ສຳເລັດ');location='subjects.php';</script>";

                    }
                }
                ?>
            </div>
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                <div class="hpanel email-compose mailbox-view mg-b-15">
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ລຳດັບ</th>
                                    <th>ຊື່ວິຊາ</th>
                                    <th>ຄູປະຈຳຫ້ອງ</th>
                                    <th>ໝາຍເຫດ</th>
                                    <th width="120px">ແກ້ໄຂ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $mysql=mysqli_query($con,"select*from view_sub");
                                    $i=1;
                                    while($res=mysqli_fetch_array($mysql)){
                                 ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $res['sub_name'] ?></td>
                                    <td><?php echo $res['teach_fname'].' '.$res['teach_lname'] ?></td>
                                    <td><?php echo $res['sub_remark'] ?></td>
                                    <td>
                                      <div class="btn-group">
                                        <a href="edit_sub.php?edit=<?php echo $res['sub_id']?>" class="btn btn-default btn-xs" name="edit"><i class="fa fa-edit"></i></a>
                                        <a href="?del=<?php echo $res['sub_id']?>" class="btn btn-default btn-xs" name="del" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                if(isset($_GET['del'])){
                                $class_id=$_GET['del'];
                                $del=mysqli_query($con,"DELETE FROM class_room where class_id='$class_id'");
                                 if($del){
                                echo "<script>alert('ລຶບຂໍ້ມູນສຳເລັດ');location='class_room.php';</script>";
                                }else{
                                echo "<script>alert('ລຶບຂໍ້ມູນບໍ່ສຳເລັດ');location='class_room.php';</script>";

                                }   
                                }
                                ?>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <div id="addlv" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <form action="" method="POST">
            <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
            <h2>ຟອມບັນທຶກສົກຮຽນ</h2>
            <hr>
            <label for=""></label>
            <input type="text" name="" class="form-control">
            <label for=""></label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="modal-footer">
            <button class="btn btn-red btn-sm"> ບັນທຶກ</button>
            <a data-dismiss="modal" class="btn btn-default btn-sm" href="#"> ຍົກເລີກ</a>
        </div>
    </form>
    </div>
</div> -->
</div>
<?php include 'pugin_js.php' ?>
</body>

</html>
<?php
    }
 ?>