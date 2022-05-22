
<?php
    include('mysql.php');
    @$vill_id=$_GET['edit'];
    @$getvillage=mysqli_query($con,"select*from view_address where vill_id='$vill_id'");
    $resault=mysqli_fetch_array($getvillage);
// ======================================================================
      session_start();
      if($_SESSION['authuser']!=1){
       header('location:Login.php');
      }
      else{
     ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include 'pugin_css.php' ?>
<meta charset="utf-8">
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
                        <hr>
                         <ul class="mailbox-list">
                            <li>
                                <a href="father_data.php">
                                    <i class="fa fa-user"></i>  ຂໍ້ມູນພໍ່
                                </a> 
                            </li>
                            <li>
                                <a href="mother_data.php"><i class="fa fa-user"></i>  ຂໍ້ມູນແມ່</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel email-compose mailbox-view mg-b-15">
                            <div class="border-top border-left border-right bg-light">
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>ຟອມບັນທຶກບ້ານ</h4><hr>
        
                                    <form action="" method="POST" role="form">                                    
                                        <div class="form-group">
                                            <?php 
                                                include 'mysql.php';
                                                $sql=mysqli_query($con,"select*from province");
                                             ?>
                                            <label for="">ຊື່ແຂວງ</label>
                                            <select name="pro_id" id="pro_id" class="form-control">
                                                <option value=""><?php echo $resault['pro_name']; ?></option>
                                                <?php 
                                                    while($rs=mysqli_fetch_array($sql)){
                                                        echo " <option value='$rs[0]'>$rs[1]</option>";
                                                    }
                                                 ?>
                                               
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="">ຊື່ເມືອງ</label>
                                            <select name="dis_id" id="dis_name" class="form-control">
                                                <option value="<?php echo $resault['dis_id']; ?>"><?php echo $resault['dis_name']; ?></option>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="">ຊື່ບ້ານ</label>
                                            <input type="text" name="vill_name" class="form-control" id="" value="<?php echo $resault['vill_name']; ?>" required>
                                            <input type="hidden" name="vill_id"  id="" value="<?php echo $resault['vill_id']; ?>">
                                        </div>                                    
                                        <button type="submit" name="update" class="btn btn-red btn-sm"><i class="fa fa-save"> </i> ແກ້ໄຂ</button>
                                    </form>
                                </div>
                            </div>

                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                               <div class="row">
                                <?php 
                                    include 'mysql.php';
                                    $select=mysqli_query($con,"select*from district as d,province as p,village as v where d.pro_id=p.pro_id and v.dis_id=d.dis_id");
                                 ?>
                                 <div class="panel-body panel-csm text-right">
                                <input type="text" class="form-control" id="search" style="width: 300px;float: left" placeholder="ຄົ້ນຫາ....">
                                </div>
                                    <div class="panel-body panel-csm">
                                        <table class="table" id="data">
                                            <thead>
                                                <tr>
                                                    <th>ລຳດັບ</th>
                                                    <th>ລະຫັດ</th>
                                                    <th>ຊື່ແຂວງ</th>
                                                    <th>ຊື່ເມືອງ</th>
                                                    <th>ຊື່ບ້ານ</th>
                                                    <th width="100px">ແກ້ໄຂ</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php $i=1; while($res=mysqli_fetch_array($select)){ ?>
                                                <tr  id="body">
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $res['vill_id'] ?></td>
                                                    <td><?php echo $res['pro_name'] ?></td>
                                                    <td><?php echo $res['dis_name'] ?></td>
                                                    <td><?php echo $res['vill_name'] ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                        <a href="village_edit.php?edit=<?php echo $res['vill_id']?>" class="btn btn-default btn-xs" name="edit"><i class="fa fa-edit"></i></a>
                                                        <a href="?del=<?php echo $res['vill_id']?>" class="btn btn-default btn-xs" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
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
    <script src="Lib/Options/jquery.min.js"></script>
</body>
</html>
<?php
      }
?>
<?php 
    include 'mysql.php';
    if(isset($_POST['update'])){
    $vill_id=$_POST['vill_id'];
    $dis_id=$_POST['dis_id'];
    $vill_name=$_POST['vill_name'];
    $update=mysqli_query($con,"update village set dis_id='$dis_id',vill_name='$vill_name' where vill_id='$vill_id'");
    if($update){
        echo "<script>alert('ບັນທຶກສຳເລັດ');location='vill_data.php';</script>";
    }else{
        echo "<script>alert('ບັນທຶກບໍ່ສຳເລັດ');location='vill_data.php';</script>";

    }
    }
 ?>
 <?php 
    if(isset($_GET['del'])){
    include 'mysql.php';
        
        $vill_id=$_GET['del'];
        $del=mysqli_query($con,"DELETE FROM village where vill_id='$vill_id'");
         if($del){
        echo "<script>alert('ລຶບຂໍ້ມູນສຳເລັດ');location='vill_data.php';</script>";
    }else{
        echo "<script>alert('ລຶບຂໍ້ມູນບໍ່ສຳເລັດ');location='vill_data.php';</script>";

    }   
    }
  ?>
    <script type="text/javascript">
    $(function(){
        $('#pro_id').change(function(){
        var pro_id=$('#pro_id').val();
        $.post('get_district.php',{
            pro_id:pro_id
        },
        function(show){
            $('#dis_name').html(show);
        });
    });
    });
  </script>