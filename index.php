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
    <style>
        .txt{color:black;font-weight: bold;}
        .label-red{
            background-color: #CB2525;
            color:white;
        }
        .label-warning{
            background-color: #EF610B!important;
            color:white;
        }
        hr{border-color: #CB2525!important;}
        #butt:hover{color: white!important}
        #itemx{color:white!important;}
    </style>
</head>
<body background="img/body-bg.png">
<?php
    include 'menu.php';
 ?>
<div class="file-manager-area mg-tb-15">
<div class="container-fluid">
<div class="row">

<div class="col-md-9 col-md-9 col-sm-9 col-xs-12" id="data">
    <div class="row">
        <?php 
            include 'mysql.php';
            $room=mysqli_query($con,"select*from class_room");
            while($std=mysqli_fetch_array($room)){
         ?>
        <div class="col-md-4" id="body" data-toggle="tooltip" data-placement="top" title="<?php echo $std['user'].' '.$std['time']?>">
            <div class="hpanel mt-b-30">
              <div class="panel-heading red">
                 <h3 class="panel-title" align="center"><?php echo $std['class_name']?></h3>
              </div>
                <div class="panel-body file-body file-cs-ctn">
                   <div class="col-xs-6" style="text-align: left;">
                       <div class="txt">ທັງໝົດ:</div><br>
                       <div class="txt">ຍິງ:</div><br>
                       <div class="txt">ຊາຍ:</div><br>
                       <div class="txt">ຂາດທັງໝົດ:</div>
                   </div>
                   <?php 
                      $class=$std['class_id'];
                      // ນັບຈຳນວນນັກຮຽນທັງໝົດ
                      $count_all=mysqli_query($con,"select count(s_id)from view_uproom1 where class_id='$class' and part='$r_part'");
                      $cnt=mysqli_fetch_array($count_all);
                      $studentall=$cnt[0];
                      // ນັບຈຳນວນຍິງທັງໝົດ
                      $count_female=mysqli_query($con,"select count(s_id)from view_uproom1 where s_gender='ນາງ' and class_id='$class' and part='$r_part'");
                      $fmale=mysqli_fetch_array($count_female);
                      $fm=$fmale[0];
                       // ນັບຈຳນວນຍິງທັງໝົດ
                      $count_male=mysqli_query($con,"select count(s_id)from view_uproom1 where s_gender='ທ້າວ' and class_id='$class' and part='$r_part'");
                      $mmale=mysqli_fetch_array($count_male);
                      $m=$mmale[0];
                         // ນັບຈຳນວນຄົນທັງໝົດ
                      $count_miss=mysqli_query($con,"select count(miss_id)from view_miss where  date(miss_date)=date(curdate()) and m_part='$r_part' and class_id='$class'");
                      $miss=mysqli_fetch_array($count_miss);
                      $mis=$miss[0];
                    ?>
                   <div class="col-xs-6">
                       <div class="label-warning"><a href="view_data.php?class_id=<?php echo $std['class_id']?>" id="itemx"><?php echo $studentall; ?> ຄົນ</a></div><br>
                       <div class="label-success"><a href="view_female.php?class_id=<?php echo $std['class_id']?>" id="itemx"><?php echo $fm ?> ຄົນ</a></div><br>
                       <div class="label-info"><a href="view_male.php?class_id=<?php echo $std['class_id']?>" id="itemx"><?php echo $m ?> ຄົນ</a></div><br>
                       <div class="label-red"><a href="view_missing_today.php?class_id=<?php echo $std['class_id']?>" id="itemx"><?php echo $mis ?> ຄົນ</a></div>
                   </div>
                </div>
                <div class="panel-footer red" align="center">
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
    <div class="hpanel responsive-mg-b-30">
        <div class="panel-body">
            <div class="dropdown custonfile">
                <a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
                    ເບິ່ງຄະແນນ
                </a>
                   <ul class="dropdown-menu filedropdown m-l">
                    <?php
                        include 'mysql.php';
                        $mysqli=mysqli_query($con,"select*from class_room");
                        while($res=mysqli_fetch_array($mysqli)){
                            echo "<li><a href='view_score.php?view_sc=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                        }
                     ?>
                </ul>
            </div>
            <div class="dropdown custonfile">
                <a class="dropdown-toggle btn btn-success btn-block" href="#" data-toggle="dropdown" style="color: white">
                    <i class="fa fa-line-chart"></i>  ເບິ່ງວັນຂາດ
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
