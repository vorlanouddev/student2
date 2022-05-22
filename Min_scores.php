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
  <style>
  label{margin-top: 1%;}
</style>
<body>
  <?php include 'menu.php' ?>
  <div class="mailbox-view-area mg-tb-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
          <div class="hpanel responsive-mg-b-30">
            <div class="panel-body">
              <a href="score.php" class="btn btn-success compose-btn btn-block m-b-md"><i class="fa fa-diamond"></i> ຄະແນນ</a>
              <ul class="mailbox-list">
                <?php 
                include 'mysql.php';
                $mysqli=mysqli_query($con,"select*from class_room");
                while($res=mysqli_fetch_array($mysqli)){
                  echo "<li><a href='add_score.php?add_sc=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                }
                ?>
              </ul>
              <hr>
              <ul class="mailbox-list">
                <li><a href="Max_scores.php"><i class="fa fa-sort-amount-desc text-success"></i> ຄະແນນສູງ</a></li>
                <li><a href="Min_scores.php"><i class="fa fa-sort-amount-asc text-danger"></i> ຄະແນນຕ່ຳ</a></li>
                <li><a href="#"><i class="fa fa-clock-o text-primary"></i> ປະຫວັດການຮຽນ</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
          <div class="hpanel email-compose mailbox-view mg-b-15">
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <td>ລະຫັດ</td> 
                    <td>ຄູ-ອາຈານ</td> 
                    <td>ຫ້ອງ</td> 
                    <td>ວິຊາ</td>
                    <td>ຄະແນນ</td>
                    <td>ເດືອນ</td>
                  </tr>
                </thead>
                <?php 
                include 'mysql.php';
                $sql=mysqli_query($con,"select*from view_student");
                $i=1;
                while($res=mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $res['teach_fname'].' '.$res['teach_lname'] ?></td>
                    <td><?php echo $res['class_name'] ?></td>
                    <td><?php echo $res['sub_name'] ?></td>
                    <td><?php echo $res['point'] ?></td>
                    <td><?php echo $res['p_month'] ?></td>
                  </tr>
                  <?php $i++; } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'pugin_js.php'; ?>
</body>

</html>
<?php
}
?>