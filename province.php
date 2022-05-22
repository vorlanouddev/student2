<?php
include('mysql.php');

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
<?php include 'pugin_css.php' ?>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Students Management</title>
<meta name="description" content="">
<!-- <meta http-equiv="refresh" content="2"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<?php include 'menu.php' ?>
<?php include 'mysql.php' ?>
<div class="mailbox-view-area mg-tb-15">
<div class="container-fluid">
<div class="row">
    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
        <div class="hpanel responsive-mg-b-30">
            <div class="panel-body">
                <div class="dropdown custonfile">
                    <a class="dropdown-toggle btn btn-primary btn-block" href="Address.php" data-toggle="dropdown">
                        ຂໍ້ມູນອ້າງອີງ
                    </a>
                </div>
                <ul class="mailbox-list">
                    <li>
                        <a href="province.php">
                            <i class="fa fa-clone"></i> ຂໍ້ມູນແຂວງ
                        </a>
                    </li>
                    <li>
                        <a href="district_data.php"><i class="fa fa-clone"></i> ຂໍ້ມູນເມືອງ</a>
                    </li>
                    <li>
                        <a href="vill_data.php"><i class="fa fa-clone"></i> ຂໍ້ມູນບ້ານ</a>
                    </li>
                </ul>
            </div>
            </div>
            </div>
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                <div class="hpanel email-compose mailbox-view mg-b-15">
                    <div class="border-top border-left border-right bg-light">
                    </div>
                    <div class="panel-heading red">
                        <h3 class="panel-title"> ຟອມບັນທຶກແຂວງ </h3>
                    </div>
                    <div class="panel-body panel-csm">
                        <div>
                           
                            <form action="" method="POST" role="form">                                    
                                <div class="form-group">
                                    <label for="">ຊື່ແຂວງ</label>
                                    <input type="text" name="pro_name" class="form-control" id="" placeholder="ກະລຸນາປ້ອນຊື່ແຂວງ" required>
                                </div>                                    
                                <button type="submit" name="save" class="btn btn-red btn-sm"><i class="fa fa-save"> </i> ບັນທຶກ</button>
                            </form>
                        </div>
                    </div>

                    <div class="border-bottom border-left border-right bg-white mg-tb-15">
                       <div class="row">
                        <?php 
                            include 'mysql.php';
                            $select=mysqli_query($con,"select*from province");
                         ?>
                         <div class="panel-body panel-csm text-right">
                        <input type="text" class="form-control" id="search" style="width: 300px;float: left" placeholder="ຄົ້ນຫາ....">
                        </div>
                            <div class="panel-body panel-csm">
                                <div class="table table-responsive">
                                <table class="table" id="data">
                                    <thead>
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ລະຫັດ</th>
                                            <th>ຊື່ແຂວງ</th>
                                            <th width="100px">ແກ້ໄຂ</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i=1; while($res=mysqli_fetch_array($select)){ ?>
                                        <tr  id="body">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $res['pro_id'] ?></td>
                                            <td><?php echo $res['pro_name'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="edit_province.php?edit=<?php echo $res['pro_id']?>" class="btn btn-default btn-xs" name="edit"><i class="fa fa-edit"></i></a>
                                                <a href="?del=<?php echo $res['pro_id']?>" class="btn btn-default btn-xs" name="del" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                        if(isset($_GET['del'])){
                                        $pro_id=$_GET['del'];
                                        $del=mysqli_query($con,"DELETE FROM province where pro_id='$pro_id'");
                                         if($del){
                                        echo "<script>alert('ລຶບຂໍ້ມູນສຳເລັດ');location='province.php';</script>";
                                        }else{
                                        echo "<script>alert('ລຶບຂໍ້ມູນບໍ່ສຳເລັດ');location='province.php';</script>";

                                        }   
                                        }
                                        ?>
                                        <?php $i++;} ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </form>
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
<?php
}
?>
<?php 
include 'mysql.php';
if(isset($_POST['save'])){
$pro_name=$_POST['pro_name'];
$sql=mysqli_query($con,"insert into province(pro_name)values('$pro_name')");
if($sql){
echo "<script>alert('ບັນທຶກສຳເລັດ');location='province.php';</script>";
}else{
echo "<script>alert('ບັນທຶກບໍ່ສຳເລັດ');location='province.php';</script>";

}
}
?>
