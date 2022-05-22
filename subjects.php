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
</head>

<body>
    <?php include 'menu.php' ?>
    <div class="mailbox-view-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="hpanel responsive-mg-b-30">
                        <div class="panel-body">
                            <h3 class="panel-title"> ຟອມບັນທຶກວິຊາຮຽນຮຽນ</h3>
                            <hr>
                            <form action="" method="POST">
                                <label>ຊື່ວິຊາຮຽນ</label>
                                <input type="text" name="sub_name" class="form-control" required>
                                <label>ໝາຍເຫດ</label>
                                <input type="text" name="sub_remark" class="form-control">
                                <hr>
                                <button type="submit" name="save" class="btn btn-red btn-sm"> ບັນທຶກ</button>
                            </div>
                        </form>
                    </div>
                    <?php 
                    if(isset($_POST['save'])){
                        $sub_name=$_POST['sub_name'];
                        $sub_remark=$_POST['sub_remark'];
                        $user=$_SESSION['fname'];
                        $sql=mysqli_query($con,"INSERT INTO SUBJECT VALUES ('','$sub_name','$sub_remark','$user')");
                        if($sql){
                            echo"<script>alert('ບັນທືກຂໍ້ມູນສຳເລັດ');location='subjects.php'</script>";
                        }
                        else{
                            echo"<script>alert('ບັນທືກບໍ່ສຳເລັດ');lacation='subjects.php'</script>";
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
                                        <th>ໝາຍເຫດ</th> 
                                        <th width="120px">ແກ້ໄຂ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $sql=mysqli_query($con,"select*from view_sub");
                                    $i=1;
                                    while($res=mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $res['sub_name'] ?></td>
                                            <td><?php echo $res['sub_remark'] ?></td>
                                            <td>

                                              <div class="btn-group">
                                                <a href="edit_sub.php?sub_id=<?php echo $res['sub_id']?>" class="btn btn-default btn-xs" name="edit"><i class="fa fa-edit"></i></a>
                                                <a href="?del=<?php echo $res['sub_id']?>" class="btn btn-default btn-xs" name="del" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <?php 
                                        if(isset($_GET['del'])){
                                            $del=$_GET['del'];
                                            $delete=mysqli_query($con,"delete from subject where sub_id='$del'");
                                            if($delete){
                                                echo "<script> 
                                                alert('ລົບສຳເລັດ');location='subjects.php';
                                                </script>
                                                "; 
                                            }
                                            else{
                                                echo "<script> 
                                                alert('ບໍ່ສາມາດລົບໄດ້');location='subjects.php';
                                                </script>
                                                "; 
                                            }
                                        }
                                        ?>
                                    </tr>
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
<?php include 'pugin_js.php' ?>

</body>

</html>
<?php 
}
?>