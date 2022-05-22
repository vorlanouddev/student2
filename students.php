<?php
 include('mysql.php');

      session_start();
      if($_SESSION['authuser']!=1){
       header('location:Login.php');
      }
      else{
     ?>
        <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="2"> -->
	<title>Students Management</title>
</head>
<body background="img/body-bg.png">
<?php
	include 'menu.php';
 ?>
<div class="file-manager-area mg-tb-15">
<div class="container-fluid">
<div class="row">
<div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
    <div class="hpanel responsive-mg-b-30">
        <div class="panel-body">
            <div class="dropdown custonfile">
                <a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
					<i class="fa fa-plus-circle"></i> ເພີ່ມ
				</a>
                   <ul class="dropdown-menu filedropdown m-l">
                    <?php
                        include 'mysql.php';
                        $mysqli=mysqli_query($con,"select*from class_room");
                        while($res=mysqli_fetch_array($mysqli)){
                            echo "<li><a href='add_students.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                        }
                     ?>
                </ul>
            </div>
            <div class="dropdown custonfile">
                <a class="dropdown-toggle btn btn-success btn-block" href="#" data-toggle="dropdown" style="color: white">
                    <i class="fa fa-line-chart"></i>  ເລື່ອນຫ້ອງ
                </a>
                   <ul class="dropdown-menu filedropdown m-l">
                    <?php
                        include 'mysql.php';
                        $mysqli=mysqli_query($con,"select*from class_room");
                        while($res=mysqli_fetch_array($mysqli)){
                            echo "<li><a href='up_room.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                        }
                     ?>
                </ul>
            </div>
            <ul class="h-list m-t">
                <li class="active">
                    <input type="text" name="sarech" id="search" class="form-control" style="margin-top: 3%" placeholder="ຄົ້ນຫາ....">
                </li>
                <div class="dropdown custonfile">
                <a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown" style="color: white">
                    <i class="fa fa-history"></i>  ປະຫວັດການຮຽນທັງໝົດ
                </a>
                   <ul class="dropdown-menu filedropdown m-l">
                    <?php
                        include 'mysql.php';
                        $mysqli=mysqli_query($con,"select*from class_room");
                        while($res=mysqli_fetch_array($mysqli)){
                            echo "<li><a href='history_study.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                        }
                     ?>
                </ul>
            </div>
            </ul>
        </div>
    </div>
    <div class="hpanel responsive-mg-b-30">
        <div class="panel-body file-manager-usac">
            <h3 align="center">ນັກຮຽນທັງໝົດ</h3>
            <?php 
                include 'mysql.php';
                $countst=mysqli_query($con,"select count(s_id)from student");
                $sel=mysqli_fetch_array($countst);
                $conn=$sel[0];
             ?>
            <h2 align="center"><?php echo $conn; ?> ຄົນ</h2>
            <div class="progress full m-t-lg" data-toggle="tooltip" data-placement="top" title="<?php echo $conn; ?> ຄົນ">
            <div style="width: <?php echo $conn; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $conn; ?>" role="progressbar" class=" progress-bar progress-bar-success" >
                  <?php echo $conn; ?>
            </div>
            </div>
            <?php 
                include 'mysql.php';
                $male=mysqli_query($con,"select count(s_id)from student where s_gender='ທ້າວ'");
                $sel1=mysqli_fetch_array($male);
                $m=$sel1[0];
             ?>
            <p align="center">ຊາຍ <?php echo $m; ?> ຄົນ</p>
            <div class="progress full m-t-lg" data-toggle="tooltip" data-placement="top" title="<?php echo $m; ?> ຄົນ">
                <div style="width: <?php echo $m; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $m; ?>" role="progressbar" class=" progress-bar progress-bar-warning">
                    <?php echo $m; ?> ຄົນ
                </div>
            </div>
            <?php 
                include 'mysql.php';
                $female=mysqli_query($con,"select count(s_id)from student where s_gender='ນາງ'");
                $sel2=mysqli_fetch_array($female);
                $fm=$sel2[0];
             ?>
            <p align="center">ຍິງ <?php echo $fm; ?> ຄົນ</p>
            <div class="progress full m-t-lg" data-toggle="tooltip" data-placement="top" title="<?php echo $fm; ?> ຄົນ">
                <div style="width: <?php echo $fm; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $fm; ?> ຄົນ" role="progressbar" class=" progress-bar progress-bar-danger">
                    <?php echo $fm; ?> ຄົນ
                </div>
            </div>
            <p>ລາຍງານຈຳນວນນັກຮຽນທັງໝົດໃນສົກຮຽນ</p>
            <h3 align="center">2018-2019</h3>
        </div>
    </div>
</div>
<div class="col-md-9 col-md-9 col-sm-9 col-xs-12" id="data">
    <div class="row">
        <?php 
            include 'mysql.php';
            $student=mysqli_query($con,"select*from student");
            while($std=mysqli_fetch_array($student)){
         ?>
         <a href="view_data_set.php?s_id=<?php echo $std['s_id']?>" class="view_st">
        <div class="col-md-3" id="body" data-toggle="tooltip" data-placement="top" title="<?php echo $std['user'].' '.$std['time']?>">
            <div class="hpanel mt-b-30">
                <div class="panel-body file-body file-cs-ctn">
                    <img src="img/user_null.png" alt="" style="width: 100px;height: 100px;border-radius: 50%;margin-bottom: -1px;margin-top: -1px">
                </div>
                <div class="panel-footer red" style="text-align: center;height: 30px;">
                    <p style="margin-top: -5px"><?php echo $std['s_gender'].' '.$std['s_fname'].' '.$std['s_lname']; ?> </p>
                </div>
            </div>
        </div>
            </a>
        <?php } ?>
    </div>
</div>
</div>
</div>
<?php
     error_reporting(~E_NOTICE);
        include 'Pugin_JS.php';
     ?>
</div>
</body>
</html>
<?php
      }
?>
