<?php
 include('mysql.php');
error_reporting(~E_NOTICE);
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
        label{margin-top: 2%!important}
    </style>
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
                <li class="active"><a href="#"><i class="fa fa-file"></i>  ຄະແນນທັງໝົດ</a></li>
                <li class="active"><a href="#" data-toggle="modal" data-target="#miss"><i class="fa fa-user-times text-info"></i> ບັນທຶກການຂາດ</a></li>
                <li class="active"><a href="#"><i class="fa fa-clock-o text-success"></i> ປະຫວັດການຮຽນຜ່ານມາ</a></li>
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
<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
    <div class="row">
   <div class="panel panel-default">
       <div class="panel-heading">
           <h3 class="panel-title">ຟອມແກ້ໄຂຂໍ້ມູນນັກຮຽນ</h3>
       </div>
       <div class="panel-body">
        <form action="" method="post">

            <div class="col-md-6">
                <?php
                  $s_id=$_REQUEST['s_id'];
                  $sel_std=mysqli_query($con,"select*from student where s_id='$s_id'");
                  $std=mysqli_fetch_array($sel_std);
                 ?>
                <input type="hidden" class="form-control" name='s_id' value="<?=$std['s_id']?>">
      
                <label for="">ເລກປະຈຳຕົວ</label>
               
                <input type="text" class="form-control" name="s_num" value="<?=$std['s_num']?>" readonly required>
                <label for="">ເພດ</label>

                <select name="s_gender" class="form-control" required>
                    <option value="<?=$std['s_gender']?>"><?=$std['s_gender']?></option>
                    <option value="ທ້າວ">ທ້າວ</option>
                    <option value="ນາງ">ນາງ</option>
                </select>

                <label for="">ຊື່</label>
                <input type="text" class="form-control" value="<?=$std['s_fname']?>" placeholder="ປ້ອນຊື່" name='s_fname' required>
                <label for="">ນາມສະກຸນ</label>
                <input type="text" class="form-control" value="<?=$std['s_lname']?>" placeholder="ປ້ອນນາມສະກຸນ" name='s_lname' required>
                <label for="">ວັນເດືອນປີເກີດ</label>
                <input type="date" class="form-control" value="<?=$std['s_dob']?>" placeholder="ປ້ອນວັນເດືອນປີເກີດ" name='s_dob' required>
                <label for="">ແຂວງ</label>

                <select name="pro_name" id='pro_name' class="form-control" required>
                    <option value="<?=$std['s_pro_name']?>"><?=$std['s_pro_name']?></option>
                    <?php
                        $sel_pro=mysqli_query($con,"select*from province");
                        while($pro=mysqli_fetch_array($sel_pro)){
                            echo "<option value='$pro[1]'>$pro[1]</option>";
                        }
                    ?>
                </select>

                <label for="">ເມືອງ</label>
                <select class="form-control" name='dis_name' id='dis_name' required>
                  <option value="<?=$std['s_dis_name']?>"><?=$std['s_dis_name']?></option>
                </select>

            </div>
            <div class="col-md-6">
                <label for="">ບ້ານ</label>
                <select class="form-control" name='vill_name' id='vill_name' required>
                  <option value="<?=$std['s_vill_name']?>"><?=$std['s_vill_name']?></option>
                </select>
                <label for="">ສັນຊາດ</label>
                <input type="text" class="form-control" value="<?=$std['national']?>" placeholder="ປ້ອນສັນຊາດ" name='national' required>
                <label for="">ຊົນເຜົ່າ</label>
                <input type="text" class="form-control" value="<?=$std['trib']?>" placeholder="ປ້ອນຊົນເຜົ່າ" name='trib' required>
                <label for="">ສາສະໜາ</label>
                <input type="text" class="form-control" value="<?=$std['plash']?>" placeholder="ປ້ອນສາສະໜາ" name='plash' required>
                <label for="">ເບີໂທລະສັບ</label>
                <input type="text" class="form-control" value="<?=$std['s_tel']?>" placeholder="ປ້ອນເບີໂທ" name='s_tel' required>
                
                <label for="">ສະຖານະ</label>
                <select class="form-control" name='s_status' required>
                  <option value="<?=$std['s_status']?>"><?=$std['s_status']?></option>
                  <option value="ເຂົ້າ">ເຂົ້າ</option>
                  <option value="ອອກ">ອອກ</option>
                  <option value="ຍ້າຍ">ຍ້າຍ</option>
                </select>
                <label for="">ໝາຍເຫດ</label>
                <textarea class="form-control" placeholder="ໝາຍເຫດ" value="<?=$std['s_remark']?>" name='s_remark'><?=$std['s_status']?></textarea>

            </div>
       </div>
       <div class="panel-footer">
           <button type="submit" name="update" class="btn btn-red btn-sm"> ແກ້ໄຂ</button>
           <a href="students.php">
           <button type="button" class="btn btn-default btn-sm"> ຍົກເລີກ</button>
           </a>
       </div>

        <?php
          if(isset($_POST['update'])){
            $s_id=$_POST['s_id'];
            $s_num=$_POST['s_num'];
            $s_gender=$_POST['s_gender'];
            $s_fname=$_POST['s_fname'];
            $s_lname=$_POST['s_lname'];
            $s_dob=$_POST['s_dob'];
            $pro_name=$_POST['pro_name'];
            $dis_name=$_POST['dis_name'];
            $vill_name=$_POST['vill_name'];
            $national=$_POST['national'];
            $trib=$_POST['trib'];
            $plash=$_POST['plash'];
            $s_tel=$_POST['s_tel'];
            $s_status=$_POST['s_status'];
            $s_remark=$_POST['s_remark'];
            $user=$_SESSION['fname'];
            $gener=$_POST['gener'];

              $insert=mysqli_query($con,"update student set
                s_gender='$s_gender',
                s_fname='$s_fname',
                s_lname='$s_lname',
                s_dob='$s_dob',
                s_vill_name='$vill_name',
                s_dis_name='$dis_name',
                s_pro_name='$pro_name',
                s_tel='$s_tel',
                national='$national',
                trib='$trib',
                plash='$plash',
                s_status='$s_status',
                s_remark='$s_remark',
                user='$user',
                time='$time'
                where s_id='$s_id'");
                if($insert){
                  echo "<script>
                      alert('ແກ້ໄຂສຳເລັດ');
                      location='students.php';
                      </script>
                  ";
                }
           
                
                else{
                  echo "
                    <script>
                      alert('ບໍ່ສາມາດແກ້ໄຂໄດ້');
                      location='students.php';
                      </script>
                  ";
                }
          }

         ?>


   </form>
   </div>
    </div>
</div>
</div>
</div>
</div>
     <script>
        $(function(){
            $('#add_gener').click(function(){
                var gener=$("#gener").val();
                $.post('get_gener.php',
                    {
                        gener:gener
                    }
                ,function(show_gener){
                    $('#gener').val(show_gener);
                });
            });
        });
        $(function(){
            $('#minus_gen').click(function(){
                var gener=$("#gener").val();
                $.post('minus_gener.php',
                    {
                        gener:gener
                    }
                ,function(show_gener){
                    $('#gener').val(show_gener);
                });
            });
        });
        $(function(){
            $('#pro_name').change(function(){
                var pro_name=$('#pro_name').val();
                $.post('get_district2.php',{
                  pro_name:pro_name
                },
              function(show_dis){
                $('#dis_name').html(show_dis);
              });
            });
        });
        $(function(){
            $('#dis_name').change(function(){
                var dis_name=$('#dis_name').val();
                $.post('get_village.php',{
                  dis_name:dis_name
                },
              function(show_vill){
                $('#vill_name').html(show_vill);
              });
            });
        });
    </script>
</body>
</html>
<?php
      }
?>
