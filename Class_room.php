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
                                    <i class="fa fa-plus-circle"></i> ຟອມບັນທຶກຫ້ອງຮຽນ
                                </a>
                            </div><br>
                            <form action="" method="POST">
                               <label>ຊື່ຄູ-ອາຈານ</label>
                               <select name="teach_id" id="" class="form-control" required>
                                <option value="">ເລືອກຊື່ຄູ-ອາຈານ</option>
                                <?php 
                                include 'mysql.php';
                                $echo=mysqli_query($con,"select*from teacher");
                                while($tch=mysqli_fetch_array($echo)){
                                    echo "<option value='$tch[0]'>$tch[1]</option>";
                                }
                                ?>
                                
                            </select>
                            <label>ຊື່ຫ້ອງ</label>
                            <input type="text" name="class_name" class="form-control" required>
                            <label>ໝາຍເຫດ</label>
                            <input type="text" name="class_remark" class="form-control">
                            <hr>
                            <button type="submit" name="save" class="btn btn-red btn-sm"><i class="fa fa-check"></i> ບັນທຶກ</button>
                        </div>
                    </form>
                </div>
                <?php 
                include 'mysql.php';
                if(isset($_POST['save'])){
                    @session_start();
                    $teach_id=$_POST['teach_id'];
                    $class_name=$_POST['class_name'];
                    $class_remark=$_POST['class_remark'];
                    $user=$_SESSION['fname'];
                    $sql=mysqli_query($con,"INSERT INTO CLASS_ROOM VALUE('','$teach_id','$class_name','$class_remark','$user','$time')");
                    if($sql){
                        echo "<script>alert('ບັນທຶກສຳເລັດ');location='class_room.php';</script>";
                    }else{
                        echo "<script>alert('ບັນທຶກບໍ່ສຳເລັດ');location='class_room.php';</script>";

                    }
                }
                ?>
            </div>
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                <div class="hpanel email-compose mailbox-view mg-b-15">
                    <div class="panel-body">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px!important">ລຳດັບ</th>
                                    <th>ຊື່ຫ້ອງ</th>
                                    <th>ຄູປະຈຳຫ້ອງ</th>
                                    <th>ໝາຍເຫດ</th>
                                    <th style="width: 50px!important">ແກ້ໄຂ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $mysql=mysqli_query($con,"select*from view_room");
                                $i=1;
                                while($res=mysqli_fetch_array($mysql)){
                                   ?>
                                   <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $res['class_name'] ?></td>
                                    <td><?php echo $res['teach_fname'].' '.$res['teach_lname'] ?></td>
                                    <td><?php echo $res['class_remark'] ?></td>
                                    <td style="width: 50px!important">
                                      <div class="btn-group">
                                        <a href="edit_class.php?edit=<?php echo $res['class_id']?>" class="btn btn-default btn-xs" name="edit"><i class="fa fa-edit"></i></a>
                                        <a href="?del=<?php echo $res['class_id']?>" class="btn btn-default btn-xs" name="del" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
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
</div>
<?php include 'pugin_js.php' ?>
</body>
</html>